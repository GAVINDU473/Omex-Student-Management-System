<?php
// CouseFeeInvoice.php

require_once '../../control/config.php';

$Receipt_Number = $_GET['Receipt_Number'];

// Fetch details from the database based on the Receipt_Number
$sql = "SELECT * FROM tbl_payment_course WHERE Receipt_Number = :Receipt_Number";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':Receipt_Number', $Receipt_Number, PDO::PARAM_STR);
$stmt->execute();
$paymentDetails = $stmt->fetch(PDO::FETCH_ASSOC);

// Display the payment details in the invoice format
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Fee Invoice</title>
    <!-- Include any necessary CSS styles here -->
    <style>
        /* Your CSS styles for the invoice */
    </style>
</head>
<body>

    <h1>Course Fee Invoice</h1>

    <table>
        <tr>
            <th>Roll Number</th>
            <td><?php echo $paymentDetails['Roll_Number']; ?></td>
        </tr>
        <tr>
            <th>Installment Number</th>
            <td><?php echo $paymentDetails['Installment_Number']; ?></td>
        </tr>
        <tr>
            <th>Receipt Number</th>
            <td><?php echo $paymentDetails['Receipt_Number']; ?></td>
        </tr>
        <tr>
            <th>Amount</th>
            <td><?php echo $paymentDetails['Amount']; ?></td>
        </tr>
        <tr>
            <th>Payment Date</th>
            <td><?php echo $paymentDetails['Payment_Date']; ?></td>
        </tr>
        <!-- Add more details as needed -->

    </table>

    <!-- Add any additional content or styling as needed -->

</body>
</html>

<?php
// Close the database connection
$conn = null;
?>
