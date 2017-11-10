<?php
	require "config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		<?php
			echo $config['title'];		
		?>
	</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="wrap">
<h2>Админка</h2>
<a href="pages/addArticle.php">Добавить новую статью</a>
	<?php
		$articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id`");
		?>
			<?php
				while($art = mysqli_fetch_assoc($articles)){
					?>
					<div style="border: 1px solid black; padding: 10px;">
						<h2><?php echo $art['title'];?>
						</h2>
						<p>
							<?php echo $art['article']?>	
						</p>
						<button>Редактировать</button>
					</div>
					<?php
				}
			?>
		<?php
	?>
</div>
</body>
</html>