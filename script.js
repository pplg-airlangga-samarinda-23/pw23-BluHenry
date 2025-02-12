function ShowPage(NumberNav){
    document.getElementById("home").classList.remove("active");
    document.getElementById("About").classList.remove("active");
    document.getElementById("Contact").classList.remove("active");

if (NumberNav === 1) {
    document.getElementById("home").classList.add("active");
} else if (NumberNav === 2) {
    document.getElementById("About").classList.add("active");
} else if (NumberNav === 3) {
    document.getElementById("Contact").classList.add("active");
}
}

function ahaw(show , hide) {
    
}