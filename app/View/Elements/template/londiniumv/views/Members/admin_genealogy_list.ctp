<?php
echo $this->element(_TEMPLATE_DIR . "/{$template}/filter/member-genealogy-list");
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("GENAOLOGY LIST") ?>
                <small class="display-block"><?= _APP_CORPORATE ?></small>
            </h6>
        </div>
        <div id="genealogylist">

        </div>
    </div>
</div>
<script>
    var testdata = <?= json_encode($tree) ?>;
    $(document).ready(function () {
        $('#genealogylist').tree({
            data: testdata
        });
    })
</script>

