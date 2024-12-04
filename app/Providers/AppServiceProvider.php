<?php

namespace App\Providers;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
          $this->app->bind(MessagesController::class, \App\Http\Controllers\Vendor\Chatify\MessagesController::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();

         // Bind the custom notification model
        // DatabaseNotification::resolveRelationUsing('sender', function ($notification) {
        //     return $notification->belongsTo(\App\Models\User::class, 'sender_id', 'id');
        // });
    }
}
