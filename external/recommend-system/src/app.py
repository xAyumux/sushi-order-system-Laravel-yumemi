import json
import random
from typing import List
# import requests


def lambda_handler(event, context):
    """Sample pure Lambda function

    Parameters
    ----------
    event: dict, required
        API Gateway Lambda Proxy Input Format

        Event doc: https://docs.aws.amazon.com/apigateway/latest/developerguide/set-up-lambda-proxy-integrations.html#api-gateway-simple-proxy-for-lambda-input-format

    context: object, required
        Lambda Context runtime methods and attributes

        Context doc: https://docs.aws.amazon.com/lambda/latest/dg/python-context-object.html

    Returns
    ------
    API Gateway Lambda Proxy Output Format: dict

        Return doc: https://docs.aws.amazon.com/apigateway/latest/developerguide/set-up-lambda-proxy-integrations.html
    """
    if not authorize_client_token(event["headers"]["client-id"]):
        return {
        "statusCode": 403,
        "body": json.dumps({
            "result": {}, 
            "errors": {
                "error_code": "403",
                "message": "Unauthorized",
            }
        }),
    }

    body_payload = json.loads(event["body"])

    if not validate_payload_object(body_payload):
        return {
        "statusCode": 400,
        "body": json.dumps({
            "result": {}, 
            "errors": {
                "error_code": "400",
                "message": "Invalid request body",
            }
        }),
    }

    return {
        "statusCode": 200,
        "body": json.dumps({
            "result": {
                "item_ids": [
                    recommend_one(body_payload["item_ids"])
                ]
            }, 
            "errors": []
        }),
    }


def authorize_client_token(token: str) -> bool:
    return token == 'sushi_order_system'

def validate_payload_object(payload: dict) -> bool:
    item_list_key: str = "item_ids"

    if not item_list_key in payload:
        # TODO: 結果のy/nだけでなくエラーメッセージにする
        return False

    print(payload)

    # 要素が全てintであるかか確認する
    if not all([isinstance(x, int) for x in payload[item_list_key]]):
        return False

    return True


# リコメンドシステムと銘打っているが、履歴から適当に一件返すだけ
def recommend_one(items: List[int]) -> int:
    return random.choice(items)

