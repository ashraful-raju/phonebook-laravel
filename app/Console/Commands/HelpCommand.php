<?php

namespace App\Console\Commands;

use App\Mail\UserMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class HelpCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the app info';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->alert('Warning, you are in danger zone!');

        Mail::to('hello@msar.me', 'Saiful')->send(new UserMail);
    }
}
