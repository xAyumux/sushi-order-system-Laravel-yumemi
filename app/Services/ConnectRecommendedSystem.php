<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ConnectRecommendedSystem
{
    public static function connect(string $client_header, array $request_body)
    {
        $sushi_recommended_system = config('sushi_order_system.sushi_recommended_system');

        $response = Http::acceptJson()
            ->withHeaders([
                'client-id' => $client_header,
            ])
            ->post($sushi_recommended_system, [
                'item_ids' => $request_body,
            ]);

        return $response;
    }
}
