<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['submit']))
{
$studentname=$_POST['studentName'];
$roolid=$_POST['rollid']; 
$studentClass=$_POST['studentClass']; 
$classid=$_POST['classID']; 
$amount=$_POST['amount'];
$cardnumber=$_POST['cardNumber'];
$cardName=$_POST['cardName'];
$expirationDat=$_POST['expirationDat']; 
$cvv=$_POST['cvv']; 
$status=1;
$sql="INSERT INTO  tblstudents(StudentName,RollId,StudentEmail,Gender,ClassId,DOB,Status) VALUES(:studentname,:roolid,:studentemail,:gender,:classid,:dob,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':studentname',$studentname,PDO::PARAM_STR);
$query->bindParam(':roolid',$roolid,PDO::PARAM_STR);
$query->bindParam(':studentemail',$studentemail,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':classid',$classid,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Student info added successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Payment Interface</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .payment-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 350px;
            text-align: center;
        }

        .payment-container h2 {
            color: #007bff;
            margin-bottom: 20px;
        }

        .payment-form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
            outline: none;
        }

        .payment-form button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .payment-form button:hover {
            background-color: #0056b3;
        }

        .download-link,
        .print-button {
            display: inline-block;
            margin-top: 15px;
            color: #28a745;
            text-decoration: none;
            cursor: pointer;
        }

        .download-link:hover,
        .print-button:hover {
            text-decoration: underline;
        }

        .payment-form label {
            display: block;
            margin-bottom: 10px;
            color: #6c757d;
            font-size: 14px;
            text-align: left;
        }

        .payment-form input[type="radio"] {
            margin-right: 5px;
            cursor: pointer;
        }

        .payment-options {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .payment-options label {
            display: flex;
            align-items: center;
        }

        .payment-options input[type="radio"] {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h2>Secure Payment <i class="fas fa-lock"></i></h2>
        <form class="payment-form">
            <label for="studentName">Student Name</label>
            <input type="text" id="studentName" name="studentName" required>

            <label for="rollId">Roll ID</label>
            <input type="text" id="rollId" name="rollId" required>

            <label for="studentClass">Class</label>
            <input type="text" id="studentClass" name="studentClass" required>

            <label for="ClassID ">ClassID </label>
            <input type="text" id="ClassID " name="ClassID " required>

            <label for="amount">Amount</label>
            <input type="text" id="amount" name="amount" required>

            <div class="payment-options">
                <label>
                    <input type="radio" name="paymentMethod" value="card" checked>
                    <span>Card</span>
                </label>
                <label>
                    <input type="radio" name="paymentMethod" value="cash">
                    <span>Cash</span>
                </label>
            </div>

            <label for="cardNumber">Card Number</label>
            <input type="text" id="cardNumber" name="cardNumber" required>

            <label for="cardName">Name on Card</label>
            <input type="text" id="cardName" name="cardName" required>

            <div class="flex-container">
                <div class="half-width">
                    <label for="expirationDate">Expiration Date</label>
                    <input type="text" id="expirationDate" name="expirationDate" required>
                </div>
                <div class="half-width">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" required>
                </div>
            </div>

            <button type="submit">Make Payment</button>
        </form>

        <!-- Download link for the receipt -->
        <a href="path/to/your/receipt.pdf" class="download-link" download>Download Receipt <i class="fas fa-download"></i></a>

        <!-- Print button for the receipt -->
        <button class="print-button" onclick="printReceipt()">Print Receipt <i class="fas fa-print"></i></button>
    </div>

    <script>
        function printReceipt() {
            window.print();
        }
    </script>
</body>
</html>
