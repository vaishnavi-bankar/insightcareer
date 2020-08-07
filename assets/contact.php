<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "insightc";
    $password = "insightc";
    $dbname = "insight";

    $u_name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $u_email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
	$u_subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING); 
    $u_feedback = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
    
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO contactus (uname, email, usubject, feedback)
VALUES ('$u_name', '$u_email', '$u_subject', '$u_feedback')";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
    echo 'alert("Your Message successfully sent");';
    echo 'window.location.href="index.html";';
    echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
// $name=$_REQUEST["name"];
// $email=$_REQUEST["email"];
// $query=$_REQUEST["query"];

// mail("vaishnavipbankar@gmail.com",'MESSAGE',$query);
// echo "done";
// echo "<script type='text/javascript'> 
//  window.history.log(-1); 
// </script>" ;

?>