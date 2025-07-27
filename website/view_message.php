<?php
$conn = new mysqli("localhost", "root", "", "hotel_paradise");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM contact_messages ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #999;
            padding: 12px 15px;
            text-align: center;
        }
        th {
            background-color: #333;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<h2>📋 Contact Messages</h2>

<table>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>phone</th>
        <th>message</th>
        <th>created_at</th>
    </tr>

    <?php
    if ($result->num_rows > 0):
        while($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['message'] ?></td>
            <td><?= $row['created_at'] ?></td>
        </tr>
    <?php
        endwhile;
    else:
    ?>
        <tr>
            <td colspan="6">No messages found.</td>
        </tr>
    <?php endif; ?>

</table>

</body>
</html>

<?php $conn->close(); ?>
