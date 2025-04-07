<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Done, Thank You</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        .icon {
            font-size: 80px;
            color: #28a745;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">&#10004;</div>
        <h1>Order Done, Thank You!</h1>
        <p>Your order has been successfully placed.</p>
        <p>Your Transection no. is <?php echo $payment_history["ORDERID"];?></p>
        <p>Total Amount:  <?php echo $payment_history["TXNAMOUNT"];?></p>
        <p>Thank you for shopping with us!</p>
        <a href="<?php echo base_url() ?>" class="btn">Continue Shopping</a>
    </div>
</body>
</html>