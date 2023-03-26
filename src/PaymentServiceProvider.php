<?php

namespace Hamzach96\PaymentApi;

use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider {

    public function boot() {
        $this->publishes([
            __DIR__.'/../config/payment.php' => config_path('payment.php')
        ]);
    }

    public function register(){
        $this->app->singleton(Payment::class, function(){
            return new Payment();
        });
    }
}
