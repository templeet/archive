function dump(theObj,br) {

	var tx="";

	var props = new Array();

	for (var i in theObj) { props.push(i); }

//	props.sort();

	for (var i=0; i<props.length; i++) {
// && props[i]!="dataFld" && props[i]!="dataFormatAs"
	  if (props[i]!="innerHTML" && 
	      props[i]!="outerHTML" && 
	      props[i]!="domConfig" && 
	      props[i]!="dataFld" && 
	      props[i]!="dataFormatAs" && 
	      props[i]!="dataSrc")
	    {
		tx+= i+": <b>"+props[i]+"</b>:";
		if (1)
		   tx+=theObj[props[i]]+")";
		if (br)
		  {
			  tx+="<br />\n";
		  }
		else
		  {
			  tx+="\n";
		  }
	    }  
	}

	return tx;
}

