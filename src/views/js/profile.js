window.onload = function(){
    document.getElementById("jsModifyButton").onclick = displayModifyForm
}

function displayModifyForm(){
    let x = document.getElementById("jsEditableData");

    if(x.style.visibility == "hidden"){
        x.style.visibility = "visible";
    }
    else{
        x.style.visibility = "hidden";
    }

}