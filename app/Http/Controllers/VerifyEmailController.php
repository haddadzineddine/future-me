<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lettre;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Lettre $lettre)
    {

        if (!request()->hasValidSignature()) {

            abort(403, 'Invalid Signature');
        }

        $lettre->email_verified_at =  Carbon::now();
        $lettre->save();

        return redirect('/');
    }
}
