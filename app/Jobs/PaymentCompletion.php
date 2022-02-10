<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use App\Services\IPaymentMethod;
use Illuminate\Support\Facades\Mail;
use App\Mails\OrderReceived;

class PaymentCompletion implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

     protected $order;
     protected $customer;
     protected $paymentMethod;
     protected $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request, IPaymentMethod $paymentMethod, $order,$customer)
    {
        $this->paymentMethod = $paymentMethod;
        $this->order    = $order;
        $this->customer = $customer;
        $this->request =  $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //payment
        //Charge Wallet instead
        
        //$this->paymentMethod->processPayment($this->request,$this->order,true);

        //email out
        Mail::to($this->customer->email)
             ->send(new OrderReceived($this->order));
    }
}
