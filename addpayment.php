<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Module</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: calc(100% - 16px);
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            width: 100%;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .share-button {
            background-color: #3498db;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
        }

        .share-button:hover {
            background-color: #2980b9;
        }

        .print-button {
            background-color: #3498db;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
        }

        .print-button:hover {
            background-color: #2980b9;
        }

        @media print {
            body {
                background-color: #fff;
            }

            form {
                box-shadow: none;
                border: none;
                width: 100%;
            }

            h2 {
                margin-bottom: 10px;
            }

            button, .print-button, .share-button {
                display: none;
            }

            label {
                font-weight: bold;
            }

            input {
                border: none;
            }
        }
    </style>
</head>
<body>
    <form action="process_payment.php" method="post">
        <h2>Payment Form</h2>
        <label for="roll_id">Roll ID:</label>
        <input type="text" id="roll_id" name="roll_id" required>
        
        <label for="student_name">Student Name:</label>
        <input type="text" id="student_name" name="student_name" required>
        
        <label for="class">Class:</label>
        <input type="text" id="class" name="class" required>
        
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" step="0.01" required>

        <label for="customer_email">Customer Email:</label>
        <input type="email" id="customer_email" name="customer_email" required>
        
        <button type="submit">Submit Payment</button>
        <button type="button" class="share-button" onclick="shareViaEmail()">Share via Email</button>
        <button type="button" class="print-button" onclick="window.print()">Print</button>
    </form>

    <script>
        function shareViaEmail() {
            var rollId = document.getElementById('roll_id').value;
            var studentName = document.getElementById('student_name').value;
            var paymentAmount = document.getElementById('amount').value;
            var customerEmail = document.getElementById('customer_email').value;

            var emailSubject = 'Payment Details';
            var emailBody = 'Roll ID: ' + rollId + '\n' +
                            'Student Name: ' + studentName + '\n' +
                            'Payment Amount: $' + paymentAmount;

            var mailtoLink = 'mailto:' + customerEmail +
                             '?subject=' + encodeURIComponent(emailSubject) +
                             '&body=' + encodeURIComponent(emailBody);

            window.location.href = mailtoLink;
        }
    </script>
</body>
</html>
