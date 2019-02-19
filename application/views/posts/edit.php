<h3><?= $title ?></h3>

  <div class="row">
    <div class="col-sm-6">
        <?php echo form_open('posts/update'); ?>
  <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
    <div class="form-group">
      <label>Title:</label>
      <input type="text" class="form-control" placeholder="Enter title" name="title" 
      value="<?= $post['title'] ?>">
    </div>
    <div class="form-group">
      <label>Body:</label>
      <textarea id="txt_area" class="form-control" placeholder="Enter body" name="body" style="height: 300px;"><?= $post['body'] ?></textarea>
    </div>
    </div>
    <div class="col-sm-3">
            <div class="form-group">
        <label>Catogary:</label>
        <select class="form-control" name="catogary_id">
          <?php foreach ($catogaries as $catogary): ?>
          <option value="<?= $catogary['id'] ?>"><?= $catogary['name'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <?php echo validation_errors(); ?>
    </div>
    <div class="col-sm-3">
      
    </div>
    
  </div>
  <div class="row">
      <div class="col-sm-3">
        <button type="submit" style="margin-top: 30px;" class="btn btn-primary">Submit</button>
  </form>
      </div>
      <div class="col-sm-3">
        
      </div>
      <div class="col-sm-6">
        
      </div>
    </div>