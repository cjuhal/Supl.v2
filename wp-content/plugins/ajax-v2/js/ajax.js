(function($){

	$(document).on('change','.categorias',function(e){
	 	e.preventDefault();
	 	link = $(this);
	 	index = link.attr('name').replace(/^.*categorias_/,'');
    id = link.val();

		$.ajax({
			url : ajax_vars.ajaxurl,
			type: 'post',
			data: {
				action : 'ajax_valakax',
				id_post: id,
        index_post: index
			},
			beforeSend: function(){
				$('#noticias_'+index).html('<div class="loader"></div>');
			},
			success: function(resultado){
				 $('#noticias_'+index).html(resultado);
			}

		});

	});

})(jQuery);
