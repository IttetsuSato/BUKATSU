<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OfferMail extends Mailable
{
    use Queueable, SerializesModels;

    protected string $name;
    protected string $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, string $body)
  {
    $this->name = $name;
    $this->body = $body;
  }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->view('emails.body')
      ->from('sample@example.com')
      ->subject('テストメールです')
      ->with([
        'name' => $this->name,
        'body' => $this->body
      ]);
    }
}
