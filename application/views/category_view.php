<section class="main articles">
	<h1>Category view</h1>
	<?php $data = json_decode($data, true);
	if(!empty($data)){
	foreach ($data as $article) { ?>
		<div class="item">
			<a href="/article/<?= $article['id'] ?>" class="title"><?= $article['title'] ?></a>
			<div class="description"><?= $article['shortDescription'] ?></div>
			<div class="bottom">
				<div class="category">Category: <a href="/category/<?= $article['category_id'] ?>" class="category"><?= $article['name'] ?></a></div>
				<div class="price">Price: <?= $article['price'] ?></div>
			</div>
		</div>
	<?php } }else{?>
		<p>Sorry, it`s empty category :(</p>
	<?php }?>
</section>