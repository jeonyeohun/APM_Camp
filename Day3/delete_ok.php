<?php
include("../inc/config.php");
$id = "";
$id = trim($_GET['id']);

$sql = "delete from MyGuest where id = $id";
if ($conn->query($sql) === TRUE) {
    echo "The record is deleted successfully";
} else {
    die( "Error: " . $sql . "<br>" . $conn->error);

}
$conn->close();
?>
<script>
  alert("데이터가 삭제되었습니다.");
  location.href="list_page.php";
</script>
