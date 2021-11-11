var slideIndex = 0;
showSlides();
// adjustParaallelogram();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("slides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}

function collapse() {
    if( $(".top-menu").css('display').toLowerCase() == 'block') {
        $(".top-menu").css('display','none');
    }else{
        $(".top-menu").css('display','block');
    }
}
function switchsub() {
    if($('.active-sub').css('display').toLowerCase() == 'block'){
        $(".active-sub").css('display','none');
    }else{
        $(".active-sub").css('display','block');
    }
}
function adjustParaallelogram(){
    var paras = document.getElementsByClassName("para-1");
    for (i = 0; i < paras.length; i++) {
        paras[i].style.top =""+ (-1 + -1*i);
    }
}