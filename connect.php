<?php
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $text = isset($_POST['text']) ? $_POST['text']:"";

    $conn = new mysqli('localhost','root','','portoweb');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into message(fullname, email, text) values(?, ?, ?)");
        $stmt->bind_param("sss",$fullname, $email, $text);
        $stmt->execute();
        echo "message delivered..";
        $stmt->close();
        $conn->close();
    }
?>


if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['text'] )){
    $sname ="localhost";
    $uname = "root";
    $password ="";
    $db_name = "portoweb";
    
    $conn = mysqli_connect($sname, $uname, $password, $password, $db_name);
    
    if (!$conn){
        echo "Connection Failed!";
        exit();
    }
}else{
    header("Location:index.html")
}
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$text = $_POST["text"];

$query = "INSERT INTO message (fullname, email, text) VALUES('$fullname','$email','$text')";

mysqli_query($koneksi, $query);
echo "message delivered..";
?>
