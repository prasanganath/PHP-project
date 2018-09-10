function show_div(divID){
    document.getElementById(divID).style.display="block";
    document.location.href = "#" + divID;
}
function hide_div(divID){
    document.getElementById(divID).style.display="none";
}