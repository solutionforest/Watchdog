<?php

use function Livewire\Volt\{state};
use function Livewire\Volt\{rules};
use Spatie\UptimeMonitor\Models\Monitor;
use Spatie\Url\Url;

state(['url' => '']);

rules(['url' => 'required|starts_with:http,https|unique:monitors,url']);

$createMember = function () {

    $this->validate();

    $url = Url::fromString($this->url);
    
    $monitor = Monitor::create([
        'url' => trim($url, '/'),
        'look_for_string' => $lookForString ?? '',
        'uptime_check_method' => isset($lookForString) ? 'get' : 'head',
        'certificate_check_enabled' => $url->getScheme() === 'https',
        'uptime_check_interval_in_minutes' => config('uptime-monitor.uptime_check.run_interval_in_minutes'),
    ]);
    
    redirect()->route('index');
};

?>

<div>
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-xl font-bold">Add Monitor Server</h1>
        <a href="{{route('index')}}" type="button"
           class=" bg-pink-600 px-2 py-1 text-xs font-bold text-white shadow hover:bg-pink-500 flex items-center">
            Go Back
        </a>
    </div>
    <form wire:submit="createMember">
        <div>
            <label for="name" class="block text-sm font-medium leading-6 text-gray-100">What is URL?</label>
            <div class="mt-2">
                <input type="text" wire:model="url" id="url"
                placeholder="https://laravel.com"
                       class="block p-2 w-full border-0 py-1.5 text-gray-400 shadow-sm bg-gray-800 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-600 sm:text-sm sm:leading-6"
                       placeholder="Sarthak">
                @error('url')
                <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
        </div>
       
        <button type="submit"
                class="mt-6 bg-pink-600 px-2 py-1 font-bold text-white shadow hover:bg-pink-500 w-full">Add Monitor URL
        </button>
    </form>
</div>