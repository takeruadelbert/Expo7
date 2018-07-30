<!-- Modal Content -->
<!--==================================================-->
<div class="modal-content editModal-contentGallery">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 ">
                    <div class="col-md-12 col-sm-12 col-xs-12 box-homeFoto">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxFoto-spesifikasiBarang">
                            <div class="col-md-12 col-sm-12 col-xs-12 gallery">

                                <div class="zoom-left">
                                    <div class="col-md-12 col-sm-12 col-xs-12 box-imgPrimary center">
                                        <img id="img_01" src="<?= Router::url("{$this->data['DetailPhoto'][0]['image_path']}", true) ?>" data-zoom-image="<?= Router::url("{$this->data['DetailPhoto'][0]['image_path']}", true) ?>" />
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleVideo font-AvenirLtStd-Roman">
                                            <?= $this->data['Gallery']['title'] ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-tanggalVideo font-AvenirLtStd-Roman">
                                            <?= $this->Html->cvtTanggal($this->data['Gallery']['date']) ?>
                                        </div>
                                    </div>
                                    <div id="gal1" class="col-md-12 col-sm-12 col-xs-12 boxSecondaryPicture-Barang">
                                        <?php
                                        foreach ($this->data['DetailPhoto'] as $index => $photos) {
                                        ?>
                                        <div class="secondaryPicture-Barang center-block flex">
                                            <a href="#" class="elevatezoom-gallery" data-update="" data-image="<?= Router::url("{$photos['image_path']}", true) ?>" data-zoom-image="<?= Router::url("{$photos['image_path']}", true) ?>">
                                                <img id="img_<?= $index ?>"  src="<?= Router::url("{$photos['image_path']}", true) ?>" width="100"/>
                                            </a>
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
