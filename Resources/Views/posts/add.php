
<?php require APPROOT . '/Resources/Views/dashboard/header.php'; ?>

<!-- ckeditor -->
 <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<script src="/mvc/Resources/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="/mvc/Resources/ckeditor/plugins/codesnippet/lib/highlight/styles/monokai_sublime.css">
<!-- <link href="https://cdn.cloudflare.com/ajax/libs/ckeditor/plugins/codesnippet/lib/highlight/styles/default.css" rel="stylesheet">
    <script src="https://github.com/ckeditor/ckeditor4/blob/master/plugins/codesnippetgeshi/plugin.js"></script> -->
<body>
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
        <form action="<?php echo URLROOT; ?>/dashboard/addPost" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Upload Image:</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Select Category:</label>
            <select class="form-control" name="categoryId" id="exampleFormControlSelect1">
              <?php foreach ($data as $category) : ?>
              <option value="<?php echo $category->getId(); ?>"><?php echo $category->getTitle(); ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title">
  </div>



          <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea id="body" name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
          <input type="submit" class="btn btn-primary" value="Submit">
        </form>
      </div>
</div>

<!-- <script>
  CKEDITOR.replace('body');
</script> -->
<script>
  // Enable local "abbr" plugin from /myplugins/abbr/ folder.
         CKEDITOR.replace( 'body', {
         extraPlugins: 'codesnippet',
         codeSnippet_theme: 'monokai_sublime',
         // filebrowserUploadUrl: "<?php //echo URLROOT; ?>'/Helpers/upload.php'"
         filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?type=Images',
         filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
} );
     

</script>

<!-- /.container-fluid -->
<?php require APPROOT . '/Resources/Views/dashboard/footer.php'; ?>