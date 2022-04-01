<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendEmailJob;
use App\Newletter;
use App\Emploi;

class SendJobsToUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:send_jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send jobs to users every weekend.';

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
        $emplois = Emploi::where('status',1)->latest()->take(10)->get();
        
        $users = Newletter::where('status',1)->get(); 

        foreach($users as $user)
        {
            $data['email'] = $user->email;
            $data['subject'] =  'Dernières offres emplois';
            dispatch(new SendEmailJob($data, 'weekly_jobs',$emplois));
        }
    }
}
