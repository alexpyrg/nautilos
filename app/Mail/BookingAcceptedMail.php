<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Booking;

class BookingAcceptedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailContent;
    public $subject;
    public $booking;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $emailContent, Booking $booking)
    {

        $this->subject = $subject;
        $this->emailContent = $emailContent;
        $this->booking = $booking;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.BookingAccepted',
         // Passing the processed HTML content
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
