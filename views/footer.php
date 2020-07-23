<div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Realización SENA  CDA Chía <a href="#">WAPV </a> All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- jquery
            ============================================ -->
            <script src="<?php echo constant('URL'); ?>public/js/vendor/jquery-1.11.3.min.js"></script>
            <!-- bootstrap JS
                ============================================ -->
            <script src="<?php echo constant('URL'); ?>public/js/bootstrap.min.js"></script>
            <!-- wow JS
                ============================================ -->
            <script src="<?php echo constant('URL'); ?>public/js/wow.min.js"></script>
            <!-- price-slider JS
                ============================================ -->
            <script src="<?php echo constant('URL'); ?>public/js/jquery-price-slider.js"></script>
            <!-- meanmenu JS
                ============================================ -->
            <script src="<?php echo constant('URL'); ?>public/js/jquery.meanmenu.js"></script>
            <!-- owl.carousel JS
                ============================================ -->
            <script src="<?php echo constant('URL'); ?>public/js/owl.carousel.min.js"></script>
            <!-- sticky JS
                ============================================ -->
            <script src="<?php echo constant('URL'); ?>public/js/jquery.sticky.js"></script>
            <!-- scrollUp JS
                ============================================ -->
            <script src="<?php echo constant('URL'); ?>public/js/jquery.scrollUp.min.js"></script>
            <!-- mCustomScrollbar JS
                ============================================ -->
            <script src="<?php echo constant('URL'); ?>public/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
            <script src="<?php echo constant('URL'); ?>public/js/scrollbar/mCustomScrollbar-active.js"></script>
            <!-- metisMenu JS
                ============================================ -->
            <script src="<?php echo constant('URL'); ?>public/js/metisMenu/metisMenu.min.js"></script>
            <script src="<?php echo constant('URL'); ?>public/js/metisMenu/metisMenu-active.js"></script>
            <!-- morrisjs JS
                ============================================ -->
            <script src="<?php echo constant('URL'); ?>public/js/morrisjs/raphael-min.js"></script>
            <script src="<?php echo constant('URL'); ?>public/js/morrisjs/morris.js"></script>
            <script src="<?php echo constant('URL'); ?>public/js/morrisjs/morris-active.js"></script>
            <!-- morrisjs JS
                ============================================ -->
            <script src="<?php echo constant('URL'); ?>public/js/sparkline/jquery.sparkline.min.js"></script>
            <script src="<?php echo constant('URL'); ?>public/js/sparkline/jquery.charts-sparkline.js"></script>
            <!-- calendar JS
                ============================================ -->
            <script src="<?php echo constant('URL'); ?>public/js/calendar/moment.min.js"></script>
            <script src="<?php echo constant('URL'); ?>public/js/calendar/fullcalendar.min.js"></script>
            <script src="<?php echo constant('URL'); ?>public/js/calendar/fullcalendar-active.js"></script>
            <!-- plugins JS
                ============================================ -->
            <script src="<?php echo constant('URL'); ?>public/js/plugins.js"></script>
            <!-- main JS
                ============================================ -->
            <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>
            <script src="<?php echo constant('URL'); ?>public/js/vendor/modernizr-2.8.3.min.js"></script>
            <script src="<?php echo constant('URL'); ?>public/js/main1.js"></script>

            

            <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/select.js"></script>
  <script>

    $(document).ready(function() {
    $('.js-example-basic-single').select2();
    listarDepartamentos();
    //listarDepartamentos_Editar();

});
$("#departamentos").change(function(){
        var iddepartamento = $("#departamentos").val();
        listarCiudades(iddepartamento);
    })


$("#departamentos_editar").change(function(){
        var iddepartamento = $("#departamentos_editar").val();
        listarCiudades_Editar(iddepartamento);
    })


  </script>
  
    </body>
</html>
