<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class OfferMail extends Mailable
{
    use Queueable, SerializesModels;

    protected string $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name)
  {
    $this->name = $name;
  }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->view('mails.body')
      ->subject('オファーが届きました!!')
      ->with([
        'name' => $this->name,
        'email' => Auth::user()->email
      ]);
    }
}
