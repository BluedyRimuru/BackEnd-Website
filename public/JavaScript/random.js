var arrayImg = new Array();
arrayImg[0] = "erreur-1.png";
arrayImg[1] = "erreur-2.png";
arrayImg[2] = "erreur-3.gif";

function getRandomImage(imgAr, path) {
    path = path || './images/random-erreur/';
    var num = Math.floor( Math.random() * imgAr.length );
    var img = imgAr[ num ];
    var imgStr = '<img src="' + path + img + '" alt = "Random-Erreur" width="300">';
    document.write(imgStr); document.close();
}