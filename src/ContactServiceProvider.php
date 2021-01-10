<?php

namespace Anshul\Contact;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider {
    public function boot(){
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'contact');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->mergeConfigFrom(__DIR__ . '/config/recaptcha.php', 'contact');
        $this->publishes([__DIR__ . '/config/recaptcha.php' => config_path('recaptcha.php')]);
    }

    public function register(){
        
    }
    
}