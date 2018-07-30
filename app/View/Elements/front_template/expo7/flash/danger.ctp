<script>
    $(document).ready(function(){
        $.growl.warning({title: "<?= __("Error")?>", message: "<?= h($message); ?>"});
    })
</script>