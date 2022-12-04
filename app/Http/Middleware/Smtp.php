<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PosSetting;

class Smtp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $chk = PosSetting::find(1);
        if($chk->smtp_check == 1){
            config(['mail.mailers.smtp.transport' => $chk->mail_transport]); //set
            config(['mail.mailers.smtp.host' => $chk->mail_host]); //set
            config(['mail.mailers.smtp.port' => $chk->mail_port]); //set
            config(['mail.mailers.smtp.encryption' => $chk->mail_encryption]); //set
            config(['mail.mailers.smtp.username' => $chk->mail_username]); //set
            config(['mail.mailers.smtp.password' => $chk->mail_password]); //set
            config(['mail.from.name' => $chk->mail_from_name]); //set
            config(['mail.from.address' => $chk->mail_from_address]); //set
            return $next($request);
        }
        return redirect()->route('login')->with('error', 'SMTP service is not available.');
    }
}
