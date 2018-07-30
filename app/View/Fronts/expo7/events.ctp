<section id="content">
    <div class="row backgroundContent">
        <div class="container container-padding">
            <div class="col-md-12 col-sm-12 col-xs-12 background-container">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-instruction">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-kalenderBerita">
                                    <div class="col-md-4 col-sm-4 col-xs-12 box-kalenderBerita inherit">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-tanggal">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-tanggalNomer font-AvenirLtStd-Black">
                                                    <?= date("d") ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-tanggalSekarang">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-tanggal font-AvenirLtStd-Black">
                                                        <?= $this->Html->getNamaBulan((int)date("n")) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-kalenderBulan">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                                            <div id="dncalendar-links" class="col-md-12 col-sm-12 col-xs-12 dncalendar-links">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <img id="dncalendar-prev-month" class="circle-link-left" src="<?= Router::url("/front_file/expo7/img/icon/arrow-leftKalender2.png", true) ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10 boxOut-kalenderEvent">
                                                            <div id="dncalendar-container">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                                            <div id="dncalendar-links" class="col-md-12 col-sm-12 col-xs-12 dncalendar-links">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <img id="dncalendar-next-month" class="circle-link-right" src="<?= Router::url("/front_file/expo7/img/icon/arrow-rightKalender2.png", true) ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-12 boxOut-contentLeft-bottom inherit mCustomScrollbar" data-mcs-theme="dark-3">
                                        <div class="col-md-12 col-sm-12 col-xs-12 box-contentLeft-bottom">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <?php
                                                    $class = "";
                                                    foreach ($events as $index => $event) {
                                                        if($index % 2 == 0) {
                                                            $class = "left";
                                                        } else {
                                                            $class = "right";
                                                        }
                                                        $event_title = seoUrl($event['Event']['title']);
                                                        ?>
                                                        <div class="col-md-6 col-sm-6 col-xs-12 boxOut-event-<?= $class ?>">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <a href="<?= Router::url("/event/{$event['Event']['id']}/{$event_title}", true) ?>">
                                                                            <div class="boxOut-event-img center-block">
                                                                                <img src="<?= Router::url($event['Event']['thumbnail_path'], true) ?>">
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-event-date font-AvenirLtStd-Light">
                                                                        <?= $this->Html->cvtTanggal($event['Event']['event_date']) ?>
                                                                    </div>
                                                                </div> 
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-event-title font-AvenirLtStd-Heavy">
                                                                        <a href="<?= Router::url("/event/{$event['Event']['id']}/{$event_title}", true) ?>">
                                                                            <?= $event['Event']['title'] ?>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>      
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {

        (function ($) {
            $(window).on("load", function () {
                $(".content").mCustomScrollbar();
            });
        })(jQuery);
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var my_calendar = $("#dncalendar-container").dnCalendar({
            minDate: "2017-04-01",
            maxDate: "2019-12-31",
            monthNames: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            dayNames: ['M', 'S', 'S', 'R', 'K', 'J', 'S'],
            dayNamesShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            dataTitles: {defaultDate: 'default', today: ''},
            notes: [
                {"date": "2017-04-03", "note": ["Tahun Baru 2017 Masehi"]},
                {"date": "2017-04-05", "note": ["Tahun Baru Imlek 2568 Kongzili "]},
                {"date": "2017-04-27", "note": ["Event 1"]},
                {"date": "2017-04-30", "note": ["Event 2"]}
            ],
            showNotes: true,
            startWeek: 'sunday',
            dayClick: function (date, view) {
                alert(date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear());
            }
        });

        // init calendar
        my_calendar.build();

        // update calendar
        // my_calendar.update({
        // 	minDate: "2016-01-05",
        // 	defaultDate: "2016-05-04"
        // });
    });
</script>