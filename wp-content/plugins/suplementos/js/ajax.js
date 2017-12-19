(function($){

	$(document).on('change','.categorias',function(e){
	 	e.preventDefault();
	 	link = $(this);
	 	index = link.attr('name').replace(/^.*categorias_/,'');
    id = link.val();
		post = link.attr('data-post');

		$.ajax({
			url : ajax_vars.ajaxurl,
			type: 'post',
			data: {
				action : 'ajax_valakax',
				id_post: id,
        index_post: index,
				post: post
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

function initAjax(){
	var list = $(document).find(".inside table .categorias");
		for(var i = 0; i< list.length; i++){
			var link = list[i];
			//console.log(link);
			//console.log(link.options[link.selectedIndex].value);
			 index = link.getAttribute("name").replace(/^.*categorias_/,'');
			 id = link.options[link.selectedIndex].value;
			 post = link.getAttribute("data-post");
			 cargarNoticias(index,id,post);
		}
}

function cargarNoticias(index,id,post){

	$.ajax({
		url : ajax_vars.ajaxurl,
		type: 'post',
		data: {
			action : 'ajax_valakax',
			id_post: id,
			index_post: index,
			post:post
		},
		beforeSend: function(){
			$('#noticias_'+index).html('<div class="loader"></div>');
		},
		success: function(resultado){
			 $('#noticias_'+index).html(resultado);
		}

	});

}

(function($){
$(window).load(function() {
	initAjax();
	return true;
});
})(jQuery);
