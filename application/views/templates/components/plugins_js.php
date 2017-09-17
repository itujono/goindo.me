<script src="<?php echo base_url(); ?>assets/backend/assets/js/common.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/assets/js/uikit_custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/assets/js/altair_admin_common.min.js"></script>
<?php 
$datatables = '
    <script src="'.base_url().'assets/backend/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="'.base_url().'assets/backend/assets/js/custom/datatables_uikit.min.js"></script>
    <script src="'.base_url().'assets/backend/assets/js/pages/plugins_datatables.min.js"></script>
    <script src="'.base_url().'assets/backend/bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
';

$forms_advanced='<script src="'.base_url().'assets/backend/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="'.base_url().'assets/backend/assets/js/pages/forms_advanced.min.js"></script>';
?>
<!--  preloaders functions -->
<script src="<?php echo base_url(); ?>assets/backend/assets/js/pages/components_preloaders.min.js"></script>
<?php
if($plugins == 'plugins_datatables'){
?>
        
<?php echo $datatables;?>

<?php echo $forms_advanced;?>

<?php } ?>
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