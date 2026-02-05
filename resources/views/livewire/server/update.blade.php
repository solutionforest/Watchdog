<?php

use function Livewire\Volt\{state};
use function Livewire\Volt\{rules};
use Spatie\UptimeMonitor\Models\Monitor;
use Spatie\Url\Url;
use Illuminate\Validation\Rule;

state([
    // Estas closures se evalúan solo al montar el componente (primera carga)
    'monitorId' => fn() => (int) request()->route('server'),
    'url' => fn() => (string) Monitor::findOrFail((int) request()->route('server'))->getRawUrlAttribute(),
]);

rules(fn() => [
    'url' => [
        'required',
        'starts_with:http,https',
        Rule::unique('monitors', 'url')->ignore((int) $this->monitorId), //Prevent duplicate URLS, ignore the current monitor being edited
    ],
]);

$editMember = function () {

    $this->url = rtrim((string) $this->url, '/');

    $this->validate();

    $urlObj = Url::fromString($this->url);

    Monitor::whereKey($this->monitorId)->update([
        'url' => $this->url,
        'certificate_check_enabled' => $urlObj->getScheme() === 'https',
        'uptime_check_interval_in_minutes' => config('uptime-monitor.uptime_check.run_interval_in_minutes'),
    ]);

    redirect()->route('index');
};

?>

<div>
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-xl font-bold">Edit Monitor Server</h1>
        <a href="{{route('index')}}" type="button"
            class=" bg-pink-600 px-2 py-1 text-xs font-bold text-white shadow hover:bg-pink-500 flex items-center">
            Go Back
        </a>
    </div>
    <form wire:submit="editMember">
        <div>
            <label for="name" class="block text-sm font-medium leading-6 text-gray-100">Current URL</label>
            <div class="mt-2">
                <input type="text" wire:model="url" id="url"
                    placeholder="https://laravel.com"
                    class="block p-2 w-full border-0 py-1.5 text-gray-400 shadow-sm bg-gray-800 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-600 sm:text-sm sm:leading-6">
                @error('url')
                <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit"
            class="mt-6 bg-pink-600 px-2 py-1 font-bold text-white shadow hover:bg-pink-500 w-full">Edit Monitor URL
        </button>
    </form>
</div>