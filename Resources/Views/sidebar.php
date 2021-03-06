<!-- /.blog-sidebar -->
<aside class="col-md-4 blog-sidebar">
    <div class="p-4">
      <h4 class="font-italic"><?php echo $data['post']->getCategoryTitle(); ?></h4>
      <ol class="list-unstyled mb-0">
        <?php foreach($data['posts'] as $post) : ?>        
        <li><a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->getSlug();?>">
                    <?php if ($post->getId() === $data['post']->getId()):?>
                    <b><?php echo $post->getTitle(); ?></b>
                    <?php else: echo $post->getTitle(); ?>
                    <?php endif;?></a></li>
        <?php endforeach; ?>         
      </ol>
    </div>

    <!-- Sidebar social Column -->
    <div class="p-4">
      <h4 class="font-italic">Follow us</h4>
      <ol class="list-unstyled">
        <li><a href="#">GitHub</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">Facebook</a></li>
      </ol>
    </div>
    <!-- Sidebar social Column -->

    <!-- Sidebar about Column -->
    <div class="p-4 mb-3 bg-light rounded">
      <h4 class="font-italic">About</h4>
      <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>
    <!-- Sidebar about Column -->

</aside>
<!-- /.blog-sidebar -->
