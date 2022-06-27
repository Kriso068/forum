<?php
require APPROOT . '/views/inc/header.php';
?>
<h1><?php echo $data['title']?></h1>
<div class="card card-body">
    <p><?php echo $data['description']?></p>
    <p>Version : <strong><?php echo APP_VERSION ?></strong></p>
</div>
<?php
require APPROOT . '/views/inc/footer.php';
?>