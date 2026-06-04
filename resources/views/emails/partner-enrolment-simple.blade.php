<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Prarang Indian Cities Enrolment</title>
</head>

<body
    style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; line-height: 1.6; background-color: #f4f7f6; margin: 0; padding: 20px;">
    <div
        style="max-width: 600px; margin: 0 auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
        <div style="background-color: #2563eb; color: #fff; padding: 30px; text-align: center;">
            <h1 style="margin: 0; font-size: 24px;">Prarang Partnership Enrolment</h1>
        </div>
        <div style="padding: 30px;">
            <p>Dear {{ $data['name'] }},</p>
            <p>Thank you for your interest in Prarang.</p>
            <p>Please find attached the digital marketing plan estimates as requested.</p>
            <p>Digital Marketing Plan Link: <a href="{{ $data['shareUrl'] }}">{{ $data['shareUrl'] }}</a></p>
            <br>
            <p>Best regards,<br>Prarang</p>
        </div>
        <div style="background-color: #f9fafb; padding: 20px; text-align: center; font-size: 12px; color: #9ca3af;">
            &copy; {{ date('Y') }} Prarang. All rights reserved.
        </div>
    </div>
</body>

</html>
