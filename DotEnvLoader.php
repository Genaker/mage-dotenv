<?php

namespace Mage\DotEnv;

use Dotenv\Dotenv;

class DotEnvLoader
{
    protected $loaded = false;

    public function __construct()
    {
        if (!$this->loaded) {
            $this->loadEnv();
            $this->loaded = true;
        }
    }

    public function loadEnv()
    {
        if (!$this->loaded) {
            $rootPath = "../../..";
            $currentDir = __DIR__;
            if (strpos($currentDir, 'vendor') !== false) {
                //vendor/vendor_name/module_name
                $rootPath = "../../../";
            } else {
                //app/code/Mage/DotEnv
                $rootPath = "../../../../";
            }
            // Immutability refers to if Dotenv is allowed to overwrite existing environment variables.
            $path = realpath(rtrim(__DIR__, '/') . '/' . $rootPath);
            $dotenv = Dotenv::createImmutable($path);
            // Env doesn't exist no throw the exception
            $dotenv->safeLoad();
        }
    }
}

// We need this only when autoloading
if (!defined("BP")) {
    new DotEnvLoader();
}
