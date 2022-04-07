<?php

namespace App\Http\Controllers;


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


        $lettre = Lettre::create([
            'description' => request('description'),
            'email' => request('email'),
            'deliver_at' => request('deliver_at'),
        ]);

        LettreCreated::dispatch($lettre);

        return ['message' => 'Lettre Created!'];
    }
}
