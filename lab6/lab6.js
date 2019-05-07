window.addEventListener('load', function (event) {
   let thumbnailPic = document.getElementById('thumbnails');
   let bigPic = document.querySelector('body main figure img');
   let mainFigure = document.getElementById("featured");
   let title = document.querySelector("main figure figcaption");

   for (let i = 0; i < thumbnailPic.childNodes.length; i++){
       if(thumbnailPic.childNodes[i].tagName !== 'IMG') continue;
       thumbnailPic.childNodes[i].addEventListener('click', function (event) {
           let picSrc = thumbnailPic.childNodes[i].src;
           bigPic.src = picSrc.replace('small', 'medium');
           title.innerHTML =  thumbnailPic.childNodes[i].title;
           //bigPic.nextSibling.textContent = thumbnailPic.childNodes[i].title;
           //bigPic.title = "hello";
           //bigPic.setAttribute("title", thumbnailPic.childNodes[i].title.innerHTML);
       })
   }

   title.style.setProperty("transition", "opacity 1s");
   mainFigure.addEventListener("mouseenter", function(){
      title.style.opacity = 0.8;
   });
   mainFigure.addEventListener("mouseleave", function (event) {
       title.style.opacity = 0.0;
   })
});