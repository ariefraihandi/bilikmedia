<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claim Your First Credit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #4e58f0;
            color: white;
            text-align: center;
            padding: 20px;
        }
        .header img {
            width: 120px;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .button {
            display: inline-block;
            background-color: #4e58f0;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 14px;
        }
        .footer a {
            color: #4e58f0;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://bilikmedia.com/assets/images/logo/white-logo.png" alt="BilikMedia">
            <h2>Your Profile is Incomplete</h2>
        </div>
        <div class="content">
            <p>Dear {{ $user->username }},</p>
            <p>Complete your profile to claim your first free credit.</p>
            <a href="{{ route('user.profile') }}" style="display: inline-block; background-color: #4e58f0; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-size: 16px;">Complete Now</a>
        </div>
        <div class="footer">
            <p>&copy; 2024 BilikMedia | <a href="https://bilikmedia.com">Visit our website</a></p>
        </div>
    </div>
</body>
</html>