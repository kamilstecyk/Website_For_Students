// function expand() {
//     document.getElementById("topNavBarContent").style.display = "flex";

//     document.getElementById("expandTopNavBar").onclick = collapse;
// }

// function collapse() {
//     document.getElementById("topNavBarContent").style.display = "none";

//     document.getElementById("expandTopNavBar").onclick = expand;
// }

function expand() {
    document.getElementById("topNavBarContent").style.visibility = "visible";
    document.getElementById("topNavBarContent").style.opacity = "1";

    document.getElementById("expandTopNavBar").onclick = collapse;
}

function collapse() {
    document.getElementById("topNavBarContent").style.visibility = "hidden";
    document.getElementById("topNavBarContent").style.opacity = "0";

    document.getElementById("expandTopNavBar").onclick = expand;
}