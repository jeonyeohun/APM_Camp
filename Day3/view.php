<?php
  $id = trim($_GET['id']);
  if ($id==""){
    echo "<script>
      location.href='list_page.php';
    </script>
    ";
  }
  // DB connection //
  include("../inc/config.php");

  // select sql //
  $sql = "select * from MyGuest where id=$id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $conn->close();
  $lastname = $row['lastname'];
  $firstname = $row['firstname'];
  $email = $row['email'];
  $regdate = $row['regdate'];
 ?>

<html>
  <body>
    이름: <?=$lastname . " " . $firstname ;?> <br>
    이메일: <?=$email?> <br>
    등록일자: <?=$regdate?><br>
    <a href="list_page.php">리스트</a>
    <a href="add.php?id=<?=$id?>">수정</a>
    <a href="delete_ok.php?id=<?=$id?>">삭제</a>
  </body>
</html>
