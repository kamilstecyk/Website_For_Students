let boxIndex = 0;
showBox(3);

function plusBox(n) {
    showBox(boxIndex += n);
}

function showBox(n) {
    let i;
    let books = document.getElementsByClassName("bookBar");


    // something is no yes
    let PLcheckBox = document.getElementById('plDep').checked;
    let ENcheckBox = document.getElementById('enDep').checked;
    if (PLcheckBox === true && ENcheckBox === false) {
        books = document.getElementsByClassName("pl");
    }
    else if (ENcheckBox === true && PLcheckBox === false) {
        books = document.getElementsByClassName("en");
    }
    else {
        books = document.getElementsByClassName("bookBar");
    }


    if(n > (books.length / 3) + 3) {
        boxIndex = 0;
    }

    if(n < 0) {
        boxIndex =  books.length - 3;
    }

    for(i = 0; i < books.length; i++) {
        books[i].style.display = "none";
    }

    for(i = boxIndex; i < boxIndex+3; i++) {
        books[i].style.display = "flex";
    }

}