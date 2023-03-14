<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ConnectRecommendedSystem
{
    private const SUSHI_RECOMMENDED_SYSTEM = 'https://3thrfz1h40.execute-api.ap-northeast-1.amazonaws.com/Prod/recommended';

    public static function connect(string $client_header, array $request_body)
    {
        $response = Http::acceptJson()
            ->withHeaders([
                'client-id' => $client_header,
            ])
            ->post(self::SUSHI_RECOMMENDED_SYSTEM, [
                'item_ids' => $request_body,
            ]);

        return $response;
    }
}
