<?php

use Illuminate\Contracts\Filesystem\FileExistsException;

if (! function_exists('ddd_path')) {
    /**
     * @var string $layer
     * @var string|null $path
     */
    function ddd_path($layer = 'I', $path = '')
    {
        $layerMappers = [
            'A' => 'Application',
            'I' => 'Infrastructure',
            'D' => 'Domain',
            'U' => 'UI',
            'Application' => 'Application',
            'Infrastructure' => 'Infrastructure',
            'Domain' => 'Domain',
            'UI' => 'UI',
        ];

        $layer = $layerMappers[$layer];

        if (empty($layer)) {
            throw new \Exception('Invalid Layer.');
        }

        return app()->basePath() . '/DDD' . ($layer && $path ? DIRECTORY_SEPARATOR . $layer . DIRECTORY_SEPARATOR .$path : $path);
    }
}

if (! function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if (! function_exists('migration_path'))
{
    function migration_path(string $aggregate)
    {
        $path = base_path("DDD/Infrastructure/{$aggregate}/Database/Migrations/");

        if (! file_exists($path)) {
            throw new FileExistsException('Migration path not found.');
        }

        return $path;
    }
}

if (! function_exists('infrastructure_path'))
{
    function infrastructure_path(string $aggregate)
    {
        $path = base_path("DDD/Infrastructure/{$aggregate}");

        if (! file_exists($path)) {
            throw new FileExistsException('Migration path not found.');
        }

        return $path;
    }
}
