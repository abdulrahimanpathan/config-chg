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
        $configService = new ConfigService();
        $result = $configService->getConfigValue($key);
        if($result)
            return json_encode($result);
        else {
            return json_encode('key not exist');
        }
    }
}