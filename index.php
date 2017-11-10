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
	<link rel="stylesheet" type="text/css" href="css/media.css">
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
</head>
<body>
	<?php
		require "pages/header.php";
	?>
	<div class="container s-mt-30">
        <h4 class="block_title">Новейшее в блоге</h4>
        <a href="pages/article.php?id=0" class="block_all_articles">Все записи</a>
        <div style="clear: both;">

        </div>
        <?php
            $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 6");
        ?>
        <div class="row">
             <?php
            while($art = mysqli_fetch_assoc($articles)){
				?>
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="images/<?php echo $art['image']?>" style="height:250px;">
                    </div>
                    <span class="card-title"><a href="pages/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']?></a></span>

                    <div class="card-content">
                        <span><?php echo mb_substr(strip_tags($art['article']), 0,40,'utf-8') . "..."?></span>
                    </div>
                        <?php 
                            $art_cat=false;
                                foreach($categories as $cat){
                                    if($cat['id']==$art['id_category']){
                                    $art_cat = $cat;
                                    break;
                                }
                            }
                         ?>
                    <div class="card-action">
                        Категория: <a href="pages/articles.php?id=<?php echo $art_cat['id']?>"><?php echo $art_cat['categories']; ?></a>
                    </div>
                </div>
            </div>
					<?php
				}
			?>
		</div>

	</div>
	<?php
		require "pages/footer.php";
	?>
</body>
</html>