<?php 

$db_host = "localhost";
$db_root = "root";
$db_password = "";
$db_name = "aquizzer";

//Create MySQLI object
$mysqli = new mysqli($db_host, $db_root, $db_password, $db_name);

if($mysqli -> connect_error){
    printf("Connect failed; #s/n", $mysqli -> connect_error);
    exit();

} else {
    echo "Good! <br>";
}
?>


<!--
    //Or we can use 

$connection = mysqli_connect("localhost", "root", "", "aquizzer");

if(mysqli_connect_errno()){
    echo "Failed to connect MySQL: ".mysqli_connect_error();
} else{ 
    echo "Good Job!";

}



-->