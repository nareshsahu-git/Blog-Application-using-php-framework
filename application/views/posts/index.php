<h3><?= $title ?></h3>
<hr>
<?php foreach ($posts as $post): ?>

	<div class="row">
		<div class="col-sm-3">
			<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" style="width: 200px;">
		</div>
		<div class="col-sm-9">
			<h4><?= $post['title'] ?></h4>
			<small class="bg-light">Posted On: <?= $post['created_at'] ?>&nbsp;&nbsp;<strong><var>
				<?= $post['name'] ?></var></strong> </small>
			<p><?= word_limiter($post['body'], 40) ?></p>
			<a class="btn btn-outline-secondary btn-sm" href="<?= base_url('/posts/'.$post['slug']) ?>">Read More</a>
			<hr>
		</div>
	</div>
	<br>
<?php endforeach; ?>