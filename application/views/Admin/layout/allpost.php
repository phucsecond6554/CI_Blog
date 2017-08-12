<?php
  if($this->session->flashdata('mess') != ''){
    echo $this->session->flashdata('mess');
  }
 ?>

<h1 class="text-center">Danh sach cac post</h1> <hr>

  <table class="table table-striped">
    <tr>
      <th>Title</th>
      <th>Dang boi</th>
      <th>Ngay dang</th>
      <th>Luot xem</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>

    <?php foreach($post as $values){?>
      <tr>
        <td><?php echo $values->title; ?></td>
        <td><?php echo $values->postby; ?></td>
        <td><?php echo $values->posttime; ?></td>
        <td><?php echo $values->view_number; ?></td>
        <td>
          <form action="#" method="post">
            <input type="hidden" name="edit_post" value="<?php echo $values->id ?>">
            <input type="submit" name="edit_submit" value="Edit" class="btn btn-warning">
          </form>
        </td>
        <td>
          <form action="<?php echo base_url('Admin/Post/deletePost') ?>" method="post">
            <input type="hidden" name="delete_post" value="<?php echo $values->id ?>">
            <input type="submit" name="delete_submit" value="Delete" class="btn btn-danger">
          </form>
        </td>
      </tr>
    <?php } ?>
  </table>

  <div class="pagination">
    <?php echo $pagination; ?>
  </div> <!--Phan trang se dat o day -->
</div>
