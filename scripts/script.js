function randHexColor() {
	return '#'+ ('000000' + (Math.random()*0xFFFFFF<<0).toString(16)).slice(-6);
}

$('h1').fitText(1.0);

$('[data-toggle="tooltip"]').tooltip({'placement': 'top'});

$('.vote-plus').click(function(){
	$('#vote').val('1');
	$('.vote-minus').addClass('vote-unselected');
	$(this).removeClass('vote-unselected');
});

$('.vote-minus').click(function(){
	$('#vote').val('-1');
	$('.vote-plus').addClass('vote-unselected');
	$(this).removeClass('vote-unselected');
});
