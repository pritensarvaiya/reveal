<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/media/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/media/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/media/js/jquery-ui.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery.easing/jquery.easing.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/php-email-form/validate.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/wow/wow.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/venobox/venobox.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/owl.carousel/owl.carousel.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery-sticky/jquery.sticky.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/superfish/superfish.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/hoverIntent/hoverIntent.js') ?>"></script>
    <!-- Template Main JS File -->
    <script src="<?php echo base_url('assets/js/main.js') ?>"></script>
    <script>      
        $(document).ready(function(){
            $("#myTable").dataTable();
            $( "#datepicker" ).datepicker({
                    dateFormat : 'yy-mm-dd',
                    showAnim   : 'fold',
                    changeMonth:  true,
                    maxDate    :  0,
                    beforeShowDay: function(date) {
                        var day = date.getDay();
                        return [day != 0,''];
                    }
            });
            var $ppc = $('.progress-pie-chart'),
                percent = parseInt($ppc.data('percent')),
                deg = 360 * percent / 100;
            if (percent > 50) {
                $ppc.addClass('gt-50');
            }
            $('.ppc-progress-fill').css('transform', 'rotate(' + deg + 'deg)');
            $('.ppc-percents span').html(percent + '%');
        });
    </script>
    
</body>

</html>