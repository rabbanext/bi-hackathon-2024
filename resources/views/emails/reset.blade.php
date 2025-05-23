<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <table align="center" width="100%" style="max-width: 600px; background-color: white; padding: 20px; border-radius: 6px;">
        <tr>
            <td>
                <h2 style="color: #333;">Halo {{ $user->name }},</h2>
                <p>Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda.</p>
                <p style="text-align: center; padding: 20px 0;">
                    <a href="{{ $url }}" style="padding: 12px 20px; background-color: #3490dc; color: white; text-decoration: none; border-radius: 4px;">
                        Reset Password
                    </a>
                </p>
                <p>Link ini akan kedaluwarsa dalam 60 menit.</p>
                <p>Jika Anda tidak meminta reset password, abaikan email ini.</p>
                <p>Salam,<br>Tim Kami</p>
            </td>
        </tr>
    </table>
</body>
</html>
