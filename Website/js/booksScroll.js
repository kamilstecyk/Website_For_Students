let boxIndex = 0;
showBox(3);

function plusBox(n) {
    showBox(boxIndex += n);
}

function showBox(n) {

    function sliceArrayIntoGroups(arr, size) {
        if (arr.length === 0) { return arr; }
        return [ arr.slice(0, size), ...sliceArrayIntoGroups(arr.slice(size), size) ];
      }


    let checkBoxes = document.querySelectorAll('input[name="department"]:checked');
    let values = [];
    checkBoxes.forEach((checkbox) => {
        values.push(checkbox.value);
    });
    // console.log(values);

    let i;
    let books = document.getElementsByClassName("bookBar");
    
    let slicedBooks = sliceArrayIntoGroups(Array.from(books), 3);
    // console.log(slicedBooks);

    for(i = 0; i < books.length; i++) {
        books[i].style.display = "none";
    }

    if (values.length == 1) {
        books = document.getElementsByClassName(values[0]);
        slicedBooks = sliceArrayIntoGroups(Array.from(books), 3);
        console.log(books);
        console.log(slicedBooks);
        
        if(n > slicedBooks.length - 1) {
            boxIndex =  0;
        }

        if(n < 0) {
            boxIndex = slicedBooks.length - 1;
        }
    
        for(i = 0; i < 3; i++) {
            slicedBooks[boxIndex][i].style.display = "flex";
        }
    }

    else {
        // books = document.getElementsByClassName("bookBar");
        // console.log(books);
        
        if(n > slicedBooks.length - 1) {
            boxIndex =  0;
        }

        if(n < 0) {
            boxIndex = slicedBooks.length - 1;
        }

        for(i = 0; i < 3; i++) {
            slicedBooks[boxIndex][i].style.display = "flex";
        }
    }
}
