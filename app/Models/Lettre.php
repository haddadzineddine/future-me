<?php

namespace App\Models;

use Carbon\Carbon;
use App\Mail\FutureMe;
use App\Mail\FutureMeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lettre extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'email',
        'deliver_at'
    ];


    public function deliver()
    {
        if ($this->isTimeToDeliver()) {

            Mail::to($this->email)
                ->send(new FutureMe($this->description));

            $this->is_delivered = true;
            $this->save();
        }
    }

    protected function isTimeToDeliver()
    {
        return Carbon::now()->format('Y-m-d') === Carbon::parse($this->deliver_at)->format('Y-m-d');
    }
}
