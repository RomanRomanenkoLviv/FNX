<section class="main articles">
	<?php $article = json_decode($data, true);?>
		<div class="article">
			<h1><?= $article['title'] ?></h1>
			<div class="content">
				<div class="left">
					<div class="author">Author(s): 
					<?php include "application/models/Authors.php";
						  include "application/models/Categories.php";
						$authors = json_decode($article['authors'], true);
						$count = count($authors);
						$i = 1;
						$authorinfo = new Authors;
						$categoryinfo = new Categories;
						$user = new Users;
						if($count > 1){
							foreach ($authors as $author) {
								$info = $authorinfo->get_item($author); ?>
								<a href="/author/<?= $info['id'] ?>" class="author"><?= $info['firstName'] ?> <?= $info['lastName'] ?></a>
						  <?php echo ($i < $count)?', ':'';
								$i++;
							}
						}else{
							$info = $authorinfo->get_item($authors); ?>
								<a href="/author/<?= $info['id'] ?>" class="author"><?= $info['firstName'] ?> <?= $info['lastName'] ?></a>
				  <?php } ?>
					</div>
					<?php if(!empty($article['category_id'])){ 
						$category = $categoryinfo->get_item($article['category_id']); ?>
						<div class="category">Category: <a href="/category/<?= $article['category_id'] ?>" class="category"><?= $category['name'] ?></a></div>
					<?php } ?>
					<div class="price">Price: <?= $article['price'] ?></div>
					<?php if($article['price'] > 0) { 
						if($user->is_login() === false){ ?>
							<a href="/login"><button>Login to buy</button></a>
						<?php }elseif($user->is_bought($article['id']) === false){?>
							<button class="buy" data-id="<?= $article['id'] ?>">Buy it article</button>
						<?php }else{ ?>
						<p class="buy">You are bought this article</p>
					<?php } }else{
						if($user->is_login() === false){ ?>
						<a href="/login"><button>Login to see</button></a>
					<?php } } ?>
				</div>
				<div class="right">
					<div class="description"><?= $article['shortDescription'] ?></div>
				</div>
			</div>
			<?php if($user->is_login() === true && ($article['price'] == 0 || $user->is_bought($article['id']) === true) ) { ?>
			<div class="bottom"><?= $article['content'] ?></div>
			<?php } ?>
		</div>
</section>
<script type="text/javascript">
	$('button.buy').click(function(){
		var _id = $(this).data('id');
		$.ajax({
            type:'get',//тип запроса: get,post либо head
            url: '/ajax/',//url адрес файла обработчика
            data:{'action':'buy_article', 'id':_id},//параметры запроса
            response:'text',//тип возвращаемого ответа text либо xml
            success:function (data) {//возвращаемый результат от сервера
            	console.log(data);
                if( data == 'succesBuying'){
                	location.reload();
                }else{
                    alert('You can\'t buy it!');
                }
            }
        });
	});
</script>