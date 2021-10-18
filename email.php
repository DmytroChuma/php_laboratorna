<html>
  <meta charset="utf-8">
 <link rel="stylesheet" href="index.css">
 
 <?php
if(isset($_POST['to'])){
 $headers = array(
    'From' => 'testusermail44@gmail.com',
    'Reply-To' => 'testusermail44@gmail.com'
);
if (mail($_POST['to'], $_POST['subject'], $_POST['message'], $headers)) {
echo "<div class='myclase'>Лист відправленно!</div>";
}
else {
echo "<div class='myclase'>Лист не відправленно!  ".$_POST['to']."  ".$_POST['subject']."  ".$_POST['message']." </div>";
}
}
?>
 
<?php
session_start();
  if (isset($_SESSION['age'])) {
    $age = $_SESSION['age'];
	if ($age < 18 || $age > 60) {
		echo "<div class='myclase'>Ви не пройшли авторизацію.</div>";
	}
	else { 
		echo " <h1>Відправка листа</h1><form class='send' method='POST'>
		<div>
		<input type='text' name='to' placeholder='Receiver of the email' pattern='[^@\s]+@[^@\s]+\.[^@\s]+' /> <br> <br>
		<input type='text' name='subject' placeholder='Subject of the email to be sent' /><br> <br>
		<textarea name='message' placeholder='Your message'></textarea> <br> <br>
		<button type='submit'>Відправити</button>
		</div>
		</form>";
	}
  }
?>


 
</html>