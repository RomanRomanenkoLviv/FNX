<section class="main articles">
	<h1>Categories</h1>
	<?php $data = json_decode($data, true);
	if(!empty($data)){
		foreach ($data as $category) { ?>
		<div class="item">
			<h1><?= $category['name'] ?></h1>
			<?php if(!empty($category['articles'])){
				foreach ($category['articles'] as $article) { ?>
				<div class="item child">
					<a href="/article/<?= $article['id'] ?>" class="title"><?= $article['title'] ?></a>
					<div class="description"><?= $article['shortDescription'] ?></div>
					<div class="bottom">
						<div class="category"></div>
						<div class="price">Price: <?= $article['price'] ?></div>
					</div>
				</div>
				<?php } ?>
			<?php }else{ ?>
				<p>Empty category.</p>
			<?php }?>
		</div>
	<?php } } ?>
</section>