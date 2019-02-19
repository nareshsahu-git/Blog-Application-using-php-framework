<h3><?= $title ?></h3>
<br>

<?php echo form_open_multipart('catogaries/create'); ?>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label>Catogary Name:</label>
				<input type="text" name="name" placeholder="Enter Catogary" class="form-control">
			</div>
			<input type="submit" class="btn btn-primary" value="Submit">
		</div>
		<div class="col-sm-6">
			<?php echo validation_errors(); ?>
		</div>
	</div>
</form>
<div class="row" style="height:180px;">

</div>