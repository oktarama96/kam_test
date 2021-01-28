<?= $this->extend('layout/template'); ?>

<?= $this->section('css'); ?>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
    <script src="<?= base_url(); ?>/assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(function () {
            $('.data-table').DataTable()
        });

        function detail(a){
            $.ajax({
                type: "GET",
                url: "https://reqres.in/api/users/"+a,

                success: function(msg){
                    $("#first_name").text(msg.data.first_name);
                    $("#last_name").text(msg.data.last_name);
                    $("#email").text(msg.data.email);
                    $('#avatar').attr('src', msg.data.avatar);
                }
            })
        }
    </script>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            User
            <small>Data User</small>
            </h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">User</a></li>
            <li class="active">Data User</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data User</h3>

                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered data-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Avatar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($results): ?>
                        <?php foreach($results->data as $result): ?>
                        <tr>
                            <td><?php echo $result->id; ?></td>
                            <td><?php echo $result->email; ?></td>
                            <td><?php echo $result->first_name; ?></td>
                            <td><?php echo $result->last_name; ?></td>
                            <td><img src="<?php echo $result->avatar; ?>" class="img-thumbnail"></td>
                            <td ><button type="button" class="btn btn-success" data-toggle='modal' data-target='#detail' onclick="detail(<?php echo $result->id; ?>)"><i class="fa fa-info"></i></button></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!--Modal view-->
    <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="detail" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add">Detail User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img id="avatar" src="" name="aboutme" width="140" height="140" border="0" class="img-circle">
                        <h3 class="media-heading"><span id='first_name'></span> <span id='last_name'></span></h3>
                        <hr>
                        <p><strong>Email: <span id='email'></span></strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>