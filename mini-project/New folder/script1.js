document.body.addEventListener("keydown", (event) => {
    if(event.key=="ArrowLeft") 
    {
      let x = document.getElementById("test"); //("box");
      x.style.border = "";
      plusSlides(-1);
    }
  
    if(event.key=="ArrowRight") 
    {
      let x = document.getElementById("test"); //("box");
      x.style.border= "";
      plusSlides(1);
    }
  });
  
 
  
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }
  
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
  let slideIndex = 1;
  showSlides(slideIndex);

  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    
    slides[slideIndex-1].style.display = "block";  
  }

  function myf(roll){
      $(document).ready(function(){
        $.ajax({
          url: "ajax-insert.php",
          type: "POST",
          data: {std_id:roll},
          success: function(data){
            if(data == 1 ){
              let x = document.getElementById("test");
              x.style.border = "14px solid green";
            }else if(data == 0){
              let x = document.getElementById("test");
              x.style.border = "14px solid red";
            }
          }
     });
      });
  };