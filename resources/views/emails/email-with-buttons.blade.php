<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Test</title>
</head>
<body>
    <p>Dear User,</p>
    
    <p>Please select a button:</p>
    
    <p>
        <a href="{{ route('handle-response', ['email' => $userEmail, 'response' => 'yes']) }}" style="background-color: green; color: white; padding: 10px 20px; text-decoration: none;">Yes</a>
        <a href="{{ route('handle-response', ['email' => $userEmail, 'response' => 'no']) }}" style="background-color: red; color: white; padding: 10px 20px; text-decoration: none;">No</a>
        <a href="{{ route('handle-response', ['email' => $userEmail, 'response' => 'maybe']) }}" style="background-color: orange; color: white; padding: 10px 20px; text-decoration: none;">Maybe</a>
    </p>

    <p>Thank you!</p>
</body>
</html>
