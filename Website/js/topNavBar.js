function expand() {
    document.getElementById("topNavBarContent").style.display = "flex";

    document.getElementById("expandTopNavBar").onclick = collapse;
}

function collapse() {
    document.getElementById("topNavBarContent").style.display = "none";

    document.getElementById("expandTopNavBar").onclick = expand;
}