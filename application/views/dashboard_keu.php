<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/statistics/chartjs/chartjs.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> Keuangan <span class='fw-300'>Dashboard</span>
        </h1>
        <div class="d-flex mr-4">
            <div>
                <label class="fs-sm mb-0 mt-2 mt-md-0">DATA TAHUN</label>
                <h4 class="text-right font-weight-bold mb-0"><?php echo date('Y'); ?></h4>
            </div>
        </div>
        <?php foreach ($ttl_tahun as $data) { ?>
            <div class="d-flex mr-4">
                <div>
                    <label class="fs-sm mb-0 mt-2 mt-md-0">PENDAPATAN</label>
                    <h4 class="text-right font-weight-bold mb-0">Rp. <?php echo angka($data->kredit) ?></h4>
                </div>
            </div>
            <div class="d-flex mr-4">
                <div>
                    <label class="fs-sm mb-0 mt-2 mt-md-0">PENGELUARAN</label>
                    <h4 class="text-right font-weight-bold mb-0">Rp. <?php echo angka($data->debit) ?></h4>
                </div>
            </div>
            <div class="d-flex mr-0">
                <div>
                    <label class="fs-sm mb-0 mt-2 mt-md-0">LABA / RUGI</label>
                    <h4 class="text-right font-weight-bold mb-0">Rp. <?php echo angka($data->kredit - $data->debit) ?></h4>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-10" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Dashboard <span class="fw-300">Pendapatan & Pengeluaran</span>
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <?php //echo $this->db->last_query();
                                ?>
                                <div id="barlineCombine">
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div id="panel-8" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Dashboard <span class="fw-300"><i>Laba Rugi</i></span>
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div id="barChart">
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/app.bundle.js"></script>
<!-- plugin Chart.js : MIT license -->
<script src="<?php echo base_url() ?>assets/smartadmin/js/statistics/chartjs/chartjs.bundle.js"></script>
<script>
    /* bar chart */
    var barChart = function() {
        var barChartData = {
            labels: [<?php foreach ($laba_bln as $data) {
                            echo "'" . $data->nm_bln . "',";
                        } ?>],
            datasets: [{
                    label: "Laba",
                    backgroundColor: myapp_get_color.success_300,
                    borderColor: myapp_get_color.success_500,
                    borderWidth: 1,
                    data: [
                        <?php foreach ($laba_bln as $data) {
                            echo "'" . $data->laba . "',";
                        } ?>
                    ]
                }
                //,
                // {
                //     label: "Blue",
                //     backgroundColor: myapp_get_color.primary_300,
                //     borderColor: myapp_get_color.primary_500,
                //     borderWidth: 1,
                //     data: [-10,
                //         16,
                //         72,
                //         93,
                //         29, -74,
                //         64
                //     ]
                // }
            ]

        };
        var config = {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Bar Chart'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: '6 months forecast'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Profit margin (approx)'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        }
        new Chart($("#barChart > canvas").get(0).getContext("2d"), config);
    }
    /* bar chart -- end */

    /* grid color */
    var gridColor = function() {
        var config = {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                        data: [10, 24, 20, 25, 35, 50],
                        backgroundColor: 'rgba(0,0,0, 0.07)',
                        borderColor: myapp_get_color.fusion_300,
                        borderWidth: 1,
                        fill: true
                    },
                    {
                        data: [20, 30, 28, 33, 45, 65],
                        backgroundColor: 'rgba(0,0,0, 0.03)',
                        borderColor: myapp_get_color.fusion_100,
                        borderWidth: 1,
                        fill: true
                    }
                ]
            },
            options: {
                legend: {
                    display: false,
                    labels: {
                        display: false
                    }
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            color: ['', myapp_get_color.danger_500, myapp_get_color.success_500]
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11,
                            max: 80
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        }
        new Chart($("#gridColor > canvas").get(0).getContext("2d"), config);
    }
    /* grid color -- end */

    /* bar & line combine */
    var barlineCombine = function() {
        var barlineCombineData = {
            labels: [<?php foreach ($ttl_bln as $data) {
                            echo "'" . $data->nm_bln . "',";
                        } ?>],
            datasets: [{
                    type: 'line',
                    label: 'Tren Pendapatan',
                    borderColor: myapp_get_color.danger_300,
                    pointBackgroundColor: myapp_get_color.danger_500,
                    pointBorderColor: myapp_get_color.danger_500,
                    pointBorderWidth: 1,
                    borderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 5,
                    fill: false,
                    data: [
                        <?php foreach ($ttl_bln as $data) {
                            echo "'" . $data->kredit . "',";
                        } ?>
                    ]
                },
                {
                    type: 'bar',
                    label: 'Pendapatan',
                    backgroundColor: myapp_get_color.primary_300,
                    borderColor: myapp_get_color.primary_500,
                    data: [
                        <?php foreach ($ttl_bln as $data) {
                            echo "'" . $data->kredit . "',";
                        } ?>
                    ],
                    borderWidth: 1
                },
                {
                    type: 'bar',
                    label: 'Pengeluaran',
                    backgroundColor: myapp_get_color.success_300,
                    borderColor: myapp_get_color.success_500,
                    data: [
                        <?php foreach ($ttl_bln as $data) {
                            echo "'" . $data->debit . "',";
                        } ?>
                    ],
                    borderWidth: 1
                }
            ]

        };
        var config = {
            type: 'bar',
            data: barlineCombineData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Bar Chart'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: '6 months forecast'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Profit margin (approx)'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        }
        new Chart($("#barlineCombine > canvas").get(0).getContext("2d"), config);
    }
    /* bar & line combine -- end */

    /* initialize all charts */
    $(document).ready(function() {
        barChart();
        barlineCombine();
    });
</script>