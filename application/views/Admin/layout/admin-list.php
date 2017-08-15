<?php
  if($this->session->flashdata('mess') != ''){
    echo $this->session->flashdata('mess');
  }
 ?>

<h1 class="text-center">Danh sach thanh vien</h1>
<a href="#" class="btn btn-primary">Them thanh vien</a><hr>
<table class="table table-striped text-center">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Username</th>
    <th>Gioi tinh</th>
    <th>Ngay sinh</th>
    <th>Email</th>
    <th>Ngay dang ky</th>
    <th>Lan cuoi dang nhap</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>

  <?php foreach($member as $value){ ?>
    <tr>
      <td><?php echo $value->id ?></td>
      <td><?php echo $value->realname ?></td>
      <td><?php echo $value->username ?></td>
      <td><?php echo $value->gioitinh ?></td>
      <td><?php echo change_date_format($value->ngaysinh) ?></td> <!-- Ham change_date_format trong date_helper -->
      <td><?php echo $value->email ?></td>
      <td><?php echo change_date_format($value->ngaydangky, 'd-m-Y H:i:s')?></td>
      <td><?php echo change_date_format($value->lancuoidangnhap,'d-m-Y H:i:s') ?></td>
      <td>
        <form action="<?php echo base_url('Admin/Edit_Member/index') ?>" method="post">
          <input type="hidden" name="edit_member" value="<?php echo $value->id ?>">
          <input type="submit" name="edit_submit" value="Edit" class="btn btn-warning">
        </form>
      </td>
      <td>
        <form action="<?php echo base_url('Admin/Admin_List/delete') ?>" method="post">
          <input type="hidden" name="delete_member" value="<?php echo $value->id ?>">
          <input type="submit" name="delete_submit" value="Delete" class="btn btn-danger">
        </form>
      </td>
    </tr>

  <?php } ?>

</table>
