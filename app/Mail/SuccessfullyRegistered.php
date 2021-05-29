<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuccessfullyRegistered extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @return void
     */
    public function __construct(
        private User $user
    ) {}


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject("Cadastro realizado com sucesso!");
        $this->to($this->user->email, $this->user->name);

        return $this->markdown('emails.successfully_registered')->with([
            "user" => $this->user
            ]);
    }
}
