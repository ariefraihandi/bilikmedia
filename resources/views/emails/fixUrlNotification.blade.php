<!DOCTYPE html>
<html>
<head>
    <title>Request Download Update</title>
</head>
<body>
    <h2>Request Download Update</h2>
    <p>Dear Admin,</p>
    <p>The following request download has been updated:</p>
    
    <ul>
        <li><strong>ID:</strong> {{ $download->id }}</li>
        <li><strong>Email:</strong> {{ $download->email }}</li>
        <li><strong>New URL:</strong> {{ $download->url }}</li>
        <li><strong>Status:</strong> {{ $download->status }}</li>
    </ul>

    <p>Please process this request as soon as possible.</p>

    <p>Best regards,<br>Bilik Media</p>
</body>
</html>
