<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('js/sb-admin.min.js') ?>"></script>
<script src="<?php echo base_url(); ?>assets/owl-carousel/owl.carousel.js"></script>

<script src="<?php echo base_url(); ?>assets/date_picker_bootstrap/bootstrap.min.js" type="text/javascript"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/script.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#owl-example").owlCarousel();
    $(".listing-detail span").tooltip("hide");
    $(".carousel").carousel({
      interval: 3000,
    });
    $(".carousel").carousel("cycle");

    $("#dp1, #jumlahMalam").on("change", updateCheckout);

    $("#price_input, #jumlahMalam").on("change", updateTotalPrice);

    function updateCheckout() {
      var bookingDate = $("#dp1").val();
      var numOfNights = $("#jumlahMalam").val();
      if (bookingDate != "" && numOfNights != "") {
        var new_date = moment(bookingDate, "YYYY-MM-DD")
          .add(numOfNights, "days")
          .format("YYYY-MM-DD");
        $("#dp2").val(new_date);
      } else {
        $("#dp2").val("");
      }
    }

    function updateTotalPrice() {
      var price = $("#price_input").val();
      var numOfNights = $("#jumlahMalam").val();

      if (price != "" && numOfNights != "") {
        var total_price = +price * +numOfNights;
        $("#total_price").text(`Rp ${total_price.toLocaleString('id-ID', {minimumFractionDigits: 2, maximumFractionDigits: 2})}`);
      } else {
        $("#total_price").text("N/A");
      }
    }

    // var date = new Date();
    // date.setDate(date.getDate());
    // $('.form_date').datetimepicker({

    //   language: 'id',

    //   weekStart: 1,

    //   todayBtn: 1,



    //   autoclose: 1,

    //   todayHighlight: 1,

    //   startView: 2,

    //   minView: 2,

    //   startDate: date,

    // forceParse: 0

  });
</script>