let imgIndex = 0;
carosello();

function carosello() 
{
  let i;
  let img = document.getElementsByClassName("carosello");
  let puntini = document.getElementsByClassName("puntini");
  for (i = 0; i < img.length; i++) 
  {
    img[i].style.display = "none";
  }
  imgIndex++;
  if (imgIndex > img.length) {imgIndex = 1;}
  for(i = 0; i < puntini.length; i++)
  {
      puntini[i].className = puntini[i].className.replace(" active", "");
  }
  for(i = 0; i < img.length; i++)
  {
      if(i === imgIndex-1)
      {
            img[imgIndex-1].style.display = "block";
            puntini[imgIndex-1].className += " active";
      }
  }
  setTimeout(carosello, 2000);  //Cambia l'immagine del carosello ogni 2 secondi
}

