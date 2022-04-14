
$(function() {

  // basic use comes with defaults values
  $(".my-rating").starRating({
    initialRating: 4.0,
    starSize: 35,
    strokeWidth: 0,
  });

  $(".my-rating-2").starRating({
    totalStars: 5,
    starSize: 35,
    starShape: 'rounded',
    emptyColor: 'lightgray',
    hoverColor: '#f1c40f',
    activeColor: '#f1c40f',
    strokeWidth: 0,
    useGradient: false
  });

  // example grabing rating from markup, and custom colors
  $(".my-rating-4").starRating({
    totalStars: 5,
    starShape: 'rounded',
    starSize: 35,
    emptyColor: 'lightgray',
    hoverColor: '#f1c40f',
    activeColor: '#f1c40f',
    useGradient: false
  });

  // specify the gradient start and end for the selected stars
  $(".my-rating-5").starRating({
    starSize: 35,
    strokeWidth: 0,
    strokeColor: 'black',
    initialRating: 2,
    starGradient: {
      start: '#f1c40f',
      end: '#f8f42e'
    },
  });

  $(".my-rating-6").starRating({
    starSize: 35,
    totalStars: 5,
    emptyColor: 'lightgray',
    hoverColor: '#f1c40f',
    activeColor: '#f1c40f',
    initialRating: 4,
    strokeWidth: 0,
    useGradient: false,
    minRating: 2,
    callback: function(currentRating, $el){
      alert('rated ' +  currentRating);
      console.log('DOM Element ', $el);
    }
  });

  $(".my-rating-7").starRating({
    starSize: 35,
    initialRating: 4,
    strokeWidth: 0,
    readOnly: true,
    starShape: 'rounded'
  });

  $(".my-rating-8").starRating({
    starSize: 35,
    useFullStars: true,
    strokeWidth: 0,
  });

  $(".my-rating-9").starRating({
    initialRating: 3.5,
    strokeWidth: 0,
    disableAfterRate: false,
    onHover: function(currentIndex, currentRating, $el){
      console.log('index: ', currentIndex, 'currentRating: ', currentRating, ' DOM element ', $el);
      $('.live-rating').text(currentIndex);
    },
    onLeave: function(currentIndex, currentRating, $el){
      console.log('index: ', currentIndex, 'currentRating: ', currentRating, ' DOM element ', $el);
      $('.live-rating').text(currentRating);
    }
  });

  $(".my-rating-10").starRating({
    initialRating: 2,
    starSize: 35,
    strokeWidth: 0,
    strokeColor: 'black',
    ratedColors: ['#92db31', '#31cbdb', '#316ddb', '#b931db', '#db3131']
  });

});