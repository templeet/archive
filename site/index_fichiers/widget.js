function setCookie(name, value, expires, path, domain, secure) {
  var curCookie = name + "=" + escape(value) +
      ((expires) ? "; expires=" + expires.toGMTString() : "") +
      ((path) ? "; path=" + path : "") +
      ((domain) ? "; domain=" + domain : "") +
      ((secure) ? "; secure" : "");
      
  document.cookie = curCookie;
}

function readCookie(name)
{
  var nameEQ = name + "=";
  if (!document.cookie)
    return null;
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++)
    {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return unescape(c.substring(nameEQ.length,c.length));
    }
  return null;
}



function makeid() {
  var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
  var res = '';
  for (var i=0; i<10; i++) 
    {
      res += chars.substr(Math.floor(Math.random()*chars.length),1);
    }
  return res;
}

function templeet_setmax() {  
  bodywidth=$('body').width();
  windowwidth=$(window).width();
  tmpwidth=(((windowwidth-templeet_right_width)/2)-20)+"px";
  $('#templeet_col_left , #templeet_col_right').
      css("max-width",tmpwidth).
      css("width",tmpwidth);
  tmpwidth=((windowwidth-templeet_right_width)-20)+"px";
  $('#templeet_col_top').
      css("max-width",tmpwidth).
      css("width",tmpwidth);
}

function htmlspecialchars_decode(text) {
text = text.replace(/&gt;/g,'>'); 
text = text.replace(/&lt;/g,'<'); 
text = text.replace(/&quot;/g,'"'); 

text = text.replace(/&amp;/g,'&'); 
return text;
}


function displaywidget(id,title,url,content) {
  var liid;
  liid=makeid();    
  if (id=="widgets")
      {
        classclose=" templeet_close";
      }
    else
      {
        classclose="";
      }  
      
  $("#templeet_col_"+id).append('<li id="'+liid+'" class="templeet_box'+classclose+'">'+
                 '<img src="/skins/templeet4/img/close.png" alt="close" class="btn_close" />'+
                 "<h2>"+htmlspecialchars_decode(title)+"</h2>"+
                 (typeof(content)!="undefined"?'<div>'+htmlspecialchars_decode(content)+'</div>':'<div><img src="/skins/templeet4/img/wait.gif" /></div>')+
               "</li>");
               
  $("#"+liid).data('url',url);             
  if (typeof(content)=="undefined")
    {
      if ((id!="widgets"))
          $.get(url, function(data) 
            {
              var x;
              
              /* workaround fo uncaught exception error in jquery in undefined circumstances */
              try 
                {
                  x=$(".content",data);
                } 
              catch(err) 
                {
                }

              if (x && x[0])
                  $('#'+liid+" > div").html("<pre>"+$(x[0]).html()+"</pre>");
                else  
                  $('#'+liid+" > div").html(data);
              templeet_setmax();
            });
        else    
          $("#"+liid).data('loadcontent',1);             
    }
    
}

function templeet_setcookie() {
  
  var result;
  
  var cookie="";
  var widgets;
  
  $(".templeet_column, #templeet_col_widgets").each(
        function(index)
          {
            if (cookie!="")
              cookie+=":";
            
            tmp=/templeet_col_(.*)/.exec(this.id);
            cookie+=tmp[1]+"(";
            result=$('#'+this.id).sortable('toArray');
  
            widgets="";
            for(i in result)
              {
                if (result[i]!="")
                  {
                    if (widgets!="")
                      widgets+=",";
                    url=$("#"+result[i]).data('url').replace(/\.\w\w$/,""); 
                    widgets+=Number(crc32(url)).toString(36);
                  }
              }
              
            cookie+=widgets+")";  
          }
      );
   
  setCookie("widgets", cookie);
}


