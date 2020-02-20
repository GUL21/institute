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

	if (isset($_POST['add']))
	{
		$keyword = $_POST['keyword'];

		$result = mysql_query("INSERT INTO keywords (keyword) VALUES ('$keyword')");
		header('location: add_keyword.php');
		header("Cache-Control: no-store,no-cache,mustrevalidate");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Додавання ключових слів</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
		<h1>Додавання ключових слів</h1>
 			<form method="post" enctype="multipart/form-data">
 				<br>
 				<p class="green">Ключове слово</p>
 				<input type="text" name="keyword"><br><br>
 				<input type="submit" name="add" value="Додати">
 			</form>				
	</div>
	<footer id="foot">
	</footer>
	</div>
</body>
</html>
<?php
}else
{
    header("Location: ../login.php");
}
?>