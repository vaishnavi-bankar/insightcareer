<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "insightc";
    $password = "insightc";
    $dbname = "insight";

    $sname = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $semail = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
	$scontact = filter_var($_POST["mob"], FILTER_SANITIZE_STRING); 
    $scategory = filter_var($_POST["category"], FILTER_SANITIZE_STRING);
    $scity = filter_var($_POST["city"], FILTER_SANITIZE_STRING);
    
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO registeration (s_name, s_email, s_contact, s_category, s_city)
VALUES ('$sname', '$semail', '$scontact', '$scategory', '$scity')";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
    echo 'alert("Registeration Complete.");';
    echo 'window.location.href="services.html";';
    echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>