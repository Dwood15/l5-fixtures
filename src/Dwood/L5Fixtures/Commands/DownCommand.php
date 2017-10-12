<?php namespace Dwood\L5Fixtures\Commands;

use Illuminate\Console\Command;
use Dwood\L5Fixtures\Exceptions\FixturesException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

use \DB;
use \Fixtures;

class DownCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'fixtures:down';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Destroy all records on the database';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $database = $this->option('database');

        if ($database != null) {
            DB::setDefaultConnection($database);
        }

        Fixtures::down();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['database', null, InputOption::VALUE_OPTIONAL, 'The name of the database connection.', null]
        ];
    }
}
