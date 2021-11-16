<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Services\ConfigService;

class ConfigController extends Controller
{
    /**
     * Return value based on key from config file
     */
    public function getConfig($key) {
        //return getConfiguration($key);
        $configService = new ConfigService();
        $result = $configService->getConfigValue($key);
        if($result) {
            return response()->json($result, 200);
        }
        else {
            return response()->json('key not exist', 404);
        }
    }
}