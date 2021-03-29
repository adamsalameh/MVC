
<?php require APPROOT . '/Resources/Views/dashboard/header.php'; ?>

<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="#">Dashboard</a>
</li>
<li class="breadcrumb-item active">Comments</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Comments
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
                  <tr>
                    <th>Id</th>
                    <th>Comment</th>
                    <th>Post</th>
                    <!-- <th>Title</th>
                    <th>Author</th>
                    <th>Cr Date</th>
                    <th>Up Date</th> -->
                    <th>Author</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Delete</th>
                  </tr>
                </thead>

    <tbody>
        <?php foreach($data as $comment) : ?>
        <tr>
            <td><?php echo $comment->getId(); ?></td>
            <!-- <td><img class="card-img-top" src="/mvc/<?php //echo $comment->//getImage();?>" alt="Card image cap"></td> -->
            <td><?php echo $comment->getBody(); ?></td>
            <td><?php echo $comment->getPostTitle(); ?></td>            
            <!-- <td><?php //echo $comment->getCreatedAt(); ?></td>
            <td><?php //echo $comment->getUpdatedAt(); ?></td> -->
            <!-- <td><a href="/mvc/comments/show/<?php echo $comment->getId();?>"><i class="far fa-eye"></i></a></td> -->
            <td><?php echo $comment->getUserName(); ?></td>
            <td><?php echo $comment->getCreatedAt(); ?></td>
            <td><?php echo $comment->getStatus(); ?> <a href="/mvc/dashboard/approveComment/<?php echo $comment->getId();?>"><i class="fas fa-check"></i></a></td>
            <td><a href="<?php echo URLROOT; ?>/dashboard/destroyComment/<?php echo $comment->getId();?>"><i class="fas fa-trash-alt"></i></a></td> 

        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>



</div>
<!-- /.container-fluid -->


<?php require APPROOT . '/Resources/Views/dashboard/footer.php'; ?>

