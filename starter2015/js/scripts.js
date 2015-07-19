jQuery(document).ready( function($) {

	// мы готовы
	console.log('jQuery is ready');
	
	// на главной только 6 продуктов
	if($('#products').hasClass('front-page')) {
		number = 6;
	}else{
		number = -1;
	}
	
	// функция получения продуктов
	function ajaxProducts() {
		mark = $('.filter form select[name=mark] option:selected').val();
		type = $('.filter form select[name=type] option:selected').val();
		newold = $('.filter form input[name=newold]:checked').val();
		ajaxquery = {get: number, mark: mark, type: type, newold: newold};
		// console.log( {ajaxquery: ajaxquery} ); // check
		$('.loading').css('display','block');
		$.post(
			ajaxurl, 
			{
				'action': 'products_list',
				'data': ajaxquery
			}, 
			function(response){
				$('.list-products').fadeOut(300, function() {
					$('.list-products').html(response);
					$('.list-products').fadeIn();
					$('.loading').css('display','none');
				});
			}
		);
		
		
	}
	
	// init 
	ajaxProducts(number);
	
	// получаем заново при изменении параметров
	$('.filter form select, .filter form input').change( function() {
		ajaxProducts(number); 
	});
	
	
	
	
	// вызов формы заказа
	$(document).on('click', 'button.order', 
		function() { 
			$('.over').addClass('active');
			$('.over .form input[name=prod]').prop( 'value', $(this).data('name') );
			$('.over .form input[name=id]').prop( 'value', $(this).data('id') );
			$('.over .form .wont').html( $(this).data('name') );
		}
	);
	// закрываем форму
	$('.over .form .close').click(
		function() { 
			$('.over').removeClass('active');
		}
	);
	
} );