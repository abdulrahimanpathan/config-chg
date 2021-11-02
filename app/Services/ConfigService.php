<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;

class ConfigService {
    /**
     * Return value based on key
     */
    public function getConfigValue($key) {
        $path = '../fixtures/';
        $files = File::files($path);
        $config = [];
        $i = 0;
        foreach($files as $file) {
            $config_array = json_decode(file_get_contents($file), true);
            if(is_null($config_array)) {
                continue;
            }
            $config = $this->mergeConfig($config, $config_array);
        }
        return $this->processKey($key, $config);
    }
    /**
     * Merges the configs and return new array
     *
     * @param  array  $original
     * @param  array  $merging
     * @return array
     */
    public function mergeConfig(array $original, array $merging)
    {
        $array = array_merge($original, $merging);
        foreach ($original as $key => $value) {
            if (! is_array($value)) {
                continue;
            }
            if (! Arr::exists($merging, $key)) {
                continue;
            }
            if (is_numeric($key)) {
                continue;
            }
            $array[$key] = $this->mergeConfig($value, $merging[$key]);
        }
        return $array;
    }
    /**
     * Fetch value based on key from config array
     *
     * @param  string  $key
     * @param  array  $array
     * @return array or boolean
     */
    public function processKey($key, $array)
    {
        $p = $array;
        foreach(explode('.', $key) as $step) { 
            if (isset($p[$step])) 
                $p = $p[$step];
            else { 
                $p = false; 
                break; 
            }
        }
        return $p;
    }
}
