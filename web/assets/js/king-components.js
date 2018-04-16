 $(document).ready(function(){

	if( $('body').hasClass('comp-wizard') ) {

		//*******************************************
		/*	FORM WIZARD
		/********************************************/

		$('#demo-wizard').on('change', function(e, data) {
			console.log(data)
			// validation
            $('#form-new').parsley();
			if( $('#form-new').length > 0 ) {
				var parsleyForm = $('#form-new').parsley();
				parsleyForm.validate();

				if( !parsleyForm.isValid() )
					return false;
			}

			// last step button
			$btnNext = $(this).parents('.wizard-wrapper').find('.btn-next');
			console.log($btnNext)
			if(data.step === 3 && data.direction == 'next') {
				$btnNext.text(' Create My Account')
				.prepend('<i class="fa fa-check-circle"></i>')
				.removeClass('btn-primary').addClass('btn-success');
			}else{
				console.log('okoko')
				$btnNext.text('Next ').
				append('<i class="fa fa-arrow-right"></i>')
				.removeClass('btn-success').addClass('btn-primary');
			}

		}).on('finished', function(){
			alert('Your account has been created.');
		});

		$('.wizard-wrapper .btn-next').click( function(){
			$('#demo-wizard').wizard('next');
		});

		$('.wizard-wrapper .btn-prev').click( function(){
			$('#demo-wizard').wizard('previous');
		});
	}

 }); // end ready function


