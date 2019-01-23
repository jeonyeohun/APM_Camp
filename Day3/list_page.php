<?php
  // DB connection //
  include("../inc/config.php");

// select sql //
$sql = "select * from MyGuest order by regdate desc";
$result = $conn->query($sql);

?>

<html>
<head>
  <style>
  table, th, td{
    border: 1px solid black;
  }
  </style>
</head>
  <body>
      <table width=800 borer="1">
        <tr>
          <td align="center">번호</td>
          <td width=60 align="center">성</td>
          <td align="center">이름</td>
          <td align="center">E-mail</td>
          <td align="center">등록일자</td>
          <td align="center">정보보기</td>
        </tr>
        <?php
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()){
      ?>
      <tr>
        <td align="center"><?= $row['id']?></td>
        <td align="center"><?= $row['lastname']?></td>
        <td align="center"><?= $row['firstname']?></td>
        <td align="center"><?= $row['email']?></a></td>
        <td align="center"><?= $row['regdate']?></a></td>
        <td align="center"><a href="view.php?id= <?= $row['id']?> ">정보보기</a></td>
      </tr>
      <?php
    }
  }
  ?>
      </table><br>
      <a href='add.php'> 데이터 추가 </a>
  </body>
</html>
