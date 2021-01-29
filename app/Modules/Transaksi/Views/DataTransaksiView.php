<?= $this->extend('layout/template'); ?>

<?= $this->section('css'); ?>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Pace style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/adminlte/plugins/pace/pace.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
    <!-- PACE -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>/assets/adminlte/bower_components/PACE/pace.min.js"></script>
    <script src="<?= base_url(); ?>/assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url(); ?>/assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    
    <script>

        $(document).ajaxStart(function() { Pace.restart(); });  
        
        $(document).ready(function() {
            var to = moment().endOf('day').format("YYYY-MM-DD");
            var from = moment().startOf('day').format("YYYY-MM-DD");

            $('#tglAwal').val(from);
            $('#tglAkhir').val(to);

            $('#tglAwal').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true
            });

            $("#tglAwal").change(function(){
                $('#tglAkhir').val($('#tglAwal').val());
            });

            $('#tglAkhir').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true
            });
            
            fetch_data(from, to, 'East');
            
            function fetch_data(date_start='', date_end='', region=''){    
                var tabel = $('.data-table').DataTable({
                    "serverSide": false,
                    "order" : [[ 0, "desc" ]],
                    "ajax": {
                        url : "https://api-test.godig1tal.com/order/range_date_region_order",
                        type : "POST",
                        data : {region:region, date_start:date_start, date_end:date_end},
                    },
                    "columns": [{"data": "order_id"}, {"data": "date"}, {"data": "customer_name"}, {"data": "region"}, {"data": "product_name"}, {"data": "sales"}]
                });
            }
            
            $('#cari').click(function(){
                var start_date = $('#tglAwal').val();
                var end_date = $('#tglAkhir').val();
                var region = $('#region').val();
                if(start_date != '' && end_date !='' && region !='')
                    {
                        $('.data-table').DataTable().destroy();
                        fetch_data(start_date, end_date, region);
                    }
                else
                    {
                        alert("Tanggal Awal, Akhir dan Region harus diisi");
                    }
            });
        });


    </script>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Transaksi
            <small>Data Transaksi</small>
            </h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Transaksi</a></li>
            <li class="active">Data Transaksi</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Transaksi</h3>
                    
                    <div class="row" style="margin-top: 15px">
                          <form>
                          <div class="col-sm-3">
                              <div class="form-group">
                                <label>Region:</label>
                                    <select class="form-control" name="region_name" id="region">
                                        <option value="East">East</option>
                                        <option value="West">West</option>
                                        <option value="Central">Central</option>
                                        <option value="South">South</option>
                                    </select>
                                </div>
                            </div>

                          <div class="col-sm-3">
                              <div class="form-group">
                                <label>Tanggal Awal:</label>

                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control pull-left " name="date_start" id="tglAwal">
                                </div>
                              </div>
                          </div>
                                <!-- /.input group -->
                          <div class="col-sm-3">
                             <div class="form-group">
                                <label>Tanggal Akhir:</label>

                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control pull-left daterange-cari" name="date_end" id="tglAkhir">
                                    <span class="input-group-btn">
                                      <button type="button" class="btn btn-info btn-flat" id="cari">CARI</button>
                                    </span>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-sm-3"></div>
                        </form>
                    </div>

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
                                    <th>Order Id</th>
                                    <th>Date</th>
                                    <th>Customer Name</th>
                                    <th>Region</th>
                                    <th>Product Name</th>
                                    <th>Sales</th>
                                </tr>
                            </thead>
                            <tbody id="transaksi">
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

<?= $this->endSection(); ?>