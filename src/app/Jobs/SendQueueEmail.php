<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

/**
 * Class SendQueueEmail
 *
 * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class SendQueueEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    public int $timeout = 7200; // 2 hours

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->details;
        $input['subject'] = setting('admin.bulk_message');

        foreach ($data as $member) {
            $to_email = $member->email;
            $to_name = $member->first_name;
            Mail::send('bulk-mail', ['data' => $input['subject']], function ($message) use ($to_email, $to_name) {
                $message->to($to_email, $to_name);
                $message->subject('Namyouth');
                $message->from('info@namyouth.org', 'Namyouth');
            });
        }
    }
}
