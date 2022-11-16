
var popup_info_th=0;

function popup_info_showdiv(id)
{
  document.getElementById(id).style.visibility="visible";
}

function popup_info(trigger_id,popup_id,flagit,e,time) {
  popup_id_elt=document.getElementById(popup_id);

  if (flagit)
      {
        if (typeof(time)!="number")
          time=500;
          
        if (popup_info_th!=0)
          clearTimeout(popup_info_th);
          
        popup_info_th=setTimeout("popup_info_showdiv('"+popup_id+"')",time);
      }
    else
      {
        if (popup_info_th!=0)
          {
            clearTimeout(popup_info_th);
            popup_info_th=0;
          }
          
        popup_id_elt.style.visibility="hidden";

      }          
}

