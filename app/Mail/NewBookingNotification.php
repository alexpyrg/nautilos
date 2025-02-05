<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Nette\Utils\DateTime;

class NewBookingNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $nights;
    public function __construct(
        public Booking $booking,

    )
    {
        $this->nights = date_diff(
            new DateTime($this->booking->check_in_date),
            new DateTime($this->booking->check_out_date)
        )->days;
//        dd($this->nights);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        //#R10009175-94205 - Φραντζέσκος Σταματάκης New reservation request from Ierapetra Hotels
        return new Envelope(
            subject: $this->booking->id. ' - ' . $this->booking->name .' ' . $this->booking->surname .' New reservation request from Cretan Villa'  ,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.NewBookingMail',
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
