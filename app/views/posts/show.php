<?php require APPROOT . '/views/inc/header.php'; ?>
<a  href="<?php echo URLROOT; ?>/posts" class="btn btn-light mt-3"><i class="fa fa-backward"></i> Back</a>
<br>
<div class="card card-body  mt-3 mb-3">
    <h4 class="card-title"><?php echo $data['post']->title; ?></h4>
    <div class="bg-light p-2 mb-3">
        Written by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
    </div>
    <p><?php echo $data['post']->body;?></p>
    <?php if ($data['post']->user_id == $_SESSION['user_id']): ?>
        <hr>
        <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark">Edit</a>
    
        <form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="POST">
            <input type="submit" value="Delete" class="btn btn-danger my-3">
        </form>
    <?php endif; ?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>