<link rel="stylesheet" href="<?php echo base_url("editor/dist/ui/trumbowyg.min.css") ?>">

<?php
  if(!empty($this->session->flashdata('mess')) && $this->session->flashdata('item') != ''){
    echo $this->session->flashdata('item');
  }
 ?>

<form  action="<?php echo base_url('Admin/Post/add_post') ?>" method="post">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" placeholder="Your title here" class="form-control" required>
    </div> <!--Title-->

    <div class="form-group">
      <label for="category">Category</label>
      <select class="form-control" name="category">
        <?php foreach ($category as $value) {
          echo "<option value='$value->category_name'>$value->category_name</option>";
        } ?>
      </select>
    </div> <!--Category-->

    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" rows="8" cols="80" required></textarea>
    </div> <!--Desscription-->

    <div class="form-group">
      <label for="demo-image">Demo Image</label>
      <input type="text" name="demoimage" placeholder="http://" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="editor">Post content</label>
      <textarea name="post-content" class="post-content" rows="8" cols="80" required></textarea>
    </div>

    <input type="submit" name="post-btn" value="Post" class="btn btn-primary">
  </form>

<script src="<?php echo base_url("editor/dist/trumbowyg.min.js") ?>"></script>

<script>
  $(".post-content").trumbowyg();
</script>
