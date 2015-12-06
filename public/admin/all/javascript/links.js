var update_menus = function(){
	var el = $(".internal, .external").hide();

	if($(".int_link").is(":checked")){
		$('.internal').removeAttr('disabled');
		$(".external").hide().attr("disabled", "disabled");
		$('.internal').show();
	}
	else{
		$('.external').removeAttr("disabled");
		$(".internal").hide().attr("disabled", "disabled");
		$(".external").show();
	}

	$(".int_link").click(function () {
		var int_lin = $(this);
		var ext_lin = int_lin.parent().siblings().find('input.external');
		var internal_select = int_lin.parent().siblings().find('select.internal');

		internal_select.removeAttr('disabled');
		ext_lin.hide().attr("disabled", "disabled");
		internal_select.show();
	});

	$(".ext_link").click(function () {
		var ext_lin = $(this);
		var int_lin = ext_lin.parent().siblings().find('select.internal');
		var external_url = ext_lin.parent().siblings().find('input.external');

		external_url.removeAttr("disabled");
		int_lin.hide().attr("disabled", "disabled");
		external_url.show();
	});

}

$(document).ready(function() {
	update_menus();
});