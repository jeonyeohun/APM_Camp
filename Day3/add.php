<?php
include("../inc/config.php");
$id="";
$id = trim($_GET['id']);
$add = "";
$type = "";

if ($id == ""){
  $action = "add_ok.php";
  $add = "add";
}else{
  $action = "modify_ok.php?id=$id";
  $add = "modify";
  $type = "New";
}
$conn->close();

 ?>

<html>
  <body>
    <form method = "post" action = <?=$action?>>
      <?=$type?> 성 : <input type= "text" name=lastname><br>
      <?=$type?> 이름 : <input type= "text" name=firstname><br>
      <?=$type?> E-mail : <input type= "text" name=email><br>
      <input type="submit" value = <?=$add?>>
    </form>
  </body>
</html>
