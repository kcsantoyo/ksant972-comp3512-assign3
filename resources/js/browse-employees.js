/*
    Browse Employees Section Scripts
*/
window.onload = function() {
    
    var title = document.getElementById("filter");
    var content = document.getElementById("filterContent");
    content.style.display = 'none';
    
    title.addEventListener("click", function() {
        if (content.style.display == 'none') {
            content.style.display = 'block';
            title.textContent = 'Hide Filters';
            addCardBorder();
        }
        else {
            content.style.display = 'none';
            title.textContent = 'Show Filters';
            removeCardBorder();
        }
    });
};

function addCardBorder() {
    document.getElementById("cardBorder").setAttribute("class" , "mdl-cell mdl-cell--2-col card-lesson mdl-card  mdl-shadow--2dp");
}

function removeCardBorder() {
    document.getElementById("cardBorder").setAttribute("class", "mdl-cell mdl-cell--2-col card-lesson mdl-card");
}

                           