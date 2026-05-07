<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Prarang Indian Cities Enrolment</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .header {
            background-color: #2563eb;
            color: #fff;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            letter-spacing: 1px;
        }

        .content {
            padding: 30px;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: #1e40af;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 10px;
            margin-bottom: 30px;
        }

        .label {
            font-weight: bold;
            color: #6b7280;
        }

        .value {
            color: #111827;
        }

        .plan-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .plan-table th,
        .plan-table td {
            border: 1px solid #e5e7eb;
            padding: 12px;
            text-align: left;
        }

        .plan-table th {
            background-color: #f9fafb;
            font-weight: bold;
            color: #374151;
        }

        .total-row {
            background-color: #eff6ff;
            font-weight: bold;
            color: #1d4ed8;
        }

        .footer {
            background-color: #f9fafb;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #9ca3af;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Prarang Partnership Enrolment</h1>
        </div>
        <p style="font-size: 18px; padding: 20px;">We are interested in enrolling for a digital marketing plan as
            estimated below. Please revert to us with your
            final pricing.</p>
        <div class="content">
            <div class="section-title">Enrolment Details</div>
            <table width="100%" cellpadding="5">
                <tr>
                    <td width="30%" class="label">Name:</td>
                    <td class="value">{{ $data['name'] }}</td>
                </tr>
                <tr>
                    <td class="label">Mobile:</td>
                    <td class="value">{{ $data['mobile'] }}</td>
                </tr>
                <tr>
                    <td class="label">Email:</td>
                    <td class="value">{{ $data['email'] }}</td>
                </tr>
                <tr>
                    <td class="label">Company:</td>
                    <td class="value">{{ $data['company_name'] ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label">Website:</td>
                    <td class="value">{{ $data['website'] ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label">Date:</td>
                    <td class="value">{{ $data['date'] }}</td>
                </tr>
                <tr>
                    <td class="label">Link to View:</td>
                    <td class="value">
                        <a href="{{ $data['shareUrl'] }}"
                            style="color: #2563eb; font-weight: bold; text-decoration: none;">
                            Digital Marketing Budget Link
                        </a>
                    </td>
                </tr>
            </table>

            <div class="section-title" style="margin-top: 30px;">Selected Budget Plan</div>
            <table class="plan-table">
                <thead>
                    <tr>
                        <th>City</th>
                        <th>Language & Plan</th>
                        <th align="right">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['planData'] as $cityPlan)
                    @foreach($cityPlan['plans'] as $index => $plan)
                    <tr>
                        @if($index == 0)
                        <td rowspan="{{ count($cityPlan['plans']) }}" valign="top"><strong>{{ $cityPlan['city']
                                }}</strong></td>
                        @endif
                        <td>{{ $plan['language'] }} - City <em>{{ $plan['plan'] }}</em></td>
                        <td align="right">₹{{ number_format($plan['price']) }}</td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="total-row">
                        <td colspan="2" align="right">Total Est. Budget</td>
                        <td align="right">₹{{ number_format($data['totalPrice']) }}</td>
                    </tr>
                </tfoot>
            </table>

        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Prarang. All rights reserved.<br>
            Our team will contact you shortly regarding your enrolment.
        </div>
    </div>
</body>

</html>