function loadjscssfile(filename, filetype){
 if (filetype=="js"){ //if filename is a external JavaScript file
  var fileref=document.createElement('script')
  fileref.setAttribute("type","text/javascript")
  fileref.setAttribute("src", filename)
 }
 else if (filetype=="css"){ //if filename is an external CSS file
  var fileref=document.createElement("link")
  fileref.setAttribute("rel", "stylesheet")
  fileref.setAttribute("type", "text/css")
  fileref.setAttribute("href", filename)
 }
 if (typeof fileref!="undefined")
  document.getElementsByTagName("head")[0].appendChild(fileref)
}


var templeet_right_width;

$(function() {
  templeet_right_width=$('#templeet_right').width();
  $(".templeet_column").sortable( 
     { 
       handle: "h2",
       placeholder: 'templeet-placeholder',
       connectWith: ".templeet_column, #templeet_col_widgets",
       start: function(event,ui)
         {
           ui.item[0].movecol=0;
           $(ui.item[0]).addClass("templeet_close");
//           $(ui.item[0]).addClass("templeet_close").width("auto").height("auto");
//           $(ui.item[0]).width($(ui.item[0]).width()+"px").
//                         height($(ui.item[0]).height()+"px");
         },
       receive: function(event,ui)
         {
           ui.item[0].movecol=1;
           $(ui.item[0]).removeClass("templeet_close");
           id=ui.item[0].id;
            
           if ($("#"+id).data("loadcontent"))
               {
                 var url;
                 url=$("#"+id).data("url");
                 $.get(url, function(data) 
                   {
                     $('#'+id+' div').remove();
                     $('#'+id).append("<div>"+data+"</div>");
                     templeet_setmax();
                   });
                 $("#"+id).removeData("loadcontent")  
               }
           $('#'+id).removeAttr("style");  
           
         },
       stop: function(event,ui)
         {
           if (ui.item[0].movecol==0)
             {
               $(ui.item[0]).removeClass("templeet_close");
             }  
         },
       update: templeet_setcookie  
    });
    
  $( "#templeet_col_widgets" ).sortable( 
     {
       connectWith: ".templeet_column",
       placeholder: 'templeet-placeholder',
       receive: function(event,ui)
         {
           ui.item[0].movecol=1;
         },
       stop: function(event,ui)
         {
           if (ui.item[0].movecol==0)
             {
               $(ui.item[0]).removeClass("templeet_close");
             }  

         },
       update: function() {
           templeet_setcookie();
         }
     });
  
  templeet_setmax();
  
  $(window).resize(function() {
     templeet_setmax();
    });

  cookie=readCookie("widgets") 
  
  if (cookie && cookie!="")
    {
      cookie_col=cookie.split(":");
      for(i in cookie_col)
        {
          widgetlist=/([^\)]+)\((.*)\)/.exec(cookie_col[i]);

          widgets_col=widgetlist[2].split(",");
          for(j in widgets_col)
            {
              if (typeof(widgets[widgets_col[j]])!="undefined")
                {
                  tmp=widgets[widgets_col[j]];
                  displaywidget(widgetlist[1],tmp[1],tmp[2],tmp[3]);
                  delete widgets[widgets_col[j]];
                }
            }
        }
    }   
    
  for(crc in widgets)
    {
      displaywidget(widgets[crc][0],widgets[crc][1],widgets[crc][2],widgets[crc][3]);
    }   
     
  $(".templeet_box > img.btn_close").click(function()
     {
       $(this).parent().addClass("templeet_close");
       position=$(this).parent().offset();
       $(this).parent().css("position","absolute").css("z-index",1000).css(position);
       
       $(this).parent().animate( 
              { 
                left: $("#templeet_col_widgets").offset().left, 
                top: $("#templeet_col_widgets").offset().top+$("#templeet_col_widgets").height()
              }, 300, function()
           {
             $("#templeet_col_widgets li:last-child").after($(this).detach().css("position","relative").css("top",0).css("left",0).css("z-index","auto"));
             templeet_setcookie();
           });
     });
  templeet_setmax();
});