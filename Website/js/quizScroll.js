let boxIndex = 0;
showBox(0);


function plusBox(n) {
    showBox(boxIndex += n);
}

function sliceArrayIntoGroups(arr, size) {
    if (arr.length === 0) { return arr; }
    return [ arr.slice(0, size), ...sliceArrayIntoGroups(arr.slice(size), size) ];
}


// scroll function

let scrollableElement = document.getElementById('mainLayoutQuizes');
scrollableElement.addEventListener('wheel', findScrollDirectionOtherBrowsers);

function findScrollDirectionOtherBrowsers(event){
    let delta;
    if (event.wheelDelta){
        delta = event.wheelDelta;
    }else{
        delta = -1 *event.deltaY;
    }

    if (delta < 0){
        plusBox(1);
    }else if (delta > 0){
        plusBox(-1);
    }
}

// end of scroll function


function showBox(n) {
    let i;
    let quizes = document.getElementsByClassName("quizBar");
    
    let slicedQuizes = sliceArrayIntoGroups(Array.from(quizes), 5);
    // console.log(slicedQuizes);

    for(i = 0; i < quizes.length; i++) {
        quizes[i].style.display = "none";
    }

    
    if(n > slicedQuizes.length - 1) {
        boxIndex =  0;
    }

    if(n < 0) {
        boxIndex = slicedQuizes.length - 1;
    }

    for(i = 0; i < 5; i++) {
        slicedQuizes[boxIndex][i].style.display = "flex";
    }
    
}
