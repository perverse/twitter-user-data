<?php namespace App\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App;

class TwitterUserGrabber extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'twitter:getuser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data on a twitter user.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $grabber = App::make('App\Services\Contracts\TwitterUserDataSource');
        $user = $grabber->getUser($this->argument('username'));
        $user = $user->getJsonArray();

        if (count($user) < 2) {
            $data = array('success' => false, 'data' => 'No data found for user');
        } else {
            $data = array('success' => true, 'data' => $user);
        }

        echo json_encode($data, JSON_PRETTY_PRINT) . "\n";
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('username', InputArgument::REQUIRED, 'A Twitter handle.'),
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
        );
    }

}
