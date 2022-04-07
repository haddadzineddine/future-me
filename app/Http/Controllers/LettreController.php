<?php

namespace App\Http\Controllers;

use App\Models\Lettre;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LettreController extends Controller
{

    public function __invoke()
    {
        $this->validate(request(), [
            "description" => 'required',
            "email" => 'required|email',
            "deliver_in" => 'required'
        ]);

        $deliver_in = Carbon::now()->addYear(request('deliver_in'));

        Lettre::create([
            'description' => request('description'),
            'email' => request('email'),
            'deliver_in' => $deliver_in,
        ]);

        return ['message' => 'Lettre Created!'];
    }
}
