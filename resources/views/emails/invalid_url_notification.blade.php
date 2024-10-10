<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invalid URL Notification</title>
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
            <h2>Invalid URL Notification</h2>
        </div>
        <div class="content">
            <p>Dear Bilik Media User,</p>
            <p>The URL you provided for the download is invalid or incorrect:</p>
            <p><strong>{{ $url }}</strong></p>
            <p>Please check the URL and resubmit a correct one to ensure that your request can be processed.</p>
            <br>
            <p><strong>Fix it</strong></p>            
            <a href="{{ $fixUrl }}" style="display: inline-block; background-color: #4e58f0; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-size: 16px;">View Download History</a>
        </div>
        <br>
        <div class="footer">
            <p>&copy; 2024 BilikMedia | <a href="https://bilikmedia.com">Visit our website</a></p>
        </div>
    </div>
</body>
</html>
