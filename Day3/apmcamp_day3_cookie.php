<?php
$cookie_name = "user";
$cookie_value = "John Doe";

setcookie($cookie_name, $cookie_value, time()-(86400*30), "/");
// user라는 이름, John Doe라는 값, 30일의 유효기간, 모든 웹사이트에서 사용가능한 쿠키 생성.
// setcookie() 함수는 항상 <html>태그 앞에 나와야함!
// 유효기간을 음수로 지정하면 쿠키가 삭제된다.
?>
<html>
<body>
  <?php
  if(!isset($_COOKIE[$cookie_name])){
    echo "Cookie named '" . $cookie_name . "' is not set!";
  }
  else{
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
  }
  ?>

  <p><strong>Note:</strong> You might have to reload the page to see the new value of the cookie.</p>
</body>
</html>
