<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Apartment;
use App\Notifications\ServiceFeeNotification;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $apartment;
    protected $month;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Apartment $apartment, $month)
    {
        $this->apartment = $apartment;
        $this->month = $month;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $cost = $this->apartment->apartment_services_cost()->where('month', $this->month)->first();
        foreach ($this->apartment->residents as $resident) {
            if($resident->user != null){
                $resident->user->notify(new ServiceFeeNotification($cost)); 
            } 
        }
    }
}
