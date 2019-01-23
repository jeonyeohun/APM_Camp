<?php
session_start() //세션 시작하기
?>
<!DOCTYPE html>
<html>
<body>

  <?php
  echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
  echo "Favorite animal is " . $_SESSION["favanimal"] . ".<br>";

  print_r($_SESSION); // 세션의 모든 변수 보이기
  ?>
</body>
</html>
