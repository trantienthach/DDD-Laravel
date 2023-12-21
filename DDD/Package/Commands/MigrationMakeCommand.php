<?php

namespace DDD\Package\Commands;

use DDD\Package\Helpers\GeneratorConfigReader;
use DDD\Package\Helpers\PackageHelper;
use DDD\Package\Supports\Migration\NameParser;
use DDD\Package\Supports\Stub;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class MigrationMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'package:make-migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new migration for the specified aggregate.';

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The migration name will be created.'],
            ['aggregate', InputArgument::OPTIONAL, 'The name of aggregate will be used.']
        ];
    }

    protected function getOptions()
    {
        return [
            ['force', null, InputOption::VALUE_NONE, 'Force the operation to run when the module already exists.'],
        ];
    }

    protected function getDestinationFilePath()
    {
        $aggregate = $this->argument('aggregate');

        if (! PackageHelper::isEnableAggregate($aggregate)) {
            throw new \Exception('Aggregate is not enabled.');
        }

        $generatorPath = GeneratorConfigReader::read('migration');

        $path = infrastructure_path($aggregate);

        return $path . '/' . $generatorPath->getPath() . '/' . $this->getFileName() . '.php';
    }

    protected function getTemplateContents()
    {
        $parser = new NameParser($this->argument('name'));

        if ($parser->isCreate()) {
            return Stub::create('/migration/create.stub', [
                'class' => $this->getClass(),
                'table' => $parser->getTableName(),
            ]);
        }
    }

    public function getClassName()
    {
        return Str::studly($this->argument('name'));
    }

    public function getClass()
    {
        return $this->getClassName();
    }

    /**
     * @return string
     */
    private function getFileName()
    {
        return date('Y_m_d_His_') . $this->getSchemaName();
    }

    /**
     * @return string
     */
    private function getSchemaName()
    {
        return $this->argument('name');
    }

    /**
     * Run the command.
     */
    public function handle(): int
    {
        if (parent::handle() === E_ERROR) {
            return E_ERROR;
        }

        if (app()->environment() === 'testing') {
            return 0;
        }

        return 0;
    }
}
