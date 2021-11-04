var progressing = 1;
function continue_btn(){

	var _this = $('.step-component.active');

	var valid = true;



	progressing++;
    $('.progress-bar-label').text('Step ' + progressing + ' of 7')

	$('.progress-bar-filled').css('transform', 'scaleX(' + 0.166666 * (progressing - 1) + ')');

	$('.step-component.active').fadeOut(500);

	setTimeout(function(){

		$('.step-component.active').next().fadeIn(500);

	}, 500)

	setTimeout(function(){

		$('.step-component.active').next().addClass('active');

		_this.removeClass('active');

	}, 1000)

    $($('.progress-step-number')[progressing - 1]).addClass('show');

}


function back_btn(){
    var _this = $('.step-component.active');

	var valid = true;



	progressing--;
    $('.progress-bar-label').text('Step ' + progressing + ' of 7')

	$('.progress-bar-filled').css('transform', 'scaleX(' + 0.166666 * (progressing - 1) + ')');

	$('.step-component.active').fadeOut(500);

	setTimeout(function(){

		$('.step-component.active').prev().fadeIn(500);

	}, 500)

	setTimeout(function(){

		$('.step-component.active').prev().addClass('active');

		_this.removeClass('active');

	}, 1000)

    $($('.progress-step-number')[progressing]).removeClass('show');
}