<html>
<head>
  <meta charset="utf-8">
 <link rel="stylesheet" href="index.css">
<h1>Авторизація</h1>
</head>
<body>
<form class='form' method='POST'>

  <div class="container">
  
    <label for="uname"><b>Email</b></label>
    <input type="text" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" placeholder="Enter Email" title="email@example.com" name="uname" required> <br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required><br><br>

    <button type="submit">Login</button>
    
	
 
	
	
	
  </div>
<?php
session_start();
if (isset($_POST["uname"])) {
$users = array("Admin@gmail.com" => "Admin", "User1@i.ua" => "123456", "Test@i.ua" => "TestUser");
$_SESSION['login'] = $_POST["uname"]; 
$_SESSION['pass'] = $_POST["psw"];
foreach($users as $login => $pass){
	if ($_SESSION['login'] === $login && $_SESSION['pass'] === $pass) {
		//echo "<div class='myclase'>Привіт, $login!</div>";
		echo "</form><form class='myclase' action='test.php' method='post'<div ><label for='age'><b>Введіть свій вік</b></label>
    <input type='text' placeholder='Enter your age' name='age' id='input-id' required> <br>
	  <button type='submit'>Підтвердити</button>";
	//<a href='page2.php?hello=true'>Підтвердити</a>
		return;
	}
}
echo "<div class='myclase'>Невірно введені дані!</div></form>";
}
?>
  
<!--
<br><br>
<form action='page2.php' method='GET'>
<input type='text' placeholder='Enter your age' name='hello' id='input-id' required> <br> <br>
<button type="submit">Login</button>
</form> 
-->

</body>


</html>