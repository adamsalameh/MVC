<?php require APPROOT . '/Resources/Views/header.php'; ?>
<body>
  <div class="container">
    <?php flash('post_message'); ?>
    <?php require APPROOT . '/Resources/Views/navbar.php'; ?>

    <div class="row">
      <div class="col-md-8 blog-main">      
        <div class="blog-post">      
          <h2 class="blog-post-title"><?php echo $data['post']->getTitle(); ?></h2>
          <p class="blog-post-meta"><?php echo $data['post']->getCreatedAt(); ?> by <a href="#"><?php echo $data['post']->name; ?></a></p>        
          <hr>
          <img class="img-fluid rounded" src="<?php echo URLROOT; ?>/<?php echo $data['post']->getImage();?>" alt="">        
          <hr>
          <p><?php echo $data['post']->getBody(); ?></p>       
          <hr>        
        </div>
        <!-- /.blog-post --> 

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="<?php echo URLROOT; ?>/posts/addComment/<?php echo $data['post']->getId(); ?>" method="post">
              <div class="form-group">
                <textarea name="body" class="form-control" rows="3"></textarea>
              </div>
              <input type="submit" class="btn btn-primary" value="Submit">
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        <?php foreach($data['comments'] as $comment) : ?>
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0"><?php echo $comment->getUserName(); ?></h5>
            <?php echo $comment->getBody(); ?>
          </div>
        </div>
        <?php endforeach; ?>
        <!-- Comment with nested comments -->    

        <nav class="blog-pagination">
          <a class="btn btn-outline-primary" href="#">Older</a>
          <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
        </nav>

      </div>

      <!-- /.blog-main -->
      
       <!-- Sidebar Widgets Column -->
      <?php require APPROOT . '/Resources/Views/sidebar.php'; ?>
    <!-- /Sidebar Widgets Column -->
  </div>
  </div>
<!-- /.container -->

<script src="/mvc/Resources/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
</body>

<?php require APPROOT . '/Resources/Views/footer.php'; ?>
