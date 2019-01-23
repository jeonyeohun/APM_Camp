<?php
$namErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (empty($_POST["name"])){
    $nameErr = "Name is required";
  }else{
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)){
      $nameErr = "Only letters and white space allowed";
    }
    echo "name: " . "$name<br>";
  }

  if (empty($_POST["email"])){
    $emailErr = "Email is required";
  }else{
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $emailErr = "Invalid email format";
    }
    echo "email: " . "$email<br>";
  }

  if (empty($_POST["gender"])){
    $genderErr = "gender is required";
  }else{
    $gender = test_input($_POST["gender"]);
    echo "gender: " . "$gender<br>";
  }

  if (empty($_POST["comment"])){
    $commentErr = "Comment is required";
  }else{
    $comment = test_input($_POST["comment"]);
    echo "comment: " . "$comment<br>";
  }

  if (empty($_POST["website"])){
    $websiteErr = "website is required";
  }else{
    $website = test_input($_POST["website"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
    echo "website: " . "$website<br>";
  }
}

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<html>
<body>
  <h1>PHP - A Simple HTML Form</h1>
  <form method="post">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    website: <input type="text" name="website"><br>
    Comment: <textarea name="comment" rows="5" cols="40"></textarea><br>
    Gender:
      <input type="radio" name="gender" value="female">Female
      <input type="radio" name="gender" value="male">Male
      <input type="radio" name="gender" value="other">Other
      <br>
    <input type="submit">
  </form>
</body>
</html>
