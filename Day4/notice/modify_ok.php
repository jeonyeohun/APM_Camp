<?php
//db connnect//
include("../../inc/config.php");
$title = $detail = $writer = $isNotice="";
$id = $_GET['id'];
//form data 가져오기//
$title = $_POST['title'];
$detail = $_POST['detail'];
$writer = $_POST['writer'];
if($isNotice = $_POST['isNotice'] == ""){
  $isNotice = 'N';
}
else{
  $isNotice = "Y"
  ;
}

//select SQL//

$sql = "update handonglist set title='$title', detail='$detail',writer='$writer', isNotice='$isNotice' where id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "The record is modified successfully";
} else {
    die( "Error: " . $sql . "<br>" . $conn->error);
}
$conn->close();
?>
<script>
  alert("데이터가 수정되었습니다.");
  location.href="list.php";
</script>
