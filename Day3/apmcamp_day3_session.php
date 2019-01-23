<?php
session_start() //세션 시작하기
?>
<!DOCTYPE html>
<html>
<body>

  <?php
  $_SESSION["favcolor"] = "green";
  $_SESSION["favanimal"] = "cat!!";
  $_SESSION["favanimal"] = "yellow";
  echo "Session variabels are set.";


  session_unset();// 세션변수 모두 삭제
  session_destroy(); // 세션 끝내기
  ?>
</body>
</html>
