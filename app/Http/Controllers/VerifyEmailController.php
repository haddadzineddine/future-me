<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lettre;
use Illuminate\Support\Facades\URL;

class VerifyEmailController extends Controller
{

    public function confirm(Lettre $lettre)
    {

        if (!request()->hasValidSignature()) {

            abort(403, 'Invalid Signature');
        }

        $lettre->email_verified_at =  Carbon::now();
        $lettre->save();


        $url = URL::temporarySignedRoute('email.isConfirmed', now()->addMinute(10));

        return redirect($url);
    }


    public function show()
    {
        if (!request()->hasValidSignature()) {

            abort(403, 'Invalid Signature');
        }

        return view('EmailVerified');
    }
}
