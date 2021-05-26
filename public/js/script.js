$(document).ready(function(){

	$('.post-wrapper').slick({
  centerMode: true,
  centerPadding: '360px',
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});

	//Tabbar

	$('.content .content-left .tabbar-control .line-control .trending').hover(function(){
		$('.content .content-left .tabbar-control .line-control .trending').toggleClass('.line-control-color');
	});
	//End Tabbar

		//click to scroll top
 	$('.move_up span').click(function(){
 		$('html,body').animate({
 			scrollTop:0
 		},1000);
 	})
 	var x = $('html,body');

 	// var move = document.querySelector(".move_up");

 	// move.click(function(){
 	// 	document.body.animate({
 	// 		scrollTop:0
 	// 	}, 1000);
 	// });


 	$("#key").on("keyup", function(){
 		var value = $(this).val().toLowerCase();
 		$("#myKey .theme").filter(function(){
 			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
 		});
 	});

});



//scroll navbar

function navbarScroll(){
  window.onscroll = function(){myFunction()};

  var navbar = document.getElementById("navbar");
  var sticky = navbar.offsetTop;

  function myFunction() {
    if (window.pageYOffset > sticky) {
      navbar.classList.add("sticky");
      navbar.style.backgroundColor = "#D5D1D1";
    } else {
      navbar.classList.remove("sticky");
      navbar.style.backgroundColor = "#ffffff";
    }
  }
  myFunction();
}
navbarScroll();

// var item_home = document.getElementsByClassName('home');
// var item_blog = document.getElementsByClassName('blog');
// var item_about = document.getElementsByClassName('about');
// var item_contact = document.getElementsByClassName('contact');
// for($i=0;$i<item_home.length;$i++){
//     item_home[i].
// }
