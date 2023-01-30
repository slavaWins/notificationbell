<?php

namespace NotificationBell\Providers;

use Illuminate\Support\ServiceProvider;
use NotificationBell\Console\Commands\ExampleCommand;
use NotificationBell\Console\Commands\MakePackage;

class NotificationBellServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {


        $migrations_path = __DIR__ . '/../copy/migrations';
        if (file_exists($migrations_path)) {
            $this->publishes([$migrations_path => database_path('migrations'),], 'public');
        }


        $migrations_path = __DIR__ . '/../copy/views';
        if (file_exists($migrations_path)) {
            $this->publishes([$migrations_path => resource_path('views/notificationbell'),], 'public');
        }


        $js_path = __DIR__ . '/../copy/js';
        if (file_exists($js_path)) {
            $this->publishes([$js_path => public_path('js/notificationbell'),], 'public');
        }


    }
}
