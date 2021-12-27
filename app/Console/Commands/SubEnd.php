<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use App\Mail\SubscriptionEnding;
use Illuminate\Support\Facades\Mail;

class SubEnd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SubEnd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscription Will end soon please contact administrator for renewal';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //return Command::SUCCESS;

      /*  $user = User::with('end_date')->get();
        foreach($user as $subend)
        {
            $expiry = $subend->end_date;
            $expirybefore5 = Carbon::parse($expiry)->subDay(5)->toDateString();
            $expirybefore2 = Carbon::parse($expiry)->subDay(2)->toDateString();
            $expirybefore1 = Carbon::parse($expiry)->subDay(1)->toDateString();

            //$currentdate = Carbon::now()->toDateString();
            $currentdate = Carbon::now();
           
            if($currentdate == $expirybefore5||$expirybefore2||$expirybefore1)
            {
                Mail::to($subend->email)->send(new SubscriptionEnding($subend));
            }*/

            $user = User::where('end_date', Carbon::now()->subDay())->get();
            foreach($user as $subend)
            {                                  
                 Mail::to($subend->email)->send(new SubscriptionEnding($subend));                
            }
        //}
          $this->info('Subscription expiry notification has been Sent');
    
}
}