<section class="main articles">
	<h1>Articles</h1>
	<?php 
	$categoryinfo = new Categories;
	foreach ($data as $article) { ?>
		<div class="item">
			<a href="article/?id=<?= $article['id'] ?>" class="title"><?= $article['title'] ?></a>
			<div class="description"><?= $article['shortDescription'] ?></div>
			<div class="bottom">
				<?php if(!empty($article['category_id'])){ 
					$category = $categoryinfo->get_item($article['category_id']); ?>
					<div class="category">Category: <a href="category/?id=<?= $article['category_id'] ?>" class="category"><?= $category['name'] ?></a></div>
				<?php }else{ ?>
					<div class="category"></div>
				<?php } ?>
				<div class="price">Price: <?= $article['price'] ?></div>
			</div>
		</div>
	<?php }?>
</section>