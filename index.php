<!DOCTYPE html>
<html lang="pt-br">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
</head>
 
<body>
    <div class="container my-5">
        <h2>List of clients</h2>
        <a href="create.php" class="btn btn-primary" role="button">New client</a>
        <br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $database = "dt_crud";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Read all rows from the database table
        $sql = "SELECT * FROM clients";
        $result = $conn->query($sql);
        if(!$result) {
            die("Invalid query: " . $conn->connect_error);
        }
        // Read data from each row
        while($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['address']}</td>
                <td>{$row['created_at']}</td>
                <td>
                    <a class='btn btn-primary' href='edit.php?id={$row['id']}'>Edit</a>
                    <a class='btn btn-danger' href='delete.php?id={$row['id']}'>Delete</a>
                </td>
            </tr>
            ";
        }
    ?>
    </tbody>
</table>
 