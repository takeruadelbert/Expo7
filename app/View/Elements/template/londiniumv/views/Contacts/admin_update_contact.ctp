<?php echo $this->Form->create("Contact", array("class" => "form-horizontal form-separate", "action" => "update_contact", "id" => "formSubmit", "inputDefaults" => array("error" => array("attributes" => array("wrap" => "label", "class" => "error"))))) ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="block-inner text-danger">
                    <h6 class="heading-hr"><?= __("Update Contact") ?>
                    </h6>
                </div>
                <div class="table-responsive">
                    <table width="100%" class="table">
                        <div class="panel-heading" style="background:#2179cc">
                            <h6 class="panel-title" style=" color:#fff"><i class="icon-menu2"></i><?= __("Data Contact") ?></h6>
                        </div>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("Contact.address_eng", __("Address"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("Contact.address_eng", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("Contact.address_ind", __("Address (Indonesia)"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("Contact.address_ind", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("Contact.phone", __("Phone / Mobile Phone"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("Contact.phone", array("div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("Contact.email_eng", __("Email"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("Contact.email_eng", array("type" => "text", "div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("Contact.email_ind", __("Email (Indonesia)"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("Contact.email_ind", array("type" => "text", "div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("Contact.description_eng", __("Description"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("Contact.description_eng", array("type" => "text", "div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                    echo $this->Form->label("Contact.description_ind", __("Description (Indonesia)"), array("class" => "col-sm-2 control-label"));
                                    echo $this->Form->input("Contact.description_ind", array("type" => "text", "div" => array("class" => "col-sm-10"), "label" => false, "class" => "editor", "placeholder" => "Enter text ..."));
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:200px">
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-11">
                                        <?php
                                        $lat = $this->data['Contact']['latitude'];
                                        $long = $this->data['Contact']['longitude'];
                                        $map_options = array(
                                            "id" => "map_canvas",
                                            "width" => "1300px",
                                            "height" => "500px",
                                            "localize" => false,
                                            "zoom" => 10,
                                            "address" => "Indonesia, Bandung",
                                            "marker" => true,
                                            "infoWindow" => true
                                        );
                                        ?>
                                        <?= $this->GoogleMap->map($map_options); ?>
                                        <?= $this->GoogleMap->addMarker("map_canvas", 1, array("latitude" => $lat, "longitude" => $long)); ?>
                                        <?= $this->GoogleMap->addMarker("map_canvas", 2, "Indonesia, Lembang");
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->label("Contact.latitude", __("Latitude"), array("class" => "col-sm-3 control-label"));
                                            echo $this->Form->input("Contact.latitude", array("div" => array("class" => "col-sm-3"), "label" => false, "class" => "form-control", "type" => "text", "id" => "lat"));
                                            echo $this->Form->label("Contact.longitude", __("Longitude"), array("class" => "col-sm-3 control-label"));
                                            echo $this->Form->input("Contact.longitude", array("div" => array("class" => "col-sm-3"), "label" => false, "class" => "form-control", "type" => "text", "id" => "long"));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-actions text-right">
                                    <input name="Button" type="button" onclick="history.go(-1);" class="btn btn-success" value="<?= __("Kembali") ?>">
                                    <input type="reset" value="Reset" class="btn btn-info">
                                    <input type="submit" value="<?= __("Simpan") ?>" class="btn btn-danger">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end() ?>
<script type="text/javascript">
    window.onload = function () {
        var lat = $('#lat').val();
        var long = $('#long').val();
        var marker = new google.maps.Marker({
        });
        var mapOptions = {
            center: new google.maps.LatLng(lat, long),
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var infoWindow = new google.maps.InfoWindow();
        var latlngbounds = new google.maps.LatLngBounds();
        var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        var position = new google.maps.LatLng(lat, long);
        marker.setPosition(position);
        marker.setMap(map);
        google.maps.event.addListener(map, 'click', function (e) {
            marker.setPosition(e.latLng);
            marker.setMap(map);
            marker.setAnimation(google.maps.Animation.DROP);
            $('#lat').val(e.latLng.lat() + "");
            $('#long').val(e.latLng.lng() + "");
        });
    }
</script>