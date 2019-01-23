<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
?>

<!DOCTYPE html>
<html>
<body>

  <h1>My first PHP page</h1>

  <?php
  echo "Hellp world!";
  ECHO "Hello world!<br>";
  EcHo "Hello World!<br>";

  $color = "red";
  echo "My car is " . $color . "<br>";
  ?>

  <h2> PHP Variables </h2>
  <hr>
  <?php
  $txt = "Hello world!";
  $x = 5;
  $y = 10.5;

  $txt = "W3Schools.com";
  echo "I love $txt!<br>";

  $txt = "W3Schools.com";
  echo "I love " . $txt . "!<br>";

  $x = 5;
  $y = 4;
  echo "x= $x ,  y= $y<br>";
  echo $x + $y;
  ?>

  <h3> Global and Local Scope</h3>
  <hr>
  <?php
  $x = 5; // global scope
  $y = 10;

  function myTest(){
    $x = 3;
    echo "<p>Variable x inside function is: $x</p>";
  }
  myTest();

  echo "<p> Variable x outside function is: $x</p>"
?>

<h3> Using array - $GLOBALS[index]</h3>
<hr>
<?php
$x = 5;
$y = 10;

function newTest(){
  $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
}
newTest();

echo "<br> $y <br>";

function stTest(){
  static $x = 0;
  echo "$x <br>";
  $x++;
}

stTest();
stTest();
stTest();
?>

<h2> PHP echo and print Statement</h2>
<hr>
<?php
echo "<h4> PHP is fun! </h4>";
echo "Hello world!<br>";
echo "I am about to learn PHP! <br>";
echo "This ", "String ", "was ", "made ", "with multiple parameters.<br>";

print "this line is printed by print function";
?>

<h2> PHP Object </h2>
<hr>
<?php
class Car {
  function Car(){
    $this->model = "VW";
  }
}

$herbie = new Car();
echo $herbie->model;
?>

<h2> PHP 5 Strings </h2>
<hr>
<?php
echo "The number of words in string<br>";
echo str_word_count("My name is Jeon Yeo Hun");
echo "<br>reverse Hello World<br>";
echo strrev("Hello world");

?>

<h2>PHP 5 Arrays</h2>
<hr>
<?php
$cars =array("Volvo", "BMW", "Toyota");
echo "\$cars[0] = " . $cars[0] . "<br>";
echo "\$cars[1] = " . $cars[1] . "<br>";
echo "\$cars[2] = " . $cars[2] . "<br>";
echo "I lke " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . "<br>";
echo "The number of elements in array \"cars\" is " . count($cars) . "<br>";

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
echo "Peter is " . $age['Peter'] . " years old.";
 ?>

 <h2> PHP - A Simple HTML Form</h2>
 <form action="welcome.php" method="post">
   Name: <input type="text" name="name"><br>
   E-mail: <input type="text" name="email"><br>
   <input type = "submit">
 </form>

<?php
 echo date("Y-m-d h:i:sa") . "<br>";
 ?>
</body>
<html>
