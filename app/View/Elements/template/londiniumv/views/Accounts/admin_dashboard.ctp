<ul class="info-blocks">
    <li class="bg-primary">
        <div class="top-info">
            <a href="#">TOTAL USER REGISTER</a>
            <small><?= $this->Html->cvtTanggal($today->format("Y-m-d")) ?></small>
        </div>
        <a href="#"><i class="icon-stats"></i></a>
        <span class="bottom-info bg-danger"><?= $dataUserRegisterToday ?> User(s)</span>
    </li>
    <li class="bg-danger">
        <div class="top-info">
            <a href="#">TOTAL UNPAID USER</a>
            <small><?= $this->Html->cvtTanggal($today->format("Y-m-d")) ?></small>
        </div>
        <a href="#"><i class="icon-stats2"></i></a>
        <span class="bottom-info bg-primary"><?= $dataUserWaitingPaymentToday ?> User(s)</span>
    </li>
    <li class="bg-warning">
        <div class="top-info">
            <a href="#">TOTAL PAID USER</a>
            <small><?= $this->Html->cvtTanggal($today->format("Y-m-d")) ?></small>
        </div>
        <a href="#"><i class="icon-stats3"></i></a>
        <span class="bottom-info bg-primary"><?= $dataPaidUserToday ?> User(s)</span>
    </li>
</ul>
<br><br>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div id="data-user-register" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div id="data-user-waiting-payment" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3"></div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div id="data-paid-user" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3"></div>
</div>
<script type="text/javascript">
    Highcharts.chart('data-user-register', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Data User Register'
        },
        xAxis: {
            categories: <?= $categories_label_encode ?>,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total User'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} User</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [<?= $data_user_register_encode ?>],
        exporting: {
            enabled: false
        },
        credits: {
            enabled: false
        }
    });

    Highcharts.chart('data-user-waiting-payment', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Data Unpaid User'
        },
        xAxis: {
            categories: <?= $categories_label_encode ?>,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total User'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} User</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [<?= $data_user_waiting_payment_encode ?>],
        exporting: {
            enabled: false
        },
        credits: {
            enabled: false
        }
    });

    Highcharts.chart('data-paid-user', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Data paid User'
        },
        xAxis: {
            categories: <?= $categories_label_encode ?>,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total User'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} User</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [<?= $data_paid_user_encode ?>],
        exporting: {
            enabled: false
        },
        credits: {
            enabled: false
        }
    });
</script>