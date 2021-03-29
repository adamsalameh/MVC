
<?php require APPROOT . '/Resources/Views/dashboard/header.php'; ?>
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.html">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">404 Error</li>
  </ol>  
  <!-- Page Content -->  
      <div class="card card-body bg-light mt-5">
        <h2>Add Post</h2>
        <p>Create a post with this form</p>
        <form action="<?php echo URLROOT; ?>/dashboard/addCategory" method="post">
          <div class="form-group">
              <label>Title:<sup>*</sup></label>
              <input type="text" name="title" class="form-control form-control-lg" placeholder="Add a title...">
              <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
          </div>         
          <input type="submit" class="btn btn-primary" value="Submit">
        </form>
      </div>
</div>
<!-- /.container-fluid -->
<?php require APPROOT . '/Resources/Views/dashboard/footer.php'; ?>