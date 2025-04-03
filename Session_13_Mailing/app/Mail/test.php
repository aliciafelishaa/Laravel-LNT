<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class test extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
     private $name;
     private $email;
     private $subj;
     private $contactMessage;
     private $file_path;

    public function __construct($name, $email, $subj, $contactMessage, $file_path)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subj = $subj;
        $this->contactMessage = $contactMessage;
        $this->file_path = $file_path;
    }

    /**
     * Get the message envelope.-> detail emailnya
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pertemuan Sesi 13',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.test',
            with: [
                'name' => $this->name,
                'subj' => $this->subj,
                'email' => $this->email,
                'contactMessage' => $this->contactMessage,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            $this->file_path];
    }
}
