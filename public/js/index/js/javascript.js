window.onscroll = function() {myFunction()};
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;


function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
    if (window.pageYOffset>=1470) {
    	$('.carousel-indicators').css('display','none');
    }else{
    	$('.carousel-indicators').css('display','block');
    }
    
  } else {
    navbar.classList.remove("sticky");
    
  }
}

$(document).ready(function () {
	$('.product').slick({
		dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  prevArrow: '<button class="slide-arrow prev-arrow"></button>',
  nextArrow: '<button class="slide-arrow next-arrow"></button>',
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
	});
});