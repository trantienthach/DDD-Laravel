<?php

namespace DDD\Package\Helpers;

use DDD\Package\Supports\Config\GeneratorPath;

class GeneratorConfigReader
{
    public static function read(string $value)
    {
        return new GeneratorPath(config("package.paths.generator.{$value}"));
    }
}
