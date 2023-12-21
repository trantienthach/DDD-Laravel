<?php

namespace DDD\Package\Repositories\Base;

use Countable;
use DDD\Package\Interfaces\PackageRepositoryInterface;
use Illuminate\Container\Container;
use DDD\Package\Package\Package;
use Illuminate\Foundation\Application;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Config\Repository;
use Illuminate\Filesystem\Filesystem;

abstract class BaseFileRepository implements PackageRepositoryInterface, Countable
{
    /**
     * @var Application
     */
    public $app;

    public $path;

    /**
     * @var UrlGenerator
     */
    public $url;

    /**
     * @var Repository
     */
    public $config;

    /**
     * @var Filesystem
     */
    public $files;

    public function __construct(Container $app, $path = null)
    {
        $this->app = $app;
        $this->path = $path;
        $this->url = $app['url'];
        $this->config = $app['config'];
        $this->files = $app['files'];
    }

    /**
     * Creates a new Package instances
     *
     * @param Container $app
     * @param string $args.
     * @param string $path
     * @return Package
     */
    abstract protected function createPackage(...$args);

    public function all()
    {
        return $this->scan();
    }

    public function scan(): array
    {
        return [];
    }

    public function getScanPaths(): array
    {
        return [];
    }

    public function find(string $name)
    {
    }

    public function findOrFail(string $name)
    {
        $aggregate = $this->find($name);
    }

    public function count(): int
    {
        return 0;
    }
}
