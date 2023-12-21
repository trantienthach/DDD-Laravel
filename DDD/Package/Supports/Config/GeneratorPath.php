<?php

namespace DDD\Package\Supports\Config;

class GeneratorPath
{
    private $path;

    private $generate;

    private $namespace;

    public function __construct($config)
    {
        if (is_array($config)) {
            $this->path = $config['path'];
            $this->generate = $config['generate'];
            $this->namespace = $config['namespace'] ?? $this->convertPathToNamespace($config['path']);

            return;
        }

        $this->path = $config;
        $this->generate = (bool) $config;
        $this->namespace = $config;
    }

    private function convertPathToNamespace($path)
    {
        return str_replace('\\', '/', $path);
    }

    public function getPath()
    {
        return $this->path;
    }
}
