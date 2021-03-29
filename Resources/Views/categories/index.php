<?php require APPROOT . '/Resources/Views/header.php'; ?>
<body>
  <div class="container">
    <?php flash('post_message'); ?>
    <?php require APPROOT . '/Resources/Views/navbar.php'; ?>

    <h1 class="my-4">Page Headingggg<small>Secondary Text</small></h1>
    <div class="row md-4">
        <!-- Blog Post -->
        <?php foreach($data['categoriess'] as $category) : ?>
        <div class="col-md-4 card cat-card">
          <img class="card-img-top" src="/mvc/<?php //echo $post->getImage();?>" alt="Card image cap">     
          <div class="card-body">
            <h2 class="card-title"><?php echo $category->getTitle(); ?></h2>
            <p class="card-text"></p>
            <a href="/mvc/posts/show/<?php echo $category->getSlug();?>" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on <?php echo $category->getCreatedAt(); ?> by
            <?php echo $category->name; ?>
          </div>
        </div>
        <?php endforeach; ?>
    </div>  <!-- Blog Post -->
  </div>

<script src="/mvc/Resources/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

</body>
<?php require APPROOT . '/Resources/Views/footer.php'; ?>