function randHexColor() {
	return '#'+ ('000000' + (Math.random()*0xFFFFFF<<0).toString(16)).slice(-6);
}

$('h1').fitText(1.0);

$('[data-toggle="tooltip"]').tooltip({placement: 'top', container: 'body'});

$('#vote-plus').click(function(){
	$('#vote-minus').css('color', 'black');
	$(this).css('color', 'green');
});

$('#vote-minus').click(function(){
	$('#vote-plus').css('color', 'black');
	$(this).css('color', 'red');
});
