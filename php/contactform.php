<?php
// getting all values from the HTML form, $message = mysql_real_escape_string($message);
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
}

// database details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio3";

// creating a connection
$con = mysqli_connect($host, $username, $password, $dbname);

function function_alert($message)
{
    //if(confirm('Your Record Sucessfully Inserted. Now Login')){document.location.href='contactme.html'};
    // Display the alert box  
    //echo "<script>alert('$message');</script>"; 
    echo "<script>if(confirm('$message')){document.location.href='localhost/portfolio3/contactme.html'};</script>";
}
// to ensure that the connection is made
if (!$con) {
    die("Connection failed!" . mysqli_connect_error());
}

// using sql to create a data entry query
$sql = "INSERT INTO messages (id, name, email, message) VALUES ('0', '$name', '$email', '$message')";

// send query to the database to add values and confirm if successful
$rs = mysqli_query($con, $sql);
if ($rs) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Message Sent Succesfully!')
    window.location.href='../contactme.html';
    </SCRIPT>");
}

// close connection
mysqli_close($con);
?>