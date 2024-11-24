$(document).ready(function() {
    //open modal

    $('#open_modal').click(function() {
        $('#modal_to_open').css(
		{
			'display':'inline-flex'
		});
    });

    //close modal

    $('#close_modal').click(function() {
        $('#modal_to_open').css(
            {
                'display': 'none'
            }
        );
	});
	

    //send mail with ajax

    $('#send_email').click(function(e){
		e.preventDefault();
		var data = {
			email: $('#email').val(),
			name: $('#name').val(),
			objet: $('#firstname').val(),
			subject: $('#subject').val(),
			message: $('#message').val()
        };
        //AJAX
		$.ajax({
			url: "../controller/send.php",
			type: 'POST',
			data: data,
			success: function(data) {
				$('#js_alert_success').css({'display' : 'block'});
				setTimeout(function(){
					$('#js_alert_success').css({'display' : 'none'});
					$('#email').val("");
					$('#name').val("");
					$('#firstname').val("");
					$('#subject').val("");
					$('#message').val("");
				}, 3000);
			},
			error: function(data) {
				$('#js_alert_danger').css({'display' : 'block'});
				setTimeout(function(){
					$('#js_alert_danger').css({'display' : 'none'});
					$('#email').val("");
					$('#name').val("");
					$('#firstname').val("");
					$('#subject').val("");
					$('#message').val("")
				}, 3000);
			}
		});
	});
	$('.header__navbar-toggle').click(function(e){
		e.preventDefault();
		$('.header').toggleClass('is-open');
	}); 
	$('#close_modal').click(function(e){
		e.preventDefault();
		$('.header').toggleClass('is-close');
	});
});