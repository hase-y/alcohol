/*global $*/
$(document).ready(function(){
  $('.list-liquor, .list-izakaya, .list-knob').slick({
    autoplay: true, 
    infinite: true, 
    dots: true, 
    slidesToShow: 6, 
    slidesToScroll: 6,
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      }
    }]
  });
});