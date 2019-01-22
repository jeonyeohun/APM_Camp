<?php
$idErr = $yakcheckErr= $pwdErr = $birth_yearErr = $birth_monthErr = $birth_dayErr = $birth_dateErr = $email1Err = $email2Err = $genderErr = $PN1Err = $PN2Err = $PN3Err = "";
$id = $pwd2 = $pwd = $check= $birth_year = $birth_month = $birth_day = $birth_date = $email1 = $email2 = $email = $gender = $PN1 = $PN2 = $PN3 =$PN = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (empty($_POST["Id"])){
    $idErr = "아이디를 입력하세요.";
  }else{
    $id = test_input($_POST["Id"]);
    echo "아이디: $id<br>";
  }

  if (empty($_POST["pwd"])){
    $pwdErr = "비밀번호를 입력하세요.";
  }else{
    $pwd = test_input($_POST["pwd"]);
    echo "비밀번호: $pwd<br>";
  }

  if (empty($_POST["name"])){
    $nameErr = "이름을 입력하세요.";
  }else{
    $name = test_input($_POST["name"]);
    echo "성명: $name<br>";
  }

  if (empty($_POST["year"])){
    $yearErr = "태어난 년도를 입려하세요";
  }else{
    $birth_year = test_input($_POST["year"]);
  }

  if (empty($_POST["month"])){
    $birth_monthErr = "태어난 달을 입력하세요.";
  }else{
    $birth_month = test_input($_POST["month"]);
  }
  if (empty($_POST["day"])){
    $birth_dayErr = "태어난 날짜를 입력하세요.";
  }else{
    $birth_day = test_input($_POST["day"]);
  }
  if (empty($_POST["email"])){
    $email1Err = "이메일을 입력하세요.";
  }else{
    $email1 = test_input($_POST["email"]);
  }
  if (empty($_POST["address"])){
    $email2Err = "이메일 주소를 선택하세요.";
    echo "이메일: $email1" . "@" . "$email2<br>";
  }else{
    $email2 = test_input($_POST["address"]);
  }
  if (empty($_POST["gender"])){
    $genderErr = "성별을 선택하세요.";
  }else{
    $gender = test_input($_POST["gender"]);
    echo "성별: $gender<br>";
  }
  if (empty($_POST["firstPN"])){
    $PN1Err = "전화번호를 제대로 입력하세요.";
  }else{
    $PN1 = test_input($_POST["firstPN"]);
  }
  if (empty($_POST["middlePN"])){
    $PN2Err = "전화번호를 제대로 입력하세요.";
  }else{
    $PN2 = test_input($_POST["middlePN"]);
  }
  if (empty($_POST["lastPN"])){
    $PN3Err = "전화번호를 제대로 입력하세요.";
  }else{
    $PN3 = test_input($_POST["lastPN"]);
    echo "전화번호: $PN1" . "-" . "$PN2" . "-" . "$PN3<br>";
  }
  if (empty($_POST["yakcheck"])){
    $yakcheckErr = "약관에 동의하세요.";
  }else{
    $check = test_input($_POST["yakcheck"]);
    echo "약관에 동의하셨습니다.";
  }
}

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
