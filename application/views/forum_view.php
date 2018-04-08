<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 4/8/18
 * Time: 4:56 PM
 */
?>
<script>
    function resizeIframe(obj) {
        obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    }
</script>
<div class="container-fluid">
    <div class="row col-12">
        <iframe src='<?php echo $forum; ?>' style='width: 100%;height: 100%; padding: 0px; margin: 0;
        border: none; display: block; overflow: hidden; ' onload='resizeIframe(this)'></iframe>
    </div>
</div>