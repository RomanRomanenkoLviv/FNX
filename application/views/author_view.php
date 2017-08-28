<section class="main articles">
	<h1>Author view</h1>
	<?php include "application/models/Categories.php";
	$categoryinfo = new Categories;
	$data = json_decode($data, true);
	if(!empty($data)){
	foreach ($data as $article) { ?>
		<div class="item">
			<a href="/article/<?= $article['id'] ?>" class="title"><?= $article['title'] ?></a>
			<div class="description"><?= $article['shortDescription'] ?></div>
			<div class="bottom">
				<?php if(!empty($article['category_id'])){ 
					$category = $categoryinfo->get_item($article['category_id']); ?>
					<div class="category">Category: <a href="/category/<?= $article['category_id'] ?>" class="category"><?= $category['name'] ?></a></div>
				<?php }else{ ?>
					<div class="category"></div>
				<?php } ?>
				<div class="price">Price: <?= $article['price'] ?></div>
			</div>
		</div>
	<?php } }else{?>
		<p>Sorry, author don`t have articles :(</p>
	<?php }?>
</section>