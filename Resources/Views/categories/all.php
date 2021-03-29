
<?php require APPROOT . '/Resources/Views/dashboard/header.php'; ?>

<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="#">Dashboard</a>
</li>
<li class="breadcrumb-item active">Categories</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Categories
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
                  <tr>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Title</th>
                    <!-- <th>Title</th>
                    <th>Author</th>
                    <th>Cr Date</th>
                    <th>Up Date</th> -->
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>

    <tbody>
        <?php foreach($data as $category) : ?>
        <tr>
            <td><?php echo $category->getId(); ?></td>
            <!-- <td><img class="card-img-top" src="/mvc/<?php //echo $category->//getImage();?>" alt="Card image cap"></td> -->
            <td><?php echo $category->getTitle(); ?></td>
            <td><?php echo $category->getSlug(); ?></td>            
            <!-- <td><?php //echo $category->getCreatedAt(); ?></td>
            <td><?php //echo $category->getUpdatedAt(); ?></td> -->
            <td><a href="<?php echo URLROOT; ?>/categorys/show/<?php echo $category->getId();?>"><i class="far fa-eye"></i></a></td>
            <td><a href="<?php echo URLROOT; ?>/dashboard/editCategory/<?php echo $category->getId();?>"><i class="far fa-edit"></i></a></td>
            <td><a href="<?php echo URLROOT; ?>/dashboard/destroyCategory/<?php echo $category->getId();?>"><i class="fas fa-trash-alt"></i></a></td> 

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

