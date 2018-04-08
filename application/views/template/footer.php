<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/glyphs.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-table.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nicescroll.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nicescroll.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/moment.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.min.js');?>"></script>
<script src=""<?php echo base_url('assets/js/dataTables.bootstrap.min.js');?>"></script>
<!--<script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768)
            $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767)
            $('#sidebar-collapse').collapse('hide')
    })
</script>	-->

<script>
    $(document).ready(function () {
        var nice = $("body").niceScroll();
        $("body").niceScroll({
            cursorcolor: "darkgrey",
            cursorwidth: "8px"
        });
        //$("#div1").html($("#div1").html() + ' ');
    });
</script>

<script>
    $(document).ready(function () {
        var interval = setInterval(function () {
            var momentNow = moment();
            $('#time-part').html(momentNow.format('hh:mm:ss A'));
        }, 100);

        $('#stop-interval').on('click', function () {
            clearInterval(interval);
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#example1').DataTable();
    });
</script>

</body>

</html>