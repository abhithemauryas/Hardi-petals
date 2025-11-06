<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> New Order Notification </title>
    <style>
        body {font-family: Arial, sans-serif;background:#f8f8f8;padding:20px;}
        .container{background:#ffffff;padding:25px;border-radius:8px;max-width:600px;margin:auto;box-shadow:0 0 10px rgba(0,0,0,0.08);}
        h2 {color: #333;margin-bottom: 15px;}
        .info-title { font-weight: bold; margin-top: 15px; color: #444; }
        .info-value { color: #222; margin-bottom: 10px; }
        .footer { margin-top: 25px; font-size: 13px; color: #777; text-align: center; }
    </style>
</head>
<body>

<div class="container">

    <h2> New Order Received </h2>

    <p class="info-title"> Name:</p>
    <p class="info-value">{{ $name }}</p>

    <p class="info-title"> Email:</p>
    <p class="info-value">{{ $email }}</p>

    <p class="info-title"> Phone:</p>
    <p class="info-value">{{ $phone }}</p>

    <p class="info-title"> City:</p>
    <p class="info-value">{{ $city }}</p>

    <p class="info-title"> Address:</p>
    <p class="info-value">{{ $address }}</p>

    <p class="info-title"> Ordered Products:</p>
    <p class="info-value">{{ implode(', ', $orderedProducts) }}</p>

    <div class="footer">
        This is an automated message — please do not reply.
    </div>

</div>

</body>
</html>
