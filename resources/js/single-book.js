/*
    Single Book Modal Image
*/
window.onload = function() {
    var imgPopup = document.getElementById('imgPop');
    var existImage = document.getElementById('currentImg');
    var modalImg = document.getElementById('bookImage');
    var isbn = document.getElementById("ISBN");
    var imgISBN = isbn.textContent;
                                
    existImage.addEventListener("click", function() {
        imgPopup.style.display = "block";
        modalImg.src = "book-images/large/" + imgISBN + ".jpg";
    });
                                    
    var span = document.getElementById('imgPop');
    span.addEventListener("click", function() {
        imgPopup.style.display = "none";
    });
};


                           