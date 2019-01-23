<?php
$ok = $userid = "";

if(isset($_COOKIE['userid'])){
  $userid = $_COOKIE['userid'];
  $ok = "checked";
}
 ?>

<html>
<body>
<form name= "login" method = "post" action = "login_ok.php">
  아이디: <input type="text" name="id" value="<?php echo $userid; ?>"></br>
  비밀번호: <input type="password" name="pwd"></br>
  <input type = "checkbox" name="saveid" value="1"<?php echo $ok;?> >아이디 저장</br>
  <input type = "submit" value = "로그인" >
</form>
</body>
</html>
