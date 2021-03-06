<?php require APPROOT . '/Resources/Views/header.php'; ?>
<body>
  <div class="container"> 
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
          <?php flash('register_success'); ?>
          <h2>Login</h2>
          <p>Please fill in your credentials to login.</p>
          <form action="<?php echo URLROOT; ?>/users/login" method="post">
            <div class="form-group">
                <label>Email:<sup>*</sup></label>
                <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="">
                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div>    
            <div class="form-group">
                <label>Password:<sup>*</sup></label>
                <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="">
                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            </div>
            <div class="form-row">
              <div class="col">
                <input type="submit" class="btn btn-secondary btn-block" value="Login">
              </div>
              <div class="col">
                <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-secondary btn-block">No account? Register</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
<?php require APPROOT . '/Resources/Views/footer.php'; ?>
