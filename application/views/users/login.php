
<?php echo form_open('users/login'); ?>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h4><?php echo $title; ?></h4>
			<hr>
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Login</button>
		</div>
	</div>
<?php echo form_close(); ?>


