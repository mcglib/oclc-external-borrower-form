
function admSelectCheck(nameSelect)
{
    if(nameSelect){
	if(nameSelect.value == 'value5'){
	    document.getElementById("admDivCheck").style.display = "block";
        }
	else{
	    document.getElementById("admDivCheck").style.display = "none";
	}
    }
    else{
	    document.getElementById("admDivCheck").style.display = "none";
    }
}
