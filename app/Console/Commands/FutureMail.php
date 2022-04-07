<?php

namespace App\Console\Commands;

use App\Models\Lettre;
use App\Mail\FutureMeMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class FutureMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'future:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Future message is sented';

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
        $lettres = Lettre::where('is_delivered', false)
            ->whereNotNull('email_verified_at')
            ->get();

        $lettres->map(fn ($lettre) => $lettre->deliver());
    }
}
