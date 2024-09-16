<?php

namespace App\Jobs;

use App\Models\Prod;
use App\Services\SMSService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckStoragePricesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $smsService;

    public function __construct(SMSService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function handle()
    {
        // Fetch all products where the storage price is greater than the market price
        $products = Prod::whereColumn('storage_price', '>', 'market_price')->with('farmer')->get();

        foreach ($products as $product) {
            $message = "Dear {$product->farmer->name}, the price of your product '{$product->product}' in storage has increased above the market price. Consider taking action.";

            // Send SMS to the farmer
            $this->smsService->sendSMS($product->farmer->phone, $message);
        }
    }
}
