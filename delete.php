<?php
// Tworzenie połączenia z bazą danych (tak jak wcześniej)
session_start();

    if(!isset($_SESSION['logged']))
    {
      header('Location: admin.php');
      exit();
    }

require_once "connect.php";

$conn = @new mysqli($host, $db_user, $db_password, $db_name, $db_port);


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Zapytanie SQL do usuwania rekordu
    $sql = "DELETE FROM clients WHERE ID = $id"; // Zastąp 'table_name' odpowiednią nazwą tabeli.

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid or missing ID.";
}

$conn->close();

header('Location: panel.php')
?>