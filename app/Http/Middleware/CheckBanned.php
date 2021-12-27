<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Carbon\Carbon;
use App\Mail\EndMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->end_date && now()->greaterThan(auth()->user()->end_date)) {
            //&& auth()->user()->status == 0) {
            //$sub_days = now()->diffInDays(auth()->user()->end_date);
            //Auth::logout();
           // $data = User::with('email');
           // $message = 'your subscription has been expired please renew immediately to enjoy our service';
                if(auth()->user()->end_date < Carbon::now())
                {
                    Auth::logout();    
                }
                return redirect()->route('login')->with('error', 'Your Account is suspended, please contact administrator');


           // if ($sub_days > 1){ //|| auth()->user()->status == 0) {
                //$message = 'Your account has been suspended. Please contact administrator.';
               // Auth::logout();
               // $request->session()->invalidate();
                //$request->session()->regenerateToken();
              //  return redirect()->route('login')->with('error', 'Your Account is suspended, please contact Admin.');
           // }
            //return redirect()->route('login')->withMessage($message);*/
            //return redirect()->route('login')->with('error', 'Your Account is suspended, please contact administrator');
        }

        return $next($request);
    }
}
