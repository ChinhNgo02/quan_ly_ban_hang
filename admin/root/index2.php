<?php
require '../check_admin_login.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }

    #container {
        height: 400px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
    </style>
</head>

<body>
    Đây là giao diện admin
    <?php
    include '../menu.php';
?>
    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        const days = 30;
        $.ajax({
                url: 'get_so_san_pham.php',
                data: {
                    days
                },
                dataType: 'json',
            })
            .done(function(response) {
                // console.log(response);
                const arr = Object.values(response[0]);
                const arrDetail = [];
                Object.values(response[1]).forEach((each) => {
                    each.data = Object.values(each.data);
                    arrDetail.push(each);

                })
                // Create the chart
                // console.log(1);
                setTimeout(function() {
                    getChart(days, arr, arrDetail)
                }, 1000);
            });
    });

    function getChart(days, arr, arrDetail) {

        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Tổng sổ sản phẩm bán được trong' + days
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Tổng số bán được'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b>total<br/>'
            },

            series: [{
                name: "Browser",
                colorByPoint: true,
                data: arr
            }],
            drilldown: {
                series: arrDetail
            }

        });
    }
    </script>

</body>

</html>