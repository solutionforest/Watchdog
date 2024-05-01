<?php

use function Livewire\Volt\{state};
use Spatie\UptimeMonitor\Models\Monitor;
use Native\Laravel\Facades\Notification;
//

state(['servers' => Monitor::all()]);

$editMonitor = function ($monitor) {
};

$deleteMonitor= function ($monitor) {
    Monitor::destroy($monitor['id']);
};

$notificationTest = function () {
    Notification::title('Hello from NativePHP')
            ->message('This is a detail message coming from your Laravel app.')
            ->show();
}

// \Log::debug($monitor->toArray());

?>

<div>
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-xl font-bold">My Monitor {{ now()->format('H:i:s')}}</h1>
        <a href="{{route('create')}}" type="button"
           class="bg-pink-600 px-2 py-1 text-xs font-bold text-white shadow hover:bg-pink-500">Add Monitor</a>
    </div>
    <div wire:poll>
        @foreach($servers as $monitor)
        <div wire:key="{{ $monitor->id }}" class="my-2 flex items-center justify-between">
            
            <div>
                {{-- align center vertical --}}
                <p class="text-xs font-bold text-sky-500 flex items-center">
                    
                    @if($monitor->certificate_status == 'valid' ?? false)
                        <x-heroicon-s-shield-check class="w-5 h-5 mr-2"/>
                    @endif
                    {{$monitor->url}}
                </p>
                
                <p class="text-xs flex items-center">
                    Last Monitor: {{$monitor->uptime_last_check_date?->format('h:i:s A') ?? ''}}
                    <span>
                        @if($monitor->uptime_status == 'up' ?? false)
                            <x-heroicon-s-check class="w-5 h-5 ml-2"/>
                        @endif
                    </span>
                </p>
            </div>
            <div class="flex items-center">
                {{-- <button wire:click="editMonitor({{$monitor}})">
                    <span class="sr-only">Edit</span>
                    <x-heroicon-m-pencil class="w-5 h-5 mr-3 hover:text-pink-500 transition-all duration-300" />
                </button> --}}
                <button wire:click="deleteMonitor({{$monitor}})">
                    <x-heroicon-m-trash class="w-5 h-5 mr-3 hover:text-red-600 transition-all duration-300" />
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>