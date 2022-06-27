<?php
require APPROOT.'/views/inc/header.php';
?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>All Posts with this title :<br> <?php echo $_POST; ?></h1>
    </div>  
</div>
<?php foreach($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
      <h4 class="card-title"><?php echo $post->title; ?></h4>
      <div class="bg-light p-2 mb-3">
        Written by <?php echo $post->name; ?> on <?php echo $post->created_at; ?>
      </div>
      <p class="card-text"><?php echo $post->body; ?></p>
      <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->id; ?>" class="btn btn-dark">More</a>
    </div>  
<?php endforeach ; ?>
<?php flash('search_message');?>
<?php
require APPROOT . '/views/inc/footer.php';
?>