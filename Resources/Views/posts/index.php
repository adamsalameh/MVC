<?php require APPROOT . '/Resources/Views/header.php'; ?>
<body>
  <div class="container">
    <?php flash('post_message'); ?>
    <?php require APPROOT . '/Resources/Views/navbar.php'; ?>

    <div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Page Heading
          <small>Secondary Text</small>
        </h1>
        <?php foreach($data['posts'] as $post) : ?>
        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="/mvc/<?php echo $post->getImage();?>" alt="Card image cap">          
          <div class="card-body">
            <h2 class="card-title"><?php echo $post->getTitle(); ?></h2>
            <p class="card-text"><?php echo $post->getBody(); ?></p>
            <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->getSlug();?>" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on <?php echo $post->getCreatedAt(); ?> by
            <?php echo $post->name; ?>
          </div>
        </div>
        <?php endforeach; ?>
        <!-- Blog Post -->     

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
<script src="<?php echo URLROOT; ?>/Resources/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
</body>
<?php require APPROOT . '/Resources/Views/footer.php'; ?>