$(window).load(function(){
     $('.preloader').fadeOut('slow');
});


/* =Main INIT Function
-------------------------------------------------------------- */
function initializeSite() {

	"use strict";

	//OUTLINE DIMENSION AND CENTER
	(function() {
	    function centerInit(){

			var sphereContent = $('.sphere'),
				sphereHeight = sphereContent.height(),
				parentHeight = $(window).height(),
				topMargin = (parentHeight - sphereHeight) / 2;

			sphereContent.css({
				"margin-top" : topMargin+"px"
			});

			var heroContent = $('.hero'),
				heroHeight = heroContent.height(),
				heroTopMargin = (parentHeight - heroHeight) / 2;

			heroContent.css({
				"margin-top" : heroTopMargin+"px"
			});

	    }

	    $(document).ready(centerInit);
		$(window).resize(centerInit);
	})();

	// Init effect 
	$('#scene').parallax();

};
/* END ------------------------------------------------------- */

/* =Document Ready Trigger
-------------------------------------------------------------- */
$(window).load(function(){

	initializeSite();
	(function() {
		setTimeout(function(){window.scrollTo(0,0);},0);
	})();

});
/* END ------------------------------------------------------- */


$('#countdown').countdown({
	//date: "April 30, 2019 20:00:00",
	date: "October 20, 2018 15:00:00",
	render: function(data) {
	  var el = $(this.el);
	  el.empty();

	  denStr="<span>dní</span></div>";
	  den=this.leadingZeros(data.days, 2);
	  if (den === "00") {
	      denStr="<span>dnů</span></div>";
	  }else if(den === "01") {
	      denStr="<span>dnů</span></div>";
	  }else if  (den === "02"||den === "03"||den === "04") {
	      denStr="<span>dny</span></div>";
	  }else{
	      denStr="<span>dní</span></div>";
	  }

	  hodStr="<span>hodin</span></div>";
	  hod=this.leadingZeros(data.hours, 2);
	  if (hod === "00") {
	      hodStr="<span>hodin</span></div>";
	  }else if(hod === "01") {
          hodStr="<span>hodina</span></div>";
	  }else if  (hod === "02"||hod === "03"||hod === "04") {
          hodStr="<span>hodiny</span></div>";
	  }else{
          hodStr="<span>hodin</span></div>";
	  }

	  minStr="<span>minut</span></div>";
	  min=this.leadingZeros(data.min, 2);
	  if (min === "00") {
          minStr="<span>minut</span></div>";
	  }else if(min === "01") {
          minStr="<span>minuta</span></div>";
	  }else if  (min === "02"||min === "03"||min === "04") {
          minStr="<span>minuty</span></div>";
	  }else{
          minStr="<span>minut</span></div>";
	  }

	  secStr="<span>sekund</span></div>";
	  sec=this.leadingZeros(data.sec, 2);
	  if (sec === "00") {
          secStr="<span>sekund</span></div>";
	  }else if(sec === "01") {
          secStr="<span>sekunda</span></div>";
	  }else if  (sec === "02"||sec === "03"||sec === "04") {
          secStr="<span>sekundy</span></div>";
	  }else{
          secStr="<span>sekund</span></div>";
	  }

	  	denMezera = "&nbsp;".repeat((data.days.toString().length)/2)
	  	
	    el.append("<div>" + this.leadingZeros(data.days, 2) + denMezera + denStr);
        el.append("<div>" + this.leadingZeros(data.hours, 2) + hodStr);
        el.append("<div>" + this.leadingZeros(data.min, 2) + minStr);
        el.append("<div>" + this.leadingZeros(data.sec, 2) + secStr);
	}
});