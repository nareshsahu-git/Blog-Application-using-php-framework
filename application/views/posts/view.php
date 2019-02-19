<h4><?= $post['title'] ?></h4>
<small class="bg-light">Posted On: <?= $post['created_at'] ?></small>
<div class="row">
	<div class="col-sm-3">
		<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" style="width: 250px; height: 200px;">
	</div>
	<div class="col-sm-9"></div>
</div>
<br>
<div>
	<?= $post['body'] ?>		
</div>
<br>
<!-- If user are not logged in, donot show Edit and Delete -->
<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
<div class="row">
	<div class="col-sm-2">		<!-- Edit button method-1 -->
		<a class="btn btn-info btn-sm pull-right" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
	</div>
	<div class="col-sm-10">		<!-- Edit button method-2 -->
		<?php echo form_open('posts/delete/'.$post['id']); ?>
		<input class="btn btn-danger btn-sm form-inline" type="submit" value="Delete" >
		</form>
	</div>	
</div>
<?php endif; ?>
<hr>
<h5>Comments</h5>
<br>
<div class="row">
	<div class="col-sm-9">
<?php if($comments): ?>
<?php foreach($comments as $comment): ?>
		
	<p><?php echo $comment['body']; ?>&nbsp;&nbsp;<strong><?php echo $comment['name']; ?></strong></p>
<?php endforeach; ?>
<?php else: ?>
	<var>no comments</var>
<?php endif; ?>
	</div>
<div class="col-sm-3">
	
</div>
</div>
<hr>
<div class="row">
	<div class="col-sm-6">
		<?php echo form_open('comments/create/'.$post['id']); ?>  
      	<div class="form-group">
        	<h5>Add Comment</h5>
          	<input type="text" class="form-control" placeholder="Name" name="name">
     	 </div>
     	 <div class="form-group">
          	<input type="text" class="form-control" placeholder="Email" name="email">
     	 </div>
      	 <div class="form-group">
          	<textarea class="form-control" placeholder="Enter body" name="body" style="height: 100px;"></textarea>
      	</div>
      	
	</div>
	<div class="col-sm-6" style="margin-top: 30px;">
		<?php echo validation_errors(); ?>
	</div>
	<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
		<button type="submit" class="btn btn-primary btn-sm">Submit</button>
	</form>
</div>


