<?= $this->extend('layout/template'); ?>

<?= $this->section('css'); ?>
    <!-- Morris charts -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/adminlte/bower_components/morris.js/morris.css">
   
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>

<!-- FLOT CHARTS -->
<script src="<?= base_url(); ?>/assets/adminlte/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?= base_url(); ?>/assets/adminlte/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?= base_url(); ?>/assets/adminlte/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?= base_url(); ?>/assets/adminlte/bower_components/Flot/jquery.flot.categories.js"></script>

<!-- Morris.js charts -->
<script src="<?= base_url(); ?>/assets/adminlte/bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url(); ?>/assets/adminlte/bower_components/morris.js/morris.min.js"></script>

<script type="text/javascript">
    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [
          
        //   ['January', 10], ['February', 8], ['March', 4], ['April', 13], ['May', 17], ['June', 9],

        <?php 
            // for($i=1; $i <= $penjualanperbulantotal; $i++){
            //     echo "<script>console.log('".$penjualanperbulan->data[$i]."')</script>";
            // }

            $arr = array();
            $bulan;
            $i = 0;

            foreach($penjualanperbulan->data as $p){
                switch(substr($p->month_id,5)){
                    case 1:
                        $bulan = "Januari";
                    break;
                    case 2:
                        $bulan = "Februari";
                    break;
                    case 3:
                        $bulan = "Maret";
                    break;
                    case 4:
                        $bulan = "April";
                    break;
                    case 5:
                        $bulan = "Mei";
                    break;
                    case 6:
                        $bulan = "Juni";
                    break;
                    case 7:
                        $bulan = "Juli";
                    break;
                    case 8:
                        $bulan = "Agustus";
                    break;
                    case 9:
                        $bulan = "September";
                    break;
                    case 10:
                        $bulan = "Oktober";
                    break;
                    case 11:
                        $bulan = "November";
                    break;
                    case 12:
                        $bulan = "Desember";
                    break;
                }

                echo "['".$bulan."','$p->total_sales'],";
            }
        ?>
          
        ],
      color: '#3c8dbc'
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.5,
          align   : 'center'
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    })
    /* END BAR CHART */

    /*
     * DONUT CHART
     * -----------
     */

    var donutData = [
        <?php
            $color = ['#3c8dbc', '#0073b7', '#00c0ef'];

            $i=0;
            foreach($topcust->data as $t){
                
                 echo "{ label: '".$t->customer_name."', data: ".$t->total_buy.", color: '".$color[$i]."' },";
            $i++;
            }
        ?>  
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: true
      }
    })
    /*
     * END DONUT CHART
     */

    /*
    * Custom Label formatter
    * ----------------------
    */
    function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        + label
        + '<br>'
        + Math.round(series.percent) + '%</div>'
    }

    $(function () {
        "use strict";
        // LINE CHART
       
        var line_e = new Morris.Line({
            element: 'east',
            resize: true,
            data: [
            <?php
                foreach($east->data as $e){
                    echo "{y: '".$e->year_id."', item1: ".$e->total_sales."},";
                }
            ?>                
            ],
            xkey: 'y',
            ykeys: ['item1'],
            labels: ['Sales'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto'
        });

        var line_w = new Morris.Line({
            element: 'west',
            resize: true,
            data: [
            <?php
                foreach($west->data as $w){
                    echo "{y: '".$w->year_id."', item1: ".$w->total_sales."},";
                }
            ?>                
            ],
            xkey: 'y',
            ykeys: ['item1'],
            labels: ['Sales'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto'
        });

        var line_c = new Morris.Line({
            element: 'central',
            resize: true,
            data: [
            <?php
                foreach($central->data as $c){
                    echo "{y: '".$c->year_id."', item1: ".$c->total_sales."},";
                }
            ?>                
            ],
            xkey: 'y',
            ykeys: ['item1'],
            labels: ['Sales'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto'
        });

        var line_s = new Morris.Line({
            element: 'south',
            resize: true,
            data: [
            <?php
                foreach($south->data as $s){
                    echo "{y: '".$s->year_id."', item1: ".$s->total_sales."},";
                }
            ?>                
            ],
            xkey: 'y',
            ykeys: ['item1'],
            labels: ['Sales'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto'
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
            Dashboard
            <small>Our Dashboard</small>
            </h1>
            <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            </ol>
        </section>

        <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Penjualan Tahun <?= $tahun; ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
            <div class="box box-primary">
                <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>

                <h3 class="box-title">Top 3 Customers</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                </div>
                <div class="box-body">
                <div id="donut-chart" style="height: 300px;"></div>
                </div>
                <!-- /.box-body-->
            </div>
            <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Top 10 Best Product</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Product Name</th>
                                <th>Year</th>
                                <th style="width: 40px">Total Sold</th>
                            </tr>

                            <?php if($topprod): ?>
                            <?php $no = 1; ?>
                            <?php foreach($topprod->data as $tp): ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $tp->product_name; ?></td>
                                <td><?php echo $tp->year_id; ?></td>
                                <td><span class="badge bg-green"><?php echo $tp->total_sold; ?></span></td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <div class="col-md-6">
              <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Top 10 Worst Product</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Product Name</th>
                                <th>Year</th>
                                <th style="width: 40px">Total Sold</th>
                            </tr>
                            <?php if($worstprod): ?>
                            <?php $no = 1; ?>
                            <?php foreach($worstprod->data as $wp): ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $wp->product_name; ?></td>
                                <td><?php echo $wp->year_id; ?></td>
                                <td><span class="badge bg-red"><?php echo $wp->total_sold; ?></span></td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
          </div>
      </div>

      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Bar chart -->
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-bar-chart-o"></i>

                            <h3 class="box-title">Penjualan Region East Tahun <?= $tahun; ?></h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="east" style="height: 250px;"></div>
                        </div>
                    </div>
                        <!-- /.box -->
                </div>

                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-bar-chart-o"></i>

                            <h3 class="box-title">Penjualan Region West Tahun <?= $tahun; ?></h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="west" style="height: 250px;"></div>
                        </div>
                            <!-- /.box-body-->
                    </div>
                        <!-- /.box -->
                </div>

                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-bar-chart-o"></i>

                            <h3 class="box-title">Penjualan Region Central Tahun <?= $tahun; ?></h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="central" style="height: 250px;"></div>
                        </div>
                            <!-- /.box-body-->
                    </div>
                        <!-- /.box -->
                </div>

                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-bar-chart-o"></i>

                            <h3 class="box-title">Penjualan Region South Tahun <?= $tahun; ?></h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="south" style="height: 250px;"></div>
                        </div>
                            <!-- /.box-body-->
                    </div>
                        <!-- /.box -->
                </div>
            </div>

        </section>
        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?= $this->endSection(); ?>