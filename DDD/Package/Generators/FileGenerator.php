<?php

namespace DDD\Package\Generators;

use DDD\Package\Exceptions\FileAlreadyExistException;
use Illuminate\Filesystem\Filesystem;

class FileGenerator extends Generator
{
    protected $path;

    protected $contents;

    /**
     * The laravel filesystem or null.
     *
     * @var \Illuminate\Filesystem\Filesystem|null
     */
    protected $filesystem;

    private $overwriteFile;

    public function __construct($path, $contents, $filesystem = null)
    {
        $this->path = $path;
        $this->contents = $contents;
        $this->filesystem = $filesystem ? $filesystem : new Filesystem();
    }

    public function withFileOverwrite(bool $overwrite = false): FileGenerator
    {
        $this->overwriteFile = $overwrite;

        return $this;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getContents()
    {
        return $this->contents;
    }

    public function generate()
    {
        $path = $this->getPath();

        // dd($this->getContents());

        if (! $this->filesystem->exists($path)) {
            return $this->filesystem->put($path, $this->getContents());
        }

        if ($this->overwriteFile == true) {
            return $this->filesystem->put($path, $this->getContents());
        }

        throw new FileAlreadyExistException('File already exists!');
    }
}
