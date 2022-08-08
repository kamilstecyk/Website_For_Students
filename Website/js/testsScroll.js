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

let scrollableElement = document.getElementById('mainLayoutTests');
scrollableElement.addEventListener('wheel', findScrollDirectionOtherBrowsers);

function findScrollDirectionOtherBrowsers(event){
    let delta;
    if (event.wheelDelta){
        delta = event.wheelDelta;
    }else{
        delta = -1 *event.deltaY;
    }

    if (delta < 0){
        plusBox(-1);
    }else if (delta > 0){
        plusBox(1);
    }
}

// end of scroll function


function showBox(n) {
    let i;
    let tests = document.getElementsByClassName("testBar");
    
    let slicedTests = sliceArrayIntoGroups(Array.from(tests), 4);
    // console.log(slicedTests);

    for(i = 0; i < tests.length; i++) {
        tests[i].style.display = "none";
    }

    
    if(n > slicedTests.length - 1) {
        boxIndex =  0;
    }

    if(n < 0) {
        boxIndex = slicedTests.length - 1;
    }

    for(i = 0; i < 4; i++) {
        slicedTests[boxIndex][i].style.display = "flex";
    }
    
}
