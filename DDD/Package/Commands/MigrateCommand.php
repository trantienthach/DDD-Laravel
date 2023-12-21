<?php

namespace DDD\Package\Commands;

use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'package:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate the migrations from the specified aggregate or from all aggregates.';

    /**
     * @var \DDD\Package\Interfaces\PackageRepositoryInterface
     */
    protected $package;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $aggregate = $this->argument('aggregate');

        if ($aggregate && migration_path($aggregate)) {
            $this->info('Running migrate for aggregate: <info>' . $aggregate . '</info>');
            $this->migrate($aggregate);

            return 0;
        }

        $aggregates = collect(config('package.aggregates'))
            ->filter(function($enable, $aggregate) {
                return $enable
                    && file_exists(migration_path($aggregate));
            })
            ->keys()
            ->toArray();

        foreach ($aggregates as $aggregate) {
            $this->info('Running migrate for aggregate: <info>' . $aggregate . '</info>');
            $this->migrate($aggregate);
        }

        return 0;
    }

    protected function migrate($aggregate)
    {
        $path = migration_path($aggregate);

        $this->call('migrate', [
            '--path' => $path,
            '--database' => $this->option('database'),
            '--pretend' => $this->option('pretend'),
            '--force' => $this->option('force'),
        ]);

        if ($this->option('seed')) {
            throw new NotFound('Command seed not found.');
        }
    }

    protected function getArguments()
    {
        return [
            ['aggregate', InputArgument::OPTIONAL, 'The name of aggregate will be used.']
        ];
    }

    protected function getOptions()
    {
        return [
            ['direction', 'd', InputOption::VALUE_OPTIONAL, 'The direction of ordering.', 'asc'],
            ['database', null, InputOption::VALUE_OPTIONAL, 'The database connection to use.'],
            ['pretend', null, InputOption::VALUE_NONE, 'Dump the SQL queries that would be run.'],
            ['force', null, InputOption::VALUE_NONE, 'Force the operation to run when in production.'],
            ['seed', null, InputOption::VALUE_NONE, 'Indicates if the seed task should be re-run.'],
        ];
    }
}
