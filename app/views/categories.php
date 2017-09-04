<?php if(!empty($data) && isset($data['id'])){ ?>
<section class="main articles">
	<h1>Category view</h1>
	<?php
	if(!empty($data['data'])){
		foreach ($data['data'] as $article) { ?>
			<div class="item">
				<a href="/article/?id=<?= $article['id'] ?>" class="title"><?= $article['title'] ?></a>
				<div class="description"><?= $article['shortDescription'] ?></div>
				<div class="bottom">
					<div class="category">Category: <a href="/category/?id=<?= $article['category_id'] ?>" class="category"><?= $article['name'] ?></a></div>
					<div class="price">Price: <?= $article['price'] ?></div>
				</div>
			</div>
	<?php } }else{?>
		<p>Sorry, it`s empty category :(</p>
	<?php }?>
</section>
<?php } else {?>
<section class="main articles">
	<h1>Categories</h1>
	<?php
	if(!empty($data['data'])){
		foreach ($data['data'] as $category) { ?>
		<div class="item">
			<h1><?= $category['name'] ?></h1>
			<?php if(!empty($category['articles'])){
				foreach ($category['articles'] as $article) { ?>
				<div class="item child">
					<a href="/article/?id=<?= $article['id'] ?>" class="title"><?= $article['title'] ?></a>
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
<?php } ?>