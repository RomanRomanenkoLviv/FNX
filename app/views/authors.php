<?php if(!empty($data) && isset($data['id'])){ ?>
<section class="main articles">
	<h1>Author view</h1>
	<?php
	if(!empty($data['data'])){
		$categoryinfo = $this->model('Categories');
		foreach ($data['data'] as $article) { ?>
			<div class="item">
				<a href="/article/?id=<?= $article['id'] ?>" class="title"><?= $article['title'] ?></a>
				<div class="description"><?= $article['shortDescription'] ?></div>
				<div class="bottom">
					<?php if(!empty($article['category_id'])){ 
						$category = $categoryinfo->get_item($article['category_id']); ?>
						<div class="category">Category: <a href="/category/?id=<?= $article['category_id'] ?>" class="category"><?= $category['name'] ?></a></div>
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
<?php } else {?>
<section class="main articles">
	<h1>Authors</h1>
	<?php
	if(!empty($data['data'])){
		foreach ($data['data'] as $author) { ?>
		<div class="item">
			<h1><?= $author['name'] ?></h1>
			<?php if(!empty($author['articles'])){
				foreach ($author['articles'] as $article) { ?>
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
				<p>Author haven`t any articles.</p>
			<?php }?>
		</div>
	<?php } } ?>
</section>
<?php }?>