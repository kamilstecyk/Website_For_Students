// let boxIndex = 0;
// showBox(3);

// function plusBox(n) {
//     showBox(boxIndex += n);
// }

// function showBox(n) {
//     let i;
//     let books = document.getElementsByClassName("bookBar");


//     // something is no yes
//     let PLcheckBox = document.getElementById('plDep').checked;
//     let ENcheckBox = document.getElementById('enDep').checked;
//     if (PLcheckBox === true && ENcheckBox === false) {
//         books = document.getElementsByClassName("pl");
//         // console.log(books);
//     }
//     else if (ENcheckBox === true && PLcheckBox === false) {
//         books = document.getElementsByClassName("en");
//         // console.log(books);

//         // wrzucic fory tutaj to wtedy bedzie pokazywalo tylko to co chce (chyba)
//     }
//     else {
//         books = document.getElementsByClassName("bookBar");
//         // console.log(books);

//     }


//     if(n > (books.length / 3) + 3) {
//         boxIndex = 0;
//     }

//     if(n < 0) {
//         boxIndex =  books.length - 3;
//     }

//     for(i = 0; i < books.length; i++) {
//         books[i].style.display = "none";
//     }

//     for(i = boxIndex; i < boxIndex+3; i++) {
//         books[i].style.display = "flex";
//     }

// }

let boxIndex = 0;
showBox(3);

// const departmentVar = document.querySelector('label');

function plusBox(n) {
    showBox(boxIndex += n);
}

function departmentShow(n) {
    showBox(n);
    showBox(n);
}

function showBox(n) {
    let i;
    let books = document.getElementsByClassName("bookBar");

    for(i = 0; i < books.length; i++) {
        books[i].style.display = "none";
    }

    // something is no yes
    let PLcheckBox = document.getElementById('plDep').checked;
    let ENcheckBox = document.getElementById('enDep').checked;


    if (PLcheckBox === true && ENcheckBox === false) {
        books = document.getElementsByClassName("pl");
        // console.log(books);
        
        if(n > (books.length / 3) + 3) {
            boxIndex = 0;
        }

        if(n < 0) {
            boxIndex =  books.length - 3;
        }
    
        for(i = boxIndex; i < boxIndex+3; i++) {
            books[i].style.display = "flex";
        }
    }



    else if (ENcheckBox === true && PLcheckBox === false) {
        books = document.getElementsByClassName("en");
        // console.log(books);

        if(n > ( (books.length - (books.length % 4) ) / 3) ) {
            boxIndex = 0;
        }
    
        if(n < 0) {
            boxIndex = books.length - (books.length % 4);
        }
    
        for(i = boxIndex; i < (books.length); i++) {
            books[i].style.display = "flex";
        }
    }



    else {
        books = document.getElementsByClassName("bookBar");
        // console.log(books);

        
        if(n > (books.length / 3) + 3) {
            boxIndex = 0;
        }

        if(n < 0) {
            boxIndex =  books.length - 3;
        }

        for(i = boxIndex; i < boxIndex+3; i++) {
            books[i].style.display = "flex";
        }

    }



}

// departmentVar.onclick = showBox(3);