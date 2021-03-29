
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1 search">
        <form action="<?php echo URLROOT; ?>/posts/search" method="post" >
            <div class="input-group-append">
              <input name="search" type="text" class="btn btn-sm btn-outline-secondary search" placeholder="Search for...">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-sm btn-outline-secondary">🔍</button>
              </span>
            </div>
        </form>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#">Free Code Lab</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">

        <?php if (isset($_SESSION['user_id'])) : ?>
          <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/users/logout">Log out</a>
        <?php else : ?>
          <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT; ?>/users/login">Sign in</a>
        <?php endif; ?>

      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 text-muted" href="<?php echo URLROOT; ?>">Home</a>
      <?php foreach($data['categories'] as $category) : ?>
      <a class="p-2 text-muted" href="<?php echo URLROOT; ?>/posts/showByCategory/<?php echo $category->getId();?>"><?php echo $category->getTitle(); ?></a>
      <?php endforeach; ?>
    </nav>
  </div>

