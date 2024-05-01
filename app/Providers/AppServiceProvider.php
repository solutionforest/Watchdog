<?php

namespace App\Providers;

use App\Notifications\NativeNotificationChannel;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Notification::resolved(function (ChannelManager $service): void {
            $service->extend('native', function (): NativeNotificationChannel {
                return new NativeNotificationChannel();
            });
        });
    }
}
