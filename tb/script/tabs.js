/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	$(".menu > li").click(function(e){
		switch(e.target.id){
			case "flights":
				//change status & style menu
				$("#flights").addClass("active");
				$("#hotels").removeClass("active");
				$("#LEDGER").removeClass("active");
				$("#cars").removeClass("active");
				$("#CUSTOMER").removeClass("active");
				$("#sightseeing").removeClass("active");
				$("#packages").removeClass("active");
				//display selected division, hide others
				$("div.flights").fadeIn();
				$("div.hotels").css("display", "none");
				$("div.cars").css("display", "none");
				$("div.CUSTOMER").css("display", "none");
				$("div.sightseeing").css("display", "none");
				$("div.packages").css("display", "none");
				$("div.LEDGER").css("display", "none");
			break;
			case "hotels":
				//change status & style menu
				$("#flights").removeClass("active");
				$("#LEDGER").removeClass("active");
				$("#hotels").addClass("active");
				$("#CUSTOMER").removeClass("active");
				$("#cars").removeClass("active");
				$("#sightseeing").removeClass("active");
				$("#packages").removeClass("active");
				//display selected division, hide others
				$("div.hotels").fadeIn();
				$("div.flights").css("display", "none");
				$("div.cars").css("display", "none");
				$("div.CUSTOMER").css("display", "none");
				$("div.sightseeing").css("display", "none");
				$("div.packages").css("display", "none");
				$("div.LEDGER").css("display", "none");
			break;
			case "cars":
				//change status & style menu
				$("#flights").removeClass("active");
				$("#hotels").removeClass("active");
				$("#LEDGER").removeClass("active");
				$("#CUSTOMER").removeClass("active");
				$("#cars").addClass("active");
				$("#sightseeing").removeClass("active");
				$("#packages").removeClass("active");
				//display selected division, hide others
				$("div.cars").fadeIn();
				$("div.flights").css("display", "none");
				$("div.hotels").css("display", "none");
				$("div.CUSTOMER").css("display", "none");
				$("div.sightseeing").css("display", "none");
				$("div.packages").css("display", "none");
				$("div.LEDGER").css("display", "none");
			break;
			case "sightseeing":
				//change status & style menu
				$("#flights").removeClass("active");
				$("#hotels").removeClass("active");
				$("#cars").removeClass("active");
				$("#LEDGER").removeClass("active");
				$("#CUSTOMER").removeClass("active");
				$("#sightseeing").addClass("active");
				$("#packages").removeClass("active");
				//display selected division, hide others
				$("div.sightseeing").fadeIn();
				$("div.flights").css("display", "none");
				$("div.hotels").css("display", "none");
				$("div.cars").css("display", "none");
				$("div.CUSTOMER").css("display", "none");
				$("div.packages").css("display", "none");
				$("div.LEDGER").css("display", "none");
			break;
				case "packages":
				//change status & style menu
				$("#flights").removeClass("active");
				$("#hotels").removeClass("active");
				$("#LEDGER").removeClass("active");
				$("#cars").removeClass("active");
				$("#CUSTOMER").removeClass("active");
				$("#sightseeing").removeClass("active");
				$("#packages").addClass("active");
				//display selected division, hide others
				$("div.packages").fadeIn();
				$("div.flights").css("display", "none");
				$("div.hotels").css("display", "none");
				$("div.cars").css("display", "none");
					$("div.CUSTOMER").css("display", "none");
				$("div.sightseeing").css("display", "none");
				$("div.LEDGER").css("display", "none");
			break;
				case "CUSTOMER":
				//change status & style menu
				$("#flights").removeClass("active");
				$("#hotels").removeClass("active");
					$("#LEDGER").removeClass("active");
				$("#cars").removeClass("active");
				$("#sightseeing").removeClass("active");
				$("#packages").removeClass("active");
				$("#CUSTOMER").addClass("active");
				//display selected division, hide others
				$("div.CUSTOMER").fadeIn();
				$("div.flights").css("display", "none");
				$("div.hotels").css("display", "none");
				$("div.cars").css("display", "none");
				$("div.sightseeing").css("display", "none");
				$("div.packages").css("display", "none");
					$("div.LEDGER").css("display", "none");
			break;
				case "LEDGER":
				//change status & style menu
				$("#flights").removeClass("active");
				$("#hotels").removeClass("active");
				$("#cars").removeClass("active");
				$("#sightseeing").removeClass("active");
				$("#packages").removeClass("active");
				$("#LEDGER").addClass("active");
				$("#CUSTOMER").removeClass("active");
				//display selected division, hide others
				$("div.LEDGER").fadeIn();
					$("div.CUSTOMER").css("display", "none");
				$("div.flights").css("display", "none");
				$("div.hotels").css("display", "none");
				$("div.cars").css("display", "none");
				$("div.sightseeing").css("display", "none");
				$("div.packages").css("display", "none");
			break;
			
		}
		//alert(e.target.id);
		return false;
	});
});