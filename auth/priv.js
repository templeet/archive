
/*
   name - name of the cookie
   value - value of the cookie
   [expires] - expiration date of the cookie
     (defaults to end of current session)
   [path] - path for which the cookie is valid
     (defaults to path of calling document)
   [domain] - domain for which the cookie is valid
     (defaults to domain of calling document)
   [secure] - Boolean value indicating if the cookie transmission requires
     a secure transmission
   * an argument defaults when it is assigned null as a placeholder
   * a null placeholder is not required for trailing omitted arguments
*/

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
//	if (!document.cookie)
//	  return null;
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++)
	{
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return unescape(c.substring(nameEQ.length,c.length));
	}
	return null;
}

function getprivvalue(allpriv,name)
{
	res=allpriv.indexOf("("+name+";");
	
	if (res<0)
	  return 0;
	  
	pos=res+2+name.length;	
	return allpriv.substring(pos,allpriv.indexOf(")",pos));
        
}

function auth_editpriv()
{
  if (!authentified())
    return 0;
    
  allpriv=readCookie('TempleetUser_53_priv');
  if (!allpriv)
    return 0;
  return getprivvalue(allpriv,"ADMIN") || getprivvalue(allpriv,"{}ADMIN") ||
               allpriv.indexOf("(_DEL_")>=0 ||
               allpriv.indexOf("(_ED_")>=0;
}

function getpriv(name)
{
  if (!authentified())
    return 0;

	allpriv=readCookie('TempleetUser_53_priv');

	if (!allpriv)
	  return 0;
	 
	if (name=="ADMIN" || name=="{}ADMIN" || name.substr(0,5)=="_DEL_")
	    maxvalue=1;
	  else 
	    maxvalue=10;      
	  
	if (getprivvalue(allpriv,"ADMIN"))
	  {
            return maxvalue; 	  
	  }
	
	if (name.substr(0,5)=="_DEL_")
	  {
            return getprivvalue(allpriv,name);
	  }  
	  
	if (name.substr(0,4)=="_ED_")
	  {
            area=name.substr(4);
            if (getprivvalue(allpriv,"_DEL_"+area))
              return maxvalue;
            return getprivvalue(allpriv,name);  
	  }
	  
        if (getprivvalue(allpriv,"_DEL_"+name))
          return maxvalue;
        
        return Math.max(getprivvalue(allpriv,name),getprivvalue(allpriv,"_ED_"+name));
}

function authentified()
{
  d = new Date();
  t = d.getTime()/1000;
  
  cookie=readCookie('TempleetUser_53');
  if (!cookie)
    return false;
    
  s=cookie.split(":")
  
  if(s[5]=='BADAUTH')
    return false;

  return t<s[3];
}

function getuser()
{
  if (!authentified())
    return "";
  
  allpriv=readCookie('TempleetUser_53_nick');

  if (!allpriv)
    return "";
  
  return allpriv.substring(0,allpriv.indexOf(":"));
}

function getnick()
{
  if (!authentified())
    return "";
    
  allpriv=readCookie('TempleetUser_53_nick');

  if (!allpriv)
    return "";
  
  pos=allpriv.indexOf(":");
  
  return allpriv.substring(pos+1,allpriv.indexOf(":",pos+1));
}

function getacceptedlang()
{
  var langnav=readCookie('browser_lang');
  if (!langnav)
    {
      if (typeof XMLHttpRequest == 'undefined')
        return ;
      http = new XMLHttpRequest();
      if (!http)
        return ;
        
      http.open("GET", "http://localhost/archive/templeet/lang.php", false);
      http.send(null);
      langnav=readCookie('browser_lang')
    }  
  var langnav_array=langnav_array=langnav.split(',');  
  var browser_lang=new Array();
  for (var tmplang in langnav_array)
    {
      tmp=langnav_array[tmplang].substr(0,2);
      browser_lang[tmp]=1;
    }
  return browser_lang;
}

function bestlang(pagelang,langsavail)
{
  var lang=pagelang;
  if (!langsavail[lang])
    {
      var acceptedlang=getacceptedlang();
      for (var lang in acceptedlang)  
        {
          if (langsavail[lang])
            break;
        }
    }
  
  if (!langsavail[lang])
    {
      lang='en';
    }
    
  if (!langsavail[lang])
    {
      for (var lang in langsavail)  
        {
          break;
        }
    }
    
  return lang;
}

function auth_emailislogin()
{
  return ;
}