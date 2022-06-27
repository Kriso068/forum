<?php
require APPROOT . '/views/inc/header.php';
?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
        <?php echo flash('register_success');?>
            <h2>Login</h2>
            <p>Please fill in your credentials to log in</p>
            <form action="<?php echo URLROOT?>/users/login" method="POST">
                <div class="form-group">
                   <label for="name">Email <sup>*</sup></label>
                   <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : '' ;?>" value="<?php echo $data['email']?>">
                   <span class="invalid-feedbak text-danger">
                        <?php if (isset($data['email_error'])) {
                            echo $data['email_error1'];
                        }
                        ?>
                   </span>
                </div>
                <div class="form-group">
                   <label for="name">Password <sup>*</sup></label>
                   <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : '' ;?>" value="<?php echo $data['password']?>">
                   <span class="invalid-feedbak text-danger">
                   <?php if (isset($data['password_error'])) {
                            echo $data['password_error'];
                        }
                        ?>
                   </span>
                </div>
                <div class="row">
                    <div class="col my-3">
                        <input type="submit" value="Login" class='btn btn-success btn-block'>
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT?>/users/register" class="btn btn-light btn-block">Create an account ?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require APPROOT . '/views/inc/footer.php';