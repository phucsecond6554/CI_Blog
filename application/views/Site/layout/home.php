<?php foreach($post as $value){ ?>
  <div class="row post">
    <div class="col-md-7 col-xs-12 post-block">
      <img class="img-responsive" src="<?php echo $value->demo_img ?>">
    </div>
    <div class="col-md-5 col-xs-12">
      <a href="<?php echo base_url('Post/'.$value->url); ?>"><h1><?php echo $value->title ?></h1></a>
      <p><?php echo $value->description; ?></p>
      <i>Dang boi: <?php echo $value->postby; ?>. Vao luc: <?php echo $value->posttime; ?></i>
    </div>
  </div> <!--Blog post block-->

  <hr>
</div>
<?php } ?>
