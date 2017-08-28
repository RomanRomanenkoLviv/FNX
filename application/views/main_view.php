<section class="main articles">
	<h1>Articles</h1>
	<?php include "application/models/Categories.php";
	$categoryinfo = new Categories;
	$data = json_decode($data, true);
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
	<?php }?>
</section>