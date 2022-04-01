<?php
namespace App\Jobs;

use App\Mail\SendEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendEmailTest;
use Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $view;
    protected $emplois;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $view, $emplois)
    {
        $this->view = $view;
        $this->data = $data;
        $this->emplois = $emplois;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data;
        $email = new SendEmail($data, $this->view, $this->emplois);
        sleep(10);
        //
        Mail::to(strtolower($data['email']))->send($email);
    }
}
