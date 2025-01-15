<?php

namespace Modules\YellowPages\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

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
}
