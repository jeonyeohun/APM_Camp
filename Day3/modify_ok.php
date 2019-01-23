<?php
//db connnect//
include("../inc/config.php");
$id = $firstname = $lastname = $email ="";
$id = $_GET['id'];

//form data 가져오기//
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

//select SQL//

$sql = "update MyGuest set firstname='$firstname', lastname='$lastname',email='$email' where id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "The record is modified successfully";
} else {
    die( "Error: " . $sql . "<br>" . $conn->error);

}
$conn->close();
?>
<script>
  alert("데이터가 수정되었습니다.");
  location.href="list_page.php";
</script>
