<div class="modal-body editModal-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="modal-dialog modal-lg modal-marginGallery">

                <!-- Modal Content -->
                <!--==================================================-->
                <div class="modal-content editModal-contentGallery">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 box-homeVideo">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <iframe src="<?= $this->data['Gallery']['video_url'] ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>