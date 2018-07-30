<style>
    iframe {
        display: block;
        width: 1500px;

        /*margin: auto;*/
        margin-left: auto;
        margin-right: auto;
        border: 0;
        overflow:hidden;
    }
</style>
<?php
if ($this->Session->read("credential.member.Account.id")) {
    ?>
    <div style="text-align: center;">
        <iframe name="game" id="game" src="<?= str_replace('\\', '/', Router::url("/{$detailGame['Game']['build_game_path']}", true)) ?>" scrolling="no" marginwidth="100" marginheight="120" ></iframe>
    </div>
    <?php
} else {
    ?>
<section id="content">
    <div class="row backgroundContent container-padding" style="min-height: 700px; display: flex; align-items: center; justify-content: center;">
        <div style="text-align: center;">
            <h3><?= __("Game can only be accessed with an ExpoSeven account.") ?></h3>
            <h3><?= __("No Account yet? Register") ?> <a href="<?= Router::url("/", true) ?>"><?= __("here") ?></a>.</h3>
        </div>
    </div>
</section>
    <?php
}
?>

<script>
    $('#game').on('load', function () {
        var cssLink = document.createElement("link");
        cssLink.href = "<?php echo Router::url("/front_file/expo7/css/game_custom.css", true) ?>";
        cssLink.rel = "stylesheet";
        cssLink.type = "text/css";
        frames['game'].document.head.appendChild(cssLink);

        this.style.height = this.contentWindow.document.body.offsetHeight + 200 + 'px';
//        var canvas = document.getElementById('canvas'),
//        context = canvas.getContext('2d');
//        alert(canvas.width);
    });

</script>