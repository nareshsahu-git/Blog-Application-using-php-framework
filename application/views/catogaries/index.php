<h3><?= $title ?></h3>

<div class="row">
	<div class="col-sm-6">
	<ul class="list-group">
		<?php foreach ($catogaries as $catogary): ?>
			<li class="list-group-item d-flex justify-content-between align-items-center">
	    		<a href="<?php echo site_url('/catogaries/posts/'.$catogary['id']); ?>">  
				<?php echo $catogary['name']; ?></a>

	    	<?php if($this->session->userdata('user_id') == $catogary['user_id']): ?>
	    		<form action="catogaries/delete/<?php echo $catogary['id']; ?>" method="POST">
	    			<input type="submit" class="btn-link btn-danger" value="x">
	    		</form>
	    	<?php endif; ?>
	  		</li>
		<?php endforeach; ?>
	</ul>	
	</div>
	<div class="col-sm-6">
		
	</div>
</div>
<div class="row" style="height:180px;">
</div>


