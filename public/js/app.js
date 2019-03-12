
function admSelectCheck(nameSelect)
{
    if(nameSelect){

	//Spouse check
	if(nameSelect.value == 'value5'){
	    document.getElementById("spouseDivCheck").style.display = "block";
        }
	else{
	    document.getElementById("spouseDivCheck").style.display = "none";
	}
    }
    else{
	    document.getElementById("admDivCheck").style.display = "none";
    }
}
