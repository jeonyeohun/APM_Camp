<?php
$id = $pwd = $saveid = "";

$id = $_POST['id'];
$pwd = $_POST['pwd'];
$saveid = $_POST['saveid'];
$cookie_name = "userid";
$cookie_value = $id;

if ($saveid == 1){
  setcookie($cookie_name, $cookie_value, time()+(86400*30), "/");
}
?>

<html>
<body>
  아이디: <?php echo $id?><br>
  비번: <?php echo $pwd?><br>
  쿠키에 저장?: <?php
  if(!isset($_COOKIE[$cookie_name])){
    echo "Cookie named '" . $cookie_name . "' is not set!";
  }
  else{
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
  }
  ?>

</body>
</html>
