let boxIndex = 0;
showBox(3);

function plusBox(n) {
    showBox(boxIndex += n);
}

function showBox(n) {
    let i;
    let books = document.getElementsByClassName("bookBar");

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