<?php
include("../inc/config.php");
$id = $_GET['id'];
?>
<html>
  <body>
    <form method = "post" action = "modify_ok.php?id=<?=$id?>">
      New First Name : <input type= "text" name=firstname><br>
      New Last Name : <input type= "text" name=lastname><br>
      New E-mail : <input type= "text" name=email><br>
      <input type="submit" value = "Modify">
    </form>
  </body>
</html>
