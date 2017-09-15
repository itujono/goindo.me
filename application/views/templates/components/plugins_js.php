<script src="<?php echo base_url(); ?>assets/backend/assets/js/common.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/assets/js/uikit_custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/assets/js/altair_admin_common.min.js"></script>
<script>
    $(function() {
        if(isHighDensity) {
            // enable hires images
            altair_helpers.retina_images();
        }
        if(Modernizr.touch) {
            // fastClick (touch devices)
            FastClick.attach(document.body);
        }
    });
        $window.load(function() {
        // ie fixes
            altair_helpers.ie_fix();
    });
</script>