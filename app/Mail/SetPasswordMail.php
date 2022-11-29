<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class SetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

 /**
     * @var array
     */
    protected $account;

    /**
     * Create a new message instance.
     *
     * @param $account
     */
    public function __construct($account)
    {
        $this->account = $account;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $expires_at = Carbon::now()->addSeconds($this->account['expires_in']);

        return $this
            ->subject('REAL TIME Reset Password')
            ->markdown('mails.users.set-password', [
                'url' => route('password.reset', [
                    'token' => $this->account['token'],
                    'user' => $this->account['id'],
                ]),
                'name' => $this->account['name'],
                'first_name' => explode(' ', $this->account['full_name'])[0],
                // 'organization' => $this->account['organization'],
                'expires_at' => $expires_at->format('Y-m-d H:i:s'),
            ]);
    }
}
