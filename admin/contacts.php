<?php
	session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
  define('myeshop', true);
       
       if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: ../login.php");
    }
  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a>";

	include("include/db_connect.php");

	if (isset($_POST['submit']))
	{
		$zagolovok = $_POST['title'];
		$anotation = $_POST['anotation'];

		$result = mysql_query("UPDATE texts SET title = '$zagolovok', main = '$anotation' WHERE text_id = '7'");
		header('location: contacts.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Контакти</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
	<script src="js/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
</head>
<body>
	<div id="block-body">
	<header id="head">
		<div id="block-header">
			<?php
				include("include/block-header.php");
			?>
		</div>
	</header>
	<div id="block-left">
		<?php
			include("include/block-left.php");
		?>
	</div>
	<div id="block-right">
		<?php
			include("include/block-right.php");
		?>
	</div>
	<div id="block-content">
		<?php
			$action = $_GET["action"];
			switch ($action) 
			{
				case 'view':
		$result = mysql_query("SELECT * FROM texts WHERE text_id='7'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<ul id="red">
							<li class="active"><a href="contacts.php?action=view">Вигляд</a></li>
							<li><a href="contacts.php?action=edit">Редагувати</a></li>
						</ul>
 						<h1>'.$row["title"].'</h1>
 						';
 						echo $row["main"];
 						
 					}
    				while ($row = mysql_fetch_array($result));
				}
					break;

					case 'edit':
					echo '
					<ul id="red">
							<li><a href="contacts.php?action=view">Вигляд</a></li>
							<li class="active"><a href="contacts.php?action=edit">Редагувати</a></li>
						</ul>
					<h1>Контакти</h1>				
		<form action="contacts.php" method="post">
		';
		$result = mysql_query("SELECT * FROM texts WHERE text_id='7'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
							<label>Заголовок</label>
							<br><br>
							<input type="text" name="title" value="'.$row["title"].'">
							<br><br>
							<label>Текст</label>
							<br><br>
 							<textarea name="anotation">'.$row["main"].'</textarea>
 						';
 						
 					}
    				while ($row = mysql_fetch_array($result));
				}
		echo '
			<br>
			<input type="submit" name="submit" value="Зберегти">
		</form>
		<br>
			';
			break;	
				default:
					$result = mysql_query("SELECT * FROM texts WHERE text_id='7'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<ul id="red">
							<li class="active"><a href="contacts.php?action=view">Вигляд</a></li>
							<li><a href="contacts.php?action=edit">Редагувати</a></li>
						</ul>
 						<h1>'.$row["title"].'</h1>
 						';
 						echo $row["main"];
 						
 					}
    				while ($row = mysql_fetch_array($result));
				}
					break;
			}
		?>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2539.6099736108654!2d30.354784715110856!3d50.46698719405523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ccc08171d59b%3A0x477dd29382e52f8a!2z0L_RgNC-0YHQv9C10LrRgiDQkNC60LDQtNC10LzRltC60LAg0J_QsNC70LvQsNC00ZbQvdCwLCAzNCwg0JrQuNGX0LIsIDAyMDAw!5e0!3m2!1sru!2sua!4v1534432886341" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	<footer id="foot">
	</footer>
	</div>
		<script type="text/javascript">
		CKEDITOR.replace("anotation");
	</script>
</body>
</html>
<?php
}else
{
    header("Location: ../login.php");
}
?>