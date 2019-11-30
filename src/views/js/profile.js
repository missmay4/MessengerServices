/**
 * Show the form to upload the info of the profile
 */
window.onload = function(){
    document.getElementById("jsModifyButton").onclick = displayModifyForm;
}

/**
 * Show the form if the user push the button modify on the profile
 */
function displayModifyForm(){
    let x = document.getElementById("jsEditableData");

    if(x.style.visibility == "hidden"){
        x.style.visibility = "visible";
    }
    else{
        x.style.visibility = "hidden";
    }

}