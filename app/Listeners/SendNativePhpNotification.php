<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Native\Laravel\Facades\Notification as NativeNotify;
use Spatie\UptimeMonitor\Notifications\BaseNotification;

class SendNativePhpNotification
{
    
    public function send(object $notifiable,BaseNotification $notification): void
    {
        Log::debug("Sending notification");
        NativeNotify::title("Website is down")
            ->message("Url: " . $notification->getMonitor()->raw_url . "\nReason: " . $notification->getMonitor()->uptime_check_failure_reason)
            ->show();
    }

}
