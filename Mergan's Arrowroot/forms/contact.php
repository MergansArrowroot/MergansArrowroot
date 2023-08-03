<!DOCTYPE html>
<html>
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
uploadData();
  }

  function uploadData(){
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
     $email = $_POST['email'];
     $feedback = $_POST['feedback'];

  }
  //Submitting the Database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "feedback";


  $conn = mysql_connect($servername, $username, $password, $database);

  if (!conn){
    echo '<div class = "alert alert-warning alert-dismissible fade show" role"alert" <strong>Connection Failed</strong> ></div>'. mysql_connect_error();
  }
  else{
    $sql = "INSERT INTO `userfeedback` (`email`, `feedback`, `date`) VALUES ('$email', '$feedback', current_timestamp())";
    $result = mysql_query($conn, $sql);
    if ($result){
      echo '<div class = "alert alert-warning alert-dismissible fade show" role"alert" <strong>Success!</strong> feedback is submitted from' .$email. 'Thank you!!!></div>'.;
    }
    else{
      echo '<div class = "alert alert-warning alert-dismissible fade show" role"alert" <strong>Error uploading data</strong></div>'. mysql_error($conn, $sql);

    }
  }
}
?>
</html>
