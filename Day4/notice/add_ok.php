<?php
//db connnect//
include("../../inc/config.php");
$title = $detail = $writer = $isNotice=$file1=$file2="";
//form data 가져오기//
$title = $_POST['title'];
$detail = $_POST['detail'];
$writer = $_POST['writer'];
if(empty($isNotice)){
  $isNotice = "N";
}
else{
  $isNotice = $_POST['isNotice'];
}

//select SQL//


if(empty($_FILES)==FALSE){
  if(empty($_FILES["fileToUpload1"])==FALSE){
    $target_dir = "../../uploads/"; // specifices the directory where the file is going to be placed
    $target_file = $target_dir .
    basename($_FILES['fileToUpload1']["name"]);
    $mimeType1 = $_FILES['fileToUpload1']['type'];

    if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
        echo $_FILES['fileToUpload1']["name"];
        echo $_FILES['fileToUpload1']["type"];
        } else {
        echo "파일1 업로드 에러";
        }
      }

  if(empty($_FILES["fileToUpload2"])==FALSE){
        $target_dir = "../../uploads/"; // specifices the directory where the file is going to be placed
        $target_file = $target_dir .
        basename($_FILES['fileToUpload2']["name"]);

        if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
            echo "파일2이 업로드 됨";
            } else {
            echo "파일2 업로드 에러";
            }
          }
        }

$str = "insert into handonglist (title, detail, writer, isNotice, file1, file2) values ('".$title."', '".$detail."', '".$writer."', '".$isNotice."', '".$_FILES['fileToUpload1']["name"]."', '".$_FILES['fileToUpload2']["name"]."')";
if ($conn->query($str) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $str . "<br>" . $conn->error;
    die(" 에러");
}
$conn->close();
?>
<!--<script>
  alert("데이터가 추가되었습니다.");
  location.href="list.php";
</script>-->
