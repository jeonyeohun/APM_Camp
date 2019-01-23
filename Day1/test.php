<?php
$namErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (empty($_POST["name"])){
    $nameErr = "Name is required";
  }else{
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])){
    $nameErr = "Email is required";
  }else{
    $name = test_input($_POST["email"]);
  }

  if (empty($_POST["gender"])){
    $nameErr = "gender is required";
  }else{
    $name = test_input($_POST["gender"]);
  }

  if (empty($_POST["comment"])){
    $nameErr = "Comment is required";
  }else{
    $name = test_input($_POST["comment"]);
  }

  if (empty($_POST["website"])){
    $nameErr = "website is required";
  }else{
    $name = test_input($_POST["website"]);
  }
}
?>

<html>
<body>
  <h1>PHP - A Simple HTML Form</h1>
  <form method="post">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    website: <input type="text" name="website"><br>
    Comment: <textarea name="commnet" rows="5" cols="40">
    Gender:
      <input type=raido name="gender" value= "female">Female
      <input type=raido name="gender" value= "male">Male
      <input type=raido name="gender" value= "other">Other
    <input type= "submit">
  </form>
</body>
</html>
