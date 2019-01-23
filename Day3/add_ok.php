<?php

//db connnect//
include("../inc/config.php");
$firstname = $lastname = $email ="";
//form data 가져오기//
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

//select SQL//

$str = "insert into MyGuest (firstname, lastname, email) values ('".$firstname."', '".$lastname."', '".$email."')";

if ($conn->query($str) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $str . "<br>" . $conn->error;
    die(" 에러");
}
$conn->close();
?>
<script>
  alert("데이터가 추가되었습니다.");
  location.href="list_page.php";
</script>
