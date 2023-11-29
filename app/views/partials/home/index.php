<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 >Aplikasi Pencatatan SEP</h4><br>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_rawatinap();  ?>
                    <a class="animated zoomIn record-count card bg-success text-white"  href="<?php print_link("rawat_inap/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-bed fa-2x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Rawat Inap</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_rawatjalan();  ?>
                    <a class="animated zoomIn record-count card bg-warning text-white"  href="<?php print_link("rawat_jalan/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-solid fa-wheelchair fa-2x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Rawat Jalan</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_pengguna();  ?>
                    <a class="animated zoomIn record-count card bg-danger text-white"  href="<?php print_link("pengguna/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-user fa-2x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Pengguna</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-sm-5 comp-grid">
                    <div class="card card-body">
                        <?php 
                        $chartdata = $comp_model->barchart_rawatinap();
                        ?>
                        <div>
                            <h4>Rawat Inap</h4>
                            <small class="text-muted"></small>
                        </div>
                        <hr />
                        <canvas id="barchart_rawatinap"></canvas>
                        <script>
                            $(function (){
                            var chartData = {
                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                            datasets : [
                            {
                            label: 'Rawat Inap by Tanggal Keluar',
                            backgroundColor:'<?php echo random_color(0.9); ?>',
                            type:'bar',
                            borderWidth:3,
                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                            }
                            ]
                            }
                            var ctx = document.getElementById('barchart_rawatinap');
                            var chart = new Chart(ctx, {
                            type:'bar',
                            data: chartData,
                            options: {
                            scaleStartValue: 0,
                            responsive: true,
                            scales: {
                            xAxes: [{
                            ticks:{display: true},
                            gridLines:{display: true},
                            categoryPercentage: 1.0,
                            barPercentage: 0.8,
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            },
                            }],
                            yAxes: [{
                            ticks: {
                            beginAtZero: true,
                            display: true
                            },
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }]
                            },
                            }
                            ,
                            })});
                        </script>
                    </div>
                </div>
                <div class="col-md-4 comp-grid">
                    <div class="card card-body">
                        <?php 
                        $chartdata = $comp_model->barchart_rawatjalan();
                        ?>
                        <div>
                            <h4>Rawat Jalan</h4>
                            <small class="text-muted"></small>
                        </div>
                        <hr />
                        <canvas id="barchart_rawatjalan"></canvas>
                        <script>
                            $(function (){
                            var chartData = {
                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                            datasets : [
                            {
                            label: 'Rawat Jalan',
                            backgroundColor:'<?php echo random_color(0.9); ?>',
                            type:'bar',
                            borderWidth:3,
                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                            }
                            ]
                            }
                            var ctx = document.getElementById('barchart_rawatjalan');
                            var chart = new Chart(ctx, {
                            type:'bar',
                            data: chartData,
                            options: {
                            scaleStartValue: 0,
                            responsive: true,
                            scales: {
                            xAxes: [{
                            ticks:{display: true},
                            gridLines:{display: true},
                            categoryPercentage: 1.0,
                            barPercentage: 0.8,
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            },
                            }],
                            yAxes: [{
                            ticks: {
                            beginAtZero: true,
                            display: true
                            },
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }]
                            },
                            }
                            ,
                            })});
                        </script>
                 </div>
            </div>
                <div class="col-md-5 comp-grid">
                    <div class="card card-body">
                        <?php 
                        $chartdata = $comp_model->barchart_rawatinapbytanggalmasuk();
                        ?>
                        <div>
                            <h4>Rawat Inap</h4>
                            <small class="text-muted"></small>
                        </div>
                        <hr />
                        <canvas id="barchart_rawatinapbytanggalmasuk"></canvas>
                        <script>
                            $(function (){
                            var chartData = {
                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                            datasets : [
                            {
                            label: 'Rawat Inap by Tanggal Masuk',
                            backgroundColor:'<?php echo random_color(0.9); ?>',
                            type:'bar',
                            borderWidth:3,
                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                            }
                            ]
                            }
                            var ctx = document.getElementById('barchart_rawatinapbytanggalmasuk');
                            var chart = new Chart(ctx, {
                            type:'bar',
                            data: chartData,
                            options: {
                            scaleStartValue: 0,
                            responsive: true,
                            scales: {
                            xAxes: [{
                            ticks:{display: true},
                            gridLines:{display: true},
                            categoryPercentage: 1.0,
                            barPercentage: 0.8,
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            },
                            }],
                            yAxes: [{
                            ticks: {
                            beginAtZero: true,
                            display: true
                            },
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }]
                            },
                            }
                            ,
                            })});
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
