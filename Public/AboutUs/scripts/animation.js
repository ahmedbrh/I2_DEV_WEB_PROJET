
$(document).ready(function(){
	$("a:nth-child(1)").css("background-color","white");

	$("#circle1").click(function(){
		$("#slider").animate({'left':'5%'},500);
		$("#data").fadeIn(700);
		$("#data2, #data3, #data4, #data5").fadeOut(500);
		$(".line").animate({'left':'60%'});
		$("a:nth-child(1)").css("background-color","white");
		$("a:nth-child(2),a:nth-child(3),a:nth-child(4),a:nth-child(5)").css("background-color","black");
	});

	$("#circle2").click(function(){
		$("#slider").animate({'left':'-35%'},500);
		$("#data2").fadeIn(700);
		$("#data, #data3, #data4, #data5").fadeOut(500);
		$(".line").animate({'left':'25%'});
		$("a:nth-child(2)").css("background-color","white");
		$("a:nth-child(1),a:nth-child(3),a:nth-child(4),a:nth-child(5)").css("background-color","black");
	});

	$("#circle3").click(function(){
		$("#slider").animate({'left':'-190%'},500);
		$("#data3").fadeIn(700);
		$("#data,#data2, #data4, #data5").fadeOut(500);
		$(".line").animate({'left':'55%'});
		$("a:nth-child(3)").css("background-color","white");
		$("a:nth-child(1),a:nth-child(2),a:nth-child(4),a:nth-child(5)").css("background-color","black");
	});

	$("#circle4").click(function(){
		$("#slider").animate({'left':'-240%'},500);
		$("#data4").fadeIn(700);
		$("#data,#data2, #data3, #data5").fadeOut(500);
		$(".line").animate({'left':'25%'});
		$("a:nth-child(4)").css("background-color","white");
		$("a:nth-child(1),a:nth-child(2),a:nth-child(3),a:nth-child(5)").css("background-color","black");
	});

	$("#circle5").click(function(){
		$("#slider").animate({'left':'-380%'},500);
		$("#data5").fadeIn(700);
		$("#data,#data2, #data3, #data4").fadeOut(500);
		$(".line").animate({'left':'55%'});
		$("a:nth-child(5)").css("background-color","white");
		$("a:nth-child(1),a:nth-child(2),a:nth-child(3),a:nth-child(4)").css("background-color","black");
	});

}); 