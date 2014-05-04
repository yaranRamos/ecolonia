$(document).ready(function() {
  
  //slider
  function mySlider() {
    
    // image array
    var backImg = new Array();
    backImg[0] = "images/slider/149274_637046986348452_1725156144_n.jpg";
    backImg[1] = "images/slider/1655838_637048616348289_585699993_n.jpg";
    backImg[2] = "images/slider/10003497_637046833015134_1005921569_n.jpg";
    backImg[3] = "images/slider/1896733_637050426348108_210019424_n.jpg";
    
    //store image index & array length
    var i = 0;
    var x = (backImg.length) - 1;
    var int = 3500;
    
    //function to change background img
    function changeImg() {
      $('.slider').css('background-image', 'url(' + backImg[i] + ')');
    }
    
    //left button click scroll
    function slideLeft() {
      if(i <= 0) {
        i = 3;
      } else {
        i--;
      }
      changeImg(i);
    };
    
    //function to change img  
    function slideRight() {
      if(i >= x) {
        i = 0;
      } else {
        i++;
      }
      changeImg(i);
    };
  
    //left button click scroll
    $('.btnLeft').click(function() {
      slideLeft();
    });
    
    //right button click scroll
    $('.btnRight').click(function() {
      slideRight();
    });
  
    //change img every 3.5s
    window.setInterval(slideRight, int);
    
    //onload display index img
    changeImg(i);
  }
  
  //onload, run slider
  mySlider();
    
});