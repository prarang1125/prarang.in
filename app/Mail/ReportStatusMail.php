<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class ReportStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $report; // Holds the report data

    /**
     * Create a new message instance.
     */
    public function __construct($report)
    {
        $this->report = $report;
    }

    /**
     * Build the message.
     */
    public function build(): self
    {
        return $this->subject('Report Status Update') // Set email subject
                    ->view('yellowpages::admin.report_status') // Specify the email view
                    ->with([
                        'report' => $this->report, // Pass the report data to the view
                    ]);
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
