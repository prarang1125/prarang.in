<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Prarang Indian Cities Enrolment</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 11px;
            color: #333;
            background: #fff;
            padding: 20px 25px;
        }

        /* ── Header ── */
        .header {
            background-color: #2563eb;
            color: #fff;
            padding: 12px 20px;
            margin-bottom: 14px;
            border-radius: 4px;
        }
        .header h1 {
            font-size: 16px;
            letter-spacing: 0.5px;
        }
        .header p {
            font-size: 10px;
            margin-top: 3px;
            opacity: 0.85;
        }

        /* ── Info table ── */
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 14px;
        }
        .info-table td {
            padding: 4px 8px;
            font-size: 10px;
            vertical-align: top;
        }
        .info-table .lbl {
            font-weight: bold;
            color: #555;
            width: 110px;
        }

        /* ── Section title ── */
        .section-title {
            font-size: 12px;
            font-weight: bold;
            color: #1e40af;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 4px;
            margin-bottom: 10px;
        }

        /* ── Plan table ── */
        .plan-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }
        .plan-table th {
            background-color: #1e40af;
            color: #fff;
            font-size: 9px;
            padding: 5px 4px;
            text-align: center;
            border: 1px solid #1e3a8a;
        }
        .plan-table td {
            border: 1px solid #d1d5db;
            padding: 4px 5px;
            font-size: 9px;
            vertical-align: middle;
            word-wrap: break-word;
        }
        .plan-table tr:nth-child(even) td {
            background-color: #f8fafc;
        }
        .plan-table tfoot td {
            background-color: #eff6ff;
            font-weight: bold;
            color: #1d4ed8;
            border: 1px solid #bfdbfe;
            padding: 6px 5px;
        }

        /* Column widths — tuned for A4 landscape (842px usable ≈ 792px) */
        .col-sno      { width: 8%; }
        .col-city     { width: 13%; }
        .col-type     { width: 9%; }
        .col-state    { width: 9%; }
        .col-host     { width: 10%; }
        .col-std      { width: 7%; }
        .col-optional { width: 26%; }
        .col-onetime  { width: 9%; }
        .col-monthly  { width: 9%; }

        /* Prevent row break across pages */
        tr { page-break-inside: avoid; }

        /* Footer */
        .pdf-footer {
            margin-top: 14px;
            font-size: 9px;
            color: #9ca3af;
            text-align: center;
            border-top: 1px solid #e5e7eb;
            padding-top: 8px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <h1>Prarang Partnership Enrolment</h1>
        <p>We are interested in enrolling for a digital marketing plan as estimated below. Please revert with final pricing.</p>
    </div>

    <!-- Info Grid -->
    <table class="info-table">
        <tr>
            <td class="lbl">Name:</td><td>{{ $data['name'] }}</td>
            <td class="lbl">Date:</td><td>{{ $data['date'] }}</td>
        </tr>
        <tr>
            <td class="lbl">Mobile:</td><td>{{ $data['mobile'] }}</td>
            <td class="lbl">Company:</td><td>{{ $data['company_name'] ?: 'N/A' }}</td>
        </tr>
        <tr>
            <td class="lbl">Email:</td><td>{{ $data['email'] }}</td>
            <td class="lbl">Website:</td><td>{{ $data['website'] ?: 'N/A' }}</td>
        </tr>
    </table>

    <!-- Plan Table -->
    <div class="section-title">Selected Budget Plan</div>
    <table class="plan-table">
        <thead>
            <tr>
                <th class="col-sno">S. No.</th>
                <th class="col-city">City / Village</th>
                <th class="col-type">Type</th>
                <th class="col-state">State</th>
                <th class="col-host">Host Location</th>
                <th class="col-std">Standard<br>Solutions</th>
                <th class="col-optional">Optional Solutions</th>
                <th class="col-onetime">One Time Cost</th>
                <th class="col-monthly">Monthly Cost</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['tableData'] as $row)
            <tr>
                <td style="text-align:center;">{{ $row['s_no'] }}</td>
                <td><strong>{{ $row['city'] }}</strong></td>
                <td style="text-align:center; color:#6b7280;">{{ $row['city_type'] }}</td>
                <td style="text-align:center;">{{ $row['state'] }}</td>
                <td style="text-align:center;">{{ $row['host_location'] }}</td>
                <td style="text-align:center; color:#16a34a;">{{ $row['standard_solutions'] ? '✓' : '-' }}</td>
                <td>{{ $row['optional_solutions'] }}</td>
                <td style="text-align:right;">
                    @if($row['one_time_cost'] > 0)
                        ₹{{ number_format($row['one_time_cost']) }}
                    @else
                        ₹ -
                    @endif
                </td>
                <td style="text-align:right;">₹{{ number_format($row['monthly_cost']) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" style="text-align:left; padding-left:8px;">
                    <strong>Total ({{ count($data['tableData']) }} rows)</strong>
                </td>
                <td></td>
                <td style="text-align:right;">₹{{ number_format($data['totalOneTimeCost']) }}</td>
                <td style="text-align:right;">₹{{ number_format($data['totalMonthlyCost']) }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="pdf-footer">
        © {{ date('Y') }} Prarang. All rights reserved. &nbsp;|&nbsp; Our team will contact you shortly regarding your enrolment.
    </div>

</body>
</html>
