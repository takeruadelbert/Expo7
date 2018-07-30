<script>
    $(document).ready(function(){
        $.growl.notice({title: "<?= __("Success")?>", message: "<?= h($message); ?>"});
    })
</script>