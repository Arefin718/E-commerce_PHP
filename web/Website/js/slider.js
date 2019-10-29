var imageNo=2;

function next() {
    imageNo=++imageNo;
    var slide=document.getElementsByClassName('sliderImage');

    var totalImage=slide.length-1;

    if (imageNo>totalImage){
        imageNo=1;
    }

    slide[totalImage].src=slide[imageNo-1].src;
}

setInterval(next,2000);