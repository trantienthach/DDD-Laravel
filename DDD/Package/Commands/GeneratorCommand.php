<?php

namespace DDD\Package\Commands;

use DDD\Package\Exceptions\FileAlreadyExistException;
use DDD\Package\Generators\FileGenerator;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

abstract class GeneratorCommand extends Command
{
    /**
     * The name of 'name' argument.
     * @var string
     */
    protected $argumentName = '';

    /**
     * Get the destination file path.
     * @return string
     */
    abstract protected function getDestinationFilePath();

    /**
     * Get template contents
     * @return string
     */
    abstract protected function getTemplateContents();

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $path = str_replace('\\', '/', $this->getDestinationFilePath());

        /** @var Filesystem */
        $filesystem = $this->laravel['files'];

        if (! $filesystem->isDirectory($dir = dirname($path))) {
            $filesystem->makeDirectory($dir, 777, true);
        }

        $contents = $this->getTemplateContents();

        // dd($contents);

        try {
            $overwriteFile = $this->option('force') ? $this->option('force') : false;
            (new FileGenerator($path, $contents))->withFileOverwrite($overwriteFile)->generate();

            $this->info('Created : '.$path);
        } catch (FileAlreadyExistException $ex) {
            $this->error('File : '.$path.' already exists.');

            return E_ERROR;
        }

        return 0;
    }
}
