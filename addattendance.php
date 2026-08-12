<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
            margin: auto;
        }

        .header {
            background-color: #4CAF50;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .form-container {
            padding: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            color: #333;
        }

        input, select, button {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }

        select {
            appearance: none;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }

        .feedback, .error {
            margin-top: 15px;
            color: #4CAF50;
            text-align: center;
        }

        #report-section {
            padding: 20px;
            background-color: #fff;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 style="margin: 0;">Attendance System</h2>
        </div>

        <div class="form-container">
            <h3 style="color: #333;">Mark Attendance</h3>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <label for="student_id">Student ID:</label>
                <input type="text" name="student_id" required>

                <label for="student_email">Student Email:</label>
                <input type="email" name="student_email" required>

                <label for="attendance_status">Attendance Status:</label>
                <select name="attendance_status" required>
                    <option value="present">Present</option>
                    <option value="absent">Absent</option>
                </select>

                <button type="submit" name="mark_attendance">Submit Attendance</button>

                
            </form>
        </div>

        <div id="report-section">
            <h3 style="color: #333;">Generate Attendance Report</h3>

            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" required>

                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" required>

                <button type="submit" name="generate_report">Generate Report</button>
            </form>

            <?php
            // Display the generated attendance report
            if (isset($attendance_report)) {
                echo $attendance_report;
            }
            ?>
        </div>
    </div>
</body>
</html>
