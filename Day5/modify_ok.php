<?php
//db connnect//
include("../../inc/config.php");
$title = $detail = $writer = $isNotice="";
$id = $_GET['id'];
//form data 가져오기//
$title = $_POST['title'];
$detail = $_POST['detail'];
$writer = $_POST['writer'];
$Category = $_POST['Category'];
if($isNotice = $_POST['isNotice'] == ""){
  $isNotice = 'N';
}
else{
  $isNotice = "Y";
}
$file1['file1'];
$file2['file2'];

//select SQL//



if(empty($_FILES)==FALSE){
  if(empty($_FILES["fileToUpload1"])==FALSE){
    $target_dir = "../../uploads/"; // specifices the directory where the file is going to be placed
    $target_file = $target_dir .
    basename($_FILES['fileToUpload1']["name"]);
    $mimeType1 = $_FILES['fileToUpload1']['type'];

    if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
        echo "파일1 업로드 완료.<br>";
        } else {
        echo "업로드할 파일이 없습니다.<br>";
        }
      }

  if(empty($_FILES["fileToUpload2"])==FALSE){
        $target_dir = "../../uploads/"; // specifices the directory where the file is going to be placed
        $target_file = $target_dir .
        basename($_FILES['fileToUpload2']["name"]);

        if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
            echo "파일2이 업로드 완료<br>";
            } else {
            echo "업로드할 파일이 없습니다.<br>";
            }
          }
        }

$file1 = $_FILES["fileToUpload1"]["name"];
$file2 = $_FILES["fileToUpload2"]["name"];

$sql = "update handonglist set title='$title', detail='$detail', writer='$writer', isNotice='$isNotice', category='$Category', file1='$file1', file2='$file2' where id='$id'";
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
