<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Data post - Belajar CI 4</title>

    <body>
        
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <?php if(!empty(session()->getFlashData('message'))) : ?>
                    
                    <div class="alert alert-success">
                        <?php echo session()->getFlashData('message'); ?>
                    </div>

                    <?php endif ?>

                    <a href="<?php echo base_url('post/create') ?>" class="btn btn-md btn-success mb-3">Tambah Data</a>
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($posts as $key => $post) : ?>
                                <tr>
                                    <td><?php echo $post['title'] ?></td>
                                    <td><?php echo $post['content'] ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('post/edit/'.$post['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="<?php echo base_url('post/delete/'.$post['id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php echo $pager->links('post', 'bootstrap_pagination') ?>
                </div>
            </div>
        </div>
        

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </body>

</html>