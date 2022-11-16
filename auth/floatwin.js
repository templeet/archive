var th=0;

function showdiv(id)
{
  if (document.getElementById) 
    document.getElementById(''+id+'').style.visibility = "visible";
}

function toggleDiv(id,flagit,e) {
if (flagit=="1")
  {
    if (e.clientX)
      {
	x = e.clientX;
	y = e.clientY;
      }
	
    if (e.pageX)
      {
	x = e.pageX;
	y = e.pageY;
      }

    scrollX=document.body.scrollLeft;
    scrollY=document.body.scrollTop;

    if (!self.pageYOffset)
      {
	y+=scrollY;
	x+=scrollX;
      }
    if (document.body.clientHeight)
      {
	windowheight=document.body.clientHeight;
	windowwidth=document.body.clientWidth;
      }
    else
      {
	windowheight=self.innerHeight;
	windowwidth=self.innerWidth;
      }

    if (document.getElementById)
      {
        newleft=x;
        newtop=y;
	if (x-scrollX>windowwidth/2)
	    newleft = x-document.getElementById(''+id+'').clientWidth-20;
	  else
	    newleft = x+20;
	if (y-scrollY>windowheight/2)
	    newtop = y-document.getElementById(''+id+'').clientHeight-20;
	  else	
	    newtop = y+20;
	    
	document.getElementById(''+id+'').style.top=newtop+"px";
	document.getElementById(''+id+'').style.left=newleft+"px";

	if (th!=0)
	  clearTimeout(th);
		  
	th=setTimeout("showdiv('"+id+"')",200);
      }				
  }
else
 if (flagit=="0")
   {
     if (th!=0)
       {
	 clearTimeout(th);
	 th=0;
       }
     if (document.getElementById) document.getElementById(''+id+'').style.visibility = "hidden"
   }
}
