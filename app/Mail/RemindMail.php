<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RemindMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($user,$reservation)
    {
        $this->user = $user->name;
        $this->shop = $reservation->name;
        $this->date = $reservation->date;
        $this->time = $reservation->time;
        $this->nop = $reservation->nop;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Remind Mail',
            from: 'hiroto.fjt@gmail.com',
            to: 'fujita.hrt@gmail.com',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'remindmail',
            with: [
                'user' => $this->user,
                'reserveshop' => $this->shop,
                'reservedate' => $this->date,
                'reservetime' => $this->time,
                'reservenop' => $this->nop,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
