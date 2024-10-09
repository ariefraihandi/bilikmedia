<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email Address</title>
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
            background-color: #4e58f0; /* Replace with a blue that matches your site */
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
            background-color: #4e58f0; /* Button color matching the theme */
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
            color: #4e58f0; /* Link color matching the website */
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://bilikmedia.com/assets/images/logo/white-logo.png" alt="BilikMedia">
            <h2>Verify Your Email Address</h2>
        </div>
        <div class="content">
            <p><strong>{{ $username }}</strong>, thank you for registering with us!</p>
            <p>To complete your registration, please verify your email address by clicking the button below:</p>            
            <a href="{{ $verificationUrl }}" style="display: inline-block; background-color: #4e58f0; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-size: 16px;">Verify Email</a>
        </div>    
        <div class="footer">
            <p>&copy; 2024 BilikMedia | <a href="https://bilikmedia.com">Visit our website</a></p>
        </div>
    </div>
</body>
</html>
