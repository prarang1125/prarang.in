<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Status Update</title>
</head>
<body>
    <h1>Hello, {{ $report->name }}</h1>
    <p>Your report has been updated to the following status: <strong>{{ $report->status }}</strong>.</p>
    <p>Details of your report:</p>
    <ul>
        <li>Message: {{ $report->message }}</li>
        <li>Submitted On: {{ $report->created_at->format('d M Y') }}</li>
    </ul>
    <p>Thank you for your submission.</p>
</body>
</html>
