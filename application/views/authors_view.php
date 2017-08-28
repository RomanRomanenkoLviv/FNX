<section class="main articles">
	<h1>Authors</h1>
	<?php $data = json_decode($data, true);
	// echo '<pre>'.print_R($data,true).'</pre>';
	if(!empty($data)){
		foreach ($data as $author) { ?>
		<div class="item">
			<h1><?= $author['name'] ?></h1>
			<?php if(!empty($author['articles'])){
				foreach ($author['articles'] as $article) { ?>
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
				<p>Author haven`t any articles.</p>
			<?php }?>
		</div>
	<?php } } ?>
</section>