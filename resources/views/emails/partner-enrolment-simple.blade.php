<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Prarang Indian Cities Enrolment</title>
</head>

<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; background-color: #f1f5f9; margin: 0; padding: 24px;">

    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; border: 1px solid #e2e8f0;">

        {{-- ===== HEADER ===== --}}
        <div style="background: #1e40af; padding: 36px 32px; text-align: center;">
            <div style="display: inline-block; background: rgba(255,255,255,0.15); padding: 6px 18px; border-radius: 24px; margin-bottom: 16px; font-size: 12px; font-weight: 600; color: rgba(255,255,255,0.9); letter-spacing: 0.08em; text-transform: uppercase;">
                ✦ PRARANG
            </div>
            <h1 style="margin: 0 0 8px; font-size: 22px; font-weight: 600; color: #ffffff;">Partnership Enrolment</h1>
            <p style="margin: 0; font-size: 14px; color: rgba(255,255,255,0.75);">Digital Marketing Plan Request</p>
        </div>

        {{-- ===== BODY ===== --}}
        <div style="padding: 32px;">

            <p style="font-size: 16px; color: #1e293b; margin: 0 0 8px;">Dear {{ $data['name'] }},</p>
            <p style="font-size: 14px; color: #64748b; margin: 0 0 28px; line-height: 1.7;">
                We are interested in partnering with Prarang for the selected Knowledge Web Geographies by language below. Our preference for respective KW for the Standard Solution and the Optional City-Interaction Solution is also indicated in the selection. </p>

            {{-- Section Label --}}
            <p style="font-size: 11px; font-weight: 600; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.08em; margin: 0 0 12px;">Contact Details</p>

            {{-- Info Grid (2-column table layout for email clients) --}}
            <table style="width: 100%; border-collapse: separate; border-spacing: 10px; margin: 0 -10px 16px; table-layout: fixed;">
                <tr>
                    <td style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 14px; vertical-align: top; width: 50%;">
                        <div style="font-size: 11px; color: #94a3b8; margin-bottom: 3px;">👤 Name</div>
                        <div style="font-size: 14px; font-weight: 600; color: #1e293b;">{{ $data['name'] }}</div>
                    </td>
                    <td style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 14px; vertical-align: top; width: 50%;">
                        <div style="font-size: 11px; color: #94a3b8; margin-bottom: 3px;">📅 Date</div>
                        <div style="font-size: 14px; font-weight: 600; color: #1e293b;">{{ $data['date'] }}</div>
                    </td>
                </tr>
                <tr>
                    <td style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 14px; vertical-align: top;">
                        <div style="font-size: 11px; color: #94a3b8; margin-bottom: 3px;">📱 Mobile</div>
                        <div style="font-size: 14px; font-weight: 600; color: #1e293b;">{{ $data['mobile'] }}</div>
                    </td>
                    <td style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 14px; vertical-align: top;">
                        <div style="font-size: 11px; color: #94a3b8; margin-bottom: 3px;">🏢 Company</div>
                        <div style="font-size: 14px; font-weight: 600; color: #1e293b;">{{ $data['company_name'] ?: 'N/A' }}</div>
                    </td>
                </tr>
                <tr>
                    <td style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 14px; vertical-align: top;">
                        <div style="font-size: 11px; color: #94a3b8; margin-bottom: 3px;">✉️ Email</div>
                        <div style="font-size: 14px; font-weight: 600; color: #1e293b; word-break: break-all;">{{ $data['email'] }}</div>
                    </td>
                    <td style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 14px; vertical-align: top;">
                        <div style="font-size: 11px; color: #94a3b8; margin-bottom: 3px;">🌐 Website</div>
                        <div style="font-size: 14px; font-weight: 600; color: #1e293b; word-break: break-all;">{{ $data['website'] ?: 'N/A' }}</div>
                    </td>
                </tr>
            </table>

            {{-- Attachment Notice --}}
            <div style="background: #eff6ff; border-left: 3px solid #3b82f6; border-radius: 0 8px 8px 0; padding: 14px 16px; margin-bottom: 20px; display: flex; align-items: flex-start;">
                <span style="margin-right: 10px; font-size: 18px; line-height: 1.4;">📎</span>
                <p style="margin: 0; font-size: 14px; color: #475569; line-height: 1.6;">
                    A detailed digital marketing plan has been attached as a <strong style="color: #1e293b;">PDF file</strong> for your reference.
                </p>
            </div>

            {{-- Plan Link --}}
            <p style="font-size: 11px; font-weight: 600; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.08em; margin: 0 0 10px;">📊 Digital Marketing Plan Link</p>
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 16px; margin-bottom: 28px;">
                <a href="{{ $data['shareUrl'] }}" style="font-size: 13px; color: #2563eb; word-break: break-all; text-decoration: none;">
                    {{ $data['shareUrl'] }}
                </a>
            </div>

            {{-- Divider --}}
            <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 0 0 24px;">

            {{-- Signature --}}
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="width: 42px; height: 42px; min-width: 42px; border-radius: 50%; background: #dbeafe; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 700; color: #1e40af; text-align: center; line-height: 42px;">PR</div>
                <div>
                    <p style="margin: 0; font-size: 14px; font-weight: 600; color: #1e293b;">Prarang Team</p>
                    <p style="margin: 2px 0 0; font-size: 12px; color: #94a3b8;">Partnership &amp; Digital Marketing</p>
                </div>
            </div>

        </div>

        {{-- ===== FOOTER ===== --}}
        <div style="background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 16px 32px; text-align: center; font-size: 12px; color: #94a3b8;">
            &copy; {{ date('Y') }} Prarang. All rights reserved.
        </div>

    </div>
</body>

</html>
