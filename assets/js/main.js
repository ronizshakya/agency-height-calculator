(function ($) {
	// $('form[name="calculator-form"]').on("submit", function (e) {
	// 	e.preventDefault();
	// 	var form_data = jQuery(this).serialize();
	// 	var nonce = window.agency_cal.ajax_nonce;
	// 	var data =
	// 		"action=calculator_process_forms&" + form_data + "&security=" + nonce;
	// 	var current_url = window.location.href;
	// 	$(".spinner").addClass("is-active");

	// 	// console.log(form_data);
	// 	$.ajax({
	// 		url: window.agency_cal.ajax_url,
	// 		data: data,
	// 		cache: false,
	// 		type: "POST",
	// 		success: function (response) {
	// 			$(".spinner").removeClass("is-active");
	// 			$("form#calculator-form")[0].reset();
	// 			$("form#calculator-form").find("div.calc-results div.min-value");
	// 			console.log(response.data.commission_revenue_multiple_max_value);
	// 			alert(1);
	// 		},
	// 	});
	// 	// This return prevents the submit event to refresh the page.
	// 	return false;
	// });

	$("#calculator-form").validate({
		rules: {
			first_name: {
				required: true,
				minlength: 3,
			},
			last_name: {
				required: true,
				minlength: 3,
			},
			user_email: {
				required: true,
				email: true,
			},
			agency_name: {
				required: true,
			},
			telephone: {
				required: true,
			},
			state: {
				required: true,
			},
			commission_revenue_2021: {
				required: true,
			},
			commission_revenue_2020: {
				required: true,
			},
			commission_revenue_2019: {
				required: true,
			},
			take_home_profit_on_the_book: {
				required: true,
			},
			how_much_of_the_book_is_non_standard: {
				required: true,
			},
			personal_lines_mix: {
				required: true,
			},
			homeowners_mix: {
				required: true,
			},
			retention_ratio: {
				required: true,
			},
		},
		submitHandler: function (form) {
			var form_data = $(form).serialize();
			var nonce = window.agency_cal.ajax_nonce;
			var data =
				"action=calculator_process_forms&" + form_data + "&security=" + nonce;
			var current_url = window.location.href;
			$(".spinner").addClass("is-active");

			// console.log(form_data);
			$.ajax({
				url: window.agency_cal.ajax_url,
				data: data,
				cache: false,
				type: "POST",
				success: function (response) {
					$(".spinner").removeClass("is-active");
					$(form)[0].reset();
					$(form)
						.find("div.calc-results div.min-value")
						.html(
							"Your Commision Revenue Min Value: " +
								response.data.commission_revenue_multiple_min_value +
								"x"
						);
					$(form)
						.find("div.calc-results div.max-value")
						.html(
							"Your Commision Revenue Max Value: " +
								response.data.commission_revenue_multiple_max_value +
								"x"
						);
				},
			});
			// This return prevents the submit event to refresh the page.
			return false;
		},
	});
})(jQuery);
