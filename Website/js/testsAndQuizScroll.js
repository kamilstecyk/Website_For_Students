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

let scrollableElement;

if(document.getElementById('mainLayoutTests') != null) {
    scrollableElement = document.getElementById('mainLayoutTests');
}
else {
    scrollableElement = document.getElementById('mainLayoutQuizes');
}

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
    let number;
    let container;

    if(document.getElementsByClassName("testBar").length != 0) {
        container = document.getElementsByClassName("testBar");
        number = 4;
    }

    else {
        container = document.getElementsByClassName("quizBar");
        number = 5;

    }
    
    let slicedContainer = sliceArrayIntoGroups(Array.from(container), number);
    // console.log(slicedContainer);

    for(i = 0; i < container.length; i++) {
        container[i].style.display = "none";
    }

    
    if(n > slicedContainer.length - 1) {
        boxIndex =  0;
    }

    if(n < 0) {
        boxIndex = slicedContainer.length - 1;
    }

    for(i = 0; i < number; i++) {
        slicedContainer[boxIndex][i].style.display = "flex";
    }
    
}
