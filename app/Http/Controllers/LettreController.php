<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Lettre;
use App\Events\LettreCreated;

class LettreController extends Controller
{

    public function __invoke()
    {
        $this->validate(request(), [
            "description" => 'required',
            "email" => 'required|email',
            "deliver_at" => 'required'
        ]);

        $deliver_at = Carbon::parse(request()->deliver_at)->format('Y-m-d');

        $lettre = Lettre::create([
            'description' => request('description'),
            'email' => request('email'),
            'deliver_at' => $deliver_at,
        ]);

        LettreCreated::dispatch($lettre);

        return ['message' => 'Lettre Created!'];
    }
}
