
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= URLROOT ?>"><?= SITENAME ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= URLROOT ?>/pages/index">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT ?>/pages/about">About</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0 ">
        <?php if (isset($_SESSION['user_id'])) : ?>
          <li class="nav-item ">
            <a class="nav-link" aria-current="page" href="#">Welcome <?php echo $_SESSION['user_name']; ?></a>
          </li> 
          <form class="d-flex col-6" role="search" action="<?php echo URLROOT ?>/posts/search" method="POST" >
            <input class="form-control me-2" type="search" name="title" placeholder="Look for a Title" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?php echo URLROOT ?>/users/logout">Logout</a>
          </li>
        <?php else : ?> 
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?php echo URLROOT ?>/users/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT ?>/users/login">Login</a>
          </li>
      </ul>
      <?php endif;?>  
    </div>
  </div>
</nav>