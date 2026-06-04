<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PartnerEnrolmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $pdfContent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $pdfContent = null)
    {
        $this->data = $data;
        $this->pdfContent = $pdfContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->subject('Prarang Indian Cities/Villages Enrolment - ' . $this->data['name'])
            ->view('emails.partner-enrolment-simple');

        if ($this->pdfContent) {
            $mail->attachData($this->pdfContent, 'Prarang_Enrolment.pdf', [
                'mime' => 'application/pdf',
            ]);
        }

        return $mail;
    }
}
