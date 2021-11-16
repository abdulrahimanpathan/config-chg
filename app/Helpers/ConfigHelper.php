<?php

use App\Services\ConfigService;

function getConfiguration($key) {
    $configService = new ConfigService();
    $result = $configService->getConfigValue($key);
    if($result) {
        return response()->json($result, 200);
    }
    else {
        return response()->json('key not exist', 404);
    }
}