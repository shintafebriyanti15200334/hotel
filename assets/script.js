$(document).ready(function () {
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
			$("#total_price").text(`<?= rupiah(${total_price}) ?> /malam`);
		} else {
			$("#total_price").text("N/A");
		}
	}
});
