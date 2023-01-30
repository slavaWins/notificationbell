<?php

namespace NotificationBell\Console\Commands;

use NotificationBell\Library\NotificationBellHelper;
use NotificationBell\Models\NotificationBell;
use NotificationBell\Models\NotificationBellSetting;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExampleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notificationbell:example';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Заготовка команды notificationbell';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {

        $this->info("notificationbell - Команда выполнена");
    }
}
