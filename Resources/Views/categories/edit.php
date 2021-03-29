
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
        <form action="<?php echo URLROOT; ?>/dashboard/updateCategory/<?php echo $data->getId(); ?>" method="post" enctype="multipart/form-data">          
      

          <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="<?php echo $data->getTitle(); ?>">
  </div>



          
          <input type="submit" class="btn btn-primary" value="Submit">
        </form>
      </div>
</div>
<!-- /.container-fluid -->
<?php require APPROOT . '/Resources/Views/dashboard/footer.php'; ?>
