<?php
// Database connection
$servername = "localhost";
$username = "2436217";
$password = "12gg3y";
$dbname = "db2436217";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query
$sql = "SELECT Book_name, Genre, Price, Date_of_release FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Books Table</title>
</head>
<body>

<h2>Books List</h2>

<table border="1">
    <tr>
        <th>Book Name</th>
        <th>Genre</th>
        <th>Price</th>
        <th>Date of Release</th>
    </tr>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["Book_name"] . "</td>
                <td>" . $row["Genre"] . "</td>
                <td>£" . number_format($row["Price"], 2) . "</td>
                <td>" . date("d/m/Y", strtotime($row["Date_of_release"])) . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No results</td></tr>";
}

$conn->close();
?>

</table>

</body>
</html>
