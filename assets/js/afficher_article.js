<script>
	$( '.afficher-article' ).click(function() {
		var id = $(this).attr('data-id'); // recup id
		console.log(id);
		$.get('afficher_article.php?id='+id, function(data){ // requ�te ajax get
			$('#container').html(data);
		});
	});
</script>