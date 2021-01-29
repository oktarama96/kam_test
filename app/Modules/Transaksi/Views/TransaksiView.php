<?= $this->extend('layout/template'); ?>

<?= $this->section('css'); ?>
    <!-- Pace style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/adminlte/plugins/pace/pace.min.css">
 
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
    <!-- PACE -->
    <script src="<?= base_url(); ?>/assets/adminlte/bower_components/PACE/pace.min.js"></script>
    <script>

        $(document).ajaxStart(function() { Pace.restart(); });  
        
        // $("select[name='customer_name']").on('', function(){
        //     $.ajax({
        //         type: "GET",
        //         url: "https://api-test.godig1tal.com/customer/all_customer",
        //         success: function(msg){
        //             // console.log(msg.data[2]);

        //             var data = "<option value='-'>Pilih Customer</option>";
        //             for(i = 0; i < msg.total; i++){
        //                 data = data+"<option value='"+msg.data[i].customer_name+"'>"+msg.data[i].customer_name+"</option>"; 
        //             };
        //             $("select[name='customer_name']").append(data);
        //         },
        //         error: function (data) {
        //            $("#alert").append("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Error!</strong> Something its happen.</div>");
        //         }

        //     })
        // });

    //     $("select[name='customer_name']").on('change', function(){
    //         $.ajax({
    //             dataType: 'jsonp',
    //             cors: true ,
    //             secure: true,
    //             headers: {
    //                 'Access-Control-Allow-Origin': '*',
    //             },
    //             type: "GET",
    //             url: "https://api-test.godig1tal.com/product/all_product",
    //             success: function(msg){


    //                 var data = "<option value='-'>Pilih Product</option>";
    //                 for(i = 0; i < msg.total; i++){
    //                     data = data+"<option value='"+msg.data[i].product_name+"'>"+msg.data[i].product_name+"</option>"; 
    //                 };
    //                 $("select[name='product_name']").append(data);
    //             },
    //             error: function (data) {
    //                $("#alert").append("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Error!</strong> Something its happen.</div>");
    //             }

    //         })
    //     });
    // </script>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Transaksi
            <small>Tambah Transaksi</small>
            </h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Transaksi</a></li>
            <li class="active">Tambah Transaksi</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Transaksi</h3>

                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="alert"></div>
                    <!-- form start -->
                    <form method="post" action="/transaksi/add">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <select class="form-control" name="customer_id" required>
                                    <?php if($customer): ?>
                                    <?php foreach($customer->data as $resultc): ?>
                                    <option value="<?= $resultc->customer_id ;?>"><?= $resultc->customer_name; ?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            
                            </div>
                            <div class="form-group">
                                <label>Product Name</label>
                                <select class="form-control" name="product_id" required>
                                    <?php if($product): ?>
                                    <?php foreach($product->data as $resultp): ?>
                                    <option value="<?= $resultp->product_id ;?>"><?= $resultp->product_name; ?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            
                            </div>
                            <div class="form-group">
                                <label>Region Name</label>
                                <select class="form-control" name="region_name" required>
                                    <option value="East">East</option>
                                    <option value="West">West</option>
                                    <option value="Central">Central</option>
                                    <option value="South">South</option>
                                </select>
                    
                            </div>
                            <div class="form-group">
                                <label>Sales</label>
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="number" class="form-control" name="sales" required>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?= $this->endSection(); ?>