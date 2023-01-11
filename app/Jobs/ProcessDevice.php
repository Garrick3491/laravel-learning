<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\DeviceHandler\DeviceUploadHandler;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ProcessDevice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $deviceData;
    public int $fileId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $deviceData)
    {
        $this->deviceData = $deviceData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $json = $this->deviceData;
        $response = Http::post(Route('devices.store'), ['json' => $json, 'token' => env('API_KEY')]);

        if ($response->status() > 200)
        {
            throw new \Exception($response->body());
        }

        return 'Success!';
    }
}
