<?php
include 'php/db.php';

$sql = "SELECT * FROM reservations ORDER BY date, time";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Reservation Data</title>
    <style>
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #aaa;
            text-align: center;
        }
        th {
            background-color: #f0c9c0;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Reservation List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Booked By</th>
            <th>Date</th>
            <th>Time</th>
            <th>Persons</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['date'] ?></td>
            <td><?= date("h:i A", strtotime($row['time'])) ?></td>
            <td><?= $row['person_number'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
