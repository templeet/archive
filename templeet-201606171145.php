<?php

// This file is a PHP script that installs Templeet on a server.
// To install Templeet you need to save this file on your web site. Since it's
// a PHP script you MUST name it with a .php extension.
// Call that script from your browser, it will install templeet automagicaly on your
// web server 

if (!defined("PHP_MAJOR_VERSION") || (PHP_MAJOR_VERSION == 5 && PHP_MINOR_VERSION < 3))
  set_magic_quotes_runtime(0);

if (strlen("
")!=1 || strlen("
")!=2)
  {
    print "Installer file corrupted.<br />";
    print "Don't edit file with a text editor.<br />";
    print "Please transfer file as BINARY.<br />";
    exit(0);
  }  


if (getserver("HTTPS") == "on")
    $proto = "https:";
  else
    $proto = "http:";

if (preg_match('/^\w{2,6}:$/',getget('proto')))
  $proto=getget('proto');

$scriptname='SCRIPT_NAME';
if (!preg_match('/\.php$/',getserver('SCRIPT_NAME')) && isset($_SERVER['REDIRECT_URL']))
  {
    $scriptname='REDIRECT_URL';
  }

$nocompress=0;

$req_uri=getserver($scriptname);
$http_host=getserver('HTTP_HOST');

if (isset($_GET['read']))
    {
      $fp=@fopen("testcausality","rb");
      $tmp=fread($fp,100);
      fclose($fp);

      $n=$_GET['n'];

      if ($tmp!=$_GET['read'])
        {
          print "File system is not causal, Templeet installation impossible";
          exit;
        }
  
      print "<META http-equiv=\"Refresh\" content=\"0;URL=".$_SERVER["SCRIPT_NAME"]."?write=1&n=$n\">";
      print $n;

      @unlink("testcausality");
      exit;
    }
elseif (isset($_GET['write']))
    {
      srand(make_seed());
      $n=$_GET['n'];
      $n++;

      if ($n>100)
        {
          print "<META http-equiv=\"Refresh\" content=\"0;URL=".$_SERVER["SCRIPT_NAME"]."?testok=1\">";
          exit;
        }
  
      $randval = rand();
      $fp=@fopen("testcausality","wb");
      fwrite($fp,$randval);
      fclose($fp);
      print "<META http-equiv=\"Refresh\" content=\"0;URL=".$_SERVER["SCRIPT_NAME"]."?read=$randval&n=$n\">";
      print $n;
      exit;

    }   
    
$installer_key="sNSqbAFKiU1QqtrOd81Pyhb5keJTUiMuFQt5FmPZMnAIhkT17a";
$content_info=unserialize(base64_decode("YTozOntzOjk6Imluc3RmaWxlcyI7YToyNjp7czoxMToiY29yZS9vay5wbmciO2k6MDtzOjEzOiJjb3JlL3BsdXMucG5nIjtpOjc5MztzOjE0OiJjb3JlL21pbnVzLnBuZyI7aToxMDM3O3M6MTU6ImNvcmUvY2FuY2VsLnBuZyI7aToxMjc0O3M6MTM6ImNvcmUvaW5mby5wbmciO2k6MjI2OTtzOjMxOiJ0ZW1wbGVldDRfYWRtaW4vcmlnaHRfYXJyb3cucG5nIjtpOjMwNzk7czozMDoidGVtcGxlZXQ0X2FkbWluL2JnY29udGludWUucG5nIjtpOjM2OTc7czoxNjoiSU5TVF9lbi9mbGFnLnBuZyI7aTo2NTkwO3M6MTY6IklOU1RfZnIvZmxhZy5wbmciO2k6NzAwMjtzOjIwOiJwYWNrYWdlbWFzdGVyL29rLnBuZyI7aTo3MTMyO3M6Mjk6InBhY2thZ2VtYXN0ZXIvcmlnaHRfYXJyb3cucG5nIjtpOjc5MzQ7czoyNDoicGFja2FnZW1hc3Rlci9jYW5jZWwucG5nIjtpOjg1NTA7czoyMjoicGFja2FnZW1hc3Rlci9pbmZvLnBuZyI7aTo5NTU0O3M6Njoib2sucG5nIjtpOjEwMzczO3M6NjoiYmcuZ2lmIjtpOjExNDA1O3M6OToicmVzZXQucG5nIjtpOjE4NDgyO3M6MTI6ImJnYnV0dG9uLnBuZyI7aToyMjU0MztzOjg6Indhcm4ucG5nIjtpOjIyNjg1O3M6MTA6ImJnX3RvcC5wbmciO2k6MjQ5MjM7czoxMzoidGVtcGxlZXQ0LmdpZiI7aTozMDMzMDtzOjg6Im9wZW4ucG5nIjtpOjM3Nzk0O3M6MTA6ImluZGV4Lmh0bWwiO2k6Mzg4MTA7czo5OiJjbG9zZS5wbmciO2k6MTI1MjE4O3M6ODoiYm9tYi5wbmciO2k6MTI2NDI1O3M6MTE6ImxvYWRpbmcuZ2lmIjtpOjEyODg5MjtzOjEzOiJleHRyYWN0b3IudHh0IjtpOjEzMjM4NDt9czoxMToiZmlsZXNfYmVnaW4iO2k6MTM5Nzg2O3M6ODoicmVnaXN0cnkiO2E6NTp7czo3OiJzZXJ2ZXJzIjthOjE6e3M6MzI6IjJlOWE0NjYzMzVmZTgzMzAxZTM0NjllZWRlOTJiNDUxIjthOjI6e3M6NjoicHVia2V5IjtzOjI3MToiLS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUlHZk1BMEdDU3FHU0liM0RRRUJBUVVBQTRHTkFEQ0JpUUtCZ1FDanFyRi8rcUV4cnQ4bSswbHp2SHFFWFJOcwpNaHlBYVdHOXozNS9aNGJLVDF0UndQMDlZRUU5QlQ0YVd1bDVoUWtkRjl6a2pxRVZoWWM3c2tDOURtY3RNbzczClJDS3F3MlBTRXJyQVJPS0VscVVGOE1rTkdQT1RZMFJxcHdOd3daVldkOW01djQwUFcvQ3J5RmN0UTRiTFZ4bDgKVHV5d1dYR08xM1ZkbG9XMDZRSURBUUFCCi0tLS0tRU5EIFBVQkxJQyBLRVktLS0tLSI7czozOiJ1cmwiO3M6NjQ6Imh0dHA6Ly93d3cudGVtcGxlZXQub3JnL3RlbXBsZWV0LnBocC9tYWtlaW5zdGFsbGVyL2luZGV4Lmh0bWwuZnIiO319czoxNDoiaW5zdGFsbHBhY2thZ2UiO2E6Njp7czo0OiJjb3JlIjthOjY2OntzOjIxOiIuL3RlbXBsYXRlL1JFQURNRS50eHQiO2k6MDtzOjIwOiIuL3RlbXBsYXRlLy5odGFjY2VzcyI7aTo0OTtzOjI0OiIuL3RlbXBsZWV0L25naW54Y29kZS50eHQiO2k6MTUwO3M6MjY6Ii4vdGVtcGxlZXQvY2FjaGUvLmh0YWNjZXNzIjtpOjQ5MTtzOjI1OiIuL3RlbXBsZWV0L2J1aWxkY29kZTIudHh0IjtpOjU5MztzOjIzOiIuL3RlbXBsZWV0L3RlbXBsZWV0LnBocCI7aTozODg3O3M6MTk6Ii4vdGVtcGxlZXQvY29yZS5waHAiO2k6ODgwMTtzOjIwOiIuL3RlbXBsZWV0L2RlYnVnLnBocCI7aToxOTk0OTtzOjIyOiIuL3RlbXBsZWV0L3BhY2thZ2UucGhwIjtpOjIwMjMyO3M6MjE6Ii4vdGVtcGxlZXQvcGhhc2UyLnR4dCI7aToyMDY2MTtzOjI1OiIuL3RlbXBsZWV0L2xpYi9SRUFETUUudHh0IjtpOjM1MDY5O3M6MzA6Ii4vdGVtcGxlZXQvcGFja2FnZXMvUkVBRE1FLnR4dCI7aTozNTEyMztzOjI2OiIuL3RlbXBsZWV0L2F1dGgvYXJlYS8wLnBocCI7aTozNTE4NjtzOjI4OiIuL3RlbXBsZWV0L2F1dGgvaXNvNjM5LTEucGhwIjtpOjM1MjY4O3M6MjU6Ii4vdGVtcGxlZXQvYXV0aC91c2Vycy5waHAiO2k6NDExOTI7czoyNToiLi90ZW1wbGVldC9hdXRoL2xvZ2luLnBocCI7aTo0MTQxNTtzOjI2OiIuL3RlbXBsZWV0L2F1dGgvY29uZmlnLnBocCI7aTo0MTQ2MjtzOjIwOiIuL3RlbXBsZWV0L2ZldGNoLnBocCI7aTo0MTU3NDtzOjI3OiIuL3RlbXBsZWV0L3Rlc3RodGFjY2Vzcy5waHAiO2k6NDczODU7czoyMToiLi90ZW1wbGVldC9jb25maWcucGhwIjtpOjQ3ODU3O3M6MzA6Ii4vdGVtcGxlZXQvbW9kdWxlcy9sb2NhbGVzLnBocCI7aTo0OTMxODtzOjMyOiIuL3RlbXBsZWV0L21vZHVsZXMvYXV0aHRvb2xzLnBocCI7aTo0OTY1NDtzOjMxOiIuL3RlbXBsZWV0L21vZHVsZXMvcmVnaXN0ZXIucGhwIjtpOjUxNzgzO3M6MzE6Ii4vdGVtcGxlZXQvbW9kdWxlcy9hdXRoZWRpdC5waHAiO2k6NTIxNjg7czoyODoiLi90ZW1wbGVldC9tb2R1bGVzL2NhY2hlLnBocCI7aTo2MDUyNjtzOjMyOiIuL3RlbXBsZWV0L21vZHVsZXMvZmlsZWFycmF5LnBocCI7aTo2MzA0OTtzOjMzOiIuL3RlbXBsZWV0L21vZHVsZXMvZ2V0Z2xvYmFscy5waHAiO2k6NjQzMzg7czoyOToiLi90ZW1wbGVldC9tb2R1bGVzL2RlZnVuYy5waHAiO2k6NjUwMDg7czoyODoiLi90ZW1wbGVldC9tb2R1bGVzL2RlYnVnLnBocCI7aTo2NTcwNTtzOjM0OiIuL3RlbXBsZWV0L21vZHVsZXMvYmlub3BlcmF0b3IucGhwIjtpOjY2MTYwO3M6Mjg6Ii4vdGVtcGxlZXQvbW9kdWxlcy9pbWFnZS5waHAiO2k6NjY0NDg7czozMDoiLi90ZW1wbGVldC9tb2R1bGVzL3Nlc3Npb24ucGhwIjtpOjY3Mzg5O3M6MzE6Ii4vdGVtcGxlZXQvbW9kdWxlcy9maWxlbmFtZS5waHAiO2k6Njc1MzY7czoyNToiLi90ZW1wbGVldC9tb2R1bGVzL2lwLnBocCI7aTo2ODE0MDtzOjM5OiIuL3RlbXBsZWV0L21vZHVsZXMvbGliL2NvbmZpZ3VyYXRvci5waHAiO2k6Njg2MDY7czozODoiLi90ZW1wbGVldC9tb2R1bGVzL2ZpZWxkZmlsZWFjY2Vzcy5waHAiO2k6Njk5MDE7czozMDoiLi90ZW1wbGVldC9tb2R1bGVzL2N1dGh0bWwucGhwIjtpOjcxNjc3O3M6MzM6Ii4vdGVtcGxlZXQvbW9kdWxlcy9hcnJheXNwbGl0LnBocCI7aTo3MzkzODtzOjI3OiIuL3RlbXBsZWV0L21vZHVsZXMvdGltZS5waHAiO2k6NzQyMTY7czoyODoiLi90ZW1wbGVldC9tb2R1bGVzL2xpbmVzLnBocCI7aTo3NDgzNDtzOjM3OiIuL3RlbXBsZWV0L21vZHVsZXMvYXV0aC9hdXRoX2ZpbGUucGhwIjtpOjc1ODM3O3M6MzY6Ii4vdGVtcGxlZXQvbW9kdWxlcy9hdXRoL3Rvb2xzX2RiLnBocCI7aTo3OTkxNTtzOjM1OiIuL3RlbXBsZWV0L21vZHVsZXMvYXV0aC9hdXRoX2RiLnBocCI7aTo4MTM3NDtzOjI4OiIuL3RlbXBsZWV0L21vZHVsZXMvYXJyYXkucGhwIjtpOjg2MDQ2O3M6Mjc6Ii4vdGVtcGxlZXQvbW9kdWxlcy9hdXRoLnBocCI7aTo4NzA3NztzOjMzOiIuL3RlbXBsZWV0L21vZHVsZXMvZmlsZXN5c3RlbS5waHAiO2k6OTE4MzI7czoyNzoiLi90ZW1wbGVldC9tb2R1bGVzL2h0bWwucGhwIjtpOjk0OTE4O3M6MzA6Ii4vdGVtcGxlZXQvbW9kdWxlcy9sc190cmVlLnBocCI7aTo5NTYyMjtzOjI4OiIuL3RlbXBsZWV0L21vZHVsZXMvdGh1bWIucGhwIjtpOjk3NjUzO3M6MjY6Ii4vdGVtcGxlZXQvbW9kdWxlcy9yZGYucGhwIjtpOjk4NjkyO3M6MzI6Ii4vdGVtcGxlZXQvbW9kdWxlcy9saXN0X3RyZWUucGhwIjtpOjEwMDkxNztzOjI3OiIuL3RlbXBsZWV0L21vZHVsZXMvbGlzdC5waHAiO2k6MTAyODAzO3M6MjU6Ii4vdGVtcGxlZXQvbW9kdWxlcy9scy5waHAiO2k6MTA1MzgwO3M6MjY6Ii4vdGVtcGxlZXQvbW9kdWxlcy91cmwucGhwIjtpOjEwNzA2OTtzOjM4OiIuL3RlbXBsZWV0L21vZHVsZXMvbGlzdC9saXN0X215c3FsLnBocCI7aToxMDc2ODM7czozOToiLi90ZW1wbGVldC9tb2R1bGVzL2xpc3QvdG9vbHNfbXlzcWwucGhwIjtpOjExMDEzMTtzOjI3OiIuL3RlbXBsZWV0L21vZHVsZXMvbGFuZy5waHAiO2k6MTEyNTU3O3M6MzE6Ii4vdGVtcGxlZXQvbW9kdWxlcy94aHRtbGl6ZS5waHAiO2k6MTE0ODcxO3M6Mjg6Ii4vdGVtcGxlZXQvbW9kdWxlcy9yZWdleC5waHAiO2k6MTE1NzQwO3M6Mjc6Ii4vdGVtcGxlZXQvbW9kdWxlcy9leGVjLnBocCI7aToxMTY1OTA7czoyNDoiLi90ZW1wbGVldC9idWlsZGNvZGUudHh0IjtpOjExNjgyNDtzOjI4OiIuL3RlbXBsZWV0L3JlbW92ZXBhY2thZ2UucGhwIjtpOjExOTg2MztzOjI1OiIuL3RlbXBsZWV0L3NlcnZlcmNvbmYucGhwIjtpOjEyMDY4MztzOjE5OiIuL3RlbXBsZWV0L2xhbmcucGhwIjtpOjEyMzM1MDtzOjIxOiIuL3RlbXBsZWV0L2V4cGlyZS5waHAiO2k6MTIzNjAzO3M6MTQ6Ii4vdGVtcGxlZXQucGhwIjtpOjEyNDE3Mjt9czoxMDoicG9zdGdyZXNxbCI7YToyOntzOjQxOiJ0ZW1wbGVldC9tb2R1bGVzL2xpc3QvbGlzdF9wb3N0Z3Jlc3FsLnBocCI7aToxMjY1NDE7czo0MjoidGVtcGxlZXQvbW9kdWxlcy9saXN0L3Rvb2xzX3Bvc3RncmVzcWwucGhwIjtpOjEyOTIyNTt9czoxNToidGVtcGxlZXQ0X2FkbWluIjthOjI1NTp7czoyNjoiLi90ZW1wbGF0ZS9lcnJvci9ldmFsLmh0bWwiO2k6MTMxOTI2O3M6Mjg6Ii4vdGVtcGxhdGUvZXJyb3Ivc3ludGF4Lmh0bWwiO2k6MTMyMTExO3M6Mjc6Ii4vdGVtcGxhdGUvZXJyb3IvZXJyb3IudG1wbCI7aToxMzI1NzA7czoyNToiLi90ZW1wbGF0ZS9lcnJvci80MDQuaHRtbCI7aToxMzMzNzc7czoyNToiLi90ZW1wbGF0ZS9lcnJvci80MDMuaHRtbCI7aToxMzM1NTM7czoyOToiLi90ZW1wbGF0ZS9sYW5nL2luZGV4LmZyLnRtcGwiO2k6MTMzNjc5O3M6Mjk6Ii4vdGVtcGxhdGUvbGFuZy9pbmRleC5lbi50bXBsIjtpOjEzNDQxNjtzOjI4OiIuL3RlbXBsYXRlL3NraW5zL2RlZmF1bHQuY3NzIjtpOjEzNTA1NjtzOjMyOiIuL3RlbXBsYXRlL3NraW5zL2NsYXNzaWMvcGl4LnBuZyI7aToxMzYwNDg7czozOToiLi90ZW1wbGF0ZS9za2lucy9jbGFzc2ljL2Nvcm5lcl90b3AucG5nIjtpOjEzNjIwMDtzOjQyOiIuL3RlbXBsYXRlL3NraW5zL2NsYXNzaWMvY29ybmVyX2JvdHRvbS5wbmciO2k6MTM2NjAwO3M6MzI6Ii4vdGVtcGxhdGUvc2tpbnMvY2xhc3NpYy9za2luLmpzIjtpOjEzNjk5OTtzOjQyOiIuL3RlbXBsYXRlL3NraW5zL2NsYXNzaWMvbGFuZy9za2luLmVuLnRtcGwiO2k6MTM3Mjg1O3M6NDI6Ii4vdGVtcGxhdGUvc2tpbnMvY2xhc3NpYy9sYW5nL3NraW4uZnIudG1wbCI7aToxMzc1NTA7czozNDoiLi90ZW1wbGF0ZS9za2lucy9jbGFzc2ljL3NraW4udG1wbCI7aToxMzc4Mjk7czozNzoiLi90ZW1wbGF0ZS9za2lucy9jbGFzc2ljL3RlbXBsZWV0LmpwZyI7aToxNDEwNzI7czozMzoiLi90ZW1wbGF0ZS9za2lucy9jbGFzc2ljL2xlZnQucG5nIjtpOjE0OTczNjtzOjMzOiIuL3RlbXBsYXRlL3NraW5zL2NsYXNzaWMvc2tpbi5jc3MiO2k6MTQ5OTAwO3M6MzU6Ii4vdGVtcGxhdGUvc2tpbnMvY2xhc3NpYy90b3BfYmcucG5nIjtpOjE1MDgxNTtzOjI2OiIuL3RlbXBsYXRlL3NraW5zL3NraW4udG1wbCI7aToxNTEwOTY7czozMDoiLi90ZW1wbGF0ZS9za2lucy9yZWFkbWVudS50bXBsIjtpOjE1MTE5MDtzOjMxOiIuL3RlbXBsYXRlL2F1dGgvY3JlYXRldXNlci5odG1sIjtpOjE1MTgyNDtzOjI1OiIuL3RlbXBsYXRlL2F1dGgvcmVzZXQuY3NzIjtpOjE1Mzc4NTtzOjMxOiIuL3RlbXBsYXRlL2F1dGgvbXlfYWNjb3VudC5odG1sIjtpOjE1NTE1MztzOjI3OiIuL3RlbXBsYXRlL2F1dGgvY2hwYXNzLmh0bWwiO2k6MTU1MjczO3M6MzA6Ii4vdGVtcGxhdGUvYXV0aC9qc2dldHByaXYudG1wbCI7aToxNTU4OTI7czoyOToiLi90ZW1wbGF0ZS9hdXRoL3RhYmxlMmpzLnRtcGwiO2k6MTU2MjQ0O3M6Mjk6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nX21lbnUuY3NzIjtpOjE1NjQyMztzOjM3OiIuL3RlbXBsYXRlL2F1dGgvZGlzcGxheWF1dGhlcnJvci50bXBsIjtpOjE1NjYyNztzOjI3OiIuL3RlbXBsYXRlL2F1dGgvY2hpbmZvLmh0bWwiO2k6MTU2Njk0O3M6MzA6Ii4vdGVtcGxhdGUvYXV0aC9hdXRoYWRtaW4uaHRtbCI7aToxNTc2ODE7czozMToiLi90ZW1wbGF0ZS9hdXRoL2NsZWFyY2FjaGUuaHRtbCI7aToxNTg0MTU7czozMzoiLi90ZW1wbGF0ZS9hdXRoL2NvbmZpZ3VyYXRvci5odG1sIjtpOjE1ODU3MTtzOjMyOiIuL3RlbXBsYXRlL2F1dGgvY29uZmlndXJhdG9yLnR4dCI7aToxNTg4ODk7czoyNzoiLi90ZW1wbGF0ZS9hdXRoL21ldGhvZC5odG1sIjtpOjE1OTMyOTtzOjI5OiIuL3RlbXBsYXRlL2F1dGgvcHJpdmVkaXQuaHRtbCI7aToxNjAyODE7czozNToiLi90ZW1wbGF0ZS9hdXRoL3NlbGVjdHVzZXJhcmVhLnRtcGwiO2k6MTYzOTYzO3M6Mjc6Ii4vdGVtcGxhdGUvYXV0aC9ub3ByaXYuaHRtbCI7aToxNjQ1NDY7czoyOToiLi90ZW1wbGF0ZS9hdXRoL2F1dGhmb3JtLmh0bWwiO2k6MTY0NzU0O3M6MzY6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL3NpZ25vdXQuZW4udG1wbCI7aToxNjU2Njg7czozODoiLi90ZW1wbGF0ZS9hdXRoL2xhbmcvZGVidWdpbmZvLmVuLnRtcGwiO2k6MTY1Nzg0O3M6NDM6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL3BhY2thZ2VpbnN0YWxsLmZyLnRtcGwiO2k6MTY1ODczO3M6MzQ6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL2luZGV4LmZyLnRtcGwiO2k6MTY2MzQ2O3M6Mzc6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL3VzZXJpbmZvLmZyLnRtcGwiO2k6MTY2NTAwO3M6Mzc6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL2F1dGhmb3JtLmZyLnRtcGwiO2k6MTY2ODEwO3M6NDA6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL2NvbmZwcm9maWxlLmVuLnRtcGwiO2k6MTY3MTI4O3M6Mzk6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL215X2FjY291bnQuZnIudG1wbCI7aToxNjc5Njg7czo0MToiLi90ZW1wbGF0ZS9hdXRoL2xhbmcvY29uZmlndXJhdG9yLmZyLnRtcGwiO2k6MTY4MDczO3M6NDU6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL2Rpc3BsYXlhdXRoZXJyb3IuZW4udG1wbCI7aToxNjgyNjU7czozNDoiLi90ZW1wbGF0ZS9hdXRoL2xhbmcvaW5kZXguZW4udG1wbCI7aToxNjg5NDk7czo0MzoiLi90ZW1wbGF0ZS9hdXRoL2xhbmcvcHJpdmVkaXRzaW5nbGUuZnIudG1wbCI7aToxNjkxMDc7czozNjoiLi90ZW1wbGF0ZS9hdXRoL2xhbmcvc2lnbm91dC5mci50bXBsIjtpOjE2OTgwNztzOjM3OiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9hcmVhZWRpdC5mci50bXBsIjtpOjE2OTkyNztzOjM2OiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9uZXd1c2VyLmZyLnRtcGwiO2k6MTcwNDEyO3M6MzU6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL25vcHJpdi5lbi50bXBsIjtpOjE3MTA1NztzOjM5OiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9lZGl0Y29uZmlnLmVuLnRtcGwiO2k6MTcxMjAyO3M6Mzc6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL3VzZXJpbmZvLmVuLnRtcGwiO2k6MTcxOTY0O3M6MzU6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL2NobWFpbC5lbi50bXBsIjtpOjE3MjI1MTtzOjQwOiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9jb25mcHJvZmlsZS5mci50bXBsIjtpOjE3Mjg2ODtzOjM3OiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9wcml2ZWRpdC5lbi50bXBsIjtpOjE3Mzg0NDtzOjQzOiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9zZWxlY3R1c2VyYXJlYS5lbi50bXBsIjtpOjE3NDYwODtzOjQzOiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9zZWxlY3R1c2VyYXJlYS5mci50bXBsIjtpOjE3NDgyMjtzOjM1OiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9jaHBhc3MuZnIudG1wbCI7aToxNzUwOTE7czozNjoiLi90ZW1wbGF0ZS9hdXRoL2xhbmcvcHJvZmlsZS5mci50bXBsIjtpOjE3NTQzNTtzOjM4OiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9jb25mdmFsaWQuZW4udG1wbCI7aToxNzU2ODU7czozNToiLi90ZW1wbGF0ZS9hdXRoL2xhbmcvY2hpbmZvLmZyLnRtcGwiO2k6MTc2MTQ1O3M6MzU6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL2NocGFzcy5lbi50bXBsIjtpOjE3NjM5MjtzOjM5OiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9jbGVhcmNhY2hlLmZyLnRtcGwiO2k6MTc2Njk2O3M6Mzc6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL2xvc3RwYXNzLmZyLnRtcGwiO2k6MTc2ODA2O3M6Mzc6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL2F1dGhmb3JtLmVuLnRtcGwiO2k6MTc3NTc1O3M6NDU6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL2Rpc3BsYXlhdXRoZXJyb3IuZnIudG1wbCI7aToxNzc4NTM7czo0MToiLi90ZW1wbGF0ZS9hdXRoL2xhbmcvY29uZmlndXJhdG9yLmVuLnRtcGwiO2k6MTc4NjYxO3M6MzU6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL2NoaW5mby5lbi50bXBsIjtpOjE3ODgzMDtzOjQzOiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9wYWNrYWdlaW5zdGFsbC5lbi50bXBsIjtpOjE3OTA3MDtzOjM3OiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9hcmVhZWRpdC5lbi50bXBsIjtpOjE3OTQ3NDtzOjM1OiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9ub3ByaXYuZnIudG1wbCI7aToxNzk5MDg7czozODoiLi90ZW1wbGF0ZS9hdXRoL2xhbmcvZGVidWdpbmZvLmZyLnRtcGwiO2k6MTgwMDU3O3M6Mzk6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL215X2FjY291bnQuZW4udG1wbCI7aToxODAxNDk7czo0MToiLi90ZW1wbGF0ZS9hdXRoL2xhbmcvdmFsaWRhY2NvdW50LmVuLnRtcGwiO2k6MTgwMjUzO3M6NDE6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL3ZhbGlkYWNjb3VudC5mci50bXBsIjtpOjE4MDcwMTtzOjM3OiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9sb3N0cGFzcy5lbi50bXBsIjtpOjE4MTIxNztzOjM1OiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9jaG1haWwuZnIudG1wbCI7aToxODE4Nzk7czozOToiLi90ZW1wbGF0ZS9hdXRoL2xhbmcvZWRpdGNvbmZpZy5mci50bXBsIjtpOjE4MjU1MztzOjM1OiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9tZXRob2QuZnIudG1wbCI7aToxODM0MTg7czozNjoiLi90ZW1wbGF0ZS9hdXRoL2xhbmcvcHJvZmlsZS5lbi50bXBsIjtpOjE4MzY4MDtzOjM5OiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9jcmVhdGV1c2VyLmVuLnRtcGwiO2k6MTgzODg1O3M6MzY6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL25ld3VzZXIuZW4udG1wbCI7aToxODQ2Njc7czo0MzoiLi90ZW1wbGF0ZS9hdXRoL2xhbmcvcHJpdmVkaXRzaW5nbGUuZW4udG1wbCI7aToxODUyMjM7czozOToiLi90ZW1wbGF0ZS9hdXRoL2xhbmcvY3JlYXRldXNlci5mci50bXBsIjtpOjE4NTgyNDtzOjM3OiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9wcml2ZWRpdC5mci50bXBsIjtpOjE4NjY3NztzOjM4OiIuL3RlbXBsYXRlL2F1dGgvbGFuZy9jb25mdmFsaWQuZnIudG1wbCI7aToxODc1NTI7czozNToiLi90ZW1wbGF0ZS9hdXRoL2xhbmcvbWV0aG9kLmVuLnRtcGwiO2k6MTg4MDQ0O3M6Mzk6Ii4vdGVtcGxhdGUvYXV0aC9sYW5nL2NsZWFyY2FjaGUuZW4udG1wbCI7aToxODgyNzM7czoyOToiLi90ZW1wbGF0ZS9hdXRoL2xvc3RwYXNzLmh0bWwiO2k6MTg4MzcyO3M6Mjg6Ii4vdGVtcGxhdGUvYXV0aC9zZWxlY3RkaXYuanMiO2k6MTg5ODYwO3M6MzI6Ii4vdGVtcGxhdGUvYXV0aC9nZXRodHRwb2JqZWN0LmpzIjtpOjE5MDA2NTtzOjMxOiIuL3RlbXBsYXRlL2F1dGgvZWRpdGNvbmZpZy5odG1sIjtpOjE5MDMyMjtzOjMzOiIuL3RlbXBsYXRlL2F1dGgvdmFsaWRhY2NvdW50Lmh0bWwiO2k6MTkyMDg0O3M6Mjg6Ii4vdGVtcGxhdGUvYXV0aC9wcm9maWxlLnRtcGwiO2k6MTkyNTg4O3M6MzA6Ii4vdGVtcGxhdGUvYXV0aC9kZWJ1Z2luZm8uaHRtbCI7aToxOTM3MjM7czoyOToiLi90ZW1wbGF0ZS9hdXRoL2RlYnVnaW5mby5jc3MiO2k6MTk0MTI2O3M6MzI6Ii4vdGVtcGxhdGUvYXV0aC9jb25mcHJvZmlsZS5odG1sIjtpOjE5NDI4MztzOjMxOiIuL3RlbXBsYXRlL2F1dGgvZWRpdGNvbmZpZy50bXBsIjtpOjE5OTA5ODtzOjI2OiIuL3RlbXBsYXRlL2F1dGgvaW5kZXguaHRtbCI7aToxOTk5NzE7czoyNzoiLi90ZW1wbGF0ZS9hdXRoL2NobWFpbC5odG1sIjtpOjIwMDA4NztzOjI0OiIuL3RlbXBsYXRlL2F1dGgvcG9wdXAuanMiO2k6MjAwNzY2O3M6MzU6Ii4vdGVtcGxhdGUvYXV0aC9wYWNrYWdlaW5zdGFsbC5odG1sIjtpOjIwMjAzMztzOjI5OiIuL3RlbXBsYXRlL2F1dGgvYXJlYWVkaXQuaHRtbCI7aToyMDYzNTM7czoyMzoiLi90ZW1wbGF0ZS9hdXRoL2R1bXAuanMiO2k6MjA3ODM1O3M6MjM6Ii4vdGVtcGxhdGUvYXV0aC9wcml2LmpzIjtpOjIwODEzNjtzOjI4OiIuL3RlbXBsYXRlL2F1dGgvc2lnbm91dC5odG1sIjtpOjIwOTU1NDtzOjI3OiIuL3RlbXBsYXRlL2F1dGgvZmxvYXR3aW4uanMiO2k6MjA5NzI2O3M6Mjg6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9vay5wbmciO2k6MjEwMjM3O3M6MzM6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9tb3ZlX3VwLnBuZyI7aToyMTEyNzI7czozMzoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL3BhY2tkZXYucG5nIjtpOjIxNDY3NDtzOjMzOiIuL3RlbXBsYXRlL2F1dGgvaWNvbnMvem9vbV9pbi5wbmciO2k6MjE4NjcyO3M6MzA6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9ub25lLmdpZiI7aToyMTk3ODY7czozNzoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL21vZGlmeS10eXBlLnBuZyI7aToyMTk4MzU7czoyOToiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL2Rpci5wbmciO2k6MjIzNTQzO3M6Mzc6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9jb25maWd1cmVkYi5wbmciO2k6MjI2MzM5O3M6MzY6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9jbGVhcmNhY2hlLnBuZyI7aToyMzIxODQ7czozMToiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL3Jlc2V0LnBuZyI7aToyMzU2NjA7czozNzoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL3Byb2ZpbGVjb25mLnBuZyI7aToyMzk3MjE7czozNjoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL3NtYWxsLXRleHQucG5nIjtpOjI0MzkwODtzOjMzOiIuL3RlbXBsYXRlL2F1dGgvaWNvbnMvcHJvZmlsZS5wbmciO2k6MjQ0MTE4O3M6MzY6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9jaGFuZ2VtYWlsLnBuZyI7aToyNDc2MTQ7czozMjoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL3VucGFjay5wbmciO2k6MjUxMzI4O3M6MzQ6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9uZXctdXNlci5wbmciO2k6MjUyNzI4O3M6MzU6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9zbWFsbC1kaXIucG5nIjtpOjI1NTIwNTtzOjMwOiIuL3RlbXBsYXRlL2F1dGgvaWNvbnMvaG9tZS5wbmciO2k6MjU1NjAzO3M6Mzc6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9yaWdodF9hcnJvdy5wbmciO2k6MjU5NzUzO3M6MzQ6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy91cF9hcnJvdy5wbmciO2k6MjYwMzQ5O3M6MzY6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9wcml2aWxlZ2VzLnBuZyI7aToyNjEwNTg7czozODoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL2NvbmZpZ3VyYXRvci5wbmciO2k6MjYzNTY0O3M6Mzk6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy92YWxpZC14aHRtbDEwLnBuZyI7aToyNjYyNjQ7czozNToiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL2Vycm9yLWJpZy5wbmciO2k6MjY3NzY3O3M6MzE6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy90cmFzaC5wbmciO2k6MjczNjUwO3M6MzU6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9tb3ZlX2Rvd24ucG5nIjtpOjI3NDk3MztzOjMyOiIuL3RlbXBsYXRlL2F1dGgvaWNvbnMvc2lnbmluLnBuZyI7aToyNzgzNTI7czozNzoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL2NoX2xvZ19uaWNrLnBuZyI7aToyODI2NjM7czo0MToiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL3RlbXBsZWV0XzEyMHg4MC5wbmciO2k6MjgzNTQwO3M6MzA6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9wbHVzLnBuZyI7aToyOTI4Njc7czozNDoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL2VkaXRhcmVhLnBuZyI7aToyOTMwOTE7czozMToiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL21pbnVzLnBuZyI7aToyOTQ1MDA7czozNDoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL3BhY2thZ2VzLnBuZyI7aToyOTQ3MTM7czo0NToiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL3Bvd2VyZWRfYnlfdGVtcGxlZXQucG5nIjtpOjI5OTYzMjtzOjM1OiIuL3RlbXBsYXRlL2F1dGgvaWNvbnMvY29uZmlndXJlLnBuZyI7aTozMDUyNDQ7czozMjoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL3NlYXJjaC5wbmciO2k6MzA5MjkyO3M6MzM6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9zaWdub3V0LnBuZyI7aTozMTI0NjI7czozNzoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL3dhcm5pbmctYmlnLnBuZyI7aTozMTQzMzU7czozOToiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL3NlcnZlci1jb25maWcucG5nIjtpOjMxNjYwMDtzOjM3OiIuL3RlbXBsYXRlL2F1dGgvaWNvbnMvaW1wb3J0LXBhY2sucG5nIjtpOjMxODk0MDtzOjM5OiIuL3RlbXBsYXRlL2F1dGgvaWNvbnMvdGVtcGxlZXRhZG1pbi5wbmciO2k6MzIyNDI3O3M6MzM6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy93YXJuaW5nLnBuZyI7aTozMjU3Mzg7czozMToiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL2Vycm9yLnBuZyI7aTozMjcxNjA7czo0MDoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL2RpYWxvZy13YXJuaW5nLnBuZyI7aTozMzA2Nzk7czozNjoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL2xlZnRfYXJyb3cucG5nIjtpOjMzMTQ1NjtzOjM2OiIuL3RlbXBsYXRlL2F1dGgvaWNvbnMvYXV0aG1ldGhvZC5wbmciO2k6MzMyMDU0O3M6MzQ6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9jb3B5ZmlsZS5wbmciO2k6MzM3NzM5O3M6Mzg6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy92YWxpZGFjY291bnQucG5nIjtpOjMzODc0OTtzOjMyOiIuL3RlbXBsYXRlL2F1dGgvaWNvbnMvdXBkYXRlLnBuZyI7aTozNDIxNDA7czo0MDoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL3RlbXBsZWV0XzYweDQwLnBuZyI7aTozNDMxNTg7czozMzoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL25ld2FyZWEucG5nIjtpOjM0NzM2MDtzOjM1OiIuL3RlbXBsYXRlL2F1dGgvaWNvbnMvZGVidWdpbmZvLnBuZyI7aTozNTAxMDk7czoyOToiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL2tleS5wbmciO2k6MzU0MzY4O3M6MzQ6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy96b29tX291dC5wbmciO2k6MzU3MDAzO3M6MzA6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy91c2VyLnBuZyI7aTozNTgwOTI7czozNDoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL2xvc3RwYXNzLnBuZyI7aTozNjI0Mjg7czoyODoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL2VuLnBuZyI7aTozNjYzNzA7czo0MToiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL3RlbXBsZWV0LXVwZGF0ZS5wbmciO2k6MzY3MDQ4O3M6Mzc6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9leHBvcnQtcGFjay5wbmciO2k6MzY5NjgwO3M6MzI6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9jYW5jZWwucG5nIjtpOjM3MzI2MDtzOjMwOiIuL3RlbXBsYXRlL2F1dGgvaWNvbnMvYm9tYi5wbmciO2k6Mzc0NDQxO3M6Mjk6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy90aXAucG5nIjtpOjM3NjkyNztzOjMwOiIuL3RlbXBsYXRlL2F1dGgvaWNvbnMvaW5mby5wbmciO2k6MzgxOTUwO3M6MzM6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9uZXdfcm93LnBuZyI7aTozODI4NjM7czozNDoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL2Rvd25sb2FkLnBuZyI7aTozODU5NTk7czoyODoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL2ZyLnBuZyI7aTozODY3OTY7czozMjoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL2tleS0yNC5wbmciO2k6Mzg3MDYwO3M6MzA6Ii4vdGVtcGxhdGUvYXV0aC9pY29ucy9sb2NrLnBuZyI7aTozODgxODA7czozNzoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL2NoZWNrLXNtYWxsLnBuZyI7aTozODkwNjE7czozMzoiLi90ZW1wbGF0ZS9hdXRoL2ljb25zL25ld2ZpbGUucG5nIjtpOjM5MjA2MztzOjI4OiIuL3RlbXBsYXRlL2F1dGgvbmV3dXNlci5odG1sIjtpOjM5MjY5MztzOjMzOiIuL3RlbXBsYXRlL2F1dGgvdmFsaWRfYnV0dG9uLnRtcGwiO2k6MzkzOTMwO3M6MzU6Ii4vdGVtcGxhdGUvYXV0aC9wcml2ZWRpdHNpbmdsZS5odG1sIjtpOjM5NDE0NztzOjMwOiIuL3RlbXBsYXRlL2F1dGgvY29uZnZhbGlkLmh0bWwiO2k6Mzk2ODY2O3M6MzA6Ii4vdGVtcGxhdGUvYXV0aC9yZXZlYWxlbWFpbC5qcyI7aTozOTc0NDI7czoyMDoiLi90ZW1wbGF0ZS8uaHRhY2Nlc3MiO2k6Mzk3NjI5O3M6MzQ6Ii4vdGVtcGxhdGUvbWVudS85MF9zaWdub3V0L2ZyLnRtcGwiO2k6Mzk3NzMwO3M6MzY6Ii4vdGVtcGxhdGUvbWVudS85MF9zaWdub3V0L21lbnUudG1wbCI7aTozOTc4Nzg7czozNDoiLi90ZW1wbGF0ZS9tZW51LzkwX3NpZ25vdXQvZW4udG1wbCI7aTozOTc5NDA7czozMzoiLi90ZW1wbGF0ZS9tZW51LzkxX3NpZ25pbi9mci50bXBsIjtpOjM5ODA2MztzOjM1OiIuL3RlbXBsYXRlL21lbnUvOTFfc2lnbmluL21lbnUudG1wbCI7aTozOTgyMDg7czozMzoiLi90ZW1wbGF0ZS9tZW51LzkxX3NpZ25pbi9lbi50bXBsIjtpOjM5ODI3MDtzOjMxOiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS9mci50bXBsIjtpOjM5ODM5NztzOjMzOiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS9tZW51LnRtcGwiO2k6Mzk4NTQxO3M6MzE6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lL2VuLnRtcGwiO2k6Mzk4NTYyO3M6NTY6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzMwX215YWNjb3VudC8zMF9sb3N0cGFzcy9mci50bXBsIjtpOjM5ODY5MjtzOjU4OiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS8zMF9teWFjY291bnQvMzBfbG9zdHBhc3MvbWVudS50bXBsIjtpOjM5ODg0MDtzOjU2OiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS8zMF9teWFjY291bnQvMzBfbG9zdHBhc3MvZW4udG1wbCI7aTozOTg5MDM7czo0NDoiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMzBfbXlhY2NvdW50L2ZyLnRtcGwiO2k6Mzk5MDQ0O3M6NTQ6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzMwX215YWNjb3VudC8yMF9jaHBhc3MvZnIudG1wbCI7aTozOTkxODA7czo1NjoiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMzBfbXlhY2NvdW50LzIwX2NocGFzcy9tZW51LnRtcGwiO2k6Mzk5MzI3O3M6NTQ6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzMwX215YWNjb3VudC8yMF9jaHBhc3MvZW4udG1wbCI7aTozOTkzOTA7czo0NjoiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMzBfbXlhY2NvdW50L21lbnUudG1wbCI7aTozOTk1MzA7czo1NDoiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMzBfbXlhY2NvdW50LzQwX2NobWFpbC9mci50bXBsIjtpOjM5OTU1MztzOjU2OiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS8zMF9teWFjY291bnQvNDBfY2htYWlsL21lbnUudG1wbCI7aTozOTk2OTk7czo1NDoiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMzBfbXlhY2NvdW50LzQwX2NobWFpbC9lbi50bXBsIjtpOjM5OTc4NjtzOjU0OiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS8zMF9teWFjY291bnQvNTBfY2hpbmZvL2ZyLnRtcGwiO2k6Mzk5OTIxO3M6NTY6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzMwX215YWNjb3VudC81MF9jaGluZm8vbWVudS50bXBsIjtpOjQwMDA3MjtzOjU0OiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS8zMF9teWFjY291bnQvNTBfY2hpbmZvL2VuLnRtcGwiO2k6NDAwMTM1O3M6NDQ6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzMwX215YWNjb3VudC9lbi50bXBsIjtpOjQwMDI4MDtzOjU4OiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS8zMF9teWFjY291bnQvMTBfY3JlYXRldXNlci9mci50bXBsIjtpOjQwMDQxMDtzOjYwOiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS8zMF9teWFjY291bnQvMTBfY3JlYXRldXNlci9tZW51LnRtcGwiO2k6NDAwNTY4O3M6NTg6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzMwX215YWNjb3VudC8xMF9jcmVhdGV1c2VyL2VuLnRtcGwiO2k6NDAwNjgwO3M6Njc6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzIwX2FkbWluLzc1X2NvbmZpZ3VyYXRpb24vNDVfY29uZmlnL2ZyLnRtcGwiO2k6NDAwODE0O3M6Njc6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzIwX2FkbWluLzc1X2NvbmZpZ3VyYXRpb24vNDVfY29uZmlnL2VuLnRtcGwiO2k6NDAwOTY0O3M6NTc6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzIwX2FkbWluLzc1X2NvbmZpZ3VyYXRpb24vZnIudG1wbCI7aTo0MDExMDY7czo3MzoiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMjBfYWRtaW4vNzVfY29uZmlndXJhdGlvbi8xNV9hY2NvdW50dmFsaWQvZnIudG1wbCI7aTo0MDEyMjk7czo3MzoiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMjBfYWRtaW4vNzVfY29uZmlndXJhdGlvbi8xNV9hY2NvdW50dmFsaWQvZW4udG1wbCI7aTo0MDEzNzY7czo1OToiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMjBfYWRtaW4vNzVfY29uZmlndXJhdGlvbi9tZW51LnRtcGwiO2k6NDAxNTE4O3M6Njk6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzIwX2FkbWluLzc1X2NvbmZpZ3VyYXRpb24vNDBfcmVnaXN0ZXIvZnIudG1wbCI7aTo0MDE1ODM7czo2OToiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMjBfYWRtaW4vNzVfY29uZmlndXJhdGlvbi80MF9yZWdpc3Rlci9lbi50bXBsIjtpOjQwMTczMDtzOjU3OiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS8yMF9hZG1pbi83NV9jb25maWd1cmF0aW9uL2VuLnRtcGwiO2k6NDAxODczO3M6NjY6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzIwX2FkbWluLzc1X2NvbmZpZ3VyYXRpb24vNjBfZGVidWcvZnIudG1wbCI7aTo0MDE5OTM7czo2NjoiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMjBfYWRtaW4vNzVfY29uZmlndXJhdGlvbi82MF9kZWJ1Zy9lbi50bXBsIjtpOjQwMjE0ODtzOjY1OiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS8yMF9hZG1pbi83NV9jb25maWd1cmF0aW9uLzIwX2luZm8vZnIudG1wbCI7aTo0MDIzMDM7czo2NToiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMjBfYWRtaW4vNzVfY29uZmlndXJhdGlvbi8yMF9pbmZvL2VuLnRtcGwiO2k6NDAyNDQ4O3M6NzE6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzIwX2FkbWluLzc1X2NvbmZpZ3VyYXRpb24vMTBfYXV0aG1ldGhvZC9mci50bXBsIjtpOjQwMjU5MDtzOjcxOiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS8yMF9hZG1pbi83NV9jb25maWd1cmF0aW9uLzEwX2F1dGhtZXRob2QvZW4udG1wbCI7aTo0MDI3MzU7czo3NToiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMjBfYWRtaW4vNzVfY29uZmlndXJhdGlvbi8zMF9wYWNrYWdlaW5zdGFsbC9mci50bXBsIjtpOjQwMjg3MjtzOjc1OiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS8yMF9hZG1pbi83NV9jb25maWd1cmF0aW9uLzMwX3BhY2thZ2VpbnN0YWxsL2VuLnRtcGwiO2k6NDAzMDE2O3M6NzE6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzIwX2FkbWluLzc1X2NvbmZpZ3VyYXRpb24vMjVfY2xlYXJjYWNoZS9mci50bXBsIjtpOjQwMzE1NztzOjcxOiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS8yMF9hZG1pbi83NV9jb25maWd1cmF0aW9uLzI1X2NsZWFyY2FjaGUvZW4udG1wbCI7aTo0MDMyOTc7czo0MDoiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMjBfYWRtaW4vZnIudG1wbCI7aTo0MDM0Mjg7czo0MjoiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMjBfYWRtaW4vbWVudS50bXBsIjtpOjQwMzYwMTtzOjQ4OiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS8yMF9hZG1pbi83MF9hcmVhL2ZyLnRtcGwiO2k6NDAzNjUyO3M6NTA6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzIwX2FkbWluLzcwX2FyZWEvbWVudS50bXBsIjtpOjQwMzc4ODtzOjQ4OiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS8yMF9hZG1pbi83MF9hcmVhL2VuLnRtcGwiO2k6NDAzODUyO3M6NDA6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzIwX2FkbWluL2VuLnRtcGwiO2k6NDAzOTg1O3M6NTE6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzIwX2FkbWluLzQwX25ld3VzZXIvZnIudG1wbCI7aTo0MDQxMzk7czo1MzoiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMjBfYWRtaW4vNDBfbmV3dXNlci9tZW51LnRtcGwiO2k6NDA0Mjk0O3M6NTE6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzIwX2FkbWluLzQwX25ld3VzZXIvZW4udG1wbCI7aTo0MDQzNjY7czo1MjoiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMjBfYWRtaW4vNjBfZWRpdHByaXYvZnIudG1wbCI7aTo0MDQ0OTk7czo1NDoiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvMjBfYWRtaW4vNjBfZWRpdHByaXYvbWVudS50bXBsIjtpOjQwNDY1NztzOjUyOiIuL3RlbXBsYXRlL21lbnUvMDBfaG9tZS8yMF9hZG1pbi82MF9lZGl0cHJpdi9lbi50bXBsIjtpOjQwNDcyMTtzOjM5OiIuL3RlbXBsYXRlL21lbnUvOTVfbGFuZy81MF9lbi9tZW51LnRtcGwiO2k6NDA0ODcwO3M6MzY6Ii4vdGVtcGxhdGUvbWVudS85NV9sYW5nLzUwX2VuL2VuLnBuZyI7aTo0MDUwODg7czozMToiLi90ZW1wbGF0ZS9tZW51Lzk1X2xhbmcvZnIudG1wbCI7aTo0MDg2NTc7czozMzoiLi90ZW1wbGF0ZS9tZW51Lzk1X2xhbmcvbWVudS50bXBsIjtpOjQwODc3OTtzOjMxOiIuL3RlbXBsYXRlL21lbnUvOTVfbGFuZy9lbi50bXBsIjtpOjQwODgxODtzOjMyOiIuL3RlbXBsYXRlL21lbnUvOTVfbGFuZy9sYW5nLnBuZyI7aTo0MDg5MzY7czozOToiLi90ZW1wbGF0ZS9tZW51Lzk1X2xhbmcvNTBfZnIvbWVudS50bXBsIjtpOjQxNTg2MztzOjM2OiIuL3RlbXBsYXRlL21lbnUvOTVfbGFuZy81MF9mci9mci5wbmciO2k6NDE2MTI3O3M6MjE6Ii4vdGVtcGxhdGUvaW5kZXguaHRtbCI7aTo0MTkwMDg7fXM6MTM6InRlbXBsZWV0NF9kb2MiO2E6MTE6e3M6NDI6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzUwX2RvYy9tYW5wYWdlLnBuZyI7aTo0MTkxNjQ7czo0MDoiLi90ZW1wbGF0ZS9tZW51LzAwX2hvbWUvNTBfZG9jL21lbnUudG1wbCI7aTo0MjI0Njk7czoyOToiLi90ZW1wbGF0ZS9kb2MvZnVuY3Rpb25zLmh0bWwiO2k6NDIyNDkyO3M6MjU6Ii4vdGVtcGxhdGUvZG9jLyRodG1sLnRtcGwiO2k6NDIzMjU2O3M6MjI6Ii4vdGVtcGxhdGUvZG9jL2RvYy5jc3MiO2k6NDI0OTA1O3M6MzE6Ii4vdGVtcGxhdGUvZG9jL2ltYWdlcy9pbWFnZS5qcGciO2k6NDI1MzY4O3M6MzE6Ii4vdGVtcGxhdGUvZG9jL2ltYWdlcy9pbWFnZS5naWYiO2k6NDI1NjgxO3M6MzE6Ii4vdGVtcGxhdGUvZG9jL2ltYWdlcy9pbWFnZS5wbmciO2k6NDI1OTk0O3M6MjU6Ii4vdGVtcGxhdGUvZG9jL2luZGV4Lmh0bWwiO2k6NDI2MzA3O3M6Mjg6Ii4vdGVtcGxhdGUvZG9jL2ljb25zL3RvcC5wbmciO2k6NDI3MDk5O3M6Mjc6Ii4vdGVtcGxhdGUvZG9jL2RvY21lbnUudG1wbCI7aTo0MzAwMzE7fXM6MTY6InRlbXBsZWV0NF9kb2NfZnIiO2E6NDk6e3M6Mzg6Ii4vdGVtcGxhdGUvbWVudS8wMF9ob21lLzUwX2RvYy9mci50bXBsIjtpOjQzMDE3NTtzOjMzOiIuL3RlbXBsYXRlL2RvYy9sYW5nL2luZGV4LmZyLnRtcGwiO2k6NDMwMzI1O3M6MzU6Ii4vdGVtcGxhdGUvZG9jL2xhbmcvZG9jbWVudS5mci50bXBsIjtpOjQzMDYwOTtzOjM3OiIuL3RlbXBsYXRlL2RvYy9sYW5nL2Z1bmN0aW9ucy5mci50bXBsIjtpOjQzMDcxMDtzOjMxOiIuL3RlbXBsYXRlL2RvYy9sYW5nL2RvYy5mci50bXBsIjtpOjQzMDgxMDtzOjM0OiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvZmlsZW5hbWUueG1sIjtpOjQzMDkwMjtzOjM1OiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvbGlzdF90cmVlLnhtbCI7aTo0MzE5MDQ7czozMDoiLi90ZW1wbGF0ZS9kb2MveG1sL2ZyL2RpZmYueG1sIjtpOjQzNTIxODtzOjMxOiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvaW1hZ2UueG1sIjtpOjQzNTM4ODtzOjM3OiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvYmlub3BlcmF0b3IueG1sIjtpOjUxMTIyNztzOjMwOiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvYXV0aC54bWwiO2k6NTEyMDk2O3M6MzM6Ii4vdGVtcGxhdGUvZG9jL3htbC9mci9jdXRodG1sLnhtbCI7aTo1MjMxOTg7czozNzoiLi90ZW1wbGF0ZS9kb2MveG1sL2ZyL3Vuc2VyaWFsaXplLnhtbCI7aTo1MjQ1NzA7czozMToiLi90ZW1wbGF0ZS9kb2MveG1sL2ZyL2FycmF5LnhtbCI7aTo1MjQ3NDg7czozNToiLi90ZW1wbGF0ZS9kb2MveG1sL2ZyL2F1dGh0b29scy54bWwiO2k6NTI1NjA1O3M6Mjg6Ii4vdGVtcGxhdGUvZG9jL3htbC9mci9scy54bWwiO2k6NTI1ODQ5O3M6MzA6Ii4vdGVtcGxhdGUvZG9jL3htbC9mci9odG1sLnhtbCI7aTo1Mjc0NDQ7czozMToiLi90ZW1wbGF0ZS9kb2MveG1sL2ZyL2xpbmVzLnhtbCI7aTo1Mjg3MjU7czozNDoiLi90ZW1wbGF0ZS9kb2MveG1sL2ZyL3hodG1saXplLnhtbCI7aTo1Mjk3NDY7czoyODoiLi90ZW1wbGF0ZS9kb2MveG1sL2ZyL2lwLnhtbCI7aTo1MzAyNTU7czozMDoiLi90ZW1wbGF0ZS9kb2MveG1sL2ZyL2NvcmUueG1sIjtpOjUzMDc0NTtzOjM1OiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvZmlsZWFycmF5LnhtbCI7aTo1NDMwMzk7czo0MToiLi90ZW1wbGF0ZS9kb2MveG1sL2ZyL2ZpZWxkZmlsZWFjY2Vzcy54bWwiO2k6NTQzMjQ1O3M6MzQ6Ii4vdGVtcGxhdGUvZG9jL3htbC9mci9yZWdpc3Rlci54bWwiO2k6NTQzNDc3O3M6MzM6Ii4vdGVtcGxhdGUvZG9jL3htbC9mci9zZXNzaW9uLnhtbCI7aTo1NDQ3MDI7czozMzoiLi90ZW1wbGF0ZS9kb2MveG1sL2ZyL3BhY2thZ2UueG1sIjtpOjU0NDg3OTtzOjMxOiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvY2FjaGUueG1sIjtpOjU0NTA5NztzOjM0OiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvYXV0aGVkaXQueG1sIjtpOjU0NzA1NztzOjMxOiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvZGVidWcueG1sIjtpOjU2NTkzNztzOjMwOiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvbGRhcC54bWwiO2k6NTY2MTIyO3M6MzQ6Ii4vdGVtcGxhdGUvZG9jL3htbC9mci9wYXNzdGhydS54bWwiO2k6NTY2MzIxO3M6MzY6Ii4vdGVtcGxhdGUvZG9jL3htbC9mci9nZXRnbG9iYWxzLnhtbCI7aTo1NjY0OTU7czozNjoiLi90ZW1wbGF0ZS9kb2MveG1sL2ZyL2FycmF5c3BsaXQueG1sIjtpOjU2NzUwODtzOjMzOiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvc3RyaW5ncy54bWwiO2k6NTY3OTY2O3M6MzQ6Ii4vdGVtcGxhdGUvZG9jL3htbC9mci9zZXRsb2NhbC54bWwiO2k6NTY4MTM5O3M6Mjk6Ii4vdGVtcGxhdGUvZG9jL3htbC9mci94bWwueG1sIjtpOjU2ODMzNTtzOjMxOiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvc3BlbGwueG1sIjtpOjU2ODUwODtzOjI5OiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvcmRmLnhtbCI7aTo1Njg2OTA7czozMzoiLi90ZW1wbGF0ZS9kb2MveG1sL2ZyL2xzX3RyZWUueG1sIjtpOjU2OTk2OTtzOjM2OiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvZmlsZXN5c3RlbS54bWwiO2k6NTcxNjI5O3M6Mjk6Ii4vdGVtcGxhdGUvZG9jL3htbC9mci91cmwueG1sIjtpOjU3NDYwMDtzOjMwOiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvdGltZS54bWwiO2k6NTc1Mzk2O3M6MzA6Ii4vdGVtcGxhdGUvZG9jL3htbC9mci9saXN0LnhtbCI7aTo1Nzc0MjM7czozMToiLi90ZW1wbGF0ZS9kb2MveG1sL2ZyL2RldGFyLnhtbCI7aTo1ODE1MTI7czozMDoiLi90ZW1wbGF0ZS9kb2MveG1sL2ZyL2xhbmcueG1sIjtpOjU4MTY4MztzOjMxOiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvdGh1bWIueG1sIjtpOjU4MjIyODtzOjMzOiIuL3RlbXBsYXRlL2RvYy94bWwvZnIvbG9jYWxlcy54bWwiO2k6NTgyOTAwO3M6MzE6Ii4vdGVtcGxhdGUvZG9jL3htbC9mci9yZWdleC54bWwiO2k6NTgzMzU2O3M6MzI6Ii4vdGVtcGxhdGUvZG9jL3htbC9mci9kZWZ1bmMueG1sIjtpOjU4NDEwNzt9czoxNjoidGVtcGxlZXQ0X21pbmlmeSI7YTozOntzOjI4OiIuL3RlbXBsZWV0L291dHB1dC9taW5pZnkucGhwIjtpOjU4NTU3NztzOjM0OiIuL3RlbXBsZWV0L291dHB1dC9taW5pZnkvanNtaW4ucGhwIjtpOjU4NjE2MztzOjM5OiIuL3RlbXBsZWV0L291dHB1dC9taW5pZnkvQ29tcHJlc3Nvci5waHAiO2k6NTg4NDA4O319czo1OiJkaXN0cyI7YTo5OntzOjQ6ImNvcmUiO2E6Mzp7czoxMDoic25hcHNob3RpZCI7czoxMjoiMjAxNjA2MTcxMTQ1IjtzOjEyOiJzbmFwc2hvdGRhdGUiO3M6MTI6IjIwMTYwNjE3MTE0NSI7czo2OiJzZXJ2ZXIiO3M6MzI6IjJlOWE0NjYzMzVmZTgzMzAxZTM0NjllZWRlOTJiNDUxIjt9czoxMDoicG9zdGdyZXNxbCI7YTozOntzOjEwOiJzbmFwc2hvdGlkIjtzOjEyOiIyMDE0MDkyNzA4MDAiO3M6MTI6InNuYXBzaG90ZGF0ZSI7czoxMjoiMjAxNDA5MjcwODAwIjtzOjY6InNlcnZlciI7czozMjoiMmU5YTQ2NjMzNWZlODMzMDFlMzQ2OWVlZGU5MmI0NTEiO31zOjE1OiJ0ZW1wbGVldDRfYWRtaW4iO2E6Mzp7czoxMDoic25hcHNob3RpZCI7czoxMjoiMjAxNTEyMTUwNjQ1IjtzOjEyOiJzbmFwc2hvdGRhdGUiO3M6MTI6IjIwMTUxMjE1MDY0NSI7czo2OiJzZXJ2ZXIiO3M6MzI6IjJlOWE0NjYzMzVmZTgzMzAxZTM0NjllZWRlOTJiNDUxIjt9czoxMzoidGVtcGxlZXQ0X2RvYyI7YTozOntzOjEwOiJzbmFwc2hvdGlkIjtzOjEyOiIyMDEzMDYyNDE3NDQiO3M6MTI6InNuYXBzaG90ZGF0ZSI7czoxMjoiMjAxMzA2MjQxNzQ0IjtzOjY6InNlcnZlciI7czozMjoiMmU5YTQ2NjMzNWZlODMzMDFlMzQ2OWVlZGU5MmI0NTEiO31zOjE2OiJ0ZW1wbGVldDRfZG9jX2ZyIjthOjM6e3M6MTA6InNuYXBzaG90aWQiO3M6MTI6IjIwMTMwNjI0MTc0NCI7czoxMjoic25hcHNob3RkYXRlIjtzOjEyOiIyMDEzMDYyNDE3NDQiO3M6Njoic2VydmVyIjtzOjMyOiIyZTlhNDY2MzM1ZmU4MzMwMWUzNDY5ZWVkZTkyYjQ1MSI7fXM6MTY6InRlbXBsZWV0NF9taW5pZnkiO2E6Mzp7czoxMDoic25hcHNob3RpZCI7czoxMjoiMjAxMzA2MjQxNzI5IjtzOjEyOiJzbmFwc2hvdGRhdGUiO3M6MTI6IjIwMTMwNjI0MTcyOSI7czo2OiJzZXJ2ZXIiO3M6MzI6IjJlOWE0NjYzMzVmZTgzMzAxZTM0NjllZWRlOTJiNDUxIjt9czo3OiJJTlNUX2VuIjthOjM6e3M6MTA6InNuYXBzaG90aWQiO3M6MTI6IjIwMTEwMjI1MTMzNSI7czoxMjoic25hcHNob3RkYXRlIjtzOjEyOiIyMDExMDIyNTEzMzUiO3M6Njoic2VydmVyIjtzOjMyOiIyZTlhNDY2MzM1ZmU4MzMwMWUzNDY5ZWVkZTkyYjQ1MSI7fXM6NzoiSU5TVF9mciI7YTozOntzOjEwOiJzbmFwc2hvdGlkIjtzOjEyOiIyMDExMDIyNTEzMzUiO3M6MTI6InNuYXBzaG90ZGF0ZSI7czoxMjoiMjAxMTAyMjUxMzM1IjtzOjY6InNlcnZlciI7czozMjoiMmU5YTQ2NjMzNWZlODMzMDFlMzQ2OWVlZGU5MmI0NTEiO31zOjEzOiJwYWNrYWdlbWFzdGVyIjthOjM6e3M6MTA6InNuYXBzaG90aWQiO3M6MTI6IjIwMTYwNDI5MTAyMyI7czoxMjoic25hcHNob3RkYXRlIjtzOjEyOiIyMDE2MDQyOTEwMjMiO3M6Njoic2VydmVyIjtzOjMyOiIyZTlhNDY2MzM1ZmU4MzMwMWUzNDY5ZWVkZTkyYjQ1MSI7fX1zOjM6ImRlcCI7YTo5OntzOjQ6ImNvcmUiO3M6NzoiSU5TVDorOiI7czoxMDoicG9zdGdyZXNxbCI7czo3OiJJTlNUOis6IjtzOjE1OiJ0ZW1wbGVldDRfYWRtaW4iO3M6NzoiY29yZTpQOiI7czoxMzoidGVtcGxlZXQ0X2RvYyI7czoyNzoiY29yZTpQOg0KdGVtcGxlZXQ0X2FkbWluOlA6IjtzOjE2OiJ0ZW1wbGVldDRfZG9jX2ZyIjtzOjQ1OiJjb3JlOlA6DQp0ZW1wbGVldDRfYWRtaW46UDoNCnRlbXBsZWV0NF9kb2M6UDoiO3M6MTY6InRlbXBsZWV0NF9taW5pZnkiO3M6NzoiY29yZTpQOiI7czo3OiJJTlNUX2VuIjtzOjA6IiI7czo3OiJJTlNUX2ZyIjtzOjA6IiI7czoxMzoicGFja2FnZW1hc3RlciI7czo3OiJJTlNUOis6Ijt9czo1OiJncm91cCI7YToxOntzOjQ6IklOU1QiO2E6Mjp7czo3OiJJTlNUX2VuIjtzOjEyOiIyMDExMDIyNTEzMzUiO3M6NzoiSU5TVF9mciI7czoxMjoiMjAxMTAyMjUxMzM1Ijt9fX19"));
  
  if (isset($_GET['dumpcontent']))
    {
      print "<pre>";
      print_r($content_info);
      print "</pre>";
      exit();
    }

  if ((count($_GET)==0 || (count($_GET)==1 && isset($_GET['lang'])))&& count($_POST)==0)
      $file="index.html";
    else
      {
        $tmp=preg_replace("/(.*)_(.*?)$/","$1.$2",key($_GET));
        if (isset($content_info["instfiles"][$tmp]))
          $file=$tmp;
      } 
      
if (isset($file))
  {
    preg_match("/\.(.*?)$/",$file,$res);    
    $ext=$res[1];
    
    switch($ext)
      {
        case "html":
          header('Content-type: text/html');
          break;
        case "txt":
          header('Content-type: text/plain');
          break;
        case "gif":
          header('Content-type: image/gif');
          break;
        case "png":
          header('Content-type: image/png');
          break;
        case "jpg":
          header('Content-type: image/jpg');
          break;
          
      }

    $val=$content_info["instfiles"][$file];
    $fp = fopen(__FILE__, 'rb');
 
    fseek($fp, __COMPILER_HALT_OFFSET__+$val);

    $filename=fgets($fp);
    $tmp=unpack("V",fread($fp,4));
    $content = fread($fp, $tmp[1]);
    
    if ($ext=="html" || $ext=="txt" ||$ext=="js")
      {
        $langs=array_flip(explode(",","en,fr"));  
   
        if (!isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
            $accepted="";
          else
            $accepted=$_SERVER['HTTP_ACCEPT_LANGUAGE'];
    
        $lang="";  
        if (isset($_GET['lang']) && isset($langs[$_GET['lang']]))
          $lang=$_GET['lang'];
  
        $accepted = explode(',',$accepted);
        reset($accepted);
        $acceptedlanguages="";
        while (list(,$key) = each($accepted)) 
          {
            list($lg)=explode(";",$key);
            $lg=substr($lg,0,2);
            if (isset($langs[$lg]) && $lang=="")
              $lang=$lg;
            $acceptedlanguages.=",$lg";  
          }
      
        if ($lang=="" && isset($langs["en"]))
          $lang="en";
          
        if ($lang=="")
          {
            reset($langs);
            $lang=key($langs);
          }

        if (strlen($acceptedlanguages)>0)  
          $acceptedlanguages=substr($acceptedlanguages,1);
        
        $content=preg_replace(array("/&LANG&/","/&ACCEPTEDLANGUAGES&/"),
                              array($lang,$acceptedlanguages),
                              $content);    

      }
    print $content;

    exit;
  }

switchaction();

 
function switchaction()
{  global $installer_key,$action,$checkparam_keys,$content_info;
   $checkparam_keys=array("0000","010_core_01","010_core_02","010_core_03","010_core_04","010_core_11","010_core_12","010_core_13","010_core_14","010_packagemaster_02","011_postgresql_11","011_postgresql_12","writeextractcode");
    if (isset($_REQUEST['action']))
        $action=$_REQUEST['action'];
      else
        $action="";      
    $installerkey=substr(@file_get_contents("installerkey.php"),6);          
    if (!preg_match("/^(?:pre|cp)_.+$/",$action) && 
         (
           !isset($_REQUEST["key"]) || empty($installerkey) || $_REQUEST["key"]!=$installerkey
         )  
       )
      {
        print "error|bad key";
        exit(0);
      } 
  
    if (preg_match("/^cp_/",$action) && $action!="cp_0000" && !phpcheckkey($_REQUEST["key"]))
      {
        print "error|bad key";
        exit(0);
      }     switch($action)
      {
                case 'cp_writeextractcode':
          $val=$content_info["instfiles"]['extractor.txt'];
          $fp = fopen(__FILE__, 'rb');
       
          fseek($fp, __COMPILER_HALT_OFFSET__+$val);
      
          $filename=fgets($fp);
          $tmp=unpack("V",fread($fp,4));
          $content = fread($fp, $tmp[1]);
          $chars="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
          $l=strlen($chars)-1;
          $out='';
          for($i=0; $i<20; $i++) 
            $out.=$chars[mt_rand(0,$l)];
####
          file_put_contents("installerkey.php","<?php ".$out);  
#          file_put_contents("installerkey.php","<?php ".$out);  

          $content=str_replace(array(
                                  "&KEY&",
                                  "&FILESBEGIN&",
                                  "&FILE&",
                                  "&UPDATE&",
                                  "&"."NOCOMPRESS&",
                                  "&KEEPFILE&",
                                  "&UPDATED&",
                                  "&EXTRACTED&",
                                  "&NOTRESTORED&",
                                  "&UNCHANGED&",
                                  "&UNLINKED&"),
                                array(
                                  $out,
                                  $content_info['files_begin']+__COMPILER_HALT_OFFSET__,
                                  addslashes(__FILE__),
                                  $_REQUEST["update"],
                                  0,
                                  $_REQUEST["keepfile"],
                                  $_REQUEST["updated"],
                                  $_REQUEST["extracted"],
                                  $_REQUEST["notrestored"],
                                  $_REQUEST["unchanged"],
                                  $_REQUEST["unlinked"]
                                  ),
                                $content);
          
          file_put_contents("extractor.php",$content);
          print "ok|".$out;
          break;
                  case 'endextractcode':
//          @unlink('./templeet/FILES.SIGN');
//          copy('./templeet/FILES.SIGN.tmp','./templeet/FILES.SIGN');
//          @unlink('./templeet/FILES.SIGN.tmp');
//         
          print "ok|";
          break;
          
        case 'endinstall':
          @unlink("installerkey.php");
          print "ok|";
          break;
      case 'pre_001_packagemaster_01':
        pre_001_packagemaster_01();
        break;
      case 'pre_001_packagemaster_02':
        pre_001_packagemaster_02();
        break;
      case 'pre_001_packagemaster_11':
        pre_001_packagemaster_11();
        break;
      case 'pre_010_core_10':
        pre_010_core_10();
        break;
      case 'pre_010_core_12':
        pre_010_core_12();
        break;
      case 'pre_010_core_30':
        pre_010_core_30();
        break;
      case 'cp_0000':
        global $installer_key;
        cp_0000();
        break;
      case 'cp_010_core_01':
        global $installer_key;
        cp_010_core_01();
        break;
      case 'cp_010_core_02':
        global $installer_key;
        cp_010_core_02();
        break;
      case 'cp_010_core_03':
        global $installer_key;
        cp_010_core_03();
        break;
      case 'cp_010_core_04':
        global $installer_key;
        cp_010_core_04();
        break;
      case 'cp_010_core_11':
        global $installer_key;
        cp_010_core_11();
        break;
      case 'cp_010_core_12':
        global $installer_key;
        cp_010_core_12();
        break;
      case 'cp_010_core_13':
        global $installer_key;
        cp_010_core_13();
        break;
      case 'cp_010_core_14':
        global $installer_key;
        cp_010_core_14();
        break;
      case 'cp_010_packagemaster_02':
        global $installer_key;
        cp_010_packagemaster_02();
        break;
      case 'cp_011_postgresql_11':
        global $installer_key;
        cp_011_postgresql_11();
        break;
      case 'cp_011_postgresql_12':
        global $installer_key;
        cp_011_postgresql_12();
        break;
      case 'post_000_packagemaster_01':
        post_000_packagemaster_01();
        break;
      case 'post_010_core_01':
        post_010_core_01();
        break;
      case 'post_010_core_12':
        post_010_core_12();
        break;
      case 'post_010_core_54':
        post_010_core_54();
        break;
      case 'post_010_core_62':
        post_010_core_62();
        break;
      case 'post_010_core_64':
        post_010_core_64();
        break;
      case 'post_011_core_62':
        post_011_core_62();
        break;
      case 'post_011_core_64':
        post_011_core_64();
        break;
      case 'post_020_core_60':
        post_020_core_60();
        break;
      case 'post_020_core_66':
        post_020_core_66();
        break;
      case 'post_100_templeet4_minify_50':
        post_100_templeet4_minify_50();
        break;
      case 'post_500_packagemaster_80':
        post_500_packagemaster_80();
        break;
      case 'post_600_core_10':
        post_600_core_10();
        break;
      case 'post_600_postgresql_10':
        post_600_postgresql_10();
        break;
      default:
        echo "error: bad action:$action)<pre>".print_r($_REQUEST,TRUE)."</pre>";
        break;
  }
}
/* lib */

function writetestfile($filename,$var,$fileres,$regex,$replace)
{
  $export_regex=var_export($regex,TRUE);
  $export_replace=var_export($replace,TRUE);
  
  if (preg_match('/cgi/i',php_sapi_name()))
      $header="header('Status: 200');";
    else
      $header="header('HTTP/1.0 200');";  

  $textfile=<<<EOF
<?php

  
  $header

  \$server_vars=array();  
  reset(\$_SERVER);
  while(list(\$name,\$value)=each(\$_SERVER))
    {
      \$server_vars[\$name]=preg_replace($export_regex,$export_replace,\$value);      
    }
  
  \$text='<?php\n$var='.var_export(\$server_vars,TRUE).';\n\$post='.var_export(\$_POST,TRUE).';\n';

  ini_set('track_errors','1');
 
  \$file='$fileres';
  if (!\$fp=@fopen(\$file,"wb"))
    {
      print "error: error writing \$file : \$php_errormsg";
      exit;
    }
  fwrite(\$fp,\$text);
  fclose(\$fp);
  
  \$out="ok|";
    
  if (isset(\$_POST["param"]))
    \$out.=\$_POST["param"];

  \$length=strlen(\$out);
  header("Content-Length: \$length");

  print \$out;
EOF;

  if (!$fp=fopen($filename,'wb'))
    {
      print "error: error writing $filename";
      exit;
    }
  fwrite($fp,$textfile);
  fclose($fp);
      
}
function gettempleettestdir() {
  return 'templeet/test/';
}
function timezones()
{
  return array(
"Africa/Abidjan",
"Africa/Accra",
"Africa/Addis_Ababa",
"Africa/Algiers",
"Africa/Asmara",
"Africa/Asmera",
"Africa/Bamako",
"Africa/Bangui",
"Africa/Banjul",
"Africa/Bissau",
"Africa/Blantyre",
"Africa/Brazzaville",
"Africa/Bujumbura",
"Africa/Cairo",
"Africa/Casablanca",
"Africa/Ceuta",
"Africa/Conakry",
"Africa/Dakar",
"Africa/Dar_es_Salaam",
"Africa/Djibouti",
"Africa/Douala",
"Africa/El_Aaiun",
"Africa/Freetown",
"Africa/Gaborone",
"Africa/Harare",
"Africa/Johannesburg",
"Africa/Kampala",
"Africa/Khartoum",
"Africa/Kigali",
"Africa/Kinshasa",
"Africa/Lagos",
"Africa/Libreville",
"Africa/Lome",
"Africa/Luanda",
"Africa/Lubumbashi",
"Africa/Lusaka",
"Africa/Malabo",
"Africa/Maputo",
"Africa/Maseru",
"Africa/Mbabane",
"Africa/Mogadishu",
"Africa/Monrovia",
"Africa/Nairobi",
"Africa/Ndjamena",
"Africa/Niamey",
"Africa/Nouakchott",
"Africa/Ouagadougou",
"Africa/Porto-Novo",
"Africa/Sao_Tome",
"Africa/Timbuktu",
"Africa/Tripoli",
"Africa/Tunis",
"Africa/Windhoek",
"America/Adak",
"America/Anchorage",
"America/Anguilla",
"America/Antigua",
"America/Araguaina",
"America/Argentina/Buenos_Aires",
"America/Argentina/Catamarca",
"America/Argentina/ComodRivadavia",
"America/Argentina/Cordoba",
"America/Argentina/Jujuy",
"America/Argentina/La_Rioja",
"America/Argentina/Mendoza",
"America/Argentina/Rio_Gallegos",
"America/Argentina/Salta",
"America/Argentina/San_Juan",
"America/Argentina/San_Luis",
"America/Argentina/Tucuman",
"America/Argentina/Ushuaia",
"America/Aruba",
"America/Asuncion",
"America/Atikokan",
"America/Atka",
"America/Bahia",
"America/Bahia_Banderas",
"America/Barbados",
"America/Belem",
"America/Belize",
"America/Blanc-Sablon",
"America/Boa_Vista",
"America/Bogota",
"America/Boise",
"America/Buenos_Aires",
"America/Cambridge_Bay",
"America/Campo_Grande",
"America/Cancun",
"America/Caracas",
"America/Catamarca",
"America/Cayenne",
"America/Cayman",
"America/Chicago",
"America/Chihuahua",
"America/Coral_Harbour",
"America/Cordoba",
"America/Costa_Rica",
"America/Cuiaba",
"America/Curacao",
"America/Danmarkshavn",
"America/Dawson",
"America/Dawson_Creek",
"America/Denver",
"America/Detroit",
"America/Dominica",
"America/Edmonton",
"America/Eirunepe",
"America/El_Salvador",
"America/Ensenada",
"America/Fort_Wayne",
"America/Fortaleza",
"America/Glace_Bay",
"America/Godthab",
"America/Goose_Bay",
"America/Grand_Turk",
"America/Grenada",
"America/Guadeloupe",
"America/Guatemala",
"America/Guayaquil",
"America/Guyana",
"America/Halifax",
"America/Havana",
"America/Hermosillo",
"America/Indiana/Indianapolis",
"America/Indiana/Knox",
"America/Indiana/Marengo",
"America/Indiana/Petersburg",
"America/Indiana/Tell_City",
"America/Indiana/Vevay",
"America/Indiana/Vincennes",
"America/Indiana/Winamac",
"America/Indianapolis",
"America/Inuvik",
"America/Iqaluit",
"America/Jamaica",
"America/Jujuy",
"America/Juneau",
"America/Kentucky/Louisville",
"America/Kentucky/Monticello",
"America/Knox_IN",
"America/La_Paz",
"America/Lima",
"America/Los_Angeles",
"America/Louisville",
"America/Maceio",
"America/Managua",
"America/Manaus",
"America/Marigot",
"America/Martinique",
"America/Matamoros",
"America/Mazatlan",
"America/Mendoza",
"America/Menominee",
"America/Merida",
"America/Mexico_City",
"America/Miquelon",
"America/Moncton",
"America/Monterrey",
"America/Montevideo",
"America/Montreal",
"America/Montserrat",
"America/Nassau",
"America/New_York",
"America/Nipigon",
"America/Nome",
"America/Noronha",
"America/North_Dakota/Beulah",
"America/North_Dakota/Center",
"America/North_Dakota/New_Salem",
"America/Ojinaga",
"America/Panama",
"America/Pangnirtung",
"America/Paramaribo",
"America/Phoenix",
"America/Port-au-Prince",
"America/Port_of_Spain",
"America/Porto_Acre",
"America/Porto_Velho",
"America/Puerto_Rico",
"America/Rainy_River",
"America/Rankin_Inlet",
"America/Recife",
"America/Regina",
"America/Resolute",
"America/Rio_Branco",
"America/Rosario",
"America/Santa_Isabel",
"America/Santarem",
"America/Santiago",
"America/Santo_Domingo",
"America/Sao_Paulo",
"America/Scoresbysund",
"America/Shiprock",
"America/St_Barthelemy",
"America/St_Johns",
"America/St_Kitts",
"America/St_Lucia",
"America/St_Thomas",
"America/St_Vincent",
"America/Swift_Current",
"America/Tegucigalpa",
"America/Thule",
"America/Thunder_Bay",
"America/Tijuana",
"America/Toronto",
"America/Tortola",
"America/Vancouver",
"America/Virgin",
"America/Whitehorse",
"America/Winnipeg",
"America/Yakutat",
"America/Yellowknife",
"Antarctica/Casey",
"Antarctica/Davis",
"Antarctica/DumontDUrville",
"Antarctica/Macquarie",
"Antarctica/Mawson",
"Antarctica/McMurdo",
"Antarctica/Palmer",
"Antarctica/Rothera",
"Antarctica/South_Pole",
"Antarctica/Syowa",
"Antarctica/Vostok",
"Arctic/Longyearbyen",
"Asia/Aden",
"Asia/Almaty",
"Asia/Amman",
"Asia/Anadyr",
"Asia/Aqtau",
"Asia/Aqtobe",
"Asia/Ashgabat",
"Asia/Ashkhabad",
"Asia/Baghdad",
"Asia/Bahrain",
"Asia/Baku",
"Asia/Bangkok",
"Asia/Beirut",
"Asia/Bishkek",
"Asia/Brunei",
"Asia/Calcutta",
"Asia/Choibalsan",
"Asia/Chongqing",
"Asia/Chungking",
"Asia/Colombo",
"Asia/Dacca",
"Asia/Damascus",
"Asia/Dhaka",
"Asia/Dili",
"Asia/Dubai",
"Asia/Dushanbe",
"Asia/Gaza",
"Asia/Harbin",
"Asia/Ho_Chi_Minh",
"Asia/Hong_Kong",
"Asia/Hovd",
"Asia/Irkutsk",
"Asia/Istanbul",
"Asia/Jakarta",
"Asia/Jayapura",
"Asia/Jerusalem",
"Asia/Kabul",
"Asia/Kamchatka",
"Asia/Karachi",
"Asia/Kashgar",
"Asia/Kathmandu",
"Asia/Katmandu",
"Asia/Kolkata",
"Asia/Krasnoyarsk",
"Asia/Kuala_Lumpur",
"Asia/Kuching",
"Asia/Kuwait",
"Asia/Macao",
"Asia/Macau",
"Asia/Magadan",
"Asia/Makassar",
"Asia/Manila",
"Asia/Muscat",
"Asia/Nicosia",
"Asia/Novokuznetsk",
"Asia/Novosibirsk",
"Asia/Omsk",
"Asia/Oral",
"Asia/Phnom_Penh",
"Asia/Pontianak",
"Asia/Pyongyang",
"Asia/Qatar",
"Asia/Qyzylorda",
"Asia/Rangoon",
"Asia/Riyadh",
"Asia/Saigon",
"Asia/Sakhalin",
"Asia/Samarkand",
"Asia/Seoul",
"Asia/Shanghai",
"Asia/Singapore",
"Asia/Taipei",
"Asia/Tashkent",
"Asia/Tbilisi",
"Asia/Tehran",
"Asia/Tel_Aviv",
"Asia/Thimbu",
"Asia/Thimphu",
"Asia/Tokyo",
"Asia/Ujung_Pandang",
"Asia/Ulaanbaatar",
"Asia/Ulan_Bator",
"Asia/Urumqi",
"Asia/Vientiane",
"Asia/Vladivostok",
"Asia/Yakutsk",
"Asia/Yekaterinburg",
"Asia/Yerevan",
"Atlantic/Azores",
"Atlantic/Bermuda",
"Atlantic/Canary",
"Atlantic/Cape_Verde",
"Atlantic/Faeroe",
"Atlantic/Faroe",
"Atlantic/Jan_Mayen",
"Atlantic/Madeira",
"Atlantic/Reykjavik",
"Atlantic/South_Georgia",
"Atlantic/St_Helena",
"Atlantic/Stanley",
"Australia/ACT",
"Australia/Adelaide",
"Australia/Brisbane",
"Australia/Broken_Hill",
"Australia/Canberra",
"Australia/Currie",
"Australia/Darwin",
"Australia/Eucla",
"Australia/Hobart",
"Australia/LHI",
"Australia/Lindeman",
"Australia/Lord_Howe",
"Australia/Melbourne",
"Australia/North",
"Australia/NSW",
"Australia/Perth",
"Australia/Queensland",
"Australia/South",
"Australia/Sydney",
"Australia/Tasmania",
"Australia/Victoria",
"Australia/West",
"Australia/Yancowinna",
"Brazil/Acre",
"Brazil/DeNoronha",
"Brazil/East",
"Brazil/West",
"Canada/Atlantic",
"Canada/Central",
"Canada/East-Saskatchewan",
"Canada/Eastern",
"Canada/Mountain",
"Canada/Newfoundland",
"Canada/Pacific",
"Canada/Saskatchewan",
"Canada/Yukon",
"CET",
"Chile/Continental",
"Chile/EasterIsland",
"CST6CDT",
"Cuba",
"EET",
"Egypt",
"Eire",
"EST",
"EST5EDT",
"Etc/GMT",
"Etc/GMT+0",
"Etc/GMT+1",
"Etc/GMT+10",
"Etc/GMT+11",
"Etc/GMT+12",
"Etc/GMT+2",
"Etc/GMT+3",
"Etc/GMT+4",
"Etc/GMT+5",
"Etc/GMT+6",
"Etc/GMT+7",
"Etc/GMT+8",
"Etc/GMT+9",
"Etc/GMT-0",
"Etc/GMT-1",
"Etc/GMT-10",
"Etc/GMT-11",
"Etc/GMT-12",
"Etc/GMT-13",
"Etc/GMT-14",
"Etc/GMT-2",
"Etc/GMT-3",
"Etc/GMT-4",
"Etc/GMT-5",
"Etc/GMT-6",
"Etc/GMT-7",
"Etc/GMT-8",
"Etc/GMT-9",
"Etc/GMT0",
"Etc/Greenwich",
"Etc/UCT",
"Etc/Universal",
"Etc/UTC",
"Etc/Zulu",
"Europe/Amsterdam",
"Europe/Andorra",
"Europe/Athens",
"Europe/Belfast",
"Europe/Belgrade",
"Europe/Berlin",
"Europe/Bratislava",
"Europe/Brussels",
"Europe/Bucharest",
"Europe/Budapest",
"Europe/Chisinau",
"Europe/Copenhagen",
"Europe/Dublin",
"Europe/Gibraltar",
"Europe/Guernsey",
"Europe/Helsinki",
"Europe/Isle_of_Man",
"Europe/Istanbul",
"Europe/Jersey",
"Europe/Kaliningrad",
"Europe/Kiev",
"Europe/Lisbon",
"Europe/Ljubljana",
"Europe/London",
"Europe/Luxembourg",
"Europe/Madrid",
"Europe/Malta",
"Europe/Mariehamn",
"Europe/Minsk",
"Europe/Monaco",
"Europe/Moscow",
"Europe/Nicosia",
"Europe/Oslo",
"Europe/Paris",
"Europe/Podgorica",
"Europe/Prague",
"Europe/Riga",
"Europe/Rome",
"Europe/Samara",
"Europe/San_Marino",
"Europe/Sarajevo",
"Europe/Simferopol",
"Europe/Skopje",
"Europe/Sofia",
"Europe/Stockholm",
"Europe/Tallinn",
"Europe/Tirane",
"Europe/Tiraspol",
"Europe/Uzhgorod",
"Europe/Vaduz",
"Europe/Vatican",
"Europe/Vienna",
"Europe/Vilnius",
"Europe/Volgograd",
"Europe/Warsaw",
"Europe/Zagreb",
"Europe/Zaporozhye",
"Europe/Zurich",
"Factory",
"GB",
"GB-Eire",
"GMT",
"GMT+0",
"GMT-0",
"GMT0",
"Greenwich",
"Hongkong",
"HST",
"Iceland",
"Indian/Antananarivo",
"Indian/Chagos",
"Indian/Christmas",
"Indian/Cocos",
"Indian/Comoro",
"Indian/Kerguelen",
"Indian/Mahe",
"Indian/Maldives",
"Indian/Mauritius",
"Indian/Mayotte",
"Indian/Reunion",
"Iran",
"Israel",
"Jamaica",
"Japan",
"Kwajalein",
"Libya",
"MET",
"Mexico/BajaNorte",
"Mexico/BajaSur",
"Mexico/General",
"MST",
"MST7MDT",
"Navajo",
"NZ",
"NZ-CHAT",
"Pacific/Apia",
"Pacific/Auckland",
"Pacific/Chatham",
"Pacific/Chuuk",
"Pacific/Easter",
"Pacific/Efate",
"Pacific/Enderbury",
"Pacific/Fakaofo",
"Pacific/Fiji",
"Pacific/Funafuti",
"Pacific/Galapagos",
"Pacific/Gambier",
"Pacific/Guadalcanal",
"Pacific/Guam",
"Pacific/Honolulu",
"Pacific/Johnston",
"Pacific/Kiritimati",
"Pacific/Kosrae",
"Pacific/Kwajalein",
"Pacific/Majuro",
"Pacific/Marquesas",
"Pacific/Midway",
"Pacific/Nauru",
"Pacific/Niue",
"Pacific/Norfolk",
"Pacific/Noumea",
"Pacific/Pago_Pago",
"Pacific/Palau",
"Pacific/Pitcairn",
"Pacific/Pohnpei",
"Pacific/Ponape",
"Pacific/Port_Moresby",
"Pacific/Rarotonga",
"Pacific/Saipan",
"Pacific/Samoa",
"Pacific/Tahiti",
"Pacific/Tarawa",
"Pacific/Tongatapu",
"Pacific/Truk",
"Pacific/Wake",
"Pacific/Wallis",
"Pacific/Yap",
"Poland",
"Portugal",
"PRC",
"PST8PDT",
"ROC",
"ROK",
"Singapore",
"Turkey",
"UCT",
"Universal",
"US/Alaska",
"US/Aleutian",
"US/Arizona",
"US/Central",
"US/East-Indiana",
"US/Eastern",
"US/Hawaii",
"US/Indiana-Starke",
"US/Michigan",
"US/Mountain",
"US/Pacific",
"US/Pacific-New",
"US/Samoa",
"UTC",
"W-SU",
"WET",
"Zulu");
}Function debug_print_r($var){
        
        $numargs = func_num_args();
        $arg_list = func_get_args();
        for ($i = 0; $i < $numargs; $i++) 
          {
            if (is_array($arg_list[$i]) || is_object($arg_list[$i]))
                {
                  print_r($arg_list[$i]);
                }
              else
                {
                  print $arg_list[$i];
                }  
          }   
        return "";
}
 Function sortmodules($a,$b)
{
  $noslasha=(strstr($a,"/")===FALSE);
  $noslashb=(strstr($b,"/")===FALSE);
  if ($noslasha && !$noslashb) return -1;
  if (!$noslasha && $noslashb) return 1;

  return (strlen($a)<strlen($b)?-1:1);
}

Function getpost()
{
  return "";
}
Function testfile($file)
{
  $tmp = strrpos($file,'.');
  if (substr($file,($tmp+1)) != 'php') 
    return 0; //"not a PHP file"
    
  $rfile = substr($file,0,$tmp);
  include('templeet/modules/'.$file);
  $p = preg_replace('/.*\//','',$rfile).'_return';
  if (!function_exists($p)) 
    return 1; // "Library"

  $array_tmp = $p();

  $res=array();
  while(list(,$b) = each ($array_tmp)) {
    $res[strtolower($b)] = $rfile;
  }
  
  return $res; // "Module"
}
Function templeet_rename($oldname,$newname) {
  if (getenv("WINDIR")!="")
    @unlink($newname);
  
  return @rename($oldname,$newname);
}

function pre_001_packagemaster_01()
  {
    
global $content_info;

$msg="";
$registry=$content_info['registry'];

if (!is_array($registry))
  {
    print "error|error reading registry";
    exit();
  }

foreach ($registry['dists'] as $dist => $distinfo)
  {
    if (isset($registry['installpackage'][$dist]))
      {
/*        $msg.="<tr><td>".htmlentities($dist)."</td><td>";
        if ($distinfo['snapshotid']==$distinfo['snapshotdate'])
            $msg.="</td><td>".$distinfo['snapshotdate']."</td></tr>";
          else      
            $msg.=htmlentities($distinfo['snapshotid'])."</td><td>".$distinfo['snapshotdate']."</td></tr>";
*/


        $msg.="|".htmlentities($dist);
        if ($distinfo['snapshotid']==$distinfo['snapshotdate'])
            $msg.=",,".$distinfo['snapshotdate'];
          else      
            $msg.=",".htmlentities($distinfo['snapshotid']).",".$distinfo['snapshotdate'];
      }
      
  }  
  
//print "ok|".$msg;
print "ok".$msg;

  }   
function pre_001_packagemaster_02()
  {
    
global $content_info;
$ok=1;
if (!defined('PHP_VERSION_ID')) {
    $version = explode('.', PHP_VERSION);

    define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
}

$msg=PHP_VERSION."|";
if (function_exists("gzuncompress"))
    $msg.="zlibenabled|";
  else  
    {
      $msg.="zlibdisabled|";
      global $nocompress;
      if (!$nocompress)
        $ok=0;
    }  

if (is_file("templeet/registry.php") && !file_exists("force_install.txt"))
    {
      $registry=@unserialize(substr(file_get_contents("templeet/registry.php"),8));
      if (!is_array($registry))
        {
          print "error|badregistry";
          exit();
        }
      
      $update=1;
      foreach($content_info['registry']['dists'] as $distname => $value)
        {
          if (!preg_match("/^INST_/",$distname) && $distname!="packagemaster" && !isset($registry['dists'][$distname]))
            {
              $update=0;
              break;
            }
        }
    }
  else
    $update=0;    

if ($update)
    $msg.="update|";
  else
    $msg.="install|";
    
if (PHP_VERSION_ID<50100)
    {
      $ok=0;
      $msg.="phpnotok|";
    }
  else
    $msg.="phpok|";
    
if ($ok)  
    print "ok|".$msg;
  else  
    print "error|".$msg;


  }   
function pre_001_packagemaster_11()
  {
    

global $content_info;
$ok=1;
$msg="";

$registry=@unserialize(substr(file_get_contents("templeet/registry.php"),8));
if (!is_array($registry))
  {
    print "error|badregistry";
    exit();
  }

$package_dep=$content_info["registry"]["dep"];
$package_group=(isset($content_info["registry"]["group"])?$content_info["registry"]["group"]:array());
$installed_dep=$registry["dep"];
$installed_group=$registry["group"];
$report=array();

foreach($package_dep as $package => $dependencies)
  {
    if ($package=="packagemaster" || substr($package,0,5)=="INST_")
      continue;
      
    if (empty($dependencies))
        $report[$package]=1; // no dependency for package $package
      else
        {
        
          $msg.="<pre>dependencies:\n";  
          $msg.=print_r($dependencies,TRUE)."</pre>";
          if (!is_array($dependencies))
            $dependencies=array($dependencies);
          
          foreach($dependencies as $dependency)
            {
              $res=explode(":",$dependency);
              
              $name=$res[0];
              $type=$res[1];
              $snapshotdate=$res[2];
              if (isset($res[3]))
                  $snapshotid=$res[3];
                else
                  $snapshotid="";
              switch($type)
                {
                  case "P":
                    
                    break;
                  case "+":
                    
                    break;
                  case "1":
                    break;
                  default:
      //              print "type:$type==\n";
      //              print "error|baddep";
      //              exit();
                }
            }
        
        
        
        
        
        
        }
          
    
      
  }


$msg.="<pre>";
$msg.=print_r($content_info["registry"],TRUE);
$msg.=print_r($registry,TRUE);
$msg.=print_r($report,TRUE);
$msg.="</pre>";


  
if ($ok)  
    print "ok|".$msg;
  else  
    print "error|".$msg;

  }   
function pre_010_core_10()
  {
    

$unix_locales=array(
"aa_DJ.UTF-8",
"aa_DJ",
"aa_ER",
"aa_ER@saaho",
"aa_ET",
"af_ZA.UTF-8",
"af_ZA",
"am_ET",
"an_ES.UTF-8",
"an_ES",
"ar_AE.UTF-8",
"ar_AE",
"ar_BH.UTF-8",
"ar_BH",
"ar_DZ.UTF-8",
"ar_DZ",
"ar_EG.UTF-8",
"ar_EG",
"ar_IN",
"ar_IQ.UTF-8",
"ar_IQ",
"ar_JO.UTF-8",
"ar_JO",
"ar_KW.UTF-8",
"ar_KW",
"ar_LB.UTF-8",
"ar_LB",
"ar_LY.UTF-8",
"ar_LY",
"ar_MA.UTF-8",
"ar_MA",
"ar_OM.UTF-8",
"ar_OM",
"ar_QA.UTF-8",
"ar_QA",
"ar_SA.UTF-8",
"ar_SA",
"ar_SD.UTF-8",
"ar_SD",
"ar_SY.UTF-8",
"ar_SY",
"ar_TN.UTF-8",
"ar_TN",
"ar_YE.UTF-8",
"ar_YE",
"az_AZ.UTF-8",
"as_IN.UTF-8",
"ast_ES.UTF-8",
"ast_ES",
"be_BY.UTF-8",
"be_BY",
"be_BY@latin",
"ber_DZ",
"ber_MA",
"bg_BG.UTF-8",
"bg_BG",
"bn_BD",
"bn_IN",
"br_FR.UTF-8",
"br_FR",
"br_FR@euro",
"bs_BA.UTF-8",
"bs_BA",
"byn_ER",
"ca_AD.UTF-8",
"ca_AD",
"ca_ES.UTF-8",
"ca_ES",
"ca_ES@euro",
"ca_ES.UTF-8@valencia",
"ca_ES@valencia",
"ca_FR.UTF-8",
"ca_FR",
"ca_IT.UTF-8",
"ca_IT",
"crh_UA",
"cs_CZ.UTF-8",
"cs_CZ",
"csb_PL",
"cy_GB.UTF-8",
"cy_GB",
"da_DK.UTF-8",
"da_DK",
"da_DK.ISO-8859-15",
"de_AT.UTF-8",
"de_AT",
"de_AT@euro",
"de_BE.UTF-8",
"de_BE",
"de_BE@euro",
"de_CH.UTF-8",
"de_CH",
"de_DE.UTF-8",
"de_DE",
"de_DE@euro",
"de_LI.UTF-8",
"de_LU.UTF-8",
"de_LU",
"de_LU@euro",
"dz_BT",
"el_GR.UTF-8",
"el_GR",
"el_CY.UTF-8",
"el_CY",
"en_AU.UTF-8",
"en_AU",
"en_BW.UTF-8",
"en_BW",
"en_CA.UTF-8",
"en_CA",
"en_DK.UTF-8",
"en_DK.ISO-8859-15",
"en_DK",
"en_GB.UTF-8",
"en_GB",
"en_GB.ISO-8859-15",
"en_HK.UTF-8",
"en_HK",
"en_IE.UTF-8",
"en_IE",
"en_IE@euro",
"en_IN",
"en_NG",
"en_NZ.UTF-8",
"en_NZ",
"en_PH.UTF-8",
"en_PH",
"en_SG.UTF-8",
"en_SG",
"en_US.UTF-8",
"en_US",
"en_US.ISO-8859-15",
"en_ZA.UTF-8",
"en_ZA",
"en_ZW.UTF-8",
"en_ZW",
"eo.UTF-8",
"eo",
"es_AR.UTF-8",
"es_AR",
"es_BO.UTF-8",
"es_BO",
"es_CL.UTF-8",
"es_CL",
"es_CO.UTF-8",
"es_CO",
"es_CR.UTF-8",
"es_CR",
"es_DO.UTF-8",
"es_DO",
"es_EC.UTF-8",
"es_EC",
"es_ES.UTF-8",
"es_ES",
"es_ES@euro",
"es_GT.UTF-8",
"es_GT",
"es_HN.UTF-8",
"es_HN",
"es_MX.UTF-8",
"es_MX",
"es_NI.UTF-8",
"es_NI",
"es_PA.UTF-8",
"es_PA",
"es_PE.UTF-8",
"es_PE",
"es_PR.UTF-8",
"es_PR",
"es_PY.UTF-8",
"es_PY",
"es_SV.UTF-8",
"es_SV",
"es_US.UTF-8",
"es_US",
"es_UY.UTF-8",
"es_UY",
"es_VE.UTF-8",
"es_VE",
"et_EE.UTF-8",
"et_EE",
"et_EE.ISO-8859-15",
"eu_ES.UTF-8",
"eu_ES",
"eu_ES@euro",
"eu_FR.UTF-8",
"eu_FR",
"eu_FR@euro",
"fa_IR",
"fi_FI.UTF-8",
"fi_FI",
"fi_FI@euro",
"fil_PH",
"fo_FO.UTF-8",
"fo_FO",
"fr_BE.UTF-8",
"fr_BE",
"fr_BE@euro",
"fr_CA.UTF-8",
"fr_CA",
"fr_CH.UTF-8",
"fr_CH",
"fr_FR.UTF-8",
"fr_FR",
"fr_FR@euro",
"fr_LU.UTF-8",
"fr_LU",
"fr_LU@euro",
"fur_IT",
"fy_NL",
"fy_DE",
"ga_IE.UTF-8",
"ga_IE",
"ga_IE@euro",
"gd_GB.UTF-8",
"gd_GB",
"gez_ER",
"gez_ER@abegede",
"gez_ET",
"gez_ET@abegede",
"gl_ES.UTF-8",
"gl_ES",
"gl_ES@euro",
"gu_IN",
"gv_GB.UTF-8",
"gv_GB",
"ha_NG",
"he_IL.UTF-8",
"he_IL",
"hi_IN",
"hr_HR.UTF-8",
"hr_HR",
"hsb_DE.UTF-8",
"hsb_DE",
"hu_HU.UTF-8",
"hu_HU",
"hy_AM",
"hy_AM.ARMSCII-8",
"ia",
"id_ID.UTF-8",
"id_ID",
"ig_NG",
"ik_CA",
"is_IS.UTF-8",
"is_IS",
"it_CH.UTF-8",
"it_CH",
"it_IT.UTF-8",
"it_IT",
"it_IT@euro",
"iu_CA",
"iw_IL.UTF-8",
"iw_IL",
"ja_JP.UTF-8",
"ja_JP.EUC-JP",
"ka_GE.UTF-8",
"ka_GE",
"kk_KZ.UTF-8",
"kk_KZ",
"kl_GL.UTF-8",
"kl_GL",
"km_KH",
"kn_IN",
"ko_KR.UTF-8",
"ko_KR.EUC-KR",
"ks_IN",
"ku_TR.UTF-8",
"ku_TR",
"kw_GB.UTF-8",
"kw_GB",
"ky_KG",
"lg_UG.UTF-8",
"lg_UG",
"li_BE",
"li_NL",
"lo_LA",
"lt_LT.UTF-8",
"lt_LT",
"lv_LV.UTF-8",
"lv_LV",
"mai_IN",
"mg_MG.UTF-8",
"mg_MG",
"mi_NZ.UTF-8",
"mi_NZ",
"mk_MK.UTF-8",
"mk_MK",
"ml_IN",
"mn_MN",
"mr_IN",
"ms_MY.UTF-8",
"ms_MY",
"mt_MT.UTF-8",
"mt_MT",
"nb_NO.UTF-8",
"nb_NO",
"nds_DE",
"nds_NL",
"ne_NP",
"nl_BE.UTF-8",
"nl_BE",
"nl_BE@euro",
"nl_NL.UTF-8",
"nl_NL",
"nl_NL@euro",
"nn_NO.UTF-8",
"nn_NO",
"nr_ZA",
"nso_ZA",
"oc_FR.UTF-8",
"oc_FR",
"om_ET",
"om_KE.UTF-8",
"om_KE",
"or_IN",
"pa_IN",
"pa_PK",
"pap_AN",
"pl_PL.UTF-8",
"pl_PL",
"pt_BR.UTF-8",
"pt_BR",
"pt_PT.UTF-8",
"pt_PT",
"pt_PT@euro",
"ro_RO.UTF-8",
"ro_RO",
"ru_RU.UTF-8",
"ru_RU.KOI8-R",
"ru_RU",
"ru_RU.CP1251",
"ru_UA.UTF-8",
"ru_UA",
"rw_RW",
"sa_IN",
"sc_IT",
"se_NO",
"si_LK",
"sid_ET",
"sk_SK.UTF-8",
"sk_SK",
"sl_SI.UTF-8",
"sl_SI",
"so_DJ.UTF-8",
"so_DJ",
"so_ET",
"so_KE.UTF-8",
"so_KE",
"so_SO.UTF-8",
"so_SO",
"sq_AL.UTF-8",
"sq_AL",
"sr_ME",
"sr_RS",
"sr_RS@latin",
"ss_ZA",
"st_ZA.UTF-8",
"st_ZA",
"sv_FI.UTF-8",
"sv_FI",
"sv_FI@euro",
"sv_SE.UTF-8",
"sv_SE",
"sv_SE.ISO-8859-15",
"ta_IN",
"te_IN",
"tg_TJ.UTF-8",
"tg_TJ",
"th_TH.UTF-8",
"th_TH",
"ti_ER",
"ti_ET",
"tig_ER",
"tk_TM",
"tl_PH.UTF-8",
"tl_PH",
"tn_ZA",
"tr_CY.UTF-8",
"tr_CY",
"tr_TR.UTF-8",
"tr_TR",
"ts_ZA",
"tt_RU.UTF-8",
"tt_RU@iqtelif.UTF-8",
"ug_CN",
"uk_UA.UTF-8",
"uk_UA",
"ur_PK",
"uz_UZ.UTF-8",
"uz_UZ",
"uz_UZ@cyrillic",
"ve_ZA",
"vi_VN",
"vi_VN.TCVN",
"wa_BE.UTF-8",
"wa_BE",
"wa_BE@euro",
"wo_SN",
"xh_ZA.UTF-8",
"xh_ZA",
"yi_US.UTF-8",
"yi_US",
"yo_NG",
"zh_CN.UTF-8",
"zh_CN.GB18030",
"zh_CN.GBK",
"zh_CN",
"zh_HK.UTF-8",
"zh_HK",
"zh_SG.UTF-8",
"zh_SG.GBK",
"zh_SG",
"zh_TW.UTF-8",
"zh_TW",
"zh_TW.EUC-TW",
"zu_ZA.UTF-8",
"zu_ZA"
);


$windows_locales=array (
  'aa' => 'Afar',
  'ab' => 'Abkhazian',
  'ae' => 'Avestan',
  'af' => 'Afrikaans',
  'am' => 'Amharic',
  'ar' => 'Arabic',
  'as' => 'Assamese',
  'ay' => 'Aymara',
  'az' => 'Azerbaijani',
  'ba' => 'Bashkir',
  'be' => 'Belarusian',
  'bg' => 'Bulgarian',
  'bh' => 'Bihari',
  'bi' => 'Bislama',
  'bn' => 'Bengali',
  'bo' => 'Tibetan',
  'br' => 'Breton',
  'bs' => 'Bosnian',
  'ca' => 'Catalan',
  'ce' => 'Chechen',
  'ch' => 'Chamorro',
  'co' => 'Corsican',
  'cs' => 'Czech',
  'cu' => 'Church Slavic',
  'cv' => 'Chuvash',
  'cy' => 'Welsh',
  'da' => 'Danish',
  'de' => 'German',
  'dz' => 'Dzongkha',
  'el' => 'Greek',
  'en' => 'English',
  'eo' => 'Esperanto',
  'es' => 'Spanish',
  'et' => 'Estonian',
  'eu' => 'Basque',
  'fa' => 'Persian',
  'fi' => 'Finnish',
  'fj' => 'Fijian',
  'fo' => 'Faeroese',
  'fr' => 'French',
  'fy' => 'Frisian',
  'ga' => 'Irish',
  'gd' => 'Gaelic (Scots)',
  'gl' => 'Gallegan',
  'gn' => 'Guarani',
  'gu' => 'Gujarati',
  'gv' => 'Manx',
  'ha' => 'Hausa',
  'he' => 'Hebrew',
  'hi' => 'Hindi',
  'ho' => 'Hiri Motu',
  'hr' => 'Croatian',
  'hu' => 'Hungarian',
  'hy' => 'Armenian',
  'hz' => 'Herero',
  'ia' => 'Interlingua',
  'id' => 'Indonesian',
  'ie' => 'Interlingue',
  'ik' => 'Inupiaq',
  'is' => 'Icelandic',
  'it' => 'Italian',
  'iu' => 'Inuktitut',
  'ja' => 'Japanese',
  'jw' => 'Javanese',
  'ka' => 'Georgian',
  'ki' => 'Kikuyu',
  'kj' => 'Kuanyama',
  'kk' => 'Kazakh',
  'kl' => 'Kalaallisut',
  'km' => 'Khmer',
  'kn' => 'Kannada',
  'ko' => 'Korean',
  'ks' => 'Kashmiri',
  'ku' => 'Kurdish',
  'kv' => 'Komi',
  'kw' => 'Cornish',
  'ky' => 'Kirghiz',
  'la' => 'Latin',
  'lb' => 'Letzeburgesch',
  'ln' => 'Lingala',
  'lo' => 'Lao',
  'lt' => 'Lithuanian',
  'lv' => 'Latvian',
  'mg' => 'Malagasy',
  'mh' => 'Marshall',
  'mi' => 'Maori',
  'mk' => 'Macedonian',
  'ml' => 'Malayalam',
  'mn' => 'Mongolian',
  'mo' => 'Moldavian',
  'mr' => 'Marathi',
  'ms' => 'Malay',
  'mt' => 'Maltese',
  'my' => 'Burmese',
  'na' => 'Nauru',
  'nb' => 'Norwegian Bokmal',
  'nd' => 'Ndebele, North',
  'ne' => 'Nepali',
  'ng' => 'Ndonga',
  'nl' => 'Dutch',
  'nn' => 'Norwegian Nynorsk',
  'no' => 'Norwegian',
  'nr' => 'Ndebele, South',
  'nv' => 'Navajo',
  'ny' => 'Chichewa; Nyanja',
  'oc' => 'Occitan (post 1500)',
  'om' => 'Oromo',
  'or' => 'Oriya',
  'os' => 'Ossetian; Ossetic',
  'pa' => 'Panjabi',
  'pi' => 'Pali',
  'pl' => 'Polish',
  'ps' => 'Pushto',
  'pt' => 'Portuguese',
  'qu' => 'Quechua',
  'rm' => 'Rhaeto-Romance',
  'rn' => 'Rundi',
  'ro' => 'Romanian',
  'ru' => 'Russian',
  'rw' => 'Kinyarwanda',
  'sa' => 'Sanskrit',
  'sc' => 'Sardinian',
  'sd' => 'Sindhi',
  'se' => 'Sami',
  'sg' => 'Sango',
  'si' => 'Sinhalese',
  'sk' => 'Slovak',
  'sl' => 'Slovenian',
  'sm' => 'Samoan',
  'sn' => 'Shona',
  'so' => 'Somali',
  'sq' => 'Albanian',
  'sr' => 'Serbian',
  'ss' => 'Swati',
  'st' => 'Sotho',
  'su' => 'Sundanese',
  'sv' => 'Swedish',
  'sw' => 'Swahili',
  'ta' => 'Tamil',
  'te' => 'Telugu',
  'tg' => 'Tajik',
  'th' => 'Thai',
  'ti' => 'Tigrinya',
  'tk' => 'Turkmen',
  'tl' => 'Tagalog',
  'tn' => 'Tswana',
  'to' => 'Tonga',
  'tr' => 'Turkish',
  'ts' => 'Tsonga',
  'tt' => 'Tatar',
  'tw' => 'Twi',
  'ug' => 'Uighur',
  'uk' => 'Ukrainian',
  'ur' => 'Urdu',
  'uz' => 'Uzbek',
  'vn' => 'Vietnamese',
  'vo' => 'Volapuk',
  'wo' => 'Wolof',
  'xh' => 'Xhosa',
  'yi' => 'Yiddish',
  'yo' => 'Yoruba',
  'za' => 'Zhuang',
  'zh' => 'Chinese',
  'zu' => 'Zulu',
);

$windows=isset($_SERVER['WINDIR']);
if ($windows)
    {
      foreach($windows_locales as $lang => $locale)
        {
          if (setlocale(LC_ALL,$locale)!="")
            $supported_locales[$locale]=$lang;
        }
    }
  else
    {
      foreach($unix_locales as $locale)
        {
          preg_match("/^(\w\w)/",$locale,$res);
          $lang=$res[1];
          if (setlocale(LC_ALL,$locale)!="")
            $supported_locales[$locale]=$lang;
        }
    }  
    
$update=isset($_POST["update"]) && $_POST["update"]; 
if ($update)
    {
      include('templeet/serverconf.php');
      include('templeet/config.php');
      $current_locales="";
      foreach($config['locales'] as $lang => $locale)
        {
            $current_locales.=$lang.":".$locale."\n";
        }
    }
  else
    $current_locales="";  

      
$all_locales="";
foreach($supported_locales as $locale => $lang)
  {
    $all_locales.=$lang.":".$locale."\n";
  }
  
if ($windows)    
    $recom_locales=$all_locales;
  else
    {
      $tmp=array();
      foreach($supported_locales as $locale => $lang)
        {
          if (!isset($tmp[$lang]))
              $tmp[$lang]=$locale;
            else
              {
                if (!preg_match("/utf/i",$tmp[$lang]) && preg_match("/utf/i",$locale))
                  $tmp[$lang]=$locale;
              }  
        }
        
      $recom_locales="";  
      foreach($tmp as $lang => $locale)
        {
          $recom_locales.=$lang.":".$locale."\n";
        }
    }
    
print "ok|".$all_locales."|".$current_locales."|".$recom_locales;

  }   
function pre_010_core_12()
  {
    

$timezones=timezones();

$default=date_default_timezone_get();
$select='<select name="core_timezone" id="core_timezone">';
foreach($timezones as $tz)
  {
    $selected=($default==$tz?' selected="selected"':"");
    $select.='<option value="'.$tz.'" '.$selected.'>'.$tz.'</option>\n';
  }
$select.='</select>';

print "ok|".$select; 

  }   
function pre_010_core_30()
  {
    

if (!empty($_SERVER["SERVER_NAME"]))
  $host=$_SERVER["SERVER_NAME"];
elseif (!empty($_SERVER["HTTP_HOST"]))
  $host=$_SERVER["HTTP_HOST"];
else
  {
    print "error|error getting server name";
    exit(0);
  }
  
if (!empty($_SERVER["SCRIPT_FILENAME"]))
  {
    $dir=$_SERVER["SCRIPT_FILENAME"];
    if (!preg_match("/^(.*?)[^\\\\\/]*$/",$dir,$res))
      {
        print "error|error getting installation directory";
        exit(0);
      }
    $dir=$res[1].'templeet/vhosts/%HOST%.php';  
  }
else
  {
    print "error|error getting script name";
    exit(0);
  }
  
print "ok|".$host."|".$dir;

  }   
function cp_0000()
  {
    
print "ok|".getkey();
  }   
function cp_010_core_01()
  {
    
if (file_exists('templeet/serverconf.php') && !file_exists("force_install.txt"))
  {
    $pass=$_REQUEST["pass"];
    
    $ok=0;
    include("templeet/modules/auth/auth_file.php");
    $filehandle=new class_auth_file;
    $info=$filehandle->getinfo(array(0,"admin"));           
    if (!is_array($info))
      {
        print "ok|errorgettingpass";
        exit();
      }
    
    if (sha1("0:$pass")==$info['pass'])  
        print "ok|".getkey();
      else 
        {
          print "ok|passerr";
        }
     exit();   
  }      
print "ok|".getkey();
  }   
function cp_010_core_02()
  {
    
print "ok|".getkey();

  }   
function cp_010_core_03()
  {
    
$uselocales=$_REQUEST["uselocales"];

if ($uselocales)
  {
    $locales=$_REQUEST["locales"];
    
    $locales=preg_split("/\r?\n/",$locales,-1,PREG_SPLIT_NO_EMPTY);

    $tmplocales=array();
    foreach($locales as $locale)
      {
        if (!preg_match("/^(\w\w):(.*)/",$locale,$res) || setlocale(LC_ALL,$res[2])=="")
          {
            print "ok|errlocale|".$locale;
            exit;
          }
        if (isset($tmplocales[$res[1]]))
          {
            print "ok|alreadyset|".$res[1];
            exit;
          }
        $tmplocales[$res[1]]=1;  
      }
  }

print "ok|".getkey();
  }   
function cp_010_core_04()
  {
    
print "ok|".getkey();
  }   
function cp_010_core_11()
  {
    

if (!empty($_REQUEST["update"]))
  {
    print "ok|".getkey();
    return;
  }
$core_authtype_s=$_REQUEST["core_authtype_s"];
$core_authtype_s_db_s=$_REQUEST["core_authtype_s_db_s"];
$core_auth_type_mysql_host=$_REQUEST["core_auth_type_mysql_host"];
$core_auth_type_mysql_database=$_REQUEST["core_auth_type_mysql_database"];
$core_auth_type_mysql_login=$_REQUEST["core_auth_type_mysql_login"];
$core_auth_type_mysql_pass=$_REQUEST["core_auth_type_mysql_pass"];
$core_auth_type_mysql_charset=$_REQUEST["core_auth_type_mysql_charset"];
$core_snapshotdate=$_REQUEST["core_snapshotdate"];

if ($core_authtype_s=="db" && $core_authtype_s_db_s=="mysql")
  {
  
    if (substr($core_snapshotdate,0,8)>=20160429) {
      if (!function_exists("mysqli_connect"))
        {
          print "ok|errconnect|no mysqli support in PHP";
          exit(0);
        }  
        
      $link=@mysqli_connect($core_auth_type_mysql_host,$core_auth_type_mysql_login,$core_auth_type_mysql_pass);
      if (!$link) 
        {
          print "ok|errconnect|".mysqli_connect_error();
          exit(0);
        }    
        
      $db_selected = mysqli_select_db($link, $core_auth_type_mysql_database);
      if (!$db_selected) 
        {
          print "ok|errselect|".mysqli_error($link);
          exit(0);
        }  
    } else {
      if (!function_exists("mysql_connect"))
        {
          print "ok|errconnect|no mysql support in PHP";
          exit(0);
        }  
        
      $link=@mysql_connect($core_auth_type_mysql_host,$core_auth_type_mysql_login,$core_auth_type_mysql_pass);
      if (!$link) 
        {
          print "ok|errconnect|".mysql_error();
          exit(0);
        }    
        
      $db_selected = mysql_select_db($core_auth_type_mysql_database, $link);
      if (!$db_selected) 
        {
          print "ok|errselect|".mysql_error();
          exit(0);
        }  
    
    }
  }

print "ok|".getkey();
  }   
function cp_010_core_12()
  {
    
print "ok|".getkey();
  }   
function cp_010_core_13()
  {
    
$core_timezone=$_REQUEST["core_timezone"];

$tmp=array_flip(timezones());

if (!isset($tmp[$core_timezone])) 
  {
    print "ok|errtimezone";
    exit(0);
  }  

print "ok|".getkey();
  }   
function cp_010_core_14()
  {
    
print "ok|".getkey();
  }   
function cp_010_packagemaster_02()
  {
    
global $content_info;

$registry=@unserialize(substr(file_get_contents("templeet/registry.php"),8));

if (!is_array($registry))
  $registry=array();
    
$registry['installpackage']=$content_info['registry']['installpackage'];
unset($content_info['registry']['installpackage']);

$registry['installregistry']=$content_info['registry'];
  
@mkdir("templeet",0755);
file_put_contents("templeet/registry.php","<?php\n\000\n".serialize($registry)."\n?>");

print "ok|".getkey();;


  }   
function cp_011_postgresql_11()
  {
    
if (!empty($_REQUEST["update"]))
  {
    print "ok|".getkey();
    return;
  }

$core_authtype_s=$_REQUEST["core_authtype_s"];
$core_authtype_s_db_s=$_REQUEST["core_authtype_s_db_s"];
$auth_type_postgresql_host=$_REQUEST["auth_type_postgresql_host"];
$auth_type_postgresql_database=$_REQUEST["auth_type_postgresql_database"];
$auth_type_postgresql_login=$_REQUEST["auth_type_postgresql_login"];
$auth_type_postgresql_pass=$_REQUEST["auth_type_postgresql_pass"];
$auth_type_postgresql_charset=$_REQUEST["auth_type_postgresql_charset"];

if ($core_authtype_s=="db" && $core_authtype_s_db_s=="postgresql")
  {
  
    if (!function_exists("pg_connect"))
      {
        print "ok|errconnect|no postgresql support in PHP";
        exit(0);
      }  
      
    $connection_string="host=$auth_type_postgresql_host user='".addslashes($auth_type_postgresql_login).
                 "' password='".addslashes($auth_type_postgresql_pass)."' dbname='".addslashes($auth_type_postgresql_database)."'";
    $link=@pg_connect($connection_string);
    if (!$link) 
      {
        print "ok|errconnect|".$connection_string;
        exit(0);
      }    
  }

print "ok|".getkey();
  }   
function cp_011_postgresql_12()
  {
    
print "ok|".getkey();
  }   
function post_000_packagemaster_01()
  {
    

@unlink("extractor.php");
$registry=@unserialize(substr(file_get_contents("templeet/registry.php"),8));

if (!is_array($registry))
  {
    print "error: error reading registry";
    exit();
  }

foreach ($registry['installregistry']['dists'] as $dist => $distinfo)
  {
    $registry['dists'][$dist]['snapshotid']=$distinfo['snapshotid'];
    $registry['dists'][$dist]['snapshotdate']=$distinfo['snapshotdate'];
    $registry['dists'][$dist]['server']=$distinfo['server'];
  }  
  
if (!isset($registry['servers']))
  $registry['servers']=array();
  
$registry['servers']=array_merge($registry['servers'],$registry['installregistry']["servers"]);
foreach ($registry['installregistry']['dep'] as $dep => $depinfo)
  {
    $registry['dep'][$dep]=$depinfo;
  } 
   
foreach ($registry['installregistry']['group'] as $group => $groupinfo)
  {
    $registry['group'][$group]=$groupinfo;
  }  
  
unset($registry['installregistry']);
file_put_contents("templeet/registry.php","<?php\n\000\n".serialize($registry)."\n?>");

print "ok|";

  }   
function post_010_core_01()
  {
    
$htaccess=$_REQUEST['core_htaccess'];
$uridir=$_REQUEST['core_installeruridir']."/";
  
if (function_exists('chmod')) 
  {
    @chmod('./templeet/auth/config.php',0600);
    @chmod('./templeet/auth/passwd.php',0600);
    @chmod('./templeet/config.php',0600);
    @chmod('./templeet/serverconf.php',0600);
  }

if (file_exists("buildcode.txt"))
  copy("buildcode.txt","templeet/buildcode.txt");

$windows=isset($_SERVER['WINDIR']);

if ($windows)
    $crlf="\r\n";
  else
    $crlf="\n"; 
     
  $templeettestdir=gettempleettestdir();  
  delete($templeettestdir);
 
  if (!@mkdir("${templeettestdir}test1",0755,TRUE))
    {
       print "error|permission denied creating ".$templeettestdir."test1";
       exit();
    }
  mkdir("${templeettestdir}test2",0755,TRUE);
  mkdir("${templeettestdir}test3",0755,TRUE);
  mkdir("${templeettestdir}test4",0755,TRUE);
  mkdir("${templeettestdir}test5",0755,TRUE);
  mkdir("${templeettestdir}test6",0755,TRUE);
  mkdir("${templeettestdir}test7",0755,TRUE);
  mkdir("${templeettestdir}test8",0755,TRUE);
  mkdir("${templeettestdir}test9",0755,TRUE);

  $pregtempleettestdir=preg_replace('/\//','[\\\\\\\/]',$templeettestdir);
  writetestfile("${templeettestdir}testpage.php",'$server_value["page"]','respage.php','|([\\\/])'.$pregtempleettestdir.'testpage.php|','$1templeet.php');
  writetestfile("${templeettestdir}testindex.php",'$server_value["index"]','resindex.php','|([\\\/])'.$pregtempleettestdir.'testindex.php|','$1templeet.php');
  writetestfile("${templeettestdir}testpathinfo.php",'$server_value["pathinfo"]','respathinfo.php','|([\\\/])'.$pregtempleettestdir.'testpathinfo.php|','$1templeet.php');
  writetestfile("${templeettestdir}testtempleet.php",'$server_value["querystring"]','restempleet.php','|([\\\/])'.$pregtempleettestdir.'testtempleet.php|','$1templeet.php');

  function writefile($file, $content) {
    if (file_put_contents($file,$content)===FALSE)
    {
      print "error|error writing $file";
      exit;
    }
  }
  
  writefile("${templeettestdir}test1/$htaccess","FallbackResource ".$uridir.$templeettestdir.'testpage.php'.$crlf);
  writefile("${templeettestdir}test2/$htaccess","ErrorDocument 404 ".$uridir.$templeettestdir.'testpage.php'.$crlf);
  writefile("${templeettestdir}test3/$htaccess","DirectoryIndex ".$uridir.$templeettestdir.'testindex.php'.$crlf);
  writefile("${templeettestdir}test4/$htaccess","ErrorDocument 403 ".$uridir.$templeettestdir.'testindex.php'.$crlf."Options -Indexes$crlf");
  writefile("${templeettestdir}test5/ok.html","ok");
  writefile("${templeettestdir}test7/$htaccess","ErrorDocument 403 ".$uridir.$templeettestdir.'testindex.php'.$crlf);
  writefile("${templeettestdir}test8/ok.html","ok");
  writefile("${templeettestdir}test8/$htaccess","AddDefaultCharset Off$crlf");
  writefile("${templeettestdir}test9/$htaccess","FallbackResource ".$uridir.$templeettestdir.'testindex.php'.$crlf);
 
  
  @unlink("templeet.php.backup");
  @rename("templeet.php","templeet.php.backup");
    
  @unlink("$htaccess.backup");
  @rename("$htaccess","$htaccess.backup");
    
  writetestfile('templeet.php','$server_value["page"]',$templeettestdir."respage.php",'|nothing|','');
  
  print "ok|$templeettestdir";



  }   
function post_010_core_12()
  {
    
  $templeettestdir=gettempleettestdir();  
  writetestfile('templeet.php','$server_value["index"]',$templeettestdir.'resindex.php','|nothing|','');
  
  print "ok|";

  }   
function post_010_core_54()
  {
    

  $templeettestdir=gettempleettestdir();
  $page=(file_exists($templeettestdir."respage.php")?"1":"0");
  $index=(file_exists($templeettestdir."resindex.php")?"1":"0");
  print "ok|$page|$index";
  }   
function post_010_core_62()
  {
    

include("templeet/buildcode2.txt");
buildcode();
 
  }   
function post_010_core_64()
  {
    

  $htaccess=$_POST["core_htaccess"];
  $windows=isset($_SERVER['WINDIR']);

  if ($windows)
      $crlf="\r\n";
    else
      $crlf="\n"; 

  $config=@file_get_contents($htaccess);
  if ($config===FALSE)
    $config="";  

      
  $update=isset($_POST["update"]) && $_POST["update"];
  if (!$update)
    $core_emailislogin=($_POST['core_emailislogin']=="false"?0:1);
  $expirepage=($_POST['core_expirepage']=="false"?0:1);
  $templeetdir=$_POST['core_installeruridir']."/";
  $templeeturi=$_POST['core_installeruridir']."/templeet.php";
  $core_usesetlocale=($_POST['core_usesetlocale']=="false"?0:1);
  $core_locales=$_POST['core_locales'];
  $core_timezone=$_POST['core_timezone'];
  $hardtempleet=isset($_POST["core_hardtempleet"]) && $_POST["core_hardtempleet"];
  $fallback=isset($_POST["core_fallback"]) && $_POST["core_fallback"];
  $pathinfo=isset($_POST["core_pathinfo"]) && $_POST["core_pathinfo"];
  $err404=isset($_POST["core_err404"]) && $_POST["core_err404"];
  $err403=isset($_POST["core_err403"]) && $_POST["core_err403"];
  $optionindexes=isset($_POST["core_optionindexes"]) && $_POST["core_optionindexes"];
  $hardindex=isset($_POST["core_hardindex"]) && $_POST["core_hardindex"];
  $dirindex=isset($_POST["core_dirindex"]) && $_POST["core_dirindex"];
  $charset=$_POST["core_charset"];
  $newcharset=isset($_POST["newcharset"])?$_POST["newcharset"]:"";
  $http_host=getserver('HTTP_HOST');
  $distid=$_POST['distid'];
  
  $harderr404=$hardtempleet && !$fallback;
  $hardfallback=$hardtempleet && $fallback;
  $methodindex=$optionindexes || $hardindex || $dirindex;
  
  if ($fallback)
      {
        if (!preg_match('/^\s*FallbackResource\s+'.preg_quote($templeeturi,'/').'\s*$/im',$config))
          {
            $config=preg_replace('/^(\s*FallbackResource\s+)/im',"#\$1",$config);
            $config.="FallbackResource $templeeturi".$crlf;
          }
      }
    else
      $config=preg_replace('/^(\s*FallbackResource\s+)/im',"#\$1",$config);
      
    
  if ($err404)
      {
        if (!preg_match('/^\s*ErrorDocument\s+404\s+'.preg_quote($templeeturi,'/').'\s*$/im',$config))
          {
            $config=preg_replace('/^(\s*ErrorDocument\s+404\s+)/im',"#\$1",$config);
            $config.="ErrorDocument 404 $templeeturi".$crlf;
          }
      }
    else
      $config=preg_replace('/^(\s*ErrorDocument\s+404\s+)/im',"#\$1",$config);
    
  if ($err403)
      {
        if (!preg_match('/^\s*ErrorDocument\s+403\s+'.preg_quote($templeeturi,'/').'\s*$/im',$config))
          {
            $config=preg_replace('/^(\s*ErrorDocument\s+403\s+)/im',"#\$1",$config);
            $config.="ErrorDocument 403 $templeeturi".$crlf;
          }      
      }
    else
      $config=preg_replace('/^(\s*ErrorDocument\s+403\s+)/im',"#\$1",$config);
    
  if ($optionindexes)
    {
      if (!preg_match('/^\s*Options\s+.*-Indexes/im',$config))
        $config.="Options -Indexes".$crlf;
    }
    
  if ($dirindex)
    {
      if (!preg_match('/^\s*DirectoryIndex\s+index.html\s+'.preg_quote($templeeturi,'/').'\s*$/im',$config))
        {
          $config=preg_replace('/^(\s*DirectoryIndex\s+)/im',"#\$1",$config);
          $config.="DirectoryIndex index.html $templeeturi".$crlf;
        }
    }
  
  if ($charset!="nocharset" &&
      $newcharset=="nocharset")
    {
      if (!preg_match('/^\s*AddDefaultCharset\s+Off/im',$config))
        {      
          $config=preg_replace('/^(\s*AddDefaultCharset\s+.*)/im','#\$1',$config);
          $config.="AddDefaultCharset Off$crlf";      
        }
    }
    
  if (file_put_contents($htaccess,$config)===FALSE)
    {
      print "error|openwrite|".$htaccess; 
      exit;
    }
  
  $config = file_get_contents('templeet/serverconf.php');
  if ($config===FALSE)
    {
      print "error|openread|templeet/serverconf.php"; 
      exit;
    }
      
  $config = preg_replace("/'snapshotid'] = '.*?';/","'snapshotid'] = '$distid';",$config);

  $config = preg_replace("/'site_url'] = 'http:\/\/templeet.org'/","'site_url'] = 'http://$http_host'",$config);
  $config = preg_replace("/'base_path'] = '\/index.php/","'base_path'] = '$templeeturi",$config);
  $config = preg_replace("/'dir_installed'] = ''/","'dir_installed'] = '$templeetdir'",$config);
  $config = preg_replace("/'windows'] = 0/","'windows'] = ".($windows?"1":"0"),$config);
  $config = preg_replace("/'usepageexpire'] = \d/","'usepageexpire'] = ".($expirepage?"1":"0"),$config);
    
  $config = preg_replace("/'pathinfoaccepted'] = \d;/","'pathinfoaccepted'] = $pathinfo;",$config);
  $config = preg_replace("/'protocol'] = 'http:';/","'protocol'] = 'http:';",$config);
  $config = preg_replace("/'expirepassword']\s*=\s*\"[^\"]*\"/","'expirepassword'] = \"set expire password here ".mt_rand()."\"",$config);
  $config = preg_replace("/'timezone']\s*=\s*\"[^\"]*\"/","'timezone'] = \"$core_timezone\"",$config);

  if (preg_match('/cgi/i',php_sapi_name()))
      $cgi_header=1;
    else
      $cgi_header=0;
      
  $config = preg_replace("/cgi_header'] = 0;/","cgi_header'] = $cgi_header;",$config);

  if (!preg_match("/'fallbackused'].*;/",$config))
    {
      $config = preg_replace("/(config\['error404used'\].*)/","$1\n\n// Set to 1 when FallbackResource is used\n  \$config['fallbackused'] = 0;\n",$config);
    }


   
  if ($fallback || $hardfallback)
    {
      $config = preg_replace("/'fallbackused'].*;/","'fallbackused'] = 1;",$config);
    } 

  if ($err404 || $harderr404)
    {
      $config = preg_replace("/'error404used'].*;/","'error404used'] = 1;",$config);
    
      if ($harderr404 || $methodindex)
        $config = preg_replace("/'pagecachedir'] = '.*?';/","'pagecachedir'] = '';",$config);
    } 

  if ($charset=="nocharset" || 
      $newcharset=="nocharset")
      {
        $config_charset="";
      }
    else
      {
        $config_charset=$charset;
      }  
    
  $config = preg_replace('/(\\$config\[\'servercharset\'\]=.*;)/',
      "\\\$config['servercharset']= '$config_charset';",$config);
      
  $config=preg_replace('/\r\n/m',"\n",$config);
  $config=preg_replace('/\?'.'>.*/m','?'.'>',$config);
  
  if ($core_usesetlocale)
    {
      $tmp=explode("\n",$core_locales);
      $locales=array();
      foreach($tmp as $value)
        {
          if (preg_match("/^(\w\w):(.*)/",$value,$res))
            {
              $locales[$res[1]]=$res[2];
            }
        }
      
      if (preg_match("/\\$"."config\[\"locales\"\]/s",$config))
          {
            $config=preg_replace("/\\$"."config\[\"locales\"\]\s*=\s*array\s*\\(.*\\);/s",'$config["locales"]='.var_export($locales,TRUE).";\n\n",$config);
          }
        else
          {
            $config=preg_replace('/\?'.'>/m','$config["locales"]='.var_export($locales,TRUE).";\n\n".'?>',$config);
          }
  
    }
  
  if (file_put_contents('templeet/serverconf.php',$config)===FALSE)
    {
      print "error|writeerror|templeet/serverconf.php"; 
      exit;
    }
    
  if (!$update)
    {
      $config=array();  
      include('templeet/serverconf.php');  
      include('templeet/config.php');  
      $content=file_get_contents($config['authconfigfile']);  
  
      $authconfig=@unserialize(substr($content,8));
  
      $authconfig['account']['emailislogin']=$core_emailislogin;
  
      file_put_contents($config['authconfigfile'],"<?php\n\000\n".serialize($authconfig)."\n?>");
    }  
    
  if (file_exists("force_install.txt"))
    {
      @unlink("templeet/auth/config_ori.php");
    }
  print "ok|"; 
  

  }   
function post_011_core_62()
  {
    
  $templeetfile="templeet/templeet.php";
  $nginxcodefile="templeet/nginxcode.txt";
  $tmp=@file_get_contents($templeetfile);
  $nginxcode=@file_get_contents($nginxcodefile);
  if ($tmp===FALSE)
    {
      print "error|2|$templeetfile"; 
      exit;	
    }

  preg_match('/(.*\/\/BEGIN-GETPATH[\r\n]*).*(\/\/END-GETPATH.*)/s',$tmp,$res); 
  $tmp=$res[1].$nginxcode.$res[2];

  if (@file_put_contents($templeetfile,$tmp)===FALSE)
    {
      print "error|1|$templeetfile"; 
      exit;	
    }
  print "ok";

  }   
function post_011_core_64()
  {
    

  $windows=isset($_SERVER['WINDIR']);

  if ($windows)
      $crlf="\r\n";
    else
      $crlf="\n"; 


      
  $update=isset($_POST["update"]) && $_POST["update"];
  if (!$update)
    $core_emailislogin=($_POST['core_emailislogin']=="false"?0:1);
  $expirepage=($_POST['core_expirepage']=="false"?0:1);
  $templeetdir=$_POST['core_installeruridir']."/";
  $templeeturi=$_POST['core_installeruridir']."/templeet.php";
  $core_usesetlocale=($_POST['core_usesetlocale']=="false"?0:1);
  $core_locales=$_POST['core_locales'];
  $core_timezone=$_POST['core_timezone'];
//  $pathinfo=isset($_POST["core_pathinfo"]) && $_POST["core_pathinfo"];
  $pathinfo=1;
//  $charset=$_POST["core_charset"];
//  $newcharset=isset($_POST["newcharset"])?$_POST["newcharset"]:"";
  $charset=$newcharset="nocharset";
  $http_host=getserver('HTTP_HOST');
  $distid=$_POST['distid'];
  
  
  $config = file_get_contents('templeet/serverconf.php');
  if ($config===FALSE)
    {
      print "error|openread|templeet/serverconf.php"; 
      exit;
    }
      
  $config = preg_replace("/'snapshotid'] = '.*?';/","'snapshotid'] = '$distid';",$config);

  $config = preg_replace("/'site_url'] = 'http:\/\/templeet.org'/","'site_url'] = 'http://$http_host'",$config);
  $config = preg_replace("/'base_path'] = '\/index.php/","'base_path'] = '$templeeturi",$config);
  $config = preg_replace("/'dir_installed'] = ''/","'dir_installed'] = '$templeetdir'",$config);
  $config = preg_replace("/'windows'] = 0/","'windows'] = ".($windows?"1":"0"),$config);
  $config = preg_replace("/'usepageexpire'] = \d/","'usepageexpire'] = ".($expirepage?"1":"0"),$config);
    
  $config = preg_replace("/'pathinfoaccepted'] = \d;/","'pathinfoaccepted'] = $pathinfo;",$config);
  $config = preg_replace("/'protocol'] = 'http:';/","'protocol'] = 'http:';",$config);
  $config = preg_replace("/'expirepassword']\s*=\s*\"[^\"]*\"/","'expirepassword'] = \"set expire password here ".mt_rand()."\"",$config);
  $config = preg_replace("/'timezone']\s*=\s*\"[^\"]*\"/","'timezone'] = \"$core_timezone\"",$config);

  if (preg_match('/cgi/i',php_sapi_name()))
      $cgi_header=1;
    else
      $cgi_header=0;
      
  $config = preg_replace("/cgi_header'] = 0;/","cgi_header'] = $cgi_header;",$config);


  if ($charset=="nocharset" || 
      $newcharset=="nocharset")
      {
        $config_charset="";
      }
    else
      {
        $config_charset=$charset;
      }  
    
  $config = preg_replace('/(\\$config\[\'servercharset\'\]=.*;)/',
      "\\\$config['servercharset']= '$config_charset';",$config);
      
  $config=preg_replace('/\r\n/m',"\n",$config);
  $config=preg_replace('/\?'.'>.*/m','?'.'>',$config);
  
  if ($core_usesetlocale)
    {
      $tmp=explode("\n",$core_locales);
      $locales=array();
      foreach($tmp as $value)
        {
          if (preg_match("/^(\w\w):(.*)/",$value,$res))
            {
              $locales[$res[1]]=$res[2];
            }
        }
      
      if (preg_match("/\\$"."config\[\"locales\"\]/s",$config))
          {
            $config=preg_replace("/\\$"."config\[\"locales\"\]\s*=\s*array\s*\\(.*\\);/s",'$config["locales"]='.var_export($locales,TRUE).";\n\n",$config);
          }
        else
          {
            $config=preg_replace('/\?'.'>/m','$config["locales"]='.var_export($locales,TRUE).";\n\n".'?>',$config);
          }
  
    }
  
  if (file_put_contents('templeet/serverconf.php',$config)===FALSE)
    {
      print "error|writeerror|templeet/serverconf.php"; 
      exit;
    }
    
  if (!$update)
    {
      $config=array();  
      include('templeet/serverconf.php');  
      include('templeet/config.php');  
      $content=file_get_contents($config['authconfigfile']);  
  
      $authconfig=@unserialize(substr($content,8));
  
      $authconfig['account']['emailislogin']=$core_emailislogin;
  
      file_put_contents($config['authconfigfile'],"<?php\n\000\n".serialize($authconfig)."\n?>");
    }  
    
  if (file_exists("force_install.txt"))
    {
      @unlink("templeet/auth/config_ori.php");
    }
  print "ok|"; 
  

  }   
function post_020_core_60()
  {
    

include_once("templeet/modules/fieldfileaccess.php");
$users=ffa_readfile("templeet/auth/users");

$users[0]['pass']=sha1("0:".$_POST["core_adminpass"]);
$res=ffa_setkey("templeet/auth/users",0,$users[0]);   

print "res:";
print_r($res);
  }   
function post_020_core_66()
  {
    

  $windows=isset($_SERVER['WINDIR']);

  if ($windows)
      $crlf="\r\n";
    else
      $crlf="\n"; 

  $core_auth_type_mysql_host=isset($_POST["core_auth_type_mysql_host"])?$_POST["core_auth_type_mysql_host"]:"";
  $core_auth_type_mysql_database=isset($_POST["core_auth_type_mysql_database"])?$_POST["core_auth_type_mysql_database"]:"";
  $core_auth_type_mysql_login=isset($_POST["core_auth_type_mysql_login"])?$_POST["core_auth_type_mysql_login"]:"";
  $core_auth_type_mysql_pass=isset($_POST["core_auth_type_mysql_pass"])?$_POST["core_auth_type_mysql_pass"]:"";
  $core_auth_type_mysql_charset=isset($_POST["core_auth_type_mysql_charset"])?$_POST["core_auth_type_mysql_charset"]:"";
  
  $configphp = file_get_contents('templeet/config.php');
  if ($configphp===FALSE)
    {
      print "error|openread|templeet/config.php"; 
      exit;
    }
      
  $configphp = preg_replace("/'sqlconfig'] = .*?\);/s","'sqlconfig'] = array(\n\t\t\t".
                           "'*' => array('type'=>'mysql','host'=>'".addslashes($core_auth_type_mysql_host).
                              "','database'=>'".addslashes($core_auth_type_mysql_database).
                              "','login'=>'".addslashes($core_auth_type_mysql_login).
                              "','password'=>'".addslashes($core_auth_type_mysql_pass).
                              "','charset'=>'$core_auth_type_mysql_charset')\n\t\t\t);",$configphp);
  
      
  $configphp=preg_replace('/\r\n/m',"\n",$configphp);
  $configphp=preg_replace('/\?'.'>.*/m','?'.'>',$configphp);
  
  
  if (file_put_contents('templeet/config.php',$configphp)===FALSE)
    {
      print "error|writeerror|templeet/config.php"; 
      exit;
    }
    
    
  print "ok|"; 
  

  }   
function post_100_templeet4_minify_50()
  {
    

  global $config;
  include('templeet/serverconf.php'); 
  include('templeet/config.php'); 
  
  $content=file_get_contents('templeet/config.php');
  
  if (!isset($config["user"]))
    {
      $content=preg_replace("/\?>/s","// BEGIN USER CONFIG\n// END USER CONFIG\n?>",$content);
      $config["user"]=array();
    }
  
  if (!isset($config["user"]["minify"]))
    {  
      $config["user"]["minify"]=array(
               "minify_cached" => 0,
               "minify_notcached" => 0,
               "embedded_js" => 0,
               "standalone_js" => 0,
               "embedded_css" => 0,
               "standalone_css" => 0,
               "max_js_size" => 100000,
               "max_css_size" => 100000
            );  
      $content=preg_replace("|// BEGIN USER CONFIG.*// END USER CONFIG|s",
                            "// BEGIN USER CONFIG\n  \$config[\"user\"]=".var_export($config["user"],TRUE).";\n// END USER CONFIG",$content);
      file_put_contents('templeet/config.php',$content);
    }
    
  print "ok|"; 
  

  }   
function post_500_packagemaster_80()
  {
    

  $windows=isset($_SERVER['WINDIR']);
  
  if ($windows)
      $crlf="\r\n";
    else
      $crlf="\n"; 

  if(!$fp = @fopen('templeet/serverconf.php', 'r'))
    {
      print "error:".str_replace('NAME','templeet/serverconf.php',$message[$language][2]); 
      exit;
    }
  $config = fread ($fp, filesize('templeet/serverconf.php'));
  fclose ($fp);
  
  $handle=opendir('templeet/modules');
  $array_functions=array();

  $files=array();
  while ($file = readdir($handle))
    {
      if (is_file('templeet/modules/'.$file))
        $files[$file]=1;
      elseif (is_dir('templeet/modules/'.$file) && $file!='.' && $file!='..')
        {
          $handlesub=opendir('templeet/modules/'.$file);
          while ($subfile = readdir($handlesub))
            { 
              if (is_file('templeet/modules/'.$file.'/'.$subfile))
                $files[$file.'/'.$subfile]=1;
            } 
          closedir($handlesub);
        }
    }
  
  $listmodules="";  
  uksort($files,"sortmodules");
  $array_files=array();
  foreach($files as $file => $value) 
    {
      $tmp=testfile($file);
      if (is_array($tmp))
          {
            $array_functions=array_merge($array_functions,$tmp); 
            $array_files[$file]=2;  
          }
        else
          $array_files[$file]=$tmp;  
          
      $listmodules.=";$file:".$array_files[$file];
    }
    
  closedir($handle);
  
  $tmp='';$i=1;
  while (list($a,$b) = each($array_functions))
    {
      $tmp .= "		'$a'=>'$b'";
      if ($i < count($array_functions)) 
        $tmp .= ",\n";
      $i++;
    }

  $config = preg_replace('/\\$config\[\'function2module\'\] = array\((.*?)\);/smi',
                "\\\$config['function2module'] = array(\n$tmp);",$config);

  $config=preg_replace('/\r\n/m',"\n",$config);
  $config=preg_replace('/\?'.'>.*/m','?'.'>',$config);
  
  if(!$fp = @fopen('templeet/serverconf.php', 'w'))
    {
      print "error:".str_replace('NAME','templeet/serverconf.php',$message[$language][5]); 
      exit;
    }
  if (fwrite ($fp, $config)!= strlen($config))
    {
      print "error:".str_replace('NAME','templeet/serverconf.php',$message[$language][8]); 
      exit;
    }
  fclose ($fp);
  
  $listmodules=substr($listmodules,1);
  print "ok|$listmodules"; 

  }   
function post_600_core_10()
  {
    
global $config;

$core_auth_type_mysql_host=$_REQUEST["core_auth_type_mysql_host"];
$core_auth_type_mysql_database=$_REQUEST["core_auth_type_mysql_database"];
$core_auth_type_mysql_login=$_REQUEST["core_auth_type_mysql_login"];
$core_auth_type_mysql_pass=$_REQUEST["core_auth_type_mysql_pass"];
$core_auth_type_mysql_tablename=$_REQUEST["core_auth_type_mysql_tablename"];
$core_auth_type_mysql_charset=$_REQUEST["core_auth_type_mysql_charset"];

class TempleetError extends Exception {
     public $line;
     function __construct($mes,$line=NULL) {
       parent::__construct($mes);
       $this->line=$line;
   }
  };

class vars {};

global $global_var;
$global_var=new vars();


include('templeet/serverconf.php');
include('templeet/config.php');

include('templeet/core.php');
include('templeet/modules/auth.php');
return_auth_getmethod();
auth_getsecretkey();

include('templeet/modules/authtools.php');

auth::$admin=1;

$res=auth_setmethod('db',
  array(
         'dbtype' => 
            array(
              'value' => 'mysql',
              'mysql' => array(
                  'host' => $core_auth_type_mysql_host,
                  'database' => $core_auth_type_mysql_database,
                  'login' => $core_auth_type_mysql_login,
                  'password' => $core_auth_type_mysql_pass,
                  'charset' => $core_auth_type_mysql_charset
                )
            ),
         'tablename' =>  $core_auth_type_mysql_tablename  
       )
  );
 
if ($res!="")
    print "error|".$res; 
  else  
    print "ok|"; 
  

  }   
function post_600_postgresql_10()
  {
    
global $config;

$auth_type_postgresql_host=$_REQUEST["auth_type_postgresql_host"];
$auth_type_postgresql_database=$_REQUEST["auth_type_postgresql_database"];
$auth_type_postgresql_login=$_REQUEST["auth_type_postgresql_login"];
$auth_type_postgresql_pass=$_REQUEST["auth_type_postgresql_pass"];
$auth_type_postgresql_tablename=$_REQUEST["auth_type_postgresql_tablename"];
$auth_type_postgresql_charset=$_REQUEST["auth_type_postgresql_charset"];

class TempleetError extends Exception {
     public $line;
     function __construct($mes,$line=NULL) {
       parent::__construct($mes);
       $this->line=$line;
   }
  };

include('templeet/serverconf.php');
include('templeet/config.php');

class vars {};

global $global_var;
$global_var=new vars();

include('templeet/core.php');
include('templeet/modules/auth.php');
return_auth_getmethod();
auth_getsecretkey();

include('templeet/modules/authtools.php');

auth::$admin=1;

$res=auth_setmethod('db',
  array(
         'dbtype' => 
            array(
              'value' => 'postgresql',
              'postgresql' => array(
                  'host' => $auth_type_postgresql_host,
                  'database' => $auth_type_postgresql_database,
                  'login' => $auth_type_postgresql_login,
                  'password' => $auth_type_postgresql_pass,
                  'charset' => $auth_type_postgresql_charset
                )
            ),
         'tablename' =>  $auth_type_postgresql_tablename  
       )
  );
 
if ($res!="")
    print "error|".$res; 
  else  
    print "ok|"; 
  

  }   


function phpcheckkey($key)
{
  global $installer_key,$action,$checkparam_keys;
  
  $keyexp=explode(":",$key);
  $found=FALSE;
  while(!$found && list($key,$value)=each($checkparam_keys))
    {
      if ("cp_".$value==$keyexp[0])
        $found=TRUE;
    }
    
 if (!$found || !list(,$value)=each($checkparam_keys))
   return FALSE;
    
 if ($keyexp[1]+60<time())
   return FALSE;   
  
 if ($action!="cp_".$value)
   return FALSE;
   
 if ($keyexp[2]!=sha1($keyexp[0].":".$keyexp[1].":".$installer_key))
   return FALSE;
   
  return TRUE;
}
 
function getkey()
{
  global $installer_key,$action;
  $time=time();
  $value=$action.":".$time.":";
  return $value.sha1($value.$installer_key);
}
  
function make_seed() {
   list($usec, $sec) = explode(' ', microtime());
   return (float) $sec + ((float) $usec * 100000);
}

Function getserver($name) {
  if(isset($_SERVER[$name])) 
    return $_SERVER[$name]; 
  return '';
}

Function getget($name) 
{
  $name=trim($name);
  $val="";
  if(isset($_GET[$name]))
    $val=$_GET[$name];

  if(isset($_POST[$name]))
    $val=$_POST[$name];

  if (!get_magic_quotes_gpc())
    return $val;

  return stripslashes($val);  
}

function delete($file)
{ 
  if (@is_dir($file))
    { 
      if ($handle = @opendir($file))
        {
          while($filename = @readdir($handle))
            { 
              if ($filename != '.' && $filename != '..')
                { 
                  @delete($file.'/'.$filename); 
                } 
            } 
          @closedir($handle); 
        }
      @rmdir($file); 
    }
  else 
    { 
      @unlink($file); 
    } 
} 

__halt_compiler();core/ok.png
  �PNG

   
n"�*���A�A�"D��Rkq�j�
�
^��A��A�E���t�)���������73�y����  
��~��Q@�0��Tl�d��0�A�'!�*"l_�KG�{��Uv~��D.�@�۾~n���
���tђ{-/���7�ƣ� W�(J�L�Y׃qBw�(�[$*Z�O����{�8(w��4��)�P��τ�l����Ar~��\u��/��E��$�d�L2��/��q�4���&�
>o(T���^J�ѶW.6�b�X��n�0��~�KK�`�M.4u�F&�е`��PB�T�3J�5�}צ0i���~rZ��R�n/e.IU���{��Ѻ` :H�~!Q-[�L�xd�H(
Yj�KȞL
core/plus.png
�   �PNG

   
core/minus.png
�   �PNG

   
core/cancel.png
�  �PNG

   
�������,$_���@Jl�e�h_��
"������H�8F�ҁ���s����;II���U`�$I�,�l�u@I@�{@�b��n�1'�
o�0�X3Q�J����B����˲<k� �9,3ʹ�7�vӋ�&j�$]X��⦣�m6[�t�����Ut���tE~��"�����!��̷�ֵ��e
95B�έ*Dpe�ʇTN��m�pг
�X<u���Â?I������R.��x9H�9���@�8���\|��pZ"���Z&��T�u"u�7~��'��f�    IEND�B`�
core/info.png
  �PNG

   
<c��'�c��@J�ɫ,N-q4�=3"��M�FḰ��C	�4���D���������R��̙<�|O�:D�v�����{�y����V���*,=�p��"j=ؾۀɥR2gRo�|�w���ՏX��I��ETєP�F�=({�9{6��)�3yw��v��9y���w��{/g �\��i��[E�naC���
>�
y\#�M+�v�Pj�A�p�<�"�R���x�*�^��A� ��D`�
ߨ\\�-N(�j���6��S���K?��?'�CD2����'�l��o�o�¤D۴g    IEND�B`�
templeet4_admin/right_arrow.png
E  �PNG

   
7�й�  �IDATx�啽KA����Kp�I�_�GsU �������B����tb!��/0m�,4����ǹ�����Xd�1��I$E^x�f���_3/��&�9,���K��-�h���+��	ع�3mH_�̉Vz���_'�@x���:g��p
���.ϑB��	[?Y����i����0�������>-k��~CEm5�h�v���B�=HZ	��5�Y��+,J(��Q@T��11�9X�����Il/��	Yf`�S�ե�:��e���f_6
����/V�v�=�5��["a�S��7��v�ܦ-��k�`���c�h:@x��"�8�J5���ȗA�kT�3eہ�OB�����FG���8*,����@��7o��:W<��ϲφ���1�n�� "�#�2��	���<������� ��S�c�    IEND�B`�
templeet4_admin/bgcontinue.png
)  �PNG

   
OiCCPPhotoshop ICC profile  xڝSgTS�=���BK���KoR RB���&*!	J�!��Q�EEȠ�����Q,�
��!���������{�kּ������>�����H3Q5��B�������.@�
$p �d!s�# �~<<+"�� x� �M��0���B�\���t�8K� @z�B� @F���&S � `�cb� P- `'�� ����{ [�!��  e�D h; ��V�E X0 fK�9 �- 0IWfH �� ���  0Q��) { `�##x �� F�W<�+��*  x��<�$9E�[-qWW.(�I+6aa�@.�y�2�4���  ������x����6��_-��"bb���ϫp@  �t~��,/��;�m��%�h^�u��f�@� ���W�p�~<<E���������J�B[a�W}�g�_�W�l�~<�����$�2]�G�����L�ϒ	�b��G�����"�Ib�X*�Qq�D���2�"�B�)�%��d��,�>�5 �j>{�-�]c�K'Xt���  �o��(�h���w��?�G�% �fI�q  ^D$.Tʳ?�  D��*�A��,�����`6�B$��BB
d�r`)��B(�Ͱ*`/�@4�Qh��p.�U�=p�a��(��	A�a!ڈb�X#����!�H�$ ɈQ"K�5H1R�T UH�=r9�\F��;� 2����G1���Q=��C��7�F��dt1�����r�=�6��Ыhڏ>C�0��3�l0.��B�8,	�c˱"����V����cϱw�E�	6wB aAHXLXN�H� $4�	7	�Q�'"��K�&���b21�XH,#��/{�C�7$�C2'��I��T��F�nR#�,��4H#���dk�9�, +ȅ����3��!�[
�b@q��S�(R�jJ��4�e�2AU��Rݨ�T5�ZB���R�Q��4u�9̓IK�����hh�i��t�ݕN��W���G���w
�J�&�*/T����ުU�U�T��^S}�FU3S�	Ԗ�U��P�SSg�;���g�oT?�~Y��Y�L�OC�Q��_�� c�x,!k
�M=:��.�k���Dw�n��^��Lo��y���}/�T�m���GX�$��<�5qo</���QC]�@C�a�a�ᄑ��<��F�F�i�\�$�m�mƣ&&!&KM�M�RM��)�;L;L���͢�֙5�=1�2��כ߷`ZxZ,����eI��Z�Yn�Z9Y�XUZ]�F���%ֻ�����N�N���gð�ɶ�����ۮ�m�}agbg�Ů��}�}��=
y��g"/�6ш�C\*N�H*Mz�쑼5y$�3�,幄'���L
�B��TZ(�*�geWf�͉�9���+��̳�ې7�����ᒶ��KW-X潬j9�<qy�
�+�V�<���*m�O��W��~�&zMk�^�ʂ��k�U
�}����]OX/Yߵa���>������(�x��oʿ�ܔ���Ĺd�f�f���-�[����n
INST_en/flag.png
�  �PNG

   
�@�'�	y�O��+k[�<@���B
���ZA�!`'+s���N���Ჷs7��m㘫<g�,[p
���M�_���h�hn����>���G�$cvS�k����8��(�C�!4p� i����g�ON���MH'�aR�$�r��# ~W�0�g�Ε���mz��2�]j�{�2%`����\[�[�i��w�$d#8M��$B�~�Z��O!Z?�#��.LV�+�    IEND�B`�
INST_fr/flag.png
l   �PNG

   
packagemaster/ok.png
  �PNG

   
n"�*���A�A�"D��Rkq�j�
�
^��A��A�E���t�)���������73�y����  
��~��Q@�0��Tl�d��0�A�'!�*"l_�KG�{��Uv~��D.�@�۾~n���
���tђ{-/���7�ƣ� W�(J�L�Y׃qBw�(�[$*Z�O����{�8(w��4��)�P��τ�l����Ar~��\u��/��E��$�d�L2��/��q�4���&�
>o(T���^J�ѶW.6�b�X��n�0��~�KK�`�M.4u�F&�е`��PB�T�3J�5�}צ0i���~rZ��R�n/e.IU���{��Ѻ` :H�~!Q-[�L�xd�H(
Yj�KȞL
packagemaster/right_arrow.png
E  �PNG

   
7�й�  �IDATx�啽KA����Kp�I�_�GsU �������B����tb!��/0m�,4����ǹ�����Xd�1��I$E^x�f���_3/��&�9,���K��-�h���+��	ع�3mH_�̉Vz���_'�@x���:g��p
���.ϑB��	[?Y����i����0�������>-k��~CEm5�h�v���B�=HZ	��5�Y��+,J(��Q@T��11�9X�����Il/��	Yf`�S�ե�:��e���f_6
����/V�v�=�5��["a�S��7��v�ܦ-��k�`���c�h:@x��"�8�J5���ȗA�kT�3eہ�OB�����FG���8*,����@��7o��:W<��ϲφ���1�n�� "�#�2��	���<������� ��S�c�    IEND�B`�
packagemaster/cancel.png
�  �PNG

   
�������,$_���@Jl�e�h_��
"������H�8F�ҁ���s����;II���U`�$I�,�l�u@I@�{@�b��n�1'�
o�0�X3Q�J����B����˲<k� �9,3ʹ�7�vӋ�&j�$]X��⦣�m6[�t�����Ut���tE~��"�����!��̷�ֵ��e
95B�έ*Dpe�ʇTN��m�pг
�X<u���Â?I������R.��x9H�9���@�8���\|��pZ"���Z&��T�u"u�7~��'��f�    IEND�B`�
packagemaster/info.png
  �PNG

   
<c��'�c��@J�ɫ,N-q4�=3"��M�FḰ��C	�4���D���������R��̙<�|O�:D�v�����{�y����V���*,=�p��"j=ؾۀɥR2gRo�|�w���ՏX��I��ETєP�F�=({�9{6��)�3yw��v��9y���w��{/g �\��i��[E�naC���
>�
y\#�M+�v�Pj�A�p�<�"�R���x�*�^��A� ��D`�
ߨ\\�-N(�j���6��S���K?��?'�CD2����'�l��o�o�¤D۴g    IEND�B`�
ok.png
�  �PNG

   
Q2��220�Tfxs����q >��`� �l���,b����/��W@n�'Ȇ� @ ��N�x�pi��@���gxw��m��! ��n@ �-p9��	�� ��̂�r&�h��?�?� ������$�j�/t� 7d����?^�w��_R�PH���5�jrL���4��=����+�� ���#��N}xs�G�f[yEk�c@�0 �a��R�Uΐ����/����V� ����6�z0��~F���ۻƝ85�=�qp� ��@j%�ŧ���
��PW���x#f.@ k����o�"[ @�Tn�` �  �xk]N��'    IEND�B`�
bg.gif
�  GIF89a� [ �  ����ɴ�ǲ�Ű�̷�ȵ�ð�н�˸��Ʈ������ʶ�Ʋ����κ,    � [  ���K��TSˑ8Gy LQ(H�*�� $�4zͥň�% �a!;�|*G"������HR���a24WR	�8EaV [z��b�%o"d)XyG)
C��**p��
2uT))�2p�ԏ4[��*�(��*�	I�7=& ��C˚<��&�$ F�d�	t-|d8 J�#���a�B3)B�x���k"��� �,#�$�� Q�i�^�W*[�F���xDm���������jOKqʖ.Y�,!/�j�)!uf<M��T
�㶆S�z�rr:e�,ۨe�S���Fd8�'>);�x�R�D�����Z
u�W��\�^bő[=h"b[o��A���	"I���V5�A
=�d$b��&��a'� $���Y[$�#E*�l@$zd��Bn1�'����uJ&2�fRO	3-�g+���'�Q�=��Y@,s�.��۴Y,���"r&��@8�w�K�&¡Ϩ�Ж)r��A�̓ݙ�B�iuB�z#��ك(��{���S5c9E#O��6���}5�9v^��[,heO��̶0�k��4|$&�� ��#5RЌG�Շ5,��	GnuJ
Z�$BI
a���}�Ø�P�X�,�3��U��X�"�IТC4�3Y�a�y�
����gv��N��«�)5Ye��P�v��R$� ު.���9:5�%��HA���� @�
���9#��f]�PW�b~��[wM�
��őma����=���6
��&���%/ ۅ��X��x�
�9�i`
�)���}��c���:�'������`I�-W��A���S�pG��
œ�1����cMc��1�q����`y�{��*e��Z�ݠqa!V�I�V�F����:!�<��h�@��e[bS��sP2-�'3r�K224�0
�!Uk��p"��
�h�t�=E��m)i0~qy�gF�s1
1O�ql8S� f1kRZVIB��)+�<�(Ķ�ip=h}�������b
Gg���B�a#M�sIZ'=I	�&D���ar�V�������:bZܣ/x� �E�`�u5�jж�4�~�
��Z���ܠ5���y#���)Y�O��@����xh!,v��E �v�����tP
Rrh�B�"�<�ao��%��]��w>�<�B	8<o�:e-�yd4y��-�ȕ��]�aguʉ��0��C/�
�Q9UC07�2����D2�_�F��T{�h�#5r�Z�B�l
9g�X�x)h�*'���[�c� �TY�s��?g�1��:
QY�"���n1`\4!
�1�΋R\96R3@a��6�A��e)0 ~�����(�UU�)�"������v(�����)�Y�簪��`PiCc/�F����8"���@��A�0 @��:^[���&@��I�ս.<�x5S3Q.�V�.&�\ ޼g.+:k#
LP�ȷ&g2����8�!:! �$��K�H/ud}!ś4k��H�C�.p
��E3"
!W4t;oU`��2�:? m]5<{�])�s!ȇp&��7���
*d�F�v����F��e)�����X��� [���O�q3��a"K$q�
�q@ �#�ٺ��q����^-e�q�Y3�"�
*];qK[2�`^�W�w�n� ��
������+0 �0R�����k�)uP��h#9R�h�XR��oY��]�⇥���8���hJ�eU� ���s�ώ��X�
̄�mF�`!�P.ه�!aa; R`H)P)���`��HH`�x��{�jA���:PT��bPQP�{(pH���{Z�)P0P�Bp`�xu 8���� �Īd@|E��8��z�h��b����}�$�X`��M�Swp���̘���4@`�.��c$��sWB����ڄ�Z���Z� ��|ha��%a�]`%,�(~�@  H��u/���H���:[\�u"��`��Ƣ�~�@�C˗ʋqaif��Lg��U�WNt�h��Ǌk^4lIuM��l])�1D�M�F.��d��]�4��K� �Xv��
X�"l�D�!2�"v V1v�� J|���O
\�щ����FnI���p��Qc�mH;xa2@�4b|Ein�bs�i҄�M8�f�vb!5g-�Bv���i&�/��0�8�G%
Z��=0�F̡��4Y����d�?h�2T(B��(I�����B���ʨe
�i(P' ����u��m:��&�(�� =?�D*p,��<gy��E�6 -l(�`q1�I�ԇ����(�#���;�1 #Ԁ��Т
�xGP��=�
�/NXC'[_7|"��"7L1�T�I��/�R߰�B����
reset.png
�  �PNG

   
OiCCPPhotoshop ICC profile  xڝSgTS�=���BK���KoR RB���&*!	J�!��Q�EEȠ�����Q,�
��!���������{�kּ������>�����H3Q5��B�������.@�
$p �d!s�# �~<<+"�� x� �M��0���B�\���t�8K� @z�B� @F���&S � `�cb� P- `'�� ����{ [�!��  e�D h; ��V�E X0 fK�9 �- 0IWfH �� ���  0Q��) { `�##x �� F�W<�+��*  x��<�$9E�[-qWW.(�I+6aa�@.�y�2�4���  ������x����6��_-��"bb���ϫp@  �t~��,/��;�m��%�h^�u��f�@� ���W�p�~<<E���������J�B[a�W}�g�_�W�l�~<�����$�2]�G�����L�ϒ	�b��G�����"�Ib�X*�Qq�D���2�"�B�)�%��d��,�>�5 �j>{�-�]c�K'Xt���  �o��(�h���w��?�G�% �fI�q  ^D$.Tʳ?�  D��*�A��,�����`6�B$��BB
d�r`)��B(�Ͱ*`/�@4�Qh��p.�U�=p�a��(��	A�a!ڈb�X#����!�H�$ ɈQ"K�5H1R�T UH�=r9�\F��;� 2����G1���Q=��C��7�F��dt1�����r�=�6��Ыhڏ>C�0��3�l0.��B�8,	�c˱"����V����cϱw�E�	6wB aAHXLXN�H� $4�	7	�Q�'"��K�&���b21�XH,#��/{�C�7$�C2'��I��T��F�nR#�,��4H#���dk�9�, +ȅ����3��!�[
�b@q��S�(R�jJ��4�e�2AU��Rݨ�T5�ZB���R�Q��4u�9̓IK�����hh�i��t�ݕN��W���G���w
�J�&�*/T����ުU�U�T��^S}�FU3S�	Ԗ�U��P�SSg�;���g�oT?�~Y��Y�L�OC�Q��_�� c�x,!k
�M=:��.�k���Dw�n��^��Lo��y���}/�T�m���GX�$��<�5qo</���QC]�@C�a�a�ᄑ��<��F�F�i�\�$�m�mƣ&&!&KM�M�RM��)�;L;L���͢�֙5�=1�2��כ߷`ZxZ,����eI��Z�Yn�Z9Y�XUZ]�F���%ֻ�����N�N���gð�ɶ�����ۮ�m�}agbg�Ů��}�}��=
y��g"/�6ш�C\*N�H*Mz�쑼5y$�3�,幄'���L
�B��TZ(�*�geWf�͉�9���+��̳�ې7�����ᒶ��KW-X潬j9�<qy�
�+�V�<���*m�O��W��~�&zMk�^�ʂ��k�U
�}����]OX/Yߵa���>������(�x��oʿ�ܔ���Ĺd�f�f���-�[����n
_/%���dˀE���Ōh�XfڻL��~4	6����PX��1wSgN&�$��ɵ?�ɬ�h��k���2�NF:7u�Gw̜;���7����J���<ZN��ԑ_p���1#��!�=_��I
DLJ�^��~Zᬊe�_���i _��v����'a;�cF��$[&Xf
˔X��4%�)�^��8+7���+�L�m��M�e�mM�-�e��;���Pɬ�ȁm������>��E��<w@r��:n�$��C*�B��VX�ԧ�T&�0+R�zk��#�f舢�qj�@Q��
x@.�:��	e����2H86G�ځ�L��Q@il�
!���il�]^RVy(�\�2%͇���-)���~���k?}�Ї�W:S
"\�xf-PX�j�'�<�_� M�8rhw�J!DY��\������a��Ǒ�]���
�I	p~ �E2��MB 8��q�M����\=w���Y���J\��QOJ�f��j(E2����¼�
#�%[S�>U�(���.�������T����T���U�� 4*`V�W pѱ�Q5�[U���_�߻հ���fP�KVG�ࠦQ4�&<* ?��i��꿋���Ao�_ܹqv?����t���	4
bgbutton.png
|   �PNG

   
warn.png
�  �PNG

   
�"�Bb�B���&)!�(��D(�Pi�D�PȗH��!P%$
&B�ţl����c��c��k��/��8��f�����ܹ��{�=�g�m�I4�4l1�@p0+VB{�})�n ���4iI^E�]H�~���aPk_R��;L�9�/�WV����_0��\���Kv��X��� �M�7��u��+W]�N�����R�M1���v�\gr��E���=�;O�����III� Kb�3fL>�--��8~3�}
�Y[�䒒8	��5V~c&`���>�5v,��z �ٳ��� ����t2.##�~+�1F7����^}5Ө�'p��2�C�v;m��b��Ay�9jw�+L3�:G�;&ȄW���t������.\���������� t]��-�;i�݀�b�{���&���2G�W_�i��b�M ��55����Z&Κ�K���.H��Qp���)S��`��/�.^����Vc�`_��`c#ܻGZ^�M������O�%K����qt=j��:��^�+
�U��ƌ��oH��4a����a� �N��4��J��	 ��y���:Q!�ۍ�f
o^�MҴ_���.@�ƌ3T���PK �+nw�� �ݎ^S@����իdh
|4
���HW5퇟�\�l��s"w�"%&�8!8p� ��� ���SUUe9�D�3>�+W�t���<t���_�N���" ��YEEj��e"w���^���~6o���͛ٷo�/(
�u� 0�_�DvA�C���e�>�)���oa�-��I^/�ҥug���PW�/\��� ����I�z���*�� �����z��y�����n�p�\	��$	�[�Dl�Bt]�@��)N	�m!ӈ*6�{nRn��Y[�����x�C�}���F�^Q�:k �/^����LHH΀�OL���䔔�o�� ��x!ˏL\v!�Ӊ����{ ��]
��i襥 ��0��&���!}zM�C��K��y�N����I B'Nps�ľ⟚�o�������2M�uZ��P
bg_top.png
  �PNG

   
M~�L� �I��aY�l�+�b�!e �~]d���]/|��%��K]f�����v�L��e1@.&t,��������^�a$Yv��{���\  �1��s�a��mwg�`��,��2��j��
�
U�͒<��h��DyT�8�J)q1�=/���k��6�e���P4�1[�w�� Mį���������,�:͵�<e�����|��BM������S��6�"x��}}t+����KF�Ԯ(�ԯ�]?P�縷Hg�����O)����C�ˮ��}�/Ĳ��o���A4��I`]���� �;z�Yths(�`������}��w��N���}b��.�z���w'��^\�x.�������~����/�Թ�w������X�Gܿ.�S\���j�{�,�4Yؚ�*I���O��$٢d1]��{/~��	�m��w��S��b�M��t�.�޽]�ܝ�Iem�'�/�$q�×���t]����Źc߷[и7o��k~�w�r�t��v��η�vI��5�,���[�[���ު��S��r�;n���M��6�O�t}z�{�qyy�-m��u���]N�؋�^T�<����[���l�}w��ֶy��U�_�f�+���
J�ȏp#AI�i�ďR
�,��kD��Ǫ�T�Sux���ɝ�ݚm�#�P3ZJ�,��M?���,[��7#3��B�����
�r��Y^|���"\���9Z�а�! ������A���(g�
)�����@0C ���:rh�g�]P������I�Z�wj5ηڞ�ۙ��ḃ;|S��1b�ܝ� :�F�0���IH�:���    IEND�B`�
templeet4.gif
  GIF87a@ �  ��
�/1\��e��q��y���ţ���}���Ʃ�ѱWv_���m�p�«|�}�Ǳ�Ҽ�˶�����������Ǩ����uc话�;0��z[�TS,    @  �`A�@�8�))�kI��*�F=�&}����j,���#n�5��
�ZJŲ�T�^
�2��URL���7���XՈj�1�L[.gPuMH�nMPTw/f�}EcF�\p��8F�SwNI0�&Pf_u���HpZ�fN�z�3�V%O7�JJ:��0�8��sC_wnyE��.u�+�t˴�|1:YN�'��_|���2d����A,"y�>qew�<�e����r��#2$�1��t�

l�]�G�Ƀ�j�U�;y�sVh�A�w��t�yQ�HP��\@�8��^(tv�(���%11�B�Y� ��*J�W�%~MZ���)V�FgK=ӊ��)�@�(}�a
'�@y
�f+[�B�E��At�矀��g�~ ���6G��7k�=�`#�H�]�J��������T�\�ڰ	�
Z���-B2����X:��z���D�X�,͜���m)�n
غ�����ޠ�#���1b�U�D���J��S�1 �J
��[��J3���5�dM���9���������|�����9lP P�J9򐋇 d��@<��` �K�`��?� �@��N>O,�������	�fP����Q�wqH@h�I�� �=����ϑ�H�t�ŅytP0 GK �+�IT�8@�@����y��,���IB��{� 
X��� 0 -�Y �@� �A$�p!����\nA"RUZbǽ��*M���d�w# Nd��q�@������[$"!��A
��٤��Dii��c��6!�Ȝ4��ps�
�� [8� CB@��#Y�F��tq�n���5p� �Ć����}QRsSY�Bq�� @#$�'�+)B8�}J�2aR:�����8 �!�i0�C�P�0\^D��a��y��B�<�`�j!5���A����N���Ƣ@�R%�(�����З����0����hJ�
��pJ
�a��!�z��Cb ����6Y��xi��Q
���S&�L�9�`a+��ҷLdm���	8�h���T��]�#	�£�n�ƞy�R�.��{F�ۮ�	�LibR���W��@��_�\NT���<5��P�h���{"b��r�c*���ټ\l�����u�Q�&�^,O�M]���]�Ff�љm$�6ִ����\#9���kOg�vc�.��8� j&0����ڟe���3˹�P��C�	ؙ�u����)�O(r�D�TJBw� ��<�f�3"�)� ��.��{*��3��ԧ%�E�
 ����M�mr�c�f�s�e$���E>���W]`W�� �^Vp�#"��SO�8�w9c�M,�T>�Z.�H1�epB�? ���amٚ�R��Q	��|B�Y3w	���>�e�B���c�LƝ1d�֔��CG�n��H]�eI� ��M����D�i5C�Տ��_H�C����YeUB
���zݫ��EH3ԘgĞ��/;fd%��cl�V��9<B�R�?o���Z�hc��R�����7;���>;��I�仮&�UP ��J���K�5�_ĸ@�*BV��.�c��H��/�~L�HpYPl9CH���a���o��,�V(�Tstd&�Ø�[�&Z����Kmf_�k���Ab��
{�x�E鰌L�v]�-%[�n�@֬K
B���0Oy �y��h�ea^�W8Co��h;���eI�p�������f�c�
��~�?��{�X�����l�>u�[�6 a#�#z��5��x��={X���b3����p�f	��#���^�D=�����co)B���,d������0d�#Y��������ƣ�P�]ۚ��q,`��aX��9���c����;�N�A&dm�� �Y��;_��gh�B2t�g8����7�� _㽓�y1�hC�p���6'��jI�o�j3��
��/6]e޹���o}>�B�v��_���6 �4�(�x9��4O�<ʁ�sնm�!&CŬ2I�<�+A1=D��
͑���D�Q�n$�	N��97����T쳏
 �����t���0"0}\�:���X#���T������
pm��o�v5 "x��݀@����J���$4�1��4�����;��j變�l#5�	nB�J�j�5���pf(CvG�q4��Y���2��E���
��f-EnD���
��"{�;��l�D��,o�ȍ�V�"ZGs�K]��G���F9�֚ƶ����x��c�C���
`c�>���a����T���n��!�Xg>�U�-�h���6�ЎE���W8��P�ؗ9�Q�"�fV�D^�iZ�G��,b}q��@��DD�~|��T�>*�f��2��:O5����>��̏ s��$�����Y����rb�&6��N7�Ͷm'���J3����D�"f&>'��u�T[(�ٻ�QB���4�M�!슒�//�̰�
open.png
�  �PNG

   
@X& �at��ӹ�����D G>�`���g�������(`Y�ea֢. �,��W�ikȲ� U5v��≖���S'������<Q�W�\!p��JS/�8��j0���ҁ^��%��0�]a��	�'B�U�q`�]�B�6��Xu%�xyxxxG
E���dG��b��/ֲ�*�CME���s�D"�@wwJ�d2��MW޺��@��a j{����>dYB��$U��Z
E�}��z��W��S�6��*��-�������ˏt&�1��I~[Ȟ�3����4������iZ������n�バ%	Wx��c���r9t]��q166V7H���v=��6\��x��B��k�Y��ɓ�Q�`��ؕ�h}N���ŉi$IfS+S1���x�G��(�F�u_��9����:�/�7w�Zݠ��������:�#��k�Hym��x�/�`WJ�
��uk����~c�����ɎM�4�I��!��"�%�n���ɝC�H�|���۴9���k�]ϝ���� �}=;�N�R    IEND�B`�
index.html
xQ <?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Cache-Control" content="no cache">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- ~dont_cache() -->
  <title>Templeet &LANG&</title>
  	<style type="text/css">
body {
    font-size:1em;
    font-family: Verdana, Tahoma, Arial, Helvetica, sans-serif;
    background: url(?bg.gif);
    margin:0;
    padding: 0;
}


div.installelt {
  margin: 5px 50px 15px 50px;
  background-color: #efe186;
  border-collapse: collapse;
  padding: 10px;
  
  -moz-box-shadow: 5px 5px 10px #111111;  
  -webkit-box-shadow: 5px 5px 10px #111111;  
  box-shadow: 5px 5px 10px #111111;  
}

div.installelt > div:first-child > img {
  vertical-align: middle;
  padding-right: 5px;
  cursor: pointer;
}

div.installelt > div:first-child > img:first-child {
  display: none;  
}

div.installelt > div:first-child > div {
  display: inline;  
}

div.installelt > div:first-child  {
  vertical-align: middle;
  font-weight: bolder;
  font-size: larger;
}

input[type="checkbox"] {
  margin: 0;
}

.button {
  border-radius: 10px;
  -moz-border-radius: 10px;
  border: solid black 1px;
  padding: 5px;
  background: url(?bgbutton.png) repeat-x #aaaaaa;
  cursor: pointer;
  display: inline-block;
}

button.nude {
  border: none;
  background: transparent;
  cursor: pointer;
}

table.config > tbody > tr > td:first-child + td + td {
  color: red;
} 

table.packageinfo {
  border-collapse: collapse;
}

table.packageinfo > tbody > tr > th {
  padding:3px;
}

table.packageinfo > tbody > tr > td {
  padding:3px;
  border: solid 1px black;
} 

div.lang_installer {
  float: right;
  margin-top: 20px;
}

div.lang_installer img {
  padding-right:5px;
  border: 0;
}

table.layout, 
table.layout > tbody,
table.layout > tbody > tr,
table.layout > tbody > tr > td {
  padding: 0px;
  border-collapse: collapse;
  border-spacing: 0px;
}

span.error {
  color:red;
  font-weight: bolder;
}


span.warn {
  color:red;
  font-weight: bolder;
}

img.warn {
  vertical-align: middle;
  padding-right: 5px;
}

</style>

<script type="text/javascript">
//<![CDATA[
install_type="install";
currentblock="";
warningcount=0;

function closeblock(divid) {
  var divcontrol;
  document.getElementById(divid).style.display="none";
  divcontrol=document.getElementById(divid).parentNode.firstElementChild;
  divcontrol.childNodes[0].style.display="inline";
  divcontrol.childNodes[1].style.display="none";
}

function openblock(divid) {
  var divcontrol;
  document.getElementById(divid).style.display="block";
  divcontrol=document.getElementById(divid).parentNode.firstElementChild;
  divcontrol.childNodes[0].style.display="none";
  divcontrol.childNodes[1].style.display="inline";
}

function newblock(divid,title)
{
  var newdiv;
  if (currentblock!="")
    {
      closeblock(currentblock);
    }
  if (document.getElementById("timer"))  
    document.getElementById("timer").parentNode.removeChild(document.getElementById("timer"));
    
  currentblock=divid;
  newdiv=document.createElement('div');
  newdiv.innerHTML='<div>'+
                '<img src="?open.png" onmousedown="openblock(\''+divid+'\')">'+
                '<img src="?close.png" onmousedown="closeblock(\''+divid+'\')"><div id=\''+divid+'-title\'>'+title+'</div></div>'+
                '<div id="'+divid+'"></div>'+
                '<div id="timer"><img src="?loading.gif" style="padding: 10px;" /></div>';
  newdiv.className="installelt";              
  document.getElementById("main").appendChild(newdiv);
  removetimer();
}

function addtextdiv(divid,txt) 
{
  document.getElementById(divid).innerHTML+=txt;
}

function addtext(txt) 
{
  document.getElementById(currentblock).innerHTML+=txt;
}

function addtextn(txt) 
{
  addtext(txt+"<br />");
}

function settitle(txt) 
{
  document.getElementById(currentblock+"-title").innerHTML=txt;
}

function removetimer()
{
  document.getElementById("timer").style.display="none";
}

function addtimer()
{
  document.getElementById("timer").style.display="block";
}

function addbuttons()
{
  parameters+='<button class="nude" name="ok" type="submit"><img src="?ok.png"></button>';
  parameters+='<button class="nude" id="resetform" type="reset"><img src="?reset.png"></button>';
}

function installerror(blocktitle,msg)
{
  phase=10000;
  newblock("error",blocktitle);
  if (!msg)
    msg="";
  addtextn('<img src="?bomb.png"><span class="error">'+msg+'</span>');
  return 0;
}

function installwarning(blocktitle,msg)
{
  warningcount++;
  newblock("warning"+warningcount,'<img src="?warn.png" class="warn"><span class="warn">'+blocktitle+'</span>');
  if (msg)
    addtextn(msg);
  return 0;
}

function htmlentities(s) 
{
  return s.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;");
}

var message_dist=new Object();
function setdistmessages(dist,lang,messages)
{
  if (typeof(message_dist[dist])=="undefined")
    message_dist[dist]=new Object();
  message_dist[dist][lang]=messages;

}
  
setdistmessages('core','fr',{
  "getparam":'Configuration',
  "testphp":'V&eacute;rification de PHP',
  "update":'Mise &agrave; jour de Templeet',
  "zlibenabled":'Support Zlib activ&eacute;',
  "zlibdisabled":'Support Zlib d&eacute;sactiv&eacute;',
  "configok":"La configuration du serveur semble convenir pour l'installation de Templeet",
  "phpversion":'Version PHP : ',
  'password':"Mot de passe administrateur : ",
  'emailislogin':"Utilisation de l'email comme login : ",
  'allowfallbackresource':"Autoriser l'utilisation de FallbackResource : ",
  'useexpire':"Utilisation du syst&egrave;me d'expiration de pages : ",
  'htaccess':"Valeur de la directive Apache AccessFileName : ",
  'serverapache':"Serveur Apache d&eacute;tect&eacute;",
  'servernginx':"Serveur Nginx d&eacute;tect&eacute;",
  'servernone':"Serveur de type inconnu",
  'updateconfig':"Mise &agrave; jour de la configuration du .htaccess :",
  'automaticconfig':"Configuration automatique du .htaccess :",
  'pathinfo':"Pathinfo:",
  'configure404':"Configuration de l'erreur 404 : ",
  'directorymanagement':"Gestion des r&eacute;pertoires par Templeet :",
  'noadminpass':"mot de passe obligatoire",
  'errorgettingpass':"erreur en lecture du mot de passe administrateur",
  'passerr':"erreur en v&eacute;rification du mot de passe",
  'errorlocales':"erreur en v&eacute;rification des locales : ",
  'alreadyset':"Chaque langue ne doit &ecirc;tre d&eacute;finie qu'une seule fois : ",
  "checkconf":"V&eacute;rification de la configuration du serveur",
  "hardfallback":"FallbackResource pr&eacute;-configur&eacute; : ",
  "fallback":"Support de FallbackResource : ",
  "preconf404":"Erreur 404 pr&eacute;-configur&eacute;e : ",
  "err403":"Erreur 403 ou DirectoryIndex pr&eacute;-configur&eacute; : ",
  "optionindexessupport":"Support de Options -Indexes : ",
  "err404support":"Support de l'erreur 404 : ",
  "optionindexespreconf":"Options -Indexes pr&eacute;-configur&eacute;e : ",
  "err403optionindexes":"Support de l'erreur 403 et de Options -Indexes : ",
  "dirindex":"Support de DirectoryIndex : ",
  "pathinfo":"Lecture de PathInfo : ",
  "templeetcall":"Lecture des param&egrave;tres d'appel de Templeet : ",
  "querystring":"Lecture des param&egrave;tres query string : ",
  "noquerystring":"Erreur en lecture des param&egrave;tres query string",
  "charsetdisabled":"Jeu de caract&egrave;re par d&eacute;faut d&eacute;sactiv&eacute; : ",
  "defaultcharset":"Jeu de caract&egrave;re par d&eacute;faut : ",
  "disablecharset":"D&eacute;sactivation du jeu de caract&egrave;re par d&eacute;faut : ",
  "buildcode":'G&eacute;n&eacute;ration du programme',
  "buildconf":'G&eacute;n&eacute;ration de la configuration',
  "errbuildconf":"Erreur en g&eacute;n&eacute;ration de la configuration",
  "buildhtaccess":"G&eacute;n&eacute;ration du fichier d'acc&egrave;s",
  "end2":'Templeet a &eacute;t&eacute; install&eacute; correctement.',
  "installtime":'Dur&eacute;e de l\'installation : ',
  "seconds":' secondes',
  "locales":'Localisation: ',
  "alllocales":'Toutes les locales du serveur',
  "currentlocales":'Configuration actuelle',
  "recomlocales":'Configuration recommand&eacute;e',
  "authenticationmethod":'M&eacute;thode d\'authentification : ',
  "auth_mysql_host":'Serveur : ',
  "auth_mysql_database":'Base de donn&eacute;es : ',
  "auth_mysql_login":'Login : ',
  "auth_mysql_pass":'Mot de passe : ',
  "auth_mysql_tablename":'Table d\'authentification : ',
  "auth_mysql_charset":'Jeu de caract&egrave;res : ',
  "auth_mysql_copyconfig":'Recopier les param&egrave;tres dans config.php : ',
  "error_core_mysqlconnect":'Erreur de connexion mysql : ',
  "error_core_mysqlselect":'Erreur de s&eacute;lection de base : ',
  "authconfig":'Configuration de l\'authentification',
  "mysqlauthconfigured":'Base de donn&eacute;es Mysql d\'authentification configur&eacute;e',
  "timezone":'Timezone : ',
  "advanced":"Param&egrave;tres avanc&eacute;s:",
  "openwriteerror":"Erreur en &eacute;criture de : NAME ",
  "openreaderror":"Erreur en lecture de : NAME ",
  "builderror":"Erreur de construction du code : NAME ",
  "hardtempleet":"Appel de Templeet pr&eacute;configur&eacute; pour les pages : ",
  "checkrootindexfallback":"V&eacute;rification de l'appel de la racine avec FallbackResource : ",
  "hardindex":"Appel de Templeet pr&eacute;configur&eacute; pour les index : ",
  "nopagemethod":"Aucune m&eacute;thode de gestion des pages",
  "nopagemethodmsg":"Les appels des URLs correspondant &agrave; des pages ne seront pas g&eacute;r&eacute;s par Templeet",
  "noindexmethod":"Aucune m&eacute;thode de gestion des index",
  "noindexmethodmsg":"Les appels des URLs correspondant &agrave; des r&eacute;pertoires ne seront pas g&eacute;r&eacute;s par Templeet",
  
  
  
})
setdistmessages('core','en',{ 
  "getparam":'Configuration',
  "testphp":'Checking PHP',
  "update":'Templeet Update',
  "zlibenabled":'Zlib support enabled',
  "zlibdisabled":'Zlib support disabled',
  "configok":'Server configuration looks ok to run Templeet',
  "phpversion":'PHP version : ',
  'password':"Admin password :",
  'emailislogin':"Use email as login : ",
  'allowfallbackresource':"Allow usage of FallbackResource : ",
  'useexpire':"Use page expire system : ",
  'htaccess':"Apache AccessFileName value : ",
  'serverapache':"Apache server detected",
  'servernginx':"Nginx server detected",
  'servernone':"Unknown server type",
  'updateconfig':"Update .htaccess configuration : ",
  'automaticconfig':"Automatic .htaccess configuration : ",
  'pathinfo':"Pathinfo:",
  'configure404':"Configure 404 error : ",
  'directorymanagement':"Directory management done by Templeet : ",
  'noadminpass':"password needed",
  'errorgettingpass':"can't get admin password",
  'passerr':"error checking password",
  'errorlocales':"error checking locales: ",
  'alreadyset':"Language must be defined only once : ",
  "checkconf":"Checking server configuration",
  "hardfallback":"FallbackResource pre-configured : ",
  "fallback":"FallbackResource support : ",
  "preconf404":"Error 404 pre-configured : ",
  "err403":"Error 403 or DirectoryIndex pre-configured : ",
  "optionindexessupport":"Options -Indexes support : ",
  "err404support":"Error 404 support : ",
  "optionindexespreconf":"Options -Indexes preconfigured : ",
  "err403optionindexes":"Error 403 and Options -Indexes support : ",
  "dirindex":"DirectoryIndex support : ",
  "pathinfo":"Retrieving PathInfo information : ",
  "templeetcall":"Retrieving Templeet call information : ",
  "querystring":"Retrieving query string information : ",
  "noquerystring":"Can't retrieve query string information",
  "charsetdisabled":"Default charset disabled : ",
  "defaultcharset":"Default charset : ",
  "disablecharset":"Disable charset : ",
  "buildcode":'Build code',
  "buildconf":'Build config',
  "errbuildconf":"Error building config",
  "buildhtaccess":"Building access file",
  "end2":'Templeet was installed successfully.',
  "installtime":'Install time: ',
  "seconds":' seconds',
  "locales":'Localisation: ',
  "alllocales":'All server locales',
  "currentlocales":'Current configuration',
  "recomlocales":'Recommanded configuration',
  "authenticationmethod":'Authentication method :',
  "auth_mysql_host":'Host :',
  "auth_mysql_database":'Database :',
  "auth_mysql_login":'Login :',
  "auth_mysql_pass":'Password :',
  "auth_mysql_tablename":'Authentication table : ',
  "auth_mysql_charset":'Charset :',
  "auth_mysql_copyconfig":'Copy parameters to config.php : ',
  "error_core_mysqlconnect":'Mysql connect error : ',
  "error_core_mysqlselect":'Mysql base select error : ',
  "authconfig":'Authentication configuration',
  "mysqlauthconfigured":'Mysql authentication database configured',
  "timezone":'Timezone : ',
  "advanced":"Advanced parameters",
  "openwriteerror":"Erreur en &eacute;criture de : NAME ",
  "openreaderror":"Erreur en lecture de : NAME ",
  "builderror":"Erreur de construction du code : NAME ",
  "hardtempleet":"Templeet call pre-configured for pages : ",
  "checkrootindexfallback":"Check root call with FallbackResource : ",
  "hardindex":"Templeet call pre-configured for indexes : ",
  "nopagemethod":"No page method support",
  "nopagemethodmsg":"URL calls corresponding to pages won't be handled by Templeet",
  "noindexmethod":"No index method support",
  "noindexmethodmsg":"URL calls corresponding to indexes won't be handled by Templeet",


})
setdistmessages('postgresql','fr',{
  "auth_postgresql_host":'Serveur : ',
  "auth_postgresql_database":'Base de donn&eacute;es : ',
  "auth_postgresql_login":'Login : ',
  "auth_postgresql_pass":'Mot de passe : ',
  "auth_postgresql_tablename":'Table d\'authentification : ',
  "auth_postgresql_charset":'Jeu de caract&egrave;res : ',
  "error_postgresql_connect":'Erreur de connexion PostgreSQL : ',
  "authconfig":'Configuration de l\'authentification',
  "authconfigured":'Base de donn&eacute;es PostgreSQL d\'authentification configur&eacute;e',
  
})
setdistmessages('postgresql','en',{ 
  "auth_postgresql_host":'Host :',
  "auth_postgresql_database":'Database :',
  "auth_postgresql_login":'Login :',
  "auth_postgresql_pass":'Password :',
  "auth_postgresql_tablename":'Table d\'authentification : ',
  "auth_postgresql_charset":'Charset :',
  "error_postgresql_connect":'PostgreSQL connect error : ',
  "authconfig":'Authentication configuration',
  "authconfigured":'PostgreSQL authentication database configured',

})
setdistmessages('templeet4_admin','fr',{
  "continue":'Utiliser Templeet',
})
setdistmessages('templeet4_admin','en',{ 
  "continue":'Use Templeet',
})
setdistmessages('templeet4_doc','fr',{
})
setdistmessages('templeet4_doc','en',{ 
})
setdistmessages('templeet4_doc_fr','fr',{
})
setdistmessages('templeet4_doc_fr','en',{ 
})
setdistmessages('minify','fr',{
  "cantinstall":"Erreur de configuration de minify",

  
})
setdistmessages('core','en',{ 
  "cantinstall":"Minify configuration error",

})

setdistmessages('INST','fr',{
  "cantinstall":"Erreur &agrave; l'installation du package",
  "packageinstall":'Installation de package',
  "templeetinstall":'Installation de Templeet',
  "extract":"Extraction des fichiers",
  "package":"Package",
  "snapshotid":"Snapshot id",
  "snapshotdate":"Date du snapshot",
  "end":"Installation termin&eacute;e",
  "runinstall":"D&eacute;marrer l'installation",
  "noanswer":"Pas de r&eacute;ponse du serveur",
  "filesextracted":"Fichiers extraits: ",
  "cperror":"Erreur de clef de param&egrave;tres",
  'fileupdated':'mis &agrave; jour',
  'fileextracted':'extrait',
  'filenotrestored':'non restaur&eacute;',
  'fileunchanged':'inchang&eacute;',
  'fileunlinked':'effac&eacute;',
  "registermodule":"Enregistrement des modules",
  "nophp":"fichier non PHP",
  "library":"Biblioth&egrave;que",
  "module":"Module",
  "continue":'Continuer',

  "checkdep":'V&eacute;rification des d&eacute;pendances',
  "getparam":'Configuration',
  "testphp":'V&eacute;rification de PHP',
  "update":'Mise &agrave; jour',
  "zlibenabled":'Support Zlib activ&eacute;',
  "zlibdisabled":'Support Zlib d&eacute;sactiv&eacute;',
  "phpversion":'Version PHP : ',
  "badphp":'La version de PHP doit &ecirc;tre sup&eacute;rieure &agrave; 5.1 ',
  "badregistry":'Erreur dans le fichier de registres',
  "baddep":'Erreur de structure des d&eacute;pendances.',
})
  
var proto=document.location.protocol;
var host=document.location.host;
var uri=document.location.pathname;
var uridir=uri.substr(0,uri.lastIndexOf("/"));
var acceptedlanguages="&ACCEPTEDLANGUAGES&";
var inst_update=0;
var distid="201606171145";
var makeinstall_disable=new Array();
var makeinstall_nodisplay=new Array("config_buttons");


function getmessage(distname,messagelabel)
{
  var distmessages;
  
  distmessages=message_dist[distname];
  var lang="&LANG&";
  
  if (!distmessages[lang])
    {
      var tmplang=acceptedlanguages.split(",");
      for (lang in tmplang)  
        {
          if (typeof(distmessages[lang])!="undefined")
            break;
        }
    }
        
  if (!distmessages[lang] && distmessages["en"])
    {
      lang="en";
    }
    
  if (!distmessages[lang])
    { 
      for (lang in distmessages)  
        {
          break;
        }
    }  
   
  if (!distmessages[lang][messagelabel])
    return "unknown label: "+messagelabel+" for package "+distname+" in language : "+lang+" ";
       
  return distmessages[lang][messagelabel];
}

function clone(obj)
{
  if(typeof(obj) != 'object' || obj == null)
    return obj;
    
  var newobj = {};
  for(var i in obj)
    newobj[i]=clone(obj[i]);
  return newobj;
}

function state_Change()
{
  if (http.readyState==4)
    {
      clearTimeout(id_timeout);     
      removetimer(); 
      the_loop();
    }
}

function timeout_request()
{
  http.abort();
  removetimer(); 

  the_loop();
}

function testrequri(url,action,param)
{
  var txt;
  
  http = new XMLHttpRequest(); 
  http.open("POST", url, true);
  http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  http.onreadystatechange=state_Change;
  id_timeout=setTimeout(timeout_request,10000);
  addtimer();
  txt="";
  if (action)
    {
      txt="action="+action;
      if (typeof(cp_key)!="undefined")
        txt+="&key="+cp_key;
    }
    
  for(var keyparam in param)
    {
      if (txt!="")
        {
          txt+="&";
        }
      txt+=keyparam+"="+encodeURIComponent(param[keyparam]);
    }
  
  http.send(txt);
}

function testgetrequri(url)
{
  http = new XMLHttpRequest(); 
  http.open("GET", url, true);
  http.onreadystatechange=state_Change;
  id_timeout=setTimeout(timeout_request,10000);
  addtimer();
  http.send("");
}

function makeaction(param) {
  testrequri(proto+"//"+host+uri,the_loop_action,param);
}

function resetparameterform()
{
  var tmpreset;
  var func;
  
  tmpreset=array_resetform.slice(0);
  
  func=tmpreset.shift();
  while(func)
    {
      func();
      func=tmpreset.shift();
    }
  return 1;        
}

preextract_func=[
'pre_000_core_00',
function () {

auth_type={ file: "" ,
            db:{}};

return 1;   
}
,'pre_001_packagemaster_01',
function () {

if (install_type=="package")
    newblock("preinstall",getmessage('INST','packageinstall'));
  else  
    newblock("preinstall",getmessage('INST','templeetinstall')); 
config_def=new Array();

makeaction();

return 0;   
}
,'pre_001_packagemaster_02',
function () {

if (http.status!=200) 
  return installerror(getmessage('INST',"cantinstall"),getmessage('INST',"noanswer"));
  
var res=http.responseText.split("|");

if (res[0]!="ok")
    {
      addtextn(res[1]);
      return 0;
    }  
    
var mes='<table class="packageinfo"><tr><th>'+getmessage('INST',"package")+'</th><th>'+getmessage('INST',"snapshotid")+'</th><th>'+
          getmessage('INST',"snapshotdate")+'</th></tr>';
 
packages=new Array();          
i=1;
while(res[i]) {
  package=res[i].split(",");
  packages[package[0]]={snapshotid:package[1], snapshotdate:package[2]};
  mes+="<tr><td>"+package[0]+"</td><td>"+package[1]+"</td><td>"+package[2]+"</td></tr>";
  i++;
}
mes+="</table>"
addtext(mes);

addtextn(getmessage('INST','testphp'));
makeaction();

return 0;   
}
,'pre_001_packagemaster_03',
function () {
if (http.status!=200)
  {
    addtextn(getmessage('INST',"cantinstall"));
    return 0;
  }
  
res=http.responseText.split("|");
addtextn(getmessage('INST',"phpversion")+res[1]);

if (res[0]=="ok")
    {
      addtextn(getmessage('INST',res[2]));
      if (res[3]=="update")
          {
            settitle(getmessage('INST',"update"));
            inst_update=1;
          }
        else
          inst_update=0;
    }
  else
    {
      addtextn(getmessage('INST',"cantinstall"));
      if (res[2]=="zlibdisabled")
        addtextn(getmessage('INST',"zlibdisabled"));
      if (res[4]=="phpnotok")
        addtextn(getmessage('INST',"badphp"));

      return 0;
    }  
return 1;   
}
,'pre_001_packagemaster_11',
function () {
return 1;
newblock("checkdep",getmessage('INST','checkdep')); 
makeaction();

return 0;   
}
,'pre_001_packagemaster_12',
function () {
return 1;
if (http.status!=200)
  {
    addtextn(getmessage('INST',"cantinstall"));
    return 0;
  }
  
res=http.responseText.split("|");

if (res[0]=="ok")
    {
//      addtextn(getmessage('INST',res[1]));
      addtextn(res[1]);
    }
  else
    {
      addtextn(getmessage('INST',"cantinstall"));
      addtextn(getmessage('INST',res[1]));

      return 0;
    }  
    
return 1;   
}
,'pre_010_core_10',
function () {

makeaction({update:inst_update});

return 0;   
}
,'pre_010_core_11',
function () {
if (http.status!=200)
  {
    addtextn(getmessage('INST',"cantinstall"));
    return 0;
  }
  
res=http.responseText.split("|");

if (res[0]=="ok")
    {
      core_alllocales=res[1];
      core_currentlocales=res[2];
      config_def['core_locales']=core_recomlocales=res[3];
    }
  else
    {
      addtextn(getmessage('INST',"cantinstall"));
      return 0;
    }  
return 1;   
}
,'pre_010_core_12',
function () {

makeaction();

return 0;   
}
,'pre_010_core_13',
function () {
if (http.status!=200)
  {
    addtextn(getmessage('INST',"cantinstall"));
    return 0;
  }
  
res=http.responseText.split("|");

if (res[0]=="ok")
    {
      core_timezone_select=res[1];

    }
  else
    {
      addtextn(getmessage('INST',"cantinstall"));
      return 0;
    }  
return 1;   
}
,'pre_010_core_20',
function () {

config_def['core_adminpass']='';
config_def['core_emailislogin']=0;
config_def['core_allowfallbackresource']=1;
config_def['core_expirepage']=1;
config_def['core_htaccess']='.htaccess';
config_def['core_usesetlocale']=1;
config_def['core_authtype']="file";

config_def['core_authtype_s_db']="mysql";
config_def['core_authtype_db_mysql_host']="localhost";
config_def['core_authtype_db_mysql_database']="templeet";
config_def['core_authtype_db_mysql_login']="";
config_def['core_authtype_db_mysql_passwd']="";
config_def['core_authtype_db_mysql_tablename']="templeetauth";
config_def['core_authtype_db_mysql_charset']="UTF8";
config_def['core_authtype_db_mysql_copyconfig']=1;

return 1;   
}
,'pre_010_core_30',
function () {

//config_def['core_virtualhostsupport']=1;

makeaction({update:inst_update});

return 0;   
}
,'pre_010_core_31',
function () {
if (http.status!=200)
  {
    addtextn(getmessage('INST',"cantinstall"));
    return 0;
  }
  
res=http.responseText.split("|");

if (res[0]=="ok")
    {
      core_servername=res[1];
      core_virtualhost_configpath=res[2];
    }
  else
    {
      addtextn(getmessage('INST',"cantinstall"));
      return 0;
    }
    
server=http.getResponseHeader ("server");
if (/apache/i.test(server))
  {
    config_def['core_servertype']="apache";
    addtextn(getmessage('core',"serverapache"));
  }
else if (/nginx/i.test(server))
  {
    config_def['core_servertype']="nginx";
    addtextn(getmessage('core',"servernginx"));
  }
else
  {
    addtextn(getmessage('core',"servernone"));
  }

return 1;   
}
,'pre_010_core_50',
function () {

auth_type.db.mysql= '<table class="layout">'+ 
                     '<tr><td style="padding: 2px;">'+getmessage('core','auth_mysql_host')+'</td><td><input id="core_auth_type_mysql_host" type="text" size="40" value="'+
                            (typeof(config_def['core_authtype_db_mysql_host'])=="string"?config_def['core_authtype_db_mysql_host']:"")+'"></td></tr>'+
                     '<tr><td style="padding: 2px;">'+getmessage('core','auth_mysql_database')+'</td><td><input id="core_auth_type_mysql_database" type="text" size="40" value="'+
                            (typeof(config_def['core_authtype_db_mysql_database'])=="string"?config_def['core_authtype_db_mysql_database']:"")+'"></td></tr>'+
                     '<tr><td style="padding: 2px;">'+getmessage('core','auth_mysql_login')+'</td><td><input id="core_auth_type_mysql_login" type="text" size="40" value="'+
                            (typeof(config_def['core_authtype_db_mysql_login'])=="string"?config_def['core_authtype_db_mysql_login']:"")+'"></td></tr>'+
                     '<tr><td style="padding: 2px;">'+getmessage('core','auth_mysql_pass')+'</td><td><input id="core_auth_type_mysql_pass" type="password" size="40" value="'+
                            (typeof(config_def['core_authtype_db_mysql_passwd'])=="string"?config_def['core_authtype_db_mysql_passwd']:"")+'"></td></tr>'+
                     '<tr><td style="padding: 2px;">'+getmessage('core','auth_mysql_tablename')+'</td><td><input id="core_auth_type_mysql_tablename" type="text" size="40" value="'+
                            (typeof(config_def['core_authtype_db_mysql_tablename'])=="string"?config_def['core_authtype_db_mysql_tablename']:"")+'"></td></tr>'+
                     '<tr><td style="padding: 2px;">'+getmessage('core','auth_mysql_charset')+'</td><td><select id="core_auth_type_mysql_charset">'+ 
                             '<option value="UTF8" '+
                                  (typeof(config_def['core_authtype_db_mysql_charset'])=="string" &&
                                   config_def['core_authtype_db_mysql_charset']=="UTF8"?'selected="selected"':"")+'>UTF-8</option>'+
                             '<option value="latin1" '+
                                  (typeof(config_def['core_authtype_db_mysql_charset'])=="string" &&
                                   config_def['core_authtype_db_mysql_charset']=="latin1"?'selected="selected"':"")+'>ISO8859-1</option>'+
                             '</select>'+
                           '</td></tr>'+
                     '<tr><td style="padding: 2px;">'+getmessage('core','auth_mysql_copyconfig')+
                         '</td><td><input id="core_auth_type_mysql_copyconfig" type="checkbox" '+
                            (typeof(config_def['core_authtype_db_mysql_copyconfig'])!="undefined" && config_def['core_authtype_db_mysql_copyconfig']?'checked="checked"':"")+'></td></tr>'+
                   '</table>';
                   
return 1;   
}
,'pre_010_core_99',
function () {
  addtextn(getmessage('core',"configok"));
  return 1;   
}
,'pre_010_postgresql_20',
function () {

config_def['authtype_db_postgresql_host']="localhost";
config_def['authtype_db_postgresql_database']="templeet";
config_def['authtype_db_postgresql_login']="";
config_def['authtype_db_postgresql_passwd']="";
config_def['authtype_db_postgresql_tablename']="templeetauth";
config_def['authtype_db_postgresql_charset']="UTF8";

return 1;   
}
,'pre_010_postgresql_50',
function () {

auth_type.db.postgresql= '<table class="layout">'+ 
                     '<tr><td style="padding: 2px;">'+getmessage('postgresql','auth_postgresql_host')+'</td><td><input id="auth_type_postgresql_host" type="text" size="40" value="'+
                            (typeof(config_def['authtype_db_postgresql_host'])=="string"?config_def['authtype_db_postgresql_host']:"")+'"></td></tr>'+
                     '<tr><td style="padding: 2px;">'+getmessage('postgresql','auth_postgresql_database')+'</td><td><input id="auth_type_postgresql_database" type="text" size="40" value="'+
                            (typeof(config_def['authtype_db_postgresql_database'])=="string"?config_def['authtype_db_postgresql_database']:"")+'"></td></tr>'+
                     '<tr><td style="padding: 2px;">'+getmessage('postgresql','auth_postgresql_login')+'</td><td><input id="auth_type_postgresql_login" type="text" size="40" value="'+
                            (typeof(config_def['authtype_db_postgresql_login'])=="string"?config_def['authtype_db_postgresql_login']:"")+'"></td></tr>'+
                     '<tr><td style="padding: 2px;">'+getmessage('postgresql','auth_postgresql_pass')+'</td><td><input id="auth_type_postgresql_pass" type="password" size="40" value="'+
                            (typeof(config_def['authtype_db_postgresql_passwd'])=="string"?config_def['authtype_db_postgresql_passwd']:"")+'"></td></tr>'+
                     '<tr><td style="padding: 2px;">'+getmessage('postgresql','auth_postgresql_tablename')+'</td><td><input id="auth_type_postgresql_tablename" type="text" size="40" value="'+
                            (typeof(config_def['authtype_db_postgresql_tablename'])=="string"?config_def['authtype_db_postgresql_tablename']:"")+'"></td></tr>'+
                     '<tr><td style="padding: 2px;">'+getmessage('postgresql','auth_postgresql_charset')+'</td><td><select id="auth_type_postgresql_charset">'+ 
                             '<option value="UTF8" '+
                                  (typeof(config_def['authtype_db_postgresql_charset'])=="string" &&
                                   config_def['authtype_db_postgresql_charset']=="UTF8"?'selected="selected"':"")+'>UTF-8</option>'+
                             '<option value="latin1" '+
                                  (typeof(config_def['authtype_db_postgresql_charset'])=="string" &&
                                   config_def['authtype_db_postgresql_charset']=="latin1"?'selected="selected"':"")+'>ISO8859-1</option>'+
                             '</select>'+
                           '</td></tr>'+
                   '</table>';
                
                  
return 1;   
}
  ];
  
config_func=[
  '001_packagemaster_01',function () {
newblock("getparam",getmessage('INST','getparam'));


return 1;   
}
,'010_core_01',function () {

keepfile.push('./templeet/serverconf.php',
              './templeet/config.php',
              './templeet/auth/config.php',
              './templeet/auth/users.php',
              './templeet/auth/login.php',
              './templeet/auth/area/0.php');

makeinstall_disable.push('core_adminpass','core_expirepage','core_htaccess','core_usesetlocale','core_locales','core_timezone');
makeinstall_disable.push('core_authtype_s',
                         'core_auth_type_mysql_host',
                         'core_auth_type_mysql_database',
                         'core_auth_type_mysql_login',
                         'core_auth_type_mysql_pass',
                         'core_auth_type_mysql_tablename',
                         'core_auth_type_mysql_charset',
                         'core_auth_type_mysql_copyconfig');
makeinstall_nodisplay.push("core_setalllocales","core_setrecomlocales","core_setcurrentlocales");
              
core_checkupdateconfig=function() 
{
  if (document.getElementById("core_updateconfig_check").checked)
      document.getElementById("core_updateconfig").style.display="table-row";
    else  
      document.getElementById("core_updateconfig").style.display="none";  
  return 1;
}

core_checkautomaticconfig=function() 
{
  if (document.getElementById("core_automaticconfig").checked)
      {
        document.getElementById("core_manualconfig1").style.display="none";
        document.getElementById("core_manualconfig2").style.display="none";
      }  
    else 
      { 
        document.getElementById("core_manualconfig1").style.display="block";
        document.getElementById("core_manualconfig2").style.display="block";
      }
  return 1;
}

core_checkdirectorymanagement=function() 
{
  if (document.getElementById("core_directorymanagement").checked)
      {
        document.getElementById("core_directorymanagement_select").style.display="block";
      }  
    else 
      { 
        document.getElementById("core_directorymanagement_select").style.display="none";
      } 
  return 1;
}  

core_resetform=function() 
{

  if (document.getElementById("core_updateconfig_check"))
    {
        document.getElementById("core_updateconfig").style.display="none";
    }  
    
//  document.getElementById("core_manualconfig1").style.display="none";
//  document.getElementById("core_manualconfig2").style.display="none";
//  document.getElementById("core_directorymanagement_select").style.display="block";
}

core_checkparam=function()
{
  var passregexpr=/^.{4,}$/;
  var okparam;
  okparam=true;
  
  if (passregexpr.test(document.getElementById("core_adminpass").value))
      {
        document.getElementById("error_core_adminpass").innerHTML="";
      }
    else
      {
        document.getElementById("error_core_adminpass").innerHTML=getmessage('core','noadminpass');
        okparam=false;  
      }  
      
  return okparam;    
}

core_openlocale=function() 
  { 
    var localediv;
    document.getElementById("core_localediv_opened").style.display="block";
    document.getElementById("core_localediv_closed").style.display="none";
  }

core_closelocale=function()  
  {
    var localediv;
    document.getElementById("core_localediv_opened").style.display="none";
    document.getElementById("core_localediv_closed").style.display="block";
  }  
  
core_openadvanced=function() 
  {
    document.getElementById("core_advanced_opened").style.display="block";
    document.getElementById("core_advanced_closed").style.display="none";
    modAdvanced("table-row");
  }

core_closeadvanced=function()  
  {
    document.getElementById("core_advanced_opened").style.display="none";
    document.getElementById("core_advanced_closed").style.display="block";
    modAdvanced("none");
  }  
  
function modAdvanced(value)
{
	if (!document.styleSheets) return;
	var thecss = new Array();
  
  for (var stylenum=0;stylenum<document.styleSheets.length;stylenum++)
    {
      if (document.styleSheets[stylenum].cssRules)  // Standards Compliant
        {
          thecss = document.styleSheets[stylenum].cssRules;
        }
      else
        {         
          thecss = document.styleSheets[stylenum].rules;  // IE 
        }
      for (var i=0;i<thecss.length;i++)
        {
          if ((thecss[i].selectorText=='.coreAdvanced'))
            {
              thecss[i].style.cssText="display:"+value;
              return;
            }
        }
   
    }
}
 
  
function addAdvanced()
{
  var style = document.createElement('style');
  style.type = 'text/css';
  style.innerHTML = '.coreAdvanced {display: none; }'; 
  document.getElementsByTagName('head')[0].appendChild(style);
}

core_usesetlocalechange=function()
  {
    if (document.getElementById("core_usesetlocale").checked)
      {
        document.getElementById("core_localediv").style.display="block";
      }  
    else 
      { 
        document.getElementById("core_localediv").style.display="none";
      } 

  }

core_setalllocales=function()
  {
    document.getElementById("core_locales").value=core_alllocales;
    return false;
  }
  
core_setcurrentlocales=function()
  {
    document.getElementById("core_locales").value=core_currentlocales;
    return false;
  }
  
core_setrecomlocales=function()
  {
    document.getElementById("core_locales").value=core_recomlocales;
    return false;
  }
  
core_changeauthselect=function(name,ids)
  {
    var typeselected=document.getElementById(name).value;
    
    for (var i in ids)
      {
        if (ids[i]==typeselected)
            {
              document.getElementById(name+"_"+ids[i]).style.display="block";
            }  
          else
            {  
              document.getElementById(name+"_"+ids[i]).style.display="none";
            }  
      }
  }
  
core_authgetparam=function(baseid,parameters)
  {
    var res;
    if (typeof(parameters)=="string")
        {
          return parameters;
        }
      else
        {
          var typename,typeparam,ids,selected,def;
          if (typeof(config_def[baseid])!="undefined")
              {
                def=config_def[baseid];
              }
            else
              {
                for (param in parameters)
                  {
                    def=param;
                    break;
                  }
              }  
          typename=typeparam=ids="";
          
          for (param in parameters)
            {
              selected=(param==def);
              typename+='<option value="'+param+'" '+(selected?'selected="selected"':"")+'>'+param+'</option>';
              typeparam+='<div id="'+baseid+'_s_'+param+'" style="display:'+(selected?"block":"none")+'">'+parameters[param]+'</div>';
              if (ids!="")
                ids+=",";
          
              ids+="'"+param+"'";              

            }
          makeinstall_disable.push(baseid+'_s');
          return '<table class="layout"><tr><td style="vertical-align: top;"><select id="'+baseid+'_s" onchange="core_changeauthselect(\''+
                          baseid+'_s\',['+ids+']);">'+typename+'</select></td></tr><tr><td>'+typeparam+'</td></tr></table>';
        }  
  }  
  
if (inst_update)
    core_locales=core_currentlocales;  
  else
    core_locales=(typeof(config_def['core_locales'])!="undefined"?config_def['core_locales']:"");

array_resetform.push(core_resetform);
array_checkparam.push(core_checkparam);

parameters+='<tr><td>'+getmessage('core','password')+'</td><td><input type="password" size="20" id="core_adminpass" value="'+
             (typeof(config_def['core_adminpass'])!="undefined"?config_def['core_adminpass']:"")+
            '"></td><td id="error_core_adminpass"></td></tr>\n';
            
if(!inst_update)
  {
    parameters+='<tr><td>'+getmessage('core','emailislogin')+'</td><td><input type="checkbox" id="core_emailislogin" '+
                 (typeof(config_def['core_emailislogin'])!="undefined" && config_def['core_emailislogin']?'checked="checked"':"")+
                '></td><td></td></tr>\n';
    makeinstall_disable.push("core_emailislogin");
    
    var dbtype,dbparam,ids;
    dbtype="";
    dbparam="";
    ids="";
    var selected;
    for (var type in auth_type)
      {
        selected=typeof(config_def['core_authtype'])!="undefined" && config_def['core_authtype']==type;
        dbtype+='<option value="'+type+'" '+
          (selected?'selected="selected"':"")+
           '>'+type+"</option>\n";    
           
        dbparam+='<div id="core_authtype_s_'+type+'" style="display: '+(selected?"block":"none")+';">'+
                    core_authgetparam("core_authtype_s_"+type,auth_type[type])+"</div>\n";   
        if (ids!="")
          ids+=",";
          
        ids+="'"+type+"'";              
      }
          
    parameters+='<tr><td style="vertical-align: top;">'+getmessage('core','authenticationmethod')+'</td><td><table class="layout"><tr><td style="vertical-align: top;">'+
                '<select id="core_authtype_s" onchange="core_changeauthselect(\'core_authtype_s\',['+ids+']);">'+dbtype+
                '</select></td></tr><tr><td style="vertical-align: top;">'+dbparam+'</td></tr></table></td><td id="error_core_authtype"></td></tr>';
                
    makeinstall_disable.push("core_authtype");
    
  }  

parameters+='<tr><td>'+getmessage('core','useexpire')+'</td><td><input type="checkbox" id="core_expirepage" '+
                 (typeof(config_def['core_expirepage'])!="undefined" && config_def['core_expirepage']?'checked="checked"':"")+
                '></td><td></td></tr>\n';


parameters+='<tr><td style="vertical-align: top;">'+getmessage('core','timezone')+'</td><td>'+
            core_timezone_select+'</td><td id="error_core_timezone"></td></tr>\n';
            
parameters+='<tr ><td colspan="3" style="height: 20px;"></td></tr>\n'; 
           
            
parameters+='<tr><td style="vertical-align: top;">'+getmessage('core','advanced')+'</td><td>'+

                   '<div id="core_advanced_closed"><img src="?core/plus.png" onmousedown="core_openadvanced()"></div>'+
                   '<div id="core_advanced_opened" style="display: none;"><img src="?core/minus.png" onmousedown="core_closeadvanced()"></div>'+
               '</td><td id="error_core_advanced"></td></tr>\n';
addAdvanced();


parameters+='<tr class="coreAdvanced"><td>'+getmessage('core','htaccess')+'</td><td><input type="text" id="core_htaccess" value="'+
             (typeof(config_def['core_htaccess'])!="undefined"?config_def['core_htaccess']:".htaccess")+
                '"></td><td></td></tr>\n';

parameters+='<tr class="coreAdvanced"><td style="vertical-align: top;">'+getmessage('core','locales')+'</td><td>'+
               '<input type="checkbox" id="core_usesetlocale" '+
                 (typeof(config_def['core_usesetlocale'])!="undefined" && config_def['core_usesetlocale']?'checked="checked"':"")+
               ' onchange="core_usesetlocalechange()">'+
               '<div id="core_localediv"'+
                 (typeof(config_def['core_usesetlocale'])!="undefined" && config_def['core_usesetlocale']?"":'style="display:none;"')+
               '>'+
                   '<div id="core_localediv_closed"><img src="?core/plus.png" onmousedown="core_openlocale()"></div>'+
                   '<div id="core_localediv_opened" style="display: none;"><img src="?core/minus.png" onmousedown="core_closelocale()" style="vertical-align: top;">'+
                   '<textarea id="core_locales" style="width: 100%; height: 200px;">'+
                   htmlentities(core_locales)+
                   '</textarea>'+
                   '<div class="button" id="core_setalllocales" onclick="return core_setalllocales();">'+getmessage('core','alllocales')+'</div> '+
                   '<div class="button" id="core_setrecomlocales" onclick="return core_setrecomlocales();">'+getmessage('core','recomlocales')+'</div> '+
                   (inst_update?'<div class="button" id="core_setcurrentlocales" onclick="return core_setcurrentlocales();">'+getmessage('core','currentlocales')+'</div> ':"")+
                   '</div>'+
               '</div>'+    
               '</td><td id="error_core_locales"></td></tr>\n';
  
parameters+='<tr class="coreAdvanced"><td style="vertical-align: top;">'+getmessage('core','allowfallbackresource')+'</td><td>'+
               '<input type="checkbox" id="core_allowfallbackresource" '+
                 (typeof(config_def['core_allowfallbackresource'])!="undefined" && config_def['core_allowfallbackresource']?'checked="checked"':"")+
               ' >'+
               '</td><td id="error_core_allowfallbackresource"></td></tr>\n';
            
  
parameters+='<tr ><td colspan="3" style="height: 20px;"></td></tr>\n';  
           
return 1;   
}
,'999_packagemaster_01',function () {

parameters+='<tr><td colspan="3">'+getmessage('INST',"runinstall")+'</td></tr>';


return 1;   
}
  ];
  
checkparam_func=[
  'cp_0000',
function() {
  makeaction();
  return 1;
}
,'cp_010_core_01',
function () {
  makeaction({pass:document.getElementById("core_adminpass").value});
  return 0;
}
,'cp_010_core_02',
function () {

if (inst_update)
  {
    if (http.status!=200)
      {
        installerror(getmessage('INST',"cantinstall"),getmessage('INST',"noanswer"));
        return 0;
      }
      
    res=http.responseText.split("|");
    
    if (res[1]=="errorgettingpass")
      {  
        document.getElementById("error_core_adminpass").innerHTML=getmessage('core','errorgettingpass');
        return 0;
      }  
    else if(res[1]=="passerr")
      {
        document.getElementById("error_core_adminpass").innerHTML=getmessage('core','passerr');
        return 0;
      }  
    
    document.getElementById("error_core_adminpass").innerHTML=""
  }  
  
config_param['core_adminpass']=document.getElementById("core_adminpass").value;
if (!inst_update)
  config_param['core_emailislogin']=document.getElementById("core_emailislogin").checked;
config_param['core_allowfallbackresource']=document.getElementById("core_allowfallbackresource").checked;  
  
config_param['core_expirepage']=document.getElementById("core_expirepage").checked;
config_param['core_htaccess']=document.getElementById("core_htaccess").value;  
/*
config_param['core_automaticconfig']=document.getElementById("core_automaticconfig").checked;  
config_param['core_pathinfo']=document.getElementById("core_pathinfo").checked;  
config_param['core_configure404']=document.getElementById("core_configure404").checked;  
config_param['core_directorymanagement']=document.getElementById("core_directorymanagement").checked;  
config_param['core_directorymanagement_method']=document.getElementById("core_directorymanagement_method").value;
*/
config_param['core_installeruridir']=uridir;

makeaction();
return 0;   
}
,'cp_010_core_03',
function () {
  config_param['core_usesetlocale']=document.getElementById("core_usesetlocale").checked;  
  makeaction({
               uselocales:config_param['core_usesetlocale'], 
               locales:document.getElementById("core_locales").value
             });
  return 0;
}
,'cp_010_core_04',
function () {

if (http.status!=200)
  {
    installerror(getmessage('INST',"cantinstall"),getmessage('INST',"noanswer"));
    return 0;
  }
  
if (config_param['core_usesetlocale'])
  {  
    res=http.responseText.split("|");
    
    if (res[1]=="errlocale")
      {  
        document.getElementById("error_core_locales").innerHTML=getmessage('core','errorlocales')+res[2];
        return 0;
      }  
        
    if (res[1]=="alreadyset")
      {  
        document.getElementById("error_core_locales").innerHTML=getmessage('core','alreadyset')+res[2];
        return 0;
      }  
        
    config_param['core_locales']=document.getElementById("core_locales").value;  
  }  
  
document.getElementById("error_core_locales").innerHTML="";
makeaction();  
return 0;   
}
,'cp_010_core_11',
function () {
if (inst_update)
  {
    makeaction({update:1});
    return 0;
  }  
  
config_param['core_authtype_s']=document.getElementById("core_authtype_s").value;  
config_param['core_authtype_s_db_s']=document.getElementById("core_authtype_s_db_s").value;
config_param['core_auth_type_mysql_host']=document.getElementById("core_auth_type_mysql_host").value;
config_param['core_auth_type_mysql_database']=document.getElementById("core_auth_type_mysql_database").value;
config_param['core_auth_type_mysql_login']=document.getElementById("core_auth_type_mysql_login").value;
config_param['core_auth_type_mysql_pass']=document.getElementById("core_auth_type_mysql_pass").value;
config_param['core_auth_type_mysql_tablename']=document.getElementById("core_auth_type_mysql_tablename").value;
config_param['core_auth_type_mysql_charset']=document.getElementById("core_auth_type_mysql_charset").value;
config_param['core_auth_type_mysql_copyconfig']=document.getElementById("core_auth_type_mysql_copyconfig").checked;

makeaction({
             core_authtype_s:config_param['core_authtype_s'], 
             core_authtype_s_db_s:config_param['core_authtype_s_db_s'],
             core_auth_type_mysql_host:config_param['core_auth_type_mysql_host'],
             core_auth_type_mysql_database:config_param['core_auth_type_mysql_database'],
             core_auth_type_mysql_login:config_param['core_auth_type_mysql_login'],
             core_auth_type_mysql_pass:config_param['core_auth_type_mysql_pass'],
             core_auth_type_mysql_charset:config_param['core_auth_type_mysql_charset'],
             core_snapshotdate:packages["core"].snapshotdate,
           });
return 0;
}
,'cp_010_core_12',
function () {

if (inst_update)
  {
    makeaction();
    return 0;
  }  

if (http.status!=200)
  {
    installerror(getmessage('INST',"cantinstall"),getmessage('INST',"noanswer"));
    return 0;
  }
  
if (config_param['core_authtype_s']=="db" && config_param['core_authtype_s_db_s']=="mysql")
  {  
    res=http.responseText.split("|");
    
    if (res[1]=="errconnect")
      {  
        document.getElementById("error_core_authtype").innerHTML=getmessage('core','error_core_mysqlconnect')+res[2];
        return 0;
      }  
    if (res[1]=="errselect")
      {  
        document.getElementById("error_core_authtype").innerHTML=getmessage('core','error_core_mysqlselect')+res[2];
        return 0;
      }  
        
  }  
  
document.getElementById("error_core_authtype").innerHTML="";

makeaction();  
return 0;   
}
,'cp_010_core_13',
function () {
  config_param['core_timezone']=document.getElementById("core_timezone").value;  
  
  makeaction({
               core_timezone:config_param['core_timezone'], 
             });
  return 0;
}
,'cp_010_core_14',
function () {

if (http.status!=200)
  {
    installerror(getmessage('INST',"cantinstall"),getmessage('INST',"noanswer"));
    return 0;
  }
  
res=http.responseText.split("|");

if (res[0]!="ok")
  {  
    document.getElementById("error_core_timezone").innerHTML=res[1];
    return 0;
  }  
        
document.getElementById("error_core_timezone").innerHTML="";

makeaction();  
return 0;   
}
,'cp_010_packagemaster_02',
function () {

makeaction();
return 0;   
}
,'cp_011_postgresql_11',
function () {
  if (inst_update)
    {
      makeaction({update:1});
      return 0;
    }  

  config_param['auth_type_postgresql_host']=document.getElementById("auth_type_postgresql_host").value;
  config_param['auth_type_postgresql_database']=document.getElementById("auth_type_postgresql_database").value;
  config_param['auth_type_postgresql_login']=document.getElementById("auth_type_postgresql_login").value;
  config_param['auth_type_postgresql_pass']=document.getElementById("auth_type_postgresql_pass").value;
  config_param['auth_type_postgresql_tablename']=document.getElementById("auth_type_postgresql_tablename").value;
  config_param['auth_type_postgresql_charset']=document.getElementById("auth_type_postgresql_charset").value;
  
  makeaction({
               core_authtype_s:config_param['core_authtype_s'], 
               core_authtype_s_db_s:config_param['core_authtype_s_db_s'],
               auth_type_postgresql_host:config_param['auth_type_postgresql_host'],
               auth_type_postgresql_database:config_param['auth_type_postgresql_database'],
               auth_type_postgresql_login:config_param['auth_type_postgresql_login'],
               auth_type_postgresql_pass:config_param['auth_type_postgresql_pass'],
               auth_type_postgresql_charset:config_param['auth_type_postgresql_charset'],
             });
  return 0;
}
,'cp_011_postgresql_12',
function () {

if (http.status!=200)
  {
    installerror(getmessage('INST',"cantinstall"),getmessage('INST',"noanswer"));
    return 0;
  }
  
if (config_param['core_authtype_s']=="db" && config_param['core_authtype_s_db_s']=="postgresql")
  {  
    res=http.responseText.split("|");
    
    if (res[1]=="errconnect")
      {  
        document.getElementById("error_core_authtype").innerHTML=getmessage('postgresql','error_postgresql_connect')+res[2];
        return 0;
      }  
        
    if (res[0]!="ok")
      {  
        document.getElementById("error_core_authtype").innerHTML=getmessage('INST','cantinstall')+http.responseText;
        return 0;
      }  
  }  
  
document.getElementById("error_core_authtype").innerHTML="";

makeaction();  
return 0;   
}
  ];
  
postextract_func=[
'post_000_packagemaster_01',
function () {

packagemasternewtable=function()
{
  currenttable=document.createElement('table');
  document.getElementById(currentblock).appendChild(currenttable);
}

packagemasternewline=function(leftmes)
{
  var tmp;
  
  tmp=document.createElement('tr');
  currenttable.appendChild(tmp);
  currenttable.lastChild.appendChild(document.createElement('td'));
  currenttable.lastChild.appendChild(document.createElement('td'));
  currenttable.lastChild.firstChild.innerHTML=leftmes;
  
}

packagemasterwriterightmes=function(rightmes)
{
  currenttable.lastChild.lastChild.innerHTML=rightmes;
}

displayok=function()
{
  packagemasterwriterightmes('<img src="?packagemaster/ok.png" style="vertical-align: middle;">');
}

displaynotok=function()
{
  packagemasterwriterightmes('<img src="?packagemaster/cancel.png" style="vertical-align: middle;">');
}

makeaction();

return 0;
}
,'post_010_core_01',
function () {

registermodule=1;

corenewtable=function()
{
  currenttable=document.createElement('table');
  document.getElementById(currentblock).appendChild(currenttable);
}

corenewline=function(leftmes)
{
  var tmp;
  
  tmp=document.createElement('tr');
  currenttable.appendChild(tmp);
  currenttable.lastChild.appendChild(document.createElement('td'));
  currenttable.lastChild.appendChild(document.createElement('td'));
  currenttable.lastChild.firstChild.innerHTML=leftmes;
  
}

corewriterightmes=function(rightmes)
{
  currenttable.lastChild.lastChild.innerHTML=rightmes;
}

displayok=function()
{
  corewriterightmes('<img src="?core/ok.png" style="vertical-align: middle;">');
}

displaynotok=function()
{
  corewriterightmes('<img src="?core/cancel.png" style="vertical-align: middle;">');
}

newblock("core_checkconf",getmessage('core',"checkconf")); 

corenewtable();

if (config_def['core_servertype']!="apache") {
  jump="99";
  return 1;
}

core_test=new Object;

makeaction(config_param);
return 0;
}
,'post_010_core_02',
function () {
if (http.status!=200) 
  return installerror(getmessage('INST',"cantinstall"),getmessage('INST',"noanswer"));
  
response=http.responseText;  
res=response.split("|");

if (!res[0] || res[0]!="ok")
  {
    return installerror(getmessage('INST',"cantinstall"),res[1]);
  }
  
    
testdir=res[1];    
    
corenewline(getmessage('core',"hardtempleet"));
testrequri(proto+"//"+host+uridir+"/"+testdir+"test5/JRDKGCTDYEZ?RSYTEZJHGI",undefined ,{ "param": "OIYTH"});
return 0;   

}
,'post_010_core_03',
function () {
  if (http.status==200)
      {
        res=http.responseText.split("|");
        if (res[0]=="ok")
          {
            core_test['core_hardtempleet']=1;
            displayok();
            
            corenewline(getmessage('core',"hardfallback"));
            if (res[1]=="OIYTH")
                {
                  core_test['core_hardfallback']=1;
                  jump="12";
                  displayok();
                }
              else
                {
                  core_test['core_hardfallback']=0;
                  displaynotok();
                }
            
            return 1;
          }  
      }
  core_test['core_hardfallback']=0;    
  core_test['core_hardtempleet']=0;

  displaynotok();
      
  return 1;    
}
,'post_010_core_04',
function () {
//console.log("010_04"+config_param["core_allowfallbackresource"]+"\n");
if (!config_param["core_allowfallbackresource"])
  {
    core_test['core_fallback']=0;
    jump="08";
    return 1;
  }
corenewline(getmessage('core',"fallback"));
testrequri(proto+"//"+host+uridir+"/"+testdir+"test1/JRDKGCTDYEZ?RSYTEZJHGI",undefined ,{ "param": "OIYTH"});
return 0;   

}
,'post_010_core_05',
function () {
//console.log("010_05 "+http.status+"\n");
  if (http.status==200)
    { 
      res=http.responseText.split("|");
  
      if (res[0]=="ok" && res[1]=="OIYTH")
        {
          core_test['core_fallback']=1;
          displayok();
          jump="12";
          return 1;
        }  
    }
      
  core_test['core_fallback']=0;
  displaynotok();
    
  return 1;   
}
,'post_010_core_08',
function () {
//console.log("010_08\n");
if (core_test['core_hardtempleet'])
  {
    jump="12";
    return 1;
  }

corenewline(getmessage('core',"err404support"));
testgetrequri(proto+"//"+host+uridir+"/"+testdir+"test2/JRDKGCTDYEZ?RSYTEZJHGI");
return 0;   

}
,'post_010_core_09',
function () {
//console.log("010_09 "+http.status+"\n");
  if (http.status!=200)
      { 
        core_test['core_err404']=0;
        displaynotok();
        return 1;
      }
      
  res=http.responseText.split("|");
  
  if (res[0]!="ok")
    {
        core_test['core_err404']=0;
        displaynotok();
        return 1;
    }  
    
  
  core_test['core_err404']=1;
  displayok();
    
  return 1;   
}
,'post_010_core_12',
function () {
//console.log("010_12\n");

makeaction(config_param);
return 0;   

}
,'post_010_core_13',
function () {
//  console.log("010_13\n");
  res=http.responseText.split("|");

  if (http.status!=200 || res[0]!="ok") 
    return installerror(getmessage('INST',"cantinstall"),getmessage('INST',"noanswer"));
   
return 1;   

}
,'post_010_core_14',
function () {
//console.log("010_14\n");
if (!core_test['core_hardfallback'])
  {
    jump="16";
    return 1;
  }
corenewline(getmessage('core',"checkrootindexfallback"));

testgetrequri(proto+"//"+host+uridir+"/");
return 0;   

}
,'post_010_core_15',
function () {
//console.log("010_15 "+http.status+"\n");
  if (http.status!=200)
      { 
        displaynotok();
        jump="20";
        return 1;
      }
      
  res=http.responseText.split("|");
  
  if (res[0]!="ok")
    {
        displaynotok();
        jump="20";
        return 1;
    }  
    
  displayok();
  return 1;   

}
,'post_010_core_16',
function () {
//console.log("010_16\n");
corenewline(getmessage('core',"hardindex"));

testgetrequri(proto+"//"+host+uridir+"/"+testdir+"test6/?RSYTEZJHGI");
return 0;   

}
,'post_010_core_17',
function () {
//console.log("010_17 "+http.status+"\n");
  if (http.status!=200)
      { 
        core_test['core_hardindex']=0;
        displaynotok();
        return 1;
      }
      
  res=http.responseText.split("|");
  
  if (res[0]!="ok")
    {
        core_test['core_hardindex']=0;
        displaynotok();
        return 1;
    }  
    
  
  core_test['core_hardindex']=1;
  displayok();
  jump="40";
    
  return 1;   

}
,'post_010_core_20',
function () {
//console.log("010_20\n");

corenewline(getmessage('core',"err403"));

testgetrequri(proto+"//"+host+uridir+"/"+testdir+"test7/?RSYTEZJHGI");
return 0;   

}
,'post_010_core_21',
function () {
//console.log("010_21\n");
  if (http.status!=200)
      {
        core_test['core_err403']=0;
        displaynotok();  // err 403 not handled
        jump="30";
        return 1;
      }
      
  res=http.responseText.split("|");
  
  if (res[0]!="ok")
    {
      core_test['core_err403']=0;
      displaynotok(); // (err 403 handled and options +indexes) or allowoverride none
      return 1;
    }  
    
  
  core_test['core_err403']=1;
  displayok();
  jump="40";
  
  return 1;   

}
,'post_010_core_22',
function () {
//console.log("010_22\n");

corenewline(getmessage('core',"err403optionindexes"));

testgetrequri(proto+"//"+host+uridir+"/"+testdir+"test4/?RSYTEZJHGI");
return 0;   

}
,'post_010_core_23',
function () {
//console.log("010_23\n");
  if (http.status==200)
      {
        res=http.responseText.split("|");
        if (res[0]=="ok")
          {
            displayok(); // err 403 handled and options -indexes
            core_test['core_optionindexes']=1;
            jump="40";

            return 1;
          }
          
        // AllowOverride None  
      }
      
  core_test['core_optionindexes']=0;
  // options -indexes not handled
    
  displaynotok();    
  return 1;   
}
,'post_010_core_30',
function () {
//console.log("010_30\n");
corenewline(getmessage('core',"dirindex"));
testgetrequri(proto+"//"+host+uridir+"/"+testdir+"test3/?RSYTEZJHGI");
return 0;   

}
,'post_010_core_31',
function () {
//console.log("010_31 "+http.status+"\n");
  if (http.status==200)
      {
        res=http.responseText.split("|");
        if (res[0]=="ok")
          {
            displayok(); // directoryIndex supported
            core_test['core_dirindex']=1;
            jump="40";

            return 1;
          }
          
        // AllowOverride None  
        displaynotok();
        
        return 1;   
      }
  
  // directoryIndex not supported
  core_test['core_dirindex']=0;
  displaynotok();    
  return 1;   
}
,'post_010_core_40',
function () {
//console.log("010_40\n");
corenewline(getmessage('core',"pathinfo"));
testgetrequri(proto+"//"+host+uridir+"/"+testdir+"testpathinfo.php/JRDKGCTDYEZ?RSYTEZJHGI");
return 0;   

}
,'post_010_core_41',
function () {
//console.log("010_41 "+http.status+"\n");
  if (http.status==200)
      {
        res=http.responseText.split("|");
        if (res[0]=="ok")
          {
            displayok(); // pathinfo supported
            core_test['core_pathinfo']=1;
            return 1;
          }
      }
  
  // pathinfo not supported
  core_test['core_pathinfo']=0;
  displaynotok();    
  return 1;   
}
,'post_010_core_42',
function () {
//console.log("010_42\n");
  corenewline(getmessage('core',"templeetcall"));
  testgetrequri(proto+"//"+host+uridir+"/"+testdir+"testtempleet.php?RSYTEZJHGI");
  return 0;   

}
,'post_010_core_43',
function () {
//console.log("010_43 "+http.status+"\n");
  if (http.status==200)
      {
        res=http.responseText.split("|");
        if (res[0]=="ok")
          {
            displayok(); // querystring ok
            return 1;
          }
      }
  
  return installerror(getmessage('INST',"cantinstall"),getmessage('core',"noquerystring"));
  return 1;   
}
,'post_010_core_46',
function () {
  corenewline(getmessage('core',"charsetdisabled"));
  testgetrequri(proto+"//"+host+uridir+"/"+testdir+"test5/ok.html");
    
return 0;
}
,'post_010_core_47',
function () {
  contenttype=http.getResponseHeader("content-type");
  re=/charset\s*=\s*(\S*)/;

  rescharset=re.exec(contenttype);
  if (!rescharset && http.responseText.match(/^ok/))
      {
        core_test['core_charset']="nocharset";
        displayok();
        jump="54";
      }
    else
      {
        core_test['core_charset']=rescharset[1];
        displaynotok();
        corenewline(getmessage('core',"defaultcharset"));
        corewriterightmes(core_test['core_charset']);
      }  
  return 1;   
}
,'post_010_core_48',
function () {
//console.log("010_48\n");
  corenewline(getmessage('core',"disablecharset"));
  testgetrequri(proto+"//"+host+uridir+"/"+testdir+"test8/ok.html");
    
  return 0;
}
,'post_010_core_49',
function () {
//console.log("010_49\n");
 
  contenttype=http.getResponseHeader("content-type");
  re=/charset\s*=\s*(\S*)/;
   
  rescharset=re.exec(contenttype);
  if (!rescharset && http.responseText.match(/^ok/))
      {
        core_test['core_newcharset']="nocharset";
        displayok();
      }
    else
      {
        core_test['core_newcharset']=rescharset[1];
        displaynotok();
      }  
  return 1;   
}
,'post_010_core_54',
function () {
//console.log("010_54\n");
  makeaction(config_param);
  return 0;
}
,'post_010_core_55',
function () {
//console.log("010_55 "+http.status+"\n");
  if (http.status!=200) 
    return installerror(getmessage('INST',"cantinstall"),getmessage('INST',"noanswer"));

  res=http.responseText.split("|");
  if (res[1]!="1")
    {
      installwarning(getmessage('core',"nopagemethod"),getmessage('core',"nopagemethodmsg"))
    }
  
  if (res[2]!="1")
    {
      installwarning(getmessage('core',"noindexmethod"),getmessage('core',"noindexmethodmsg"))
    }
  
  return 1;   
}
,'post_010_core_62',
function () {
//console.log("010_62 "+"\n");
  addtextn(getmessage('core',"buildcode"));
  makeaction(config_param);
  return 0;   
}
,'post_010_core_63',
function () {
if (http.status!=200) 
  return installerror(getmessage('INST',"cantinstall"),getmessage('INST',"noanswer"));
  
res=http.responseText.split("|");

if (res[0]!="ok")
  {
    if (res[0]!="error")
      return installerror(getmessage('INST',"cantinstall"),http.responseText);
      
    switch (res[1])
      {
        case "1": return installerror(getmessage('INST',"cantinstall"),getmessage('core',"openwriteerror").replace('NAME',res[2]));
        case "2": return installerror(getmessage('INST',"cantinstall"),getmessage('core',"openreaderror").replace('NAME',res[2]));
        case "3": return installerror(getmessage('INST',"cantinstall"),getmessage('core',"builderror").replace('NAME',res[2]));
      } 
  }
    
return 1;   

}
,'post_010_core_64',
function () {
var param;

addtextn(getmessage('core',"buildhtaccess"));
param=clone(config_param);

for(var i in core_test)
  param[i]=core_test[i];

param["distid"]=distid;
param["update"]=inst_update;
  
makeaction(param);
return 0;   
}
,'post_010_core_65',
function () {
if (http.status!=200) 
  return installerror(getmessage('INST',"cantinstall"),getmessage('INST',"noanswer"));
  
res=http.responseText.split("|");

if (res[0]!="ok")
  return installerror(getmessage('INST',"cantinstall"),res[1]);
    
return 1;   

}
,'post_010_core_99',
function () {
console.log("010_99\n");
return 1;   

}
,'post_011_core_01',
function () {
console.log("011_01\n");

if (config_def['core_servertype']!="nginx") {
  jump="99";
  return 1;
}

return 1;   

}
,'post_011_core_62',
function () {
//console.log("011_62\n");
  addtextn(getmessage('core',"buildcode"));
  makeaction(config_param);
  return 0;   


}
,'post_011_core_63',
function () {
if (http.status!=200) 
  return installerror(getmessage('INST',"cantinstall"),getmessage('INST',"noanswer"));
  
res=http.responseText.split("|");

if (res[0]!="ok")
  {
    if (res[0]!="error")
      return installerror(getmessage('INST',"cantinstall"),http.responseText);
      
    switch (res[1])
      {
        case "1": return installerror(getmessage('INST',"cantinstall"),getmessage('core',"openwriteerror").replace('NAME',res[2]));
        case "2": return installerror(getmessage('INST',"cantinstall"),getmessage('core',"openreaderror").replace('NAME',res[2]));
        case "3": return installerror(getmessage('INST',"cantinstall"),getmessage('core',"builderror").replace('NAME',res[2]));
      } 
  }
    
return 1;   

}
,'post_011_core_64',
function () {
var param;

addtextn(getmessage('core',"buildconf"));
param=clone(config_param);

//for(var i in core_test)
//  param[i]=core_test[i];

param["distid"]=distid;
param["update"]=inst_update;
  
makeaction(param);
return 0;   
}
,'post_011_core_65',
function () {
if (http.status!=200) 
  return installerror(getmessage('INST',"cantinstall"),getmessage('INST',"noanswer"));
  
res=http.responseText.split("|");

if (res[0]!="ok")
  return installerror(getmessage('INST',"cantinstall"),res[1]);
    
return 1;   

}
,'post_011_core_99',
function () {
console.log("011_99\n");
return 1;   

}
,'post_020_core_60',
function () {
//console.log("020_60 \n");

makeaction(config_param);
return 0;   
}
,'post_020_core_66',
function () {
//console.log("010_66\n");
if (!inst_update && config_param['core_auth_type_mysql_copyconfig'])
  {
    var param;

    param=clone(config_param);
  
    makeaction(param);
    return 0;
  }
  
return 1;      
}
,'post_020_core_67',
function () {
//console.log("010_67\n");
if (!inst_update && config_param['core_auth_type_mysql_copyconfig'])
  {
    if (http.status!=200) 
      return installerror(getmessage('INST',"cantinstall"),getmessage('INST',"noanswer"));
  
    res=http.responseText.split("|");

    if (res[0]!="ok")
      return installerror(getmessage('INST',"cantinstall"),res[1]);
  }  
return 1;   

}
,'post_100_packagemaster_01',
function () {

//registermodule=1;
return 1;    
}
,'post_100_templeet4_minify_50',
function () {
makeaction();
return 0;   
}
,'post_100_templeet4_minify_51',
function () {
if (http.status!=200) 
  return installerror(getmessage('minify',"cantinstall"),getmessage('INST',"noanswer"));
  
res=http.responseText.split("|");

if (res[0]!="ok")
  return installerror(getmessage('minify',"cantinstall"),res[1]);
    
return 1;   

}
,'post_500_packagemaster_80',
function () {

if (typeof(registermodule)!='undefined')
  {
    newblock("registermodule",getmessage('INST',"registermodule")); 

    makeaction(config_param);
    return 0;   
  }
return 1;    
}
,'post_500_packagemaster_81',
function () {

if (typeof(registermodule)=='undefined')
  {
    return 1;   
  }

if (http.status!=200)
  return installerror(getmessage('INST',"cantinstall"),getmessage('INST',"errbuildconf"));

packagemasternewtable(); 

res=http.responseText.split("|");
modules=res[1].split(";");

for(var i in modules)
  {
    res=modules[i].split(":");
    packagemasternewline(res[0]+" : ");

    if (res[1]==0)
      packagemasterwriterightmes(getmessage('INST',"nophp"));
    if (res[1]==1)
      packagemasterwriterightmes(getmessage('INST',"library"));
    if (res[1]==2)
      packagemasterwriterightmes(getmessage('INST',"module"));
  }

  
return 1;   
}
,'post_600_core_10',
function () {

if (config_param['core_authtype_s']=="db" && config_param['core_authtype_s_db_s']=="mysql")
  {
    newblock("authconfig",getmessage('core','authconfig'));
  
    makeaction({
               core_auth_type_mysql_host:config_param['core_auth_type_mysql_host'],
               core_auth_type_mysql_database:config_param['core_auth_type_mysql_database'],
               core_auth_type_mysql_login:config_param['core_auth_type_mysql_login'],
               core_auth_type_mysql_pass:config_param['core_auth_type_mysql_pass'],
               core_auth_type_mysql_tablename:config_param['core_auth_type_mysql_tablename'],
               core_auth_type_mysql_charset:config_param['core_auth_type_mysql_charset'],
             });
    return 0;   
  }


return 1;   
}
,'post_600_core_11',
function () {

if (config_param['core_authtype_s']=="db" && config_param['core_authtype_s_db_s']=="mysql")
  {
    if (http.status!=200) 
      return installerror(getmessage('INST',"cantinstall"),getmessage('INST',"noanswer"));
      
    res=http.responseText.split("|");
    
    if (res[0]!="ok")
      return installerror(getmessage('INST',"cantinstall"),res[1]);
      
    addtextn(getmessage('core',"mysqlauthconfigured"));
  
  }
    
return 1;   

}
,'post_600_postgresql_10',
function () {

if (config_param['core_authtype_s']=="db" && config_param['core_authtype_s_db_s']=="postgresql")
  {
    newblock("authconfig",getmessage('postgresql','authconfig'));
  
    makeaction({
               auth_type_postgresql_host:config_param['auth_type_postgresql_host'],
               auth_type_postgresql_database:config_param['auth_type_postgresql_database'],
               auth_type_postgresql_login:config_param['auth_type_postgresql_login'],
               auth_type_postgresql_pass:config_param['auth_type_postgresql_pass'],
               auth_type_postgresql_tablename:config_param['auth_type_postgresql_tablename'],
               auth_type_postgresql_charset:config_param['auth_type_postgresql_charset'],
             });
    return 0;   
  }


return 1;   
}
,'post_600_postgresql_11',
function () {

if (config_param['core_authtype_s']=="db" && config_param['core_authtype_s_db_s']=="postgresql")
  {
    if (http.status!=200) 
      return installerror(getmessage('INST',"cantinstall"),getmessage('INST',"noanswer"));
      
    res=http.responseText.split("|");
    
    if (res[0]!="ok")
      return installerror(getmessage('INST',"cantinstall"),res[1]);
      
    addtextn(getmessage('postgresql',"authconfigured"));
  
  }
    
return 1;   

}
,'post_900_core_00',
function () {

endfunctions.core=function() { 
    var endinstall = new Date();
    installtime=Math.floor((endinstall.getTime()-beginextract.getTime())/100)/10;
    
    addtextn(getmessage('core',"end2"));
    addtextn(getmessage('core',"installtime")+installtime+getmessage('core',"seconds"));
    
  }
  
return 1;   
}
,'post_940_packagemaster_00',
function () {

endfunctions.packagemaster=function() { 
    addtext('<style type="text/css">\n'+
            '.continuelink span {\n'+
            '  font-weight: bold;\n'+
            '  margin: 0px;\n'+
            '  text-decoration: none;\n'+
            '  color: black;\n'+
            '  padding: 0px 25px 0px 0px;\n'+
            '  background: url(?packagemaster/right_arrow.png) no-repeat right center;\n'+
            '}\n'+
            '</style>');
    
    if (install_type=="package")
        addtextn('<br /><form method="post" action="../templeet.php?file=auth/packageinstall.html">\n'+
              '<div>\n'+
              '<button class="button continuelink"><span>'+getmessage('INST',"continue")+'</span></button>\n'+
              '</div>\n'+
              '</form>\n');
      else
        {
          if (inst_update==0)
                addtextn('<br /><form method="post" action="templeet.php?file=auth/authform.html">\n'+
                      '<div>\n'+
                      '<input type="hidden" name="urlfrom" value="'+(config_param['core_installeruridir']!=""?config_param['core_installeruridir']:"/")+'" />\n'+
                      '<input type="hidden" name="auth_userspace" value="0">\n'+
                      '<input type="hidden" name="auth_user" value="admin">\n'+
                      '<input type="hidden" name="auth_pass" value="'+config_param['core_adminpass']+'">\n'+
                      '<button class="button continuelink"><span>'+getmessage('INST',"continue")+'</span></button>\n'+
                      '</div>\n'+
                      '</form>\n');
              else        
                addtextn('<br /><form method="post" action="templeet.php?file=auth/">\n'+
                      '<div>\n'+
                      '<button class="button continuelink"><span>'+getmessage('INST',"continue")+'</span></button>\n'+
                      '</div>\n'+
                      '</form>\n');

        
        
        
        
        
        }        
      
    
  };


return 1;   
}
  ];

endfunctions={};
    
configsubmited=false;
 
function submitconfig() {
  var oksubmit;
  var tmpcheckparam;
  var func;
  
  if (configsubmited)
    return false;
    
  oksubmit=true;
  tmpcheckparam=array_checkparam.slice(0);
  func=tmpcheckparam.shift();
  while(func)
    {
      if (!func())
        oksubmit=false;
      func=tmpcheckparam.shift();
    }

  if (oksubmit)
    {
      configsubmited=true;
      phase=6;
      the_loop();  
    }  
    
  return false;
}
 
function the_loop() {
  
  condloop=1;
  while (condloop)
    {
      switch(phase)
        {
          case 1:          
            array_func=preextract_func;
            phase++;

          case 2:
            the_loop_action=array_func.shift();
            the_loop_code=array_func.shift();
            
            if (the_loop_code)
                { 
                  if (!the_loop_code())
                    condloop=0;
                }
              else
                {
                  phase++;
                }  
            break;

          case 3:  
            array_func=config_func;
            array_resetform=new Array();
            array_checkparam=new Array();
            keepfile=new Array();

            parameters='<form method="POST" id="config_form" onsubmit="return submitconfig();"><table class="config">';
            phase++;
            
          case 4:
            the_loop_action=array_func.shift();
            the_loop_code=array_func.shift();
            
            if (the_loop_code)
                { 
                  if (!the_loop_code())
                    condloop=0;
                }
              else
                phase++;
            break;   
            
          case 5:
            parameters+='</table><div id="config_buttons">';
            addbuttons();
            parameters+="</div></form>";
            addtext(parameters);
            document.getElementById("resetform").addEventListener('click',resetparameterform,true)
            condloop=0;
            break;   
            
          case 6:
            array_func=checkparam_func.slice(0);
            cp_key="";
            config_param={};
            phase++;
            break;
           
          case 7:
            the_loop_action=array_func.shift();
            the_loop_code=array_func.shift();
            if (the_loop_code)
                { 
                  condloop=0;
                  if (the_loop_action!="cp_0000")
                    {
                      if (http.status!=200)
                          installerror(getmessage('INST',"noanswer"));
                        else  
                          { 
                            res=http.responseText.split("|");
                        
                            if (res[0]=="error")
                              installerror(res[1]);
                            else if (res[0]!="ok")
                              installerror(getmessage('INST',"cperror"));
                            else
                              cp_key=res[1];
                          }      
                    }
                  if (phase<1000)
                    {  
                      if (!the_loop_code())
                          configsubmited=false;
                    }      
                }
              else
                {
                  phase++;
                }  
            break;
            
          case 8:
            if (http.status!=200)
                installerror(getmessage('INST',"noanswer"));
              else  
                { 
                  res=http.responseText.split("|");
                       
                  if (res[0]=="error")
                    installerror(res[1]);
                  else if (res[0]!="ok")
                    installerror(getmessage('INST',"cperror"));
                  else
                    {
                      cp_key=res[1];
                      phase++;
                    }  
                }     
            break;
                 
          case 9:
            beginextract=new Date();
            
            for(i in makeinstall_nodisplay)
              {
                if (document.getElementById(makeinstall_nodisplay[i]))
                  document.getElementById(makeinstall_nodisplay[i]).style.display="none";
              }
            for(i in makeinstall_disable)
              {
                if (document.getElementById(makeinstall_disable[i]))
                  document.getElementById(makeinstall_disable[i]).disabled=true;
              }
            newblock("extract",getmessage('INST',"extract")); 

            phase++;
            break;
               
          case 10:
            the_loop_action="cp_writeextractcode";
            makeaction({update:inst_update,
                        nocompress:0,
                        keepfile:keepfile.toString(),
                        updated:getmessage('INST',"fileupdated"),
                        extracted:getmessage('INST',"fileextracted"),
                        notrestored:getmessage('INST',"filenotrestored"),
                        unchanged:getmessage('INST',"fileunchanged"),
                        unlinked:getmessage('INST',"fileunlinked"),
                       });
            phase++;
            condloop=0;
            break;  

          case 11:
            if (http.status!=200)
              {
                installerror(getmessage('INST',"noanswer"));
                return 0;
              }
              
            res=http.responseText.split("|");
            
            if (res[0]!="ok")
                {
                  installerror("Error",res[1]);
                  condloop=0;
                }
              else
                { 
                  cp_key=res[1];
                  uriextract=uridir+"/extractor.php";
                  offset=0;
                  fileno=0;
                  phase++;
                }  
          
            break;
            
          case 12:
            testrequri(proto+"//"+host+uriextract,"extract",
                       {
                         fileno:fileno
                       });
            condloop=0;
            phase++;
            break;

          case 13:
            if (http.status!=200)
              {
                installerror(getmessage('INST',"noanswer"));
                return 0;
              }
             
            res=http.responseText.split("|",4);
            if (res[0]!="ok")
                {
                  installerror("Error",res[1]);
                  condloop=0;
                } 
              else
                {
                  addtext(res[3]);
                  fileno=res[2];
                  settitle(getmessage('INST',"filesextracted")+fileno);
                  if (res[1]!="0")
                      phase++;
                    else
                      phase=12;  
                }  
            break;
            
          case 14:
            the_loop_action="endextractcode";
            makeaction({update:inst_update,
                        nocompress:0,
                       });
            phase++;
            condloop=0;
            break;
            
          case 15:
            if (http.status!=200)
              {
                installerror(getmessage('INST',"noanswer"));
                return 0;
              }
              
            res=http.responseText.split("|");
            
            if (res[0]!="ok")
                {
                  installerror("Error",res[1]);
                  condloop=0;
                }
              else
                { 
                  phase++;
                }  
          
            break;
            
          case 16:
            array_func=postextract_func.slice(0);
            phase++;
            break;
            
          case 17:
            the_loop_action=array_func.shift();
            the_loop_code=array_func.shift();
            
            if (the_loop_code)
                { 
                  skipaction=0;
                  if (typeof(jumpaction)!="undefined")
                    {
                      if (the_loop_action!=jumpaction)
                          skipaction=1;
                        else
                          delete jumpaction;
                    }
                    
                  if (!skipaction)  
                    if (!the_loop_code())
                        condloop=0;
                      
                      
                  if (typeof(jump)!="undefined")
                    {
                      jumpaction=the_loop_action.replace(/^(\w+_\d+_\w+_).*/, "$1"+jump);
                      delete jump;
                    }
                }
              else
                phase++;
            break;
              
          case 18:
            newblock("endinstall",getmessage('INST',"end")); 

            for (endfunction in endfunctions)
              endfunctions[endfunction]();
              
            phase++;
            break;
                                   
          case 9999:
            condloop=0;
            break;
                         
          default:
            the_loop_action="endinstall";
            makeaction();
            phase=9999;
            condloop=0;
        }
    }   
    
}
  
function init() {
  phase=1;
  the_loop();
}


//]]>
</script>



</head>
<body onload="init()">
  <div style="padding: 0;">
    <div style="height: 64px;background-image: url(?bg_top.png);  margin-bottom: 20px;"><img src="?templeet4.gif" style="padding-left: 10px;">
      <div style="float: right; margin-right: 50px;"><div class="lang_installer"><a href="?lang=en"><img src="?INST_en/flag.png"></a></div><div class="lang_installer"><a href="?lang=fr"><img src="?INST_fr/flag.png"></a></div></div>
    </div>
    <div id="main">
    </div>
    <button class="button" style="position: absolute; left: -1000px"></button>
  </div>
</body>
</html>

close.png
�  �PNG

   
co���f	�#�K�]*�c�z��4���9yoo/�����Յ����ա����||t2&&���0��KZZ*���o�uV���#ihh��0r�R	�J�ʪj��粝555��z6��5!%D|����M3�P��<�&������}��D�SQ�{��uvƩ�a0Na�`�i��É����,�p���K�3N�.\���t<���Z�,���Dfv�kphL`~qs�p���ᜃ���1U[dG>bf���'���RB�^����׃�QYYe�),6�����v���I��e��]��lv�;,b��[�~B�O"z:n���p:��U���ș�y=r����<f����X��݁˥
|�v�-��+�K$aop(!il||��/�����b�Ŗ�ܱN��ټ-,,`hh��E]��SD<�D�xw��7p�l��N��ԙ]EE��C<M�L���1O"6�eW����/=��>�ۦby]�x8QC��V(���t��!���f(*�_Z\.�CV}����Q�u�����𓤉�>O���7���D��#���jZ�����V������ܿ+U.����h����+���_=����w�Oʞ���}��}�%$�H�w�.��������	Wj���I��V��E�������
1��]����6F�H`w������E$C�O�r�A�[E�,��ğ�-�����U*?������b�D�������n�\���j�p�g�    IEND�B`�
bomb.png
�	  �PNG

   
�Mڂ������PZ���Vij�ZZ������j�ĺ�5���}�y^N?�gn��&ٵ	&Ё�3��ܙ�������ޅ��;FY���r.�x�Hd��%��w���������?ɱ7%�����I�G����-�\q��w^t����b^y�o�.�⮞�~��{����N��Х��c��3����G�^=|�og�ٞo^sI��_G_ZȽԧ�>��=�v�V`�eߛ�-����B�x��'w|���t��<+<��{�z|�w�e���^~NYh����~뜞����}��F���g�s���^��>�f奧�&>]�loo���r�
����4�T�1i��fY��1�k�����>:���>����=�#g|�mڴ�򑑑�,Y�X�\ޡ��("�J��{�����RjC�R�VD�[�|�f�f�9	�aÆ�lܸ�+W^y���� �i���[}��W�8c���o�'���*�*q�#MS�,�{�1km7�R�Z-�14�v���A�\�r��ͷ�G�����q���;֯[���ݰ��[�:#���~Y�V(���(��JD��Ju��#T�{��6��e˖K���y�8t����+	���s��U���v�m{���n�Z���R�P*�(�JDQD�$$I�}������^zzz����۷s�7r��R#|e�e����*����Ν;w�q����Zk��Q�C)���cY��""$I�������ر�}��199I�$c869ͫ��?�V�� 9�.�u�֋D�g�{���v���J)���i�^$011��m���g��7ޠ�l⽧^�s��RF_�������⋜VCCC��H5Ϯ֚(���8���*�9�������U�V���O366���=SSS\���[o��5k6��瞻�n��m۶���o"���}��$I��=ι�#�j�nU�s|��(���n�l6��jl�8#�z��/;8>>>L.ׂE�j�~���s�,˺ �1���n�Y��z�dvv���ǎ�?����aL/S�=���?|�P\n�r�|�scL�
��{�H��nw���w��ҥK���f��>֮�=B�Vez�(Q]��yH�?m�������;Q���X��/|�KB����)����{I�i�-�'�ʗOLL,��dY��8����4ׂs�4�G�zzJx��Œ�5��H�A��R�HӴ�>qEQ7�E����ӝ�Z�,#�2�1cpΑ$�fJ�7�X2�L��p��Ƙ�R�R��C,��� ���n�1�tŞW�Z-��)q�Ȍ�ZU���VK�@H��
��k�Q`]>����E�,˺3an���>,�Ԡ��˝aWJ4i* 3��+T�$���+�ʺ�u�1]yE�1jI�t����6Ë�+D<Q,D]����h�'��bZ耵�����,�VA)յ�<��9����c�(��P)�s����v�k0�Bd�a;oC�!k��Z�. �T׍��.�8T.h��pđ"�&��c8>%/�cAĜ�bv��^�7�$Y���\�y�;�(�˝�p��ei�2�am�s���HHbEw�;/(Q?.�z��@3���z��O����b��?�R���I>q��4�
)t���j5���� ��ܐB��@�@dA��'�+����G��޳Zđ��� R{��(<QJZ�'�i���`�=�2��m�XQ�~?�8?�g�e��	k��֯�Fi�<���Z��R�5�q(E���ס�0�;*"������VX�|� >	���J@���,	�����2s����F#�T�8L�������:��Vˢu�sn8
LD����3�!��C�g���eN
���͊�ߜs���Ω�Ri�U�
Zam��h�ʘ�E�o"��I��{L
d�gC����)�dV���/N$��.��T$*�Q������&�2�琱s�_�}����<�T����՜�I�y���2~��ѭp~�Yr���*`h)�    IEND�B`�
loading.gif
�
��ʉ
؉{+H�"[�
��jK���l�Lrj<<[}�L�Ĭ�<
&��JBK�:�����&�{��)\L�il��;�|������\M�|-M]˫�}k��M
�ǎ���d.�~���>?=�ʭ_�|��2�n�?���9���A�	�MA��B	�9nT8�c !�   ,    �   ������"x4HV�U�m�_Z���fZ�S;���'R��}�y�󱄽 �1&�e�I	:�PT�8�^�Yn���O2�l�ІӴd�-��sw��{m��'H7h�V�X����("���f��W�y����
J�yh��7*�J�j	�z)��K{����JY���K�;,̊,k�̼�k[�{{�;-�M��|�^�mM^�]�m����>[ގ����>�~_��/ /e����I�@i�
2\ح�"����wa�6�1*  !�   ,    �   ��o�ˊ��V�e��EW5�aZ�c˖��ʧV��w�������v��K��9�5]I`�xE�Y�֛r�X��i5��Ʀx�.��Q�^�JD��ݟ�����g��f��x�����)XH؇ɦ9ȷ�ٙ�	(gJ�X�zʚJ)���:�*	2��jK���
�)��밋l(���*m\L{�L�<�hM\z�-|��]
~L�ͫ����������^}Z^~o.폏��gm��ǯ�:Źs("=��(��(�߾���x�#G  !�   ,    �   ���˽	�� &�,�M�x
X��G�()J���`�ҧUó�ٻ��a|!\L���R�d�.G�Y�$�Wk��l�O��\&G�ix�ǩ]�^������6��'��v�6�q���h���W��4&y	���i	�Y���J���X����
{x:k�x�*�[j�;�H)ڙZ{�����<�2��	9<]L�z�m̛�ݝ�~�=..-l]�]N�n�-.��^O?�L��n��6����w�`?��#��!ÅF��!B|J�e���GI�:P  !�   ,    �   ���h��bx�HU��n���8��Z�j�1�ү��u�w3��2?�D$+Ee���4�Ҩ��hB�Wnv����c��s^��k5�|A��i�Q���o���U�ŗ�Wxr!g�����F�Ј�9)�Ȩ��xI����9*ڧiڪjV
��ʉ
؉{+H�"[�
��jK���l�Lrj<<[}�L�Ĭ�<
&��JBK�:�����&�{��)\L�il��;�|������\M�|-M]˫�}k��M
�ǎ���d.�~���>?=�ʭ_�|��2�n�?���9���A�	�MA��B	�9nT8�c !�   ,    �   ������bxHV�U�m�_Z���fZ�S;���'R��}�y�󱄽 �1&�e�I	:�PT�8�^�Yn���O2�l�ІӴd�-��sw��{m��'H7h�V�X����("���f��W�y����
J�yh��7*�J�j	�z)��K{����JY���K�;,̊,k�̼�k[�{{�;-�M��|�^�mM^�]�m����>[ގ����>�~_��/ /e����I�@i�
2\ح�"����wa�6�1*  !�   ,    �   ��o�ˊ��V�e��EW5�aZ�c˖��ʧV��w�������v��K��9�5]I`�xE�Y�֛r�X��i5��Ʀx�.��Q�^�JD��ݟ�����g��f��x�����)XH؇ɦ9ȷ�ٙ�	(gJ�X�zʚJ)���:�*	2��jK���
�)��밋l(���*m\L{�L�<�hM\z�-|��]
~L�ͫ����������^}Z^~o.폏��gm��ǯ�:Źs("=��(��(�߾���x�#G  !�   ,    �   ���˽	��!&�,�M�x
X��G�()J���`�ҧUó�ٻ��a|!\L���R�d�.G�Y�$�Wk��l�O��\&G�ix�ǩ]�^������6��'��v�6�q���h���W��4&y	���i	�Y���J���X����
{x:k�x�*�[j�;�H)ڙZ{�����<�2��	9<]L�z�m̛�ݝ�~�=..-l]�]N�n�-.��^O?�L��n��6����w�`?��#��!ÅF��!B|J�e���GI�:P  ;
extractor
�  <?php

  define("NOCOMPRESS",&NOCOMPRESS&);
  
  $keepfile=array_flip(explode(",","&KEEPFILE&"));
  if (!isset($_REQUEST["key"]) || $_REQUEST["key"]!="&KEY&")
    {
      print "error|bad key";
      exit(0);
    }
    
  $start=getmicrotime();  
  $fileno=$_REQUEST["fileno"];

  $registry=@unserialize(substr(file_get_contents("templeet/registry.php"),8));
  if (!is_array($registry))
    {
      print "error|badregistry";
      exit();
    }  
    
  $fp = fopen("&FILE&", 'rb');
   
  $maxexec=ini_get("max_execution_time");
  if ($maxexec<1)
    $maxexec=0.5;
  if ($maxexec>2)
    $maxexec=2;
     
  $maxfiles=10000;  
        
  $i=0;       
  $trace="";  
  
  while (list($packagename,$files)=each($registry['installpackage']))
    {
      while(getmicrotime()-$start<$maxexec && $i<$maxfiles && list($name,$offset)=each($files))
        {
          fseek($fp,$offset+&FILESBEGIN&);
          $tmp=unpack("V",fread($fp,4));
          $size=$tmp[1];
          $content = fread($fp, $tmp[1]);
          if (!NOCOMPRESS)
            $content=gzuncompress($content);
          
          $writefile=1;
          if ($writefile && isset($keepfile[$name]) && @file_exists($name))
            $writefile=0;
      
          $update=isset($registry["dists"][$packagename]); 
          $nameori=$name; 
          $restore=0;
          if ($writefile)
              {
                if ($update)
                    $actionfile="&UPDATED&"; // UPDATED
                  else  
                    $actionfile="&EXTRACTED&"; // EXTRACTED
      
                if ($update && preg_match('/^.\/template\//',$name) )
                  {
                    if (@file_exists($name))
                      {
                        $tmp=@file_get_contents($name);
                        if ($tmp===FALSE)
                          $tmp="";
                          
                        if (preg_match('/^[\r\n]*$/',$tmp))
                          {
                            $restore=1;
                            $actionfile="&EXTRACTED&"; // EXTRACTED
                          }
                        elseif (
                                 isset($registry['dists'][$packagename]['files'][$name]) && 
                                 $registry['dists'][$packagename]['files'][$name]!=md5($tmp)
                               )
                          {
                            $actionfile=$name="$name.update";
                          }  
                      }
                    elseif (!isset($registry['dists'][$packagename]['files'][$name]))
                      {
                        $actionfile="&EXTRACTED&";
                      }
                    else  
                      {
                        $writefile=0;
                        $trace.="<br />\n[$packagename] $name => &NOTRESTORED&"; // NOTRESTORED
                      }
                  }
              }
            else
              $actionfile="&NOTRESTORED&"; // NOTRESTORED
          
          if ($writefile)
            { 
              $res=@mkdir(dirname($name),0755,TRUE);
              file_put_contents($name,$content);
              $md5=md5($content);    
              if (
                   $name==$nameori &&
                   !$restore &&
                   isset($registry['dists'][$packagename]['files'][$nameori]) && 
                   $registry['dists'][$packagename]['files'][$nameori]==$md5 
                 )
                  $actionfile="&UNCHANGED&"; // UNCHANGED
               
              $registry['newdists'][$packagename]['files'][$nameori]=$md5;
                 
              $trace.="<br />\n[$packagename] $nameori => $actionfile";
            } 
               
          unset($registry['installpackage'][$packagename][$nameori]);           
          $fileno++;
          $i++;
        }
      if (count($registry['installpackage'][$packagename])==0)
        unset($registry['installpackage'][$packagename]);
    }
  $endextract=count($registry['installpackage'])==0;
  $enddeletefiles=FALSE;
  
  if ($endextract)
    {
      while(getmicrotime()-$start<$maxexec && $i<$maxfiles && list($packagename,$files)=each($registry['newdists']))
        {
          if (isset($registry['dists'][$packagename]) && 
              is_array($registry['dists'][$packagename]) &&
              isset($registry['dists'][$packagename]['files']))
              {
                while(getmicrotime()-$start<$maxexec && $i<$maxfiles && list($filename,$md5)=each($registry['dists'][$packagename]['files']))
                  {
                    if (isset($keepfile[$filename]))
                        {
                          if (isset($registry['dists'][$packagename]['files'][$filename]))
                            $registry['newdists'][$packagename]['files'][$filename]=$registry['dists'][$packagename]['files'][$filename];
                        }
                      else
                        {
                          if (!isset($registry['newdists'][$packagename]['files'][$filename]))
                            {
                              if (@file_exists($filename))
                                {
                                  $tmp=@file_get_contents($filename);
                                  if ($tmp===FALSE)
                                    $tmp="";
                                  if (md5($tmp)!=$md5)
                                      {
                                        @file_put_contents($filename.".old",$tmp);
                                        $trace.="<br />\n[$packagename] $filename => $filename.old";
                                      }
                                    else
                                      {
                                        $trace.="<br />\n[$packagename] $filename "."&UNLINKED&";
                                      }   
                                  @unlink($filename);
                                }    
                            }
                        }  
                    unset($registry['dists'][$packagename]['files'][$filename]);
                    $i++;
                  }
                if (count($registry['dists'][$packagename]['files'])==0)
                  {
                    $registry['dists'][$packagename]['files']=$registry['newdists'][$packagename]['files'];
                    unset($registry['newdists'][$packagename]);
                  }  
              }
            else
              {
                $registry['dists'][$packagename]['files']=$registry['newdists'][$packagename]['files'];
                unset($registry['newdists'][$packagename]);
              }  
        }
        
      $enddeletefiles=count($registry['newdists'])==0;
    }
      
  file_put_contents("templeet/registry.php","<?php\n\000\n".serialize($registry)."\n?>");
   
  $end=$endextract && $enddeletefiles;
  if ($end)
    unset($registry['installpackage']);
  print "ok|".($end?"1":"0")."|$fileno|";
  if ($end)
    @unlink(__FILE__);
  print $trace;
   
Function getmicrotime() {
  $time = microtime();
  list($usec, $sec) = explode(" ",$time);
  return ((float)$usec + (float)$sec);
}
   
   
   
?>
-   x�s)�/P��/-R(I�-�I,I-V��S(��,VH�,JM.�/� 	�8a   xڳ�L��O)�IU��O�O,-ɨ�O�/J�K��R �����̢T�Ĝ��Լ��.}�;.�vE����RR�@:+u�F䗃]�\����\��(� ��/Q  xڕR�N�0}'�ʲ���P�Q��Syt��B�n,�n5���n�A,CM|k��9��{��XGy�yy�|W�<���Y����F�������p�O�;ÏS�}'�;��@�K"Db<+�a�ӎ�1E�B���K���l�ؑ���]8݌q@k�w�LtP�LV��<�X��t����Ϙfi��3__�VV{����������y��Jd�S
�V�W����Jd,(��iL6�ٜxn0=�{t4=�n������N�P�D�4`�כ�ۑ:���������z�)��0��������]���%��q�����_�=:�׋�7��xM���}�_^f=�=?H@��M4ʽ�1?O{�n��.k9��r�U8fh�ykI�A�+�t�hۡg��\�ic�N�|IV���3 f"D)D�����[ϗ�|�����:�D�-�t�P�"���J�����(�s
E�Oӓ��j��D�k�:�3^�۫^H����W��A�r�L")hH{��b�n���gLK�C��^��E�w�����Rf��,#+^�n+r�\D��Q��*��r���l~��̞%v��|��gv��)B��P�~��[&	)�槀m��O���Ԣ���E,ң�\D�����'Ul�09�]~�E$Ai����mT3h�U�R	ZhЌ[MG�kp��+.ZM�*i�pu܉��� $�O��1�cu�ӷi�ɶC�d{�[�l{1e���s��b�`����3��E%3,�H�|�L?��	2xȓ��v,:���󆰠�Bé�EQ`��'vH����,#īc%)��r6�D�@�.6�X�IF�8�����n����}yyg(�/R�<w�<0ݩ �5����!�r�a����2�
�f!�l���{ņ̓���:�^ �m<�і��(d���?8XȪ���5Dޜy�c�G���z��s�q��B�"�gmtA��#*S ��`1>��M�!��!v��R�"09�~;��([r)�ll�j.sg�9�9�]��\_���w�ǫ\0c�c��1&�
���1�8ӊh W�S�k�q>3�BL�����R�(	a�h���~q�.1�ζ��\X�E�Bc����Ϲq/fA9�r�mX����k��O����=i��.m_� �fM��;��b��-��Sw�m>>���b)sn̬>�f�Sfw��[+J#�]�2X(V�$N��$7�"�Eq=d�����hk�#tFKS=n�#�SH�[�Q���º��1���t>4�`-��7�Gcb�-�N�B��N�t����CLu��]�Ǻ����A��7Cz��4ȽP��I ���:2=�������[��h�v1#�{.l@���*As
J��BLV�*h�a���5�����ޤ|bPZ�uҩ���
����
�U�L�)t�
D�1�v�0��Ē���
҈_�+��y��x��5}�*�j�wWpK��f�g�_bv$��貿���-�6�*��&���V�R0}�@$��\S��S�����ѯ�,�0�	>x�>{�����Ч?�t��a;p:������Xϙ�"7�/Hj���շ�=�����2z���|У=���e��U�_�j�蜡7��q�AT��-�]n,f(yu2�.y��?����V���z���(���YN~��_g�ܮW�&4ޖ�o��#0`Y^P��Q�	��`[C��_�����쮙
�-�al��m�`��O>�}��w���&��M�����p�1���$K�#��!�c�S(gIoo�$������a��}�kK!��������c `k֚#_63c���bw���������#��}�EF��w�>�{<T��)߽�L�M2��v�%�H�JP��'�~��Ɓ�����9���,|��0���!��2 A�w��X�`_}3Q\��[w�Ǯ�4�RC�N`MM��I��j(��^,��.�<�Ff/#m+K���aj樾�	)�G�B�l�>�u`>;@!�|
Ű�:G�f�p��CuJN$�DtaO�VQ��j]�o�H�$p��KM�a黂ip�8=��$a����=�0?����{w���?_e ����2J��� �#�w|Ħ�h�'���Y	�g�<�3�'���/i�.Y����ʾ��Y���`��';�g�:�#~�?�Wpͨ�q�d
�?$�?D�#��I��s�6h�A
?_�%�S�U�	x}�&y���Y��?��L��<�s�g >I�����R�������N?yr��h�����<~~���A�VqQ��$�=z~��LES�4�����:��nѝ�����UT.��u��>�:uh��냎=�A��H�%G��H?i�(�W��s���Sp�`��1��8��&��)�[
����\�T1��AE��:�l�J��\��L���KS��.N�<G|P(��)���~�rB�k�*hP�b�q S�~cH�i�F�<|�����ã���~B P3�!Hd��p���C�`�_?��!6�@6�$�w't��ĨVR�GKH�[p�L�m�z�N�E��ɒ�gܧ�:য1b�s�6��{�����3p�rMA���G������  \�J��O��D��q�]��{�C�ȕ��vB�y����4�8@N��upC�L�yo�]��RL<!۾v�r	h�Sz���R�]�Q�겗}���vO޾��(`�?�I�S�b����
��y�@S8�Un��a���<cV�p����ҡ�w��H���օ#,�KD�|��S�H�q��M��{j?O��ƺA����ڊU���@�a�'�G
�2J�{�w�>D�3�� 30����K	��P�,�U<JY
O�ByEW	`�#Me*�>H�VP�5R#mD�Q�����x
��\�@�HV7�lA-W2�h�C
k砑D+�����s3c5�F3�v=$��	Q�����
��zb��XL����u^��B���a�\���U��FN^ƶqԥ�6`E��hD1z�T��`j:�Sq�m�v�u��X�����V���`��9�8�0Y����Y����6��M�
!�NNe�B�ƈ˯b�1��cS�m�,�����N�Ѥ���;9���$�\��=�����O+Ä�P���z��z�\�qS~-�\��[M�l�l��,(3���tٔ�C��p�I�F�}�q����n^
x����/�Cc�o��9�ڬ˳�nv�~%���SP���z��5�c��͞�t3Ӽ"Lb֩sN�m6�G���@&�5`�v��^�}���N��~Pec�zNY˨4�ȣ��MIV��N��a�����HEŨ�H�d�a	�-����0��@�d6R�m��W d[�D0�.7#�˞�����@�b(�Mg�,%D����N6:���dm�5�A2��a�i;�Z��?�%AA�g������b
	/e��R�F�ٴH�b��;���zx�Q��lQam;�V^Um׻7n[6��x��̶v	vꙏl��5t�3j`kaF���6X�U��CS��Ly.a-�}�6��F��=����y��+��e�C[�-�� ��Y6�w(%R��=��Ҁ���ԶG5Ii8�
}��KbJL��� ݌��'�������w�A�
�镸w�Rl�V߰ٵŴ���by*�}��gĽ�Z�<�U��
�K+-*[�e�"��4�y]#X��a���M�+7�3������tWp�;��ָ�06~7���)lticC��w�*	��l8�]�R��U�Q��n�7Ig�	�N���Q	\ސ��˝-l�:��S
d�6f�����߲8%i�`\;�_b�v��r���|uR_��U$ۯ �NYmI:�[�����rՉm@���b%����.�Ը+�PUq �+��>Q)Ul#�ߘEְF��l�!��!�ݧB/g�龪�T�hy��
������5E�!p��\<�h _�@�:�o�>������){S�gT�?���<��'~�j���5V���IT�
�l�B\�TG��e�x6y���g/�N~~��ɡ׸&�F(�feF���q6�˃�S�C�Yw���]���*�h��b4����a��o�Һ���������0o�{��wh��t�f����A|Px�N�=��Ց�ª�J�]��s��G�l�Sv
0��r/�|�x�s���X C�����Z��z��.�}VK2��k�]=������t��OQ�
9D��RA��Ucl��WUa��[�U��k��Aބ�6^�
�1:m�ŝ�����Ƣ;��(�%tU���{ݶ�WTi^�E����fM�cmUlA�W�k>6���C���zL/�)�-��Z���������[~���L�0���g\�ؠ��|PK�L�gE.>#�RpU,)�����ʞĹ���zF4@���w�j�����8%^�/����8���\��ց�6�c���_��F<N%��`�W��z�1���@���c�:���/7�t�1�HK��A���u������N D-|K����vmn2Y@�Y�[�h���˦ko쭚o7��UѨEP!8v#<c�Y>5��j�V����HYd���n�.W�R��у����4�b�a�7#�S$��k�XnB��̊��j�^��ѡ=u���N��듆�W��Y���6 ��y˅�����߿^1{���<�%�*��S������Z�vgmg �y�!γt�Ӳ����t �z<����7o�����9���H8],��ol]�r=�{������G��͋^�+� �s�#Kfbp�/�i�/�j��E�β�B��?Z���<�5�"u�"�>���{̈+  x��}kw�ȑ�g�W��$�)ɓ�DdOlO����3�Lre��"A	1I` P��p�V��Aɞ��':�D���������>~�]f��W-��p�d�Ncr9.�y/�4���iO�����b���d<'��U^�I��Z�i<K�q7x���F��>�Ӌ�A�`?�iM�� ���`@f��t��������~E�Z�.[�ϓ	iφ�׌}����2I�d4��ˢ�W���O{�l��q�E�=h��?�~�	i�0Ľ�Y$��7Y�4!�%3�ݍYyۥ��!!��#��UX���Zt1�C�e�0'[��c�aB����$bEc�U< ���fd�$�)�߇g�it��?�IYXP��x���*�ίN� �N�"΀"�ί����8O�����*��,h88���7�8���7e���zr�Y��r�/�:��bW�֎�P��P�����E��PR�e�,����x��w ��w�(^ĳ4_t�%��|\�n.��9,�64�@N��h//����%==�ne<M���jW&��%~M�(�y�Ta݌ �J˔W����XA���8���J3��h��q��&K���yK�t�i������I��%���/��|���#fė<�eE�k�!B�^{<)W0<�vG9��4��T/h禌�����ZdQ�:��f�߲�Pt�����2x��/��w!4���M�E� ��l���]ZƦI</b�� �7h5e{'�{�����E�!���K9	�4yyFR���Qq�9c�O9�3�
1�̹��c�b�[�3�����Ih�5ܔ�i�;U��X���`��$��<�ѳ�Ps�NT_����?�8
�q9��v�~�HX��R�J�x��PD%�G�tkOq�(���J��3���Ғ�3��
�Xq��r�^0-W�
ɉR�J��l	,1���b\N.��_q�����u��ӱ�	� ��	�N�=�V�%EY]b��H*J%^TH{�e���V�@��A���T��4�t�Z/���CY_�x��<�?4^!&�: ��;��\Oz=� ��d?]�x=m1���Χ�M
�}bt>�|Z�jn�:�&T	ݨ���㑢�PG	� ���DO�z@=���e�=|�Ps��|�ƛC��O�>�w�H_�U9��\'�%��7hS�ɚ�L.�K-�Ih"��{�����KT�K@^ ��}�Y����T�
����{���+�sL��I	:j�́�c�F@���/Sx��4�N� ���Ȓ��Y)J��j
�g�|��[�%�P�<V�����`��d�6�(Y&#P���x����½CM�j��V����0$fd�*�'�v4�5�������8L+�*IT�UfW�Za� ki7������/C]�M���ruT�7{�����I��b,�1k���o�BS�M_�"�sv��.ڐ��
(5��8���!?&���􈑮��W�>�i-c}-�I�VB���ם�[I�����l�ԑ�)3K�R#0�Q��~�sd}z�ğ�����ASTS(������8OW�)�@��(����!.�U>�	�>�M��ԭ^S��R��	H`���N
FUpI#�P����S��ީ�R�i9���U ���^�����s�u:��YY<Mko�@W7��o
�QU4>�*�Rْ�V}�D�¢]qġ�//�r��x��^��*���&��6�xǧ(
�-�6ħ��n���!��9Lj�
c�dA2.����qe��/����P��٢g��;���~F[,Ց�h�F�_�ʣs(O�=d=�jQj�R7r��[f�ᶛ�^B^��vi�;�ǫ����Ukʯ#� 
5��	ӏӔ#�v�G��#NȨ���V�بϚt��q�/x�G�j�C�P����R�����zv�%Z�ve�>�0��C�!������q�?|8R��{P_��xqI'��
<�\��TDY9%;�L[;{���`T�� )􁂕��`�?O�
nj��@�ldr7���g��c]?+�n��;�EZ����W�1V���D���Lh�	�K���:5�����&0�`��҃�W� �}�š��׾��<�1��(�a�:KKz�� �����EA@	 ]t��>���Xl��y/�7N��2b�UV���b�L�I<��Ƴ2�a����v�}�$��Vn֚�c>��Pr���e�yr@4
`��Y��e:�`�e@��^�`�NA�*
.��4^��k�T1�+��[L�$+	N�
e����1{Ŧ�d� ���F��-�
����Z�M�/�f��v�Nf��G�қW�r�Ό�@gt<�/Vba�G=��R�n�k'��;��]�Q��%��p�9��;�*d\py���톁u�N��C4l����D�d�;e|c�#�k��J�3�
%	�'E.�@�Р�
�ZO#��̤�#�]��s�ƻ2���W����T�bq}jr�@^�֬:���Y��Ʈx�4f���{
�u7�9|�����j6�xGK�
��"��Tj��-�׊3�GG���#�7Ŷ�ݵ��&�M�aХ	oc \{c�,�E��%�s`_:
��S#'�&׶�1N�����X_�K`�r�@h
[�t��Bkm����K�6�s�)Wڻ�����
@ߒ���L3nT��*u�dJ~d�������7��A��)��C���޼��h�7-���N��k���Z4%w��8�z4ڭX���\���g���Ḳǁƭ4�X��I^�0O':�T}�W���W�&��M�uD	K�Һ��@�v{��?�`:{ڽ�m
�z�-����kP�:˂�2����P��uG�
��߫�1�5�������y)jd��4�\�|��~5/�z*v��zP6�rGf	?�{��!�A�Հ��\_sS˻s%g#a+�8؛�<� h&�g��1뭒�K��>y8�`k� 6�M3����M�=��T�+'i]�c�J�Ά(�RE�5}��mŲ�Tv�y����*QM{�Z�nT�4YAMs�،���!�ԣ���֜8[��
bma:sY�=�����h�݄���5F����Űe��bs��!�)�T/o�XY�ZB�:���x�G�Cf������v���&O;]��|�4�m����u�ƌX����t��t$�
5F��h���k*m�C� s<t0�
f��XIW���s4�&�n�`�;[�6��MPL��d�ܞ��[Zx�_��	�A �ڕ�A*�� ����G����m0�b���yC�,h�fm�~ܞ�ynj�}�t�����y���r������1�W�ֹ�����iZ��鵗)^���!�F���E�	G�������o2�����e�>?l�v�*W��܎�ۇ�x#�G��9�K�-)o�}θ��M�����z���l����_��v�	�쇞;�8!�ڽ�Df�Һe�+YA5j�A=>��Ξ�`���C<�n��-��J�)j�ƹ�pY��׽�<�M��#�i�ef�*��l��^o7z�׎kSC��k�l
��$����A3W���U�[wO����<��a�+T�{96Yi�]]:�2k�5I6SC�!_�s�!FK��ӋI���Ua�ֺI�M�Y���]�L�0@12I1����k΅*gxv�'y���M�k	����eZvyZ�ʒ����,,8�-��rh+sm�2T��E
����LC�B�|pәk6���aP�\5oc!^M��@);�?��.�P'�j1S�L��w���#�����S�V��SM��^��Rls�}�.�C��o j�9�4x�\�o
�零+�窦l	(R�>��i�.+W#SYOvyg
��u4	2�DF5A�V*�* ���!x{��D�o
0�῍�f�˄�S���j�PM�7/���O&�f�H8�6'�c���,o��{��P�藠1��2�o�$4�*��e4���5)���/
$a��M�S�Y�ܑY������PTgLW�-or7���Њ�l�6\Q�Iƥ�}#��4����m�Q��I���匂B��z^~�%#֚qXG�eTu���]�j�T'<ߙq���Q����� (��G%U��l������]}W_8��'F�|a����ir��l��t����� �1*_ ���@2㱾 D��������0�Gdk�n���/�?������6@��x�;��RXaHM0���]P��s��A�7������5ȿL�����+������S�:����C����e�>���1o��ҧ~��}Q�Hb�����b�X��GM�@K�yA]V�
�`��c�1&��11�u@R�ТY�n��bf��������twۑn��� �����צzm%���cG׊����$ɢ4�l�&�m�'��P��Q�z f���>~��쫙��yC���QC%0����传�t'i�y��oJ�b�ę�Y"�v����Shz�W6g���;]���������=x���S�i0�aU%HQ��\W���׌K�Lr���5x:m���Y4���/~Yw>s|i��\i3��I�{���y�  xڕRMO�0�G�V��b���l�TUj�$�Q��3��8����.��8���|TD�yo���uUa/��X�EY��_��H�..�~�I\�6���۔���� �
�[�	����D� �ʘn�nzM��#6�2�Bi"r��H��q	xDC'���������Ԡ������Q�˚3�\��+�{�B?#>%ӗ�Z���h�^T%*JҔ����u_%��0;k�V��[3���ޝ��+�k�S�mgP\)�D7�٧�3?6��j̅����X_5��� caenmt��f�̆Q
�;,�Q6ɶ�^����X�$JR_��5�������|�<�����ō&0D8  x��}�z�8��o�)m(Ųn�s�,'��ݝ��N��=���G-Q6'��!�8���u���y�SU� AZ�$��v��DĥP(�
@��xy��V������I0�s&~<�V�$���N�_]ͽ�]�����j
&XL�f
y�-D�*g0�!W�t�ǜ�-���|:��v�`�u�F.��lf)���5(�
0C��,<	�my0���-�1�y`�d�<[F}�Ẑ�;M j�Q�[$����V��܏ߒ'0�R,Ra��ϱB�@(� ��,CT�n{���w?�|~�v���H1���U�Cѧv��+{˫
aZ9�}�ټjXc�7oݿ���������W�L(��8�h��]R�	Ybze&�[Wٗ��~� �V*��t!��sm����}�Q�;|ܺ�x\�dR���N�s�iT5�(Xl�r#b�"�A���u�6Лh)6'�\]�:��L�zC���Z@4�5C�(�2�1���~�������/3����d	���4r��u�zQQ^4;B��9��q��G�ՈT�*r�
�ஐ��N��`1� ���ggg-5��]����������� KU����I���P���K/6��VK\{O Y�&��Š��Dv%Fk��tǋ�\0�����d����T��܂)�D�x��U������˼�䵏W��8NT@�7 H���&����43/A+G�ǻ��>���O�7�����bA�I��~����ݕ�
��Z����@�8?Q1K&���E��N����8rݟ��Y&���Ij)"y�Џ`  �L�����W�j�˫��(�'>�f�q�"��y�4�͆G;�17�O�	����-�qj����&��򑮰RYE{mo�e���������ؽ)�p�k}cս`~��h<p�z�����v;�oj�4������w�E��i���GXc8Ko2���(89MvY����g`,$�؛mz(}wY.�l:=(1�I�ٯ��+8������S0#Co�d�Xf��XF10���܆ٌ}�/ƀqr�R:�����i׉�
�9?��+�,��:�xcqra�F�� ��Z�/�
��/���2Ģ8�q�c���!��F�I�[t���װZaw
q�9�
�g��Wd�x(o���.�I\�_��e/����?���$�����'�޸`)F6�(>^́�1�!�yMΈ�����(z�*�����l�r�L�\K�1!�-��7`�7w\�x�mw���b�[VP.��3+���p�"���b r^�6m�6_��RL����m�� �A}�ʥ���,k�~*�'�{L`X�x��(�N���1�y?��>��RpMI�y�2�1���sB��.봶�y�a�b<��?� 4�.��6�
���Yu�ml)���F[5BP2�A��k��$������"|*�A^E)Y&!� �Vc��Er���T�N���b��>�_^����i�Ƭ
���r������(�_�"z ї&�u(|5��4
t��Љr�B�fmS���E]}v5��.V&�m�	�6��M����\���%b�Cb�&Q_Oh^Cw�\� AQ?�n����1g�(�lL�5����*ZI#��٨�r����*o7/enсo���D�ߚ�iPN."����
ڔ߸M�kҖj'wq��O2����������r�v^����g�o;ףɅt�BN�18���%W�wh^���5�����]P'0���4WsWL�)�����h��P�ؚ�
~�2�nLW��W��<D~��{�E�&�RiL3#�=/H\��@T�@�༳�tC׽�sd~T(<,j
U����K�p4�{�:�I����w���fv=�c�%��2N��C�9�3�	����Y�٦*��g*uU�Ϋ�W�KT�bX��1�ѽw5Q�qv��*��5������h���"��|�EXX��W���䘬��͡l�����Z>ۼ�Nq���~�ښ~�|�z��L�.�����"t]Z��aX�8�ў^$�7㦾�����ۤ�$¿Ab.��2���t��#H��j�O2~�/��#��hW~ĵ9�jٕ�����64Aa�n�G�8K�`nm�B�����fd�o���;�������w
�$�3�������7�?p��-iRWqU�*�@*��Ԃ����Bp{~A�C{�]������m\�W
��)�
�{<��F�^�4�SZ�+��v<$_��P�ҷ�/$�ru����*�+yK���Wb����e���+P7w�.�լ�m������Y�J��,+�_'���N����6z�S��w%�ʷ��w3.�Ħ*$e�[���|o������B�^����//�Ŗ�gf2|��З�R�O��HM'�����)��Ɂ/=܆��-90��䫾��%�N���+�%�B�>?���x��w.����P]�O�yO��9�B���t=�Ѹ� �9䵱�o�i�f�
��_����߉��z}���"b���$�8D1�:��,
�NZs�R,:����0^r
��
u��I@UHx��_@"N�J�έ�RH�2������� %cg`t�T&��>Et���Q���JMlP)�z� n�bQr8>��6&r�T 
s@
AW��6�ݻ��O��ɘ||
�P���4� R��+�F��$�"��L*�ڹ�l&t$�#RZ�GV�9L�։I��1cG�����_���ׇ�QÈI[N"B��c7�2Ow6U�g�1�f����/4g�	2�A��ӳ�jvWj40�Zi�'�ѻ����-�i�NX���b�|e0�^�b\$�Mc�0�ďK Y��IJ�Q�G���H�hn��	��!����\KY5b�C�D>j`Q Upxy���k<B�'��%��T�����ڬ������D+U,�Hi�j�bU��"+��y��H��;f ��k��
\!ȨY�`�Gޖ1���V�����>�hqz;
{�
�G�犊��F��A�e����%�{���X�}���>�ꁤ���Wǐ$x�ӄ��2�%o�]$$3d��ۻ{��H�G�$�������sF��QLAg�Z`A��������n��4�
H%����Y4xm�F�\����K�TL���<����F#<�&|�"~�6����?:�ԐV HP�e��_���M#/Abg�����y��[���ˠ��!��s|#�Zx��V��t��K�@���0RP�����'���P��{���1��z��9��� ���,%�n�������;�Ժ�'���h��Q�gj_�0�Ҏ��)��pQ��B�"�5�K�H����%����즲K���V}e���H�{�"����L�yUX�D��֗����1�j����/&��n��FLoڰ����)�I9�WO(�^̶ٹ�Y��,]��\ZvM��%�,�&���k�7��8\~�tX�A\�A������a&�8gB+��,�E}�#�&��O|���ب~��>V8O�ʴ`�5�;`O����|�����	������kQbV�!Y�΀��%�`��\S��>x��G$hKUj�\�����|ё�S�m�Ɠh�v����%kܤ�R�,3�S&̽C�`�ȧ�q5-'��[f&����S��+��*��.��)ͽ_��@��r\o"7�QH��U��B�n�Hhc;W�,�I?d��P]l�hR��{��>ḟS�a��7 fл*��$�=��GU��ǐ��Fgl���ls��0�#�L��y��ݝ���l��QC��+�%�c0�Zװ�x��˰
�1��v�D�D�Vc-Ts��4��t��2|3��BU�sm,��K�+�̔^M�ε���ʏ>�5�S��D6_g-|3ծ��Q%��̕�fJ���^��B�FJ����o�x��~8�+e/]f��	ļ4d�ZN��ߐ8�R�.W O!m�C�X�w��U���7�F�/���ÀK�/c��)�Ӑ��;�/�V��4�]`����p��5 my8��Bq�W;�t؛E	\����B2G
�;��D��!����jG�s�wDt"���(Z!��
�JX�vG�[�h��'�aIe3��M����F.������f�����PFҝ��k*�p[7����&�[��-�/|}ZI}q��m�"�W���r�)§9���R�vuǜ$�etS⣩{�6S�e�+(|�F��X�-��}NUٜ>��6"�$�N����
E�ۚ�����X(x^�x}H�O G�K����J��|�iɍR��2UӌLu=��]b����`�#/(���)��˷ g�˽#iSF�O��>��3qo@5����0�{��}�8��B�Z;��$㣬���gN&�^/l�Ap��3�u���j
�\wn9�T�(:��y�~�I�6�Z�軑��>?w+%W�U�_5�(�<u�J�u���`J��-q�[x��ܨt�b%k18�_��n�tuOݤ��^<_.l������oQ 
8헉�n8�Cm�T���.��(L�q����%k����Y����m�����F�S�M}��\�{�XR���BR!�iyNw�<���P���	�۔��2�"�$��W1B����
պ}��k���Y�B��
񽆉�6'����:w��w����Z��U뮇Tm+�H�O�@z���NZ����}uQ�`H�Qw/��Q�È� >�Z
� ��5x�9d�I���o�-��]�IW?#k?$�Dsg����:��.�	���q1|�Ƙ$Դ�22�>e�k�E��#��\�Ӊf��(�\Dӏ�k��O�m�o�.���y�t�C��H�iFx�F��G���W���s���U{�9?$��`f��u�c���dn-���n�k^�v,�
ճ���Z�T*n�s�n��U���>��1_�:RJ��BU�ү��t۩�l��}�*P����<p�9X �JEr����V.�g��8�.�Pj�q��Y8���[����x�5*\uiq���;�K�L�.���6�k�W��z�\(>,DѲ~����ձӒ3��9�Jg��t�P[��̋O�A��^�i;��`���������R��R�#]���O�^C�lv�s1�h�d�U|��@x�=���x���m���5'_{��*�v�bJˌ�0y߭���~�EskUW�2�/�m��v1����ኩ�n�Nv/s';s���z�����Ԓ"�p�gH�yKȐV�14P7"� tEZ��22t����_^���Ad�o
���Ŋ�if`�Ԝ�B�a$e��g�"&=-W���&e�e׍.��xς��p��N�>ߕ/��0�l�s��@~��;��X�wR$7����e~q�u=5�h�#���̨�M�ڲq�n�׺��-p�זbS�_�����b��4`�y?;�okǴyH�®�%�
?�jw[U����r�3�L$zK�}'�	���S���D�Ú�Zҽ#�C~s(6� OK�&���ۡ��hL	c<���f���)kH���;XC�����8���.���`���.�$|7"�
>����J>���� �v�&��$��S�wLB��
\�G��Ё�-��Y�����=ή�����|X��S�h����Ռu=x�:;���Ǿ��Сy/�<CρMl1
g���&��n�1��qm6#&^0������{��2~7�4yx��4��A�#�*�N�ޮjQTmt��h�61.(�ϖ�WK�7�.��9"	�����?��^<��e"
УYݐ���t�a������L�t��'#��t��Vk�� F�r�Qh�K��T:���3X�v_�x(����*�R�I��1��VK�;�_>;�۫F���~�ӏ/�1g����ֳv���s�_?��#���a�-� ��7k�~vX�����Y�l�ڇ��Z�����V�5I&��:��W+{�5�	�ɣ�L��?W���Ɂ���	�\e��Y�(�)KW*{I���}?V��9��Ŭ=�Y��+��>o_٣W�NwQ~���q8�(L�)����ݮ?�ISo�>���[xMv蝆s��)>x�d?���>�n�(���Ly}��w���ds�p������Ó�}k��|�,0<?zb$�6A8�,v>�/��_�.�C���w����3�^�U<������'��d�e�5ӎ�$	�<9Ew�-�5p�=���t�KO]��?@.ӏ0G��t�x���H�P�^����-c��|��q8��ŋ5|=�t����T/2��4�rx�rx�>764������!�7Ym�2��d:�ƫd
3���W����A�d��ι�"��-(��Ϋ�.�C���� �r'���15�,q'���#l�R��j��zL���i���'[:�Gw%[���&!�_�V���aR�
�(~��P��i�{2jx�B/Y���r�#����[2I�Q
�r�b����
�B�X�.�6��S&�9��\H>8��"W��L�knZ�;��0<��{>�fҐ��΂Ir
���9ξ%.����{�.�Mb�
��f��]-���t����o���(_|W�`~"�:B���꧊<r��;�^�c�ثObE�u��8���T-��7��{���K���N�/��'D�?�k�4Ɨi��"d�">�#��P���H=D����E���Ђ9$uwo�m��ݩ��K��bC���!+�9�$x�{P�Й�-;jqG�����}��M��c��#���~G�݀�n8���/����Uґ�����x��tz�=:���Qz��H<�,+��.�����su����=��lm��!ip?��h6��fth�:}yg�d�H�'����3�`��̪,�����PEb�
b}���?d#F7���`]��f���_�[�ߪ�>:��I���H5�ވ����z�=|���9bC���
��
�2�bn`�$�{X�K\����9�do��� MW�p��2ڍ|=��u6��<<�ĕ��G�>^y���'u��k��yz��?9U�oA3�2�Q`���r���-�����o�hX�[�x�)>���h���g�$�{��z��Uǋ�����9�E㕸�@Dێj�P�����A�ɤl�)9��*,��!�}�)��������y���S�Z�2G/%Ө�iW{|>�r��7��]�?�/���kob��e���t��y��n���}��{m��6��?c�OCF���L�Ӟ]�a�ͶQp�� ���H�'�߃x�
�Ѷ#�އjc',�:�u���Y�Ӣ��$�,�ţ����7�D�.�d��A�b�D�_��Ͽ�47���7�Q��_ӣ�ѷW�+�(*鞭�]M��G���nv��$3�#��v%T�6���~���:��״��Q�[��	�����4Ǝ�5l�	�i�}��qpV�G�6��i��Ճ��� D���2�U/8͖M4�ib;�-{Z�޲��K�|���2��;62�ީWï_��ͣЍk���m�V�+�;Cޭ�P|�/x�&��51�1�k֙����c�i:X���Q�䴦��:��."g#9���wøL�y�D��^0gZ#
�^י��8�\�1b�����g=�o�e+�4
�ᖞ�MWךcO���>q%�wf5��=���m6|+��U�+�����<\
M�����uZ�{C߻.�%q8g}ό4��%�1�-��s65;a���sv�چ��S�͎��hu�r�Mi4��F�С���:G�$Ҿs�uڭ��l����x�U���/��s˸��;����B��$i��n�g��������R�����;V�8�RHWJ��f��/A*�c<����������<�"�(���{�ڵ$��؆Du��ݤ��9�Ϯӓ���#&o��a+��8��(h�!� F�H�>;�fO������3�#u�<�f$0���y�85`��>P��ۂ-$rO�RB�{�b��2.������A9�DN��� 3Qdc]�}��v	^#��ZS�}����<c�0��>�I�L�����ݝA<��+����O�0���x����0�%��#�$�L�BFj<�Ѡ	�{N^���q�mب)C���F��{�,\o�aϭۧ�������[ڐ���7�8�Dr�f�h|2-H�S0�
���q2yuE#���C��ۡsM�
r���t�&~"���I�&Z�E3�fz[�D
V��k���w�y\��qh<��@�Kņ[:�x𓔄g�wb�
.6�<�+$���:^�AObZ-�Yϸ�Lg��rIw�]ĩ�H�T��)x�����M�����SMXγ�9�Lr]ϙ���
� �m踇OI�-��dZ����CO�a�=շx͆�$�0���N������_o�$�d�Ї��)H�9�Ç�,�G����1�2�)�ǒ�'&��Г��=��\
s��s���f.-��Ƨ<x*U�x����|���)���jU je����V�"�햢sL4p����+������,)�/�,+�����҅��e�b>�q5�ɘA
��[��h$'��C�2�k}��++�5m����b%<�J�AVv�D����A�V����UЕ\I����� n�C��)Tv�k��d�=��%�T��zC�){��q���Y����Im
Xqtt�k�YP)R�S/A%����C�
D��J��d���h3"I��W�s-�Ź�`��1N�҆{ؒD�$���p�@p���jXQ�X�p�1�6K��!�B���
~�c�R�6-�ސ�I�.Y�R�d��DxpIE����K���9X�r�(SuW%�Rfؖ��(Ļb���W̔Vr�8Mds����x�r���.�K�� )���"F�+��գV�.�`�~=ݬN����>�p�f��Ã{XX����� 
�$�����j���񍎁<z"̏�~����q��=�%�:��ـ��� ��=���i���pX�D�D��(�H!A6������k��J�f���vNg>
���
�D�=p�?zU�J�}Y�wv��P�$V9N����E
B�:ص��Xb�E�K�|��b��ҕ���Z|d%v��"��/�t2E�	+x/��z�N!����K�.J�L��$1b�U�TcY|bf���+��%iU�MN�ߠ"'�_�6��i�AU2�J��(
�,�F'c%#D�ï$?
���)�<���;,�m!P�P�W��xh^�1i���(J��ԇ�^�&�@�t�;�h)y�[i�ѥ��`1,�ɪ�kY��NQ�+dJ�"&qT��VL�[d$��,=b�)a��e;��F��an���uf�c
���s�^��O�����SЄ(V)b�z����<F�R�K=����Q����J��v��"p,�:ˌw˵6�,J��=�$*����n�xc
���{�U��9 O]�[z\������Ms{�S�e�z	4�(��e�B��^aw ��n mWo�%�MʮK�Y������F.���ݮ�#���i�%1���nF��t���B'֡O��қ�&fnX ����qO'����ԀQ@����L����q~d��M,��^LF�x-��8��R�>����G0�7��ed-�s�q���qW��ũ���j
P}(5<-^�]'4Y����`��l ��RD�p2��X~G���9�H�	BJ~�I�3��@����,P����х�=�@r.�ay����fW�����Gq�f %�>�����Dǥ/�W��UW�}Ģr{u��މ���UࡃJ���;�j�֝J�+�0ZU�w���Fg'RH"D�#L�/X�A8^�yG�D�$kJ*�8b�$J�Do�<(�����).J/X�bF�l��O2�*�Kr7&�A�e��,�1�&���b<p�˯e�t���T�*���{����?s샤~��a����
BF���;'!ݍ�A��;v=����x�2P�ԳGUP[�����K���m<�T��',�v���<��ygS����G	k�� ��j����|jnjw��C.*��Mѝ�>GRi�Eަ��WE��CS-�H��-����'�"�x���O����^�eq�7)�0�$6^yyT��&��8
��.�bCr�c<^#��x� ±�H�;m���=A.���E�!	V­)�`����c�0T��f��,VB�YkJ���A�8O���O����������B�   x�]�Qn� ���cp�
!@�uWq�YQI� �TM��L�M��Ͽ�o��1�s�ҁ�3:�' ��ձklߴ�z���g�d�/� �w����p��K�X^�:A]����C:S�jڱ�!��K�r�q���8���m��T�z�J���i����
-@��t��ǫ�������0���i�k�R3x|~���߾ ��^�+   xڳ�/�(�b�J�2��.�2�R2�IL���S�δ2��岷 ��	�l   xڳ�/�(�b�J�2��.�2�R�M-��OQ�.�(�e椂���0��Ģ�\�����2�RJLN�/�+Q�N�2bj�T���	6��J��_ɺ����J);�����ގ F�$��  x��=�w۸��므Y5$mٖ�vw�ަۤ�]��m��^m���(��L�$��u����$AYI��.//�H03 ���鷫�U�x������|����$��<�M��*����s�5{OS��M��9��&.g�|���*OK��w�̧�q�L�W�*�Y-�*���p�Sڦ�"�gy�H�x{�0J�2���ܫ�x�!x����A���$w�")�4�� ��Q\�}@���|0 ~Yiv凃��� ��f��Rس�1�����
 F�
ξE�w�ٸ�$��ǆ悆5�bBe���a��&�|�d�F_��^�!���N�h����}��u���'�jT���5�W�z�w��v,o5�#������(�.F���Blzᯆx+��z���LT����K�J"�%��q�$�[K4��D�cl�d���jrC�>���(�ǥ7[�C.
҇n����{ٖvغ�&{ƪc��4ǘ��@��k�-���@
��|=C�<�y��9�+	["�g.��Z����Ը��n�)ށ0�0�q����ۋ���d�o�����7���n��W�޾|7��św?|���/5����2�Ȱ����u,���`��K6L6�h(@a<|,:Z�x���� fy(�T ٨C�ME��lʝ� ��*/��7����E/��Ds��Kb�3�Q1�@!;���]�!��{�q��q���&����"+`��B��/�
��%8�xwb�M�!���"t�	���PB/Lkd�{����J�� Fc�<�!��A�E�U���HT
W7ʘdr����dq���sE��j,��0ԁe� aR���A��Re��dR�{�K���a>15{� �A�Hn���y5���>����±o �*�:����PY�\� U��r���3�H���)��8�武R���n��]�T}ŕ3��,���9$�����*���GS�vN7)�O�}Eʙ�I�9:�:�b��DBU���ҨZ�J�,�m;�$����ޏ��%$$C*b_H�)g{\<
C���(E��!����m*E�v�P�����P��$u��"*�o��y��^��F�*���{�VI6�����	�LՐ7�*"'r��-���.R�}c���%k��P-Ĕ���R��T=�ƅ���q(4�y�T�(���D�{i6t4�Y�>��F�����42M�z��rQ,�^x�V�04��#7�܏|�����c.:9CM�j���*�5hV(%���Y�%�Cj�0���ܬ��
�S��N�f1tH�4���� >��k������h�ְJ�<_O��IE�Q��+�_"y����(�
_<���1>��KK�I*��v_�$��	P�rC�n�3�!7���hjm�w=m�'���+��'�������8��?4;�HI�s�Q����
#��<���h�A��a�4��u�ZD��d��ܒ.��s�Ǫ;ЁО��v E ���L����;��7�Q�%�L)4�=�( Cu�9�A�O�\m,<��c�S'��ɚ�,����8qB�$O�i#et)��S4Z�hɞ�f�*���=�����	�tA�Il� ����
 ��Sȁ�N�m�񶆃�n��
j
�70l�>׽�#[:�� �4mhҽxtoQ�uṇҒ�r�IJ�)��j��I8��8:OP*��#��%%jP����NK���grG��Pb��E�!L��߱�!��eT=�
3J46���2��CC>ncyS��d��R��Vڀ}�O��2�B���!�K�ڲ`h��"��"��<N�dy��+�˯w*k�����.�ӑ�ua-	���Ya�_x���,�eB!���
�ᛀ=����2��q%�Q1�x�؍ŝ��6��|��a���R�tm�mL�En� qIs�����z�=���^�l)���?O�hߞz�����,�1�^k�R9`·��*c�&ǃ�Q�+r@��iŤ�6�["���R$^�dB�XR5�ҝ��{���b��-�;��k�lܘ�v���-p��p�m	��<
E�D��i�wh�F�\��x���
s����X����/�vӁ�v��)�5Jln��F
1�g�����Ø&�R"|�5b�JV�M3�����d�[��ra���R����]�E���1W��U��
�����*(pl%�%��Z�� ��+
]���uF�my�B�*9f�m�nU�u�:U���uz?I�^�ʼ�Tv��\�����[6T��I]\�XW���fR[J��m,��\#ע0�K�v(}�C����I.��3V��W�}h���.��7���=8�Ѣ��^z;���o��j��@�7$)��1�oQ�-��'���JUsV�j Gy�؏��Y�شH��c��{~v��=a�eh�?9A�,@����h���"H�R� ��q�_'w�獍�ȸK�Ur���]�����xa��U�>bs�_�5=4�#s�ۙk��ܮ��ڸXs�ȑm
m��J��>J�SJl$����ٳ"�Eң=h4���d����z��Nf��S���Adک��i�OZ'{#'S5��2[�ne�p�J��5��-2�֍n�����:
��7E�5�#'#����TJ�� �%G��=��m�O+8�X�?>
�Xtm)�n�H��*֔��ㄩ���j���r��ʇ	�2��N��DT��8�k2����~(�l>�+^l1����X�v\>��:Q�มX�_䩉b[����ՙ����� +S�߇��B��k�Js�<���7ׯ��.e8��:�l���hl0�V��F�(:M]S.�7���q4�6��(���i��U@j��q�	;AMu��KV�����.�Ӟ�Z���_���T�����V�Q�p�[������Qg��H��.Iqʍ��\�
��d!Aqn��v	є3:�{R�g}��˖��6��5��p�#�SjO�|���A)�6L���y�kt"��If<�v�X�v�zuV�{u�9���Th
Gv�{�p	�Ʀ����EOK] T���z0(n^leGyc��t�y��]�Q����4Cr��Q�����>��ݛ��������u���XG4EMQ��*#4z��l�,�([�G�Փ9�>��ΈBd���	N�W�P:�$�����fWr]�h��5�QwW��`�G�~�Fp�{E�uON���w����p�<_���,q_�kg�m�=�D%��c��'��Mɽ��d%���������vݙf>
�_N�Ʌ�A�������U�!�]��c�hW��
�> ����}���(KW�~��p%�-�4B13�s����e_J�$����o<��6��6@��m�.)ղ|�FI<衧��=�2S�N�ǽ0���gKs>pq}�#ׅ�I���a��H�
�ΈIC�YQe.}7�W�/���"eŕ���L�9�
I7����1�O�}��1LZ�8x&��vܯd�S�*˒ry��<,�͠G��
?
_͑.��������+EoGU즩�J`��e����V��O��i��W�G4���	��?�q��Й���v"(��bO�&g���8Q�9Ns9��-TN3�.�r�ӳ>ô�ܤ
�޻IN�ד�.w�u�մ��t���Y�`�X����M꘨�Г+f�c���i�� =O䨪$Q�cmZx��6	J�a�r`y�%���2@��Y�3�99��O��>fE���j�*d�]q!��ک�:��3�N��o�y:=w��Ѯ���Fۍ�U�,���s�/b~���y|\����x������ I+��&�C��D�
Kp�aI�b��%�ʅj�B��ʼ���/�Ȇ��A3@�M�l:�+Na\��Y�⺜3��杓u#�A�>��o�k���&m�w��M�}�Q���Y!_��3aCڛZ�J��k7������O M'��!�餯��o���ݯ���y�
H5�H5���%�6��m���y\Lg�5�� ������~|��	�F��Vb�L��2�Fx��?��8��Db��!�Ι+��n��4ͼ���퐯tj��dX�p�Y�r�t��i�f���լ�bd�������/����T2��_GzI����Iң�s�Ѡ�Q�.��8>i�!�Hzti���-ŭK3M�.�F�����ɕВ�g�����ݭhv/Ӵ�d�bQ|�n�����_>M�z]n
~n`[n>n0% ��[^.�~�U�0Bƛr.�6�E�������D';~��훟~��tzU�a���I�]?M��Z8�x�\�CAq�Z��z�ZwR����)r�֋�4��e¿���$�Թ.Y�G�D�#J$Q%ǧ�7���Қvy+Jؖ���XA��|I��Ok��P.[�a���rZ.Z��t>_����"�o�uݚ��ȵ���#�@ut�JϊV�l0N��@�h��޿�����b�ZOן���;�m	іeE�ȑh֨Bibh*|d�P�dH���Vi��>6����ق��5�б�PہBu?<G)�1]ODN5�[5�RN�E#��R��4�m��TC����C���DagG9��C~l���N{�����NBAs�H�v
7mJN��1��t���%�������r�L7quU��s"A��.�x����S�`����� �	Lb�?kD/�Ն���W���%���3 ���Iݓ�T���kRK�x�X��A�N)b����#g�2��=KaAV�0";��u�$A�A��P��`�p�iyFf��b���o�N��s�w0����r?��~YLXnS|bV3 	��d������6��0�ܹ��]��+yw�9`J^�����M����0B����M�+v����>|a�8~��BH���95���A���.
Ѕjޚ�_�|rX�ŵ�"HM��w��t�5L�R00;�E���vTe�F�BY���)��G�/Х���@���/[�`�&6ӍnhK�N�����m�����^>v�J�J�r�ޯ8�����iP������a,7]=���AW��S.7Yۙ�̋�%(ω�e�?�=~���B�����i�Ti�taCG��`0467�89��]"S���'��C�Th04幃	!X�!u���!��f�^�ol4v
V��f�X]������������d��%K`F� �^QC�좲��g�ч�9tD�o!k���\~�
��#
�}��W�	裶�3�Y�4dH��/0��^ �xH�/�����W: �l���y�9T�#�;Y���`��+Z�[�s�9�?�vٳN���񅆠dϲN�AF��ܷIN
�G#|;�<��v��`Lvߛ]�i�v��"��UN��7.�*X�ñ'6O�������&��ǯ��5���!/<�V/}<FAn����Hbb;��f���fPk��Hhܔ?l�,�/`_��1�}�
�.\�]�\L�8c��D�dq΂U��K�:��T2�e�0잹Z9h_j�8�ĤLz�A��%�0��k 48O� ���C�o��t�N�v�֊�0'|<��S.~t���r!>�R�?�a�A����>c�%6%�0�#ea �r�Ò^��T[JaMjeP'�.���jX�BrpP���V���@�"p�mi�7X��~�������}�����;�b�Z,hP�鍘|(6�+��:X�E�ckІ��:���5�U�QyP�X���uT{���_���iΈxd�2��#���I�'vve�����a����~y���-���1��k=L+~�����+ P ��ko>�����\���lq�������QML���w�݃�- �@L��(7X�����N),���0�R0tg]���15�r�} �+�e��	�
�(Qs��C���H�L���RLeᦙ�r{I��Ȫ`*���Cޱ�I �<����A����h� �=h
{ `��8.`"
ӛ���Kwi���N��5�ꋻR�y�^�ݑ0 ��I�<�������yE��l���~6:��g_������y�J��-���~�p�$�L n$O���v�����E9���$����|�T�%�\�!FY@RNQ���������������>}�����K���M�o'���l��i�#Ob��/���A�A���C�s/���B?����$��pL�<�B�s%�e;�
�<cG��tf^����Ú�
�|�'?���{}�8O~)���)M=?F�����9��C4dR��p/pO�!`��=qB{4�|E�a���to�!��RԨaXRya˶�C"H
����LW�ntc��4K�?rr�H
�l{��f��.��vъ�>�77�ߎ/]�kY�l�Z��
 ���:oI`�T9��c<�T>h#'�϶��:7�n:����߰�>v6V�1c���Jy���5X���p6Z������Y����\+ �L^e��T��e�y�<l�����Y1pHl�݂�9d���6,Y���^����_O���Ѡ�{�n�t[D|����N)�AJ&�*lhE�T�h�ʾ����V�Ϛ�a�=b �^�����(kv��t��`�V�1�Jx��j��K�k!�pf��fú������б�q�I�1C�E0��7�X%7��'A��W��I���|����*r�!-����H�JI��I�P��y�7h�&���'X�갶��)C0�B����^�8�	���҃���q6ΰG��} �5�Y�Y�4�gU8��V�&�+g�ERW�]|�����
uI�o�dm.�V�����Oq�5�g6��|"�Ŏ�hb'
����֯�zvم\��e.�d�g��fw�˥�٩;ʹg�qP�(�V��H�H��,Ꝭ�<�*Z5 4�6��Z�nE�܊���<���H��������ch��j��WU|e�^����"_�+�q	�	
�nD"�_q��ގl��t���P �l��\�~�����0�7,�,I� �y���pt�A�@��j����a��K�yK },BC�n�}����m]5�<�bVu�x��~m �����f�Y\NrU00���=����l��c�������j9ϴs��y��Ѫ�CGI���.�3	�q���1^��r���z�(��6����C,^�����TU��$����T�U1[3o�:i�/�/
��X�t�J]���e��n�\�n��׀"���W�.�wl�Z},�N�+�����5�2u���t4*��zǽ�v�R���~6����!�_R�~Y�A�Oy�ؓ'�\A�5����0֣���{tP�[���.>�=�(��۪�q���#e��ĺ�+�b�`D�tYۀ�u���Hܻ�tqх�}��m'sE�~�}'!��G��9���uB�.�ZW]�K��P`9�r(�5� ����y�����G�����y�&!w����NcK���� �s~�mYN���w���mM;G,�~'��%b��;�;���&-lσ�3�
?���f�/�m�8}<̔�̂*�ft'u2xXCh�r��#�j���#kउތ�	���G��<o���
=�7�G�v������O���Zط���fכ�����N<;��h�K�����K���B�� HT>���z�^p����t�0��V�T]L��.��^�D�bP�O=�ݗ�O��yh$썈՚����k��}IһH�}$��u.I��F�$�EP��1Df4
����X���Ӟ2.h-�x�W�`��E:/�E�)�t�E��)R�Pm9LR������ 3��fl qݭ���X�V�s�5�7p�]�������}�2Ֆ�5Q������t�RK��$�Vo��a�F���+#���� ��&m1�o�Ծ�"İǀw�.7o�n�g�O�^
�'��������=t���qKGuR��� �I{�9{�){�|�?�D���|C0pGCs���'����a��ސ�� ��$3)��
��?m�3�I��T����N��u�uǾOH�K��{k����B$�n��׬��j�	���l_%��}>��:��#��< �h5��(/�'.3
�ae����uYۋ'X������w���=́��N�Ym9���#�8Y�LU����	�N�Y�&�b�*��T	ŵ���|�)���Fޘz��G��`���y�X�D��^Z�x�I���7��Pk�����Uf�
��Z�>ӥt�%�����B��lj�5fi����Ǥ�O��(�o�2��	  x���r�H�y��6�
c��ه�L�ǩ��̥v=�3ekTX�*h��l�_����д���y����������|�
��$[�U�7	�)~��p�QX"1�ۊ :��Yx���=�V�U�	�2��"_!c���7���7���%�'Y�?ۓ�(�{=hG��^L�"C�}�u+���sU{�?�N�.�o�My�L�\4`4_TE�32�%+�<B��G�&�i^��-J
w��0�
���S����4)��N^�Ӑ`k!U��C� ���S��%��B�7��o~���Ň��]:�!�A@��
.��72�è5�:V�,����$�Mi�/ܗ�����x�hN�L�ٶ�i��q����('Sp�K��K�+��t,ʼ��ٷ�8��:@�qu�i��l��!'��.@%	I��u��.����O%�w_�u�΂�0�g�:�E��O�9�v�����17�g0�a2��&�i�=4�b�����|�����|wfA�gz925,��xr�!��K�ݧm]�
��z@��%O�MV G�߆���:�JM[ta#�0Hz1.�JJ�}O
��;�{ ؙq+����(̈�֬�	�����x�+M�������T�@<!��
*WE3��Y^B��Q>�˺��q���&8�B<0ڀ�@�'� AWP�zD�� 'yE������!N�L�We%���v^ �F��@��mO�h��P��6��`�-;��a����Z̽�	}\��G^�K���yǏ�z uO��M��s�5�ׄ�?�Ӊ������ D
Z=����H���M�$kRT����T=@m��	�N7)�r{2d��5��	��C�&ɠ�Ӷzd�0��̩�#Jk������w?^\���%��*E?����.�y���|u���ޡ_�v��t�@W�bʄ������̘��k��l6�敗w����ϔ�)E�'D��"�o�3:B`�����yt?4�"��I�a�&q&�\�D!�V`66��r"�k@��()H�9
l��"Y�b!2e�n���IQ�^��jĎ�y3C�tu���,˺�$Q�P�o��Y^�l��d4�����Jq�HF�2c+����Y%q^���c�Z�<%��O�y��L_\�����l���|
��ǵ	*��x�6�z�Q$��i]�O-`�Y��!]�,�C���]Biq�M�2��e�$�惀��0���2tZ�u�,2���u�$[�b�"���\yc��O�3�(J����=�nXY�o ���	��ݬC��W�j��n� O�J);���HF���M�~�4]	����h���ڽ�h�W�Z!߁�������<�2x�dB�
����Y\�YZY4�����cl��}O��ٜkQ�Rh��BE�Ve�R�Z%� ��(	��|�����
/3h:?�I<�1N��M{V��DEz���yA�,��a(�q�N�E�8N}
�c�Lg�+��OPA�8qt���~\wO
�--�r</�`TC��F�%����mETw6P4z��6�=�iV��r��������O��,7"Nh��9(G˩�T*m���B�&!��jCW�=�����ąC���[7۵�1׸�磱&N,cI�x ��͵�7��⨚  x��UQo�0~n��*5�*�>{�&`-���4EnzI,;�������_ೝ5�e��O��������������q����)���*��dk�E	+��?5�M��������J���iF��m�B��LZ�)�$�5�҂����݌�V�0nꬩdt�����3b����`I�*���3)�4#���[����1�$�_��	�+|ͤ�p��=��>HI��$we߆WmN*�j�f�����.��u8߆6y5����6�u�½�N�_���<yR�����0�:�7o��kq���I"E�����> r��Z���'$gJ����#rF�ƙ��0N���S
C,�ၠqvvt42~R	L֨�)���JhPQZ�����О��p���pZ V5)#K�VA��[�E�9����;�N���@���}v��Q��<��9�m�w� ᮂJቢ�i��Y����7};����z��t�d��;v�N�ݺ��2"Ǡ��D�͑Yq������,5���h�p��e�J�V���ۥ��q?Uou֤&�M���"ݫ�:k�ͧ�L�u�`�1�]���w ,��:�\|�e������om�V�4K���X��P)�}0t���x跹��
v/�����^o�d8���������d�_��K�  xڕUMo�0��+\��R���,��J�V���n{�"��X"ِ�j��w�1�II��r��x�7�<|����79'�K�ȼ�YREf�	��5+���d�v�s��'��$?_~??��C���8�?1�*�xĻoż� �5�Y�
��{�嘼{�,�jXz���&s �eͪ&	Q�l���0�5-MBL���؄;��>7�d��Nc���ԣj*�j��T�r��:x*�>�� �W�����Xh��Lw����鲵Ӳ�{�	�	��EVK.�L�~�r�G}z�'	��Ԍ&�m�+|�/���uN��1E��~�<< V*��<
���Z�l��d�E�>�Z't��`�ɻ-�ԡ�	�H�|3H��
���nn��אN܆ڒ��)�V���m���aX�t��YUy[�Q�%A���࡭F �=�t��m��Pњ����6�fO�Ʊ��nΡB���ɕ��%((�ᢒ�h� ����{~�\��F#�4����ɽ��Vx�:�sD��+c�0q۽�D�
`�E.2�����Ӗ�4����o��/���W��8����+�O��N
�h7ZTJw�V:��o��?�d�l
@wT�3v��f��ܡ�N2�J��`<���?���:�"�zoYW�Rm�����8��v������>�d��j��(�����U
���ݿ]�~Olj���f����g4c�F)�������I}gZCVxh�A����h�9*;Tܞ@a���Eal+B�{�x�
��Ulw�jO���� Ht�.�'.+؀�M;f�1Y���1˒0�̱E)�����(�� �۹y2V��������rn����2\�Z<�? ���l�S�,��>[]�ɦ��`��*�f�
@o�1Tq0�+��3R�D@O��������Y6�6����Dˡ��e�~)��;n'�|䩛_F�z�|i��  xڽVko�H�ί��P��&8��u�l��D����c�T�1Lv�)l����y���hWM�a��s�=�89-��::�� nVB�gR�f􎦼�3�6�#aRF$�?ƷW7�װ2w3����R͜�)C����z�	KYQP��G��W��*݌�)E��",/a�ȣ�qU\.�y,#1-M؏*YdS�%-����	Ka.x���|�4�0�<��E�BP�pdY6��Y��t.�/���D(h���{_{�{}�3��.��6�|�3R���m|��)1�	.Xփ�6���0�[ l�&�7`�p�[�¿{u��a`�]L�{k��-��[]�&�v����C��jV��%�D�MǕt\��RHVu�04����К^ZV��%���ʛ���:3�����UQju9���A�f�l�7D�N���͆hӊ6�E�zv�.��'goӗm���feU��z
��+��O�p<��?��������X�$_eE��7)lټ�Z�&A��I���A��U
���(����
4���JM�����Wrx;4�&J��ͫ�Q'�U�θ�:�ga�R��)cMۇ�����j}P�摿R�_�_���IYլ������D�2��J����[�eI����ʗ�ٰ�EF�^�u��,l�}*����}�< x�;�}�������y*d�d�A-l����������s����7�W�'��&u|��l�ʎ�lC3�cO��C�'E�ԏ   xڳ�/�(����R�RH,NN�Qp�
��
�sqq���%�d��)���������%�E%�
�\

�9�I@�*:�,��(��$��B�.>�58����VMƴ��B�f�n�m�BbQQb��:�-�`��� �E8X  x��U���0����!��&{�i�S{ZUț8��1Șn�U���LB�=6��0~������Tu�p�=�(Xe�o9&��_;���q*HI�7���rѓ�d�X%��=�D�#-�P(�����{�����UP#&��TQ�JkQ�h����TU\ia	#9���,d4
���O��Zk�j^�i=D�˓d=�im�I3��V`�^.Y���1�7��9��u>��/�~�'�l� 
b���VA��Ŋ�G$4t)T�D9,�(a�Kһs��#U�
B�T5�נ
��|�b�	�j�\1��ـN.e�'��� t0q
訩|�2���$���~8�D�JM�����n��x��d~�f�����fz{1O�z����a�Ag�H���\N2ԅ.�V��5y�	�Յ�\�9TRl�aMa�sěZ9"6o���nj%�Lt����%'�^2<�y��b#p}$y�?h���G�6���?�R�mg �n�9�\p�xC����6�[}��xƫ?��I����� ����)�~��{��s��D�]-Z|���p�������7�|�H�DZ/�C��^
��*ό���O�K
�b[���kk������:�N�o�=�B���?,��  xڕW�n�F��SL�06űSUjI��V�ծ�핱������C��{�9 3>��
ʴ�igxM|��*��@(��l��+{�� m9�h�]dՉE�U���fH�5�Źq1�qf5�S������:c"do7y�P�
��P�e��g 9Ca�����]<�!Yq�y'x�!
/���:�1�0ɇ?��q�G=�)���Tt}�Ŀ� {�x���{���l�&��U|���Оw\t�;'����s�u�4�:�@�z�@��𩽉\:2q��D��1��2b�*�X�a,��˳�AI�vB��4��M��$�l� +d!�v��l'��l�3t��-�F7,zJ;����UdUMwQM�<�P�C�p��R�,��Du���MIHB�2�*V������NXp��o�\��y�,8֥�����A/ �)����q�}��V �It&�1�&D9^k��?������T�H��M%�+"����S��c��Z٥/����uU6���﷐�p�.�-��� a���v��Q�Q�A�ʀp��&oS�ņ�g������|��0Y�ÑT����?��P`^E�	��>��Ioؕ#�.�JV�VS�1)�zNW`2+���	�)�TsG��5c���򥘣1�2�Ǧ4Ru.!Bm�0���@w/c����qɖ!��A��D�<!]��^"�=!��mG{���E$� ���ü]�|<	��,�9e���C5
ռ$�{� �E(B"���_�O�Zk�m�P6���H*�^�ɚ-��
9�௅?��O�:`G�b�_A�>�j4�*��soq~��b���d�, ���F*b
�9��Xk��<YbG��A'G3�Yo��W�sֳ�[�
�0	��m��?���q��DO���P����G�^]ͬ��f���G������ujp��6���rs��z�����f/%.䭌\1�y�n�p�8�y�T�Q�	�����߾��on��������Ԙ��"�	��Q�������\�y|JD�G�|����H1��'heK�k(~/�}{u�X`EM��]C���&6��N���EP��z�������Z��!�C��m�x(cB���
�rC,�A�!�?`�u�'o�G�.E�s�
*����鬤4��X�[m��c��
�@���s��fQ@Ⓟ��V�1�f�|�i��?�k�ǃ|��c�<�w'|��t[c��wՅ�TO,��/N�)LswE�{�ܩ{���em�z�)��^������y��ao������ܷ�Zen���N�ĭ�..�{%�8)5�yW�G^ `bw� ���T2��I��(��=�9���iwk{�������c/Ў����^z կ�fZ��;gm�`%W
/��^��m�,���F�h�CW�U����cx$��,x��K&Ѡ�v���i��j���V�M�r}3��Gc�KL�����'ؔ�0�y.^|D��I�-�j��j~"P�?�c��� ���"�n��d._Uj�j?�����f�7�����  x��Z{S�����â�b��� I�`���i�����k9a/�YR�5�ں��gW��-a�Νj�#i������J'mw����+�;���c�GgH����=!6�Gb9.���cF�	o
�0��G&.}�C� |b�t��#:f|Y���I>�$�⁢V��O�O�=t����6�oQ=�ߴG:%<�X�c�&K�r��P������-fM�`�왧^��=u(��E��&J�UUU�p:�,��kW?�|s{�Md��K>�ą�i��h��Q`஼�j4	{eF���84�J5�ˑY��zu���*�����]�҇#���!*:�A }Y���M�gCL�
�%�IHR�G%K_��ʑ��]
T�J4�e5���U��������OJ.��ί�$�#�b���F��X� �b3�"��c,�GF�Ġ ��/r�8��i��CE�]\�������#�x�l�V�G�Y�=B���3%���6�4��,�������2�Q,�$ K�	,�s���_F��0 	>�s4��}�����Ӌ����9#0�q�\���S�p-�&>j*ﳖ_2�/�g��B�"�J�cV凘�h�J��Kʆ~���*Rh�8�'{0%l򄺰�X��8��R4��� X��S��3��t��yb�C�:�3z��<�K�SL-j������>���O��c�1�|��U���������u�v��o���0�8�{]Ύ1m���`2�i:�V�c@[��v�N��F�+�Ӛ��
��'�o���)�HI_��Y�����a�vz��'{�R���^��%��{Z��3���)��q��O�s%l4`��}��֪�Xm�&�I���tɚ'�/y�c\
CZ�&��q�0�+�!���b��6<h���64��3�Ϯ��̛գ��(�y�,�s���j֤ ˵
���b�DOc��������Ds�x���8�)�tX(���:��)a��τ�CK>\N�T�%+�`uZ"�T���K�4oT� '�b�P�K�H]�¢�� h��aW��"%�j�Ŭ�ĐC��x�O�4��>ƫ�g���2]��V%* !iL����0��]ˌ
?���|"Ԡ��ե�Q�Y�����~w{}��/:�W7���m���B���޹���3}��T���xa7��!���S���q��p���l_<�N̥�	pw"�CX֞��W��~Uv�V/�_Ѥ�m����g��ʻcfc6]���<#ۘ�N�?{r"ft~Q�&T���#��zS9�S	�֋��c��i���'ݙR��Z,���'�D��WSȤ�0�����E1��43$pP��~���/	�C#9��).�]0K�[\����י�܂*�{�-��ZB�hǂ ��e��i/�R%��Ւ����W��B�D^[TQy���V��&�a±&��\G�,V�Y�z}k��ss[T���
Fg#Y�;�r����V�[�hlVw#^T�����j��ɂq/�yр.��κ��I��-�w*�^�w>#��&nмf�l��{%|�LN�����#�B���8�o�V�{#�븢���R:��[15��mc�7�`$?ʡ5�q�]20
J����5� �ƈ1�[�p,}��*�)�e��)
��B�jS��������k�:��_JMc y�Q[Q���")L#H���Ń!��=`Ƙ��#Eh�Rd ��H\�k��ս`,�V�:J��R�Ԡ���쨖�+���[�I�S
_��M�mU���"C��Z2�R5���è�$�$�T�X�}ģ���*{�ۈV�^�C���Zt�4�i�kɅ���m��!Ê�oK�i��h:���!�t��������h��w"�̕���e�뒬g���'���Δ�B��8�n@d��7S��R0�!��	7�o}�"��  xڝV[o�J~�WL"T�v���8n�Z�䤕��p�X6�*�.K�����gvY0K�26f���>py���u�ނ�p�6i��9��Fi����"��M�5#�wL�T����?�O����~���(E�A!q&�gI"D�7b	�-��`i�A��m����	Ӝi<Oc�A�o!U �f�x.��E�� VjJT�#yH�䂤����1D�J��HR��cCM��ঙ�ӏ����� /���&]JA.�a�$R� �"u��޹�M�L�=q.��e��Ϲ�4Q߮7��:�:i+rm%�`g<D�J�$6�Ƅ�O�r��_2�	��	+	�e�drID��B+�ؒ��IaI�q|X�YĄ{z~ϯ���!��nE�J,�$`�2xPUץ�W��FL�q�ϟJ��&-�p<ϒ5���c%69//J��pzj����a��Z�ʖ��t]q�~c����E�S��"�lu'R�/�!�f�2#Z�ԗ��=��ټG6��zd����I(�]��P������ؖ	3(�!B�>B��p�q!�/���u�0��N�����ɽ�n�����^I��r󆩺�� ��t���W�(G�87sQz�J�av=�ٜ�)�3:o�\�9ҙ}z<�����g��ⷘ8N9��%4��hn=fK�.E�َK=�e�Z�`�y[9���쬺�'QҌ��w[�{���d���شwM��;G�:��Z��b9~�����YN`T�{c���u��)6���5��e��z�yts0�(X5<Ux�x6��AZs��F8>[��Ȕ٬6Wnd�o:��c͕��S��a�(��sg�^4����73o���-�h���W��T9i��r-�����p�f�eP7F�v�[c�iŢ����V�����R���S��zv<�;��Y�~GfmG��Iw1:�-���Z[�	~��V��(ݝ���m|���9?ƞ�8��S���"97�,ѥ�[����1��rg�ԉ�OAb��h����Z�  x��ks���;~�	C��B��3i:� 7S˓L%'���vh�G	c`Њk����� �	���V$�����������n덎=t�^�k���G\�U^�xW��J�q�� c�ޥ%Z�	Fwq�n0�P�?�u��	��8��~��e�F�wE�����C^�Wi�>@_�Ȋ�]�����l�W#x5bO��2a�ߦ�1�=�NH�Un���po��KB�^�s�'���f�.QE^D��g�H?�F�e����!�Of��<ڥ	%]�G)�4�>����(.��� ��������H2���C1]�e����x�(��Y�����&�!�Jx���9�f�׫��"'�R��,aW�l	
'�m�����@(]��QZ���*"|'�2�����l��%d�lI����M��ָ�R�N`�x��eyJ��@̶��V���ibXO}��=��G�ۑ<*
_�:���8��N��4j�~�gɠ��=�͔>T�x�ڊ�E&B3�?g�_�vE&���Y�"hGK�3|�{ia3Ee�
^�S|Yiv��毗��2k[���&��w���@�tpz��C���
�O���Z�!�A��<T^�%��)�0����|������Mǁ�ԃ����>*��H�<�B6�E;�}A|f�#�PZާ@�f6��R��K��g�i�P�t�/_�%��. �u� �ȳC@F�@F��<����ϟw��� ?����N ������TQ�����ײ�ײNUn�joq�ԠGiȎRI�%S�Y�FQ����-^$�m*��#C?E2<�	?�>f&0�q�
:��J���ë����D�CJ͒�'X*x�ILR�g1wO^��3s�iĦ��:r�Q�7{
/�� "�ĝ��h�F`Zh*��|�9����nW.2+He�V�ڜ�Fr��N��G6�*+e��&���r�<��U+��%�N�>>�C'4�w���Q9㚷'N��6�F�%sO���$(�[�J���n-}#o)*ӳ���F�HI��H
)��?g��t�8�����w/�ǽ�?t�8��{x�78���L���w`�8�'�["c���.�0�!&������U�(5�޾n}{��v���M��W� )/?i��f��p�^ץ݄�h��84^�Qg�3FÜ�k�3�Y ��:x��5���l�V;��U�;u�o�D�r3�ޝ�&�ٟ�#?�w�ޝ�g����<�jR���e�����A�вMl<DQ�>�)�'���&���̒Iڏ���VԞ�i@����m�O���f��-'3�Ȭ-�lnms�v���$I�y:�~��ڢ#j��S�4#�
��r�\z��h6�a���>�*�/�˅~������G��!CH{���O�w�lI�0S N��kI�����߳�<&���K6�^6���$��?��܈�j�.�b���#+:Ԯ��N$��Is��h[C����HX��!,��I�����,��rW��� R�J���'BcH�qo��z�_#a�I-�F��7�Mj���r7d��}��c֟��{�[&C��#;F',�8��ٗhJ2G�!Aa]�!��&j��ra�s�+.�V��`R�k� Z��RtG���IA�Ŀז�q?�_�熏��y�������K]ѥМp�ݓ	͂ ��q`�˃���(Tw�,tr��K���V zP�*d��%��D���+�FMOuG>�ߣ�<�y��>+��(�+��ff Q^���ZNW�Xj�.jV�d�ko��zJ��eI�5
�0���X.Y�f0l�$�R���e*䖷b��F���J�h��VW��?��t'I�^\���zֿ�������W��E�Z��$�4 �SVŪJ7x�?�ǳͳ�ُϮ����$V��X��P-�;�'m�	k�����I9n��$W*I+ 	f#��e+�J 
��P�ޥ��_�@	=%`�*)a�.K��Ä8�Km�PV,�i�i �̨�}��p� 4J��"˥�-*	K�b�y��p�8�-�R$�,��I��Q�IZ}�f]��@�h��-���V����:��H+�R�N��&�Q�2n�T��޵AW[^�(-U�U^�2����cK�̺�L���N`����A�7�Brq��a2���FWvc��zA�$��k^���1qƂJůb���z�g�H��)�:��}�!��ĥ6vء5j���NcہJ}]�dZ�����"!�e0y�(���� �!t��g?Fr�u_ԭ���Ҹ7O��
�@���u��8cȣ�Ɇ6F�f	��pn�0�[?���dj�Xw�������2�=��'����K_�H*uȚo�CqY�%x�C�Tjd�qo��M����&��0{�
��9
�a���2h'�[�X�˾��櫡
��mSu�Y�C�;M����@��iX�C��IQ��=�-'��"�s�L{%�՟;�n�*�i��n���<�'R�Ax�T�#��6nэ ��zf��/�11`y�n2X�'�a�yd2��A�Q�I���;�G� *�Fͣ�c�K�D��~^�lƹ�K�ꜴF�~�ቴ1+w��;���"�j����B��h��O��sC�w�yU1ҭ��.����/�z����\.�׆�K~щ�Bx0��B�oѮ/�qOT��,J�S��@M�~Z3�����.�'���u0C�Jo'�����)�鿱�L,�r$�?�+�O;��H7D�޷�l ��	|=��%Hx�	:�;p��n�Æ�Z���Nԃ;.�9
bd���c�3���/��$����Db^�	���⣫5]5bi�2�J*��-t*	�-ZF�[�3b����63T�4*%��� A�F�!��������A�$�Ue�K�QH�5��.������z#�����d���)�u�PE�z�
B��&pj9�.�s�}��i��~�Wϟ�ƌ����y�Xo԰^,�@�
�[����J���v��-���G+�(�")�U�oiU�H_t�.I���@4�3G�y	Hǣ��!+��NT[А;k:a�`�y�-�7�Z,��LK7�kz�r�O���Zy�!˅��W����",�4�5��ʒ���3��t��9���7�:Բ��N�B	 N�����kz+�O4����/l2v4n�BD��(4��� �c�o\{ZΌm.�6.�+��թ�^8�֣�L��9K�<�{y���xR��  x��X�r�6��L�A�8�v�!�L{5��M�C8�Dpc,j��9�{���_��N�I kw��i���>����8�QB�rVt�N"�~}��+iH�m�<�)��>,��%�A�9#Q�!;&�&}���⿝lQ���IZ�Rb��HRe�dϜ���Ғ:�ԳK��aQ�o.*�ӷ=,K��i�������	l�l=�ڄY�=!]��_���?�w!���s��;�v'?yO��}��`ַ����רwl��<Ϊ�IcC����Z*P���<ܱ���ܱ&��ˇU_���A�-eW60/�\���n�n!�r`�#m�����qFJ���>rӲ���y5�5�`�%	8�<���Xl�$љ�K�����1��9�(:��ƛ��蚆Q�����P�#�ۨ�,�w�c�Y�6a_�*�h��Vq-,�If�rD�&��\�U6�����Z^8���G��<��6�u�"/0��  ���9�-�_D�����%-����S�T�&h�s9�t^ìb���'�}i�R�m��\�����mr������0yƇ}�(,����8j6�c"U.u��<q�WT��U�SzWX5(;�gi�4�8�Ax�p!1���{mL!*�ׯa!��7`�n���Yn��.>uȍ���4.
R4>7蓬��e ��U��M>�#oU����N�S����sB7�ʓV���ɟ!SL�e��n�΁:/��&�YR�<�/�c�V6����+�K��l,�<oX�uXK֣j�A�a�ڇ��:Zh��]�;� ��S蹥���ـ�>��xU�6,,(X�G�z_��o\���P����u9f'��L��wLяH>���=�^�����V�l1,��`�x�u�*�{)k����Ml6R�vS�S	tU���
Z��N�O�<0W����������=�@���9�`^�v&�X>9��>.�W��<  x���s�8�g�W����iv��ipf)w̵,�fv�\ƍ�ƃ��l�B�o?�'ɖl�#mJ�n�[�XzO����ғ���r����v�]��R��K�zW$6����V�Di0��`A%�=��1Y�Ęy�qAHd��	K�W��T{�%/4~]��tA!��}���7	��"����ؿ0>wc�����%q��]��w�:>x)1���8I��$]ń�MW��g�ǓE�J{6- |��Miwɀ���U�s�9
|xk��Vz�$�{d%$�в��b��"������Of^l9�� �_�s�H�Uҏ}����[�) ��.)eZc�	�J�^�;9Q�Q�U KɧT�:�	NvEu�$$
���A����'W�L�&s/7 �,=ߏ�7�X�����ț��O�S��&D�j@:G�jˣ��y]Q_a�$����}��Z�aPm�s*�H�YE��W�rpe�M��U2�8|}� �� ���a~��HD+��S#���� $�E��80��$$E���^�b2lp�J1�����d��.��a8]T+�������7�����s�Mfd��6$�6�.�XU����(U�a��	�!ITP6��=F�I~��h�E~HX�%���?"���F/H(y{\
�*�*�Gyڶ�^:����x_Uq�V5\�����\eg�ġ)�u]�ų���v��rK` ���¥�N6�+jj�b�1F���]�"�î��$�'�2&��d�o��z{�O�s{�N:���2�þ����_�o_��<??>yy:����wo��H�~��>���PGj.�jA}�!�Y{N�ZQ6�5�#�ē��ə\�!�C�)��t��Oːz�=k`1t��E���R^�*%n� ���+0�iX����O�x����7�58a��+��]�`�v��(\R��ATY�YYaȋJ�!�JF�k�kj�l���^Myu֬wA�ȥRh�eHeH�|�2���,օ7L�u��`�Tt����9�4�AJ�/^����BF�ǂ9�K�=(O�e���B�+�I��;��_�#deVٚ6�i��h7:�H�#�_�@7�� A:�O^��D���o�������	��۲���f�ƨ��{��Xf�W��Y2^�flE�wʲ=7{ �]��r�S
��g�FO�)��Ѡ�UNf^_@���3q�����������G#�UPQnA;�̗�(a�fh>{~��IW�@B�2U�X��2x1�Ҭf4�`�����oj��Me-8yT��l�� ��~���%�eCK����I�xӰ�1Y�bfRHq���U��QG���fbB��l.),�76(�)���޽.@f-Ы=�f֝D��A�ӑ�pY�o��
U�`]��fyHݥ��_t�{%T�jp���Q�E��mĳ.op�:O,"�@�A��L4�"��M&�U��OTA:B�8"n�n�nx� �0Jee���@tY��Ƈ��(E)LA�ri�Y>
%B#L��f@L�4B�놁柝,��k!�l��X���b7{�Y�0�4�~���ۊ�B�+K溓HS��2���-�W�)��6��t��!�첟��]��l�;��Rj�_�9m#�
���m�P�qs��*KLFnBC����ɪ+mo�D6%s�O�n����vxf�ޝ��&6���g�)��?P�}Xr��f�$�n����\G[!�N��F6l��U����Sj�����-��&/W&�A��Ș>��E��nu�ć|J6���/Щ�x�l+�~�t��	k��h�y nqK��lX~nw�]�XY�LN?�-����yh��L	9�el)��q3���)iߪ�q�6G�C#�A.�X:IW��S(��J8[݂�8\$�H������d�X:�kG�#m{J�+	x���� �t�N!�IТ
w(��a�Y����O/�������o,lA��ʆũٚF����������_X�/۠+�(�5CM��t Ѩ9��n��"4��F7�6ϴ���i�"�_��|_��K	��LW0�|j��@VFbJ�;r ���4�s��Q�0�����Ì�E+c��)���]f�x�.�|�I�
��V�A�֖�W\(	tC�+Wl����%`��.S������@Mm�i̹��N�|�~�c�|��.� ݂����g��@��h��Bm>n�lIq�b%����	[>�����͕%?���`�XŪ
����ά&9��<���U����v��O*�������zh�W�p���q�j�K��dUU��.��хH+I��E�jN�`"p����U�R�B�CJ��%��_CsOھ��3�wϟ�v���l�3�h�U�t��8'Q*�)���2�M4��Η���TȂ?�)?^�5��S�RKa��Em�Imi���ym�+�>RM��-q�	T���30�"��8#T����z=��;���~tn�F�$�`zex��EA���
f�*{�b��l�#�	iW��{�nn���*Iᜯqr�'/��	����砤N^���E��d!*|]�o�
�4 �Ue�|�?ݧ~
*�gը]}�S��"����!S�:�p����q)<����]91��
����R<C͝jͧ3R� �JD
�H#yQq��~�/��Q�h}s���QmS�V����cV����m��ۆv�Awk�zӋ��D�z��|�ۭQ��taK�|��.�P�����h�h��^=+��6\��.��j�i��LC���L����Ml:�\(b�0$>5��r����C�R<I��+�s}�8�/�τ���C��l�@3Sh\0�<f[ �WfH����?H/I�`��^2#IIJ��y�)��t���j�4��e-r�8���겦5W�I���+���WT�Xw�D�Ϣ#���A��
3��'.�tJ�b�׍r	�/��l���,M��昆�[:F�a�I|II�� �"o>8.v���]>e_5i�t�wG�֢"Gi�k)4i0�Î�X��C$���K�3���B��C�S�mD�p��"��]����-M� +.JDX�r�ʁ0]�7�#
V��?�n���ѬDm�E��K	7��<B���|��:�e�}'��t�O�y��f�ɻ�FS�9���~.�Ʒ7�M�0��/���=�/]QG哐cBq�!���������띵���~[U��yz��/��  xڝW[o�@~�W�6�H�����6��&��K�>u:]�"�{I�����-
�˜�s�.���uzl�1�fQ�t�`d"����8]�)��D����0"�����>?�$�����`t�{ȵN-�NP��i�q��y6��G��r=��L&y�&�Q��	��(�[���/�o��d
&���
�|��B�$���l%�h�t����r"lX6z�V�e��+�9��ѾD8�]����K�s#��Ԣ��H�s��T4P�!���'��ֆ��gK��Q��(�3���9��,�Q�����&��z�%B����j%Q%���(�1J�FI�(�%}�U��U����*/
Łh!�\qI/>f�t1N1D	�� s�#�8ކ]�/��>��ILt9�hm�j��t.��#��͈J��2���I?�J�����?4)��2���T3z���"���_�'�W,�%R��>�����2�:&t	�S���1Y�q=BŸ�%��!�XB%9�;d	i�>�%S�3��C��a����U�uX��,$i�("��r��$��Δ�~��9�C"����x+Z�zQ�#�P�5k�I�L�Z�S*0�lL毘��������A���V(gX�� �	��5l�n�4(I&�U���RlT��V��?$$�A'N�O��%��#�;6����g��!�Ri@�'e L>�9������r=YbL걓{�[_�d�:]��N�7�]��
	�*;�����=k�Ĺ]���n�i����8����K�>x���4;�$�g����$��~�gحo�vDYF\m��2j
��4��L;=�v�VV�ҼkZw�]��j4x���kð�@���6�r;�*���t��=da�+Jȷ��
��&�����~/����w�ǭQ�i�5��v d��l���j�b{x�z���#ҧ���3�����u�I@d��
<�4:�7��pǬ�I
h�e��g	z�J>�ci_G[ƶ �,��m��N�:}�m��)Z�ٝf�C�}�`FK`B�No�Tr=��r��?}��H
|�(��a]�Dib����/��FDFXݤd�HoKY�� �2�� �O�!�0��U�f$��>$����S2�LaT�5W52%��
�YA�ef�G�$�ǻ�'�Z��g�wض��獖�&6�:7�q�@,IfE�.��5I�;I
����\g%j��L�\"o{	��j�D��0�H��~�j�9숈'���N�"
G$Zu�2�7DElD*�Ꙣ_�@�DUtQ��灸����b(�?A��0�-n��q�|�M*`�T�6��j1kl���;7��e�������(�C|���[@� 9��Y}��T�d�;z�ȩRf4<2�
)VE�V�2�n�Zo�b7;�!��A��G���P��P�U6k���Zž"��3ϵ�~b�ִH��|�,TwtG7�yk�=��Kb9@Љ
Q�x���#=]����$І�� �o�wc�pcT�2��qJ>�5q:(��x|���BpC&�����$�tQ��������f5$���θ�J�"K���N��������A�b��{@�p�A�X�M@6�۶�g�R�n�*�3��TM&H�D�y6���)jXM��Y��t]Tu\�e���i����IK<ٶ����άWkµ�W�z�$��H
s^&�_��2�!�Jf�6k�F⥇���0ؚQDwn4��\O�	_��ґ~l�z�n��T��Y�o�rJH'Ƽ����"/��9�j�F��y*�I��ƻ��Z�<��y�r�S���@��;G��Z�	F����[�%c���2�h�}"��=Y�9c�_Q��ER��{/�~�����|��_��Ïo����_��������,���E��w�U^�+�z�������ѣ�_>y��?��9,t]��"f���2���.2��P�f�=#8���|���D�	�M�.s0��9�>���vJ�Vӹ���f"��Je�E�X�)���/�c��Ir��D�
֋"
�a�h��V_��;�=:ıG�tO�E�Fl}�����+�1���t��bxQK��������&O��;���^��Y\_Ds{�͂��������d E����$�����I���~�
���N�Z��{h~_ڛ���30�]�h�#O!�%�؋�җ,�T�wo� ǋ&��h�T`�{�C���Vhn���Sr������mp����aHG=�� ��)�x�4�>[jϤ0��7@���d^���3���k�g�NkAx!��X��$	���@��u������osE�f�gF��qy���,s[&����~i+1ص���h���[ԙ�=�,,7�����[l��Ig2��L��e�z�Zm?X��A'��n���T�����{P�"���^��v�_ǳGH
b�����!�W��y�a�
W�	 ���7ߴ/�9�^�`�,*��2_�t������Ob%��ޓ��Y<R4Y
G~��,B��
#Ŵ����rNf�b��جU��/����H]6���b�(�}�Ə|�jF2{�w?�wi��+���I$4�җ�J��T0�A������ >4/E
  x��ks��s�+`F	I��$��ڱ�ؙ��i'3��9��X>
]E����!���4!��c����
�:Cf��bO��4�q��D��p�(�A��pGx+��;"�|ە���:I-[LM��j:�����.���-8�Ƒj����^�jԫ�;��c������OO�O�ϝ7�Gؘw�_F�'��f����p�Z3����v7C!���r�0��I�y�!��{=�;!st�+?�W��r�gO$�O�� �o1
k-8lX� waA	 Ө��O.�Q��Ֆ��K�0�K��g�
�ֻ�d=��w:�fnX�3�/`
 Z�E��R���o5��TêL�zp��"�,����r�5+u���xb��Y8ho��n-Qd	�7�����>�0�E�)AbO>:����bvo�g��?��ϿU�������t-�[T$a���n�g׷&Rٍ�u�튫t_Fn�ù�2�ĩ�hC�*JO�߳Z�hO���������l�6.�f��@d�~_$��Q�6�v�=DQ��(9��2[��!# j�ǀ�}"z^�x�lT\�k���zv�m���t�" ��}*K��ߕ5껀)ީ;�r��C"�w�q�y��i���An��'�������T�4�|$@f������`�����
ڃQS�E�j50�5O�i�fR�mL�%}��I�U��^"�YUB�m��Wú��:]c�Ú�7�_�z�S4^A���ۥV/�Zk�U'0W���0�����9��Q>DR�U�ߠ��!z(�-@lW��0C�n̯E��k�q�通��G���#ض6��������$j��
O���SD��8m"�>�6a#�Q}5q�>�v����ϩ��&�jF�:�!�}II���F;�o3��j�"��3�2�l��ӷ�7}s~�x�t�.�q�a"x��Q��8-׎�m%Z��z��J�l e#W���8S�8�rPSf<:,���������s)N��t�#V��Mɮ+�=��:�UO�i��ƫ�g^��X�Y\2���V� ��u"�������8S�Є�Y%�#5�c�Q�q�=%ָ,ɗ/Dy���3}�����f���0:��u�Ib��9S!/QV�%�%��O]�!�Yd����Ӷ�Gݪ�=b����-��iK5�r�=TϿW�&C����x��S�6,��xb��-�4�Ab����c����Gzq[���P;ܩ���3U��V���c��Z�h���ڲ�N��eh��5S�q$��.@A4��G��(�^�:X���$,x~j9W�(`�;�dڴ �z��?퉀����r1�LS��t$f `!�͇��=XáY��t�U*��hIQ��L��
~o�bJ��Z��A�T����������6h�gxf��uu �K�T�I�vI�V�`O�Jl��򒍗q��LՍ5��9��1�qX�t�'���תo��z�U����o����W�/�0u�*���➖O�G�'?Z���N5���l�O4����0�Ի�����棳)����]\�����d��|�\ܞ��p�,V'�{	+���
�:[��m
 2Q����9��8��3�m7h��gk�u�Y��&x��L�
5f�B�I%Pre��QA^W�t �K�lV��2w���fMb��RFQt��>5(��p����E-��}<�y��>�Ȇ^[�KД��N#d�1����O�'es��a�xڏ����A�Dl^���Y�h��$�y�R-���ᄭ8�11��b��pw�	�O�b%Y[f������Ҩ�tz���%��v���ۧ#�)�'�[���)4�����zI�����#^��Y���54$��{	�z?���@��?�?�
4@gF=���\,�.�T"v'��g�/��]	�V�"\&@��%��[TU�Ķ��;�>��y��ӦPbc}��CL����d����00�� ˿3��Y�t �VON���#50N�H��f�/�a2W��?b�������5�MIڹ�F�F�A�2fo�2�Y/�
��q�\�s?@���?�^)��2F` l��e��:������Q
&
T�V{lc
<?k8��]��fHۚ���$�rL�~���(~@th]��]��������A.r��L�E��է?�.����\ڒL�s.�����(VE���n)Œ2P���P����.�r�c�\��k����E�d�t:E�t~)ٹLY�u�?�bX���*_�^�?b�{=��$TiUo ���JVX�y5�~�Ѯ�Z���j>]���v	��Y�]�:h?jgm�i��]ݹ2Gq	�����l���q����v��uE����U0�j/�G�h2A�G���v�W7�~��\�����t��G�!��:���d�X@�p��&(�<~�Is[V�.��t��k�R��zB�F�ݗ
,����3��
��ÍL�mQc�b-ƨ�Z�3�G<"��ctΘ��9G�_���4P��UҌ��y(��ѭ��2��a�9�CN�j��:�MҮC^�9YW:��)��Z���B�I����L�r@���2�c!t~_�(���H@��3�
.�-��nO5
�~R?�j�E���N�Ps�G�A�D��nW��8�NZn9�iH��U7h�V�6m��k����=u����[��.岥�w(�p��F٪%���<6�����4�o�6���A��J�[u��Ι��n��
�+i�V�ָ�SeoBS��%��(-<�������Esn�'L�����5iwh80��)�5�����Zu�NH���t1���A۷�ޘ��m�ǬZj7�
8�S/n8�`��`a F�o�s8�瘆�}sb�������wOd��z���0����C1�. 
�"w
�o���!��u� �@D�^� �WM��Z��͙�}����ƺ6Eh~�n�^�xG�0�����F�(�5�cv;�v�U35�`����!�P3.�Q�R3^[Q�a2���)���E^��E�d��E�, &~8Ī���Y�R��>1��!8����l�a0�&=#�^�t�����q��=<۠���xަ������F�[�
N@w�`1b?��M�N(�g0�� ��)�����cK�ϒ��A�ln�E�qo��ć���ω d�b�b�b�|Ν:Q�f a~)|�d���hy������$}@���0���H˂�yaB�M�Z�ߡCq��V4 �?9��eNWN�2���ZOZ���C�����._�ȣ�mX�����F���"����Ҿ?5{�rw��O�@�1�Ϸ�3B�
w���|H�Y�Z�|�Κ/{Nf�H�ө��|p�j�?���Uvv�J{��������u��s�>��n����,^��ޅ�'E�IR�0ix��ʻ3��l�mľ����5��=�k��Qp.-��#`�H�^�b�e��b<��AO�0@�ۄe+�hL�N��%m��+�y�O������lp� ���}��W�4����:s6��T|�������ji^Aۘz�Ko��*��vh�Y����9N�J�yR�2��N�W��z�M�eRB�/��W��t�_ڶ�����lMʴ͖�G�an�:&U.�U#Ր�Wn�f7�T�9��A*|��d>����6��3"����|�Y�$q�9O:v�0&���Cp%��	3�Xm��D��M��B]�h��+f����e��B�:�E�;v�����ߘĸă�f��.n�"��E���߾2t�}h\�5S��^��?�4A=-�N�F躴�.�p�K�_��,��d��&m���>�!^@6�{��~>G����"͋�}f��dI/��I;s&YP�l(�w�Q�W�5\f��
K"/Y/��m���a[��]�Jzc���I�� �N�~��|���巧���������`�`g`뵏��	���-@07�:�8��}�	p�q�拑UxV�qG1�?��T�u���0*�
�^V��d�(�{�_Ё��C����n���w E���� �q�L���@���Z�d�Լ�Τ�f�$��,u5jo;Y�������&�\�-�z#=�=��A(�wzm�h���e��('����I���V,��&��r<6�Ԩ����KJ���.Pi1Q�ĝ&�6I�S�z0����`��ǈ���I��M�~��] �p;T��lD�,��RWyUMޫ�
r�
�w5�"��� ����V���S1W>u��;�$Й�h	x7�V�Y�W @����+��mR�m}^5�  E�fj���X=uu���C\�Z  x��Y[o�6~�~�I`Tv�4q�P�)��yr����d���ɒ+Q� ��!�IQ�@��s�|<d>|�mv��ɉ'0ۄ������`IH�'Q�#,��3�k��[g	~?��p=<Z��I��0���N	���[G�=����]�,��$^�w.7X���v7)���m�ɂ0�o�u�E?m!�a�e
c�aI���k�D"��D���&M &0#�]D���I:<.�BF�6�`@�_f$�p�G|���X�u�t(���<�4����4�KW�b�Q0^g�}�<t�p�;��3�	�#n�3�޽��jbLCg,�x��`�_m�4Ɯ*h�t��\��U�]�<TaƩIfIJ[����Kp-�-�1�%.<��Lװ0�⥉�'�H� ��i�2!n�,��i��Ɔoߪ��
���v�A�v�fW]�Y�sm�A�dKMPGJ����U�X؎�,#E<��]��@C�G�{�C�M!ۑU�~�
[!�����5���.�g���R}V��.n�B�J�7Lo��g��g|���f�� �O?b�:LQH_�/r��m^��'���
�;���)�Md�1���wwh��AD&��P�����E��d�'�I�E�d!e�)Et��0�|\����\L�[ggr���7��;Y�yVT��BVы�H��g�{�sɓ��&,m6���.9;��M]"8\2��E@�W�_��zEvUe˚*�
k,��¦���A��V�T˺8���g�ƞ���B
  x��[�o�6����1�U;o�S�JQ4	P���%�;���-��U�\=�N����×DJ�,w��f�Mc�3��̏3�G�}�Z����q�h�-�M0����q���&/�:��Э7	���Ҙ|��S/D?����ǟz`T�u~��a<��g/I�,NP���?a�fǎe��n����uhI_܋aI������O��$�˱#���|�@U|�б�cP
�/�W^�B��qg��{�� �T��<�fA�gy���x�J���ϥ/4�w��,X�~�W_Q$P���?	�Y� ao�@|�!�.��|LN.K�a��Ю�B���!^�(Kǌ�0B�A���d`��`
��Q����S�H�e���'��C�&I��ئ�Pё�п����jg(]�i0{AJ�4�|��<'(�+�+_�<��>��D/�m[|�a�e������?z�G�{������������ ��A̚	pTg�� ]AQۦ��h��~�9z���D+$��^���Z^�إ��8��X�V�w�8����I��C�H?���Ͳ)�3�`���KM�^����Y(�֖`+��8v�H?9NI��w$��GI��G���r��oX��%/�֨T�"5�h�jX������`xO
�pkV�_���v`��9�+�m�b �����-`�!m�@J{��
�S،De��	i��z�$�&Ԭ�4��D"�m)����$�Ӫ����9rm[����W��l���K�A��wNNNP�,���g��:C�Kh͒`�V�Yg�k�=%�l+KҔp�Wy6����-�/����4������ݵ�����)Y����gd$���x+��::g���:��\"0�9��Z�k�|�/A��9���"9U)^1���ʅM ��j�jT۴�j!�%v���Zx��S��T�),��V?W�0U��]
�=�l��a�4���T$*5����8�`Կ�"�x�%so���M;\��7�*a��
	�T��h�˵�
�h�'��)��N�X����2�;]H��"���+ۄ�%�.*�Wj��y\c�*��5]��#�$nJ���P��H$��\w��FZD��@Zz&�܊6���LũR��R��h�k��0���I�]L���~�e��V���Y0�=Q��(m�}�a�L�Sͧ���2�}��%��U�6�e����0���:҅�ʨ��ư+�Q�4�� y���&�����{�)NӣZ�=�����6���܄����_N5	��g$?I0�)���;
���b�����w��yV�8�l瘘y�=3/c?���Q�9��7:Z�KQ�����9�ɫ����N��6��+��4�� W�vd��
�;<1���p�ꟸ����RtJ�H�
8n��F֐-����n���;CR"u:�b�B K��2��Ͷw��Gޒϛ��U�S��YR�~�a��>Y��@�d�<��B���/��?��ko �'�DRqaQ��BJR�M�nE�6�|�~���
Q�N�X�ӐQ]I��G��J�ț7�j����#�C�e��׿Mn�L��A!Hw���2��@(�4,*�����^a�-���T9`	�s5*f}t�+h�P#� mHQ�,�C��>���b�,圮������;	 ���T�˦�B�Zѭ=Q��eR���1�-�|ЫK�B^��՞O�<]%q�;�T�L�d��uM�&���L3�v��}b��'\�}XWI[��_*�����nR�z�߈��#~r1�_�vn�H�A��dۄ�,KS��Bdl�p�+~�yk8� E	�^��Bx_��%�-A��q6���X 9�Z����´w`�˼��r	bK������Y1��}�A���F�P��j�1O��{�?Ss��m��m%�4M}R/SuW���z9#J�Ln$e&��Nk7n�~�L��H9'ʜk)��
F�.�����'9O*�s偕�9.v8Z���
TFk9�Y��
u�oE�g���*���ؐ�`����tv�9^�r�Z�3�
eiY�Wy N��;a�L�^{�0s�nRdRWL�����z�V����~4���äG��JB��G��Z��Y�%]�9�l��.{��pJ} ﮏ��An�}��幙����O�**s�y�U��b��bȭPJ�TE|݂+$�8�0C{�ͦ��//�:��b  x��VMo�@=�_1BV�X�Rn.�����Ĳ�x��,Z��U�������b'jS��X�y��yof��*��N0s`����4ە�A�LP*)�4a)�A�˜F�,�*#] ��;�{x��ӭ`$��I��*K�'\Ra��b�j�l��`��.�D*h�Ap�X'��Z�H�L6�M����ȕ�@"�-��t K#��g��r��\0�/&���yRe�1LyQ����{����,؎�=��E��Y��ɫ0�
F�E&J=.XO��
�5v84��Ib*ĖF�C$�X-\�M�q���و5�%��="r��\��"��֫���B�V"oEj��xA@�7C��G���
#�\�Z�dDmI��(��U�2�"mK>��|	[7��=�'���:I@��`�����]�`���F���o��6�l-���_h���W�#l+�-C>��K��0W,A$V��{�g�������%G<��D�9���
N�<�k���[�����{������
�r�`J{�8J�Rn0�m��G/7�(�L�2#.�
��p�c'�<���>��fB�޳#��jjr�-q�&�f^����)s������	N7a�"QQ��iy�y� ���@�����P2q�n�������J酤��k�FZs.�ʸ��"N1���FM}[��
g��K(y�;�)� ��Q��⠑�i������!7��^
V�yT͇�Q��-N�0J���vCj�e~�-;O�*K�c���{5SUSZ%���t�o��1qe�
�xm�J�X�f%n�PS�����Ɂ�����
�� ����8h)t>�o��^�D0�꽄?#j�K���bܚj��% ����k+C��O{�sy�J�n�*x��_�Ub�@�~�NΨ�:В��[���ԊmWQ�M�m�M�>p`E@J�N./Џ�9���덊�WH���vlr2�%˪9֖a���;��rK�Y�ϫm����F�A%Ѷ-(�=���>�����_��+��w�9���(Ӊ��L?��x2=MiQ�� 3�`����D����Q ��7�9�������O�g�9*ح�I����2�Ò<z�Ǧ����F\��|#�����h:G���D��Sin0&if�OЖq"N��M�>D�ǒҙ�J�&���v��R�ѣ��v-(�A��%.���ϕ�0�����A�<ô��'+�-�PBOO�b07Ԫ���� ի�VQ9��/x�à�Ӱ>�n}@n�,�7k��pS&�:�//N����\�/Nj?����7����
Jyz�9a+�Ob䡙�> )1o�]�Ѫ���V>
(1��-�^�ޭ�lw6���^֒|bҒ�>$������O�L���F�x��p���[�}E��Z�����������KM�eu�zZ%�;^Gc�[���ow]�W�U��,����*��xi�a����Ue��<�-���4H>ơ/\E���}��7�,��ݩ�=Z�x�Ղ�F�w	]�n$=BB�`� ]�Q��b"���
��b�a{��%���0�(ˡ�y�&H&�wJ���m�G 5 ��M�98߄�ԏB����ylVabv�4��nwRw��]A���Α;� ��d�	p@����`�z�� ��8Z���[}@0�?���24�< ��&����͠ϞQ��,������f5ſ��_ w�����$Ct�w�(������d���G���f"�q���b��f�Y��~�r�i���i�yo�;�а1��m�И���rf^rF����5&����4���<�+��%0�S���	�}7���q$�١�d ]
����H���(����r�w}z�6����+RH|�r�T��9S���\8w�W���=�͜h�j����p�W����vt5���|GH�Yݏ}	Χe�_K�)��NG���_I�F��l*��|z���צ~�dbՓ�j�'�Q��O$;!\�$�i��(%�hb�o�j�|�!�=w���S�.��X~K�VqP6�j�*�()�T�����eE{I��L��qh�/�Q�����-Zp
|��c��UI]�������E�5�j�S�=�]ۇM���=M85�N�̥��,�=i��
B�;������i
vxl�L��կe(W�j֤6�j������O� m��.�g�_@�ժ��+�l�%��9Ы�h�ډvi�j�6��m�f6�Ⱦ��<Y�  :��RIJ�P2����r4��ӿ_�C6�4i<,��V��KN�
u�����|�4��P���M�mD�����K*�h]���K��%}��/�$�����'g8^�j��ҷh��J9x��S�ۺ�����&��_ғ��#�Ջ�ه<c��ǳ6�,U�>C%�Cp��)P�z��d�/�S٦��^f1Y3����؀��|��CSn8hy�5E)i]s��5m
���dᖱ�h�_�᱁�)�J�P�J��Ϩ�Z��MA�����
	�s�E#�� b���F�H/N�@��T
���5�h3jfI��A#����򫈖aw82���ZE9��+%��kxܯ>�l�w��Bu*���Wq_X�I��Y@��k1җ]V�A
c@����	�!� @�&����s{�I��A�)a� �8�L�q��~�]������h-�������M��k�=.�W�r%Q^kx�a'{%��;u����/�*��y�B����X�:$�v�9��Fc�қ����+��쭊EӻE��	�5׌\�T�:pt�ˣ∰fx{���-N�@���A�;w
�7;�&����@���/`�`��p�mrY�AqN���=�U	  x��ko�6����
Bm5^gӏ�U� M{��"��}#ӶneI�Gv������%���G�{t�D��=C2��7����ߒ��n����#�@ˈ&8��tM�ٲN~nh�LXɇk�fdU�Qgi	������� JhY�_YYL<��׷I���<�$.+Z�~Lv����G
V�E�(Y����>������o9��<��7�	NlA����Oq���U�N�|����;�,��P�p�L.�g�('��egi1�N�[�?eeŖK�6�⹠ź�*�jN��ą�8<�/�7q����(�6r��J=*jS?>:���#�D����+2|��ˡDy1/#^���xI��,�2O�=�&
4���xc��ǵ�d;<��y�5�#P'�G���5gI:QJ���"a-�05�����"H|�J``QVE����<G��5��.l:�ZC|��im.�Y�euZ
m��d��2�R{�V�`K�W���v�b��b$	�l�	H�Qᓪ�p�6��fInb[�!,̾�S���
$ǂ!�NX*������U�&�W����
�CE"���@�#�6��D4TIb�))�~A�W�  ,$�;':��)�G?�m��:d9q����
UY��n��>`�6��8��1�Z�6Pu*b���A��=쐭W^�Mܻ
9�/+:y���x����x�h� �}�U��k]�sLm�?��T�p��G9����(���$}�ggc�����u�����2�7��3t���;U�pު��r�{�kF����Ğl�Ɓ$����ի���m��,n1�hֵ���T9ܳ��B;��K�^C�]��Ӝ�Zؗ�Ͼ���!y��O!�&�뫛=�|��^�q#���:�'�D�ӫ�j�o�f�{����X��tv��¹���f�_�=��	ɶ-�)��������vdh�U"K"������I�f_(��[�u��ȫM.�e�0��H���k'�f��~���2�i����6��Hd���!�@�"aE��V���`d��q��,^�[,�0��KE�@���oE��a  xڕU�n�:��?L
���{ë�z>%�ȍ�w6m��3#��Z�q���{KT�+�!zpj��pMHTJP�
�1�)BZ`5��:\0[q�fݓ�%���p��{��NJx���{��&�KW���Hd騌�c}��1��O2!@~$�<:w��z��1s�<�����`���޴���^f��r%����=W1�
�-Z���sw����ȡ	�o��ߊh���гdF?d@rD�Us2�֊Ό5� ��Z<v��>V
ߍ�8�QPN׫F���Cb �"i�@��~u�۷�a�.Ynབ�a(�K#B2�
f�Y�F���yH���5�e�a��@�Z�5� ]r0������gw"aܘ?������zF�P;�!����\�s��Y��@6p��
����yU�by��UW�P����C��d�����N

���؂�2��[����7����N  xڝV[o�0~�W85В�Y�JI'U���N[�E������Mڮ��/\l�v�xH����>��\�Ty土:��瘢�� �S�� ��HY����8F���4K	��������vU��MC��(X���M�1\�HʸV��x�����K��묩�����OU�!�E�'���R��>�S�L�-/VAh����W6,�$݈K�B��j��b�GE=
�c�y�I��ƙ��5��X�õ.֔$.�c"bil����V��Į;.큔k�cO�'���)��٢
31��5���ws��n��/ȴ�-
�X����a9�]�u�f�4[l��T���/�<;[TG��U�Yؑ�{d~̨{9�v���.Q��v`�뺬}W���M�)�Gu�ᣃ6Y�ڭ	N����ҍfeS��Mb4<oaD�}��{SD�!.qܐ�Lw��[�%l�l���\�4H-��8�Jph��w�xl �x#��~8�_�C�{���e�
١r�戚�UY���Ȇ5���D#G�����i��ҧZLéx�i ]�,���$�   x�M��j�0��~
uˠ�f[��N]w6�����SV��}�3�]}���q?�Ql76p�C���CWra$�m�̌�a���p�8�����[!^&��<D�S�jĔ���l0F���@�B�r����Vp䆔�CsE��' Զ
-O��\ЛyĈ*t�Y�y�T��,���Vw�L>'^�|OY�d�8$o�v�~N8Z:���Ͽ��EZ-�,ŪP>����j�Ϣ�?�_��qv�  x��[[s�6~6�嘢�J��<ldFI7J��nv'vw��
Jö�p'0Z�vP��^?���"�0�:�~�8�x��6\$0�S7��);��UA��F�l��iu���q��᫟^�jx���?���x=9:�-\7|���t��n�U�E��;��p�8�M:�)9��
��㹔�
'�Rx������,VS#���ɒ�,N���(S	�l������Ps\�J���#����*DI��s��f^$%�H����:b����o^����._�:��
���:[�ֹ�����������~���iw_�%��fK�����m~��6K]�Rʗ���f1Ko�3J�dQfa����?�5Y%7�2ˤ8�WV\�Y(.1P7+-�W+m�T�Ʋ�J���*���Z+�HYˋ���Lzq/DLc<W��t->�%W�l
mP�֗X��	F:~�"�W4qN604"/��y�nϻ3�*pႝ�
4�L��	{}��M-%B�"�$�#J P����AG>C@f��+�f��"��.)7��xhO���{�h�~]���Ze������Qd�}�������,q;*��S��T&��ڨx���T>!�8�F6�Q�`h�JU��*W�RA*
Uyƪ�3��&+c��'+*?�hi�QjGN;w�KM�ah��V��ö�jOՖ	�{e`�A�q��g����}6�u�R,Z�5��V__;(��(8|�0 ���s�A�ܒ:�`�+juVN�| %plwJ3
�}����ѵY�qQ�`ۛA�j�n�Ǹ��͋,6z�$�R���yI0oYX7�QP�>t�b�L�W��c��9M�a>�Y$��"��k�A`�.o�V���0�����Y~W�T�W�������_/�r���5xB.�V�x�ǣ�q0�n[q���9��`˝Ek?�0d�]��!�
l�	?�� ���������;��g
�vG����??L_XcQ�W�-�g�(l�˯�peH�<��d/�Q�B�2u<���EQ�1�<�~�:݆�.��\�0<�U�C|w���C�e�{ ��٥��?��'�~w?7
@���h��g��Sd� �ę �.X��'N�~m�}Z��I���*�j���;eP����h���F��w�V�*�}���o.~����~���Wo�<�}/nz�n'�7\�W3�`��׶�5�[�Ί�&�`��0~CN������T+*���=��g��bO�8�������)5���X��"�T��M`B˫
��b�[ϧdz,�o���VE˻Tm':��L�O�Wppg�ǭ�C�"����Z�˻�-������Y�uE��V�����/���5�}&kB9	w����s�}��)�.�C�ߏ
����2˶��	���� �{k�v<����F��1^g� ?���F�Uvd$"?��|>K�(]´pն?��~t|$Z6�{�`�(DD1�
���5|�k�����Dxe��ǛvVL��!�X�z��D̵s{�Yd�"�$x�ùK�5x���D�0  xڵV[o�0~G�?�V�&���R�i``�ӤMk�J��b�8��l���'�-�M������%F�<m�ڭ���&=��i�Ac�-�$����-��#�O
RI@�8!�j��8��h&l+� �"K>)�4JB�1�]m��� rΐm?F�/�B	uPuT�Rn�"-��Y�����ۻ	^�
�;�2Tƕr���y��~�$��K*��l��L�\�F�N_q�yH��]���I&�Wd��8�#��,�D��F0�VfA�0��X@�F �W)�o�t�;*�2��Ϲ���q��H[%Z�&�C�����Ȭ�@�J�2�:f5|� '��.Qii��گ#|��P�f����p����j��	��U�'�O���D�<�ij�r��!�������;��jSL���)�n��uۺx�FC��7�H�=��YD�BR%_L��_�BU�ecI�)J�V�L
  xڵo����S�b	��$@U�B/���{TTU�ɷ�5ٵۛ�=��wfl��w{�{��P�����{������||���Z��`��Z��l[j�>��o�p@����Q�\X�{�h'��+{Ŋ�πfG��S#�g���N�VZQ�ņ���:޶����ӇO��W���Ů?1��[n?i'^2�d=��
Vs��
�@8��:]˥g���{�?A<n��#8�y�n�:�����{t|ttT<.ث�P�M/�W��n��Y�h�p�ꊷ�8+���πd%��"�=�v�M� �P�pc1���ݟ�S���[�ǜfl�ń1�WWC'�c�ϟ�s�\�h �`���$�w`��n>
�S�	N�@���J�¡ì�%X��ֱ�,�����JT�jD-�w��$p��,~OP��!v��}/������[�#���j�^��w�4S{<"S��S���P���X��u���*rL
1����|�Vm*��}�J6>ۑ;�%ۓ{tX�v��z��I����z=yiK�C����g{��v��w�@c��@2���K�]5ܓ��󦓝��+��C�0����p�%|i��+7x���<Z�:��?�Oe�>��Υj��.^����,���z�Q"�}V�4�f�N��r%
z�{�8O�EO��Z�sSj	u�1'-��ײƓ��?1qA�u�����A�X+�Y^��uᴬ���k(��������
]�Z9aoonA��b��G/��O��e%��Q����o��&��� N6_U]�Ű
�tC��S
�~���s�C�����e�����S��p�}a,�a�>�%1�ݶ���R DpdG�h6�*%�V��7
�c�B_�%y7J�[��m�J�(��g���s�7?,X��ye�BYO�)�B�c��17t�ޤ��k����H����0$��  <y�A�_���j%��Sy��=dgT����]�ޢ��=c�����
��CqQ�Е��T*	��
:'>��D���a<Oi\�u�	�/96�qC�ڭ�� Q�͔��g��D(��6�P@�;7nW����ܮ,;�Z	�'w�[e�������I�&a0r�K$��R���n{Ʒ-�o������T���[/V,&�J�� �J.�P\o��ā�R�!A2B�tƎ�l.��Q�J�2_.��A�u�Cݭҷ>k�"�1��+x����or.�����k�5�����"#�V0�e�͖�̖|n_.�k��Xz�k�a�>�9Ô[Nܾ?\ ҷ��wT�~5�A���\\><9�s触���DF̳�)*d�+���� |@$˼��Z'9t���6r�&��:��Rb�`�/�hȰPs����G��=��f��gb�a�lES`|mߥ�>;� �������\�B�;�[Z��Ô�ዓ�#ĝfo�NU���)^����Y��������s��oC�ŵ�������;�H�n%Ľ8�d`� ���l
��@��?$,|�@-U�]hx���?��xV㨽� ����uc����?�:�a���J�Y�E�e[� �Z�WژTgg����͡��0A�C҆O/�6Jj��� 10Q���0k#wDmc��;V�΃�>(I�9��g�_�|C���j��=���6���M��/�d;(yw�"+�U�7�գ_¯`���AwL>���k$|{�ϚX��6X=>G!f����0r�	��r뵕t����~o��菉�S��3(���M� �z��o<��IDފy���>&>�dX	��&�ݨ���}
����f��r����3�9²�b�l�\o8LF����A��n:e������ <�o�   x�u�_k�0şS�w!�����H��=�!��E$��Z�Y"I��ﾤ
Ca���=�{�'��!M��zh!'���f��$M�#{e
L2�>y-�F�W�[��@c��U�0N�ֆ1��u�>Q(��L�C����9��jߋ�=�����ÎT�RdO��~Y]D��a����I��'!��ZD l��R�Eƌ�0�z6\�"UI�u����ѧ.̳�X�D����R)�����sV��/D��>�hl�|���f�����6�;�%
��vL��^ɔ1�V���75Q���p ��i�JԵ���y)M�$x	��&���D�8SN��JOՏf�)>��1)�n�[p.�uyY݋
�=�H��zr�Sa،Jϲ�j��2\P
�(�<)�`�$�>�����[
WWPI<��D��O֟w��d�}�}���j�4�)m�]�"$��!�&��7�u���/t�&���#Y������e��<N˰��a���3�6~�������8�ѱiϸ[K��ƚ��������RE��S{��?��*
�}�l��s?�rz�W����L�i���ѯ�#h/�|vw�1f�=	  x���R�H�}E��FR0�٩�fmDHQN��\Xp�0*Yn[dI#��������-�&o�.�R��߻9~�G��{i��d�%	�)%QP�	�)��;�d9���� `�]0�a낦e��A	9˪�eq)��g�9�����bFXD�����T�ei��S2�R���e9����iVPQ�`��aEEݡ��_R�؋`��U�h�U���;�0�$��$VI��,N����,�]P���ih��ۇ����x)��Ў�X?<�/>_���n��-�j�\���e$�cb��W܅��������%n�������+����WW�?	t�؆8�����#O`i�1]�	��Nゆ��%��d�i��,%!��KH^M�8$�*
:o�����Iř>��j �*#�X���d}E�#0	��B� rA�)G�F�_�=���5����*� �>4�0r������/h����d$���^#���͍w4�-g��^�d%U�E:>5lA��9���U�i'�,����e<���De��CNk{H��fE�<�VEa%	-��q!=���V$l-��ߎ�,���������j��L���k~�;J}��[8[o峠, >c�!����<SZ�p�1aO�`�D���-�!�JB$X���\��!���Jt΀�����*u�|����O��<j�㢷~ؘ�x���u�f߳M��F'$K]�ԅ���q�ge��= cA-`}HSOi+�i�6h�f!i��k��9��|ē��k�*!G���k�5��ᇼ�86�vh�ԓv��k���o����Oc��7=�z��G��!�MO�}ല��U9DcY2 ivg������EU�Â�I<�2��zȪw�=2vRóCX	o�~�W/fGֽ����pe�It��E0_�ZX������?�G�{�����}�*�	�`#o�;�bJS�a(�s��Ӻ!�_����7�yV�vתg�F����48��F~Y�WpHP���TP��}�1;��k��C4'��Tݶ����4�I	��i�hꀈ-(}�W���(V�w�i�R������!��ڞ"���CA��^���V*?���N-��)E�^c�t�X=��XK���pdR#8Ř=�iC�hD Z�����
��jT漢n��> G� 3�l�e��2D��6��,DQ��A�H
�pm��q�t���E/���X�>��
����V*�-��T$k׌z���]+�KW=�� �o��K�#2H��u7�]G��p�)|W�������/K�?px
  x��Z{o�8�{�)���Bu�`q8�Uw�����9���9A��D�"y�H.h��o��DR��49�F[��o�3Ù��7?�oֽ�/��&��*	0��3��8F��Q��Z>{�%��3?[�z7=�-��9�̷IPD8C��N3�u���)�����_}�q0`��{������^f�'P��Z�᝟c��@v�7@���I
���:����4p����K?�Nu��G�WE���$F��J�,O�Un&��A��u�,aQ}����鈎��諷TS��q��ڧ��5#�BV��R���,Ƽ�m���x�ޒkW��1����Uf[���Dn:���¹�%����j*]&�c����{\��Cn���l�_� ��du�W��$�2��"p�$���Ǚe�ȥ�B��8}X%Qqg�mSđ(Z��� {I���`7����S7��H/�$ݐU�mS,�pU/��c�����/���q}�e�'=N��_n6�`���ͭ.����Z�Z����a1�ʲ��Q�{s����$Ô�[��\�.h��$ඝ��`�&Kq^�1zt2��3X����Vr�s�
�%:��|<9������h1�5Ji����\�Iw2��J���m������O��>ԨU�O��5�J�vH��9I+���
�  ��x�u��,�
��̡���b�kR� o���}<ۓ�Q2���+]@_����1��`�A����ʱc�a�@!H�>e%�˰���h96u��y�`�|�A(X��-nQ��w�+i�"�ik�*9
��>jB{��c��Ǥ�C"���_������_,�J.���˖x6ߘCe�ms�m�i�͡������)��*#U�L;\u�V1֋;"�p�2[a�~�f:ӡ��d~:]��`j�>T[vS|�HyP�'s�t'!�����$mI;f��l6��AY��t��h�w��op
'��+2lB��!�q���M#��i�MBB7l�N5$s�쌴t�׏��1�ڈ�Z<7�i� VMY�7�	^Ӌ	BlBG8-;D`?��	g��D\�<Xczr����o�3R:$�O#|C�ar�q�ӿN�b����q�Аch(��6̫��j�B�|2��ť�����>��r�+�L �� ��r�6)
�=���z!��m*�t7�
�bӦ� � �ծ(/L�ޘ�����$� �RlWds��v��M؉5��9l���"��ն.���Y5�G�BɊ%Lpqξ�=~^y�{�P7�7fw_��Sy7��~��̐����h}:U>�R��N�����~���3�RU��l�������L	��u�+�rK��U����>����t ?��[lm��"����4`�v��%�(�'3�f��t>�-��t1��wFu�Y��+�nN��Ӭ��JR���R�E�#�V�"�A.y�q��3���5U�f�jg7�ȗ�sd�"ᕎ�|��V=��A.�� dX�$�rtr>��y*c�0ЮM��bM�a[t��H� 9?;>Z��� �V#��8����y!
��C�]ܦ}�i���|�_�Rs<>�c�G�oQ�a���J��|[��@3M_�����_���.-�6	��_?U���%���6!K��*�����F�*4�����*WK�zA	6�7��?��,��t+���JD~&����b|��(�O�[�*�UtwDt��yTd���]SHMM��y���UQEP���${��T=8Je�
  x��[mo�8��_���j7Yt���J�m��q��s��+r9C�h[Y�Jr�\��}�&��(�NS�K���ę�Ù���=[/�ڻ7`�t#0�v����_����O
��#��0�@^�A�A/B�ၩ={��Ӧ|�4��<;B��'�e?k D��30����
��L��1 
�v��N^����I���x��_[98 �1�L�8t�Es�������E}]�x��æӶ��� �B�uL���O�*�]_		:p�"����~�4a�19y�
6��#��ػnvs�'w���&�x�ࢇ���P��a�YHT$�o�̘�R��c�ah?5M
�p�#��q�z��pepI�ϩ|
���Z�@�CLdtUE�b���y������-�#y�����|�;(H�S43q�67��<��P�V�]���[�dR�ݳie��a�Rq��}���^�O�;ON���H�y�����:CQ��g~G2��f~@��lҹo�&b�a���t���*%��v��l�r�f�p���c�y�	O���Fq��j�y���m4U3�;c�Bω�l�>��!��a���oۖ��:SB�ZcA

�g��Tu��kR;Q�X@�j����O)�V��E��]p���Q�
+⟓h�ΑQي��^�1Y%��*�TY=�P9m19
L�#+�X6f�ٝ���.�(�`���$k;��Щ�B�o{�ֻ�T�J��:��d]x����?w�J+/ǢJ�؛x�o�зMS�:e���XV���3(�4�w�#K|�B%�UInJX��ѯB��;��L�	�B�?��1ߨ��	ȑtt/��~����O���H��U�Ϲ��*�ޜ�V�r/�P/h�����c<������Wu�$��)���R1����5"�4�����I2{U�s�L�ro��U�܋��͑�y�ڷ�C��: ì�J�7�s�*����b�T�v|qx�ت��m�2D'�`�����m��c���Y�ԫ'�H4�p� &a#�Kx����;Ė4�p2}q����F=8C2�S��̛@��W����;��>9��o�ǔ?{T�����7g~��d�W���͆�YV��:0�C#���?�su��N��ww�9���Ϝw�3�GaW�?[��M���{*�x��?����˓$��GG���y9��:;?���"_ߋR�����4���3�RzS�S��Tj#)"=��
���J*�A�-��L�   x�UO=�0��W\3(JW	nn��t)��Hc�����_-Nw����&e�z�)b�\�b������o�q��2/�[Q��.��$� ���N�H䱓6�hj�fU�S���m�^����0#?��'"�[���2�K��o9¤�H
e���Zy16�:��ot�9z��gF�yJ�>#  xڍTao�6� ��c1 "ӊ��V������؜��P"%�D�:�q���(J��:���"Ow�{/~�Pi���U�Nh8�R"��U	�[�/��ӓ�������7��J����������c��-WK�����waȟ`U���F}:-����v;��&�l�{px���A�N�]��ȺM� �����d�>���>�Y)��={
��~l�m%���,<����)�NG ?��&���5�]#)��.� �9�+���5��a�B����)�#��|��Cp�:X���R=���&��/��[�iI ����u��F��W��cyЪ/2
/���Q0�һ��%��5� +^�
��������z#Aeiy���*�R�}*�Y�"Ȍ66"/�<�g�_q[�:"3Ya�ӓ��6���z�-ĶT0 �v�U� Z�0�+$��F+AR�$ܷ�p�>�L�PG�|^R ����(��X��U[��"�ע�m����l6n�?���g/9p=�u�_X�|�Mj L�������rc@Z/� 	�]�.�?wH8�yǽm�\ۺ/��O�y�U��G�b�W<��^S�]��X��Mզ�y�R����l�^�[�MI�Lǋc��77X?8��D2�[�:�C��G�������n����)��U1p�פӑЭP:�?^
�(F��Es�dڡ���E�l
�"�K�R��Ksr��SSJ��2S�J22�
�S��l�j�b����i ��(��  x�mT͎�6��)&�x
=���+t��l�����of��?���?S ��G"�"�ѭM���C���?{�8?�%��`	���CL�����>�^��}P�����<GJ
.{c�F�(��Z�0Z��-�tGi������xƯ���i�cQ���Z���Ra2�R9A;�x�a������1��v{�c{Q��^J����%h���R�I霘hb���!Cm�4P�����sV�	s�'�������4Atf
LU��5���p�������Ki�e�����Z��ە	Ý�&���U]��l��7��ח��,*u�p��k�t"R��v�9u�OӇ"?����S���6�/������T�YD.�	�~ܠ�pLĢk�Β.��̏��)�)��Ge$bȵ�	uO��
��SrQi��N|�9Y���6Z*�
���?�eT���6���g+�\�߸�q'J�tTuiǭ�`qA����^���Rۜ��r��������B���ʘPu|��$��{J��]�2n���r��=W���/8M��
嗞2�7�qX���K�5�H^�#۬l�u�VK:-#��m����h
��<ez��=�˥���3��md<`h��)������`A�����x���2u;�t�w���Y��s�����L�Jj���\FCb}2h�����i������G�^0�����WH!�p�y#�*��tF��b3 �F�����o��jy R�ר%��j{�+�D�40]G^1�3�6&�[���/�Қ��h���-:3���@�N-7�:�wvpVhؖm�p �|���W﹨ ���m�g��'��Y��������y%l�@�s����l�}��󫂒��
�qH�S/�S�`�8+�0ì�� NȬΐ�謪���gC�s3
&����v
�%&�  x���s���b``���p	�|@���$�zn)���bnafd�5G(Ȓ���������w�d _!�#ȗ��J�������� ����Ԁ��U����I�G݀j{�8�T�J�����z6�����%�������b4[C���������v��3'}s[$d���l��#Sc��^͢E/�]��n|�3#���3��م�>���1]̐C:�`�if���糯�W�=�V{�$+ϝK�zn\a`h������l������-�%���w9~��6��W�șɏ�R�[�����z&K\�ȡ ҫ�?Q`����i*KL�Y��u�to#R��j�y\
�]�u�V��Fo��0?;�p��u�&mK��@�
&���SD�P� ��;*�>��V�㉆G5�9�1J��~��������Ơ(:+c	�%�0c�L&���ŘQ�+0�g�.�my���5��	���iL�sϲ�%
w�����~������r��h��˹�����_����<��NF��a��/���Vl|ٶ]��5(%h�\��ٲ���D�:  x�mPAn�0��$�ޣ��*5�J+��G�6b���c=�I�B0�:{�53;���?_#�Q @�tQ�G"� E�H����8��ȁ�+�P�!u�f w�l��OD���!����R��ˬ�f���i�Ai�;���)���Rm��-jVg�����&FV��W�"���q%��5���aq|y
i�[������!8������Fh2�X�ɮ�#��y�ݍ��9��4�`_��P>��g�+{E;�x��� A�eX��  x�m�Mj�0��>�T��I�&1�Phu�g��Ĳ�&���>���B�*�2�8�Ѽa�y����Kaz I��Qk~@�J�����J��Љ)	:!�U
�
w+�����H,��g�(��({o��7��GI���W-�l��l���l�i�@2Q-�����3!�zt��HvOk�ӑ��`:i:e:����G_/�,-y��A�S	�y��?�7��T�V�|~�^8��0O��ܥ���]
	�;��>uO*a�/����A��-�  xڽZ{o�F���)6�%��h%i��D��6F'�m��(r%3�H�����of_�(R�r��������o��追�%��E���v(ai�Eq:����/�?ҷ�������?��k>K,ק���N��w��_����1����3L��㐻��9����������u�^w�|�^~v�[����B��D<��+�# `Zx5�?���l'hY
��-X��E��+xg觌�$o~8�ڭIL�ew@��D��,-�%����y�����,V��/��|�z֣e=œv��,j��!�*����[OhLp�Ov���0�})@�E��v�M���I3��%��AN��ӤB(�����������
Њ� ۗ�����mϾ��62s]߇ aB��1�T�e��X��R`L�W�nA�
1�vצ�yxe������+5�o��fk��M��(
�$(�Yіj����A�����	m(j��q�4��ܒZ����v=����m�S��<a�'��e�]�J~�1����>���Q�r�i��$�OJ�0z$��qO�Uy��;�ޡ>�:���m�$��5�,K�A^�$�6��c����Q6�C�'e�NO���q�7��!a�7�WiX@b���dC��xGPj��W�h:�.,�U�OA��$�|���7��qZgZ�g��]\w�@�$��p��"ɚ}���\nRġ�O�#�g��ض��a�WY�b6ߞ��̦ �x�軲�쏳���(���D@5(�������f~߳��|��_����?՛q�L�l�F��+�"O�O�L���GA��9V&����T����y��|JI�w��PA}WJ��y|�=S=B���I��q�2V�-�&!P�j�6�t���ܢ�A6�<�1��Hk���I!ΨHNίN/O>-��������A�ˀ-��#� T����	�ܾ?#��
S�(�RѠ.����OW������Yy#�i (���I}�ZNk�׮�n!$�H7���]����}1|�V.ei���
̮��;�#7У��m��i7 ��'GC��;%�#%+a+Y��lT�_"�#��-d��ʼDTjBPI,㤏�b�m�����#p����@�e��0/4f�M)�͂&`D�Td���ri�C�P 
��� Ѵ�8�&�2y�o�I�0\ɸ
��,�kha0�w�u#jՑy��-��P[��e�[�u�dg򞽶�j��/�m[�Q{=uKbV^��9$wא�D}}��}#�@��~��Y����va���Xn�T���%�m)Euhe���z���H�+�n��Zm�-ǩ6���\�����=X��z*\�w�-���(�����^T�X�UCU��W�jw�q��J�+���%�oTsu��Q��z^�	(�J�d���n�f¯u="<���rH��k��y�y���~̋�l��f*"�,�6V�+;t<�Nv߶[입�"�Xi�m+^�������m�F|Gf-�wq�������{�xS6k:</g��D`��-wa�9�a��RQ6G��Z�R44R\�~8٣ޠ̶m�%��eV�^R=�(�K�zK��L���#����Ѓ��ԼWs�*�X�r���2�!�����&U���WY	�`6Cp�.�G�oq �DR<��qT�} Ψ�9��A�ٳ:I��\J�yv���s0	��x ��jl���|;����8%)N�)y@D}B��D�äGB>s�Eg¾�qa���ie��ߚ�8�-9��X΢�����j��{J���ܐc�Y,�����#�Kq���Q�X	�'��h��6l��!  xڕww4����.���%z�(Y�G����]��{I�(!��jku�v�!�d��D	At�����{߿���u�3�9sf>s�����z���Z���c h�,��@
�|kiI�7�r�<�1C���������	�gS�N>x�:]���(�:�5wt{�;ñ�5`}?�nh���x#��.��۱��Ih�B���3�����B��;���ĕӊ���Eۯ��"�&�G0�߼�	�����4�
�۝���"|�[��yB��f�C�<�c��}�q݄��	����yhPw�}ً��۹����hG0%??�]�
��	�
7�-���	$Ը�i�~*E�_����u�',=+���~ZFϯu�W���׬"�l���n�W����V%��dљ���q}&�C��gZ��ZZʒ,]0,��"�H%-��f���nO+�o����3�����[1}
ޙ5�rȒ��<�Or���}5�H?}z�v���N�X���I�<����D�&lF�[u�ʳ���/^����&:?C�}�⬇���/T���������S]+�	,.�R�u!*�W�ڠ:������ ����,���settO����-�W=
M��sG%Z����%YAԵ�O�	H#�K[�c�(?}a���Uᔼ��[,^y�x��̺�K�5 �p��r��k��Ȳ�mC�?n����sDT;�?��Ow抦��o����!Ty�>�K�h��E"¬���D�ݬ�n�P,�������z#��}���п{�O|�S!�9��a.?cSO����� j
X�6J{�&\-\��K3��y(38�ך뾍����N��
�[5���'�O�MC��J�=A�f�����^�-8�b�mė�ylH��׎B
���_Ael̢��ϗ�(g��:m�AK��C!G����	�ȋ�����ޝ��C�z��V�Sk��qi���H;��n��0�g3��=)����%x���◀!n��v��Tf��B�Y�ZӐ2�,��v>�ҷk�˦�t;��-Z�?�f@�1X�����^��Kϋ���Q?�����wi>ΒS��W�o
�u��B�6��_��ߪK�v2��g�
��)�^2��=������E�&U
�$�w��Ƃ�`I�>����J)Ϟ�(Uap�J���07K��ӫ�.Ǉ/}}��;�Ur�l����1p��pZ�����GS񌨪,�������^jl]��g�1ͩ�S,���26�m�Əa�֮":ߓ�é�.N��^xn��M�R��Aj�F��� "��F���/-7�Nr�������c|��B�
Udlr�C�_	�[�Q����`�.1�
��/W�xKIZ¨a?�c;j�r��ʖ���Eg��,O*mף\׮�J��_������G1�l>�[��|�p�~��Ƥ�7(�w݄��i�}��
�����s�wdv��J��XY��'��vų�"�(�c���U�w����&%��?sPd�L�Αqi�{����<���6��tp?��ZV�_Gr��ڗZ� �:r���Dz�:��*w�ȯHԅS8v��}����Woϻ�����Ȏ�v�\�)�
΅|��p�+���LĤ�`�#���b���y#9�WK��i��
�,�򒕌RN�*�w�Xg��j/��ǘ���HJi�**^��-���4W &�|����
Ɏ9h�h������3/Օ5��IVS���D`jn�Ye��9���$�d
WJY��1�`��m59�e7�o_:���c~+����dZqy���vV*�?Cg�����
�}`��6���n��Q��Z\�9v��_�T&��MC�vĤI���	ZN'�꜕�s�^���9l�!�m�6�e��Ur�`r9"6ίG��JN���,Mz��	(���n���h�g`J#I?�8V��P����,<v%��Ik<2����ق��W����,�&s��x��
z,�B3.��J?"yl�˸Q�y�h����k�nH<�KnOmE �#�y�,9�\b�7Ȼu��ޘ8x����f���`�K�{o{�A �
�Bv��1k##jHo���@cvMR�<�zl{�~\���☦Q8��D��K�"���(,�R�!���u_�JZ {�	^�:�E���o��r�.�V�u��?�½��:�y�����^}���;�,l���.*UY�%^dR#T��zw��|D(���J�ϡ8��Z�7�h|�<;D�dL�D�u��Zu�3���O�j3��^L�9��V�ǯk(��������<����¡�ejZ��a
V�வ��4���!ɣ�~׀�~�)b�(q���V�Cv�σ��/v.����;��jb�8�~i#��0��'TŃ@��zx�QK�LZ�}��~=5!_�_�2��ʘ��/ot�Ovl�-eg���y�p�������㱝��6Hw �d�k��亗~���������Y���h�
��0"ޯ[�!YH�Z��QV���|w�>/kD��\kJ���[�Z"�r @M峏C�[q����h�����α�F�EW��&R�W�1�U��:4
J�Tyg?��i��T]�X��0k�����߾x���=��9��gL�%X���x;��{�D�����a�:��Y�i83y��|/�b<�~it�>-S�R��{����a+/�XŌl&P��\��a3y �*���݀���/�b
.\-td ^0��Z��C����&�3��?0��|p�R˭	{U��.�z����|��\'(�rr ��l����e���|�Ӑ���#��z�t��6����Q�)6�
8�Ȧ��;���6�j�;7�ȍyο���=���^�Ѝ��2���Ȩ���w�jy��Ñm�I��ɶ��{��ܿ-N�׉��<&�qG(Qxn���L���Q4�`��x�_�8jo�%��^�T��%5�WI�Z�k�+�1�`An���V��Ƭ3�):�q�[���w1ǻ�mW�UU��=��3u
�Gn/��2X�y#H��s<� 5�`u4Z�����P	��C Y<��Q>�	L��[Cn��`	;�����[�<e�j�rуo��{36k7�,f8��D~�����SO"�jM�C��b�cU�ok(�K����i)oF7���GPx�/`3xU�k(�	����EzLX��S������3#P.��	8u�A����]j0�!�)����ŷ���@�s!��`������a��gQ�r��g��6�s��y=)��
9�����ϧ�����G*؃�h�/˵�Bl��6�M�0�2����hE���M�$����"�G0J����Aot�S�]��	ʆ"�':ەhϘb�XU^֘ͪ�#���`ݴ����+��h��d�$�/{�k���S?2��b�|��U2-��ډ���(���1ŷ�1+���P<�Q��PiW�X�4���Hx�A#��}����%
�@U��~.�� 4*G�  xڽUmo�6��
��ɓ��u�� Ò�ڥ��~I
�`���rsq1��S����4�A��N�{�Rk|Rk��Ps��"����A�TSe��Jta�X[��b�Ҁ��Sζ"LeX��9�1y�l��.�Eb��B�P��ʞ�)��v��K<�RܪA?8������麆���~�{�ӯ��Z���	]BJm�ztm�>�4}.#�K����R��L�m��_L�	��"�� -X���<��YN�$7�3��
�BF9<q:?�p�?��خ kAc�&�E�F�a����K��*�*e��MY�EJF�D]D�Y$��4�
�#aZp�y�����6��&��.��(�O+,�z��\�&��։&�&/3/���;���6��&V��
v��"�t��:g6.��Ys8�9��U�2m�<
��aQ�6c���Xi#��&T-!������gN�}F�����>iV��I틺'��i�qh�MV�!�)EN
����g�&ԛa�� ��ͭ8ރ���N	Qice#��D�jܺeo��\�]�\#��8�2�?� ����s}2��%8�@��{�H�E&���z�0I�X���##�Oor��5�t�F���7]W�R)�2&��PD��@,�a�>��A {i�əu�p,�b*�p_��g,�8z7�ʝ��O�+�_��7�,�\?�~�����r����r�V,��c�sy����d��Tz�L��7�F��*v!�,-�n����x��,l ���EV�؊'&��XXL�42�F=�
g8c���1�K��T,+�Z�3�!J�^ŉ7d �[f���\�#��5$�V,c�{���a����t�^�F�ApMV���� gC� ��A�  x��Y[o�:~��P쑸�ƗŢ���
�#�K$��
2}6�V�j4��T�����4��w���ʥ��TQ�w���H}���c*H���M�YH�4"���:k�j'����M�`d��<��x��d˳*l�{`�E$��,���`�0t��a�����jn �P��2�VA*w)���Ȭ�O���M���JT�_>_\Ζ���
��Q@<N��c�e^+���2yjO�g���8�g�+Ŕ� �OP�u/����	B�Ɖ��\�̤��3t�t����y����$4uM���7�ұ]e�n��_��ZɵkՔӫ­n�P�K����Im}P��`P��>?Qe^�Y?���5S���
Mh��6y��Q��^�˱)N��;,��k��~�H��Z����4�X#���9��s�l�K$�fN9o�Y]٤N��38���U�D�?r��$��#�����&��j��?�!�y��3m�*�%�%�(s��L!p6Q��K�8f�˖�i�{�g��5��
ձ��-�s1 �o�og˾۝H���(%&��j�Թb3���B�N�d&v����8Z$����Ό&�4�2��s�M5�wpE/��7�>��9z����O[U��n����W�eh�y�I�x�|��4<ZeϮ��� p�X�-����3���|A��E��PԞ�d���M6��"�����W�v�6l���nʘ5�4��e��lS�5�������5��u��6Je^]�o�?��һ���6��)W���|Ǖ���,8������\,��b5�����#�{��>���7�P;9��ݾ~�l?�K�7��_?����mM��1��!Ę��e��L����`�ϒ�n��
��7���5�Ao�]��U��E��a���}�%��i-ʝ����lo�
���ѺB���k�Rp��ʯ0���>eu�晇��~��N��å1���k?�?���C���x�M�J�Ga%MN
�ď���
�s�q���}��]�&�Ws�����Y����R��lz�U#���.D��:�I[�{���L��g�4�U�'�T!���K;i�"?K��\�]����r��Z��8���a*{|��d�Th��1��$)Lf�b���oʴ0�� g�P+�l@�9��jШ��
M�8נ�3��X��l+t��e������hy�,Ffc&a��6D@�%E��+\�lz���WH�Z-�Y�i�ƴ�;[�:�"�k�(,ށ5��@��:�� ����Ԛg�M���軴)��%<m�	�0��10}�b���n2Gn4�<��q�Zߐ�Gp�vn��;���}�s'_\L�/��M��X>�/(��*����|�_�? ��������n���.R���=�}��d��+ۉIy���>�|n"�e�as!�:��;���<�"��?F�p�K�٬w�A����	��G�w�J�\ w{վDѩ
��w<�u�JƂ]�Ơ�2PNv蹂���|M�1�s��!ZQ�E�T������0��<?4�S!Tl�C>�^���մ��p�I\뽴_PC����|M~�el�
�T@��2��r���=��>I��L��f,�,�T8��%]��(P��}f�%L?����e�6��l�
LO2e�;���ԭ[xj)x-�{/�f$և7Co;�iir���APՙO�ޏj|Z�-�� -�O1e�\���^ ZP>3~����^��PbO��U³'ՁOyJ���H؄�{�� <�	���?�]���R�D��������δ�g����h�&�7�:%��g���U%���{�X;E��wğV@�96�-�
��?���8m�l�zp���y������\w�Ԣ�2�����r︕ :(��.�S��v�j;���j4
(	�7t�Oȧ~����^��,���ؗ��}��l���s޸��n��m���:�;Q-��s��Lg��e�τ�n�|�z�z��qU��"����S�gZײ"�,X�X֓^��������H�z�Ю'�s?����y_*LJ��s�*�/b�^�Ux4���T��u�U�禫��7m���\  xڕ��j�@���qf$�O�M��=H����TdIF]c؝X�롏�+tc��XK��!����ow����Z6M� �*��Fj��^�`����^mx,���t�d��V�G3�@��	�2� �q���͛����'�Q�
�0Eg����(8�us��N��h_5���4
E�9�I��TDP�˹�������S
�9�i���y�LPҘ���҈�����=x��s8kǇ"	C����R�s���H�e휮��K�@�`��i/�櫍Z��QLI���jI�Vd���u �J:��J������%����d[,vG&�-,01��JI�YNf�	\�Y?   x�{�{]f^rNiJjNb^��RJfqANbebiIFjQQ~��&W]��R]AbQq*�H��0�T� ����  xڭV�n�6��)�	
K��v�K[
$��"ݛ �D[�P� RN�"~��H�
;�~,ǖ���əo�~�����K�9#Bx�*a����k	�6L�J��x�M�ĵ��L(�����d�sƚe�`LO��6[���B��Z��3;�r�(�q�Q�k���WH��/�^� ���%���;�f��7b�)�_
Z��q}�5+}��)��
7���B���]����\�c��Na�J�����x�D�� �VN��
�αh!$Lň
��V8+K�L)�aG_'|xz���N�v(k�])g��ba>1-2� Q�~��v�>��*lY�yL�'*�&�#�b�fp��Y�A�K�U�|����;Rw{(���1�YE�O!m)��F���޼��љ�u*I;�\i-�V#�h����DT�s�u{"���$��a�g۫Ēc����`�|���Bs����m�q���Uz�k��H�f�#�K�_�Ô9���=�xk耡M��������wxGs1���P��"sk2���U*36�i��v4�e�kpG����X�  xڕT�n�0��)4jp뤻5v�ð��v*�@��X�,y����a��W�i�b3��2ɏ?R����N�R�Bjn�	�-T+�jʢ�ZB8&q��N�<8&4�w�����F�4�_]_]��p�t��]YНCXP� �~RB�d�Җ�=��zJࡑ���ox@�yֿͣ�RKRj�}Aˊ;��Ãư���2a����O�� zʵZ�-W0#
�?A��x�
��^��2�J�M|oc��Qt3n��y(�2G�5��	+3�Vl@k<���dQ�Z�^O�/Kۚ��� H��\�   x�{�{]f^rNiJjNb^��RrNjbQrbrF��&W]zjIbiI����������!P�\CI�8;3�L���(�p�(F�:z�EsՕ�
���lU�Z�j��҉֕�̞�%a#�N��f�Ls<���k��[/f��!^��.��)�%xw�YYQ+���?4�Э�y�� 
|�Z?��^��j�2]#��F�ث�֊C�U�<�E�����C���G��o�꜒��VG��tԳ�0w6�.���Ν<���e�}��'-f�Ƿ����~+���_to�����sp��SjI��$P��Mb�p�e]��8JE^)3y|H/������n��  xڝSۊ�0}�W(z���m_
���e��[h�B0�=vD���%m���~R�#{�v�۽cЙ9g�x�~�TlF��3��e]2�5u���H���b�@��3���-%���vk�X�4�%�ijguP��EG^�nZ��ޫa��܆�>\^\�\P���hLn\�i�
���J
� ~���^�Y�)�l-2�H�AC`+w"�섰!ua��j���Fvߊ[�>��pG�-�ΘF(Q�R�/�A������V65ɒ�a	B_܀�&q�sX��N��d�";��`�Q�C���e��0�����,�ӕ/'��M)M��~��*�fO!H->l�������=,��݇Ov�֝
�F�WJ�Bqc\l��h��t�Nh+�~�Jn����7�S�jt)�
�Z~���vZ�aDV ��P��I��:^��=�*`�u-y�<��v�&Ci����ʵ�ճ�Xz�Ȫ�婟-�
�O~�?A*T�S�������~b�2�J�g|?���w6xe���-�¿61a��!�]���Q�)�F,�o�9��b��0V���M��==9�7�'i��$���78:�#ɩ���.l�NN�._�S,ve/t���M9fˬ�/�����J�-��U�������@�"I�B�q����ޗ�K�zX/�$��A����~����B4|;�{��[C���^$a�)�cA��m�F�3��(�X��
qV������ٻ���������=�P�́�]7=NA��#�� vcz>�R����D��gYU%c�:5�@���0�|?-�p���cg[3������oǓ��X��_
��k��0^or&�ebV�����̱�87��ᾉ��{�]ؘ/lt�k;��.	0~�ڇC��v�
�b����$�m�K���'��p��t\a+�a.3.�2|���)/�Q͈˂�i�r�+�$󒷣�?^�?L�:=M��ү>�M����sa�������)6������u�p�? VOy���ִ�i��^��b���0ޏ��g��%����b	�UD�ݼy?:�e|1�����@�@��WM�K�ye�э�)��j��Ȗ��GIp�l}D�|��ة8���6�[�n������������I��
�99��*<eQ��n�%�NA���R��~�#e �Cx�+[�$ߘ�J�T�.�uNZ�풍��J�̛()��DIP;:K��)hd(��d{F����=��f���|��|���bTiTD
��6q�
���;P�vy�
s�N��.�qS
�3P$03y;9��"5&Z��(v~&�'�ː��͈0Zꥧ��M��W�'�D����_4b���|��\�%`�!\�;��
{�a��<1y'��z������͡���d
�^qUZ���ch�O�u�>n�oi4�j� ~<�������$��H�l��U[e��;+#
`�60�ϧ�� ��a���O��mx��d���k�S����ܩ�R��= Q���Zڭ�^�!*\�֚�_I���mH�3�)�3m9k01�3�BƧ��O�1hp!���'��i/�0n)c�i����pbpL�n�������C8-#n�	�C2��h���آw���M:�Vi��63��gYy��Q����"���m%<��_��0硡Jl�9��b����Ƭ��Ԏ-�KNԻ�)�K�V�%�b�U\9�.	i6��Ś^#�H9z4}�z��O���5���
��!�j�ϧ(�2�T��gzmW��C���)���	P1�^N�9��3U�u������l~
�T"�ۏm\ו>��䅿O��E�8��B�V?Q1���<�}��� ���]��,}UQtO����'���'��p�A�T5 �iJ��Ў��F��rr�/�� ӶuM(��!4�f("Sf����?�I�DN�&Rg��_�_��Hm����8n1	��`�];��ˌi_�Rԃ}�5�ՆT����y�� ��~��^����u�{ce�n�X�Ҫ0q�^�LgvH�A�Ҵ{]QB�����\�Sz��4��T��˾$�Y�ͺm7>ި\}z�I�2 =����S��Ý��2���y�F��
�;��-O"5$,U煎����EW���!�1�ݵ�~=��ڪo5��ZX��"BlAI��*���\����Ҍ���5���-��3���뺇�A蕈]�,K�,��%�|ڀ���W�d,ju�N�A��Q�e���k���,�*3Qǯā_��O5Z��D�_� ŷZ>�"#���'[bD�;T5�#��*UB�_5ԙE��n�����5��j36,N��a8�vz��2Y��W���H:�?7��;C  xڕTM��0��+�/�DK�ǖD�v#�R��6�)���b�����?�a��!����3�͛������|O�4�L�j͔��F3'ޖ�p�2����@\�/唴�	
�a	���A�S�+����J3|��̓��@7��_5�!�
xJ�[*x.?�����t-eQb�%^�(�\�'t���6�0v�������MP�8�LQ�Ψ��3d{Ñ���b���iuevͨJw#�;洗�RT���F��?L�K}�/^М�WS�3v�+
;?0F�xZJY��*����X��h}
��5�D^[)�c1����D�̀����8��3��h[QR��%�Zq:�^'�p7�h��d��
A�¤�   x�=�An�0E�>��
M�
����k�����Y�&�
�5��+1yG�Fc�\�������C,�B��P�8췻��Pd���M)=����'�.&�;�_�Њ2�}���6|�Нh#��6D���5ݹ/�[=�
(:X��=Ӥ�L��U�D5d5K�eޤ�q�xԵ .�� O��  xڕU�n�6��S��(E@���.�k�
σ�OC��j�����)i�ů����ދmjTĚ4�G����r��;�0/��/���R�F&����^� t���ڋAlKI�RX�д(�p(Q�f��K���
���/o�Q�]}Y��H#�LջK���'���b�>f>��<��y�l�;���J�$����_����ݽ�Tܽ�����+��j��G*	���h�$"��xlz}~�`���(�㕩=���ia�P��L֔Ԣ�Sk��芒�([<��겅�X�A=dP�!��e�J�L~vg�_y��?�m
�̔����0�Q8����hCQ�b7�'� Q8���
d؞����������qI���,�܏C�0?n����u�n�;4E�BW��hSD�-\}�����p   x�{�{]Qj�FqjInjqqbzj�FqyfIr��$%�jj��*�d��*)�((g��)䗖(�`U��Y������\��V�_���X��PԘ�Ҫԫ����� �y)0U   x�{�{]Qj�FqjInjqqbzj�FqyfIr��$%�jj��*�d��*)�((W���*d���&�d��)qijjr وT�  xڍT�j�0��WL��5,Y��f����Z6���"�w�Ȓ�H��o�u�������-�q���`�<z�3o��ϯ߯��+����"�/f�*�e��}vq1Gk������/����pň���5!>d�U�n�9��Y�r:�֜��HN
A�9E3�3�`� ��l�
L�3��ʰ)9|�P���i|��[�7�E@2  xڅ��N�0��<�)K)���"!�V�{����0�}�y ^�)[<X�w��}������ �Ě��#��H�):.ߢC]���u��Q���1�f2R����z:���]_F=\fX�(UG1
n�����\�=��5
�2�VqU�EQ�u�RӮ:  x�uQ�N�0���Y�HQ+Q���
�;*�y!z<�^ڤ������,3%\�b
�zn�2&�\�5c�+�f[nR�A|V$(Ā��#V��fV!��XNEvʡbG6TZO���?0㤭����8�MAl:0gTf y���"�&-�jU��5��8K�� ���j76�ˣ�1��m�,)R.s�J�1.�9ςî�${���joD�j��PCp��P"e��4e����.��;��6:N����v/O)��U���4J����)�L�2K��7�t��D�x��e��(U���1���~zк�NVX�j<�um�j�C��<�T��[n�yU����H�s�6ƻ�z-�n�{�K"���)�=D��^��H�y�?rg,�a~�Z������X��M�w�4�=�c���G>�uڑ9�ߓZ�����G�΀^rŉD/��f���^����q��e   x�{�{]Qj���BqjInjqqbzj�FqyfIrH��s55mm�J2KrR�t���K�R��sJR�t�+N�(�u?��(�H�I�����&  �(��   x�u�1�0E�����J�t�!ΐ�nk)M����y�=W D[/�������σq���"�C��N����Q��]Q�ʓ7�`��lK]`��YhP`pM0(j���n�Ǥ<R�2ب��yCU��Tr���׀+l���sJ�!���	Z�^5���h�\�|C���V�.��[VE���a�  xڍUAn�0��]jj)q�ȡHR��8@{*��X�k��D�$G�~��>�_蒒�f�\��fw��?�~�4T Xr5Y�+��v#]Q�U^o�`}��/.�di��d@iK�V"Iw0y�`Q��{��@G1�q_+C(Z�i�� O�������{YsC?��D�NӤAk7����5r7�i�,P���ͳ4�e(�����໮�%4E	
ʀm��V�@�W<b~�Gn�s���1| 9rT7��b�Xl�\����KI���uǌ;(�&bZ�/ןG�h~ˏ����٧������l>�֚�o�ft�ԷҸv�g���yQ����4���:D��q|����`���&��)P�������(��|�
.�z?���[$U�)������g���Q�m��{�I��{��6a��Ѱ�*��_���q����*l�9d�?�4't��F����2���x<>�(�O��   x�m�1�0E���ʔH�-X�Դ�ꤊ�c�H\�$������������ (��*�^�lq��G:cA���u��&rЂ;����`�0�d�������1/0�J�1ne`�_�N�V�8'8-)�Ck6���P�׼��<�6u��؄��tC��  xڥU�n1����$#E�`ڠ
E���`SU���$�{�ǔn�-,�7�`���cf�����Y�s}�=�q�?�~�j,�O ���1f�V8.�ؖ����VgPsY�m�A[�1d�fh���� �>SM����$C���`�O�ggg�Ώ��
bLk�~�~�N����	ܶ,��qvqĸ��	��)
-p���i{p�	{�ޤ�j�s�Ҽ�M��N��v���i@���6��r����l�F�(��^IRb���1(���#�z�P�{��b�Q3S
��X6KC�
�P�,�&�SG}���J|�to3��9
5�2T��R�W�.sm�q��Y�rWc8{@K$^G4%{�\�����{4�:��C�G�KY��N� E����F�����!�`�ǔ��o3��@߈x�:/���#��ҋ��~3��fHgE����7u���CPSBH0@���*������KؑtC9�;����DRة�Nt`t�W�`Hue51�{��
XOX~i���U%��
)P��%�W��kjjrqq �A/a�  xڝ�;n�@�{�b̆" (H�ٲ��0�	��n!/��"� �A�.t��)R�@�B�K�b`K�Ê������Y���{cHNN �b��4I,	b�[2hg��9Y�$;�,9I��=ى}���i{�
��۫����v��
�@kw_�
J��D�S�u`��H�3��̤9���G�nU�K:�j�˦ia�l�&����V�鋞w�OɧP�k9YxҊl�"'�D5WE�������p׿����1��h/�	*�-T�$债b�����8�S���.M��vw�:�}EBt�R{3�~ �U�B���K�
ndA���VÖ�.gG�#1$~T*��x
�~��VV����ۃ>��]\�_������-�����#��4����T�n�cv0`��c��QkFRTb��;���$e4�נ�oPz�MU���'��ykQ��x:�
�bN	9�A���ƛ�]�&�x�Lw|���2�86��x��Y�S�0�"(i^o�-�l&'Δ�_	��D�4[�'Ymt_�ȸ��
�b�r�@�P�)��Ts��6}\BW8����C!^��:�q�q�&ޡM��s�֌
�Ai�5Y)���$��H\�)��͛y����0JBfwA6����(���k.��G-$3j@�����)`��_>��h�Ne�P�N`r+/1�'�o�f�� �W�� ��վ���J��59e�  xڍU�n�0��)X�xl�"5��6�?Y��"(����R*�Mr���G�+�����5������I����Yc�7hK4����͆۴�@�3k�Y�������`tz?��ng���?A*�1��1�a���X�媯фg�&���0
N#�ht�M<
���R/<�N�m i�*�L-���e�/ƁG�H�.����?;v�>>'��* <�A�E���gŲ����'ᄩn�����)[BS>&��BV�cd6�Za��]huP<F����Q4B��]�<t��p��ҡ`Eqz(o�"�]���i-�i::��
�K��3�\	�j,`ɤ&��M��9.l�"��o�5��w������?�͹D��l�ܘ �ݣ��V�4����1�����)k}!X����lOQ�0�~��cX:w��y2u��]�j�����#1�蓴!-�E���V�]����0���(�N�/����NO�Wl�7؀~����mk��A$�W�,�aύ�e c�6��1��V<j��ՙ��>#�J�x�,�f|~��I�Q�X}����P��%R�s2��R�����Ѯ���e��2�K���q�M�&����#�R�-S��K?��}zj��ٳ�D��;4�w����������M�P2�ԝA?\��|�Q:]i��%gͲ[?6��87��*�i� �&
=%w��'k��m�4N\fl=���G�Y��i�c����  xڭV�n7��)X]$F��h8�Ɨ n��%j9+1��Y��ϒc���C�@}���j-���dO\�|������}4 '�k����sW-&���Kj�����~=c��r�뇫��?n>�3�"���n�^�����h�J `�ެ@�3��U%<�ɘq��3�nQ/�\���c����d\�����/�Ǩ���ɳF9��F�iU�7�q������Q�y	�K^�l��W��jē��(C�(%NX�((�\a@��A5@#�A��*��8�d��:?���6���Z@u7�눬��~!���:�U�7x����yG&���^_��};=���z^su6�K���wZ�=�>'+��$C�l���=Q.0rx�%p����2"�����y/H�ՌAM�H�~�6���!i�R�0Wm��"������x�A0Ee
��Z�ƬT.��PJ)��P��Q��pj�bK� ͊hA�(��J/Sa\�5�@b�d �1A�<
_~�ށ!2\�lҕ��s�+����C�0�Tې����14��E�_F���x +Cy��G"�x����\����W���=�����S �D7�C �k�Č�t�Q�a�w[��Tp��t4�*��}�G��~ԗ)�g��kGrD3�fϙ}�o��U�*�1 ��$X��.;��(i�JCŷMn`�
x�m?���+=|�N�Ca|��LE[N ��uݯz�/c	|j����������\	���Bq��.��ɮR�����*-����ݮ1�i�H��	N�1u�U�(-�&>��L�J��Y�wY�&S�e�aبz�E�yJ�!ִ��';�����g��-�g0�|e2��n��
�3�����R�`�  xڍV�n�0��+���moib�h{l8@���\YD)R )����z�'�ʇ^iB����>fV#���稱Z������23(��Ơ&���V����� ��B=�m�Vh١Y��[Z�����D�j�&���Pk�3X�����ۯ�W��
bLw�AB���F#��c_~���9�Ɩ!&��Xu5���E~u�n�>��߬^��r+����j��w�n�
��^1Ǒ��-Vj�P(!T��<5�H�&��!R���%�Tɂ�ʥ���1D�S(")�N�0���)��;=H�ɘ���8�[�+b����TZ���-I$��[���~#vh
��ҳ2�5\"� _��s)���
�j��讽<4��wK�$�N6���l�LQ�'��P)P��5��L=�ȸ��������|�?eza�;�ITp���h�E1^zǂ�`�nˣ���z�}�p�I_?�w�x&J��4E�)�3���&�����h�3��da�G�y�X*O ��z���訛>��u�}��fv���KkKn�Dsy�{�jbʐ�.�Gl�|��H½���,����/�Ď�TJ���x�DӲ�⏧�}힇�m�{�����R�u�'�R�H;.�]�Zm�~��]8�C�ѥ����L��K4��}{����C�<�
�yQ߅��e�<2*�8?���a�=*���1���`�b�`_-E�r�_p�s�!�I��0����a���:9��)2��M�7�N�{���샎_��SU�1�!ʋr	  xڕ�=N�0�{�b�&	��h�@ �qf7��fl!m�Y(�9W��E� "�%=������#�� c��,��?���z8<H��:�W���\3T!2R
vS�LgN���������<�y _�$Ԫ�@��������֢Jz���5��m�gy����Z��2�h��1d0:��N���������}W'O
k���)t\�%�p[��ӄWH�J��;j�U!�l�kH�de2:o�Xt����L^x��L�MN�jA��*��0>���r_k&P�Bi��J��ذ��53	��^=�T
�)f�za4� �7��Ƕ�?�g&8�%��m�� 4_ACI�;%�ˍ����Pޚ�	�Cz	�a��w��BE���r��M�����7�*��J�U��E�&����   xڵ��jA��}�t/� ��B�^�=	^D$v���H2���>P_�C}��B3�=Hjs��$��������� ��I�$��]z��nW�EF_ޙ�XE��Ї�|�T�`<6E�dd�v�"y��vV�&�ilBw�
:A',5/��N�&��^ߘ��w�暜?�>Ȃ[�E'xtl�L
_���f�w8�   x�u�=j�0��=�D�-0^�2�Rl0$Ͳ!��Y6�!��'gH�"��l�������������7 �Ks1�ޒ�҆2v��ajc���
�n��yj���S��~�S� 9�0�Ox��DV�[�b�5ăSs^�E)+�'�d�ِ�j�7�p\�uqQ-Rt8����H��`=V\&�ԡ3�t�[�
M�L	M/7�Q�Э�4���kl}ؑ��d[��2��\�n9,��2ώf��k2�w�#�ڶno����"`3-��
߁Bz!DE�c�j   x�{�{]Qj�FqjInjqqbzj�FqyfIr��$%�jj��*�d��*)�((�����W5(��*$'&g�*�`Ւ�[P�����R�P��rx����& �S'��  xڕUKn�0���6� ��
�1�8Z �"I���Xf"�9t�,|�.�3tх�+tHَ�F���(r��=�׏�3
f��
zc%���J&�� �,W�`����!Ɯ��G�S���*/��e���ʞFqzu�������ڸ|N�|TV׷����w��a|Ϭ �X6�ElV���f)`��(���`uV�f|hTf����a�<��R��<��zs��f �R��%�]��[��&w��2e��M��2
29"
�$�Kuӿ��$I�Y+K�b��ȉ�қX��	I�1
%=ʚ��D�3Ԭ��H4Xe�j�!F�q�j�/�E�	��nW4�A�>�nUe&䨄�T�[q�O3ء�Co|���ב�����7�tʒ���<q*:_^+�j���:���O8��������Wp�*#��W�q�z��"�Q�"�;,�z�a��a}��5�s�F�0WO[�;,��^w5�~\����2/�9Eޱh8��*��(rP�k18[�I�.���p(PY������'�BWⱌ��c}��qV����AE��@I8  x�u��j�0��y
-�$Z�ci=�6�l0J��5��,9����{���/�5>�B��������a�r�D℔ӨX�y�^8����n��s֥P����X���aۨ�D�l�7X)��fe��
V֤�����G�X�n=t��\�y�0(�[EЇ���yBb���z�6��'e"�4)X���̈�1Z�,��r�}`<HZ��<��H�MJp�VRE�$�6�;$  xڍ�KR�@@���K�*�H��E�+d�Fm{R�1���,YڹBY�@�B��������~�����<9ԧ' �F�������\�Sz�'�i9��=+�,U+/F��ƶ[e��i�I����\+jU%�����з�'���A��P�ȳƩV�H����2$�����	��<C�@	H�t+�fJ��(�*��*�Fx�	��y�El����YB�*�DU9� j�j0�JrA�K��ޙ$�U���p��OB�,�*G�-�Q�e-�.1l��ˋ�b�,L�����e��X2��?L�����,y��j;Wl�﯅]�Wt��.�i��j��8��M����u)uB�Y1,��p����Sw���U_�>�����>�Z���F�,�A��*t�t�W[��%����91�'��o��W�Zn�f��֤}�ѭ��Ǵ�@~w8�ia�B��z����fB�c��@MULxeUK��!HT���HZ8�(�#��~f�0(/7UP�_~��K�ktV����\K�&�ܚ��GG��������ŤY4I�WL��#+Z<(-v����O�ViJKBI��2tK�'��Riћ���B�&���
MM=$�H��}���yg�:�xL�:L:�$M��N-[��������u��4 41t�&�B1�r5�؏9t��:Zz����f˷
����Z*ԝ��FKxE�
D�m����Q<�jUC2U�Ni�4�+S���^�
����#�F=�Uo�H��my�ǋ��r1 \��:{wP���+�ڴ��q���a��m�ځ��A ub��T�7�-��9�����Q�_�]�m�  xڍS�N�0��C.I���=��+{]�J�!4���Z�D�U/}ށ�WX�Y�T�6�)3��o>�?��׎tq M�AEƤ��
?O��%�����S�����>����i<ث�K�(j�n�\�ф14�����	q<�1� oF���<&����z�� �J+�@�Z��oA���\r���a6C�
MEj�"eNc�Eu�jRt�X��mu�����!&ZmU����v��L�����lo'�(�_�%r�H���P������;7v�e��cÇv3�:��ô���IG���[��W�yZ���_�Lr��   x�mN�
kѲ�!��{?�|���g̹��,H7�t �
%�#�S�$�s���=o����Z>���o�����3,���X-���)�#���+�����7�D��m"���a\N���Y�_���ؐ�����g�Y�mڳ�D�m��xTN�gm�̈<7^s'e���.<:S/,�4�{�_)�  xڍU�N�@���\lK!��4DJ)�(�*!��=���w��٤��y�=���+t׎nq�������f�~��h�� ���1l�&4+NI�O��L�<<�NN:���������x|5��|	�`�Է�[	�V3��G����X�Di���26�0H�)[3KY��Q^����:;���\� v�0-}M���"N}P�$` q�h�t�y�b��&�3.J❲X�(+��2S�ƻ�?^}��2�|q���w{g2�D��a��ԑ���Y %J���p��Em��(aݖ���¨a�$_����]eIs��A�`yu���]�Ay&Ԃ� �=�a�Oq�2�E�A#��Ch�'7�m���6�&#*�q\��Sz7 Ӻ�mz��	%Ѻ�T'�N��&.?@�1������}��^E�l���n�.'ϕ����tHy��MF\�
ل�r)2���s��_��3
�/�=�0WB���`HT�-�-�x��RU�����|���^��G��U'ݧ� ���
2��  xڝT�n�@��)�\lKi"zB%�U%�
E�RE��;v�]��1��<ǆW����+0^'AM����x�o��ƿ~�\,b��@kY�6�_�K���/[2Ê�y2��mzЇѳ�Ӌ����Y��:���4z&����M���R�Tz�qą-%[0��j��RF���Qҏ2%�!�O`zM'�I9�$6�z's�r,P9��v�qC'��õX0!���`Ꞃ����L��f:�^�=�ڦ��V7ڛ�A7|��V�u,���
$B�������I��@�������k�mBI��qg��K����
����(Y����ӫC
��I��0�7TH7g���&v�O���w'���"�]!��9��!t'
����o���_�o
���v�K�}��@���G=:�$��P�L,�aNh)��B"��qK��=�dTrJ�����e+$����DH���b�ÂN�C[��^KNĢ���;g_�5��̖W�&�E�,,��谌nv�;gji*7�oϽ�bo���O�K�E�t���h<�b��P�!&A�t�Ʉ$	��,�n*���b����n����G.���
��ͣ���i�y׹���+��t��E�wL��5��mǃ�Q�sR
�&�&!w�Q� H�}T�Ѱ�*��m��P�)�L��]�Di��5)`I�s-��T�o�և�F���`v��̠�+�r��V{��"Ӯ W�Nf:K�˗�7��i���:�uY�s��Nb"/$Ks��n[�{�N!��� B��Nih�X��YԩA�Ab�,}׊�)���O���|N�����}��D(ʪ6�i2} ]G�.�o�i0��X�ib�����-M"�XK,҃�t4�������@M��P2�|R��\y_:���4�cx�h� �&��.���	�v�J��u��x#�|B�!�c8���8�1[�PD3t�S�Jh@S���:���@�O���ϓ/���t�����@b�%5!
fiuV�v2�X���oQ�br-��^�u}���-Z�9)9l�YM�]I�.v�5��|_���U���}�_o�RqLW�m������֠��Z{i"����������&�'QE�_��G��)�?�˄�'����   xڭ�=
�@F��bb� �c*SZADFw�ueg�.K�#�
Q7E0
��o޼��yW��w $t-�0dS_�S3Ԣ��>0ϳ2�j�1G-,p��oøA��>��œy�Dc����%J iQ69��^*NѰ�N���T���|��!���[	R��bΑ��A"�f�Q��_�+V�V�42��F\vI%�#�am�b��!�
  xڵV�n1��SL��+P{�)����
'"0P����N�3^Q31���%#.��\i�mK���Ϙ����O�/G����y��׆v���ξ�����$��~�h����]��"�Z�����6ln����!q��Ҭ9�>ɵDf�f\!,��DpB%aJ8��?�E{`R�I��)A�ͽ<�r��.�_7k�B�}�����/\)i4��$��4`㕅I� )������6�A2�Mm9Tέ��p8��4tB�@^0Cw�Ի��맕f������ģ��8z�۵.�⒬w���ȅ�$����7��?�Z��iM�h|�v�7u��v��B,�q���R(X����pn`p�W"�������־��KX.A���P\�Y�[2!i;���������v����<O?ۖLS��p�5G�n����btR�D�@0G;|v5nC�F[C����O�gT��|���8<A,f�O�rb!�`��`�%f]F�pT��>D�pT��\�/�q��!��*kI	��U􀱘7�˲����R����c���&;Q��[�F�דѻs>�'3��M���K�,���-(  x�}S�j�@>w�b�%plz�!IMhI��B0&����e�+vW1���zȡ��+t������3��|��쿗?G�Y`�eh-ߡ
������F:�$Vw�CPx �$�Pnp9$�iNt|У. )(� �j+Ln�Pڤ# �
���l�
�6�|�oa�"��6��>�ljFl����\I�\�g���Yi�ġm�0+ח������0iI���q����M �AWZP��ٰ�c��!xs�;<�����6� ჷ(�yR�� S'e���
a�v��F�ͯ%Z�L���j�"����Ѣ�K[b��Cv�wWm��i7��8=���&��䬻�I*Г�L�$��<v
�v5
�.+���l�0������7�����aҮ"2����9�z?>��v�Eﴳ j�
9�B��
پ"~j��#eZ͒�J�[g�8]��Յ�GB"%i��P�B�h Cb�M	����W���w�
�0|rr��h����)L|c���t����~�߭�0�;=�Z��A4���0��#�5����Qor1:��m������҄��ĺ��A��A�^ʙd��D/kH���Q�h��9�폪���~�������>�[0$~�HS�+=���Q�� WBZ��_�K3�X�<���*�f�,Q���^5k�ϞH0��Z�/�^^��RIV�q��Ogh�?����4M�Sg  xڕVKn�0���6� �A�]��,
��&��l)R��i��Y����E:P��!)��G�c�er����ߟ�
���R��RMsS�)(�
���@Q��G��&���  x��Tˎ�0��+L7I��,G���Ģ0�6U�<�ms%?"?��f�'�� ~�MPA�bV%�l�{�Ǿ���ףYYp�������5UA�Ƕ�PY����f`�632'�ۛ��v�]r���iw���	ϡ*9�V��]��N�������y�7e��+�K����lf�N@�<{�h�'��9��vT ��
3K����g� �bv�1�E�ĺJ����K����%V+��=�
(��s�$(G�3)�N��� �&ĭ��i�G#�
L.eb�x��o֟�E�M.��������u?���ˁ�xE(���:��f��3�bU�3l�݌�S�I�O�$J�P�Mr�
n�E�Ω��|̙�����I�@տ@S��B������7��l�DIhM����(�mV�B�U���ᤸr��q��n\���Y�����MgZ���cK
����]O��f�����`��(�4���@�\&Y�G����E�yH�|F��+o"M��YF��R��1��醕���A@b��\u��
�~F ��jϸڶ��l����yn�v4D6c��wgď�Ct���ua�Ց�C��iߟ�rm٪q��Đ��P{Q��2O=���	'.�dE��� ��L|y4D�ݧ$�umyY��Lt��@��#�/��1?�Gd���9p\B��m/�s;����q��k�~�5�H�Ŷƛ�|9ھ���e� �TCeb˶���W�Ł���������zvd�P��=�V��%a��Oh��nڔKf���իG9	!���R���5�0�۔$�ѩg)��e�9�<��o�R� SŹ����^n
�_@W����9�D^���5��I��[�l��tncA�Z.��$��hU>�i��r�H.�[U�s��4�W�
�#�ז�$m�:�d�����������o�x��ʤ|�y/�����A.�&{~z����0W����]�q��=�I#j����󗯦�1��"L%��ܡ7������!�Ҵ�o?���Ex�{�Q"�S�P������*��;��o.�^��R�d�d�%�ȱC�
:��?{�if��Wgl��̘��֚��>�k����tCH���k<@�������4��D8`���/+.D"�5�#�K< �\�;Ćl�\'��J����+|��"���鄖� D'�(�2�F���X.�U�+&����Y�h�H�#��[�bP}����\@��n6vQf<��d�d�G<��aQ�If����
xtܣ~Ha���+xl�B�MΙ�����M �k�9Q�/#бS�n-.��d�bq:�<���Aj���u�b��j���@jU�>蠄����p�TVS�T���R�9��5�u����,m$	E�#"5{h�1Blr6��k;u����h�p�P�?��]�J���
.�ء�Q
�g�"������v��0Ns�H�:���dJb ���o2)B�	�̱��Rޣ$���-�����]��{r�Q�w�4�Ʌ����ɖ��F!H`SC��+ܤ8��W�\��]���1��<W���Ł���VS�_�B�?(6c;��1 �e"�#A��C�C������[N�']P�ҵS��a���6#Y�(1��w�t�ך�]2�ɹ�Z[^/��` ���{���U'�U����c�m�I')fm�T�h�L�*&�w`����O?�N�P5�pш���q싓��4
���u$�m�x� N��o����}���4os��.��r�Q�0-�r�W�]�ӹǂ����i`���ց��J��c4�M�������0��BUd<�@Ŕ[���/%���E.e}���O.ˢ7�/6�,�1�'q���&w���R�L�ܛL@K69�xl0��jv*"-�.��5�����R]���>V�k���Z�e�G+����x����y����/�>����b8��63f9[
�/)�K����Y��	��m�x�@���⪜vWW�Pn��
���=@d�>L��Q�[�h�̪[�HB�$���U<
H�^D�@���xBG�	.�6l<�U<�F�SOc�*c@zc��m��=����~lO���6���)Щ
�^����/��]��65T~8�E@�~��>Pn��+�.�"{?�¢m
R��.Ыa�DEtD� WN�����I����?R����K��������hڒ7L=E�g�(YQ�V!��{��Z���(�\<\� ��B��{�r�@�7���|�
B���0b��5��8x{�#ww9ǈxؤj4����a�) ��ɖ�Y Y��_Y��,��P`Á�����.:�F8���c}�-�%�sF���W��I�g&������ �+b�͖(�hX)�����@H|���ǡnty�Hf;D�r�c��4{�v
{_n��`�K�5�w�9�꾻�M�o���vV��0Z�����a(p�TS0E_�K<>�Q�h�$�� �+/��Z|[�h�:�]�t�\Mٛ��Yo��j���
����N�Bϫ��5xU���b
�QY�(��\Q%���fw�&\k�)E�� ��������]�O��TR�2><���6��.��aE焛n7�ׯ���-�▣z}#�ϧ�ES\W�cNG�zu�nj���_Ԙс{Z�3��R֩����q��cx����J���zGf]�����մ�X�͈�)��<;'`��̐oބ�q���B��Y;y���VUm~4�l?����NK>�ϣ��?H@ϴ9����^NA/M^�W�q�r˓2�Y�e�y�5�K�ӂZol��ۊ�^)M�r"�a���'C��U�;����Z��i=Ԏ�  x�}��n�@���t/Bb�6m�(����A_��.#lą��^|��H}�΢QlP@��������9����E�B!t���u������X��VZ�\M�d@�`(j����s>[��/T��Y���*m�� wU��,zZΧ�Œ�(U_��C���gQ�L�<	��y��	,B�.����v�O��6q�iƔ�m�V[HGQH=҇�Ro�^���SBH���@
�C�@��8��H��Җ��:4#��nr��*��[��*������d��D
�K�Jo��fc��6^xy4^s�=N��J��~c�&b KPk|a�88cv\<�6�Ɛ�t�;�<�Lx(�J���<�}j�i��o�(��\��A.�[9ӯ�>��a��;����'n�*��@Uj�s��   xڝ�Q
�0���l����Ү�]�kK���xw7+AD|I �����2�`��V�� PB�Qe�B���B�9������n�
�"ʑBx)a'�צ��!��E�@y�g%�y{BmzTo�BI)�
�h.k#͂y�䃿���\5��Jb���[�#c/�?H�a����a8$���;�aP<��}�hW�2r�֘��C������d桌I�?������X��D����c�������/��ӇeY��z�}{ a�w-[���ٚ����~'F
?�n)��r��������[B�H�1- h%Uv�r��+�0k��i��Հ�9X���K�=��8���81��-
bV��T[��3��eS�,���/���}fp܂4�Jo@w gp�e㳡��.H:�Lc��@K|�">(�Z��C5rC�HlB����{P� �A�W����uK
7���
�@���]}ǳZ<A l�ؔkM)bFf��\Mm��#F��5��n�d*~�S�t�xC$=���
��0��I�}I9�{�|������7c�f�*Q� �<�/�Nr�eN#/ˆ$J���K�	)�؛A�~҃��}��u�כ)8
�9'G�j&�{�e���Y�ͯ��v�_2��$.X�ȹ�S��؋f��è"��'ұ���,�a樗'=FMA���j���R:����$�ﰌ˯�
��h4-�!�v���Xp�v��_nZ��-a|����,1S�W��?(��Ai��Z�-.��t�l�>����L~P%?��������wH�� �W�Z�p��il4
q
����vJ���^����n�	ql�H�������������:G��_(�!�G�/��<a�kn��˯-���>X���T;��Z���5��0��'I!.y�3�bOPK�7d��Y(�]>�k�'��$�%�,Hn�<���*
ބ�]�-/'bN���ݷ�[�	�%xy;�Bχ�� �^<��͇V<�bh�N�W�jbq�����^������6�_�܈�1�/�eng���<�W��8k�&��#5�Qm��B�+Mh S���RC�C�eȊ�D�^j0���#���f��aW�O-��pU@`�Y^	Z�����r�لet#�
-�9���F~X�Ӳ�AP��k�X��O�>~Wi˥�ry�ʝH�lH�R\eU�T:��L	ְ����G���­I����t+i��=����m\��� ��s[k�L����^7��/т�Q��1��B�B�1��A^���F�����#윋���=ZC  �Y�R{�R�s:|�3'���(��Ĩ��#���#��f�1�U/]L5eS�~��jK�a�ڻ*�|=��i'�U�W�]-s�v�[q�U�V+�V�2is�
m[�Zɓ��Zi0��r�ec��"��_g�7v�p�i�-���ya��t��o�E����sR�L�9�>�+t�~]������.I�)�	���,~�M���(Q�Â6|��
Q�8�	�$q^���uei,@Mn����P~����4½��������v�$�e��L�E�{Q#؄�������S�z(��
��Q�D:�ư�g��
�'iidp�0��'�����|�6����Kh(�β��߬4�/B���7,�J�X��xR
@�'^|@g�vE�XO��DK���+[Ж���qOX- v�/��M��1�-_�\���k�z��S[/Q3�7�i�J���O��/����F�'7�(�3�Ee�(�@�F�
3�����?�x�i���ۏc\�4i0?d7���7
�ԯRUn���u�l'�}W���_���8��#Yi�Lcm�Hit�=��^a����>�I�R�mR�.U�XqGN���@�y�{TI[�|��Z�@mߢ�Tՙ{�-�e��aWGk�>��x`{7�f,��R��0����[� ��� ##��m-�Q^�lf8x}[�����\�D� T{�j��ݔ6wcc����6��S�Vz?�i�)Ijꨟ��?g�?��=��N��ɗn��n�rw�G+�:ڳ�s����� `:���$��7��/~3��m��qH� Ò#(��lH�!��;3�h]	_*���Op�o�ޞ�t����ß�7�Ш�#�uWC&ьK�[Y#����]M���X<T��ևj����Q--X;)��
a�3]:�"9�S��\P,����TpCGW�,�Z�ܕ�zX�feg�~1�Vc[9��Ɩǆվ�U";��ۊ��)�C��3�J��V8��:��v�Y8���Bx�H=�l�
��`����"��ml��B��9/
 R��Q��Dכ
B/�̯/>��=�O��Vl4Qm���E\-z�i�k9�5�Ѫ�L? ĝ�����?tt�z�  �#7J-.RXH*[��7��=k��$�p��������wd�i���,�h�+~
4�0�y;�[�:��Em�J�Lq��#>ؽ�%|;}%vF�EE�<I������-���������]w1�~��=3��bԶH�r/?|���}&uT���H�_��h����	������44��Pu�;�k#KYlq�ږm����~c�H�ZM.fC�zՃ�y�
'C�e6;���>�r��J�o�XQ�`Dm����l]n��v����z>`��/�.����X]���R	K��\ټv2��Zs�tIaD+D���c�l:}tc���K�o@zVu8��Z��@�x���)8���Z6$��R	�Y�m�G�c������3�"�Z���GKA�����D��YeX 
?����E
�v�uSjw��#7��G�����9"��0h�>`/Θ���s⋔Ro��-��|��5��4+e��ϦY�ey.;ӷ�_��z�  x��X[��H~�_Q��$�I���m��03��6��S0Z�bl
�z:���5��|Ҿ��
�L�N;�;,�)�+2�P�	���
���$�T��r�0�ך�-����{iי�,�����R5�N�Z�n�P#ʓ}-�>J��5�.�w���0i_9�]���&��NK�y�NN �  x��\�r�H��_O��'�P]4��
P���4����'�F���8�7B���!I�&�]��$I0
R\F��a�[٥(���r(�겞��D�$��O�MR��ys>֓e��"�sw���+h��4 ���q�K��Ɯ����"W<��qv��f����K����0�~�<�1��-T
�k��b|�Q�`}�iO��u-|�؃�ƇV[���������h��ǂ4T��.�P�J~C�o(��E� ������I��N����!:��~0X>�&��Z�`E��3/_@&�_�&����`�������7�uD�e�0�t��/��Hv��Q�+���t����l[H��t[�5Ʒ�2��(�L�ٴ���)�ߌ������;!��(�P�u}��r�wW�^_mIpm�|��ia���E ��/�TI�i�8*nA�ΑQܥ���b�g��g��lĮ��`\5��'7U/6'�7i�߭�l[���'���N�
W��)�tAZp��r��n��������dWXa�(�%�Z�x�/�$I�j�H�б>�"����yѱ%��*Ɋ�l��u. f%�g!u����[�"n��(>�ݶ�i�F�o������މ�M�=�,�$ʌR8F����	���3�C��#S��L��~�F��'�}:���=!Dq�L�)�&1U�WK�V��c��F���'
������
�T'������G.�v�.�d��zA�/!�����{M�w���a�8�����$,If�ci���>1m�K�=r'���y�@��B�!Dq!��E��s4���=�E�5�{�}��>��ޑ;��R��L�{�9T,dA���,�Gcd�i=j��w�=9�� ���g�y��'{���ݰ����]�"+��xs>����*3F�UBA���\�����l�������z��E�
H#����.bw0��و���i~�k��������I�;�^��}Y�{Ug� �1���8\�G�L�x�L�{�"{�
Ȭ~\���av4��w/.iy�<Z�:�c��V�&��[�ham؇��?p��0��l��
,rN���A��n���^4�M���Uo�?'5'C<��qK��/*���N��݇s�6u�4J�	��9�9!]�IP�]��Ġ8!�&�j��7᪰���8���\���MlP�m%'
c��{mcY���H�Ƨ��9Xr"[1�ѵt�
k�|����4ZDD3�h���Ф����ss�G����4�ة�P���^�Z�� �$-wY
��U@I��.�I�⺧|(3��I�C�����Xs���i7~���ٹ莌rk�t���
.�"�sv.�aVl��|!�Z��U�:j�U����K�S�8��#��b�T�Q�A��w^��4a"��ymD5�BwYw)���N���" ���
U'O�Z��Zy׿B�8귱 �iBfG���������=q��g��_���z;lW�ԙ$�R�jp<�mX!(��\����.�<o}��hY���䤂\�Kc���bF���E)�k��2���N�H3�,���W	0��k��V�`H��)O)�1�v�*��S�H[XF;�/OK	�Պ_�j���1����ӈ����k��W�u1_���Y�����6̥,�k�(�y ��zH.����{�̮:eS���z���a��Vh�n�(C�sSS�T�w&
U��q�_��*_Yʢyk�^�6�6�S��h������I�A�D�����D����RZ�9܁
\者���8���u���DsH�����D�0A�q�����Nl����e}��W�51�Q�kp�+�i�T�D���ґ�FΣ����G�@�h<^l�-���~�
;�ۢ$7	�lH����p8���Ͽ;/����|�LDcF��qD:��t�]c��J�D�������kY�������n��'v쭹��� �b@�ޖ�99ƸIbw�G�?���	2��
���~�j�u]e�O�/7��7<���(v&,��t�ij���
��R�b�PӂV���E,��"?f�Ҳ��s�I�X�HKRe>�U���$T�|�w/P ��E���Bi�����pAq��0��<��RWk�Z�B�2fws.|)���ｅ.Ѕx!��
����!���nN8{�7�l	
3��S[~�|���  xڵWmo�6�l�
N_$՚�t�*ڐ.A;�ٰ-��H�MT�4�JZ��o�ݑ�)��΀	A,�w��������c��+��7?՜�`YU}��y������j�u&t˵�J�s�ǘ�0s�Z1]1Q�h��M#J͔P
|#���^"&��yհ��̖�
s��`rBd^�\�����0�y��Dps�lx�v0�@I`��UU^Z�d����J�t�K��D�5�5�93hz� �7������dRc�l��Y�<V]�L,�"��0��{�,+ݥ��:\�j%���]`�8�y[f4�J蟉R���1�5���V��2�أ�e�`!o��b3?��P�EHheXZ܈�����b<��DWﮮ��
��l�-ys��i��"c5Q�2�qgcQ��:D|�m�KS6�����ցc,-�1��h@ەv!t��{����^d�"��O��1���q�Q�`y6-z��	>x��R)�_�S'ܨO���0�x'h���>��1׀o�r&rIdB̝1��y�s)�0�e�ɐpX�C��Y��ɪra�"�fhP�x��������W��
�������Ƥ'l����]\~��я��8��c���;J@o��3��n�h�0���V*Tʾ��^��	��k�0�j�����'6=�b�l{d��r�j��O�!?D��w�	�u�O���p[��������s��Ե�4^����ǈ`���d��E�xd"��&r0	o��
6�	���S��FYm�dg��t	uO���x`pIf�����
^��N��V���#��Y{�}͡6�P������n��#M�Cu��6����]���lV1}�n~��Y.Z%�#�Z߷D��\�2�H��km�{p7���%�C�C�=���Jw�}y�-��O�1�ido�e���l��d�uGP|,���]S=���p̩Ckj�t�
�Qp$��ڤ�ؕf����zG�{�P��:9j<��8
����u�%�r Df�<�`�`�Īr�xA�\Z�{��L��!�m�w����Ӭh��]ٜ��K�E�@�t��7�O&�MD{�
�a���I ):y�Z��ώ��M!�(>"+��3F>j����: Τ0�+�L���d��(��:�N(�@���B8�`o^�;��NI�bS#�����r�zQ�QOj��I�C
Ρ"ȑ��_x��  x����PNG

   
Q2��220�Tfxs����q >��`� �l���,b����/��W@n�'Ȇ� @ ��N�x�pi��@���gxw��m��! ��n@ �-p9��	�� ��̂�r&�h��?�?� ������$�j�/t� 7d����?^�w��_R�PH���5�jrL���4��=����+�� ���#��N}xs�G�f[yEk�c@�0 �a��R�Uΐ����/����V� ����6�z0��~F���ۻƝ85�=�qp� ��@j%�ŧ���
��PW���x#f.@ k����o�"[ @�Tn�` �  �xk]N��'    IEND�B`�ե�fF

   
OiCCPPhotoshop ICC profile  xڝSgTS�=���BK���KoR RB���&*!	J�!��Q�EEȠ�����Q,�
��!���������{�kּ������>�����H3Q5��B�������.@�
$p �d!s�# �~<<+"�� x� �M��0���B�\���t�8K� @z�B� @F���&S � `�cb� P- `'�� ����{ [�!��  e�D h; ��V�E X0 fK�9 �- 0IWfH �� ���  0Q��) { `�##x �� F�W<�+��*  x��<�$9E�[-qWW.(�I+6aa�@.�y�2�4���  ������x����6��_-��"bb���ϫp@  �t~��,/��;�m��%�h^�u��f�@� ���W�p�~<<E���������J�B[a�W}�g�_�W�l�~<�����$�2]�G�����L�ϒ	�b��G�����"�Ib�X*�Qq�D���2�"�B�)�%��d��,�>�5 �j>{�-�]c�K'Xt���  �o��(�h���w��?�G�% �fI�q  ^D$.Tʳ?�  D��*�A��,�����`6�B$��BB
d�r`)��B(�Ͱ*`/�@4�Qh��p.�U�=p�a��(��	A�a!ڈb�X#����!�H�$ ɈQ"K�5H1R�T UH�=r9�\F��;� 2����G1���Q=��C��7�F��dt1�����r�=�6��Ыhڏ>C�0��3�l0.��B�8,	�c˱"����V����cϱw�E�	6wB aAHXLXN�H� $4�	7	�Q�'"��K�&���b21�XH,#��/{�C�7$�C2'��I��T��F�nR#�,��4H#���dk�9�, +ȅ����3��!�[
�b@q��S�(R�jJ��4�e�2AU��Rݨ�T5�ZB���R�Q��4u�9̓IK�����hh�i��t�ݕN��W���G���w
�J�&�*/T����ުU�U�T��^S}�FU3S�	Ԗ�U��P�SSg�;���g�oT?�~Y��Y�L�OC�Q��_�� c�x,!k
�M=:��.�k���Dw�n��^��Lo��y���}/�T�m���GX�$��<�5qo</���QC]�@C�a�a�ᄑ��<��F�F�i�\�$�m�mƣ&&!&KM�M�RM��)�;L;L���͢�֙5�=1�2��כ߷`ZxZ,����eI��Z�Yn�Z9Y�XUZ]�F���%ֻ�����N�N���gð�ɶ�����ۮ�m�}agbg�Ů��}�}��=
y��g"/�6ш�C\*N�H*Mz�쑼5y$�3�,幄'���L
�B��TZ(�*�geWf�͉�9���+��̳�ې7�����ᒶ��KW-X潬j9�<qy�
�+�V�<���*m�O��W��~�&zMk�^�ʂ��k�U
�}����]OX/Yߵa���>������(�x��oʿ�ܔ���Ĺd�f�f���-�[����n
"
%�0|	"2�R`�%�u(
�L(s�Rb]\��2L[�=�f��<�"B���m��q�j���'�%�L�l�[�M�g�fe߭=B#�U�ҳ��.���4i��L�/$[N>�c���,��IO���o���b�AJD���T��z�o��������k��gѽ����z�������^�x?A��R#��[(��X/re����7�)��P���k��G�Xu��a�	��`��0��ىs�L���9��8(M�/�*�Vp��}�K�q}Bʴ99@o���<��1Ό�">�C�6:�3&��Β�f�����]�K��yg�ꝇTg��K��Gi���rr�U��eS����ÝD�G�ҠC��M����X�x��98���#"LNOȗ�_ED�ıD����@J�d*>%"��9���~�6,�8�X�'Xe�w( ��F C!~P�w�j^Tk4R�
 �Z�V$֎��W`+�j����*e$L2H�\2KgJ8�C| Z����M [�sm^Ə�1SSP��z�Ze�UH~��Zp-V��? v�40�    IEND�B`�ZaHF�  x�}W�W���~�� !AAH�vZP("�I0"�R�$�"��Ab¦ P���AŖ*�mQ)��/"U�(��ʒ�������;�̜3w�<w�ϽH
#�iX@�_���S=����v�M��4w�����'_Uy:������D�*����5>���#2�UnH��aLUw���眼h��8����?E��c'&[��]�J
MbS�7����9P�<4�	f`gߛ�p���s�;y�8Z&�B�ػ�2�h�u����͡D�W�*�*��.�EC�*g�E��<R�\����Z	Y�FVhuR��$zM*�:2%%ak�?]�����>��ѧeҾ�$t��PøF��4�ύ5�U���"���o���ɠ	
"��ר�	���Q�*O���s��4ˑ����=m�m������L���G~I�|��Ɋ�S��!} ��v�r��$�y���
�A�]�ٞ+_\Y
�U�8�y�a*��G�_����5�^:J��_�oHӡR�9>�O}��1�3�o���&�ICl����&H%7�AbV�}�0K��V�aS�7x��Ѧ4����4���n��td��@ɥ���b7�kҷ�O�ۂM@O���5�� 
f�h�X"�0O��l�%�kH.�eI�~<���a�.@����X��Q�ԃ\�@4���I��{���|�n�>J�F \ԫ�H5k����35��Y�s���so²�Xs�.{W/���w�2>��э~[��fg�V3Yu'MF�Z���_�����\�I���Ƞ���,L]�(g�*�����C�Q�(�9�����r'��=ƐY�z��P�J#@����հbh���b��<4"�&�`��T*|y8� �ffxC���%��f�-ڈ��;ܼw���*���˾�̧Nj�E��GrWu��/r?��X�g��g��o���>��sfA��rg2������
Hjˆ���0��� t�w�e>��Gɢ��سn[܄�k��y7-��:������s��Oc"�o�gЇ���
J E�����(��ɎC�L���ê�������o��<�!Ν|��.#/���if`M-9,2]	�1�؀�-<����L:�B������Zj�9���|Z�{�2B��Fe�-.IUV ��{�hmLܼdkפa�մ@���9Ȼ�+�����hhT��Z��x���]I��.�<�k��T�!�!|�����쯋Z��^
�[A�������±]y�+T�]��jAhe����(��"ӷO�?1���{��K��W�=�eީ���.� o��o$5(�7S�	ue��Y��ʘE��/sH�&X�Z�_��;.��^
��&2��=��a�ړ�#�<[�P�2aH��8F�95?g�2?\{�f9K[B9��I}��A>��06�oڽ�~�}d��*d`��R]�D�r��)�0��Z���߯n�����}��2�

   
���D:��󼞪��Ե�\.7�J����%
QQQ�)%B��&!B"�����d2�a#�,�һ���4�H$����<�/�E�U����~�R�� % J����z���|``�pe6|@&������4�@AII	J)�Rx���>��R
۶q۶������޽k���öm������`~~�qPJa�&�mS(���E)uxm<�[YZZ�4M
��eQ(|�u]\��m�ib�eaY������r-@J��d2d�Y� ��c�/E@>��Ų,�`gg�����M�"�iڷ���=���h���M��>!��W������lmm-�7M�oRʭ����>~�(������e�_�|>���333���:��@��UẮ&�X�����ܔ����������>??g{{���i^�~� y�K����u� bB�gRʞ����Ecc# �z���/_,O��g��=� ?���$�/�@�2D���eCO�#����m@��^6�����$n��>'�t����0��/˖�˧7�MMM)]��8�KH1+3�NۉD¾k�U�1�� !��/������Ԏ�^7    IEND�B`�vO-   x�s�t��Ldd`dh``���?��OF Š"@2LL.�� Ȫ�x  x�m��PNG

   
OiCCPPhotoshop ICC profile  xڝSgTS�=���BK���KoR RB���&*!	J�!��Q�EEȠ�����Q,�
��!���������{�kּ������>�����H3Q5��B�������.@�
$p �d!s�# �~<<+"�� x� �M��0���B�\���t�8K� @z�B� @F���&S � `�cb� P- `'�� ����{ [�!��  e�D h; ��V�E X0 fK�9 �- 0IWfH �� ���  0Q��) { `�##x �� F�W<�+��*  x��<�$9E�[-qWW.(�I+6aa�@.�y�2�4���  ������x����6��_-��"bb���ϫp@  �t~��,/��;�m��%�h^�u��f�@� ���W�p�~<<E���������J�B[a�W}�g�_�W�l�~<�����$�2]�G�����L�ϒ	�b��G�����"�Ib�X*�Qq�D���2�"�B�)�%��d��,�>�5 �j>{�-�]c�K'Xt���  �o��(�h���w��?�G�% �fI�q  ^D$.Tʳ?�  D��*�A��,�����`6�B$��BB
d�r`)��B(�Ͱ*`/�@4�Qh��p.�U�=p�a��(��	A�a!ڈb�X#����!�H�$ ɈQ"K�5H1R�T UH�=r9�\F��;� 2����G1���Q=��C��7�F��dt1�����r�=�6��Ыhڏ>C�0��3�l0.��B�8,	�c˱"����V����cϱw�E�	6wB aAHXLXN�H� $4�	7	�Q�'"��K�&���b21�XH,#��/{�C�7$�C2'��I��T��F�nR#�,��4H#���dk�9�, +ȅ����3��!�[
�b@q��S�(R�jJ��4�e�2AU��Rݨ�T5�ZB���R�Q��4u�9̓IK�����hh�i��t�ݕN��W���G���w
�J�&�*/T����ުU�U�T��^S}�FU3S�	Ԗ�U��P�SSg�;���g�oT?�~Y��Y�L�OC�Q��_�� c�x,!k
�M=:��.�k���Dw�n��^��Lo��y���}/�T�m���GX�$��<�5qo</���QC]�@C�a�a�ᄑ��<��F�F�i�\�$�m�mƣ&&!&KM�M�RM��)�;L;L���͢�֙5�=1�2��כ߷`ZxZ,����eI��Z�Yn�Z9Y�XUZ]�F���%ֻ�����N�N���gð�ɶ�����ۮ�m�}agbg�Ů��}�}��=
y��g"/�6ш�C\*N�H*Mz�쑼5y$�3�,幄'���L
�B��TZ(�*�geWf�͉�9���+��̳�ې7�����ᒶ��KW-X潬j9�<qy�
�+�V�<���*m�O��W��~�&zMk�^�ʂ��k�U
�}����]OX/Yߵa���>������(�x��oʿ�ܔ���Ĺd�f�f���-�[����n
e�Ch���dX��\������,^,����%Fo�c4sj�&�&��Mq�b��X����~ڞכCR�
@��NZOC�s��[��:��:�fW ��lmY�uu��C\*�8�U7Z�lB�N��(�ܹ������6����hn>��j�ՑEBR�y�%��P( <*��p:q}�:�IOjGԀHe� 6�m׵��^1;=!:�_O�m��>q\8+�?yO�~��1e��ƏO}h|�y_�"
ֿ�ט3��h�0e?��]�ɲ���h��Ç��� 
��^�h2V��,)Fs-�\���_�7r��v2�������ݮ7^t��j���g��
Y(UD���Q ���'����;�ٙ��~����:���Ъ���R}mMI$~ivv�J��)�H�����NGyi�ff��w���3_gܺ�WIcc�*/7�h$@����nw����yӻ�&��<O���O��,�ձ��~�9��7������:�)-�����R����0�,�,��Q�����jp�p(�ݥ��B��PRRFnn=�]Y�P��M�+e����	(������`������&�E�$U��
 ��?��t	2��}����$ɧu�mYGy�D�
  x�}VgXS���M %!� 80��HIi"�%���(���APP�0(��(�e�%`� ��0�(M5	)�E���~����q������ge�o�׳� @��o�6R�-F��@*�� �������|ݙ�m3 �� t ��G Qwq�
_��$�2��V�-����W��\�������11{k�o�	�s!�6��
=��"�1��TɧP�� �,p'�ʛ����z���-V_}'=uLn90�;����p�f��.�t`�u��<�����!�_3紕������O��j��ŋ�)Uɓ7&�pau�B5���[�1!�;��e��P�J�}*�o�.�|4U1�T���D|�������3^Y��|��0o���e-7�$��&��"�$�^���%��f�l�/��Y<�+���e��M��揾IN娐���r�AT�
|�#m�YKaX���[�Bᢉd��>��.���I�r�<~�blQb]�������T���ڝ�8�p�����X�Qt�NvM{6����ٳ��N�o��I�u�NT��E��ow��^��}�O��3O��<)��}|v|���g�'����?�
G�!"�-E�'�jl�B�p��*�1 H���}Ε<�o���O��H��b��A�Ӯv$C{)�������x.��NN�>���U�t�8'a��B���κ.�u7�������Y�wT����ќ��=%�o���K�:Ӵ��j�0�f��L�h��t>|d��Vi�f�'�<�~�KR-�^Ϲ4��h���s� ��/�p��筣nav�03���A�����X�c�|�
��%l&�</]������m��LT-���:ꬡ��9ۗ��qx0�$�3�h��DU�҆F�L +|���������UB�bI�<��<��y��]�+@;~�F�	����g� �Q�t�yA��S$cT��_Q�1������,R���,ŗ���e�?��鹇�v�?>y�s�f���Zn@��E���8,[%OO??��^����l��Wz�
��RU�޹�~��>��虡Wl��$��5��Qb.�S��p����V�<��� �L7[ɮDݲc�\B�ٍ܈i"۱�0�O}�
���6q�۝��R�h�+Rt���3X֭������0�dTH��(-<��K�~��r�^��αAX�Eâ����۫wc���c�Vd�|��>ь ���y�vO7�$(ȕVX�$|�˙]��
��G�¨Q�N�'>��w���l��?ro��lXaj��@1�xPM��F�30� �;[ 0c=�w�јB�
j*�����s�}�=��s�y���~����6��ؙ  `�i��������F8�z��r�>ı�� ��|�zG�~O����V 8�
 0 �}����! �- |B�?�o��ڦ��]����Y�0�� ��wY�׏ל��@�z3��r+̜9���Q�ǒ�8�烑Uַw�\5?|-����3c����ֻ�o^��S��	��3�nGȶ؛Ѽ'�w�@B�k�d��Y�Й:�Q�D�������Kf�?09�@�aޝ�4��/���1{��Y�fL+�����N��4�/d�����<{	�֒D�s6�@��KLC̏�9^�L���H&
a�3L��d��ő1����>N��ZȔ�"8��J����anר�G�6b` ���'ib�Q�(��H�"�=?H���A)���-��(,-)۠�Z�+f�9�!H�H5���Hu��U��kGU�����w[�" ��Z��J\�DFƪf�=鞊p��*�h�hq�X��.i��볕s_�]��}x��V+S!j"�ѩT
#'y���NS\�rr���A2��Ҕod�j}�X��|�+^�d�E���ٛ=h�s���nJv�pv�����K��eP�U}+��D_=�x�r�ɣ�_��)d	�F M���S�Ws�b$�U������7����
��F'kn3b"�5/�cq��IB^i��j�V��,���N�ZF��U`XWWە�&���E��}v�ް��@ܣD�
��|�K�_<S^.�6[���"�1Ee8Cw�h-o��R��8���� �f5�ف�����7:޾�g��E�w�,���W��-�Ur������f���z*ź�Z݆���g/c
e*&��B���v�����7.�@�S�^��S���"0?�aI
\Q����|XY��4)���!�`{I^��辽2v��؂b���
ސ��3[�պB�
5M=����&H�\�V���\5��2�DX戄��~О���o�-P�x�SX���C���mt��7Jv�1U��b�P����i�V�:y�I<�"���(U��<����|N'fe�E�9��
�L 8�iPG��u]8��1
G;�- �jE$*2"n~~̾���_e�GlJ�\�f+u�&#��aL��r׫Cx��e]��>����w@	�Z��#SB�G'kgVSb��/p�
�d	`��� �+�#
�/��¥{{ki{I
�{�)Ď%�D��y���MD�+���_v�#���/}�����Q�N3���o��x��r@��	�5A^\���R=2yvº>R2�����o��uK�WZ�˻��� '���TJ�#x�{ܔ�{fƏ��E����Y�H�CrX!�]j�i�nl���-�%I'v��O�-�_kZȋ�[E�����5��_]�g�e��S��|�ĭ�*�vwcޝ�$���c�e��ŲJ=�vj�1�]��u�i�3X6�k�Sɽz��,�趭�Y9�]�[�318��ζ<����51�	�b���;�C�t�|�p[��*3ܲu|�a>m����Ot��AΖ�	Ecm��	{�"qx�51�G�ƪ��{��,�^=�׮r�{z���Lu�d�){��I�`��ڻ�'o��+�oj�4�=WNH
q�B;3�������G�&��ϕ�a��jZ0����L��Z`˅>q���-4��=4��r0�fv��;a1��:�����2��1pM=�N_}+E�D��d���d�Z�����
��UF�p�NB1�P�KUNNR�?�grC���޻�����L�vXg��x\���G��\6�N��)!�C�������v�����ܸ�\��Q�rm�.���Κ��BX� �)M�G
NH��Ó}�J�!��'�u3��=�{����.�|��ۦ��;$G�j�o���Ȑ���'\UK�q	rWH<`b-rѩߟ��Y�w�'ѳ�Ϟ�ӟO�V;H.�t��4�f[��ƎD3���:}��q�IwhLDݩ)g��O�+��[����7�@����WY1�j5x�H�/YG�@�sԈy�������왳x�> 
,�է��g�ލ��2o6cy�YN_���c
74 9�5Y�4����Ɨ�n�vX�R��ެ���]ǭj7��=���X
�c.�k�֧Ϛ�p�a\\��I���v�4�X���q���ARerd1���`<�P�ޘ�,o���3�Z����M��x�u0m�ɇ��P��/9��UY"�c(�4�L�2�]��T���vnCLD�wM+�?@���\�ҤԴ��VAAg�^��m��s8�}_����n�H��d���dEo�=3����vm���ׄ�1z.~>���Գ_�!�����h%�%��|���}��n_�r������Akܩm����C�>.v�$�����������F����!��.��L[����!r"ЅT|ZAlHϘ��������ߓnf����,�0��G�������ss��� <��0\�e�y�}&X^�
N�6� ����[�v@���3zK'F\���>�?�#�-�tj-��@�X.Y+5�������6]�nT��7��'2�V=��`9;�K��C�Ү�>g�x�y��P�c�z�9Ҩ�:��/�|?��E�����p:�CQ �׭�3�}?R&s�y�e܊�J./�Q�`q���p���E��E߯o:����ӵ��up��WD�^ư����P�T`�Oc��1vw
�7'�+���RRZܮmhH;%�|�� ��°7����4����k���G��"A���)`���ޢ|R_D=1��@/n4lcc�û� _�1-0�k�Զ���1�\!��nG��D�,�^�����+�j�D�� �����dR��1�_)��v02�j����}����8��l�����T���� !���9(CA�ݬu{����
�I�yd����ؽ���d��'�����"\׮phʾ����j�Ù��pIN�RE3?Q!�Z�g[GZF�&����_�J�K���-]~�Gz�4N�+-�~�Q�e���gh�J�ܮ�pzR_&*tk��)��-_����:��%NPL�Q�k� �:~��s�҄qu�֘h�iP��Cf~
{��"Q���eӝ��1�,Sh��N�ݻ"mdL����.$w} �Y��{�ibG��ó;�+�c���7Ɛw�o+}��	q%��=��8-��̳��*8�'i��k�"A� ;����	�D'��Ҭ;��
[`y!���X���馐��DS�oS�nR��IE��yyU/�����gf�K��c1��&���v۸���׷WR�}�gď���P�wx
{�9�G�����-E��c����&͇�O�6s�/�Z�v�@AV1Eő��U��DR� ��
A�*����jQ��\����j���y�%G��-��$Ĺ#���P�2,�'��G�C��d�%�BO��{�����Y�C��38wvo���0/�T� ,�W��e�.��k���g쁗�@��$Q�A�����L�rb �!��8������=`n�#;/��/upV9�({��M�Q�.��O�3:`��� �8F.q�a�ɕbʱ�Dx͔zVbu�D��7�/�".����WK.W`�~0�>�c$�@��^^�+(H�k�<D�~������P�׸�K%��oczç�5+��4y7 >���=`0������� ��[y�27���b���n)#.]���+�m��O0��)�t��)s��f"ԁ�
#���J ����;v�Įs��]]N��)��)�O����0/� V>x�<�2�=f��g�6�Gʘ��{����f�k>�F��|��]��o��������療�MO�	l�$��������z�E�s��H�P[k;[
��Q�:~� KS��ۊ�U�,���+(�Q�ڳ�:W�|��٩#��@�D	�y
�D�}����]�¢�*�SM7n̿��{�19
�V��c�6��K����L������k��v�w�ۧlb�^Ld��+b����pU��g�������H����¹`��2Ă@<W77>3�_F@�W��I�I��0���m��ȸ��c�w0����q�[W%"�ڿ�S������q�=99I��^2֮�c��I�ѣ����VVUO�QҤiԻ+�,E��������Z<9T�7���/p*��?*&��4e��zOW���Cs|;26�~�y�l�e���l���n�7�$��d���
�����	x���KY��(���}qy� ����=�[{��U(0zC�X ��Xe	��������f�.�)4}�����״{7;����Q&�
�G�k�)}d�N��i9A��x^�̒X5@߮��9V,�=��uu�q$�\	ӗ_��;%I��� ��:r,�6�;�;�P�i�-����dtHs���~ܠ	�QԖ�c�RWWŜ������l�����1��|�Bv)�������!�aXA�|��*.��"m���R��i����EypbCr��<v��f}d�[����%���!����P�-:::��$YZ]]
���9��nZ��R�rK���'uh��*>hEW��}�ݴ'�	AT'�wm�
ը|�w�S�#����`��s���:iIk3_9����N@�#-�����!���1s&����i�]ܥw�5�9��L��%Y�zJQ�>r�7ww�sP׮!x�E�Q���9{\�T�a��q��>�'��T�E��[�1�[���s�0�C7e�8(���C�t䠟8�0�'<y�DƪV��_�)�?F��3�X? K*���oB�Ұ{8��+ߚDOMM5���Y����=��v�����}���A����fz�h.	����ycl���q2�����EFY~���oH>�8.�V&{wo:f�%�"}K����}��������u7��A�h��S1_7m�I����lo__���}&�	������B�<H��m,9W`a�T��=G�C6XF?��Em�����@��0㛾<�K���-f�5@�L��l�ܳ ��RR��;��|?NZ/#�}�q4"�77�G�
�ԗ~���Yrt3=��Pt#��oq��jB�((g�J/�_M}��[A�WksA�(��<n{��t���h �䡆���+������!���?�N�  x��1��PNG

   
OiCCPPhotoshop ICC profile  xڝSgTS�=���BK���KoR RB���&*!	J�!��Q�EEȠ�����Q,�
��!���������{�kּ������>�����H3Q5��B�������.@�
$p �d!s�# �~<<+"�� x� �M��0���B�\���t�8K� @z�B� @F���&S � `�cb� P- `'�� ����{ [�!��  e�D h; ��V�E X0 fK�9 �- 0IWfH �� ���  0Q��) { `�##x �� F�W<�+��*  x��<�$9E�[-qWW.(�I+6aa�@.�y�2�4���  ������x����6��_-��"bb���ϫp@  �t~��,/��;�m��%�h^�u��f�@� ���W�p�~<<E���������J�B[a�W}�g�_�W�l�~<�����$�2]�G�����L�ϒ	�b��G�����"�Ib�X*�Qq�D���2�"�B�)�%��d��,�>�5 �j>{�-�]c�K'Xt���  �o��(�h���w��?�G�% �fI�q  ^D$.Tʳ?�  D��*�A��,�����`6�B$��BB
d�r`)��B(�Ͱ*`/�@4�Qh��p.�U�=p�a��(��	A�a!ڈb�X#����!�H�$ ɈQ"K�5H1R�T UH�=r9�\F��;� 2����G1���Q=��C��7�F��dt1�����r�=�6��Ыhڏ>C�0��3�l0.��B�8,	�c˱"����V����cϱw�E�	6wB aAHXLXN�H� $4�	7	�Q�'"��K�&���b21�XH,#��/{�C�7$�C2'��I��T��F�nR#�,��4H#���dk�9�, +ȅ����3��!�[
�b@q��S�(R�jJ��4�e�2AU��Rݨ�T5�ZB���R�Q��4u�9̓IK�����hh�i��t�ݕN��W���G���w
�J�&�*/T����ުU�U�T��^S}�FU3S�	Ԗ�U��P�SSg�;���g�oT?�~Y��Y�L�OC�Q��_�� c�x,!k
�M=:��.�k���Dw�n��^��Lo��y���}/�T�m���GX�$��<�5qo</���QC]�@C�a�a�ᄑ��<��F�F�i�\�$�m�mƣ&&!&KM�M�RM��)�;L;L���͢�֙5�=1�2��כ߷`ZxZ,����eI��Z�Yn�Z9Y�XUZ]�F���%ֻ�����N�N���gð�ɶ�����ۮ�m�}agbg�Ů��}�}��=
y��g"/�6ш�C\*N�H*Mz�쑼5y$�3�,幄'���L
�B��TZ(�*�geWf�͉�9���+��̳�ې7�����ᒶ��KW-X潬j9�<qy�
�+�V�<���*m�O��W��~�&zMk�^�ʂ��k�U
�}����]OX/Yߵa���>������(�x��oʿ�ܔ���Ĺd�f�f���-�[����n
_/%���dˀE���Ōh�XfڻL��~4	6����PX��1wSgN&�$��ɵ?�ɬ�h��k���2�NF:7u�Gw̜;���7����J���<ZN��ԑ_p���1#��!�=_��I
DLJ�^��~Zᬊe�_���i _��v����'a;�cF��$[&Xf
˔X��4%�)�^��8+7���+�L�m��M�e�mM�-�e��;���Pɬ�ȁm������>��E��<w@r��:n�$��C*�B��VX�ԧ�T&�0+R�zk��#�f舢�qj�@Q��
x@.�:��	e����2H86G�ځ�L��Q@il�
!���il�]^RVy(�\�2%͇���-)���~���k?}�Ї�W:S
"\�xf-PX�j�'�<�_� M�8rhw�J!DY��\������a��Ǒ�]���
�I	p~ �E2��MB 8��q�M����\=w���Y���J\��QOJ�f��j(E2����¼�
#�%[S�>U�(���.�������T����T���U�� 4*`V�W pѱ�Q5�[U���_�߻հ���fP�KVG�ࠦQ4�&<* ?��i��꿋���Ao�_ܹqv?����t���	4
`����>f��ˈ���g���m:Qҟ�����P�d�b$�G��D/[��(B�UQNo,;�A���y�;�Hpe�,�w��?8|��cZu��~:=G��%�9�*[JA�kd�ϖ;"ΌWzz:�s6<:���޽I��^K�l�g{vV�v�
�kYCغ�Kp��E`%��.�3������f�����O`�^g��֓�KWi�w�ן��79[ =|��vz��QQ��D���
�n$e
�Y�lw]~�`>v�;3 P��X �w����M�����+���$+ ���o������ZUZzn/�Ũ��/���1��T��cU�)�">�r!g��+���5�n���Q9)Ovj&������Һ�p��&6F��6N_���$�EXd����@l����v^ii}kW����~M� �$��U)�G6�ǪK��,�%�2n�D���/���(V_�`~��6t�ӏ�K~J5���ۈ�j�)�\І����WO�Lt[Z���Ɔ�C,���Qu^5Y��+
7��F�T7�3�1؞U��8�.ހ�&�b�7'��$�ಶ`�e
b��@z��#w�+����6�V�����w������§��2���Ē���Y<����v.�N���y'�����W@���k����4�R����h�W�K�QGJ*���*j��z����k���l�l�$<�<��O�a�����3��� H�LUX��G������J_s!��Fu-���°,�;N͌�Ů��Z�=��h����)���)��D-&v�H[f4�$��8f������/��%0��(FE2a�YY�[�����m�-�^�=H �x�2Ro��\M��g��۷%#|�i�N�:݆4�F����%�If����Nm�dNJg#]���cX�0���'/�	��;�Q�y���q���Q����/�N�m���R7�KF��^���ܱ��,KA�N��Ds���qb�|�W7R�l'"�)��䰳Z����F�%nIQlW��{n?|���\׳=g�G�;\���D���:�1%vA=���ҟ\˃!�gzP�`�����<���%���63������.�v���Z��$�nO�v�~^�~��9d'�
 ��<�&HZ:M��@�.�0�k%�<��_DJ߿<�A�繦G�ha�;���� �+]��!��2HP���������T�b�Կ�n��t��hԭ�E��q��$v������:�'��S[q���]�46���KIQH�Zx=>UƗ54u
�]abR�ЁV���:I�v/�M (�՜h�Pܜ��x�����f�������_>tpSb�C���f�b�ן�p���1&��nn%o�.[�i�=2ߑ�k��S�T�ƎS�i�I�Λ4��g�db�����Q��ˡt�������X�P�dMVT��
��V�0C��ø�f	xg}b{�h3_�[2i��޽�77%�X�l�kO��Ќ�RM�H����`N"��/����r��|~���D����͝�b�	�<3j��=��1j���:nX�c��g[��A�}�V���XM�#�]#���������.�b��p�o6頁��S%̡�����k����%�D�rg؊2!(����V.rGJk{;�\9Ãb�O��)F�̩����aǱ5�#E_���0�X�T�CH�#~��p�^O��Og��}� �d����b���ޢ��B���C�>q�(�ôt����s��5����J6>bL���������//(�k����q0���B$(�ˮ��̨���o�f2��(��%���"iZn���Y��_�(����>�Ι�'8��Tzg8��]T/��
k[�m��ɠ��8���%�8�,�?�K�>���
P�;<�9�
z�}$L����,�����4�}:���I�+a^�X_�<=��<�݋�X_\Q�O�	�_�P�'�E���F�œ
�9P0�%��������,�K����ƃ,��T��eRR"z��&�07��/�!u�����
�)t0���eR[0�����:7~�_��ga�C�k�

����Zf�-n���������}�y�9Ͻ���w���S��v`��h ������6?E�>����j�f{�? ں?.��FD4ӏ	 ��,�zN}'����
e#aQBl�!/~v��Hw)�{�^CN��0�J*rS�Y�Wz����mj^�e����}���w��0?Ǆ���-��ڠ
�u�I���3��;�`���R`A��M~=n���'#S����O`:U���'��_�Lɺ&��3��s�錶\��x����/9P	�"
3B��J���7�H�H!�\@>�J��q��� h��#W
|����<
��-i�؟��	�J��z�cQ���4c�;�-��O=��WX�x�B��=�ҕ��1���_�fm�_�\V+W)�t��x�)��C��ۺQ"���ND\�9ώJ��c����ު�3�ԡ�s"g�+�7��ww�;>3m�x�<���E�;F�TObF_P1��~����R���*.
���.��X:�;�'�X���	*����4I�wS��y�Om�5�V�ofҕ��J�� ����&�`��)�f�½u߳Y�Ub���������)lV���w>��^|��l��uY��_D͕�������u4-��|���!u]��K�7��BWa�z<�WhR���i�z���q�flJ�V�����ȣ'��#F���6_�Rd2Dx�ӿ.�#��K������{{������"�E���MSYVQKC�ڵ�(�B�Q���t��;&�����刊�p�h
�k��m����{9��M:�J�����+�j]nS�g�6��p��x�&̡
W���7�M@�T��eDy��9�O�-��ܵ��FFtaB�n��8���l���JU|-˽g�M�O�r
���*�8���U,�Q�'?�U��ٵl5�G5��5��o��`,�%��&�?��f�<�T#�c�9 �C�%;�J J���N�/�e��k"E=�la�];�AR҂�o3zd^�6`���З-���:�K�ڬO��J.��7l[K���+Y���	_.����,�5D�߿_���3[�4ڮ�aaI�t�o�#��NH�,,K�h��t�>��>1y�B*\רI����\�'�__�5�Mi8��@+�9��]�F���2�rq+�>��W�h��#.J�I���k2{�����f�;�^���;O ��8N�Mh�"TҔ�"�N*�d(#���i����d���ϝ�����SpY�Bz^��5<��o��'��G�%j?@Gt_t6�p+MJ��o���X�Jd.�b"��z�yi߼a�ICj���\g>���N&8�i���s�6L����nghfOA�^�C����=&���+*B�RE5bs�D�uG���8O(��*��Cfu
�O$�R>��Jإ�	*��9��e�|��b���y�_�o�\r���?6��)D�
^r\�U�"��a�^Np=�u�H.��~�P��:eR�rχ%N�@����|���RP& Պ���j����&C����te�� R�]Oj�)�:	�(�,��Nދ���^
�>Ȧ���*�=��y�x9��'_g�X����JRxfr��O9��X<��2m/u��<ׄ@���L��w��@�{ϪW3ܷ�.����N���8�8�����9�Y�����܀��j���7Z�犌[Ӈ9�*cL�
���x T5�%(+'*�ь= ��0}u�Eŝ�� RM ���e����
m�0 �( ��_B[�  O���8���&��B"�D)Z�)^2���p��ͯgy( I8�F�)1��	�@D�qa6� �w�K%�:H ��#��C�A=��}�ӁK�a;
���>��"@e}v=�ضm[Bu9��iX�Z�<�	^�5n8���N	��VW�tٞ^2�2&�E%�,Ri���:��(S򰨨%�|.O4z(0�����L��AsKI��L�& ��9�q��q8��hp���(��"���ٳgpllA[�mp|��)">ua��IZ[��#^����E�ܡ�|RB�lg�����9���=�z��{<~��p��=4Ԁ����?R;d�I0��L133���9��
�Ӌ_߯"|y�N�!6�,��G���lmrN#�ݬ"��� F�ᙚ�1��EA���SO�-u��(�oP?\0�w�g�Ϡ��݋v��P�e�S�Pz4� ����������Ҳ��|�[[E��DjpN��O�KC���;�<<��E"ΐB{�G�d1���4655ݮ��	�rhxm9!�����U�/��S��ӛ�0Z���ψ��m�
8N�����Ũ�U-���-��`p��J���@�����F�	(�
���+��ќ�KoE�骬+�q̵r�e���)�5!&�y��ȷ1z��W�rMKK��C�c�A������D�����,�6q�(����N~�Pɽ��݈d����gf2���q���M0v
�ɯA�;k����?qb�"x���V������G|0�Xb�(��u����B�lݩN���%�<tڬ��.��M�w��U6�&c\3��ٟ)b���G�z���=R"[��.��/_���nU�T�3X�MXfR%<�WC���

   
R@(q`�g�����ᕇW~���3���hï�^>~����GnnN~N`�C� }���>+��2��] ��	@,0����P� E���?Y�\=�`�m�[xv!7/7�(�G��f`bf�9���������f���c`\r�!�	 �7��8Y�Y�&�N����������l?���������g`fbf����Eǁ�%
��E�'� E.#@ �l�PP&�s`Rd �(�T��30
A���gQ	Q�`�	y	���1t53X1;;#��ll��d����/ݼts!0	_J?�����8'
� �W@��zN�Y� ��,�a�
PXJ���%���x؜.��X�EA�=Hz�� |E-P�_�o�L�g@P� g�O�b^�5�r�o����  FBu28� �P.g"`2d�T0S?!��*Jx����ц� @ ��9>-R�C��O�>� b�u� � ��Jú�"    IEND�B`���P�	  x��	a��PNG

   
���bΣ���~�7�rA���}/���~ B�����$�!Jv�;'�3۷��+ϣѨ/	����/�m�6*++�u���1����Cʳ!%���W^��m 1�Ƙ_��L��p�� 
 ��i�H�ļ.�ՀN�(O���{�!2n�(
�,#�2�X��3Z�>z��T�d,�T���D�X,F,c�!���'N
��������lذ!3_WW��n��t���3kH��Hp��+�S�*��WI�
9��]LC�&Q�+� �)���e�=@gh �YMM
U��>��v�f����)..��y}}=���!��l�����32O[[ۜ$��0�H���344��z�چ���;��r��i���������TWW����z�������8x:�z�^jjj�x<(�2�+�ԧ����܇!���e�2��|+ 3�].�P(p.����[D�Qz{{���`ݺu;vl6���,�  �K�;��&�����y����n������ʬN����.�[�`SS����y����ٲe������F�Q $ e�4��� ��%�?�v���*�q`JM�bQ.���5@>`U���Y)Y�@�,�I���	�.�Tb�1 ��飈��%}�b*��z?��_�d�d ݟƲ�$�>�vFV�4٧��	����'o���o.��:J,�\�<$4Y���>�+�쓈�)͇�\D.��E|"E�Q}����_����=�#���q���u�����    IEND�B`����F�  x���s���b``���p	� ��$�?�OR,鎾��j~N��=�|�T�~��/J
[ds8�VT�>���JOW?�uN	M ��~W2  x�'��PNG

   
��2���O�s����{��t����ζA`�
����
x��c����n^��yEGڽnq����@�~�5���^.�nX*�_�T>p�O�W�\&!�M@/��3%���}a�N=�h��Œ��R�e����o��M��P~��o�!��űÃ��������h4�^m�?\��i�t�;�[Ӽ�K��d��EY��;>yݲF�W�?��О���7�����?���n���L�T��
BTUE����#!"�9�.�6gf�qPU۶�V���癚��СC�O�����.�Y�G&�d"c�N$ ���j׼�ß��,��4�H8B4��l��3��(�������H)q]���%s"9)%��p�}��y�z��h4&�|j�q���P�y��N /����
��}:����$���@(���a>|�\.7nn�2M)%�R���V�\���F������^��kD�0FȠ���G|�}�����;�^UU��wN ǂ�/u����LX��4�9������a011���lݺ����Ry֨�B,%�(�ҥKyӛ�4/�Zy��T���V��睻���V~�߻&�NS(�F�H)� l%�b�{�F���r�b� "�x<�NNN���i4�E�1����<u���>1/���K�.�7j(�01Av�f���'9k�J�����"��B�4�hϽ;���O���x<���u��"��cYWo���+.�W��m��c����Z��������U| �pΆsGb�L�J�B�^�^�3==M*���X�'��ZH@����P(D(��}�F��Z����}
�vr������x�{���fϞ=8p���N�J"������L�������ghh۶�,�� ��r�N<��Ž�R�%s�2�������0�¯V8~׏�ON �DUU6n�8��
=zt��:��g��"ǎ?�F�4
�14]瑉<-�AEQ	i��ah�p��Wa�4����T�eTU!e�Ұ����c1td�.q�>f��"Ѷ�6�}(�.�6,eT�r�����3�ּ��l��ַw��,��K��${��N��/Ρd�$,�T(DUT��]��QU��e�h
�!ЌY{:M�|�R�*�1{R%�P=W�	�[	YG��U��\.����}���?�S�m׬[�K�R���~�W��BS���ܚ�jh���ϱ=��Z�A�����PTE!Ѱ&�)�-q�DT����Baf*��)��h�Oj�|����
�t��}�����?�l�fݥ>$���
�[��ǥ���u��P������W�f�_�I8���c""BB	eB�����VX�"K�$L���B���(Ioj��B:f��S*MՇUM��t��K}ڮ��y��{h�Ӆ�*�}��ך���B}E.s�>��7w��+���PR�+�$�E�r-

   
7�й�  �IDATx�啽KA����Kp�I�_�GsU �������B����tb!��/0m�,4����ǹ�����Xd�1��I$E^x�f���_3/��&�9,���K��-�h���+��	ع�3mH_�̉Vz���_'�@x���:g��p
���.ϑB��	[?Y����i����0�������>-k��~CEm5�h�v���B�=HZ	��5�Y��+,J(��Q@T��11�9X�����Il/��	Yf`�S�ե�:��e���f_6
����/V�v�=�5��["a�S��7��v�ܦ-��k�`���c�h:@x��"�8�J5���ȗA�kT�3eہ�OB�����FG���8*,����@��7o��:W<��ϲφ���1�n�� "�#�2��	���<������� ��S�c�    IEND�B`�;����  x��I��PNG

   

   
�������@S�i�l�c�A�Z�3E-(R��R�"��V�i,�F�("n�	/!��e#y�}��_�x��܄�	�1u��f��{�=���=���9����8.����y(���/�ꊹ^��^`�L)O�@��-{h&#G� <��� S����̯�5�֧ϽM���ޖ� .i��R�-��5�C+?�g}����|T�f�j�ݔ�ASs;ŅyT��Cp�̓�e���-c]'�&{[���]J&�}���y�5��45�b�ulX� 7M���?��򭯲��س� ���X��ˬ�u�V�
Х%���y���~�^6���E]��B��������x{=�p�ek��~G˽�6 &��o�C@]��ncZ�ؔ����wM����3�>�[8�8f"���Go��hiD?~�777T��4��7#Hv�������P�C��O0�0���y�|�%���Z��G,��V�����i�x�C��d"�p:1�n"�6*۰��Ԉ(�c��J���3�R`s\�E��X[1e�=�i� 0�{Syj��]�-����2�	jO��1?	c(
h*�j�AB��8N���)Z�K�Vb؂�u��7"4�BX@y��w�����.�cX��-�5u5^��[WJP��F5_���ē7`:g���NN4�-��ق'4�#�d�n�Ľ?N�#�a��q�P�D@���8�c���~�\n�0�k�U���m��N� `�W:�)NZ����n���%p��+��b{�w��l�� �>��:f���\}� �T}�C��>�ߪ�\�+S��g4�/�lS�;$sS��_x��F�X4����F̓d��/�G�-g&�!k�t�U#� O�@�qsè��}2��������b�Z���'�G^�K d��EO���z�=�i'��[`�Ld�$�e�e%��<u�Ē�������h��h�
+Ν@bo	��8��mV�5�|7�)�Լ������p��V���4Db��=�7/�I�鰂�P�}M��y�ШYo���&���nr�*N5^H�vk*5ˋ)��t[���n��"���k����s��9e/�T�P�P&ꋀ˦��>m	C��|0͑
�V�O��4��w���f'�9��=n�ӟ �7��oc�@�~���K�.�Pp��!0x4�,U%�Xۃ@8����"�N�����Z� ��<;������Յ|����ꮳM�7B����B�5�aI��5�`�-'�(�y���������1U��?`L�s��s�O}�g���VL�)%6͘E}0�TUI����aZ,p]�4B����ꀉ{�gt�m�6�]-<:�1^:�>U�e�+a�	M�g*MƋi�{����]/�M� ���C�M�߯��{U�`&:v�a�g�(�t��B�3��#_���yp�B4���Sk"��	"T�~��ٍ�g�3�4�<UM[(LNA�B��?N����n�>��)~��&��V��&zm={+��ǟǁC�B����F��3�u���0Z��9������AxfPa"Owtb�MP@�
h�b�hv`6�(�
^����o���{7W���������+L��jK%ڣ�xck�C� s�L���EO~�(��q���cCä�U|NѨ/���O�=̬E�8�Y�P�
  x��{<�����;��i�m!V)c��us(9N�
kr�ʡ��}����V�Q�I�P���M����U�α��_�֏	�o~<���<����|����|�ϩ�-~��z  ��7D+i���ο�g���
bИ�1��vM��	 }% < ������(�
/ؓv�+k��e�܎�#Ę��W f����\��D�f��q�D&y��L��N}��_����Y8�R:1(�?G
s���hpg���;�j/Asb^�:�0wK$$ם�[�s����"G�ObF&��=���m�^jf�r�D&Ւ��jnY����
Àl��!�Q���P.��>�N�nLt�>�'���G>�vy��s��k�I��֝�յ(�����aǨ��q؈��(3�8� ����w�)t�ϭ^�Cr����ak3]b<�5�X�������M���AM�����������>!����ٳg� ����2���G���5�G%p�D�B�6a�:��vs�`OB�iB`` lh�	��M-O:����i���:1G\r�� :�j���%��ϰ����+E�B6�|��x���n�|\kk{���סʖj�s�GD�W������y|��o�~�硡X���G�AAA4��)ѩS�^:��������;&8��ch�����j�?[wh0^�!��|'�j#�1C����>̘u��6Ԧ`{��U�]��Ⱥƕ�����{f���6���� "���b�
���s[ջ���C,()�>��=�o�޽�W�<\Și��f��M�!���3%���5�؀8N5���.�֫u���ns�1��So��q"XI.���s�ݚ�5�(�~��޵�i|b�6��/����������<��G-���~����A�����4�.V��#�
,�z���}����)��>�A�V���Ӆ����w+
&���F��K���4z*w��X�"�h楉!�Rd�&�]5���(q����4'|Τ�lﯴ�w-�ȧ�X��"ԑq�c{�'�'sˢoEt'<%��pg=V�t����U����^f���Q
�'�ͥۖ,���"�]�"b�Z6�&+N�fM�3��	qtň�Qi�аZ�fY)�$w*D����Ώ��y���y���yy��h��  z?� �CU1�VWU��v @�Fb}�  m��.HCGGg�>�`C ###����[��\�l
��p'���D"�D"��4
����˻���"�����|�HĬ�_�j��_���v�=�*x�],�-����x�<X����m���������C�9&����A�nxj`\������)�������S������Ź����e���cCB�JE� f��#mxA��ډ _�;Z�&U"���Q��h&y��������������C��7���|��Cl����*'@�SN�ܡu����>{�Pb��������%i�?_?|M���-굻�L�Ȇ
�<�F���9�`UݜI�V&�5�
���}'�\���Z{u1*��Ė�.%���is��q0��\8W�X�y���*ι�}7Jp�j���NvY�/�Ŗ��Qv�זп��_�@�K"ѷ�~Q�σ�>Z��ԽF�uI�Z
�v��L��wa"*R��򯕧r:���~�w����cC��  x���PNG

   
OiCCPPhotoshop ICC profile  xڝSgTS�=���BK���KoR RB���&*!	J�!��Q�EEȠ�����Q,�
��!���������{�kּ������>�����H3Q5��B�������.@�
$p �d!s�# �~<<+"�� x� �M��0���B�\���t�8K� @z�B� @F���&S � `�cb� P- `'�� ����{ [�!��  e�D h; ��V�E X0 fK�9 �- 0IWfH �� ���  0Q��) { `�##x �� F�W<�+��*  x��<�$9E�[-qWW.(�I+6aa�@.�y�2�4���  ������x����6��_-��"bb���ϫp@  �t~��,/��;�m��%�h^�u��f�@� ���W�p�~<<E���������J�B[a�W}�g�_�W�l�~<�����$�2]�G�����L�ϒ	�b��G�����"�Ib�X*�Qq�D���2�"�B�)�%��d��,�>�5 �j>{�-�]c�K'Xt���  �o��(�h���w��?�G�% �fI�q  ^D$.Tʳ?�  D��*�A��,�����`6�B$��BB
d�r`)��B(�Ͱ*`/�@4�Qh��p.�U�=p�a��(��	A�a!ڈb�X#����!�H�$ ɈQ"K�5H1R�T UH�=r9�\F��;� 2����G1���Q=��C��7�F��dt1�����r�=�6��Ыhڏ>C�0��3�l0.��B�8,	�c˱"����V����cϱw�E�	6wB aAHXLXN�H� $4�	7	�Q�'"��K�&���b21�XH,#��/{�C�7$�C2'��I��T��F�nR#�,��4H#���dk�9�, +ȅ����3��!�[
�b@q��S�(R�jJ��4�e�2AU��Rݨ�T5�ZB���R�Q��4u�9̓IK�����hh�i��t�ݕN��W���G���w
�J�&�*/T����ުU�U�T��^S}�FU3S�	Ԗ�U��P�SSg�;���g�oT?�~Y��Y�L�OC�Q��_�� c�x,!k
�M=:��.�k���Dw�n��^��Lo��y���}/�T�m���GX�$��<�5qo</���QC]�@C�a�a�ᄑ��<��F�F�i�\�$�m�mƣ&&!&KM�M�RM��)�;L;L���͢�֙5�=1�2��כ߷`ZxZ,����eI��Z�Yn�Z9Y�XUZ]�F���%ֻ�����N�N���gð�ɶ�����ۮ�m�}agbg�Ů��}�}��=
y��g"/�6ш�C\*N�H*Mz�쑼5y$�3�,幄'���L
�B��TZ(�*�geWf�͉�9���+��̳�ې7�����ᒶ��KW-X潬j9�<qy�
�+�V�<���*m�O��W��~�&zMk�^�ʂ��k�U
�}����]OX/Yߵa���>������(�x��oʿ�ܔ���Ĺd�f�f���-�[����n
���߻	��P�����	w�zTM̓X���r����aΝ� cc3�.0�v
T<��Xۄ1��T$�iH� j��kk�45�46F���t�������I����Q�E�P��T$�I���x��W�� Ӕ��P
�L^�4��K2<�`����Na���T��KB</�X���y�;xޖh4�u�oE$􄢊Fѷߎ�������#Agg>�����>ֆ��ˁZd�h<;^�7��p!�ʕ��ʵx�s�����[c��u]��}��1ϻ^��	�X���p!X����O#���;�XKUVR������Db׮�����r�J�Y��eߏ{S*��kjз���M�]����b/^I�>�HP�gns3ΪU�>����G��f���A%�������@k(�����{���N���Ũx<��vh��6(k�=������mn �u+��|'�y�������}�HL��䓠��_��*����|>>VDTa�(�a�f7����\�KZ����wq[ZJ�ݺ���O�4���f�^xa��p��Q~x�'lbǕ"�ԒL<<0����!v��(v` �f˃0���V>��c``�l6{�Ľ��ܽ�,	����_����9t�{����`�o[�@�њ��;.N$�$���>-��H&�2%R��>�$ǎ�������R�<��E:��f�^z���Çٿ?~W�FFHA�����C��dj� �\�������*�m��,߿��g����w��3�Lz½��{�� ���Ν��U��3 ���n+! ���l�ɀ�ͺ.��`Ek��$>�1�>��q��DU(E��M����m�\��97�e ���ghll���r�Dt˖�Ӂ�z��9n_������x�Z�f��M�hoG�лc�����@</|!mmm8p �N�	���[��4��%����0���4��&Q�EkM�m���J�8q�r�,��]�L���l�'R���y	�f��-�_Q��;�b1�*�c����xjtt^�'�!om�t��<
c��#����<2�*����壟�$הB}�s;&Ĉ�[K�Zoj�I�U�	>���ɘ�d28�C<'�Q[[K����K�2���s&aD�_d��
�r�J)�sS��u�}�&���y�9BWW�D�;�+WNV��}��x�y�{lN$��2b9�T������3��0
�s9�DJ	H>�&���Kr[ZH��ڴ�9s�]�U�QxթS�ٷ��g�M"��� `���ϧz M6���뒛���.?�Ay�.M���Ǐ��W�%��s#;w�H⚵��>W��,P�H)�\r�*c
.)?��X�ʗ_���fK�?u�"�e��eǏ����իW���孷����NzW��VOD�b�}�Qk�P)o�,���Ok���۷�Y������5ǡ�����~��y�����R���������CGG�Y9<<�NV��Ϲ0B�5:N�NlED�y�W�� Z��X���#���϶m���wT�
|1	����}�c����2�
w�gΰm|�.�e��OHcG��z�;GG�T��XK��q",�O�u]Vy@�����EaT�+Q�V��T(U6�n��E8�f9?������l�FiH��VJ\ "����F�mOC�Z쭸����"����9i�Kv]������ɷ������g�KYKV�[� ��g�G[��o_�8��D�ܦ�u�%w���3��5j��� 0}A����[dy�Z.�y~^�}5�Ի�E��Ӛؔ�ђ�
�~�@4�G#�i=-��oduJ�jMD��Ic��3��6��v68
�CM��׀����1:�����/7�.�E"49�J�T�b�*"�h�M-�!%B�1�4�>k?2*�e

   
�"S��n��J���� �.��� �.}O2i�ɜbpp���UE��U)�J�Ft*������(^_;}� �����zp� ġCo�J�p:��J��40::��� Ǐ_���M}tv��L���9w��1�
�^N����}x<n�����r��;�Y����{�ys�����`˲	����E��^dI"��@�㦩��R���l�� ��WG���R�m�a�H���!ת"jM�k���px �Vv�y�f\.��OGǪ�èj Eq�bE+�ꧥ��ALi�G�N@+j 46�����Ƨ�d*%R��YC&�E���T�`�\%	,�$;�.	>�E
�!�p.�C�

   
OiCCPPhotoshop ICC profile  xڝSgTS�=���BK���KoR RB���&*!	J�!��Q�EEȠ�����Q,�
��!���������{�kּ������>�����H3Q5��B�������.@�
$p �d!s�# �~<<+"�� x� �M��0���B�\���t�8K� @z�B� @F���&S � `�cb� P- `'�� ����{ [�!��  e�D h; ��V�E X0 fK�9 �- 0IWfH �� ���  0Q��) { `�##x �� F�W<�+��*  x��<�$9E�[-qWW.(�I+6aa�@.�y�2�4���  ������x����6��_-��"bb���ϫp@  �t~��,/��;�m��%�h^�u��f�@� ���W�p�~<<E���������J�B[a�W}�g�_�W�l�~<�����$�2]�G�����L�ϒ	�b��G�����"�Ib�X*�Qq�D���2�"�B�)�%��d��,�>�5 �j>{�-�]c�K'Xt���  �o��(�h���w��?�G�% �fI�q  ^D$.Tʳ?�  D��*�A��,�����`6�B$��BB
d�r`)��B(�Ͱ*`/�@4�Qh��p.�U�=p�a��(��	A�a!ڈb�X#����!�H�$ ɈQ"K�5H1R�T UH�=r9�\F��;� 2����G1���Q=��C��7�F��dt1�����r�=�6��Ыhڏ>C�0��3�l0.��B�8,	�c˱"����V����cϱw�E�	6wB aAHXLXN�H� $4�	7	�Q�'"��K�&���b21�XH,#��/{�C�7$�C2'��I��T��F�nR#�,��4H#���dk�9�, +ȅ����3��!�[
�b@q��S�(R�jJ��4�e�2AU��Rݨ�T5�ZB���R�Q��4u�9̓IK�����hh�i��t�ݕN��W���G���w
�J�&�*/T����ުU�U�T��^S}�FU3S�	Ԗ�U��P�SSg�;���g�oT?�~Y��Y�L�OC�Q��_�� c�x,!k
�M=:��.�k���Dw�n��^��Lo��y���}/�T�m���GX�$��<�5qo</���QC]�@C�a�a�ᄑ��<��F�F�i�\�$�m�mƣ&&!&KM�M�RM��)�;L;L���͢�֙5�=1�2��כ߷`ZxZ,����eI��Z�Yn�Z9Y�XUZ]�F���%ֻ�����N�N���gð�ɶ�����ۮ�m�}agbg�Ů��}�}��=
y��g"/�6ш�C\*N�H*Mz�쑼5y$�3�,幄'���L
�B��TZ(�*�geWf�͉�9���+��̳�ې7�����ᒶ��KW-X潬j9�<qy�
�+�V�<���*m�O��W��~�&zMk�^�ʂ��k�U
�}����]OX/Yߵa���>������(�x��oʿ�ܔ���Ĺd�f�f���-�[����n
���̻�Ť&������8���GDXm������3���]�S�!�lp5^��c���H��
����Y/�7��ʀ2�Byl����,�C!����\�uAȟ=c̊TDܠ֊��������(��=QR,��DG��s".F,t���TvWr�� ����PY����r
-?%v)��'��C�
B|\?�Z���[z�ڶ�7V �kT��Z�9|�<?�m�����ӱ�5�k�g'jK˵�-U��p2��1�����j*jC�t���p�LPDH�HH��2��4��U/��V��!#��u�B���d2����� ���^&�&�    IEND�B`�F�B�  x��7�PNG

   
OiCCPPhotoshop ICC profile  xڝSgTS�=���BK���KoR RB���&*!	J�!��Q�EEȠ�����Q,�
��!���������{�kּ������>�����H3Q5��B�������.@�
$p �d!s�# �~<<+"�� x� �M��0���B�\���t�8K� @z�B� @F���&S � `�cb� P- `'�� ����{ [�!��  e�D h; ��V�E X0 fK�9 �- 0IWfH �� ���  0Q��) { `�##x �� F�W<�+��*  x��<�$9E�[-qWW.(�I+6aa�@.�y�2�4���  ������x����6��_-��"bb���ϫp@  �t~��,/��;�m��%�h^�u��f�@� ���W�p�~<<E���������J�B[a�W}�g�_�W�l�~<�����$�2]�G�����L�ϒ	�b��G�����"�Ib�X*�Qq�D���2�"�B�)�%��d��,�>�5 �j>{�-�]c�K'Xt���  �o��(�h���w��?�G�% �fI�q  ^D$.Tʳ?�  D��*�A��,�����`6�B$��BB
d�r`)��B(�Ͱ*`/�@4�Qh��p.�U�=p�a��(��	A�a!ڈb�X#����!�H�$ ɈQ"K�5H1R�T UH�=r9�\F��;� 2����G1���Q=��C��7�F��dt1�����r�=�6��Ыhڏ>C�0��3�l0.��B�8,	�c˱"����V����cϱw�E�	6wB aAHXLXN�H� $4�	7	�Q�'"��K�&���b21�XH,#��/{�C�7$�C2'��I��T��F�nR#�,��4H#���dk�9�, +ȅ����3��!�[
�b@q��S�(R�jJ��4�e�2AU��Rݨ�T5�ZB���R�Q��4u�9̓IK�����hh�i��t�ݕN��W���G���w
�J�&�*/T����ުU�U�T��^S}�FU3S�	Ԗ�U��P�SSg�;���g�oT?�~Y��Y�L�OC�Q��_�� c�x,!k
�M=:��.�k���Dw�n��^��Lo��y���}/�T�m���GX�$��<�5qo</���QC]�@C�a�a�ᄑ��<��F�F�i�\�$�m�mƣ&&!&KM�M�RM��)�;L;L���͢�֙5�=1�2��כ߷`ZxZ,����eI��Z�Yn�Z9Y�XUZ]�F���%ֻ�����N�N���gð�ɶ�����ۮ�m�}agbg�Ů��}�}��=
y��g"/�6ш�C\*N�H*Mz�쑼5y$�3�,幄'���L
�B��TZ(�*�geWf�͉�9���+��̳�ې7�����ᒶ��KW-X潬j9�<qy�
�+�V�<���*m�O��W��~�&zMk�^�ʂ��k�U
�}����]OX/Yߵa���>������(�x��oʿ�ܔ���Ĺd�f�f���-�[����n
p����_�Щ 
i%ט��㎁�m�����	ش}---�� �V?IoI�$!�Kʍ�� U� ~(b&���m���D$b��-B/W�����1��w���F�TKJ�����F�1���d7`�{c]]�H �I�� �'	F��

   
���� �/`�!��N�TqP @��3�����3���_��>���� ��~#�A�߿���?�*> ���@FP���2��>�q
U| @5�Eh�j6e  UG�vZ�t    IEND�B`���r�k$  xڕzy4���{c0��0��1v�eƖl�53�,I���,��mDLR�,�$��XB�I�P����d�2������������{��s^�u�s��$��� @𘽍�?�Opؿ}��>�⋴?y ��' �v)��w�@}�]�k�Θ {7g ��
 d ����K ��e" . ��~=v �bp��?�H$n����I�_�o
�����i �ȎF�����i �R�p�;���!�)��?��"{?&��t�������mYK�GQ�;��f����:���%�;;�]�S��W�p�x��r.b���e0���[����u}�0y�T�-���JI�Ag�*�<QC&6g������n�|�d3�����簾dۛ�ɶ��ɿ����<=����!�O����5}J��������*�ÚQ���hMh�U]{�W^;e�������6)��s�77ָ�������`پM"�|�8)�loC�鯏�0r7v��3�x���K�j|s�[��k��5���T�u��N��$��{�ڒ쌟(�az���s$n?`���#�����}�#��F�݉D\}����Af�o���p/
����x�(��8�r>{ߏ�m�4��Z;a���)}�BC�m���1��*ǔj����L��|ɏ��ۏ˴E��'�J6��0�}�&�(�Շ�x��!�O4�N2�,x�yӸ%���ox^#Z�kfkW�ᾣa	d3��v�{f�V����q��o�wE>,K/�/�K�Z�5H��6�2�� �}E��3x>���SA&�,��P ���5���޷L{AP�*@#������/UBim������*T�ݹ�3����gvH�:��xd/Ui�����<����%������t�r��	�����޼�e��������Ĉ�|zf�k�m�4 Px�������wƩ��l��1��-����C��";�h��a�\�#�����)����da��ܸ�f�0���Ru�fA[@�^d&<J��|�B* �#ς� �g��D��p^ӭ̫T�����(?��N��P��Z���	����$Dz�/G`AAҌӸ<` �"�rr�&�S ����b����e����!=Y�K���g[X��tN5H�FW����#�U��kHȊ�Eg?֤#�?�c�N�&�Y/B\
���5��$b�D�{���E�����Ψ�J(�`/�Fe�	HZ�Ky�M�TўW9�d-�~���VW�"C!�4iaAMR�El���S�c���oK�x����q7xN��C�����L���.�x��l)}��c'�Gö�j#P>H�H����1���y��㏎�������4��ͦ��&h
�B�8톟]�S���u�|1�������|�T�逴�QMf��*0�O��k��S4Ѯ�r���CB�dd�M���T��(M}��T5d���\�6�wg�xsE*����_S$D��v��������uS;?.Y2���-u��� ѿ �b����� HC/@ a����n��N"ڥz�tS�A%��}��Q��`�Y�k�r�3�7d�<k��D���)�y`�.����K����Ts�꨾�n?8\�v^�1VgBP��5��s�iV��ܻ�0�vK�򿽈\�����$9��9-�>}���/}��מ\�X	�<���=H;�N��4�2	�O�;��c��X�-i�EeJE^аEZ�ՃO(�W�ﺳz�1�/�
g�ĝ��6ymr}*Q��m!����f�s�\��Q�t-F�rr>v��xC���gLVNڃ�=-%���Dq�V����t���Z��ǅ�=}4íX����t��(���Ҋ��8�����/����׉B/����8�$�σ���{�.$���n���,�}S�XmB�;1�^��ܔ�uS�
@O�������8y����}�W?*&��წ|>�]�M	��.B�R�O8;#��$>���$��& ���Ç�YH���1�h�;S��:C�$�9���O�	&����2A�(:�

�4�M����Y�}�X��SDuoH���7�s��g".�i����~뗖;�o�Y~�L�{[�+H��B�.��;�31��K��/�$�+��+^��U	�w�6���6x������:= .�.臯ԫ]g݆�׌���a�ǭ'��$��P��g���|]�������_������Eu]!W��9qgyqi.[�[��!����򂞂������ww!:���~��d��A}�m��/��� o��X�TB���[p�8k�y������Q��
=�56��N0��
�	�|�@�0�DTW�	��ރ`8�\% tb���uA�V�"�W>8�8�>��x��X��&_��d>���z�x'��J���kIa��'�&�?L��l
Ĉ��@珱4+�q1<�/S�3�0;�~�T��b肦>��8�-������X�%2-V���1�0��tm��Se��W8\|j�3�G���S��mA^��|���)�A��rh�o�*�_�.N'��Ox_l��iW�%�z�P�
���H�^�E=k�2np|�@������K�_�lP�Κ�G}?%[s��p�Y�G��`�����Z
cs����<� �C�"�a���qP��A�g>�PDL0�{%1�)��j���W�+�W,�����e�ü~&9��R�xu�L�+:����\T��-���k*���
�Q+��sN5,��5hnÃ�4%���G�.�0�������g��zf��>[X�z*F�V6<�%��a׊Wڛ�7+�.����z�B� 9{��E[��?�_�EҜR���Q��`p��ۮ.����.%�c��dՁ K_����-�:���
#|��4½��l�4�
议6"��±Q��j�M��c6�gW���A���W��O�Gh����p��:[�cZp�����(������.�x�u��������e�5Y�D��ƚ!�VV��<_n�V�������L,��h*&}]Zm5s~U:���0P�'�O��!���VIu;&՟�K��:������k�w��4�b�6v�֣��n}褦\�:|�p���cgk���&)�����''�'���m��٭}�#���A�L�X�癮���~�#�S�
���R(�R6*�մh6z�w�h�v�u�<:�m��内�#!�Ҿ>�"����rB����a��!ސm����˼���W�莹��"v.��Cb VK����s��>.�UE�ŧ���������Z�x>Dw���A|��wm���/DpN*��lc��R�l.F�*W�;~��-�?UFa��D�D�&���f���6���dvPE��v���P"���U�5�
�������������6����q�1�V�(�N�R��#2��_H�Æ���$��Oe-*�A����
ET����[���d �?XO�V���Ɲ��xx}��X~�r�QaG<�����1o��U����~� �ם�x��k�T�3�_44r������J�\G}�V,����DE�L��,l�7T��:<K�n]s�y�+*d ޶��ҷ�Q�t��y4\�&Fy5��K��G��z���Ы�[_�����g~k��]j�
���]��+�,���H/����U�$0c ���u��~��ZO"���B��FbX�5XԽ�]��)�iRE�d�2� �L��N���äW��͌���K(<c/m�f^%c7���+M�P�Hjn�6�XL��X2��Հ��I�h�����A��p���U
�1-ku�}+8}�q@�[C@9z�\�����^�Qo�$���us�ad�s�x�]���=�D��{M+ff�
��b�\wXK�5Ǖ�%lb ��i�2�2�ނ\ա�+�6%�d���&��I�s,�������׊�H֎�H���Ͽm�Ԕ�I��=/0���W.2���eR����;E�� �	�������k�Xug ��V������(k|S�,n�K�7��R�(C<��R��f񟅊sf��3�N�aq]�c�%E�(=���<�������JT�4Nه�#�qݓ#&0�L !�&G`��Jy��ͨ?cXȦ����@:D�IW���,"�LE��*�0�.��I6ʠ�.�)�g�OK
�J#�q C�U�|gQ��G��5IK��?�����K��F/��� ���uJP������/��p� #�
�a���H���bw8�J!�&Җ7�q�v��g�X/Ѱg���+�F9O�7��d�8<�����;P�CI��
�H���2�k��׹�<\s�D�9�{	��-j1���2D^j��td#����i���b��Ob�O�
X�}�J�A,'K���$v�!����"8��CU��k
�~PQ���]�Yi��a��4)P�T�Z�sHzlt_pS9�r��N�T�P�jW#���=��ݶ/��
є��A�8Se�H!��(�V%�]�R��u����RY��fn2�C�s#-=��Β�s2
r�r���)���ƻ�FS@2�~�Ha�=���>���	
����3x�[�{s,�9!r$���
��ĹL��O�7��'�t^�Y�}MD@�/0S���s$0Ν�>/7�;���B׭疮��܀�Ӫ{s���~�"
�]�M��p��D�ltg�;׾�*�O_3�:x�]�84LA��qf����7��i�W�n��EU.�ĆB�U��8s�Ӣ�5{�2�\�W�Hz�˪��+$%�mc�	�a��
W|
 �jQd�hA��*�P�]�-����i�43?ȟ'�~
p�h"`4�o�3��-_���@�2u0[@#�%c��~Z��PxO[�p+�Ɔ�ހ��%���͋`)�AW� ��؏E�Xg�F� zO��N�s`�%X3��� �WW;3�_B��Txu����@PU�-q2�[m��_NHß��R�EWӻ6���� ^���D��-�X�N;�vy�W�uf!��Du���WL^Bie��\�[ab�k�W�G�H������|���� AцE҃�&(��_b׷�¬è�p�
�V���V��"tS��]��"��T��0>
<"���A��a�	� K���#�ƾ�߁��|�d� _�*U��f�����K�R�W	V3��'�u�

   
x>S��>N�E�@&��������]T�h�w�v�����8�y��	�: �G @K��&�&��T��t�0975��L��u ,ޏ�-q�|�������x\F�����"�R�3 �RhR|$
�Q$I��F�H ~���K�?*J��աU������.G@����D�]�4��N�!���e�W]Al��p���*����(�*�U^��H��Iv]p�|v��G]���n�5eq����X���| [�KL]?���uu�����.[��4�"��!
`��%b
uJU:R��H�"s+:c<�'�Dc�J����t�#+s%�h�P�'ҒJA��K<B(��W�Gw�i�l%�)a�~f!0ݍ����т�>����~m���v:������r�_1/�_?��lZZ���3�^�|��;i����;r�#�x��*5�cd��k���iJ�lr�-kD�~è�e1<Gŭ��^o�b �(*���B�W
[%4����Iz&�������/�9��.-C���;J9_�^�ƅ��'v����������k���~_��w�������
<"���A��a�	� K���#�ƾ�߁��|�d� _�*U��f�����K�R�W	V3��'�u���tq���������,����+�����gd��l�`pp�d�PKI���x��*a�aPh���$�Xz��;402���+�q���hOW?�uN	M �\8�3  x�(��PNG

   
 ����x�?�k�������_�x�g�d�&�^��J�xY�Z�Ev8QB�?(
�_1ep�K��55A�S��7��"�5����m���%��[���c�$P��`.�]�6�M�$�`hh���矹n��o�\�i�;w
���#��	<M2HgRDQH.Wj-*�ֺ3qՅ� W�L����|���������|�ة�Z-�@�Z7�����_?����7�t6{��,��|? Hh!����geX�.�"{ �Ǆ�.��c��<�i�uW�t���}�M7������������W�*�N�������{�)�@)����V4����-�L/�s�E�M5�d�)�!|�w��������߲��2�T���ۇ��ثC�*� h�����={v�}衏�'��$�TX�P�������ŗ�y�{~:v�}GTH���f��O~��_�q��è�9<��8����K5 �1i�H )�ӗ>���>z�}?���+g�K�,���S�0�3;��r��
�*0,� �@)~��D��7�x��w}��Ǿ�����E
�a��kz�ۙ���+7 M�7o�����߸��.�:z�x���$� ����#IL(�&�(��9�b��?��.i_>�Z��m����7����Z�� �hJ�tu�������^���������ק[e��Ԩ�Zʡ�"�<��G*��iA���B��tvB䀒�2���yuGGkje�X�mp��窐B^}up����K���`�!�h�a��iJtu��ys]-hOE!��h�ОFjE����G�T��
�<���!$���
)J+��H��J�L4Ӓ�J)��شaw�u�8;1��ӧ&_rq�����#G�ZIf��N-���:�9�sTKʅ#��8|�p�w�n�Z��:��PR!�DI���|��QR ��>Å�h���X))JJ�T�~���y=��<��Gf&�ٸ�U/T*�gƝ�Ě� �5��X���R*�49N����J�x��}?@F�b�*�V����>B4RHЈ�����kQ�AH�PR7ޓ���>n�~'/�7un��ڼp! �3c#����'sz2��[��Z��8�����4��7Q�\-��[�3�N �AV�ޒ����p)ź�Jj�R(d���q)� �B
���[���SOj_Z��Y�����f�剱��T���F�s�z�5Wne�Ν��!�,�uV�T�%<�5�����:��5���)��t@*�Bk����6fg�X\^������ͤ���t��
�$��^�r�م,�-��^�t�	}����œ���վ���:RiLdh���쎷�#-w�#�mo�]N�� ����q�u�7���b+ ��s��G[�����~�d2����ܣ�q��q���ۺ�TK~��D*�	VW�i����@[L��gbq��X�J�p{wOow���D���E�+�АN�#��}D�P���������ॗ�p�����G��?��/��w�uѵd�6�ҽ���n��6���(�h�g��3e�;��a|G?l�/����7�v��kR����.������>�P0�P��o�����s`�͇�d3_�ꗙ���^��Lg/���Z:I�Z��&��T$�bk-s�ǫa��B́Z|��`����#GS�誶���'�g�N��"S��ÿ���bx2��u���4
a���Z-"�8k��祎sX,�Z�f�juL�@��]�Q�ԙ�_�I�c
�D�O�R��m=����D��5 �GY������#�ڇ���g�Z$2�4�urˇ�C��o����Z�6PpέTjuJ�:-�׿w�T�REU��,�R��S�����jv�lM4���a��A��5��+V�����w5��xk-�zH��k�����BQ�|����擟�tlhIN�>�*��Z��\^Y�*�+��� ��� 3ι��
�"f����k��
���%�Q֔���H��($FISQ��[�j�ؗ��
YJ%kH��﹮���s���}�y�s2�{vb��h  ��.N��aTb�F�q� �h�S  #��
�HNxc7 �s�W=�n�)G]<w@�6 � X�l�w ��� l�@)�ʑ� �p�Չ��!0��Z~EC#� ��H��,�����m'���h�B(`>�&�*S�����/R%�e���50 �ګah���c�Q|��/gz�:`h�g���	)tp=��=���Q���X����Vo$��d��5>m��� �t�i���d���������"���i#8����G���-h��h�+;\TR�8����|��6K���3�sH;�a;/N����6��ϩ�m�%��a�`�k�-f��/�3�Ͳ%&�G@E��F#8�d��|���D��p�&7T��u�����C�˟��pa�P蚼��Jq�N��J�����J�!+TV��+����mf%9x��ԭd����f�N��sx�e����=�!o�
@Ճ�isb%��g@
ʐ�>���3�A�:��߼��3�����+rx�2Z���^�(��������k��7�44
�q;n%���#(q����/�;�6����Ju�d/"��x�E��:�uu��u+W�Y�֭� �~�*�o0?_Qa5��V�oO�E����!����`!ꩣ��Qtu������s��x�<E�@S	����)�Upkc����<�|i�.`f�;�ir�������y
�KY�vuԐϒd��n	;oF���8ŶF�DX �sS�TW�huaXD�Mǎ�yQo#� �����G�8��?�����L��h��"t���$��ԃt]5xm�<9+ۜm��8�	�ͽ�����v��Cj\����z�+�KR���d�#X4�� Wiuk�ԓU��yڝ9p�r�i�����b��Kt5O����R`+: VV@z��dl5 -=˾�$�}{-� !ѓ�f5�'�W��>I�	dr���C�.�����z8`Q�]�u����d��j(
V�S��&�Ǎ|j�4�G��(��A P���2����5z$c���}���|N_旽8��Vx�ۦ� Џ��8��䂿�o��[1L�+ )�1�h��㢙��O��8�V��U,�����7!������ר>G��h�B��+���Q��9�%##����i~Ik�b2h��M��pyu	�t���:�6r磆����F����d�B�jJ'�7� �<��	�i�o�ˉ�O���uK1�1��/�T
R7�Bg�Md�d,N��%���ףr����s6�@b��- �SR�!@��=G���e�{au����bv�S��m�+��%��q�6�=���� ����Ե=��7�j��~綎�����)f�*�G�k�5��U!�IA�m
7�E��=<`=ѥ?�4Y��n�4=yR����<�����"�+�a����Hѷ;��N��]tْ}�h��n�hY�����b��'�~��1�V�\I��?vF�}xt�r�R�,�j��k�S�^T��63�`���h���K�7s~��s���������]���g��N�6�C�Y�bz)o������Kk�*?��4V6"�&zZ��y2�;�^y�v��	r����;�1(Z�bQ�lݕ�����|���ۮ�G���o��o6��ff6�L�A���!��\i�9�c)nS����k�_��j9��>̓k,���.��v����hA�4)�N�}��#Җ�%t	YN���������uc�ܔ`� 2�>hv�{��)4�E�0f��2�eT��/�����#������k-�5��^��]�	�3�4�f�v�>��+�����O��(N�ߨ/�0Xٍ�ۘ's֤���ƍ~/E3�vU���#I�:lL���=�]SF<�j�YڵBz�~����jW��H`��L;=F �ȼOU��S'I��H����e��T���|����lqH��G����M��Ʉ�%����	u�b�'�5�y�G��K�.��P~��^%ל�̫T���u�e���!X��uEj�V�Ԣ�]M���YD�XF�L@` »�
��,Cw���k�#
ͳG��a��-���С����M8��A}ql!��R�%d+[p�,��ȇn�4���m0f��]����?���x�	�((p�k���s>M'�����[�o���;�)`ջMU)��~�4�G5a9����ubZˠ�^��<M�R"Oe��n�^�X3�=�QIr9��D��~��5�H�3v1�w�=��+^@r��&c��'[$/.s�D!*[1����/�C����A�Z�`����p�v|@[U5U��eN߹�.|W��5OZ/�����&���j����}�Ԉ��m6�R�gCE0b�Ï�I���t(��;�nj����f[��v�b�3�Cgă�z�O���U�t�����k	��j�JkwK��ܼ�)�Ő�%����}z����!#��Ir���G�@<Ԋ"���W�EJ$rgh��l��5���WG����//�-?�d�#<���b4{[�@7�AV�=��������`d�K`����ad�A�ܺ�D0)v��`e��U䭀�M4@��`�s�l$�#�<;od)C�[��W\�xF��B�o��}���kkwwd �U�+��f3l��r���T�iqh�\���W8�wؒ6��R"I�v	 i��tR���K'�v��`~3�+�8y�����Զ�}2�R�vP^�A���t��������{���opE݁��`۪�ae�k���ۏQ%����e\�������<��4~��(���{����W��/%&U��=�Q���I�n䙥Vri��E���Л�`x�>��ؖ4���8Y"�)>�d��⤩��w��&�	�����}��WQJl���iё��JKHT�20�$��<�@+wr����Pf'°p&�� �g� ��u��W(�d��1ԷV�
�8e�YY ��Ry��_�?���Xވ�(.~��ѩ@B\�N��ۻy�Cqd�S��͖���-g2
�jR�_]  $�s��y�Y
�ն��W�q��8�_Z��nñI�O��;E�3�B��ʌČ����������vV������  x��>��PNG

   
!bA�&p�躎�_d�����x<��O\������ޞ����^����f��׵�hXt�<Z[�TScZ��
�M�[�/������x%ϝ;{��ם���_���k���ҋ�k���O�qvW�ٝm�K��v\#T��ܘ�%�!��7��KN�/�߾[�5X�T�?���������?�sW�������]��=g�F.:��E��9]� ���
���?>�i�u۶D~l��q��M���q	}���z.�SE��V*h���H
ô��ͿU7ܼ&�=�3L����-�j-���<�H�#�q?1��S�2���������SO͔J�/ܾf
��ρ�@0����Af�`Ds�y���/�9]<��̝�AP�w۷�s�^��n���wؿo�J�j��&V,�4,�DaH��#}��3
|V��L�d3���Lj�aLG�5BLl������#�K@NG��7�������#��
T+e*�2߸����ɝl|z���
AND����� ��"��#�/-�Ƅ��EGs���{h뜅�لa��9456�J���6��>JM�e��0��0��B��j�!<�RJ&��R�����@�<>��!�a �M�
PR�ޒd�si����G���Q�l��0-�x<A�
q,��k� `���$���=nW^{�Y����V�
���,���0�o~M'�'C�eo;g`���`^G3:t����s��r�m7b���V�h�r�(���0@����A��/0^*۟���<p����хh��,Yr$��Dhq���ՠ3���O:i17��-$
��������v��3�}�o#�T� �zWD���9����c�00v��
���Z�@�׿v�Ҷ������j׼�����X!�O&SM��\���zZ�G8;2���D�F�E*YEϔ���Q)d�fW_��޻OnooOe��������
��bCx���B!�N�G��:��׳��Y����hn�3���c�

   
t�!ł`�6�H�u	��]j[�cK�k�Q�Ȓ��%�)R<��>��hE�m�y�?��y�<|��K��>�����	�G�X�Y�0���! j�x� �t�����@-`��ZKf#��}�� � ��
�^��^z�jiiA�uJ�Apg<� �{
�e�t���3���Փ�F��pi���>+NLjE��2*����@���@�� �_a*3��KC(��믿N�P �a�&���m^�
>\��7� x�����)��N^�v����C�KCli��G��E9��_�����-�3�+🣳���&+����MJ��d��
L��(���l߾]�1M�q��#�H���R>��q�*��[����7��
�p��d=!I�G%?>O���H"�"K�dI���N"�"K�Y~�����O"��X,2??O�Tbdd���Y�!�����];�	<��LO�������G<&!�"A m�
����KC�D�5Bw���먺�a蘦A���C�!+2��)�LMM1;;K&��0�������n��M��s߾95֚�5�+/�� aEF <��q\Vt�Q�?7���&�r��0���2�b�b�����پ�H8���x��ر��G���ݍ�8tvv���æM�ػw�]�=��g��d3�&ҳ�t����m�A�
��=�0��g���Y�	W:�(��:��C��2��g�8����¯��ܼμل.7���h�������^�MM�hin%;�%s��B�7n� ���ijj��&������p�S+����'��.���O~Ee|����	N�C+���15>�{��kt1
Eaqq�L&C"� �N���}'Q���h�:�n��ߛ�v���<n  ��әE�"��a�El��qllS�2T�²L�,�(�����ԅ�X�Ŏ;���Ƕm��8�P���L�d˖-B��u����������L&Ccc#���	\���<<��u�� 溫!a�&�mWE�i��@("�L26��B�/�|
]��u�q�����e������mmm�����rC{���/o���tvt���r_;�B��8�鱖���ض��y��a��������$ID""�K7),9��/��fQU�q�D"������F*�"�V+���H�W#)��Jʎ�ֿ[)�~��g��oMӜj^�D5'4M���q]Q	�BD"���όqsl���6X^^FUU ���PU�b�H<�N�ׯ_����ʒ�.���$�[��ť������?�B��躎m�LOO�8cccl޼�T*��������������tww�y*��r��U����������V>&��u�>�D�+�3��b���~��}�$%Ibpp��~�󘘘�u]������g۶mLMM���l���F�<���;\�eq" VY*��r�)�J�F�.�(�{�O���7?:y�woJ�qò8�� [ӝh�j��������zE�H$BH	aK����E�9��?�� Th����D*�ݯ9n��]#)�{�c�c�����\1�g;�e��}[��E�x�j��d	Q��"�c�X���7�n���z�y�i��|�O�Q&���CĪվ5;�ے�~��{��������W�-%u˱PBa������v\�#���@_\Z�/^�`���'t��Ɨ����W��|Y&V���2�j��	'���=�^H �_�y�;�37�����/�
���<�Ӆ@�-d����K���蹞���s]Ol��
X!� 4YD@dJP��3h�K¢"R�di��G��a	I?�g~Ϗs�s�s����{��� �� H��\
�e�g��Vk�^2Pr9C���`�U����Ǽ�k;���9xd���l�\�����2�z�;�t�V���Vbp��ѓ`)Z��Q��9������ɚ�=ڳ���!��tk;���2�Z���ҭ���j)]rW��E�Ż�gg�xkW�E�À��}31r��X��)�\��e��s~�u�5��;����������v��6�P�0�+�b�R6
�O`�R {��]�&��K|�l�d����P�a�	�D�Uq"�>4�����y� �(-(���o�)"�bNG�f�5Eゥ�!��{���*
ϽT�%�z�G�@'�����c��T7�MF��r=#��S+�1�#e��KDǅ!��F�_1�Ɲ�љ��ʧ�DU�W�LXV��_���S(?)FK���U�K�6��P�PE����Qu|Ss��uߒ�(���yl#^��;�������i:�6��4<���M��ʮ�/�S�p�dW�d��񙯽"׵[��E�5���2�Bp3P��A9�_Օ���k8nS�g��V�rf�0t�`)��й��m{�cݼ�ZLg�[>y5R��jӜ���'�
#�#�Kީ{��
\w�����	�t��}���i��t�k,.�����H�^O@�������r�� ��]{����!Ki�`�5KR	d�7�z?��r�Qg' :z:]~��K�.qzu��Tm3ы��$�b]HÍ�xX�|/<'"$�*�

   
���Ei�*HK#�&��ElJ�Fc�#hL��F��G���(�j)j��-+/AX��](�>fgv޿�����73;3+T��In~�{�����{�=��;�|(��4� ik=�o��|�t�֣H�2�p���i����1����Vb��'�SN�u���,�ߌ�i���(��8������?����//�V ���0��~N�>��.��.���kK����~d�md�]HE )%����"i,)��n^?��$����T��Ⱦm�[���r�8$���P.B^�Kc8n���p%�ٞ���@x�f�9�a�R���Gi�N ���}#���Ԩ�0H[0}�����p��9�.��j7��n`�������Ct�L���GT�F��!\AH�L�X����5b	I�+���q�v�N�A����|�i��!Of�:"��
)s����P_����W�D���irh�6���@�B��Q9�5�����W�/��@���k�Gm!U�DR"�;�g�=cq��=�}Ao�ΟL�AN)��E2��LCc�d/Vt��r	4��m�M<�dh��{��{����7J"�?�V�&��:-����Z}�0ع�N����~o�t����z�_�e�Ps�������W���V��I|vy#į�RNd���&`u�&�|~J�V��)ow>�9t�x,KGAZ,j��Q-�=�ǥa꣗]5�Z��e[A+�>S��]9��_�D?��s�9���*�t�"��M���M��ۋhwk�׵!���R!��[15G�jA�V�����*���|VX_�@΀�܉�UZ:�i�p/��g�8ޕU�N��
�]��ih�=WO�7d}��Ϋ!�OA:RzY��L����摮�>Q�%)��@P�ә��/����O��lZ��k�.�{xhm-���!��ܿ����(��$���g0���݋������t8;W/kA&�)�� ��g�\�����_S��Y� �@�ĳN�
Q�����!�W�W�*ĸV�ڥ����u5�@Řι�&X�,t:��Y�|�$S��38ӓ�����l�Ʋ������.ñ4�%�7�.����|9a�bni�d��e.���W{�WN\����ѧޢ�7�@8U6!�!�ʇװWњ�fbJc�u�� ���W�z_;&�H��\i�̀�k��!"r,p��͜�VQ����E���.%�[+�'-*�F��#1��H:��*�s,��η��*�sb���7:X2�zd�6�UG}����<��h<ͩ7#��wة:�Oƍ�X�q��5d�L�G+�
�,���v.]�c �� ��]��p�#�CD�i�ܕS�_UH+���&���_���NK���i����(,ЉS��T	a�ZF�e0���7J�!.�%���K���L�N�K(���,̹=ܽ$Ȇ�L�sS[i�uk%g֢5`Zrm0I�P��}	:�����Å�l Ϊ���h^&�->�t���g��qx\Z�GJI*-��-�KB<i��?!ʩ7"�||��]���>	� \U�0��j��RV�m���U&s����X̞�gJ�]Ei��x���%Ns�� .S㏝���K�*�@L >E�T��q`3��\�'�>�O�� �m�A�v��8]Y胖����;
l��@Z .E�PVp��Q!�X���[n�0p8�n�����f ��3d#�
��Hdª�FfT��`�* g �jn���-&��s*����'��Q�C6"1`H I� �[�D�:n�O2�۲�W��8��Lx����,��L����2��q>�y��cv 2.���m�3�u�^��5�T��p��)��i�P�c6}�XK�WH8���3Q*��3�ŭ�8W߰���lcF2*���W �6��m�2��h)U8�p����N��[�R��c<
����?-���%�5�������$�o<� ;��"���V    IEND�B`�a�5� 	  x�	���PNG

   
������LNN�L&�k۽���K��w'_��Հ?x� �a �X .!Wl�&
������k֬a˖-���wn� �r,C_
zzz]�}	8�SU#��aFE"���ɬ���l6G�m��'7s�@?�) �>�9�	0̕X�~=���477/ [ͬ���r��f�ؼ�/�����V �~��@sK�@ �����7v?�U�[�_V�fff8w����X���t�5!������K<�� �@;p���t��bt�܂��m�:u�'��{xb���b$	fgg�G���󸵔���_��/~����7j� �H{��?��y�&s5�;;;�������Ϲ��4��s�J̑������<�,|V�dR���2k?��}��Z$=�^������	�U:r#pM_
�C�]z�I_+����.��8�Db�|>O4�Zة����G2�\~&���҄�n`UQhjj�מGGGijjZ��wttxM�r� �*�BR33���8�åK�&�������w�M&�a�ƍ���E����r���Q:::�E#��ui������0z��1���bpp��z���),��ʕ+u��'
	`'�{�9U/����-���*��9���`���^<44D�P �JU�
��L�n.��r�e�֭$�ɁH$2�<sYӴw�c���\B������̳g�b�6�@��l�&�����7ϱgϞ
���I�R�޽�Rb��qz{{���z���*>�}�v��${��a������ �m�.۶m(�ܦM�� �;vT��Z���L����|�B(�N#�`bb��ɨ�7�|se��ɓ 9rD}�!�05M!�@��i�w�qG���Ș922�>����PV����j˲�s�X$.X7M��?N�8���o�=P�O*�Nd�"x�VEw����b�X��6{�a�h���F��UOL	�+�rm*kF��Ʋ,4M�X,�D*��766�ff��*ɨ�(a����"����a�#:�$@Лܗ��4
)�ͫ���λ����J9=99Ʌ��u�UB����L& ��<�䤸�K1�e7w�ʂ�ķ���~p~��W���{5�&k^MhuL'�d�%���L�r�[_�6�y2���\�-H��R���
ᩁ�śXo��}F[���0#/	|�g���j�׻ׯ\u�e��cE���?נ��V@.g    IEND�B`��Sj4�
*R�Յ�J4����ҥ.]�wjB�k5tf��{��a ��z��3�7�K�q1�8;iSy�|�y��绸R��qfb�F5d(���G�<�!�����F��G��nsj��y�`�����/	��ʷ������{|5��)�Lʌ+V`�nbL=��D���N�T^7gT�!5]>^_��mF�kIk��/�AH��|rjp�|��0U�л��`"�, @;����OG��ch4Z���u�7U�:���-�鮲�����Z����)�Z,�����!�^"&U3g��m7�o�bצ��ο0���9��ݷ���"}^�0�r���74�G$~(}xx���o?%�/Z�u.w���D�Pf� �"9Br�Of3��(KA��^$�7��:�4m�a\�wM��'L��/�Apaaa��*�-�.�injx����.p��t��!��r̚��j�j��^C'���`ȝ�G�U�1Uo^��Ϸ�_��B���Bb﯊��;�� ��
&����^����(�������|���d��v��	���Ֆ���#;��b�TP��v�/%-�Mq�
j��'Cj�������[b�ӕ��<~���2�w������7ILY	�yY����ϟ�B�lR�R,�|m�X(Kt)�Ug�,�$�>r�Hf<|Ҫ�t����4۠{�'�+�8/�C���Ǵ7(�U�����׃��erj�F��O��a��"�ˋE�/�Xs3�!0��G�l��o��y�������:�e�%l=�P��`�Sp��	�Fnr�F�$�5 Y,uW��!Fh�CM�A4*�@�cT]�5��߈/������fg9a|-�����G�{�1��**���o��E��EfuV�������7o�������eEE�*�*����5
�j	 D����X�c(��k�J)vյ�s?�U������J�T
�#/ojtGM-�޼�zi�f�^~�{]��N�/i a��9�9*��%��		I��8I�Vl@?��&��S��n������_����7�����#���%�,M�[�Zޓ���q���aR�uK���\��ap�gg}�,��=��}�}���/�uE:�*}����sV��wR����e���S��ڤ�$Yy��k�T0#|Z�'Nk��uV<K��Z�s�A&��d�
ˁ�::�l'��!��A3w� �O�|������f��p�*	��
���4NO�\Җ�Z��=�	��
�Jc;r���嚢��ǫ��c��ʆ�o�1�`�qaɒ�`�Y+�=TOj�ҋ�/J�:Ė=H5ȵ]����x�א�{N�����D� ��*ٳ�G�	o},��k�R{�vSAU$�q|P�S� �,�2~]-0ǅPNj�h��+�I�)���9�����lǁ�z����|�Q�Y�E��غ�� ��X��EZG&�DS�.�:*��b`U6�ifϴ� ��\o8�Ϯ���$�hZ�hy�r�==IFuđ�����N�*B���LWC.::caO���ld'�x����8w����у��mp*�U)bs)�O
��$�-��PsAG!��݄���)��Vs�s��(��q�ո
+�2{�q+o����E�I�]�H<���)r!־=����/�u?.U��xN����W� �j��V��+�����U~IjI�	w�ǈ5��%��'G��'(�]�~����>�֪S�yG�+Op̟���b�EJ�%�Q�B�-��#�ܕ�}J.�8i0��#3p��r4;�t�i��2vb�tk�mM�3�,�i�O�P�-�^�d7�5�K�%`B���h�}�<r�%H�vP�-�] 	��k:��
�6�aVl����]�#�rv���J>�
����+���
��cϾ㚛�
VM+�m�+J��W��엹���{���8;��|�@=�
�ۚo!������޾s����^{�̱�����tZ�TxO�;�0��[>�
��F������C\���]���h��]8aI.HHQ�N���V�4e��ǚ+�b��G�2'�$�_���h%�U�ʧ ����GN�W_���6�_w+���_u"��  x���PNG

   
	ΐęq�*����@q�8A������ޫ��X��ݻ�w��m�%�2$����v�9w��=��:��p
��7�e^�h�8SQ^���w��i}f��+y��w�o:v��J*����}l���]�5�������X:U����F:u�"&`�'p⣣�J�ʟ�Ɔ������:�r|��O�m|��+Z�v��F��kY���̹b�/ƌ|���t�����144�������;Nw�$B�m۝@?0��jl:Y�m��Z����~��~�����C<��羼oϾ��w<�8��Ȅ�����a�Q��x�H��������24�y���z��\.�^/�����,w��o��麺�#�����ә%{�--�{�O6�|�����^7��F����vl�����{���tL��eO`(:�!���K��%��� ٜi�b��}D�D0u��P���J�P˲E�Ӊ��$�H�����i"I�  �����_ZOcC�p[S۪�������_��C`?��ѯ>2I�K��X|�6��;_ OR5������Z�-����蠷��h4���h����$	b���DQDEJBah`����9o���-RoG���k����vf�������tՁC�?������{5��c�uU���7Y}G^���ݍD����m�نwK{:�M�jnȕN9�}���V�	GȨ,�"'�ö_o�lv�s��S��������=�?������P����,i�l�.�m�FI��s���������%2���*��� �����IwW8p�W�
-X8�2~� 䭮��_���5^R��Peyѓ������jj�+�̭�p���!�d
A0
�������(PT:��-��EIi	A���H�L&�j舒@XW�˟MS�Q@`A�
�PQZ�ho�����:� 0�Nq��T߸���f��e�}�Rb�=����
� ��l�>%�$��n�}]�R��A(׏Sv ��7��O�h$���������CI(��	A �R��{�T*�b�f�iZ@Y�yX<�E1�N7w��	l�Ec�������v����zp�d<^7�������^��	4MG����4�ˁ���$�
�DI�wb��<g떅Cr����������.�Kf|4�(�s�ޱkPKg�,�BU������TR��:e�q��dC�Ო9�%S\ZDQIÃ#u�E����>��3

   
'[=f����dx����=���>dx��H�m v���,� ° h�,�:Ċ�f*k�]���1�����E(��;ÿ�cdXw�
�������w����m�c\Ear_�X�L� bB
6 UbGx0�r0����TNa��������G��3��������P-ˠ ����d r��!7CE�2÷���AV3���'������c�Q�b�
.��|���4�L��9�L����d=`������1��	b0�_��Ű��[��[^�,x
� v��� r� 18i�j�0x[
1��#(��}�����4�4_��a���/�' �h�K���|�p���ߐ���V ^@0@A�4AVIaV fc��fa�
���ex��7�������ŀ����F ^
UQ fiuhY$M^� *������@�@�j�;� �Y��0r5�\�ҬP�aj�� ���>�ğ�� \U&̥0���h48'@�?���� � �/�?ɴ�T    IEND�B`���bg�

   
OiCCPPhotoshop ICC profile  xڝSgTS�=���BK���KoR RB���&*!	J�!��Q�EEȠ�����Q,�
��!���������{�kּ������>�����H3Q5��B�������.@�
$p �d!s�# �~<<+"�� x� �M��0���B�\���t�8K� @z�B� @F���&S � `�cb� P- `'�� ����{ [�!��  e�D h; ��V�E X0 fK�9 �- 0IWfH �� ���  0Q��) { `�##x �� F�W<�+��*  x��<�$9E�[-qWW.(�I+6aa�@.�y�2�4���  ������x����6��_-��"bb���ϫp@  �t~��,/��;�m��%�h^�u��f�@� ���W�p�~<<E���������J�B[a�W}�g�_�W�l�~<�����$�2]�G�����L�ϒ	�b��G�����"�Ib�X*�Qq�D���2�"�B�)�%��d��,�>�5 �j>{�-�]c�K'Xt���  �o��(�h���w��?�G�% �fI�q  ^D$.Tʳ?�  D��*�A��,�����`6�B$��BB
d�r`)��B(�Ͱ*`/�@4�Qh��p.�U�=p�a��(��	A�a!ڈb�X#����!�H�$ ɈQ"K�5H1R�T UH�=r9�\F��;� 2����G1���Q=��C��7�F��dt1�����r�=�6��Ыhڏ>C�0��3�l0.��B�8,	�c˱"����V����cϱw�E�	6wB aAHXLXN�H� $4�	7	�Q�'"��K�&���b21�XH,#��/{�C�7$�C2'��I��T��F�nR#�,��4H#���dk�9�, +ȅ����3��!�[
�b@q��S�(R�jJ��4�e�2AU��Rݨ�T5�ZB���R�Q��4u�9̓IK�����hh�i��t�ݕN��W���G���w
�J�&�*/T����ުU�U�T��^S}�FU3S�	Ԗ�U��P�SSg�;���g�oT?�~Y��Y�L�OC�Q��_�� c�x,!k
�M=:��.�k���Dw�n��^��Lo��y���}/�T�m���GX�$��<�5qo</���QC]�@C�a�a�ᄑ��<��F�F�i�\�$�m�mƣ&&!&KM�M�RM��)�;L;L���͢�֙5�=1�2��כ߷`ZxZ,����eI��Z�Yn�Z9Y�XUZ]�F���%ֻ�����N�N���gð�ɶ�����ۮ�m�}agbg�Ů��}�}��=
y��g"/�6ш�C\*N�H*Mz�쑼5y$�3�,幄'���L
�B��TZ(�*�geWf�͉�9���+��̳�ې7�����ᒶ��KW-X潬j9�<qy�
�+�V�<���*m�O��W��~�&zMk�^�ʂ��k�U
�}����]OX/Yߵa���>������(�x��oʿ�ܔ���Ĺd�f�f���-�[����n
"ͮ;
.�n�BA�E@7�B�B,(�~�BJ)j�C3BLBPc�d���{��q]���E��=���s��������v  <� ��D$�̏6	�@�fY��u�#;;��./�R�B��yr�;��G�V����X Y�l��gn����j;l��[\�(B*�-[���8u��!"���vj������m��z][�o6�XD���f󳭣��>Pս��{���O�ݻ��ZT�\!���"aH��%
���������W�w��Е^������j��i��A:;y�Z���G��ѡCO� (� ��@iG|!"D�s��o��HS���C.G��qJ�* ~i�ѥ��q�km/� �.,Tt~�����9�H/_�߻��/i�w�
$�*�Ν�N��MO�:s��ML��x�p'I��L���0,�Y.��v��ƌaĘ�wIr���M��jǂs������� ���*?g7�q�Y��C���X�nܜt���~���{M�� �=��LY��,�1�Y�Ӝ�����/�
��?�����Z�UHg�XW��������cz	m�.��{}�1p�x���l ��w+N&B    IEND�B`�O[  x����PNG

   
O!��
��]�y7���� ț��1��M--7������晞s�.�S	x����yޟ�eD��`�1 

   
��ly  �IDATx���.,A�U]Z�� �X�]٘��x
���b�i��M�In2�M,��g1L�`�L��]�f��Lw�PI%ݧ�ίΩ:����D։���	�v`�w���v`7�n���@G� �;GyL�ĶЯM�o�*������}�Ś�Di����e�HRJD��A� ��Z��}�����_�
��;����u�R��	 ������c#���R.g������j�Ӄ5%)Ex �7W�E�y��X�t��(Uf��@9	���O۴�Rh�����x|x��6;��,M*�!�cO��.��^��Zs$ir�	y�Ɓ���Z�E��D�mu�ä���2��!��K���ז��a������Oo� ���)���    IEND�B`�U>�1  x�&��PNG

   
OiCCPPhotoshop ICC profile  xڝSgTS�=���BK���KoR RB���&*!	J�!��Q�EEȠ�����Q,�
��!���������{�kּ������>�����H3Q5��B�������.@�
$p �d!s�# �~<<+"�� x� �M��0���B�\���t�8K� @z�B� @F���&S � `�cb� P- `'�� ����{ [�!��  e�D h; ��V�E X0 fK�9 �- 0IWfH �� ���  0Q��) { `�##x �� F�W<�+��*  x��<�$9E�[-qWW.(�I+6aa�@.�y�2�4���  ������x����6��_-��"bb���ϫp@  �t~��,/��;�m��%�h^�u��f�@� ���W�p�~<<E���������J�B[a�W}�g�_�W�l�~<�����$�2]�G�����L�ϒ	�b��G�����"�Ib�X*�Qq�D���2�"�B�)�%��d��,�>�5 �j>{�-�]c�K'Xt���  �o��(�h���w��?�G�% �fI�q  ^D$.Tʳ?�  D��*�A��,�����`6�B$��BB
d�r`)��B(�Ͱ*`/�@4�Qh��p.�U�=p�a��(��	A�a!ڈb�X#����!�H�$ ɈQ"K�5H1R�T UH�=r9�\F��;� 2����G1���Q=��C��7�F��dt1�����r�=�6��Ыhڏ>C�0��3�l0.��B�8,	�c˱"����V����cϱw�E�	6wB aAHXLXN�H� $4�	7	�Q�'"��K�&���b21�XH,#��/{�C�7$�C2'��I��T��F�nR#�,��4H#���dk�9�, +ȅ����3��!�[
�b@q��S�(R�jJ��4�e�2AU��Rݨ�T5�ZB���R�Q��4u�9̓IK�����hh�i��t�ݕN��W���G���w
�J�&�*/T����ުU�U�T��^S}�FU3S�	Ԗ�U��P�SSg�;���g�oT?�~Y��Y�L�OC�Q��_�� c�x,!k
�M=:��.�k���Dw�n��^��Lo��y���}/�T�m���GX�$��<�5qo</���QC]�@C�a�a�ᄑ��<��F�F�i�\�$�m�mƣ&&!&KM�M�RM��)�;L;L���͢�֙5�=1�2��כ߷`ZxZ,����eI��Z�Yn�Z9Y�XUZ]�F���%ֻ�����N�N���gð�ɶ�����ۮ�m�}agbg�Ů��}�}��=
y��g"/�6ш�C\*N�H*Mz�쑼5y$�3�,幄'���L
�B��TZ(�*�geWf�͉�9���+��̳�ې7�����ᒶ��KW-X潬j9�<qy�
�+�V�<���*m�O��W��~�&zMk�^�ʂ��k�U
�}����]OX/Yߵa���>������(�x��oʿ�ܔ���Ĺd�f�f���-�[����n
��S`;�E`p�R�""M`x8
<4��w(tiJ����"�@,��+��'��'Nș3gdddDN�<)o��<��㢔`xX\�u�y�[��j!�?�m�$�`�Rjӫ���ƍ)�Jh���c��9��k-�F�cǎ��C!"��-p�	V1��T���a� ��v�ر�>��;� MS�1�j5j��F�,˰�P�T���;y��ٶm��i���e@oXwId�P�=��c��~�R�D�٤�j�h4����^����C�R�T*�1�9��ƨV�8p���z�|
0������7w��1�l6�����,��#�`o�j�M�X뭷���Z���9/��B�>0��f����&��0���3�<S����^J�7�t�F�'X�k
t�:w���#"�j5 ��{A�zH�w�Ȝ7y��'��y�IӔ��^*�
�Z�r��ϛ�w?*I��GDh6�T��V�I���Ex$@~���I�Q�$	i�\<V%X!�P^����\����z�$I��`��b+��.���U 1� "�z�������j���u�q@��5���������>����^�r�ɩ�<2~ɩ��m�s��^�u������y�'�n��M������t�|1"��emyv�7��[���3��[�s�r/���L����d/"�r�W�2�	`񭌬����ۇ&xs8�-x�� S��T�
�������̥X`~�@�IJ"�#N0����֜���x����cs�O�wO�(�X�B�d8�
�y:P���"g�[L�I��c��e���8-�)�W�^p�g_�!}Wl �RT\"�J(���R�8����H�9��T���Z��&�"�8��Y����<C!(��^p�SC����6X��s�9�<bgM��`/m�Y\i���(�p^�Y�v��[�gr�5�ĭ���[�yG�m���F)U�4p�o��$�(�{ǭ7��[o\p���}#�(���4Z��ޟ�����C��r�(/B�#��(�UL�c�R����63G�r�IS���;H���6���Ywe?_���<���Q���X���?>�׿�ڼ�y�0|e����]�D��l�,�B�#�#)��\������x��r�
N.Mq�]���;��7���t�'�t����k���8��i�s��W^MO7[�*��!t�B�:�f�Gn4����Y�ts��;�Q(d]������憫��|�
L3���=�{�����<�������$.��%�$)��A�H�":[ar�9o��|��\��{�x"���ؾu����H�o�N �+�t��+�./o�����(Hl"-��xWtߌ1���L��[�g��GP�"b ��s3<{�=�z�ᩌ{7
�hmz�əy��G��[�G'�QofD��x�R"�3R���������}�{��³.2,BJ����U���#� ��O��}n?��~f^ [V�����ۼ�/n��,=+/[�!ˢ�BZk��H\B��%E��y�D��H�e�N�=��������jNkft^*����m7�f�e=�IJ��h���n{�Ĵ*�	�h�|/�#�W�qϖ�ܳe��kՆ�Ci7����w�1<1��ݷsͪ>��E�5;Eэ����mPi�\=��f���ĺ9�t�<i�g��$��A��\=���{6Խ��E��6��3Xk�x��B%�y�pӱδ�P~�/~��~:̆kV1p�Z�Ir�@�y=%.t(�I
H��[�qEI(�����y�

   
������_�����;���o����իWD[ @� W}����A��������|VVV�ؿ�����]�Ơ����@  ���6`�ҥpK����4L.))�������ǏĘ
  @>��a.��)))`q`�c���	�'d8018� 0i���������P�%
W����`���������oX�c���L��b��ߺ}��1��a	�$���� @L���ׯ_g�T���~ 
q*���>y�d�$
'Nę)Al� b�g 6���/x8��0�޾}���Ñ�4r�G�+@e�ŋ��� ��8 aP����&βe�� ����S�    IEND�B`��r;
I�B�Z#WT����) ����R
��w��jP�f��nNޭU����q�Ԩ������XC�%��uo����\�B8�^ohT�̤.~6]aypVg�"��Ym��j��樀���Y�9�]@JO}.��"��<v�Z��sn����3��M��Ȁ����bz��G�뛾o���[�%�}̀�s��m�>��Z/	�q���gj_$E��ˑP�Q�YQ��R�G�:�%�m�l��3C� ,O���������J�ny��I�&���ŀ������\/���w�����WY�#���(�b���R���E\��G0���WN�����Mv�!����'s|zw򚙈�Q^�(��8���=&+�:���8F�6�N&���[�sƯ��$WH�2B�|����h����8���hpO����*�\��e}x<�1�=gZOȾIƉ��e֫@�U+C:��,��jX����������!�T�s|��}&.�����^��ͫV���� &yl��;^i��J���d;JJ*�i삗��.�]����
K��3r��SL�g���gvv&<ږ�P�����qQ?w�LoH�*�Q3���ݾқ钞K2����2?��a\{E�DPJ��lLF�urd[��7nw�ݫ�'���g�Oj�O����U@-��Ğ�_l[���
V�=L�u�~��>Gp���}��k����V6vD_�f
��d�����A�C�O�<�����������H^�ٳ:�m�j�b\�����QB�Q��Ӫ�����A�KR^yfN�C�^��}���z��V�V�
�DW��E�%dƺN��SmvL�`���e=�\���k�yǅl)G��z�E�<�<�9����F���m�|s�]I��xy6lϛ=�� A/��J��S���D�N6V���I�+�Z�ó5�2F�����V��ū���_u�^c���N�.�N��,�q^����n5�/Ș2]�GϷ��b���;0n*�����t�e�uwI���>��p�QN���0�<45Y䯋���XÔR�ƚ�� �>eI�84�
��BY�_�T�(-ƻʂ��v�g��T�/(/ �۶�������+0A�r����
���W�{�l�+�z(�_�4?^ �=�&�I5E�Vg@ٵ�%��o��q]9�2;RC-y��g��I9.-{�^����h��C���.�Һ|�oĀ "oF ��>�*Ғ��7JX#Yҙ>mh�i'<t��s3`���q�Ў�"g>�<N>�)��=z�������$��K��G�q�q�Q�Ѓ�Y(�r)o���3��Y��kjr,l.:{$��K���_l����F�>�����J��\	�	�����_.���=��1��/�Y�I��m��.�>11Z�����~�EޕȄ�ǭ%����n�J�������d8�{�Y����ɇ#��󼿌�j���r���䋢(�C2��dc���M�1���wFn?C%�>�,�
!i���}�r�A:X��&9��1��Y{�K�t����V:��mc��^�k���;?2�����~WZ3#����%+f��ψ?��Kxh�m���+5�J�j��D�l�	D&� gf����;����%�]���U�d�����B:�����T�F�B4kD��a��u�w�V���Se���/���&4�s�B1�2�.�M��
��޾��5�����즬���]<T��Y�&�W��,wy��v,Q�2z�<�0)

 ��oQi��L��Lt�	hp���9c���� @6-pZ��R�<@���>���� �  x����PNG

   
��y��M\��c2�LҳgP���iK`co�7�����œ��I��N)������hV�r��Ǐ\Ρ���u����S-��>|��=�(��#@8����=df � 'GFG�?���Vq���Ha&�
��Iv?ME�#��7 [�� �vТ�����>�r��ٞ�fHwG��w�zV��M`����ڻ7�(�q��F������Ummx�����m
�N%�쫛���;����������S����
UY�;�RF����FX11[8��]��� O�}"ڿ���_�o����-�u�������w��k22��I��2 ��[� ��G���T8��'��
:�m��2�׿y���}����&��}[@fτ�*�%=���_�������漄�̡���qF~�>�!3Hi�ƚǩ�DQ�	��$|(;�W�bє8�nu"�&DE�r�g!ѴsgV~n�W���<�E�j#�ɬ�Q�`�f�zf6�z ��3EI���� ������
��(O�2�[��I�acu�����P�;/U@�
6�|�k�3�?�]��j,m�Q���B�]~DhW����BZ�3��c`�9K'>����:](v|m�dͅ�u4�H�cl(5b��
�.���a�\'���۪��0 �S�r��mT��VJ�[�� ��"S8&��F�o�#d�. F�8O` ^�Sa(�X
{�6p�Q�\�+y����!�^Ǖ#��R	�a�ޑː?���{1�(
�a�<�U����U�?�jQ��+��G
��#�æ'���ϝ=eJlfD+���M4��r�be$9�m2��=�h�4X���_��b+1���OE������a��d{��_�qi͛�ܴ��'ځȺ2\c`%�8v003��+e-��<��
L�E.J生��3x�F���	Z�u`�TI.��ߒ��tɹ�@hۚ��m�$���`��j�N��XN nMh�c�ݧ��c"���J����?�Ё}�?�y�*��;����b?���(����˧ӊ��
sq��I$b� �O�,掰]�
�Fo�� �C�`*_׆�|?�h+˽�Dz�������w��b�tb�����+�A|w��F�؟P�C� ���`�u��h"+�G�8��UO��-w��"Wk�?e%�M�ҁi��G�PJ�6����I�=�za�{+�۾p��_�~�8`]y%5&/����Y����wұ/�i�(���&Ĥ/G?��g�Oi���E�a6s��6έ͆��
ղo�b|!Yh�-Ⱥwܣ
0�{p5	�T�)O�]��Qz[�~l��[��D�����n�7�|, &��/��k�i��M��*�O\Ć�>LbAvBރ����0=*J�#q�ߙ:tC����{W�ڹV��P�/U�#�Y㖐�ȫ��F�.Hm6�lib�,�F��{�Oq��k�}�r
���� �u+r�/���UX�WZEL��c;S�瘰L���}�#2"�6��" ��D�����˺�+z�Yr{�о�C4F�r�bg\=��滰��V�0�gS�~�^�����EH
-�W�ۻ|� U�9<��qa�\�@z�(����魒3����Yt4I�����}<��Ϲ[`�iI���=�1�B����"z��Z��p��Y��z��˕XgQ
j�[����&�?�˅���6��m����7M*�1��@�a?9-�0ߋ�30Z	�2��5�W��on�[�8�����9
���nTt�G�~�#n��IJ�ZAg�Qb��ۃ�0A�~b���k��VO���D>�`Ρť�B~@k���<�>�fܓ,�m�*,���L��2F θ+{9��Ǯ�Ց�����ޔd��a��Tm�� �Y$N�Tץ�C�P-3�i>��J)qw)޺�v���>Z[�l�4��&{xTt��&�W"�D�d��A��iN�@���X�tc��۟��6>���kk U|[iWLu�z�D-����-f܏�6$������
����E�Z�z�z��F�0�Z�����0'|U�o�u-#LM�"Y޺b]��VV_7��@�L����X��sy)�tcp��{���G��4^"�X.�(�ߝ����"�iP)��r�����=�r�D�Z-Jf��At	�M,2���!���0$?G�����}�0֛F�K
  x�ViXSG���
�h��&3��$Q��  fV���2;�����67y:��8G�a 8: ��Į?pи�g ~r l���l�48(���Z��0�V�����s��3��Q��*IQ����
C%0�~��=��	�ϞK�� U���4@�[Ok�L����x�M�(Y���y�FOak���}���p�hq�+�#�ˠ?���[/�V�y��|�����}RlI��ϛ稳�`�xa���˵�q 2Z��M���ސg�a����K2'�w��}�=zҕ��\���}DT+�������:�������s�w���x�1�Y&�.,/���ܜS�'(������v��7|x�^Β"�G<v_F��u�QĝXs��t��=A�t����φ��PD R'�l���N	iȱ��j|���]��V�o~�yb��I=�o�^94C��R��(+����K`��4�L���s���?u@v�e���-h��)�s.�S �C,pF�X�ũū�������ꊎ��2���g}���=�Ā\,:�yD|`f��*Ή�ץ��?�,nn.>�o���̝�e7n�L罙+�SM	6���8QL��&���EIE���.s^�����|�c�!�f�	3��ѥ3��KC�Zߐ
����ug���3��Q!��ob�%�����&�Tz	�`�YH�0���ڞ~	S�]ϔ�&��}�?�۝���qX��DA����LQ��_���7{+����+u�:�i������l��H�ͺM������.x݄>|���������f�k�tH�M7��1B�	iQ�����А�+���u7��՘ih�}����!�Q?9M}�O�$��;C�f�d[�kg�J����^npnuNgv,T,%�.�k>��C~���_��H4l��9	W��q��WM�-w�b�S�q�I$����`)1�	�N�X5���{�jfȰnŸ�XK�:���b�Ρ�w���� =	�S���t�б�7�����c�>��D�#Y�Ͼ��yy�DF���}-V��2DR�!UN1�����Vf�����Ü����W&�?�����I�܅:��I��-;���x��S3�'e��J+&�7��9]yj����D|�Q���ƈ+D�+A��a�$5�n��Qb��OB�=�d$~�E\s?ꢑp	�FSկOǊ�: u��G����a��3�C��;��J��R����ŒaW8�xl���T���(�n�}�g�x�g&�-��SI�&�n�@_���;�3���([�6.��=`-/�+�)�w�2
B1,=�d�JU/aL3�%P4b6�NU���<܅$���Nq���;l��?eaL�/��P3Fp�������)Xi�����g,Y!lj||h\"���&fH���{��g���q�l	cz{�h����ӂr��l/Q���w�Q�2��|�4�wGӚ�!�Rrc���1�6�"����ĵ[,j�.x-��g=�E�'O�7�~�eX�W7÷(� \��a^T�G@�X?T�z�Α-�N��}�^�쭒�P&�[��5K��#^�wP��7�6�<���Ǧ~�ܳc��'Vy:��a�p则���2W�ui�}����P��G��qMK�}]q��NyK+X��	EU�	�4na��?G6)d�ޙ$�*���
G��aQ�Ӡ�za���Qt�qu��+�����!\cV��`�9)�gjCڏr�C@}t^�@���Ak7������
�  x�%W	8�����Yl�(2C�A���d2YJY�f�l�poe�dfƸ���)T�t�k3�n�
9��d;���2T~͙�D���V��T�߅X�)�� }*d:-�~���9�9}��m2a���낉�7���\��4���`�W��ֹ�]~~fS�rA0�6]�7 ;�4, 
J8��ͧj�UQN�������.�|�շ"`k0E�k3���n@��
�hD�����|��2��/bh���#N�>%�mm�RXl�|;��3*���N��߄��[,�;lU�4��ڲ��#<���'�Ƴ�m�Ֆ��eVD"�B9�d�L�������=��IV۾gч����N��h����^�nC����� ���.�W ��ou�vx���N瘝�����b�$����/�,4?�&�=^E��F����dVg1�[	�ŹC���V��:j����N�VX���Q��	g:uv�
���c_؅f��`�<��������{g��ڤ:��]*\�&Jc�ﳡ�Vr�y�Ȣ�`�=\fC�,]"���:��U$�ce��G����ԥ��$K�}۲	{��f�?c2���j��4p�lu6`�*OOq��!��#�2nb�ۃ�����&a~N
)�0K0��D:;;#�����w$�k#��)>��ʀ~"���u�Qe=?6�,^(�V*�޻�C��|����ǎ6���Y3R�>R�2JO3ߩ�np�ep �9�nh辶s��B�p;�_�/N��Т��g7s�xq��|���R�ˑ]��ȦG�����;cȳ3C��%}fc�5Y����ހ��F�Z>oU%?L�8��>3m�i���ެb�r�ѝ�
=�؞+j���T(h���Ő����o����f�5�:9��՝/X��y{�5��As֓$B�x�Σ�[N��}C(S��^L��2�TZ�S���I�r�M�<10��S&`8oa-m�ƿl����#g���� oUv���8�������s���@L���<7
��z��p���Ў�"���x�~�,V�V�ނm��6/
�m�X�"
=�>�W@Eb^�o���lt�RJƺ��b���J�����VF��e�{X��tWu}����Ku戍ޞt5�?�ݑ�6F��D�j{g_�
�0{a��A<�����|Om>&��FU?T�Ov�I*��~,�r��l�Y�f6US�36���j?��������.4*
�V����C�Qq����rv@Ǌ�����k��i�lo���\Xu����p��Y�ղ^j_�T=��VWk��ӟ�+��������ػ�)������p�{�v���ewN��cA���:���h79߀tO�@u�p��(a⍁���1I����?�g���
��R&�l��ؤuR(��1��4�����nE�`/٦�Y&�N�u�QW��	��l[��%�H<�[��C{�Zޚ� 0 �n*<�D�5ZwqR�l�N}�zU^�Js�?"Ӕ�k��i=�b0��;>�?��
��1v��=�7
NL�ަcb�o��4P�h&̼͝K������/�~�n=O�	FjfvA^�A�}� ��|?
,��)cC8-^��>T���ņ;�4��d�1~me03S��e�Z�*��oH6�u�M#���@����<�@|])e�	��X7P&
�νq��qc~Vr��^:t��U�C5E.J?����"�n�R*�;���׶������8+h��N
�{1
��g�yE�T챟��V�U���dރ�WssU�iG-<��_�S��!8:�Z4�D�6<#; ��J=íh�6�9�X]w�!*�ˇ�c@lIj�����rV@.FBwo����֐L=J�1�]����#%
wֱ��Uw/[��iHЗYr:�@��n���	*��-<E�@5[����#}���X�x�p)�h-���S���k�"=�#c?�uYyq	�Ƀ\<bS��BK%y�ƴ���Q����1�s7�{j��dsu�eucb�M�����ٍ���PȀ?�+ y�:p�������Bt՘G
  x�<
���PNG

   
5����  	�IDATx��yp���?��&��\���$�P��X@��ʈ�U�[����zA�h�T;^�j�-�� (TT��
Z����|`������\	�jBf���]1��HD]��S����;���Y���l<tԄ���*�Dڐn�ϳ�c���'�=Ȩ���#+�J !�Зz���,������U�=����[=^�R��:/��(���7E��l��آ�Si����=^�?Q�~ ��j`���ua ��k�}�q���O����%o�1�i�W/���Ǝ�����I ࣫��ں�ll���=QW +�D�㭖O�昂��&��m���#�X���NDI
͇�����rSVQ���

��|F	�U��zd��j�)R ���E��?�mMMMeꥳ�p�{T����SY�@��/���n� 2�M@��{��W��8Qƌ���߁�6
��'"tX����+���9C�7o\��[-*�<��sb�
�F�e��O��9�ۈ)� �K�Gn������l_�^��s����C������~�������lrrs���E�P�����zd~�Mv�c�O�N����U>��6�׬�/�ܭ�7�ΜI}>�i�͈� �e�2y�XF�3z���q��O�D�����o���@�b�ʵd�DY����HW_�I~�x�0`�wyhi� 5�?���������
e%�5�� s��Ub�b�x�/`��Ca��P!�]��h甉�k�����׋Ka�^�rd�#�&� VN�� 2��*nF�x���DX$Q3�H�����EJ�$=H':8�Y����'�T=	232�����.��]���m�7���M��n�H"g�3:'�]��r�N��A�S�BD3�

   
�i���8mJ)�#`�ѣG�����`||�����[)���� O�<!��.�B���5fggqg��������o���ٳ����{MӪFGGill���!��b�6�aprr»w�X^^vb�����~�leedd�i>������U���$	��(���$	���D""�����.766�ZZZ~���<�`Y�����x�H$B,����H$B("�BD�Q��0�?fwwW���}i����$@WWW�u݁��	jkk��b$	�� �@ )%RJ"�$���N6������LE@�P�d2455����C��!�gr���E:�F���� �4���>�� �h!���y�'�e�M����!�R�m�* �T[kk+�P�><<��
�0�m˲���A)uT���-���a�ea�&�e�zY�6�0�uݷ�����RE��2�������N�TB��O�4MJ��/�i��:������ �*�eY����� 588��X��˲�m�Ϣ+��z�����y`�I�SJ�����7��粻��o^9���~yJ�WWW�y���e��߹*\�
!�wvv�>|� [[[�����],������׬��8@	��~�o]'��⭔r������^R� ���,..��� 0��_\_����'	|�ڍ!:��z�R�-@|��Q6�����$>�l����с��˖|ȧ7	\MMM)M��
(>$�����f�d2i?4�&�P� ���r�� �

   
+��x8  nIDATx��y�u��?��������Iw'�N�`$�����#�12:��8Ψ�9��T��Ƞ,��1�� F�����ӝ����׫W���j�|vX��g�9u�mUu��~��w������o_ҟ�&�"�ދ��Ծn9��1 ��8P�~�Vv|�����oQ]a�3{�^ DA@Q$
Å��Z�@��]N{w?���o���m�_�E�,��P��[����e�[@;� ��^]k��KN71E���9A �O0��߻�~v??�����H��i߼�[t�{�z�|`����"� ǀ���������`+p�v �	`�n �$������� :YU$�=�#ɒ��u�#�iۮw������*`���׀��]��� x� ��p@	m�h���c����oUU�G�<�74>�P��&�k5)��~�������i���|�{������?�ώ�o����Y
�5T�;o�~��̮��,���;����,�\dI�vN�"������y���燇<��@
y�x 0=�]�Hz
�k���%�:E�����IW_���ڈ�����+w|�v��?}���I�s�� h�)cj.	@(�29�A� �T�XXE�E�+¬Y��袱�����YЁ�^����4�����@�%�_��R��vI�_�])W��F���ς;o����fv�� �(����p�tV"�0�F  ����m�M�{�]��c���F��{^��{�^�����I<���� v�w�Y�D強�����5;�3l��۾���8��K�
�"R	,�!o���e�TUU`Y���DC*�{q��N�y��ۨ+j��0m� ����D?���>�KԹTU�L6��#W(������r6W�g�<�����n��Ӻ9o���As}%G�gq\�>����z�dE[u��t�6���LA/���O<s��������x~�e;2�ā�e(�GX���y��lk���k����ytx�9���ɽws�M_���~ö�����Ǟ'�����]���(���E$"�ְm��;�P@E�\W������f9�l2�,
��l�q���<���8���F6ko��>���)U�'��G��ʧ�u�=<�購s�F.��*�v����w;�{pQ��V@E5@<��������nVvv ��f�,�p(HSM9Ó(��c۹�n)�o=A�	Y��� K�W�?��VU�չ����jT�������019Ś�6>���x���ﻈo�� ��"�"�LUU�^���c����y�ٴ��RW]NE,�*��ô����e5$I��:��\L � ����V,-lNq�K�w��m�쿟{iP�A�f���?%��f���;�m㢭o◻~�e;8�KJ+���[x�� +;Zx�9�)++ce{�H�P0Dmu9�=���R(�z�*A��kW�y��xe���F�)œh@���zc���}ê\(}+���ct���������,��7�sphò��&5U��][y���\���b�����l!�Q%PeUQ)�io�Aä�����ު\�-n�g��Q�(��F�[�����F������>9p���<�(p��^�����b�]z>7��
��i9lX�M���F988�9gl`U�JVu��`�H�#!�T!G4(
�,����'��Q�٣�X!z�^��Y��Q��9|�����]�_ 	������n9��?�yâ`:��[Io�
��Ǟ�����^|=�H���k������z]7�$�˓�tB� �G� ^2E�_mC�!Y���=S�����n��0gm:�{���Y���Xi�s�MiI	��<��!����<F���[~� �^`��~J"
�<�D��	~��96����yݠ������%
I>ϋŅ\1 �wV�@:��4-���x��8<2��Y4���<��>4��r��ǻI�� ���˼Doo/?�4��055U|��������_?K&�C�Tr���cn� 8��������b ~���@<�9��{�?8H6o��ʳg� s�:[j��#H2�ژK���꤬��Cl#υg�b�;�g׏@2�E
���9��V�6���HΌ`'�=~���2��r;Mu5�*��q���n�����36�q�i}�V�PU�A6��|b~HzZ�z�A���Y6���Gwpaߑ���}�����O�%�988�[ތ"�4֔���8R��n�-��<!Tͤ���`0���`�]�;��$������o5ѐJ$@�h��e!
��8���8rї��B0�_s�On��#��ʍ�7�B8��I&�|z?U��t�5��"�Qd1�c�8�eT���P�*�n�ne3��O�aY�D\�Ŵ]
������3��d�@�K�A ���M��S��Mu�5e�mo=��F��*@�@�� �(#H*�$#�2�����"�^l�X�Q�]�|��a��ь��B<I:����#OyUh�G�<`xr�+%�0=�i�ř�|����>�ݟ�U��P[�����Ƶ\3���(8Ȓ�"Ȃ���'n��`H%���j�e3�'���:���d�%)�E��5�v�X���S9o5L-	jn1���庘�<�i�{ݏ>����X:����c�9�B���r7ug^A˹��ţ�X���B��*�7Lt]G�3�,����J(��$��S��������\��A@RT\v?��\�u�c!�cH��䚸��khĂ"�d�P@��4��5�lXՁ-��œ,��c�������>KYH�j��W���AȀ\WY��O�T�� I"�����dê6l$>q���{`��:JC22&�ePU���ul�����n�����z�{�F�M�AV���ON���Ǆ�j��p��J�'�(PTu@�U�n��5]�Ѷ�*Z�+�F�TU��YH�a>z�N��-)/
�t5qz_'�:�*+a1�%��
�#�S�<�'�Va�����Rjޗ���z�<�Mfr��zL˦�"FSm�%!4-��8�6T+
i��57l @���3H���jHe_�W���� �X������O8�� ���� k�2N @�r� \*@?���  h�|=݃ӮE�!����a���Oxn+Y���|a��<��C+\�Oh���Ns�P��!T�~l�HW ^P}�^K������H��������D���!��������}(�SHnYr�����.6b��X�K�7��%
�bE+W_�RES�����
�w�P��$����B�jԗ��\��Y���exl�#�;��L9❄��1��sיE����:�^�6|��id(�}vo����Qj�x׫�~9�[��L���л��i�N
������$m�yc�l�=��.��r �y�7B�o�����(^U�A�
;�<���L��j���y�?��j�Cr��<d���(����L�����<y�=�1��^�K�m�f����N��0��h�h��\����Օm�m�^�@bF;�:;��{q�Ad*�C
�|~���F�ATaK)�WVAC;f=&*R��
F�~�k�fe���M�Ɠh���'��7��Y���T���C��+^����m��[���d��6�f�>1�fr�w?'�=\+<i#��*ʅ����Ys�2P;�đ#������c��'%,�&f�OHVbf��\��aI�t/�4L[[����"��������<��$�x��~�wf���{oX>g��an_n^�NU�Ω4&�b5`G���"M����^I��m����"�	�Q���o��?�N���N1K
N�8+S�Ѭ��'ze�"\��0��x(?nü��sqVW߂�@/�s���%��"����v�=�ѯ��׎����L�yO%��VUu�yONLA���##U5B����Vsp����w��E���y��!p=�6PY���~��Z+�FqRMB5\ӈ�$uR�ӣ
��JԮ�FG펚�q�5��S��=U������Ȓc�nZj�ۨV�C�E�!��}����[oD�g�+v���
�9�
D'�a�t�����~M�L�VVy(���>u��f�\�]d_�d�C4�^�\����K8$t�<��!j
lm���628{|g��z�3�j��T�
|{��Y���߀�|-�X�������kQ���h��;�d���]Md��w��ָ�%d�Aӥ:���i�CCC�'��3�<Ja���Z*��<vh��k���m�.]b�&��21�P��$j1�1�*�Z,x\�/h�
Є;.D*�^���+�ZӚ{��ȽX�ӫ��gy���R�� ��)Y���F���	{��D�3a��!�g�5�A��!Wj3Ԧ�RZc�
�� �*7.��T���M�`đf	&\U��pM��{���hf�/U�����c���tv��vO!5��QPT���T��
���F%�N�\V�"F�i��%J���Sq.V5�Ś�\U�Դ���( ������ߐv�iU��'ُ�@�u���t�=�S&u�E�R���a4���o��/k���.�|	0�M�������'��mH�bC�F͓t��S�bT�
{�!�p�P�/LķgN|��1�R�U�r��99#��!���(Ⱦ��īiV�G�{�}"]k����J(7iq���4�ˑـ�X����j��N��Ύ�pz�wW޼���M�c��0u69hI0��fjSkv�5�7n�⍠�w�VfT�I=7��:S��/�����{�)K:R�u}������)���{c�����/{ӎMw3�͛����P��Z��;Aq���e��"ܮ6f����Ἐ�׬"'t�:���;�ʬ��(�8������α�������o)�h���L���Q�+���簃N�ln�f���&�tl���ve���e~_D�Ԁ��l��l����3��%��5�	��|��:����H���m� �҃q�甒g��4d���O���yk����|���{N-������̬>��k��K�>���*

   
z�^�����2����200������$,��;ٓ��������ٙ98>�uܿ�������A��i�K����S�Ӏ�e���÷����D��j�121121102B��y\^��3�z�������F�����N�n���7ݏ��Q�k&���:��?g'Bl8���>���}O�����B[�L"�mX������a�7?��a9�������sr7�:��SU��f#Ӛb!�B#����v��*�ut�]F&�o_O�;�1��Tb7#�ę���f���e���������8�e-�~sG��c�'����?�`x��ĩ��u�������4V� 7bɿ��24    IEND�B`�l38D
  x�9
���PNG

   
� �� �b�s�3��GB�g�a��[~to' ���8�t:w�J��R���NMM
�s�LI"�'H$���R]� D�����*@��g�&�X�T*�� 8��A$����E���u,˦��JE@N�&Y�$�+�5�-&��e�v~^>���T1�3��N��q���H)������	W�R_ߠ�⩦&r`��u��m��<�F��(xS�B�m
�Ծ��I�����3I���R?�|}ʀ!�0Цm']G�јTM�$�x�X,���ս�u���	<�EJI*%�;w���xܿ�J%pJE�z�UN-�7�ฺWD d����2jk�r]5�L/��'U�xH��r�W�N8FDK�.��Q��r>q
	�e�����Qu�SƊ��B����8.�L���z�?>ej���G__~x���ݻ������-d�&�@��s�e�^iȝ�� O��l+�g��n]��ޮ]���w��(Y�fK������C7G�	"��e���0M�o޸�[W.����D�O����[�^�7 �ٚy��	 z{O`Y�8�=o|��Q����M,������x��/�E�x���|���t	,���������ctwwc�G�B�� H�u�Y�0Z�z
j���XT�4:57#�H�������
��r��w�=�9x���}���衵���|Q�*��Ɵ�E��lR|��׸|�Z��ۼ��i����9=qS�?�*�	�_�����J:��d� ;^{�
¡jfϣ���y~�'��a�
 �Ɂ?=(S���DŎW^�Օt\��L&��Y.�'��������I���:`n)"�_b�����Q�����%���H!%�D���q�x�ٵe�T�I �#�0K
 ����٦/��9��
iO�1�޲w��k�X��16��&�W�	X_.��!�p�ˡ�+�7k"�gf:��kkj�T:]``��-��pfc�z����Y�v����
��E�d�HH
�O��f
_�W��^~g�>ㆱC�@�a�<H�p-{f|P��y0/1������հ��)%��
y�3=���[�梁	"̯�
�蓹
��i�w4�Z�l�-����[7o>?]D���H��#8��?|��ZbI哪'd�&�Ʉ���XM6�m&X�p��"�X�$S�;piƅQT�NI���aJ�Q�.�ɀ� _A����\*b�ȢD���R�5����9ʌ��.�w�aa}�q���uq���)���oQ�)�ԉ����u��`3S�-.�_ٰ����Bh_ס%ַ�F����o����
	�����粒�t��
�[�OP�Ym�lv�bhX�+?@�]N�H�ِ{ȗM��܆�PTn�̦�{96Og_�Ɛha��➀�f/��'����i�2b�y5���`8EW	�	'b�,��X�R:�]���
�K���)S'>��;�_Opc����ףKB8���/z�q ��|�f�OC��4 k���٣ŬXdǮ�I~۠��2�Κ:N��P���Җ���c�m	�D�n서h�*��ɹ)�(\j)Z%��:�oy��\�u�|r��ɉ��Era��3骟�o��2�p����w<	�|%���[�T.9�k����`7�[_Nx������Y�d�:V��r�!��_�E|�%0ϫ.�!AO���J���	���f���*�e���
��鮄���0V�8Iغ�S��?��˺q#��ز���;;��
8E9�  x��q��PNG

   
�X4в�-���;��9s|p�4�K㓓����|���������'��C��*�[4M�RJŽ55mJݚu0|}Ӣz�zam1~��2����Vq�0�k��o*�@[Y78|�M���6�xc�
�G�&`�4�"<rO]��˾=�ۭ����#�2`ni�tI��6��._$o�xc�b6V�w�<%��D���`kU�o�{X�?;��E���	K��K��ܵ�6��ű-�77���Kzl�;��
�RRݐR��<���� ���[�ė�^2'���y����5ۙ��҈k[����k�g
�S�a)e��e����j�}z���F��	�fr�E�1;�u�xO,}w��Fܜ��	6�ThgS����ӥ��x�rg@�3wտ�������	g���׭�~ $��i�٫���[<%��5s}�G�I�=dJN��5��}~p�S����V���1���a����w��8z�p"�tcs#ʶ(:��=�+|��%Y����er��XA���1���gR�Ӟ��$`�œCR��Lf�lhn`4mq2n�=�Q/l�M�A��M�*���~#k������.;�v]����F����L�<<	4z��)����&oӨ��P���͉Z!�f�U)��)

   
�Mڂ������PZ���Vij�ZZ������j�ĺ�5���}�y^N?�gn��&ٵ	&Ё�3��ܙ�������ޅ��;FY���r.�x�Hd��%��w���������?ɱ7%�����I�G����-�\q��w^t����b^y�o�.�⮞�~��{����N��Х��c��3����G�^=|�og�ٞo^sI��_G_ZȽԧ�>��=�v�V`�eߛ�-����B�x��'w|���t��<+<��{�z|�w�e���^~NYh����~뜞����}��F���g�s���^��>�f奧�&>]�loo���r�
����4�T�1i��fY��1�k�����>:���>����=�#g|�mڴ�򑑑�,Y�X�\ޡ��("�J��{�����RjC�R�VD�[�|�f�f�9	�aÆ�lܸ�+W^y���� �i���[}��W�8c���o�'���*�*q�#MS�,�{�1km7�R�Z-�14�v���A�\�r��ͷ�G�����q���;֯[���ݰ��[�:#���~Y�V(���(��JD��Ju��#T�{��6��e˖K���y�8t����+	���s��U���v�m{���n�Z���R�P*�(�JDQD�$$I�}������^zzz����۷s�7r��R#|e�e����*����Ν;w�q����Zk��Q�C)���cY��""$I�������ر�}��199I�$c869ͫ��?�V�� 9�.�u�֋D�g�{���v���J)���i�^$011��m���g��7ޠ�l⽧^�s��RF_�������⋜VCCC��H5Ϯ֚(���8���*�9�������U�V���O366���=SSS\���[o��5k6��瞻�n��m۶���o"���}��$I��=ι�#�j�nU�s|��(���n�l6��jl�8#�z��/;8>>>L.ׂE�j�~���s�,˺ �1���n�Y��z�dvv���ǎ�?����aL/S�=���?|�P\n�r�|�scL�
��{�H��nw���w��ҥK���f��>֮�=B�Vez�(Q]��yH�?m�������;Q���X��/|�KB����)����{I�i�-�'�ʗOLL,��dY��8����4ׂs�4�G�zzJx��Œ�5��H�A��R�HӴ�>qEQ7�E����ӝ�Z�,#�2�1cpΑ$�fJ�7�X2�L��p��Ƙ�R�R��C,��� ���n�1�tŞW�Z-��)q�Ȍ�ZU���VK�@H��
��k�Q`]>����E�,˺3an���>,�Ԡ��˝aWJ4i* 3��+T�$���+�ʺ�u�1]yE�1jI�t����6Ë�+D<Q,D]����h�'��bZ耵�����,�VA)յ�<��9����c�(��P)�s����v�k0�Bd�a;oC�!k��Z�. �T׍��.�8T.h��pđ"�&��c8>%/�cAĜ�bv��^�7�$Y���\�y�;�(�˝�p��ei�2�am�s���HHbEw�;/(Q?.�z��@3���z��O����b��?�R���I>q��4�
)t���j5���� ��ܐB��@�@dA��'�+����G��޳Zđ��� R{��(<QJZ�'�i���`�=�2��m�XQ�~?�8?�g�e��	k��֯�Fi�<���Z��R�5�q(E���ס�0�;*"������VX�|� >	���J@���,	�����2s����F#�T�8L�������:��Vˢu�sn8
LD����3�!��C�g���eN
���͊�ߜs���Ω�Ri�U�
Zam��h�ʘ�E�o"��I��{L
d�gC����)�dV���/N$��.��T$*�Q������&�2�琱s�_�}����<�T����՜�I�y���2~��ѭp~�Yr���*`h���d    IEND�B`�[Gү�  x��o�PNG

   
OiCCPPhotoshop ICC profile  xڝSgTS�=���BK���KoR RB���&*!	J�!��Q�EEȠ�����Q,�
��!���������{�kּ������>�����H3Q5��B�������.@�
$p �d!s�# �~<<+"�� x� �M��0���B�\���t�8K� @z�B� @F���&S � `�cb� P- `'�� ����{ [�!��  e�D h; ��V�E X0 fK�9 �- 0IWfH �� ���  0Q��) { `�##x �� F�W<�+��*  x��<�$9E�[-qWW.(�I+6aa�@.�y�2�4���  ������x����6��_-��"bb���ϫp@  �t~��,/��;�m��%�h^�u��f�@� ���W�p�~<<E���������J�B[a�W}�g�_�W�l�~<�����$�2]�G�����L�ϒ	�b��G�����"�Ib�X*�Qq�D���2�"�B�)�%��d��,�>�5 �j>{�-�]c�K'Xt���  �o��(�h���w��?�G�% �fI�q  ^D$.Tʳ?�  D��*�A��,�����`6�B$��BB
d�r`)��B(�Ͱ*`/�@4�Qh��p.�U�=p�a��(��	A�a!ڈb�X#����!�H�$ ɈQ"K�5H1R�T UH�=r9�\F��;� 2����G1���Q=��C��7�F��dt1�����r�=�6��Ыhڏ>C�0��3�l0.��B�8,	�c˱"����V����cϱw�E�	6wB aAHXLXN�H� $4�	7	�Q�'"��K�&���b21�XH,#��/{�C�7$�C2'��I��T��F�nR#�,��4H#���dk�9�, +ȅ����3��!�[
�b@q��S�(R�jJ��4�e�2AU��Rݨ�T5�ZB���R�Q��4u�9̓IK�����hh�i��t�ݕN��W���G���w
�J�&�*/T����ުU�U�T��^S}�FU3S�	Ԗ�U��P�SSg�;���g�oT?�~Y��Y�L�OC�Q��_�� c�x,!k
�M=:��.�k���Dw�n��^��Lo��y���}/�T�m���GX�$��<�5qo</���QC]�@C�a�a�ᄑ��<��F�F�i�\�$�m�mƣ&&!&KM�M�RM��)�;L;L���͢�֙5�=1�2��כ߷`ZxZ,����eI��Z�Yn�Z9Y�XUZ]�F���%ֻ�����N�N���gð�ɶ�����ۮ�m�}agbg�Ů��}�}��=
y��g"/�6ш�C\*N�H*Mz�쑼5y$�3�,幄'���L
�B��TZ(�*�geWf�͉�9���+��̳�ې7�����ᒶ��KW-X潬j9�<qy�
�+�V�<���*m�O��W��~�&zMk�^�ʂ��k�U
�}����]OX/Yߵa���>������(�x��oʿ�ܔ���Ĺd�f�f���-�[����n
�V��X���huW��[#5��/D�V���mj�����V���t�m,�h�
�,�����;s���{.�,��݇�d���9�{�{~����PJ�:)N�M����}��1��,���X��h|��0���o��p�PS�o
h�q���|��2ͧ�wH
-<������l��F���~(����@��K��ԓ7��Sh��~xc��ۀ���V��S����K�B��=��  À�� [
!��_A�9tv*�f<�
���u�����+�H�~i`��5 �u�b�����%�����
�:�)���F|_ʀP*�h�Y��رs�kNR)����_�{Y��׆�F���g�7%)A1
��%m��~
�8���]������� �� �]��E9���"��,s'��	�Tb(�~V��Oc=�w���N��/�xi�9;`��n/��`���LL�!;�����Q�����P����ƈ"No�	Ka�!(�A����.�#��3e�fh ��� v�ϻ(B�0 0S��Մ�nR����T
�㝣ד���.FE�(�h��;6�Р��Ճ{�+�7���0�&��2�Հ�����jE�
���tI��}��O�����v���. 0�Ȉ�0M��˖W��Q0q����/1?t:���^ో.Rlڴ��B�U��@��8~�����=�0�4}B	HE��׺��m圳
�a�ј��.<)���!mۮ��ݎ�;8E�h<��l���ø�"���_f�s+���y9�2��f�qR�7T�F+��4x �`��kͺ)�O������`{	�!|j�H�(�w�c���|��<�o���YQ[K�,���DoX��B5�JA[<�H;/���i�D�o�L����Q�B7���S������>�LN2�>B�ZN�XW�l�_��3tB��,��So`?��_���Z�,+�\o�����0R�b{
^�()z��z������ۘ�C�B��r޴R�}:TO���V�1" �.����� ˬ�3`�C�.�s���5]Le#��8�8^_wJ�a0�����p�Ne�FB��2�\i�C�#V���b���䈙�{��xB�(�ɬ�r���#Y1��{+
LC��N]�zg$�K ��qhm}�XD�7�T���	�1ij#�t��NU&�����z��"��UgF��q�_��Ss��t�w���Vǻl}u�Z���}�O̮t�y�
QwF ��������o]�ȦeK�޴��!���Z_,�Oomo/�)�ap�X#��j����d+0'���:��UUٻA}���w�L7ߓ�$a���r��{NE����5�W�׬�sC���ΰ|@j�{��������(������X^�ǜB�U啂a|�Q1�$
����}n � �(�� �D��W<��    IEND�B`���\��  x��}��PNG

   
X�F:S;�3�W��ZA�����_���f����d�L��P��������H��!7������"��-�8�f�a��b�6�t$���i
� o^��5D��b���� g�J[4Y,d��6FA���F����0��d���D���(��=8��f�n�D�P<�O��nG,�$D!b ��s�a���z(�����K[!��2 �:A���z}�$"���e�' ��$Ƅ�i
Oc�ģ��������G����_~������GɎ���(�&�uh7��{^8�����7�SS�9�    IEND�B`�Ʉ�  x�	��PNG

   
OiCCPPhotoshop ICC profile  xڝSgTS�=���BK���KoR RB���&*!	J�!��Q�EEȠ�����Q,�
��!���������{�kּ������>�����H3Q5��B�������.@�
$p �d!s�# �~<<+"�� x� �M��0���B�\���t�8K� @z�B� @F���&S � `�cb� P- `'�� ����{ [�!��  e�D h; ��V�E X0 fK�9 �- 0IWfH �� ���  0Q��) { `�##x �� F�W<�+��*  x��<�$9E�[-qWW.(�I+6aa�@.�y�2�4���  ������x����6��_-��"bb���ϫp@  �t~��,/��;�m��%�h^�u��f�@� ���W�p�~<<E���������J�B[a�W}�g�_�W�l�~<�����$�2]�G�����L�ϒ	�b��G�����"�Ib�X*�Qq�D���2�"�B�)�%��d��,�>�5 �j>{�-�]c�K'Xt���  �o��(�h���w��?�G�% �fI�q  ^D$.Tʳ?�  D��*�A��,�����`6�B$��BB
d�r`)��B(�Ͱ*`/�@4�Qh��p.�U�=p�a��(��	A�a!ڈb�X#����!�H�$ ɈQ"K�5H1R�T UH�=r9�\F��;� 2����G1���Q=��C��7�F��dt1�����r�=�6��Ыhڏ>C�0��3�l0.��B�8,	�c˱"����V����cϱw�E�	6wB aAHXLXN�H� $4�	7	�Q�'"��K�&���b21�XH,#��/{�C�7$�C2'��I��T��F�nR#�,��4H#���dk�9�, +ȅ����3��!�[
�b@q��S�(R�jJ��4�e�2AU��Rݨ�T5�ZB���R�Q��4u�9̓IK�����hh�i��t�ݕN��W���G���w
�J�&�*/T����ުU�U�T��^S}�FU3S�	Ԗ�U��P�SSg�;���g�oT?�~Y��Y�L�OC�Q��_�� c�x,!k
�M=:��.�k���Dw�n��^��Lo��y���}/�T�m���GX�$��<�5qo</���QC]�@C�a�a�ᄑ��<��F�F�i�\�$�m�mƣ&&!&KM�M�RM��)�;L;L���͢�֙5�=1�2��כ߷`ZxZ,����eI��Z�Yn�Z9Y�XUZ]�F���%ֻ�����N�N���gð�ɶ�����ۮ�m�}agbg�Ů��}�}��=
y��g"/�6ш�C\*N�H*Mz�쑼5y$�3�,幄'���L
�B��TZ(�*�geWf�͉�9���+��̳�ې7�����ᒶ��KW-X潬j9�<qy�
�+�V�<���*m�O��W��~�&zMk�^�ʂ��k�U
�}����]OX/Yߵa���>������(�x��oʿ�ܔ���Ĺd�f�f���-�[����n
N..%�Z����S�B�q��mC��%�t_��9���$�D���{'�c3�ħ$˼�������m����y�u�o�y�D�TZ�شР��50�x����Ŀ�`������p�D�(�yBRL� K���!�w��&A0�S.�N6�7*���`��������+K��۽`[@��tZ��~��n����}|Ŷ/i֫7jp���?�S<áG�=f��͌^�c��zU:��
+>�4| �Jg=��    IEND�B`��[�iA  x�6���PNG

   
�2�φ���K�^��Yg����DQD�%1(̛7��[�N�j�b�#�#��;{z���o��{#}XD��X$������x�P�-���    IEND�B`��Ćz  x���s���b``���p	҂@���$Ŝ> )�tG_G����Y�|���b�!f�t��P����ו�'�������P���cHŜ�y+�L�|>(bA��K֟�,�ˡ���%	J~5�^�\~�m���3ǟk��������'r�'�ԁK*

   
� o�Z��@W�\�������sg��_�f�K3]P�R����X����qY�� �@ȸ������k@�?�L .�> �`km�����z��@A�,*(a� �EGE|y���#M��@a�	�r@��۽���G���p�s�X�X����իW��$��~������n���O�o߾o������<�=~�7�b���/1 ̒zi���N������v����boH���8<����1@( @LP��y�����p��2���1���d�$Rw������2(��Þ�X �o���Ǐ�,�o�!��(�`bl�x��=�W���efbP	��x��%煋W���o�X @��	�P ���`U�b04�bx���?.�_�3M�<���Z�j��kb,  t$ ���t�INV⿋��#}���̌_�bk���9�5 ����1@�����T��{ 9�U�6@ �� Y_�O� �ѕ@ � ��/	i �����  ��<��/�    IEND�B`�"���m  x�b���PNG

   
`�ퟏe ���5<:�����L~���B}�����T�sf ����n����9B�xg�!�9�':K��m�V�śW�x���9�
�����=�w�ggu�=��D���E�捲��Q7ZL�F��������L}n~�?�Z�_;*��Kd    IEND�B`�+ِ��  x��T�PNG

   
OiCCPPhotoshop ICC profile  xڝSgTS�=���BK���KoR RB���&*!	J�!��Q�EEȠ�����Q,�
��!���������{�kּ������>�����H3Q5��B�������.@�
$p �d!s�# �~<<+"�� x� �M��0���B�\���t�8K� @z�B� @F���&S � `�cb� P- `'�� ����{ [�!��  e�D h; ��V�E X0 fK�9 �- 0IWfH �� ���  0Q��) { `�##x �� F�W<�+��*  x��<�$9E�[-qWW.(�I+6aa�@.�y�2�4���  ������x����6��_-��"bb���ϫp@  �t~��,/��;�m��%�h^�u��f�@� ���W�p�~<<E���������J�B[a�W}�g�_�W�l�~<�����$�2]�G�����L�ϒ	�b��G�����"�Ib�X*�Qq�D���2�"�B�)�%��d��,�>�5 �j>{�-�]c�K'Xt���  �o��(�h���w��?�G�% �fI�q  ^D$.Tʳ?�  D��*�A��,�����`6�B$��BB
d�r`)��B(�Ͱ*`/�@4�Qh��p.�U�=p�a��(��	A�a!ڈb�X#����!�H�$ ɈQ"K�5H1R�T UH�=r9�\F��;� 2����G1���Q=��C��7�F��dt1�����r�=�6��Ыhڏ>C�0��3�l0.��B�8,	�c˱"����V����cϱw�E�	6wB aAHXLXN�H� $4�	7	�Q�'"��K�&���b21�XH,#��/{�C�7$�C2'��I��T��F�nR#�,��4H#���dk�9�, +ȅ����3��!�[
�b@q��S�(R�jJ��4�e�2AU��Rݨ�T5�ZB���R�Q��4u�9̓IK�����hh�i��t�ݕN��W���G���w
�J�&�*/T����ުU�U�T��^S}�FU3S�	Ԗ�U��P�SSg�;���g�oT?�~Y��Y�L�OC�Q��_�� c�x,!k
�M=:��.�k���Dw�n��^��Lo��y���}/�T�m���GX�$��<�5qo</���QC]�@C�a�a�ᄑ��<��F�F�i�\�$�m�mƣ&&!&KM�M�RM��)�;L;L���͢�֙5�=1�2��כ߷`ZxZ,����eI��Z�Yn�Z9Y�XUZ]�F���%ֻ�����N�N���gð�ɶ�����ۮ�m�}agbg�Ů��}�}��=
y��g"/�6ш�C\*N�H*Mz�쑼5y$�3�,幄'���L
�B��TZ(�*�geWf�͉�9���+��̳�ې7�����ᒶ��KW-X潬j9�<qy�
�+�V�<���*m�O��W��~�&zMk�^�ʂ��k�U
�}����]OX/Yߵa���>������(�x��oʿ�ܔ���Ĺd�f�f���-�[����n
vvr��
�E;�@I����;��׫�IV�<��, �?�����7qi�=��|�����
Ʀ /
U�6L�J>�=}��]�,��L�$��U[L���w�-Q��~�8ξ�^^�ݸ�ܳ<8�������Z�M
��t�!���2/ۯX�M�n	Vm}�d`f\~����T9ι��4"6Q	���5�ƾI���q*
�`m�����<6:G!!i�����'�I�L��\�3��Y�;a���9
  x��[�n�H��)H�V����\�:ƒ�qOGr:Q����E�b3���r2�V�b{1�4���GQŏ����H�:��s�_�����m�f��>����m�ˢ'F(��u�s��!��hc[?^gW�߬�����0���G�A?|�bh[nw1�hH�����|�/�i�u��%g�5%�O��x���|W�v�oᓟ�c�mzL]B{����eO�(_�Y���3�7M��M��4G6��0�w~�5t] |	�[<p	��%�-O�HG��b��*�-�s
6$nL�<��|��Ғ��:݈�'�����ץ0�YpÁ�`W>&��&
�����1(�?i�%��>��!]�|���l&Fmj
�$�qc��l���Wh4i0$15�;a�db� ��NE�d�
ix㴁�$J-yU��G��ׯS�BI!)f��#�nk$����J̉�a�iRJ^����ow�[)/�"$�Ső���9u��@�d3d����3Я�Y�f`�I9�����|*P0,N��
̥Ͱٲ�fK
u�)��a����
H��%oQ�EZH-� �z�t�M��Y\�ZԦ̡tɉ����1Tnd�	
�����!�En+�D��*��:"�*IN�V��K�(Oa�.q��O��"�'԰f��p5������p��>�U)�?k߉���XY�.�U����N����Lt@�K�8+�Ѡ8Ko[��<(����M���e�PY)�5R������@��g�`E>�)g�PN�`��;?��a+��.���k��U�1�(=��#���t�m`%T��H�� �'�&����h���tO�"M�~��P��R�+v$ ��B�u����7P.�1jf��E$��[vt���g:�,�Ӱ�Agj�U��0��``-�X��.Mkqe5
�b��.#����V�E�a>���r�1,�O4�Tx	� E��؏�E�6�q�4n
�L�f��W����YHMN[�5�C�q�<R�����R��e
"��Tr@u��]��w󛟧cf��%ƈ��h��_���7�e�k�F����E���f�L'.#�ӱ;>�t���m��E[�;�b�'�W*iD�����%={9����i��D���%R/]�
�JU�U��rH"��j�B&����mhWU�c=���:��j���0�73of���ω�EݗP��1��hC^�2�t���
����z�ר��G�*�^覫i��Ww�����#�Ī���D�"�'����i@[ 0j����(�O$T�=�C� hG�/���:=��\�@Y��aN� S����EK�UB1#B~�d$�������ɷ����#��O��̓1Е(�
id��H)$
�ۧ�g���2���w���/�������W.����#1и�B��ߣꍀ��M������p��}�5�TԹR	uR&�-Q���8M����O���y>Eۈ^�@�r�㱆[>>o�*\�h5{���s>Kf6��e
��Gf�q'_�ef�pdh��Sa�@-a��و�ݛ+�>
�0��� $T���YH��	BL�@��$���d.<�W0�g�,�Û������{���PZZ�Ici��FF ���Aɗ�3�!GQ��q���G��D0���-/�V�&��#3o\
��\�Z���{���}q�\�>��6Br+�#�qMY�歹H��N�����rt�1�8��2�K�a   xڳ�L��O)�IU��O�O,-ɨ�O�/J�K��R �����̢T�Ĝ��Լ��.}�;.�vE����RR�@:+u�F䗃]�\����\��(� ��/�   x�]�1� ���S������\
��W4�}�F��
)��J@�� 7�8)   xګK,*J���� ��~   x�]�1� E{O�C�q�ha�-�
�0@ѽ��iOP/�dl�&�LBfJqӋ��H^A�-�������'��� J��RB��bD?(�B�DZ�8���(�P�X
L#��sg��#i�7��~6EBԄ   x�m�=�0@�SXY�J(=܀3T&�MD�D�=t���+b~�۰V\� t1��̆ז�
MB�D"�T�cZ't.+������9�mp�mH�PA�;~=m�F�^�����b�CC!�v?n����<�� �n>͏   xڅͱ
�䉤i����M�������vNG�u.���bw�5�iV����?�b�
�o
�'hf��&��P��N��E��wC?�f_�׉��hiDq�4e�Ȗ�����yH+?�3��!
M�R��jCE�S/q��uI�S   xګK,*J����RPPPO��KQW��S�Q�v��s�NO-��L���T�URRPSSPL,-ɈO�M���,��O���Ќ)���	 �/��   x�{�{]bQQb�����zNf^������R]bRq~NiIj|IjnANjj��fbiI�~rFnbf�^FIn�^j��X_fr~������ԂĒ�F��b��ļ�T�y�0�yi���`i��lJjq26Y��& Ӣ=�   xڕ�;�0EўU��$���hX��G�'g\���(X[�!���~����`�8w h�
P�l   xګK,*J���RPPPO��KQW��S�Q�v��s�NO-)(�,�Prruq
,gvVNId���/��?b�   x�{�{]bQQb�/����zfr~������R]bRq~NiIj|fnbzjAbI��fbiI�>HM�>�H�L/-JMI�+�KWҁ��Z�1�5%�D�*�$3?O�('3/ݖ��܂����%�@��z%�9z�yJ ���\ p�:�w   x�{�{]bQQb�/����zfr~������R]bRq~NiIj|fnbzjAbI��fbiI�>HM�>�H�L/-J�+�KWҁh/�,�I��w��'�d����SR���H+��*���䤦�(�Tj {d1T�   x�]�;�0�H���M	9'�cТ�����^#��b�+�4�O�f��׌)ᣭ+ h�
���	Č�la��Ed�vXX�+��;Z3�R�x��O��j7�7�M𰌠��LY�@k��?��%�oi	�[GjvV�I�׮�>z�<V�   x�]�A�0E�$�a�
�Ս���{��c�y�[[W �8���Ԋ�}:��%�v�����W�nDcbfщ'�+��S�2B!�E�?�;��g�B�D�#��S[	^�����~/:�=   xګK,*J���RPPPO��KQW��S�Q�v��s�NO-)(�,�Prt���SҌ���k �B��   x�]�;�0D{$�r�DB�	��hI6��Z��\��#q
h����^���xo�; hܐb���%�*tq
�������X���
��p���èU���|m���?.dgC$���:�5��ER�<{GCC�   x�]�M�0F�$�a�HLٛ��{����?��.�p1�+HEc��{�{��c�pi� j=xW��Պ}�&1]�EI3�jZL����n�>I�&/f'�î��]���Yo
`���S��b�2��"�����_g��!�O��Ul��B�ն,^��C��   x�]�;�0D{$�r�DB�	�� hI�ៜuA��Qp$�@,��n��y��z��3>�� :;����b��]a�Y����,lƺYƔ�����d
Z�`�ej���X]2����!Kg��_��#��T�G�N�,�y��C=5�   x�]��
F��F���@%ؔ��1��8��CB>9"�:��U��4U��f<��   x�{�{]bQQb�/����zfr~������R]bRq~NiIj|fnbzjAbI��fbiI�>HM�>���Z����W����џ�Z���{x%H2U!E�45�$3-39�$3?O�:'3/ݶ��܂����eP+2Jrs�Ҋ�@�4>�<�   x�{�{]bQQb�/����zfr~������R]bRq~NiIj|fnbzjAbI��fbiI�>HM�>���Z����W����џ�Z����O�+�LN,���S�*������F��$5� '5�j
(��
�7(W�Rp��S�GG�u���-KOo3�w���l� �{(�����Ԟ1�=��2�y���8�N:�r��9螒��;�)O����1?1e6����N0�   xڍ̱
�*����v0F� ȝ�c�-dRp*��#��D�f:k�X�jc�����B뱣��rl��WӠ�
J[���	��[��R����?@1�9X�NB�)"�j�2��+u,�(Z5�/�Yrkͯd�9�q�s� +(4�_nz��c�fk�� K�����w�7�wVP(�$�?�O�<   xګK,*J���RPPPO��KQW��S�Q�v��s�N,-ɈOM�,)(�,�Ќ	���j �`l�   x�]�A�0�ὧ�t$��@o`�
�G)�2T��}�<��]{Wۍb����ǧ�ɞ��_�`�<)�����xK�?������}�{���O8�4�+F�J&����a��a�E�M��

   
   	pHYs     ��  
MiCCPPhotoshop ICC profile  xڝSwX��>��eVB��l� "#��Y�� a�@Ņ�
V�HUĂ�
H���(�gA��Z�U\8�ܧ�}z�����������y��&��j 9R�<:��OH�ɽ�H� ���g�  �yx~t�?��o  p�.$�����P&W  � �"��R �.T� � �S�d
 �  ly|B" �
�z��y8�@��P�<
�%b��0�>�3�o��~��@��z� q�@������qanv�R���B1n��#�ǅ��)��4�\,��X��P"M�y�R�D!ɕ��2���	�w
��AT�:��������18
!%�2IIkH�H-�S�>�i�L&�m������ �����O�����:ň�L	�$R��J5e?���2B���Qͩ����:�ZIm�vP/S��4u�%͛Cˤ-��Кigi�h/�t�	݃E�З�k�����w
���9�a�%�m����;t;|rtu�vlp���4éĩ��Wgg�s��5�K���v�Sm���n�z˕��ҵ������ܭ�m���=�}��M.��]�=�A���X�q�㝧�����/^v^Y^��O��&��0m���[��{`:>=e���>�>�z�����"�=�#~�~�~���;�������y��N`������k��5��/>B	
�L�]z�x�����������e�m��`�`��Y�	�����Ӈ��G�G�#F#���
�E<�~["U]�X���-^��N�Qg,B&�8HBt/9��Z*!#I �$���p���"��Q��6�K,�y 	�zE&�d4�B���5@i�|���]$�T?�x^�|퐤��$�Y>�����Ƅ᫙R�"�X�)�|�H
�~
h u�5r   x�{�{]bQQb�/����zfr~������R]bRq~NiIj|fnbzjAbI��fnj^���i|Nb^�>��+�KWҁ�-�,�I�h�J�u)$g�g&��T�d��AƤ攀5y� ~�(�  x� ��PNG

   
OiCCPPhotoshop ICC profile  xڝSgTS�=���BK���KoR RB���&*!	J�!��Q�EEȠ�����Q,�
��!���������{�kּ������>�����H3Q5��B�������.@�
$p �d!s�# �~<<+"�� x� �M��0���B�\���t�8K� @z�B� @F���&S � `�cb� P- `'�� ����{ [�!��  e�D h; ��V�E X0 fK�9 �- 0IWfH �� ���  0Q��) { `�##x �� F�W<�+��*  x��<�$9E�[-qWW.(�I+6aa�@.�y�2�4���  ������x����6��_-��"bb���ϫp@  �t~��,/��;�m��%�h^�u��f�@� ���W�p�~<<E���������J�B[a�W}�g�_�W�l�~<�����$�2]�G�����L�ϒ	�b��G�����"�Ib�X*�Qq�D���2�"�B�)�%��d��,�>�5 �j>{�-�]c�K'Xt���  �o��(�h���w��?�G�% �fI�q  ^D$.Tʳ?�  D��*�A��,�����`6�B$��BB
d�r`)��B(�Ͱ*`/�@4�Qh��p.�U�=p�a��(��	A�a!ڈb�X#����!�H�$ ɈQ"K�5H1R�T UH�=r9�\F��;� 2����G1���Q=��C��7�F��dt1�����r�=�6��Ыhڏ>C�0��3�l0.��B�8,	�c˱"����V����cϱw�E�	6wB aAHXLXN�H� $4�	7	�Q�'"��K�&���b21�XH,#��/{�C�7$�C2'��I��T��F�nR#�,��4H#���dk�9�, +ȅ����3��!�[
�b@q��S�(R�jJ��4�e�2AU��Rݨ�T5�ZB���R�Q��4u�9̓IK�����hh�i��t�ݕN��W���G���w
�J�&�*/T����ުU�U�T��^S}�FU3S�	Ԗ�U��P�SSg�;���g�oT?�~Y��Y�L�OC�Q��_�� c�x,!k
�M=:��.�k���Dw�n��^��Lo��y���}/�T�m���GX�$��<�5qo</���QC]�@C�a�a�ᄑ��<��F�F�i�\�$�m�mƣ&&!&KM�M�RM��)�;L;L���͢�֙5�=1�2��כ߷`ZxZ,����eI��Z�Yn�Z9Y�XUZ]�F���%ֻ�����N�N���gð�ɶ�����ۮ�m�}agbg�Ů��}�}��=
y��g"/�6ш�C\*N�H*Mz�쑼5y$�3�,幄'���L
�B��TZ(�*�geWf�͉�9���+��̳�ې7�����ᒶ��KW-X潬j9�<qy�
�+�V�<���*m�O��W��~�&zMk�^�ʂ��k�U
�}����]OX/Yߵa���>������(�x��oʿ�ܔ���Ĺd�f�f���-�[����n
cV��V�tqٽw �d�#�jz9m�9��9f���ѐ9�Ѻ�N�B�ǆ?̝�{~�I�5�[�e
 ��O\;�����BJF/��
؅���<�B��-�`��n�~��V�����[F`�Ǆ�n]�Q����������{ ÚS��/��3OEH���8�ٻ�Jￔ'jj��'�ny��BH�� ]@G��`�h5������k��c��?2����O���*�� )X��@��?����h}�Gf~�
���Q^�9����Կ�E��z�����gNRz��X�����b�{�s�3�ç��R�Y�R)&Ql
�����f����-��!%���w7�����W��B��Ik���>E�3Y�H� +�E��Ȧ�H�B,[vqu��+��>��:���ـ��$N*�Ͻ�X�ӟ��������)�L�q:Ӥ�Ms��/��>�5�S�mOq��Ep�@�U��3� #S�v�6cD3}�����3m�#� �ò.���T�Ć}�vܙ��S@�T5��z��W߅�T*-���s�gn�bx�O�4�<EEI+"j5I��HZ�F`�(�Ø�6Oc.摑�!�r���v�����3�8�g϶/i� ?���I�󪫮��������d�&$��oE��"�3��!�%Nѡ�a!��BS�9�P7UR:�	|�U�L�0f�9e|�����;���)`k�R�m5�|%>�ծ��ʏ^w�u�Z1�\6��h��-2Y�XE�J�T�s
J�2Hף��;�ɎI�k�� �
1i�aK��XX����D	��j��yn�y��
�),��Y�HTt�hX�E8_���8�)Hz�u�	��-[Cff��q��PFG
�a����
�uuX33��G�Gg���R���\�:�8Li4�$��������S�Ǧv(��΃ıC�;�0�I,�}u�d#eb�ƶ4�)�y)F��"
=r/�6݁���@?�	���m�
8���HӜ8Li�C<�"�<�����p�г6�����>�q���̷Q$y2ZE{%D�ę����G9����9Y��X{ȸJ��^;'e��jMh�X�l��g���f���Y��Y?\����q�.��M��x���Me��rE�����1��e�H��K�$%M5"�,Hi/�ta�B,�b! ��ڔ�sM+��Mπ�R�S93��ǡL���u�NZ6t�y(8	�e0v���N��&���!��RT��	���R)����<m��Q�?�'��D��S-�	�8G%!�j�S�{)�\�0b�a?n_��eo��Vqf�0H^�?���uF�)�HP���b�@q�.�țT��S�Qh-ɒ@�~��/�@���>���jg�%�4Y�����-�Xp`TS��qI��y�Ͳ����Z�60 ���W�j�8Ϗ���	��
�8	)�rv��,Eg1��p
�D�5�40��s��\�m/l�U.J:*.��P(I����D��	(Tˇn�ᙟ��KOm&� ���j����PL(91}�o[mӵBQ�"R?d�JA��R�,���k����'"P߽{���!��i��
� ������\]��g�~�Ů��F���Lx���)l�]K$��1�VR���hCg!Cʜ(j �
��7�]r�M���E:��������1�'1��L���� 2�XT��8*-b:��ZD�.���~`�]�m�N��{��m/���/�dӲ�e�tR�Y�F�Y���3N����9��<a�{'��l�&�F�$R!-R��7��C����Q�A� [�h�Ղ<�_ Zm�b[�)��$�~���i���_p�5�V:�A�R(�D�P����b�ff���{����5���:Y� ]���O�GW�I�����V��:R�0D)A���͍h��^ko��T8�v� �V���C�����Z��Uo�`	� ���^��/�20�E&�*en"F�ӨT���HK��YL�'�k����4��Ή�.�����M�56m�y�]��6	�XNt*!�$���w]z�7��?���%��	�;�LQtz�{+Yn�,x}�,F$X��y����∠�*A�+r����-h�����=3��s`�li��d�%̒���^4F~������}�<�f�`9���k��Ȥ��Q���i��`,M��yL.$�Π����<7d� I昘xV3��e{/�����Ū�0�p�o�֫�o<����08��c7����I���klz0{�}���Vo�����\�%�r����&����,�ѶM�e�<#U)��IM�(��l{ױ]�W�q��bׇm_x��<o�B.���}�� -�zi�O�8�E}�N�ƨ<A:Y�g��t��$�2@b�lQ��[^�{a�*��D������١���E��H���)��J�J	(R�М�Q\��,�Ŷ�_ȲT2�\��9²0��4�Ae`-#�DƋ��~MK��+W˕R��Q�"�������fM7��I����x#x�-�)t�r�G|{��)�4`^�Ŏ�L���]��0P ����]�v`]{�������b1
�@DQ�EQ�Z����9^��7�?�R�m����(��ߦO4�F� ��oEJ���bmG	K
8N�Շ��n��,\t�E�nذa�W^ѻv�عs����������㔏��,�~��W��Fb��H�Si}�6�o�k�y�,{�����7M�o��g&�mo��#5���|iKD�)ˁ�����떏����
��ģ<�e#�
RÚS�<���r�j�~��޽3�,��Q���d���7J�p�B���b�����H!4����A#Ǩ!Z)&fS&������1z	��4к�w6�x�;�mֱ,�X��6Rpx��ǆՖ��XLK�,�1��D����aG7s��o���R�k�q��1��������� ΆB�4�y"    IEND�B`��T�  xڝQKN�0�W�,�RmŰ�EY��,�L���n	B�:���8T�޽�y���'�y�cl�������d���#h�L��{!;pGu��ָV��u�U��޵����C�?g��-#t�5$8�7���*|����J��}��\e��G׊�,�'�gY\X$lDjЂ�C��F�z�	<��� Q��B�5zg:�F��a�>���CWÐ�E."�Pa:e
�=  x�2��PNG

   
   	pHYs     ��  
MiCCPPhotoshop ICC profile  xڝSwX��>��eVB��l� "#��Y�� a�@Ņ�
V�HUĂ�
H���(�gA��Z�U\8�ܧ�}z�����������y��&��j 9R�<:��OH�ɽ�H� ���g�  �yx~t�?��o  p�.$�����P&W  � �"��R �.T� � �S�d
 �  ly|B" �
�z��y8�@��P�<
�%b��0�>�3�o��~��@��z� q�@������qanv�R���B1n��#�ǅ��)��4�\,��X��P"M�y�R�D!ɕ��2���	�w
��AT�:��������18
!%�2IIkH�H-�S�>�i�L&�m������ �����O�����:ň�L	�$R��J5e?���2B���Qͩ����:�ZIm�vP/S��4u�%͛Cˤ-��Кigi�h/�t�	݃E�З�k�����w
���9�a�%�m����;t;|rtu�vlp���4éĩ��Wgg�s��5�K���v�Sm���n�z˕��ҵ������ܭ�m���=�}��M.��]�=�A���X�q�㝧�����/^v^Y^��O��&��0m���[��{`:>=e���>�>�z�����"�=�#~�~�~���;�������y��N`������k��5��/>B	
�L�]z�x�����������e�m��`�`��Y�	�����Ӈ��G�G�#F#���
��+{������                         ^w  �� �V5��{�    IEND�B`��f��   x�{�{]f^rNiJjNb^��Rf^Jj��&LTCI�8;3�L���(�p�(F�:z�Es�'e�(%�*��(�,K�/I�KM-��L,-��O��O,)j�*VR(�,H�U*I�(��J,K��dg�a�qեh������k�å�  4;��  x��%�PNG

   
q��;�^����C#��� d:��=�L�
���h
)%�J�f�Ii����(��)�R��>�|���i�H��v�E.��0�!�!�Br�ڏ�7~���+7��@	Ȥ�[������q�J�D��"�v���}�$h<ף�n�$ɂ�����n��R�a���TjU$	�X&����I@J�/��Ķ�r�*4�깙離0|���wBo( ��+���R����
�D'\�u|���\�P�a��"���c:A���ry��%�DqL��F'P��1W�23;K��߅.��0-��+��e�4����-@+�O�/�cR�~x������H'!R"�B
A�Qòm��5-��6�i"� Z���Q>SSGYT,Q�՘<r%C�A�$��81	]�4�k���UA���v�P�,s�v����^��~�He�-	���9.�V�21�F���o!Q.�ǚ\.�Pi�l_�b�Z���dd)ů�����:cc�H'�<h�n�V�ӗ�@�KfA��ߴw��_r�%(À!��C��n'1���di4�)p=�F�~B"�E�E����s� �f!%C��uˋ�1LI'2�t2,p�X$?����U��+�v����^��k|��7����K.�)B��� )���j����d�QQ���2o%���J���cV,[ƫ;wR/�qm��FSCi�D�C"�b���^2Fqh����eթkط��
���j�T~��>t�B*��^~�U~�;��Z6B��7����D�����	�Z����<A0=3M�$�F똨Gnt�GD�DQD���!H�R��@	S*i`Z6I�0��
�֭�>�R*�v�}�H	ĩ�Zh{�:��;ﾛ|_�D&)���T
����l׶Y22¾�	2�>�f�� P�ב��<����ض��RH���ٶ}/��%r���ec��{gp�
�41M`o
z6����	��?ڶu�O�{�}�>eDO(Ä8F1:����`t�b\ϥ�j�dd��B�J�����|����I��qΙg�{��a�&�a ��0�R!�,۶��NKæ�#�c���&J����������rŊc[��D�cM�5a�$�7���0����C�R��&����>���8�e-�����[�s)%^x�C����C���PB�6��Qʴ]�U�o~�u�|�J��@ґ�����X��۰8|�0��)F/f`` �q�}�uq]�00M˲�<�L&���d2�����J),�bٲ�����J{zzzg��k�|��/ͧ{�}o9r�-_�+^߉FwD��)�N�3
��|�uQJ���0,�"��G��>CC�?��Q�7���9Q��j����y�����*!-t��$4-&�NS/���u�=�ˑ�fq]�ց�G��LN才�iÏ�<�����/�}�
�0����u�<��[_d�c��g�.L��2
�:���:������T�xi��n���X�M�%��ݑ�i*�n��w��D�'�l����z�M���    IEND�B`�FF}   xګK,*J���RP� 9�  x�mTmO�0���0ޤ8R���o4���$�&�$�,�Lꒀ�d�t@��v�Zj)���|wϽx#؊ T�o����eSf��J��S#\-C�=C��{��Z��tEU��t�/y���.z{CG��L�y�y���˕�S&D%�ɗ��/��L�8	��| 1ȴdU-�dH��kbopIVlUs�X ��6R�0�#���ğ�B�g�
e�Iu9Sдw�b#�k��b��A��]u�&���p7;��w��ڿ>�J(��д��i[�]>�4�����N�����e��DQ+$Eb�oh�≥��<qi��`	5W�`�Abd��؋
��p4
A�*�*	��C�4�ڸ֦0��b�\[�5K��iSx�X���H�H8�4GnM�-7�:�>bcT�nP��_�g'/��^����Ny��w�e��ћ?օ�ӌ��\%L,I�Ǜ��:�@���!�-3�(�=����0���W���ëa��l:s�h�P�L�fT��(�K�|�o�8��y{���H���-X]D�J�d^$�DiF��#�,Y�P���	B�Ճ��k:Y�R�2�vI���X�U�%�X�-Y��}��>7p՞?"
��mA�h�ֹ�`�����8}�x���.�]$(g�󇫉G7O9�$��YD-:9O�ХVm�_X�s�F�!�riw���n�"H>s#c	��*Z�$(��?�%K#�ۏť��B�'����]{��r@�����KU]�&�N/+L��eKGvce���ACv����̟AO���ԭИ��Z$��-u�Y��$�Q&4�����R+|ww�S	ޝ0�L��ڒ�j�.����Nʓa����נ�n��-J�]P;��jW۽�n���rDY�!T�-��N�l=��euAT���:�Zy���,g�~h�[
�
�/wQ�����S$�6y[,p�[�,��u)Sc��XJ1�Mm������;��x۪پSz�V�U�=�c�h������΂m[=��v�10�[L�(ڿ�B�zֶQO�|}"�=H��o�Lw��/�6��"W�������-��Wс'L��Ӛ�j�!�����(�
J0ٺ�p	�񌐠2��NℌWĐ�
n�*�[)(��"t"}iӑu��f����/�n*�%4�i���%a�"�0?�|맧ܶ�T��xo�~`Q�\��cce�>��_�O��jY��3�^��C��[\��L8;'4�����<��ۯ�����	���2%/�Y1LU�=�'y�yc����;�N�r[�'�<���5  x�u��N�0�w$�!x�-%q(K刡+�	!UUd�kɎ��Bվ��+`'�HP��|��������A��3����4�J��)qL�.]��E���$7y�]��m���)
J0ٺ�p	�񌐠2��NℌWĐ�
n�*�[)(��"t"}iӑu��f����/�n*�%4�i���%a�"�0?�|맧ܶ�T��xo�~`Q�\��cce�>��_�O��jY��3�^��C��[\��L8;'4�����<��ۯ�����	���2%/�Y1LU�=�'y�yc����;�N�r[�'�<���5  x�u��N�0�w$�!x�-%q(K刡+�	!UUd�kɎ��Bվ��+`'�HP��|��������A��3����4�J��)qL�.]��E���$7y�]��m���)
J0ٺ�p	�񌐠2��NℌWĐ�
n�*�[)(��"t"}iӑu��f����/�n*�%4�i���%a�"�0?�|맧ܶ�T��xo�~`Q�\��cce�>��_�O��jY��3�^��C��[\��L8;'4�����<��ۯ�����	���2%/�Y1LU�=�'y�yc����;�N�r[�'�<���  xڍTm��@�~p�a]�l M�~�I@8��Ez��%�6�MRw7���~�C�g��'h
�f��gfg��_��4���1e�ʕ����"%�9��*��]x��_h�<*hcV(����
b��Gd�'�k4؅�ע�5�HQ �k�k-xU3�V2[�90�(%���F�4���X��+`�fe��Qr
s(MЕ���/��8f�VaR����)�ٗ/�p��R+��ؼ���x�u�C/�q�z�����&Vg8��ƌl55-��Zxx����;��[���CN��f�8	E�"��3х���?�Kp.�w�~tݍ�w�i0ط<AX/���h(���@��{-=_N?0Ǖ�vx{��^��G"���İ�����

   
   ��ޜ   	pHYs     ��  
OiCCPPhotoshop ICC profile  xڝSgTS�=���BK���KoR RB���&*!	J�!��Q�EEȠ�����Q,�
��!���������{�kּ������>�����H3Q5��B�������.@�
$p �d!s�# �~<<+"�� x� �M��0���B�\���t�8K� @z�B� @F���&S � `�cb� P- `'�� ����{ [�!��  e�D h; ��V�E X0 fK�9 �- 0IWfH �� ���  0Q��) { `�##x �� F�W<�+��*  x��<�$9E�[-qWW.(�I+6aa�@.�y�2�4���  ������x����6��_-��"bb���ϫp@  �t~��,/��;�m��%�h^�u��f�@� ���W�p�~<<E���������J�B[a�W}�g�_�W�l�~<�����$�2]�G�����L�ϒ	�b��G�����"�Ib�X*�Qq�D���2�"�B�)�%��d��,�>�5 �j>{�-�]c�K'Xt���  �o��(�h���w��?�G�% �fI�q  ^D$.Tʳ?�  D��*�A��,�����`6�B$��BB
d�r`)��B(�Ͱ*`/�@4�Qh��p.�U�=p�a��(��	A�a!ڈb�X#����!�H�$ ɈQ"K�5H1R�T UH�=r9�\F��;� 2����G1���Q=��C��7�F��dt1�����r�=�6��Ыhڏ>C�0��3�l0.��B�8,	�c˱"����V����cϱw�E�	6wB aAHXLXN�H� $4�	7	�Q�'"��K�&���b21�XH,#��/{�C�7$�C2'��I��T��F�nR#�,��4H#���dk�9�, +ȅ����3��!�[
�b@q��S�(R�jJ��4�e�2AU��Rݨ�T5�ZB���R�Q��4u�9̓IK�����hh�i��t�ݕN��W���G���w
�J�&�*/T����ުU�U�T��^S}�FU3S�	Ԗ�U��P�SSg�;���g�oT?�~Y��Y�L�OC�Q��_�� c�x,!k
�M=:��.�k���Dw�n��^��Lo��y���}/�T�m���GX�$��<�5qo</���QC]�@C�a�a�ᄑ��<��F�F�i�\�$�m�mƣ&&!&KM�M�RM��)�;L;L���͢�֙5�=1�2��כ߷`ZxZ,����eI��Z�Yn�Z9Y�XUZ]�F���%ֻ�����N�N���gð�ɶ�����ۮ�m�}agbg�Ů��}�}��=
y��g"/�6ш�C\*N�H*Mz�쑼5y$�3�,幄'���L
�B��TZ(�*�geWf�͉�9���+��̳�ې7�����ᒶ��KW-X潬j9�<qy�
�+�V�<���*m�O��W��~�&zMk�^�ʂ��k�U
�}����]OX/Yߵa���>������(�x��oʿ�ܔ���Ĺd�f�f���-�[����n
!�}�w�Y)�@�*E&�	���X����.J7�$�'|$�˒���]�%��@�OH�L����ZUL�Ћ��.^z�s��t.�
��N&q˕Z
(4ޡʏ[Yv�e�O<ֿL4�CьFhF��   xڅ���0@w���$��8��'�7g{@c{����·�����{/o�q�G��2��p<A��u�8+Y��#�V���t7��h��ؿ��������:Tu"�����$j�}er^���F��O�,n^E
�f�X�ϘG�y�((�@\��(E\�G��3����G$;� &�Ĭ��'���ߕ��qPQ��U3�ע�P�)��%'J�wX�
-E�!BH���H?�q�����Q��l�
��^����湜��}�e�J��}��,.����,�C}6���h-B�r��a��
eAJ�-̤H�u�Y&)���p*р����� ����.�XC�hW��8��P��?N����;�@�0�0KSz��7`+���dJ�%�A���@������Ԧ�z��A��8>#�ß{�_�M��;�z��p8�V%k/y�Xas;8��%Sϯ|�G�.�*�^����*�W�a=�qJ!P&�Y9�<QG�����q
�^��9ܮ '�=D�#X�|*�LP4���
��/�*��2�d��&1DP((���	�	�M�6+�­�J��	-����I�� �
{�vU�D�4Blʑ�zܝ�WA�K����*�-����5vY�K� Ĥ�J���/�ŋɨUd&2�D�ȳn)Ͱ�d�f�$k�]�ic����yK`j.;�e{�z�%"���2�S��T�o����+�K�/r$�#׵(�
L�6G��"�1�\�n��nY���P}]Q��$��*����9�z]���r���'���:b;��Y�wZ�7��vZ]u`K7�Gu�R�V��e���`t���?AM^&��L.O�G�9I��j�PX�M�颞ʩ���!${�YC�"$ޛG����Z��IE��oےvLCn\&ᆶ!�
5�FƵ�P�W�oT�7����h$�W}��8M������P���&��X�c�#��9ȸ���tm�^�y~�Z�γ"�h��]�:��r5�r�	�������������{�ni�;j�?ԓ��V�|톇k��I�m-������}[�� �'�  x��\�n�F��>�Y(�MYNҴ���Nd ]9���
9��K��p(;��w�Ϫ���sfx�HY�.��Z��<3�͙9��O��{0a"���ֲk�|'p�?|Q�������/�<���w�z�mp�>\�ڗPI7�777�d��cLZ�6��@>�\�ְ)~�Oɥ�^�o���c�kآ98��1� ��툾�P�?��贩y��pt��E�"�UG��|)>�O<�k)����A�Ik/���I��P�tl$���8<��u��I�B&�L"H60G�L(h,��bmׄ�yH@#)bl-䓕�"}A8�+8�0<A4��S"�\�й�w�|���g��	8J�b	E� ��z�HP�p*^�}�n�s{0�����|0�M=И�� �`��
6��p���L�0�'A�˄��,x��AE�=����#@�
��*<��V+���1�JpZ��c��ĸ-w���.&ý���1%�fr�8���Pu�[�^f��G"�l�K]:k�el�*1�]�9w��&�����Y�
W�_rY+����w=x�c�����5�����}�
@��._�/�~���84��OEW0�*TQ?z���~���7�g�?�?��ܽGCl �D��U#�Q��޼�j������w)��6���Ώ�+��`t8z���}����8"��E/G����E�4o��M*�ہz���Ƿ[N�k�K����B1"}�-�z�]�`]Ypn;�-�9�˙�-�{I �ݜ6��U��S�Mn�8TJ��U̕��t��G���V�f�C{�}�"�]���X�I�=OA����B9&�!�|�i	�(��	p�(�$�Q�L�+z樵n50 
��+l���cA@��	Gh.�P���,�
m����,
6���5�c����J��M5[�:W�j���������Y����ؤ �~+ 
Q�c����$��-T6hdN�O-��ȋ�����mĔ����V\�.��N A_2�]�P]�"6W=��3G����pg�ʅ�u�1!�5�4fQD���6�Q�Е|�������5fS]h$ٯ�ݩ�Ư�ݢ���ّ�7�%�Nol�s�rT���C�ĳ�/�eİ67Jb��(ŭ3�yr��i�ie�
�T
���DG7���+���$Mە�f��̦.��!��6��2�z�2@�I���H����#�[�����]�;�W=���$�.�x��2M��v?���Ä�΅a��Q	�
tF����]��Xh6˲�B)���xE�Wv��穫9�:̬�|eji��BY_�a�~���	�Gc����녂�	-����B�|�N�tAP���ր�K�qO@�:�	O�_�Q -���4_�/��U�d�i�h���=���W3�f���
�N�*��US.9X�~���`ťoi�O�3
)]�b�-g�B�T��]0�t�����w
'FAD���{ё��t ~��F>p�xމ�������F�ğ��2��k�W���Z.�~������.J5mf������g��$�`�-�������}�G�<�em�~���>S���͹�Q�?��Tr�f��Z�s��u�4�fR"o��R���~
�EɌ]�Z���s]�(���
��������_q����~�먲���ߡУe�3�?�{������s����8���?��m?Gɿ��_~�
�q
e8��𿘂0�)��wS�������*��:�[[����iIhP?9���C[Z�u��#!Y��~�����4�_0=�`��W�E�����[�O��ï�?��%�"���D�;����S��?��{�Ǥ <�i�"�Ť ���9���Ǎ]�����D=���T���V���3�C�?�u��p�=?���~)��EP1N�rB�?��ϕ�?f��7y�G�]��{D�����_����3�?G��߫���T����k���������񿽝�e��_�o9L�y��$�/&-�O������@p�[���ez�f����K�ζ�����NĿ��������3�����k)����s��ݿ��OR+�������PY�ǲ��m��j�}Q�%e�o��o�����3���&���6����f��~{�b�Â~|J���?��n�ߪ�_4aQ�5�o������L�%߲�_��X��x�s���?>�OK�㐿��!Y���������L�R�����Y����6^�����>��?Uس����\��ɫ8�OY�ƿ���w����m���OL�?g�} �8�?��yV�����g���/���G��d������ ]�ü�&R�/�2o���f8�2�V��g[�z�F�{�{��.��_%�"��\W�&�:-+��}F-�ڋ=3_X���e�����¼Fd��Ⱦ�"�}~��b���;(���ᾔγ�s�7��K���!���*f�_z�\ͤ�M��̪rL�����c��3����>�*;�b����w? �0���6�0_1�l3o�f
�g��N��7�����,�}���Ө/�9V�<ѕY��_,�O���7�b���Gv�-
�J��>FO�Tg��:�Lw�l�m�T���x^�B���F]6��xg��dh��ʕ�X�T�궊�xu�Z��ߍD5N�z����d�o�Ɲz �T�\���F��t!�V�f��@=�_�'f��{�����G1_@��fK`��^a��ߜN�ѯ�>E�]z�@`b�� O��s�hm���n�!�LL�$w2���!��kVFBr_��Z��c��f�$��-�	��X�u�o��XL�ѐ �I� R�ō�"�焆�h �|*dg3N��~�"6"�����QG��,�[�T�����B����f'?}��-֦^��}q=c��W"x���*�uqwQ��^����|�Z�J��Y��N��	>+Ȝ�+�����?���ū7I����J�Xmడ̛T8EsMAS`�WE��W���R���^�5k:F<�.M[�_o�k;l}m%�:w�p�ԯ
|��2�\G�d|k0��C�m�+C�!��B0��u�����ay:�������6���i���l���F�f*�6�d�X�}���!S���e��~��lh+���#z�Z'��l�XO������_ �,`>�)֕g�^H��8�p%(�e�{y�vS�D[˼��:G��ᘈz��K^P��q.�b]5���gņ��+�-�e�V	�-�Nj/���O���^�-�[���e�87���;�R�:�f�zӉ�h6j�4�F'av
CA���C�ih�V�H8�x�5��S��;��`n@BHoԩ`2�P�hQ��@�5�͔��3�laL�&
�IK��[Iuh�*�2⾈��b�m��@
�3G�K�ǻ]�!xO�9k�Fb��,�r]�@�1Xr��K�����BPo3g��
��@}k5�
��fA�Qۉ�n�g��
�]��u�YT@B2:��]��6�bY��t�V`U����%и�&=����aYC&��)�dry\hqs�	��U!�3�K���*���$���{��@&��B��Z�q�'Z��:]3k-��{ꛕ������~������]��\��}��Kc�,m��d�0+Z%"5�v�{0��6S-Ht�j���E>��Z�n!r�o�ɓL�'ᨁ �8e���:zQ��}n(נ��TU���;^�v�Q��c��'*���n�j�T���Sc^��7N!}�B�^�G]�+85��@%'%�7��郬}�rN(�a�/>'k�t\��]z'
����.o��e�\�v7��˫������)�P�\�E|
eL�'�55��gHذ8�i=�1Q!�z�$�o��9~��C�Vm�0�ƾ��f	
.��{
5$���쭫[7���t�.����A�۶PH�s�	���zE
�6�Ԭ֌&M�7!��g� o�w�����d<xc�������R�~~�+���K,a�ʈ�4n__)�OV8�s�N��P�����V���t?�x�Ux���\�[�v2�nVZ�q!?�ˬگ#�
�b�\��hWak�oC/0V=��՜3�Q�N��`D�m��&-dS��@�����Ǳ�1Ӥt�aV�?�ͪ$�
9]��)+h�L�e�(�ڼ�z��~��l=r���ggl�oZa��+�Y'`~����+<%�Zz��G$B�j��
1�`\�~4��H�~e7e��:���l�<�k�T9�$~"�4��kv�_�^��K.vN�zm�����PPz���(�օQ�(l-��լ98eа��Fo'1�79��%�/xW�z{@
��iX�D3�Vג���="d��#�����f�{۲A��M4�T1us$t�M=c"��7TJ~*g@7o�4r�	~�{���ü�
斃��u��M��s�u�⛛WR��:�HպBgj3��V��@���8�WR˵�KqN������>D�F�~X}���#$>�,ئe8):̘V!��b�End�8�R'ɇ`�a�N��E}Y?c�c%�T��
��h���f8\]�ǱH� H�Ɲ�h@�ǘ�J|~�
kU�}���4��MF�j\��20�E2o���n�nλx�Q��>)�N-6 ���aw����R��_���[&P^���@��$[�&�9P����89]�ᡰ�8>vr��1�D>��5S���Ib�x���(R�5T�eI���+j/�z_Ù��Z$f�������)Q�6�k�B�R�p���I�K�	>�7l���s@Y����6(�\����5z��e�C>�$n^�6�|O�0O�I��V���D��T�[�'${���?�Q���澱(U�M���rsΰ`[s�0�a��r\��0�G�9��s�~����l>s�>5��S�q�����:��)/�4�9�e�����Wɒ��FK�!���G�u9#�Z���R�o_VO9���w>	�U�i�|Y���A��65 �$��$��i��,I����@x�x�[�n{��^[�jꓝ�@X�W��}������8�n~�3u�b��@¸���d�LA:}�\+*���\Y��Vײ�yX�ۓ��Ӣ�K�����u[	�&W�}[��(2��N��k>�"�l���ч��rH->����=�;����u�ץJJR���(�MS��G� �L�Կ:��sw,=�qj��4��05�T���IO���������V)ƒ_��c"�������%��ʂ��p(5J�.�կ+�F_W����U����ZrWVO���p�.���/t�6�jz�Wdq+���r�b*��РEy}�O�{�r? h�1��D�,�ކ� ����W�;Y)*�^*��c�~p0�dvfUٍ= �3G�� ��)2�G��z٥n:w,�E���ur�rP[O{s�-�x��Vl���P�$]d���{/�@�ˡ�'�Σh��*kO�LǕwvz�@�e��Ui�&D����0=�԰�sTLǔ�PyKD��z���b��<�N�Up�ʁ�|��(Q�)n2�	؇[ ��П�ς��p�bǮ���Z�
+�Q�������̃|��E��RL�Ǩ��EK�����x�sv�AF�m56i���޻�V}Fa�JkrP���ւ�y�Du�L��ҭ���d�X(�V���O�ł8�)�0e�A����L�x� �k)�L^7��c!ƺy�F��<c�Wp��	��t;-�()Y?U�8j����<�����
�H?�#2��4q��;�ND��p�g���ԯ������}>�J��r�j�0����5w+Y�	 *�Z.s�3�tS�B�����	���V��4�)��6P3U4���S!H�_�yz��z�ոf+>΁-�����w_���K�9m���B��{�j�t��ګ��k�M�8ҊJv^�AM�����`&�7�X;}��<R�9[hH���1O�~��'�Y�>/�mq��͡�l��р7NI����L�Rֵ^={�E-!>�ϛݶV"�F���V���?y(;O��@�
�YV~�8�nT�ѫ�G} ��Ȱ%Ur�ۋ��72��F$���zk�G!m�1V������{��7��I��`�MKdc�G��|F�Z7�b����y��(�#s��/lma�
��@�#�	�t�ְx���k�`�l�ف��U*V}\�{\�y ������x}���<	�TӈB��z��9t��7|Zܣ��Ũ��u���w��ԯBS���+�GR*�Q$-CKQˋ��3�� ��d�(ߧ6����pQi�N�OK�E��1��dcͰt�jT�
��dv�N$OӗN�ji�iO��}�}67��Omf�^W))��5{�o��-ƭh���D������Z��:sJ4^�#Vq��a!f5^�C��_tJ9IƄl�.@'@~L۩=,�+�82��~Di�������@�O��R�*Ph^vV��H���iLH u/^!��!v+X9F:�E����Ww��f��.�WP��)�ğ�����G��g�>�<� v��J�	�R�ӷ]���_��G��/}&�X�i�f^<f<�����uu���؇z���鼬w����"�+�"Y8��?���F�i���;lH��ͬ��1��Jg��A����JY��igm��
��1n�ڬ�o�׷�QǬ�[b45#!��=���Br6p�f���N38ٮ�e��_-�U|��W=z��Rֈ��,��Bܫ�ň�?y�ed":� S{.Y��x��מ�7��r�Z��Gg	�#�4���m�G�ᕏNɅ	I �o�$>�s?���>��Ӷw)�[O��~��O�����ڤ?�5)���S@�3s�������Q���As�0�@6*V�Js�a,��l6^Vg��׽uh�}�7t��5���D��@P?����L3Qu���(���BlZqZ��
x�!ʭ�G���������s��d����۪<sb&��1���X�Ch�+��������e����}�V���R�)�t��Omg�Ä=y�)� ��48�ҕ�j�Ӕ�\ρ�"b#�,��?7n�_��q1�4i��c�D,���xV��䠣Ub�ު��8y6�߰"j�ϵ�O?OQa���s�fn��푎��m5�>�L
���zJ�+��U_�#AmO;:����J�Ď��T?B�N����m�V�>F!z�A�9(�x@�����9iDD�2��Gv|�_][�ye�T���.�68�Nߏ�_��0�&���V��=s�Aņ�nk�&���OQ���B����|���γ��-[��tkj���z���>�;�l��7�(w�Ȳ�5��:8�1�y���Zm��' ����r�-��w1��t�z��5O�2�
�?��2���~�e�	��L�^���Z��i��g������2�>��+�8�RKR�4�:ua#z<�QCa�S!��[��ZY�7�fz���Ҏ�#o���p���t��n���{H���������ם��R��l��`����TNG�$66����l	i����Y�37�a;�_�0����]k=yӽ�~p�_����D�������%�#
�5�	[j���b�*��W��I��@�~��\�:�pF�h�럶���	+�r���f�'���� Y�pH�>dq*{��������x%h�l�"ԥ>�����7ُP�mm�|���ɒ<��J��Z�Kk�/�O�q��J?�׏|�I�ǫ�櫚-[z��>�2sL�C�S\)�M[��q���T�����m?E5
)?�.l��k���@p$<�|b�����"���Ӕ$s#QV��-ٽ�_iTb�n����~#9v��d
#��*����Y����B�NH�ӿl�V�V�fc2;~���r�Vo)N���y�Je�<ͽE|�?���-�h*+C
508	�ϑm�*����qU%� 41�%5�C�m��E	x5��ƺ*�ˑ��/vQ�y"*P�}gĞ8���E�Pg0
拽;n��1a�}���F��,�-m�)Ƨ��XTe�!�d&/�7�������o~�M��
���c��k��:��Z���d5��Kl�Nt���AVŞ��N�+�7!&��Qɴ�Z��S\J�ܻ�����h�O}��e�W����TⰔ��\
��J��Z�����������:������d��s:ӅCHO +U&#��l�+��|�T��c�����u�w��<dJ�e��=2�
r]b�%�P�֣@�l$ė�ɽ�C^���} ���[��Îw�-���n9Į5�M���mP��"�4��0j# ĈPԽ��¢%������-R�z��}mM1����8	�h�"�P׎�d����7`H�&��w�_.~#4�^����qFJ�F����R�dOH��CRt�hLNSz|j�ϳ�X��\��JNB���1�,�Z�H��t5
��\ �)������!QZ�ѻ���Y�ᛦ�����o�?��i>
������U�{0s�KT��:��+����sn�t���\��� h̓n�]gd���F�+���t��T�E
����
u֩w��L��9��e(���FT��N#�7�N@�lB �HYo�����Q�-X�4�'��1r����{_�B�vt2���,eS�f��:T�?߁*YW���o1M�G�L��G�u
S*����I}܏&�^�J�5�K廿9����,e����N>���l{�k殅��M��*�/���UOj08/yÇNtw�b��(���@�۸
�����d�.��H�iwѾ�:<�
��>�2Z/��}d���ôf��!�?����pS��o�����y��g��_�e��S���m�ǭ�n�~އ��0:�c| H��B�b_�_ѹ��,x���_�^F�����~[�h8	���٫�������~9���+. 3;�37�I7c��f�9�<�z�ID�w0;]��I��v��O�NY���^�9_ �ÖC:������w��V�{��Lp������l�]*��w-�}1����v�]?��N�t�tam��ZTݛ#<�G#q��%�c8Q�U!��y�c{�����2�f}x�/��%��f�8�l���A��:~�*��MC1w�跍Ě;�A���z�[k�t%�K4�.�b�ˢ\�t�aky$kz?ވ�+�.0�-K9�%><��}x��q�\߿��4�D "�!c�rW�̓����~�4�t6Qe4�?x���ש�Vg�,�5�u�\��0��0!�sm���S$���p*��^�Oʕ��т�9��Ph$}�qf��6��K`�zߤAT��\|@It�hq�)N��Ш�D�
���Ԫ\w}C�*��f���#��&3b>F��
�	i�5׼ЅP���P���X~F@1�lv�_�gA��i��DϦ�W���إ�yr?\T�����|Q\&�B�&�oW3�����;we�A FQ͚T��t'����$�z�m8r��l�sn��(/P�{]d_
1��|��F��?��*Zm����.ނ^rZSNqLD���S�ǀ�1T����Ĝ���	[?ׅcs�O��ٰ�<�� z�F�:�Q"�(�A��G�B�fY��z׉�ȃ%����%���ƒ�Ycs��肴�M"���Ym�Z�O]����K
>
���}�� ���������������G��w�8k�����vq�����V�
o� ^[s�������ɶ-&o,F����M���Lu��6U�Bڄz�I5�5A|_;�u�i�����dB�=��x�i��N�M���3��=� �x,c��/9��j����O�Wg۶+s������Zp{ǉ`��U��VF���^9�'3�M��f�:)���K�9�J��g�p2H�����'R_J�q�d��EV�.��=���q?�!y����Ͱ&Ę��Q
�d4
n�F#�.bq��NPeo$U-.�+3Md��-@� �c+|��ѳ��*
R[�顃���VJ�L�o�bں�(J��L=��mR�1�3JIkT�n�P,R���i��޴�B"�FUz�w2��2��R�]�*�����@,��=�]+&I�V�2'Nd���!���k��'s�u$���f�Q��]sb�:��s�M��(ǜ��.�}?�<h����摕M�dѠb��iY������D5{�]���d����g����p#��g�*�-g�q�\a���W�U>�FrB^�������V[9UĲ}�~-N��z��e>nV�@~�!��8��^���"�'#n�P�;��6���1���Ċ�{�?~Qg��-�i�[fAP0�R��E�H�ޜ�
�Q�ҧ�����.c�T�,> x�hR�>B��� ��l�B����[�&��,_�|3ɦ�rdO�?�ښ��%����K$��H[�`�*_��̄��F#��'
ه;�%�)ŏ����z=-��zz��FoC�$���� �Vn8�:Y:�컧��\Y�x,9}�O�;�9��T��ٓ+l��%�:�y2m
�%��j�8���)>��ؚ�$���4o����Ci�ϳ���5�N|jB������ʦ����d��W�a�a��0IP���.�t��� ߟ/��Ӣ�|ϻ�gI{�u�8|Z�4��"��L�
J�	���?/P~����cOzfԒ����fׅ��}Պ#E�-)�ѻ�:�Y�����LhRl/���z1lM|�u
���|��V1�q5�)H�N.5:~n>k<���H���XNpY$��.��� D�(W�B���
]&=-�����I���[1�'x�����S`��:h�L2pP��;��-P��{O�^跓��p��w�Ϩz��&�����[�����ަ�iXUHM�
o���rg
�)G�CWmՆ���e
Զϗ����oȦi���f��d>|�7�&b������(�<X�)}����.��TI��kh;XgV2W�øwkVQ�~j���b����Y�R5i� ^KOB�b19)̱F"a�|��c����L�r"?�u����ݷ��(�(~&y���)�hz�d0?[��{��Z���>��c~{�\����H1Vi��x����̦HI
Q�~�:2@h�ކ�A̓�А̬x �ufE�L�.�>�=ߺ��D㭃s,p�X���c/R�����7>�t'�{k7����8_�>=�	>B����k�e����=X%�|%��2/f\�ǘ~����"!�3���4�w$&*fMm�IL�'`����G���J{_]����^��F��C=�%sK \w����
����r������F��)���1<g?�� ��ׁ���/;)����PNe^A�(����݊���ۗS�=7�w�����.�<TT��yU���8L�ɝ��D�^��~T��V��h�fB���U�@� �ʕ9����w"�,f���xWP�0��c�Q�bCh�4c�Y
�k�mG.
C/2қ��XD�d��t;x��^+m�q�2X��:�;nfT����U�_��k�yM�=�n����3d�����-NM�0 
k��Έr��ě������׻G�67��hW��B�r�%�~빢�ˆ�	�V���?�]r����
3r����Z�BuE��/m�<C72
b���A�~�p���A,����f�͆�Xl͠���e>dD�T�A�d�O�}$�;�:�~���H`�
ٻ!�U�R����E�w�c?oJ�K���s=s�SD�=�P�Y����i���aO�O�VK�)�a��Yr��\Rx���ٮ� Q��oW]��S@���Cm�u�cIw�Q�N$X�ɳ"�w��R�!�+g���)9�q�rj�vķ?�>�U�� y/#�:?�VTH�"��.]�㹒�;����]J�f� 7���.!���� � ���.i����O�9���{��*k�C�;�Әx	���su*��2��*�eU��и=��4��1�����H�ܵ����N=�u}�x�H����J���{,^B��Tt8�,�{y���)��f��ڏd4ɶ�(Zj�Jr"�HxAN��=Od^F���[^H�p�?��֑�P5��}�B_�N��p� `ɑZ�
R�aQ��ƈP>란�1�Aڍ�;X��)���V2@\O[I�ْ�g�&�.��pu����R�@��I]�f	r��z@_����K�DN�o\
dSbx����Œ��w��I�6�ا�3 8YJ�&�Ns��'o�U�*����F,����yIERo��Yi�bS�n�u_���]?V� �v�V���6�4vV�sX����+��,�JH
���g��f��uʾ�4߯������q�/ퟯ1��sV���2�Z�S5���+��\��IJ��-w|�ۃ~Ւ��g
����A'��H�:�d�WA���%�+�	���#�Gy�˨�!���>D��j�;��\��M;��5e��5�;J���)������Y1�]�J���8޸�\�X����G�
���{� O8mcCz��"�;���Ԩէ��H�+I�Yl�aE��������T�,F�4qX��`�=� �ohP��|E�˄�?6)�� ��
gW!V��k����V&���9M�yV�A�L�t��I��^��;���,x��^��*ɔ��� ��c=b����X�+B��&�Y��&�ϲf~f-[�;�?H6kpAHr.��J;��S��r�� ��������<�]1�z���HOt�!��j��`;����$'W�U,�[��"{|SS8�š���$v��r�1N�e�2Y����Lz�}�5��c���jD��tt��J���G��j�-�;���k���+D*��te�N>�BZ�cL�p�k
�O@�U`�jy���)ҏh=�̃�
E�G�Y_��= ����b�-����B<��
5c�v���A�=���Qn~�iK�{���"DZ�L�cFL���A;����>�@�DN4�Ug-&��& W ��@�:I��d�x��b�x�b���^MS�g2�LQ��2�F����i�����!?��I�A의�>�P�F���,�F�)I�5�@,�6U��_ 2�lQ����>�=�@
+��u�W��s^�O_Nq��o�Sݪ^���q���/�q0�6��8���H�mʍ�t:���� \�qi�����,�
a=ߏ>�r�^S���ߓ�fp��dxq?O���g����Q�Z��j2_�"��3RK����{�=�?��@+��ty	�H�<��엃�oGʾߚ�	q���n�T�Ix43S	��b��w_���s��>^ue〽Z�z=bLv�j4U����{N`����}Rae��1#��ohɌ�H��QF�bE
Jb��=�CC��Ny�������>H�6�=u��% Ϡt���(\����������D����D4�$[>=�h:�
�L ��x��̜��>L\�&|�"Y���RR�Bq��13u�
�����A��H�?
6M:Ts���C4�TQ���8��iX�<W����E{GBd\�E��)t�Ӆn�x
��U�IM�[�=���OxQ�����`��7���'ս���DP!��Z	��Fџ�m _G���wIg;D];4,3}�G>�o_��%�"�=p��/m���!�>㒓������nH![0�/�0��ɿ���K�8�qt��oɴ�CZ=�ahG9Ng�^c,j�$���U�|-\l
t��L?��l������HK��D��mݧ�ޏi�y����������1u�u>�,,��Pn��>.������QU��fh�,��;p�6+˿U�0$��(�^�z�ԧ��9ȼ��R�!|��3ʌ>GeD�:�H��\��Ɂ�8��G���8-Lw"�J?��2�3T��O��eX#�=��
tqQ'_\o!UM�ݜ��X&����%Y�V��E|t��5�w��nv+�8d<Xb��;m�,�0M�+�#��&E� \��;P<S����ua��u�w:Ho�6R��KƏ���
����v������Y�3?��fRK�ځfT�ѵl7
�~�
��WA
%�V� $0U6�2����~���l��u�݉��-8�R�'S�������&���g�)����,�~��)~%���[Yˡ�a��|� �g��#р]s��3^\,]��,��f�8Jc�C+ ��b��$��K5-�[B�*K!b�^3
2��� -iA�oN4�_K��ţ�$�N��!�.�'�H��G��<|��fTw�i;���g~,��G�
F��ٔ�h�<��饔�z�9*M�֜���$/�p����C��T��d�
@������;��x�w�+X�~��W��&?�E��h�o��
^�WzV��m�CLz�[��dI6A�ؗ�p���8V�ͮ/�8F�7~��t�oB���)�YS�֢�ډ'à3g:*�K�\!��;�ʲ�ә1����ڹıF���r̩����*w��QV��X�>���:/R�~�1�}��D�5�o�"Ka�2�s�jAk��������=�@.6�q���
�Qm}�s�������Ӂ��A8q�,��:�5����8��/�1��\~��0O�`<�P�c_�s[bl4�2��G����4;�~�g�i����'}T"F��i�� ���}�F�k�1�G��A��!�~W��M)���Ik:օ4��Bd���9S�@� d��b�A^����R��9
�P�ȡ����[���uKjX��>Z���W��=���چ?���o}p�-آɣs�=֬���ǲ�kh���E?��Q���XiڰB,u1iLA����=ߏ��f۴��������T��{�����;w���8�vr]���YVTE#)MT#;5%W������w㡈(Lg¼�Tt9@qݜE�j�N��[u��Ҽ��A�3���F\�l2���g �p��'�-C�E�3CI����N~#�������N���uUk}Ddᣕ-���7�I�H���6���	��ݔ�Pސ��fa��3+_T�[7u$��!k�����iZ�6{���>���
��4�2��?B�r!����X��y�;@���-k
�˦C��Au"�b_2Q�4u�q wmY"G��_��$Pm
�\3
y����VH_���I
-X�ǯK��iL��݃]�"(T&��	qi��ݭ� ���D6�U�I��:���]r����X4�͡k^2vYǑ��QuU"ǈ��*E*��
��b@kD/1��hx��&1�t���^�a��x�џO�Q�Z�m�F>�=׉
Z�/U�P�YZ\��9���r���|h����2o񉴖��Z��r�����|�f0
gy�!��vWui�Oߒ<�k]���\���w�!�F�O��Q �Vh����u�P�m�������J|�Я�j�?}�����H���ՀW���E���sKe�d57R��@y��j<�שa1�.�y���W{�0��$`Q��}������2i	 ��2l-��m�ä����x��趛��=�����b�6�?dxHQAH��Q.m��,h�{b]�����g�C��P��<ۏ����n�{�M�
������u�M6g��<6Ͽ[��5��k�v&�3�D	& z�^u�]��Ώb����V� 9q����I��a
�����dH�`O��Yʀ��Zf���X��x_i��H~����jh�T`��	ѦnN�Yߗ��%)�}<���@�kd������ؽ_�&��I�w~O�)���a`/��d\�J�乎�;c6]�8N�����޳������p�90=V�2������۟�yv��3�"��Bi݀҂ό�g��a&����4/��v��*��4�׼3?��Ɗw�\�,���
34oR2�K���l��.�r��������s�o��X���^���W�������|�1J�U]
Z�<m�%BĬ�G��1�>E�J��
=q����46 ~a��6��� 7{�Zv�3,Zk�&�8�G�~A��`�����w��w��R'�3�=t
[��`��U/P�b']@�_I𽕕�W&m
Ą���������W���7Y�P�%?[;/6Or���U���3	��ѭp	��l�.����pV�F���%jj.[C��,�����T����OT#P��� bo����v�剧؋�K�6T�҆�AH����^�����4��q���o���YFdo%p�;�iz5:�2r�:|x8�q)^��l���9��w|������~x�f��[���e���
AJJa��mW��;AA�!Ig�r�O7�m�Z�~g�fb�1�=S"3eKx3� ��w��{Kj�qq|I��l8����f!����F�F����B�K�r��(v�}B�n��W~,���U6�=�W�8[�����,
���k�sY%h�ϵ���K�/�xV()~j��
�^Dѭ�NP�)A8( Iu�n�m�4r�>h�^r��j�*��JШ�6`uS�񵑴B:v�*���E������`g�q@A��2ɲ.�w�\�'�f�D�kv�Z:\�r|_{6�ߴf[d��8rl16����cjx�G,A��B�����%f���|�Bh#YS7�'����L���"��Os�y��k���$�B(y̷�7�*��
p��4�4h9�"@��"C~�l�n3���^To�dM<�ә�t��Qө�ʶ�.;�m ��\�)��^�D��Ӛ����9N��x�k��P����"�ޛyaІ�R4 �����}k�:/��҈Ib�݉j

��a��	�2�N?�f�<����"&�ʇ��H�شmQ���|�C���
w���s
�i�}����ގI��$�p�d�{���^n���{0�B��?�w�&p4��Y0Ȉ#}P��	⩆�}�7�k��2�b�ݏOW�#����m�P~c�����_.$��l���2r<k�x �٧�/�rN
���o�/Ϊ����$
G� g�h��ƍݼ���P`��4��i��E2t|k�o-/��\]j�Ur����@&�BR�n��bʶ�!����}�F��3����57��l&�_��g���2�.h��A4�������w��=�g�)$��Ya�G�Ȟ9����K�VJ���h�*��$��/;���(�ǭ�b�W�_�4����u�aEbL٫SN"��������xV�k���Z ��\�c�n8��h�.iܪх�R`V�c��3�Ŭ$������V� �n�2ц4�c��#�E���[�LW�uS��W:5���arDÈv�J*�49�5X�/3C[}R]"FsvJ���n�R��v<)��6�ֲ��.���ť �JwO�
֝�a���a���[+p���/9ؘ �\���Q��l5f�,��v$�Ńi�uد����R�7��Y��2����*��i�T�	��Z�,��L��2T��fc�dy�I��=�]\�ɪ��ih�0�f�%��Mc8��Je��5
�<Q&����:�:��R��n�)�Mq�\��`�����!lD�\�wà�w��>��	��m�e����]~�Щ'�{C+��qL+Ҭ���G �UK�%I���6zd��b���Z�o ׈��|-�1Y�q�Fdߊ��F��8Aǯ{r�W���+٦�9����/�ܟ���񼣓)p�j~�m[��L��{���N4A�&3ϛ�̋�"��C@C�x"��q�䞛v�Ƈ������LD��A��.���Qb�a��+�z
P���
��Ns$c#���Du��
Js�2�U!������P�a��,��pE���7�	�u�~	ݽ�I��B[�C��qF�I�[�}�)�z5uxZ$��|�����L���Mq�`��LcL��Mڞu�y��Z�y��sU�0A�ky�]���fZ��3v}{���7Y�8^�.���|
_de�b�l�9X{a��QU^Q�臺93b�C���_��U}?m�H������(�����aVQW���.Tԥ&�N�/^H3�� O����J?HS@�1 nX�jDF�צ��H��[&V3)S�F�P�y��D�_��l�i�M�,�}K4�j(OO�lk
�j�KݤB˩�>���=��g�����}?���t��-��؛�O��Y|�E����{t�%�f!Yô/>/,����\���߃�z�a�vb��B�eN�׶Cx���<�Y�"�_����ΖD �'����=#�5����/6�K��q��+�t���s�\&��p��Z4.DJQ�8	s���İ\�)���k��We�a���tc�I��̺�n�!�������b>&�|�$�[���
YD���U�1"=3�!عv�/�I�^t���,{�X[�h[_\�c�mT7QP������a�<Ѝ���!�����e�����^��^奊�f(��.�+A�O�3� �,hm��.��@�=�B0�@%�o�b�`�0���F�Wy_�����4V�
�@�3ܾ��� S7�zRۦ��b=S4�5A7�%-�}3px�����T�b�Ji0)_��_b9��
�oDȡ��K͔�f7�>϶%xɟ?��$�m������"˻�'ܖ�0 $݆K)�w��DZ9���4E^woN����E��ц@���_+�{�}z�ln~ .@���&@�����Z�U���O)�>�}��8 �!R�5`.{ ��6k�J5=ۜ̔A����/M��>!���^��q���11�SH�׏���-�����6ʤs%c�ɋzC sX���<�R���y�L���A>�Ngo���6^���Ǵ��巷&Mu�.�����[���΍8�	K��f�7q��Y2.��)C�pk�ұ����]9��P��ڧ�4$��L��L��^@����Pf�W*'e���z�ǘ��v!L3���ה;1L����2uY`��31Z[��w�N�� ��Ű��}�@��5��0$�d��|k�E��8"F+,��?�d
e8�����vO���k3��� ݀���6���a��{���o���!���<�t�����l�,��)}*8E����l�iiw,o���iR?���.qPip��+�;�e\����|�>S�Ì�O9ʟ��r%�}���F�l�ԉט����5�J���vV��PfS8�S>����~=��*���x��P�����
8f?��e��Y�e2�:����eK��i�E���PJ"��}��TI�TX&�P�ua�$�O�7��Ņ�u�N@�yߓ�5�'��n��_S�_
�sĤ���I>�ᬶ  �G
��x
�XL^L8Z!�J6��߭�\�ҍ�M�2eK�ڝp����l���f|`7x�A�j�Hj��mC�XV�A�cF�R���Ќ�/�̛�����<�A�,�����"�� ��l�	~��F��;��*�g��i�!�5W3"���o��:��sB��^2U� ���ӌsv¹�8���"�+v�����$�0;���O������VB�n�(���ϰ}IV�i5^�G%P<��C,��ˢ�ߴb`�1�W��hn>a�C�PS"�8���Ex��4v����&+�
~c�����T�%��M���*,�E��<�j>jB�M�c���JD���r*������b��N���e��/{���oP2�A�4N�b�{�vܐ�G!_"�x�B�����.���r���{��T�7��Zそa���x�rqSZ��S4�Z'�Ar8+���'�JV`4*�c<�)�м���z>�},�g]�}�@�n���X��d��:( 6�NN�U��� ��3��'� tl�o���._��
�jmVo<��E�*a��t���8��WY�*�q�۸��t���g�p<Z��0���u�[&P���Uę�/�#���i�֪R�����	���U��Zv��$Z~�l1!#��	0�b=��I��8�(!��8�,3]n��?�W����ܗ��i#�z,p�!Un��	�m	V��ǭ�9�`ǀ &��^�2��n*6d�q֫��'��v��,�|���ϱ��������=�8!�`��1x]�Ma�����ê�M��EFh�%�XCY(�M���j2|TI.%��Yʨ�!�c?�/ٞo�dfྏ�N�&R<ݺ	�[>8a%l�����z�$B@�c��#�����4(Bb�Fb��NM�O��� ./���bV�ϹU��pkWWaU�节Ex��ě�y{�3V�8C,������0��g9���#L^�{{���j����>p�!� ��ǛP+X���G�3t>��WE?8���$%����ǧ�s1�?��R���^���a2k�h�����~P�#����o)�'A�����̋�?�EqQ�����PL�n��BO�@�L%O�<���O�Y��eDm���l�r�<�En:.�@E����y|y��A'g�*A9����������̓)eh�]��"��AxJ�Z�a-��׃��'��s�z�����8����bZ=6�=$�ӷӡ.FR�p��`����U߷���;<��w�nK����7�&O6��)*~r�����(��%BN8T��	f��m�D�Q�~�01�4rS���ʁ{��L`��t'��OjA1���0\��W9\� ��-c�w}��HmR���<9/�k �^�: ��۠�
n����i/�eݾZ�kf��-E�d��?%�ֹJ���/�st��`,���pE��v��f�gRk[Z�KB�π��f��#hU66tH:{�(���J瘣i\�9�PW�B��kkB����k�	^�q�И�|:Q���a`!������11�䄧��f2�x�P�
1�s�:�`��j�
e 9��(6r`I��I��'K��MF��p�-��g[�&���k�!?�7ڼ9n1j���h��Y?��������ϴ��#�+��u�
I��ud��	T�~Yw�����7mDڔy���cP���I�Qi�Z�W0t�3E9�����[>P��8�����޽�(�ne���^����g��}��w���Mw���[�52�%��ch�RB��-i�5ֲ�^ۚ�f�F��P�+?g�V����o�y?MVJQ��������75Ǡ�4@ңvc�]B?��d��2	��/���P5G��g��^ԃf��R}w��A��z�p=�l��Ύ���J>6��ƀ��1E����b�Uj_�L]�^��Ѹ�&���m�
��'3Dܺ���%šBU��ַ��Ϋ�e(��7!�B�H��|
���
�|p�����~����Q��u_@�S����?׌sb!�cO2p3�d�+MKz��G�
=�����@�yO�ېs�N	�S��̯���܆�Kk8��4�YI�Fv�����=��V�dmrY�oB�I�f��?�nHІ�㜚?{�Y�e@���`� �
��@-f[��A�����+�[6�Ap�#
q�%/o�q�ۈ�q#�kK"Q"�x�u�~��Y��P�38v�ɔ���\�D���Q�v~��l���/�a��/��G(��]�~�߽lYB���Ŕ�&7�V�X��C*@�7*�R��>H75����LAm��o�jh3�s��~-���}�F�߹�ط4m���6u!�dJ��K�H$��Y���q��z��u���/?`��Bo��Wo ����
��c溙�y��;�(Hy<g���rR']� �4&5��J�ơF�~�li�^�tHb��bX��5�t�z���Q�uÃ��Ū$\�=ndC��V���C�r31�C��-L�L�'��%�+�.��,���B�XK��VdaH	s��H��ἧ�e�����@A[���"?����"�7v����i7��l�I�K�٬�א־wc]�%�'c�/es2v_HhX@�GX����@qN/Ο����h���tZ��Ws�'�#Ǎ���$��u��{��۸���}6���&ҠJ���eim�#�*0B�ӛo��%9�	��n�X��(�����m2��[��謣]����k�ap�YK>评J���gd_"��V(��t���A�?:�4�SR4���<�Q!��~�����R�����.ȟ����C�Z@�#��D�?y���֕�a��D�c�=+j�tQF�< ���=r�Q�T�^���O��.�#";���߈�X���J�a��y��&nXt-9�qT�ª"�
��=���4m;��(��/�V%�ȁ������6<鴠[{���g_=��/֖(�+*a	��YO�g�Hsַ��m����w�"��j��!��C��]�&�>�2�?jI�3���e�lXd��@����ub�� �]$ݑ�:W���?�˝�"|)�^�v:3�y�C���r��;�Z� ���?_�1�B0�3��"~��R�5�]���a��@�% �g�Xt>A뽂�OX)� D9�\��*?#�=���p��M� k�a�7�*I�/P�"�rܝ���53P�h '��7g�U���9����`��`�׬ˍ�)_�mEAc"#�G�^z;tmw�=��F��w_H�3�?��-�`�L��	ʡm�R��V��k�jub��p~<�j�w��tԭ�"�U
�~�+>:���?(��?
�Y*�:��Z�X�g�%	 ������ ]���kO�}���6�$�1�` ��H#z�}]�adu[������k����c�x�fZ6{Ҍ^��gxIx�~�4�c"�{�T�3�����Q���D�9^C}�Z�E�>R�vB�&�|)������9I�/��bU�n�>(�� fKX���ZoH�����Q�����^�=�6��@̀���y��5i��Z�3�"�7~O� ���j��%&����jK����Ari�6���?��U�/��v��@+�K� G���TK3t_{���c�b��]��a��鱮��>�1M��5x�<��7��%
�҂l��Z =�����O�ɡ���#����uڔ�	m
���qb@�c.���ڒ�w��pFG�a�"�I�|�n�z�F�:y�,�oeD�!��-Y?�|�o��0�6�ľy�f�D�Þ䵟�ا��>TRj�q��mi�?�e�����"����

��Dª,k%�b����)�Бu����ISqq�p#R\�CX�oC�9-+�8E�.r�[�mſ6A�G{)��U��Ns�c���y���ִ'���H�7�]�_?�#c��z(I�=�j,��D�,�<��6�B,�*s�]i���).dc�;A�����1�~�N#����
��!���<�[gʏ��&�S��j���og��vF;�"[�N>�=+E�����/ w[e�@A�:���NU�ƋH��&��
d�#g�LɼD�4e�cK��
�?ERc�r	�*�/�S@������-8>@��������HB��@��lLI,`|&�W���a�9��fds?�ͬ��4��	��S&�t�	�U�ӓ�o��t[N��_��m��j(�)6���mHq���( ����V�V:���\4��7�L�����4�����xR;v0o�S0{�zW�M~Mp��2w5�M��:5�1
�?��@GS�	k��'��]ٖZ?M���S6�g��`)�8��29<0���U��;�n)<� q3�̍/�'B��Dʂ�e�l�9�t`>Xd��J?a[��_@���x��QTI#��m��%���� �I)�#j�),�D�����dY��-o�Sy���Խ���V;?!ך^+�N�`��!��� }���\\�i��Źv�����h&��R�FX�#���Dg�@t0񃿇8�05� �p�~za$FЭ�_��@��a��p�@� ��0bI,�ꟸ�
�F%Y;u!���M>W��)�ú�|
^J�5�L�=�	�Å��Nq�P>H���m(�E���͂q�|�	o�ll�R;��a�v_�]<$D�}�v�o
ľi�,�/c�A�F&k�����y*EE��YEگe�H{�묆4�5�񷷝�e\��Q4-��>+���P�5�lV���m����?�M+�u��\�Q��AdV���<�����u1XvV�y��N��N�_�d.��s�g�_3�Hd�
6ř�,�(X�����[Ҡy�Lg�ֆ��-���}T���箏n[�o�٣(-~<�Q+ ��χۈ���L�W�����3�Z�_�r�w��)�ê��{���e� ��j[�Qp_�I��nn��8�+�؜����%G��u�4z��u�N���'�K��Wȸ[��������d�g0MQ�-���^����<���G��\����7L�����8wn㔧���u���Ue��U���%K���LA�ex|�HnԨ��J��P`�.�iK���2fo[�l*@
��~չ�h�^�Κ(��28������G?Ȁ|��o��R���q��ms��3?�|�x;��d>��w_�B
k@�iFt^#C27�T�S��o���}�M�t��)<X���,���)Q�
:(�p.oq�Bd�Dk*�ݰ_?�ZM3*�����ƥ'c�w#+f��8lD�L�B�v<F��}�����J������ �
K��j�G�&"�	���l�y���9y�s;�c������� �
�4��X��x�tҀ���6Nǒ͙�S�_Q)rM_x����kg��v�@�foR�ɩ^�������j8u~�'I7a}$�7
�����Xu�j��FjT�C{�@d�O(0+��U◨�e�KdR�\ϳ���� ���6?�`E��c0R�(j�Ng�;�����a���*!,C���+��}��J~��^Yi����ȷ-��.2� �/v� ����q������6b��{c�d^1�gh��W >p<�"�lY�N~N��1~ݔ�b�˾G�s�c�^���%��D�!a4��۶D�
�����&q�?#s
��ʀx��:��J���^�V�H�7^9�Q�..юg��Υg7*������^���S��a��2�F��D��0��������߰\�%=�����
�
��9pbgJYǾͣR����J�4��P�k�\���4%%ch
�m�b䀩��FZz_s+XcAG��N&b|N��/����ˌAm��8&}g �8
�9�؃|Q��T����j��rQ80�{=�3�\K��1{[��|5�F�l�3.�r�m�Ba�bGq�eQ���-�r�HK�	���ځGug�[!R��cFxI6�)���V�ඦ��jr-Ѧ���[�ߎ�y1�5�yȄ2��XZ`������w�"�ѝ�l�x߁ �@Vع��X����7a����=�b��"�[n��7��0��q��p�'Gy�QhÙ~�L��;�P�=p$�-$,*�gޥ�u�s�R�^R¥��ӊ2*�t2�&̖U2~c4�5&)��ݮ����m�*� ����(I_Nڿc����s��
0�$m0���bb��O�mU����4�S�3o~4 �"
�U���~���_����7�霾�.s�G�<�o�Q�8����X$�@`|"ց��B��dW�ϼB�����r��{A+�Й�z|^�Ћ�*�$P��I���Qa��n�l���R͡�[�4���۲�N��ۂ��������J�}���Ou��l*����_�<�6�JrE"��9�E�����Z�0U��'c��>�[}�VO���JO�V���#m:'��	egOd
c��##=��;U��}��Ww�$��I������E1Y�vm�B������\T�y��<,���#�yRR8s��҃�#_һ��O�+���*�o#.�
h�8�[ʠp�5P 2t	�!���m7%��>f��C]�x�	y�6�}�[�SM�n�)(����[~c�G��گq�N��If�:���xy�+ �C5���f��A�H�,�D�][���A�P�}�s3F���/sQ���E�G���P�)9��_��:��W��E�6�cv�ց^�|j�
Z�a�PMu��k%�:�~��6�����vW�J��G맵:M\M^���yR'@\���sQRN�%�x-�8��]�H��
����
a���u��-�eŲM6��D��{�C#�)�=p�k�1�Tq;B|�tm}/��-,Y�����������@�i���A8���бkCa�Ej" ~���Ona<���=#p�w�ÑuRK�L8	��m�¯a�7�K�7x� ���
"�p�a�&
$.7��Ԡ9`�Qg�Κ��(SI��[�љD;HhP-<�Va��fiQB���R�:M͔A�H�رx���s�T$��7`^�]���7Y#s���i���,y���J-L���q�F0^���mY����6&�o��2�����:R�3"�� �Iװ�ߤMr���fYq�y
×��D>XH
��L��b���-
�(Tq��]c�~4��'E�3C� ��>�s�ؒ&<����_�m���B��Z�|�B�$�q�vi�ڷ�>ߊy��Ъ����V���~�����3��"H�ٺ*;�J���ʡXQ˲]���A�?"p[fwP-�"�4�\�)*dgu
�X����[u�­�����<i����i����G{ޢ�q�e!C���s9i�Ӽg˿ٲL����r;G�����t�'
��T0�'�ݬ�M_��43�c7
֙�i��·u�Md�x�z��S�
E��7��d�S��}e�_�sY.�zd2���dT|��pw��V�R1IL�ڿm��(g?�)���'�sI7a҉�L1 `�2.��?�-|�g;�kj���|?�a˅ڙ��:��ߏ�5�ʓ�M��8I�Ḟ��[3:�J!_�N������W7}fP󱏘מ�D���i�(I�� ��w��-Q\9uV	C̟� ��z87l�|R��oZ�� �o�c���'_qr��:G���'�5���B󳖌�C2��� t������*�
�� _~i�������S;:~/.�|����yiX�@#У�<�˵���������%�)���$���:T\@��󃿞�k$�z��w�C����MY�������VP�����So��A�r]o"�$P��@�0:T���x���n��V�k��Z@�y'�JjM�	�n�K�}+eԻ��0������Z�����*uli+O����x>����=�U4�c#�v�r.3a�#Q�*��D)�bC6ASa�λ<ް�{C^�AT�BϊB̴��F���&�NXѐ@�N��bYV����4�ש9YP�d��T���T������*��T��ϩK����������&��֯�a)|��!:Y�t�4�:�a,�=qJ��q_�n�
��hz7�h$�����<�䃃����k��M�*�-�6&H�I�o��K�(-����u��-�ބ\�� [|��U?M��m�
�Hwq�hT7������ɀ�~��=�nB�lb)᤹N�M�iI"����;��0�4�ࣳ�n�u��K*������P+�
��Gl���Y�2 3���7�o�u�!@5b�Ep_��?�,�Ħ���������9c>Q������	�)/�*r �˴<�b	e���V�r&j��C	'Xd6��A��I�j ��T%��~����7�7|��X;�]&�'����P�������{��*�q_�o��U}~��"�)�+^F~���H�R$kT�
@��2u��κ*�`뷄d�-Or}�&�<�*�!?�Ⓜ#��������,�IRy&|w$����`�ܜ���1���LX��6l`ڮS,&�?f>�]���f�e�^�l���
24��7�|\�ߘn6v������Q���-�&��nh�-}�sH�/�m�����H�E�2�u����xp���ue;_[��<� �H鹢�x��=M=��@<֌���n���nߵK%K:�_%��{88ox��XX��c���Ǜ蘾��O*��"�hu-��.����-�[�`_J:F}���g�c�M����<��2e\�8��HS�y��Ժ�|�É0ha
��sV����
�9
&��Y&�JN��/��iLp�$0���@L��'^|�WxxJ����t��*1UMkS����4����JϬ��8�]���B�u\�$\�	�eG��zV�/2�3v�5�ݎ�U�"�����+m+�~�q��s �dy������Ķ9k��-�/�~E�`�IryI���7"����Ct~�H���	e��Vs���:�����h-:���_=	R,z�V��M>,��+��s�6˲��eĆ֝�%�&����c�AK����O&�$F\��+_�QU����Y:ƪ���aMMV	���3=}�S��l����3
�hH�aU<���f@
�'ո.�\�� \��|��	�v�򉆟�㼖*.����eMO�����dy5�o]L�a��׾�3�U.c�1w�)��
�\����Mgq���ݥ�)��ک����]o�����q4�S.��������OT������k�{���+�Dg-�^Ah}K�e�?i�K=�o�͍��	�@�9S6�#moQI$F�Í�����p�R���j��6�?~�W��p���s[����ï &/���9�W˥Ø��s�3z�A��l��T��7�z�PH%�M�+���[�MM~dۓ�b �U9�'�!*��u!���b�w��]-k;\�S�11ކ��e,�3~�<W3O��w�*0�3�.YW̉O�Q�M�&?���kl��H�aOE�m���ko�+���ng��r[;mN�����.蒡�o�5l�i��w��mq�P�R̈́�yd��Q�:F���ǒ��'�-r�,��*��t�轷��ո]��6b=��"<d��� �o�IU�lL�)j��ݿ��yD$�M�S��1R
�5-L�P��n��'r�΂W����6\&a�!������g>7�DM.+�;�5�#-?��
6�9��)h�L~h�XZs��ydz�6����i6 3?�ԩ�%����̥٪���á�"��7s�����%~
܃�79 �7\}�?Ͻj]7���]��5:�;2#7��J��m�Qf�;��N�/Ӎ`�k���lh��}3�ʬb�Z�aXŞUǎ��y�w�ll
���IЈ�l��S��񙻗w3�������C�{j�z�NKJ7/�c� 5!�<�#q,_E�/]B�jOA���-���P�:KeǮ}�����G��'�;��V��AYM^B�Lh�(9���Zdw�B�RI*Y;7Ŏ/L%(^c��
�(��
I�&����rA���r�!S�o:�'ιy깄౟r8�w���&�r������PR&�[�0;�c��͏�
d�&Y,n�$7&�DG�Q�
�d2v�n���`:��p��M�py�PR��|�M^�wȶ��"�	�j+8)�r㿇�ӯ��%���6W��Ȃ�euF����ǒ��
��:��S�7�<�����q{���X�1�o��Zs������Δ\E�����W_��G�Z�kV��n7u� �r�m�	�f�����|�?�퐫ah�
<���;��H��Ht��k�mc(��Qf�
c�-��TB�(���q8G`Ѯ�w���w��v�0�U[_D�d��2���'�Xk�^�%]�H�7S�K����O��+pqr�?�k6�^��c��?�.ƷY���d��x��"+����8�{���1�՚��ŰωG�+��������(��R�j��q+�*��R��@�י�j}d���?�!"R��O�륔C�ס�׿-}�����s�@WaD
���J7j��|�J-�����`'"�SA����d5	�����OF�̈́ u��8��_�@]5D�$Gb��
�ʿ��P�z�eY�Y�O_(	c��Y�􇓆|�����	6~$��$����>KO>'�Y 2S�pwB/�����BY�|Q�; Ŭ*Q,�D:	�u1y������yIs�`�#YR4{k���h7��a��)B�[���)ǭ}i�oh�V��\�5To�q� �����s^̍ؿ��2�63��͛��Co�W#R�q��&_Jy޳�ZȢ@ً���J�@~��1	xq&E���K���zX'��8�y����\��X���r{ ��ĝ(a�ǐZ6-9�	p�\}���(�_��HVs3����&"C:&�f����I�f�&G�{�/dVW��L��t�df��* ��\٩u���
p����RD�ao��Q�[��E�O(}����WJ�t��&�?��9-~��D6۷y�9�AW��:W�4��C̀�քY4��J�j�E�-9 ��x��D�[wTkh%ǵ�����>{�fh���==cG����d��)����J�ʅW�㷂�Dn�GP/p %�{��ܪP����������\��F�Î��t�/啼�1M�c��x��~��:7��ְ�f�6���q�%�	;Iz��ٽ�]��EC
@���ԓ��� x�m+�N.d�&��6�'Ɩ���sl}�EU���V1����ܖz�/Rz �ǷL+����juȡ�O[����f�}�P��1���]en���#o���o*tD˙{��q&�-�~h��Es�_�3��o%6"B����ݕ�F�g�
����q9g��Ա��i�G=�=-P��R��t4�6��l�'o�����K&����l
�>�xx�9�n�[p��M��GD�(C��+	.7�f��
�Xd�[)ꭤ��OJ	z�{#4���ѓ-z��5'����B�_�ۇ\�^����9jP�)

�]�)�1�_� ��9;�c'�6�����`}U�E$�n��_e�\��%�;���%�+7�g�J/_����_�V���/�|{�����wN3�;OP�s]����Ԟ�.H�b�=0�u�0�x�X}H�%�x�]���y�ށ�"RO	%D5u��{��#�'h�@Oq�ׁO��z�_�pEWz,66�1^��um��Μ$]�^0�d{�6�����F������^Vs'H���*��>)��N��^~��~�m�[���tI5L��w�@���ӯ��(+������qE�X�����1�/u�Q��9�W�g��!����<���O>���4.���AI��i\��oX��i\�N����ƅ3ך�G,E��B���B5�����0b.��r'�iw����6����5�&�H�v~�~#F�����4DD�tw���=�d\��L�A闱8�B���`���|��f�ft��?�&�v�<ex�>���K�\��&���e����j�z��c�=ܺK�'�����B�^i�#��ѴM,
���=a�Pf/��i�2��GW,R���ȧ�xӎ�	�%���X8���s����?Y�o�tN�?�1�'i'��!�u=��Z?�Y�j�\��g������H^�׶��|��8�j�M��
+ۑȆ����1A%!�z�Vf�k�=��TۋU%��r_�kٜ[��J�[~y5��}�rT�rں_�V̀.�G�:��ٞt���E+4ʼ�r�\W��r	����?��ӫ7���Ce��"�����J��'�ᯰ�<�XC�c!�Ŋ�I��9��
�
��0����"T?�7�����LۮY���q�0� ?����5��ד���kr������)�����&^�<;H�@��/�d�f8��QљIF��%�]0��J���Y�Uh��([h��p&D��|��.��:te%S��q��9���=CL��qBPg����>)��s|�-����
�O��t���&�&m᫔��|e��ⰻ�O�ҽ�=��n�o�xqlgC���c�BTW�i8r��W�h�� �%<u܎��%[�6�x����FP�ң�Q(:5�	:2.փ;M}:7��ڦ@��0�X�k�f398[��PJ�cfw�AЁ殈�L��k���<:��m\׺�Hr�T�w6T��3�>ܧ(7_8l~W�[�)�|��!�7>������^��L�G
���`��y�������$Y���CB4�@ϕ�;�+�K�ĕ���B�b�^桅
���Q6N��{��R�6�A 3��k�n�o�$C���7Yz�lÒ��1�#�����ɜaڼH�7�j;�rM|�oI�.�+I![�m@��6>���N�:�'w��&R�3sO�u��%��� }ᢠR�ĝEfp�l|���p%Ag"ǃ	"a���j�)�a_�K��j /��:�+Qȟu��T���"d� ��ݯ�An�\Q`.�^z-@������/�Tw�K��z漤EQk�:� 1B��;�^�7�:�d�ض�&g���-
�IC1Y/g@>�>�1e�(W�m4��B/2w)ڢ��D�)���Z��.�r:{�؃[����(V�r(�q̌��/�x�K�ws�Z�}�#���ƈ�p�*Y8Tf�~�	�^ߔ͔9CY�\.�\����m��x��
��|/�m��Y /;(�`�.�b��0�N�.�)H^n�k� ��#~D��66r����#�״P�׾�7=3�.GG��O]
Y:�<�4u>��T.��j�nV֩8q�,/d*��u����%ޑ�h��UL�[��DF*� �-~Hf�o��ow�S�*�z8"8
�Q��p��H1�pi�֡+h��1\����u�lC�۝��b���������^m5�~?L��V��8R��{�uRE9
�m`�}&�n�ǯ`�*�0�������<9J�BZL�V�0%*l�f��
�����f,ZG�����jkr�}����j�ۍ�;�&�Ȁ�ǰ�9B6ռ��Z���A���G�5o*���]*��+��t��5��X�
-��Y:Q�����-�0��Y�@GhVKr���>P�8��@�9�Uld�W����i%�"1����Z��px��g��ֻQ��ͤ���Q|�yU q2��x3����M�55'S�WЉF��D܉n2B^��p;��2}������|���G���`
5�	�߈j���!��Q���0�_����M	��'_�i���4<'J����믪{���be��ÂBv%:�X�Yl*ͥ��8��n�����#�*�b7�쁼yIj��R�1���A�q����o����)2q>\��n|���m���,NkK���g���!��/��(*�qB7{�*lg�x�w�4�^�8#6�m������6����a�؇x�Ak#��Q �
ʗ[	_�,�'�Т��^����p^�Dm���o�ڶ��t2,}�����J,�|'�I�ɇ]y�(��S�F&s�ݽx]���e��\F�}��/܅���t�=9*��`ǫb�זgŦ�H��|y���ݭ�;貸�}�Y'~�X���̰��C���V)�K����+�}7�q��@�j#�0�����f�bG�z�����!^�U�s<�R����ތ��"�N��{�_����q��d�[nEЄ�˹^&ew
�9,UVF�w ��Hf{^���%l�Ǭ������)�-�J���ܶ}-��}�ti��q�s��D4]wf�t{J���E�����h���b���Ó�����qk{H��n�#1��
;��b@�5����~���l~� 33sK/����?ϛ����:�h�l�]��/���ŕ�ɾT���'n�\�2"�.z4����l�)JD�bm��F?&-E�o�c�̰�#��
1`\����FW�N�
�F���v$��hܳ�<����V��r<��+��i�)��74���9�)�5�/
��l�:L�r���wY_U��4��像?�2��Zq�(p��v�?7k�rd�$�����yqaG�=&��ܶ���|�`�0�`�Ѵio>}ME�;}7L{�i�z��&�o�d�L��ۉ���%���1U�61�� s@�_���;z�vZj�`�fZ�d��f��5��܏��,�xb�ɷ�2mn�e��L^����2*��Ɖ�z[�Ê.yΝd}�8�t�B@t+	؀�5"�cw��ܶ��=��!�r�J߁RvD?^~�_|�x'�(OJ�Ks�0�h5A+w�ӌ��`
�y�E֯�䇾M����e���� #�����ܲt�貦ǔ^p���J���	����f)��Z�S�ն����a��
N_eX��?JJg<eݣD���4^!ψWT*ֿ-�G�"�7��}���"��������H&h0?>ov�x���3 *��_+���9�&�K���|H�6I;���i.���.��}|}|v��}��Εn�٢|&��~�����i�#��6��kf�Pű�yl�� y�Aڊ����Y�hx6x�:�]^�z���?zű� ��XH�ԗdh��I��������O�Ʌ��v^�Q�L�aO��&��,_���?�&2��gQ�
%S��aui�i�;}�"�k2-���C�8][�^���
`����{Lə��������.�>��M���n���������I���څ*���ͮ�8p����}���f��`��V�^���m>�L�ۣ��>0&��M�f¦i�-M\��0n$�d>uMh=D��T{��#�����	�[ba� �`ڷ�ɇ6�q�|�Ґ9ٖK]Cq^7����k�����[��Ձ�Ix�~a�^0`m�͆]j�O��X�)�T�
,������w�f�{��{$ ��#C�r�+F��VF!߾�4�fmM�������o��S���}u��F(k��iB�6`���æ˽p�wb}0�vN0�+�����Q|�
{m<g���^/���f�/��Y�p�s�J���7P�D�?��d{^�b�V"��%�OtVzƆ\'V�s�=;fRш�أ�I�$�F��Z��=�͒�S
�͉>�D�͌v�5�@׃��U{�������K�7gZi<����F�}���m������a�
��#�}�-˚wHf�ʯw��"ZR?0��
K~��~w\�^2o��?�سGl6�9w���}Xs��(�?<*���N��3R����'gnn��"��\��I��~����B6t���N`=�5	���\ W�A.U�����i=��&�
�L��Gg �i�U����d�:(�	
�
�?��^΢"�Nh�`�l]A� ����	.�>������8r��JP/�� UT1m��)�ye~#��7E��&k���#ooc��Bl�~��^�>ֱC)"�X����)A:�[䔔��X}P=�lLknJ���W3�Ӆ`օ�opb>��2�	�	�+���3/(� 標�~�����rb��~������Q �!�;i8GU�se~�!�o�*Ey@}�;x\i��������A!�)��{�X�<�;'h��C�>�U^�ϙx�>E1�|q�6�M���{X��������ɛo��VW�?��yߑ��g�Ǻ�1/>�Պ"�7뺎���N&��F�{���//���s��]�@f�W��%��	nۊ�c6@�~H�z�
E����Q!`}�c�|}�$QQ4X�|E��9���6k�2pZ:D�E�G�������c�P�
[�`o�����-b��"�ӽPY��ʃI�},j�s�A�ֿ�����z�
���P�bS��6���tN�� F���uv��d����cV�hAH�G��)�J���qi|Z�7��6g�_ʅ�{�p��毞��=1D<CK��~�4�_3�
��z �,�v��==�Rm֝�-:��%?X����"��=�E�!"3������B��� ���w�O9^�?����H$�i};܇�t��a[�SC����x��k�������g�!�*c~��W�1ü3���A���K�	L����n��V�E��^~.)�,4�4`��..(	k7�RQ��4
���S	���+6Pd��)���6�M�%|�����B�S'2���˃�R��M�[p��w^"TbF+4"i���#��
���+4Fi
����m�)HL��f#���U��s��Z8B������t�y�CO�T3�r��]	�C��G����$j���`���q{���42B�.�^��r�ϒ�������-�g���;�A5���v��AG�Z
J4�o`!��(E�/����4��;
�ڟ�k�4|�2��?�ܾ�0є^�p=��*�0�������)�+���P��yE�&Q3��,K-ѳ�� ���Fc�
I�\��+�6��3/,���Q�^:����u��IiH��3�-�ppY�nQi�^ ��	��&ӵ�'�E��m��WL�W�c�Nͬy�ۆ�nϬuz��n��?�W��&��7Q+�X�o��ӹ-Ҝ��C����A�R�w��4R�� 'b�U���`�k��5����ǔ�����`��O��C(+)2���	�tt�̰�,����f�Qg��+(�uٷ�}������> O>z��,�
_R�F�߱���.�"�ou�'���4����d�}����������0����
�-��W���DxSF��2h�݀�$
�
t�|Ji�љh~����e��
.�����ѓ���h��٫����ϡP9�y����%D+k�I���Ū�v��2&�G��qa��T鎾-�/��̒7��k4���%)l��X�i}���cV�S��z��v4[3-)��4P*�w��v�kni�`t���H2��]���v�#����X!]�� �k���R8��v�'!��,��l�co�[�!����P \\�i@A[�8E��·�\p�]�}���)��P�vS�f�b���Q�6�v�9�4��v�)@�)o���>ہ�Y�3#Ҟ�,T� }=�3��"'�}���������t�T�+�Y`���X�!���4�%Ӝe�{����S (%�ėB��� S�ӗ��#�k��Λ�&�f�N�E3������4=h�1(GMLn m��h���CJĂ�m�/�h��8A6�jS�)V��4�zX�ae��93Y�b�h�B=�0���l�D>�;��Z�Ʌ3�<P	��5�����#��~
y8�Ų�j6"I�h(E4��0�?IaV����FYt���uHӟ�L�%B�	���+�n�u+�z�H��G��\�b�R�m�f����Sr0nh�I��5�q����A]|�4&��D1P�Zsi�Q�{�6'{V:*�f!%�vr���R��fvh��������2���\�����Sӥ(��ҡ��w���Op`+M�4�+��Wz�A(t�n��ǤЊ�=����������^`y�1	��ü��|���;ؼt�w�}笉�K��
xP��";����Ϗ�V~�ݪ������	MV�����ѰQ��x�s�$PB^8�Gu����������#&Y��9vVWw-��	��R;�ݾ�.JJ=�X}�y�����_�1ܮ��}�fYP=zE{ܲa��ZE�t�\���v��������FU��k��/��G2�V�������5K�����HO����3���ߜ�t����Mo�;�����o�����ۃ�`t��~�b�<���~��4��������#>�(߄��σ;t��A���|��r��È�\���R�%��]��$|������M�VN�T��i'�JY���n��s�����	31�t���WI��Aw�,�_�d�r�����[�?�.6_̦����<�Ff\��0�x0����c�Yb>ݳ�y�(��� �$�����!���g
������|�||�-	t���s���3���z6����~9�o�A�)�|c����w/��>�C��y7G"�ş���(��;�>B���F�s���Gߝ���I�C	9���	�0Q�_K�L_�Q9�>E93��7BGo�ڂu��n��	z+
��Y�	�8���pK�B�Af˻��27��k<����;�^V�P I�`u������n������<Og�mUC��o��]��>����wϯn����+�}vR���
�n���'U��~����+
�	�D���V���ʯ�W
��ؗ�(�Or{��E9T��˶�s��:w��8�}����#�����L>�n��K!�={�2�~$�Í�WXD`�?��p�6�|y����ɿ͗�N��g_1�!V`
"�x����WW�p��\�"����<��q�������F�ǻ�7ٹ��w��!H�ǩ���Z���������C�+���o�»}�; ��@����ZX���D���p�K��*>~���R��
n���*�R>|�� ��ݏ S�������g�=�#ؓ�]��9/�?I�}F��=�(��-��p�:���(£R�l��I�7��IMg�Yn���.j�d��+	^�� <��S^ s���l�����N���s����Q�;|�l!�v�y���a�d
�r[2ak}�##�"���4!!;HQy.(=�hw�즗H�Z�uF��5��{��9�h���c�ʐ�;u=����		)�(���f2@��+K��=�<v�L�)��`]Ke�@t|1���z=�E���5p*�#�#
ˀȠ�m�H"S/
�\��ǭg����r��[Z����l<�Pgq��KeQn�Ws�]�@Qj�_�-���J_P�5w�'�&��(dIU��,�H�n)����� �S0VV��\L4��9 C�P��!�)���"�X�0](K����H�Yp��'���T�-�m��3:'�t�/����9�W
QNi�/}���+=�HΤ*��Yv�	:�a����yB)螜�"	��X<��"�dg�I=�3�U�{a��[�:���_d�d��J�xd쯒�%릩tJh'��XiB�u�P��|ȓ�9r���
xJ�}r*��6$h�ʕZ*�P&;�pwJʈ���f�/K�5�G�����s�W�V#.Lh��B+�͖�q3�?�Ʌ��
��� ]+ꩥ]]�i�D
X)�Kx-ee��ͱ6�JR�x.B�%}� ��!��I�z�D�-tU�[Nl�Qv!�Q�U�)�L¢o�VZ�$�9�̨э®�
�A[�.�8�9�|La��@��N�̅uM���o�S@�]�.��'6�E�yC�<(o�[ �ض�k����c�4�N,�n�J0�`v���A��
�o'���>a��:��cE��r4a1��i���{�� I�T�>F2��֏���U�@��-[���r��,Á̀VǷ�BŦNDb��d��u���xQ}^�U�
���8~�B�w
MA����)�ZE?��S�?B/*��5�6�
L� 甃C�S�/��gQ>	�%J��O�W8س07�l�-��Ea&����n�c���#�	���4:�sp�D�"�ANk0��BD `�q��nO&�J,e®˩��JM����J��օ�~6�`ܶ8���4s8#!##���Q�쩲i���cJ��yKSk7�I5m=�E푻�a�⌝�]��	 �lQ�-��9N!,��Mծ.W��ID���J���R�l��F��kO:�l���Yȭ�h|FYyN	D������SIR��G��6٠��
v{���`�S:;�~7���r�쐄G�+4��bt\uH3j��|\3�BkT/$�������RN��+�i�^qA�-�nX.��`j���
�%�nh��%H��zW]�
=Hs��P@鼋���&����ecn7䐨"�<i�H�v^y\"�j��B�e�������&�I�"2�(��bn�IK�l�Q(���]���O��o��#&�Hyd�2�H�i�!"Nn����{n���C��c�m��W.]<�3�0�؝<��%��T0��zM�[3$�;�W�}b:��
UIe0�
�/��*{�h`Te��:X[(cj��Q[�"_��C��-��
WbH��)��>��ؔ�'m0#�S�xx�29]���<�L-�.a�v��.c����(Da�v�ɶ�}�l�V���)MR����yL�/+������J�sA�d�-rf�xK5	Y*�V�ȸq�b#.,'9\�MS��	�LW��d."\��n�������|=�L��5{���%ӫ+�,�|(ky54���d��).������R�޸\�kw{}W�z>�<���7 ��	��H.��j|���Q����\
������b�G�NT��vY4�U%^��+�X���i������&т'����!g�h�YVyr�8l��,`��ik�%+�Y�|iaf��
y`+XmCLU�'$�7�_9Jg����N噓�R�֌�D��JD�m�R�4h�L�;߹Lh��|�x�1��+$b�oZB��~���cs��2�0T�@�fC^��˶?lPX%����Y�� �T��qL�R�@=��v2�)�_�P�x�4��ⱰpXo��k�z�=Eji�H8��sZ��������K�)��6;THK#@{�����b��zzr��~�;�2�:�X�;��КG��ˤ,�S.dBz΁>�����K����
B��z4Ӌ���J���>c��F��\��U큨��zR���,Fg3>b��P���8��Y�f�-d�%�!2|���k|Kͷ�XF5D��4�e]��T��Pl,w�Zϔ-�n�U�
$>�A��:ڄ�Q��4�U!žIB]�,����H�&%�j~��5�,]I����P:� ;!���wt:�<KhIQM��Nj���8��^q�I[�Y�q�ʍ�9H��(gR��l���D���'�6�%���s��A( ���ayE�F��b����(!�ꤦ �pމu�a�����Z��ed�i2W�8��Ӑ������g�Q�m]�k;Y,�����u��?6��F`OM�Ք#�*��hωd��@o�Ȅ #�F��^*b�

2L��e�zjt��K�f:�zZ��y�fly�2�E���UX��k�L���c���&�3.�3�A1ƈ��1#�/w�L^.� �ā������ʈ"����#a��5ǎR��j3]s�P�l��aS�W�x�V�v�dc3%*��9���%>D�˙(��+)�Z^KTX���P8�6��L�<7�x�
	o�&Պ8����:io�(�LǞ�T޷�t1�<OQ4QΊ�*v�cN/�:������虎�D>�\q�W�O$S�n��l2�yv�h.�a�0�O��̪��q�*t�&�+����u��1r��F�#9�$`�&�P�
���
�j(k�خ͆=L�v ��=I&*�hI�Z^4�<B���r��5�V�;n�D�)!�L�3I;?STI��c!z�����1�]@�#��n�u�O��L��S��Z����|�q�ݹj曥��,b��K�xV�N���b��e��aϳ�s�µYE)M�T��F�;�Y0t�ĚJ�w,��)pg[s*ȇE��[W�D�s��\��1f���9ͦ:)���,	|�dqi��{����V��dW�42[��m�m���8
2��4�ǆ��qt����?�X~6��e~�v�K�3�o�l�K�&$c竦*I�vU��G�h��A�,�k	�\�^BV�����KOۮ��%��NT�������=s1_ig)a�Kq�[�d�W�uN�U�:��'�������w�6Ϩ�3_��8�f+o:��J������6ۣ�!ZOy�M���ta\�����Rj�����	�
�dO7=�q��,�"BXD��g;~?�4$CW9���1������13Q���6��3J;�������6��²�D�,C�\HG��K�9Z7�5zE�i�Yٗ0'g�1�#�u�o3m�(1a5lN�W�b�(�:�ˈd;����]f��P>��2Q��c�-�/�I�K���xl���`�U�\薒���l-�k���ݥ �˔�w�������'��3�:��g��M7H�t�K�l��k{VI����j���yy��&�r3u�Ҥ,��N[U��tn"JX�+Y�J��L�`̪v�U�.� ��Sg�&��|�W�߫���IҢ��&m��n{������N��Ćud�KW{�+b�k���{�q�2&�X(��~�֘~Z�� �c{�!���p��͙J�d�I�Q\u���h
FE˖.0�>n���N6�լ_�P�t�몓��mi�F�i_6�7Z$��[8�������iX  x��Xmo�6��_�h@� �wM08v��s�I�!��(
Z�mv��%/�f�~؟��%ٲ"7N��g�6%��W׉ �Li�ʾ�	�=�d��\N��5��W�[����ߟH�F����ppJ��1Y7���ÒL0f�TMB��3/������n;\E#k��î
��.ɘJ����������L�ZV�4S�r���eV�5'_,#q�I�m�)���41t�	H��(>�F�%��֤��ٝP��B�N(��L1�B��&`�&�!�Bg���/ES:�T���Kn8���d��Q�i�4Q�5+T��A@���,l�����`����Ru´!i���Zk����F9���L��d)�l�΍��Y�;��Y*c
��@3%��f����X@�cYa���Uz�&-��Q]�߬!	,��I�9t�x�FG���'�����H`��� ?!0�O�uv+pA�ˑ�G�Q;w t�Uu2?��C�|bѧ|�cM9 $��i��0��ܙ��6n݉��py~��T�fS����G9)ς18�~zsvz�z���n�L����_φ��Z�4�wg�����q�,��|���+W�o}h��˄��
�OhG^u+$(���b�~5��KfJKE�dXF� �.���H�"OcuFҹ������"��ڥ"ݭO7��u~��C]�������`D��u߃T�	r#r��k�3�
�
Ѳ?��U�V���w�7���;�Ϙ��N\�ʿ��덖�ߙ1��˿j�)�Oq#�or�p˦�nx^�Ï�D�*������x��*$� �xf~�$�d��J���	h

�0��Py�
��>�'�l�-��\�Fbp\���ɶ2��2+��������㭞s����� �!��   x�M�A�0�����;�&�pP�M��Q�����QD����K����2~6�=�uʚ�|MaKe�z��-��B.�}�_Vڂ�y�%'w�v'�0��i5"q�j�=mxI%x�O��"�Qo:t����Hy�>sB8�� �J7�hȍ��
���K�����3bJ��|�
D�Uz��̮���l�*���r+��K� C��27�'��XxX�c%S/j<J�o'Lkv{!���ےvr7�����[�1��`���� 8��%\j�Q�4vsݽ����r�Fy�$C�'�����q(Qh�S
dw4\
�uE�;N�9١�Zܭ�b �jʄ�+����Pp�����"M�^�d�H_(�Pq�$T��j�E��b%�&[�A'_;����K����z��M����Kw6�ԉf*��]c����S�$mԖ��O��S�C��+�J�@Qܔ6��d;����7t���0H	�1*�u��ŶR�	خ���Ur�i�SǄX�e\��'�(���PV�J�*�g�����&^�ę}M����s��)���E���W�t�Yx�װOo)l���m��أƳ�j~_�M��F~FNF��]w�{�f�f^����O��)Tn�t��߹�\n� �y��ģ��Sa��<ϩ����+\�����xqOw�i�I�����궃��r��5�е���t����b�� �d���L�k���()�igj��Q�2��?���o#������wX�   xڝ�=k�0���
UK�X)t(Ev�$�Jɒɨ��-�%a����W��V
�r����Wpr{���>hgs��m8C[9ж��@���o��|�w�����U�|=_���D�]�q3��D�\߈�Y�k<����4,�i k0P�L�yV�hI׺R�+�,_�/��"��Vi��(�ￓėaT��h�3��ح�Y�)&��X�`�`	h���u�U���@r΄�Az-�l�&�u�;�����a7  x��Xmo�6��_��Cm��l�08N�am�NW$ـ��
Z�m����q6��c�eBlwԋ%[r�n�ؖ����x��Ì��A�L��Yp2<�������Ξ�<?0~���n޾yIb���7//I��6�����в$�١��d��g���,�7���
v>��23Cf<Zp0K➓Dg�i��f�0}0�
��_΂%#.�Ȥ�w�0�w)<�\.�?�4}<��Jf�J�&�飓o8�? �X�$#(K�B��Y��6���<8Y.51�x�*+}1#~�����~P��RFR�dL_��.���" &[Y�mip�z�o��cE��r�_��lI�9[�͐��jD���Ю�7!��1���jie��`v��y��͛��$�����ȩIO	���8��VJ5�i�C��U]�p��%|]�F��-;Ů���Q�:��J�p0�%�Z�ϮS�Ҿ��3WW�ȧMU���s��i�����4�څb*�5�ٲ�0��z��+�>�8xi9�����8��<���J��ҥ�|z����I':�7H(fCH&�)��v�d�\��(m�'�h���(a�FdrqD&���>����hr��u{E�<ؑz��2�yb��%C��j
m� �����Pצ4�\�N�c�h4�t��@���nW)'��G$�XV��q��:�lX�5ۍG�rH�/�-�
� Y���!�4�O��;����m�`�@��?��6ʙ��Y�`�|ǋYY��FQ��	te��Mt(�:�@˓�����HT��)̾h����V�j:L�T|2�w�cˑG�Bd�]�*���I��B��v`̖�f��K:��>
�����i,2���,��,���O
�n�f��	RCz����	�8J�~����kz-lJ<��UZ<��f7w��������[���  x��X�n�6}�WLY��Gʵ('�"Ͷd����ӂ�h�-E)�$N����>�'�c��%;�o�tQ�/�Ŝۙ3ázoƉ�{�4O�99�	0�1��sb�`�{��b��͏�\�~��
�4���7�W��N����!0,�c&H�0�5{�8�MLP���p#��O�D�E
pg����`�[E���o*b�pS�(1�>�3�2t�k��bX'�Λ�(�5�.lgd/fQ���L	.y���-J�~�rc�����G�-�N%fd���UӦ�L�����h @\bN0�55�u)w$�:Sl�T�O�v�u'�GM��[�kBg�	����Nfh��&!�1V��XU:>�н �����,5�!��I��x�O�$�(�[,Y��i���@{�0H�`LA�r��*+~V�kLV9�U<��,^gh_0j1~LDVt����Cm�L2��K\�&ma3ܪ�p�a���:R<3�i�aD�:��Iz�D��y�P�q�5��93u����&e�!]�']�}l;��jUU!�:[x�8�bM�4I�/ޟ�j#�hF�O%u�d*����"���X[a�q	x�yNy���b�A|�9d��մ�_�ȴ��e�Ap�,�-��#�fkK�Q��mm=�l�?����Տ�W�1�q�d�uX�E�_�h�O@���qsoJ�B����C�/�;/�
�6��.yb������e���	�&>D�=��wO��FP|�N�_/�߲Fj[�8�Un��hi:�R�q���*Nj'��6h]R|I��8fr��]���w�A&Y}��2���k��ⱪ��V}gh�z���}&*�b��'��`U�z�ڛ�Y�=�K�-�&��g��v!ޥ�>�9�4$�h�\����bv"���2Medզ=�"�k1��n�>p�k�I�:?w��  xڅV�n�6��)f J Gn6mQ8N���
8m�E�EAK#�E��q���q�C_B/�ʶ��i4Hq~8��|��J���F_&g�7	��M!��2	�<�!ywu0~����w�n&P�n?��M�!Yx_�������cU+D�;�̩�6+|��*���K��j���=��AɹF�;��x�J�g����e�����jo77J�z���CZ���H���h�/�ʵ2���8<{��E�:>t�F`q��e��Yi�����u�N�z�nc���󘰇��
�j��L��o�VmQp��CE8032)�����9p�JQH�=��v�$o��B4�ҫ6����B���b}�݀6�ҾhV���e5S�,�pm�����fp+,� ��'A.��dq$9��F	�h;����%�;H<�����ff�d�h�um�oV����z �_h}�5���3Z8�۽i�<�N�'dL�W]X������_H�����>��#���fE0��c�h�T&H.k'�ǝk��g[+)��Aw��|���p�}�ힴ'�op6���t�>���T�q��@�`ӓ��mz��ޘLo�A�;�}�x���9K9	���k�9�g#x��#x�s�x���1�a佽�����GO����ɓà��=�ڄ%�}�wī�ܢ#��4�ן�K�^h�m���ϙ��&����84����3�eryJ]��q�n��G�v�a>�i�#�X�6����oj|/���y5�0��sl95�v���2iV��ռ�j[��&o)�+�X	����]i8Ͼ�~sMwȬE8��V��'E:e���Tfެ4y��m ��G>���;/�5��֚���ǁ�R��7��V��9IQ��L��@��`\�BƀOk[m9��O@�i#�	A�#��}������#��T�Y�,	ԛ.����T ��-
K��0#��<[��`�����t�g��ۈ��8�S�jb2	sb��(����R5�R/�A1��&����yh�>�0Kī��B�9�Cb,��%Ɯ~K�k�gu0���|�k�i�� ��0  x��}�r#Ǒ���+jZZ�@����ڣ#�ލ��9��؍����.�=jtC}�+�+��b���<3��N^�������ʻð< ��*++++3+/���:W2ˣ4YxG�CO�$H�(Y-��X��������~������s����_����/�wY������׳B�7���,�VshsP|8�ЃW�����L��?���D(��ꕏ��읏.b蜾,����&w��G��m��Ȥ�n��3��/d��f?^�x�}���x��Ūx�2/D��uZH�zs&��Dϲ����D�'�����n72+�(���M=q�'�"�(��g<����cx
��'ȃ|��3���mxw_S!Fp��ɍ��4cʖ!g8�9M�j�_E8Nb&����m@��K^��,H�sXk����,
)�w]K�8a� �2
.#�p�Q���e��=�}�2_�EG9�Iyny��8
gl��
��. ���ȡ�1P��iD�U/�"�j�E���ɓ� D���`�_���x���4y[f*t�����? �"���T?������mo*.���qK��Fӣg8�71c�_� ��������GsZ|��Μ=P�$ N	���%����9|2R�).d�F��GwŦ��H�D��
Ԉ� mm����x����98l���v��m�-Ll�
�����D#_>���ك��ʹ�Z��Y����۷��H~�nW��
n���< ���!�.=�L�ixc�e�c�������֦�4J���ߚۃu��t�h	.i�悤o��;�9��|mAv�R^Dj-�A>�d6�i-op-�������\��S ��|芾��B�=��m�@��AIH��6m��c�����xe���� ~�ͷFWQ�(���.{6,��̓t�

�#�1E&%��e��<Z��@�y`�n�&���I#�1���G�����<�0IWx������m� {4h��j�O�7ۿ@��F�8Z>TC��р�-v�P��r)�⑄����#��|1T7y\��n1L=y\���*��������U��ŀ�"����.�౏⏋��q!�Nuà���c��\b��,����³�=�:L���'��l.��U�SL��� Ӳ��3e���d��me�E�|�kw�Q�kT��
*5k�(��|���<�->��ɖd�_���X58XӋ��/k5�
F�!�3��bӭ��3���5a���f�? ���:BP=#9 �@��fC��RGՌ;0ocR_�lAU�sV���b�NATC߫�C�V���.x�]��"J8�CNP���A�*�J�,+cJ1��'z�ype>����\.�w��纟�7.흹_m�:�"���>��g�l)ì�|^[�'�4��ڼOr��N��PF{T��q��V�?��VE�˭f��v�Jd�k�ރ��ȱ]S}d0r�T�"r�$����L���!$��x�yQ�ܣ��	~������Oٵ}>�Ai�U�/Y���f�Pi:�U���p���h�1my�B��)�����s��oa�#LY�����%���HW�ІΰL������ǯ�~q�)��✼U�hP2[�r0���t�%�^:������Qf�[-Â��:�ÀU{�4@Y��d��KP��3]d)����s��
�(@������!�'i�k?{�<a�}Oȁ�NQ
��pj@����\O,�LT&-�ZBt��9;��S��!��=��$�����'���j^>�YL�X���A>T�b�X�����x�ǩ�8��U������>�x���#Ί�(?�V
@���珌��%��>�������n&�I
dM����{7�NY�����re	�<�W��|[$�a����&m��J'�n*�=~8�'L�WM3e�AO"�P�&�g>|;��	(�Kl�{�X�L9��t1n;8�5������=�QH��
�nvt�#�t�P�1�
B��2*t��0
�'�&��	mw���t}wF�R �7P�-�����Ք	���FG+'E^���9E}=*`l�0���9Oe��"�HfhW���K�X1[������L���QXg���m�z�ڕ4��}S�B}��k$0���=nE�L�v�!��]Dq��<�1l;�R�(�_�a�6���Zv[�z��t У��|\�6l�	ϺG8:�fVG3Ͼd8v��~ږ����f���ěz���k}i)�������Gڒ4�"#�4��r?
�m�!��L�2w����lꠏ���?�.���2:�F��H�-5�k2���S:+x%��������;R�D���$3�٪d�B����C�<�U���Fp0����'���m�����ǧ2����ߖ~y��k�;T�of��Mb�z
r�)�˨�>\C,�Sv�lԳ�{�m\;WK<���>^k�y8��uѺ n�M�kt��:�ȋ]�У������$��8�|�=Z0hp����g�M�n���<�J�d����Î&�(�Q�V��%�A�Q@G_l�R�w4�"'t�Jm�=��%�TQ &��E5/ �C)aUb����JĘxS􅵙�GEY�KU�vU	�ȝ��p��P�9S=^�Q�d2Eg
��Q��*�Ta�Uv���a�qR���I+�mq��u8�����|�]�zX�*=ˑꃪ���ޑŇ��8:����7A�����v�U�U�Թ���y��UaO�m�
@��c�%�9pn�;�+�Y-��YYH�#gp�I�:[A�J������a�&�:޶��0����%ҋ<%w"
N�d�7jC�Dkq�L������4ݭ�77���N\����
�o_l�'�)jĸ�����g��
�=6�Մk�$�mv����2��U�mq��`R(w�*��w�a��\z�z0x�x
�Ajk�L4p0ydc��>���*�tlh|=9�8���˕����ܱ�2�?��}.���A�Z~�_F���e���ѳ܀b��L@j��D3�uO»LE���J����M�r�<�|����"<�i>1P��U��xFNu�d-�Pc���'��7gg��;��~G6���/��F��F��^����Ѽ�i�Ϋِ~݃�͜�3<�P�G�pm=!1�o#Nz�R@WVY����YYaM\�E��B�>�7f��
�ϩ�ջ��6=߱:����pq]�	���(;�1��h2�0O�\y7�UڐQ]� �d��7i≩�R�Z��+����7���l��@�lv4C�	G�	xK���?LJ!\)ѶY*�۽R�/L�b���Íյ�����.]���V+����`R%�kDk����>�-�D���T�����a�;���Z	Ε�9u� 剟5�3�	�5
��s\���>*�}���y��=�Q�Mf�	|�ys�p�&�	-.��>��6s�f�
��h��v\���4��x3a�\g�Z����33���:&[�Xm�9"�%��ۺ-Y�i0������/j�ܣ�0o1��������:G�gv�.��r�h#](������^*4��D��H����-i�VY>nŋA��x���@nTQX�k���V������	M��
�
42	.�w����i��堆�&�����f�gc��(\x�j�y��"߁�����^̈́ۖ ��tPM��D�J����1��c��|�:	x�:,��T��8e����
�R��Q���G��P��!B�s%��JOY����b.5����A�n��F��%� xK������XeI7��u�e�Y�*D�1=�����䓌C��Z������O�ۃ����O­�J�F@\��t>_f䌗�b���ҏᗹf�.��V���9~�Uf�N@�*s'>���DQf��fS`��%�5 Z�z�u�u׹��:w�>�RSʔʍ.��2��a*)��u��y@��%���R����8�Fs4K?�Q��q�ٰ��{
P��߬�tfڙ��V��uBi{=2���v���/i�X�QZ-�UnCձm�8ݖ��l����8��� ��Syb�8�KXF�L99<�����췢2(c��^�~=Ӟ��4[ͽ�����G<ZI�"Z˽Li��,�Wx��8�Մy����b:a/JU~�O("ݸ�C����FL���KyX�7W~6�DQ�+GM*%�Fr�Ҋ\(�pM��H�U�^����R ׾�HX�X�;��@�ЀljU%�t�#�&U(��6U�.��)�'�*���f^�����!օ��q��@����|'��pm0���S
G����}��y͍�++���QY*�<�v�9T�����t�)��N|��-	JM��[3�-A	94w:���v	7MҝVO�����PP��q�l枵v�r�ָu��Es2��@w9ʫ���}}��m�M�N�(��r ����N�Mw&���S^_-�N���b���E�
�<�<�u.|�bxV�n���_��W:���� ���J��Pa�b�S�̤���'k?�N�e����c"�5����͝�c���Tq��r�F��ʘOH.��ZU����w��S�cG��k�yDT>�t_X��5#JOf$mi�L*`���I�l0�<���f������9M���=J17F���s�O����^�{O)�i�Hr*�JY]me����b�Y��.%�r����eʌ���� &���`�]dҭ���­�L�L<��C�R�b�4���V�-�DndŎ����AF��������'��_`¥��%1
k�0.T!�7
� R:����g��������b�}��	-�K�^&޷��Z�2Yc�ZRDӖ��v��$�Vs�M���'�\䨗��nz8��ξMG����e�G�ɛ�D�lM�n�9+���m�q{��f�ipGʎ��
G5��ZmZ�hD˔*�J܉܉j��t��(�����4G�że�I3��4hK��J'8^k� l�X�>� �&���TE}���}@?uăD� ���ߗ#:������*��^Y-ˌP:ȝ�J%�ś���E�ejG�Lᕹə<�L#��䴏&Z-����,3�"�Q��>��0����*�V��h[*ޖՔ2��&�6�D��k���^Ǜn^�ƻ�;_��1�eDU�l��s%4�I�'?��\Ǧ���9;��Z��s�.Z#i�Ԟ����L՚c���z��[uǱ�^*�ϊ.0~`+�L1*d��;�r�e���h�u����6����ѽ}~�[vυ�m:�Bw��7�Xqj�Py���]UNq:d��^?s^��1Z��}����ZanJZ��`@��}�Zsb�`�}e��f��'߆m�~f�j+!�?Hk.(��>�S�H+���Ѱ�i�N��c�
����k���AJ�%]k��vm��gbz�E�4��ű�Yƪ���-�O_�`z�]�Gg������z>)g"�a;�G/���(���R�mL!��nPq�JO6߀�-9G;�H��%�L�k�!�Զob
~���BN��QT���Krg�u矪�*F#\F�4ߝ��ܷ. ������6��:�5�� L��G$�`�X߶Y��*j]�v�����ib
�Z@����Bih�7�*�!+���ʾXeh\G���WE"�����%
�=#�C)
��gռ�c��*�&Q�ӣ���
sb]X���e5��oP�rv�j1$�ֵp����&H ��%!d�0��J:�+�_7�)0�"Hǫ�3Zr��)�$��o��J�ݛ�Ԅ�J�)��)'pa��\g��%�ܻ[�	H뭒I��T!o��D�RLE�P#����%�AQ�3��e�4aG�GBy���ew�r�ƅw3K?�bc���e���\�a�.��n��p��SS@��Ą�ӖCU[�Q������}3m�   xڝ���0Ew�"x����xl$X�Pi\�0i�J���<6����=�uU�����+MnCCh�\{
���`q�S��z��oB���J����JYUU�x-��ܝ��xh��Q?�ʆ	��&�%��/����/�C˛M�?R6Zv�g�dJ�uѨo?DJ���XF�尠$��FB�&Z_���&����>�p���   xڝ�OO!���8�.�x0���ތ&��'�̰%RvS���ª7�ȃ��y�Q�����BW�%
f@��l�7��V����nx�
��v����#�x+�4M
M��V�¿�N�~�ڠ"�DMhD���j\\ ͆:P,6��g{vz#�J�G�;�"��B�fuW�(:a�Puh큹�qn�d���.7�xwb�j�q�a��tA!��wɄ�l"�4 ���T�q�{��A[�|l�}b'�!�*r@�.�L0� ���YՂ���tajRE�g�L����7p.���b��,�2�����3`�$10bT�N�Rp�4(��dCx�p��Uz�H�5�2�M� V2H��^��j���$�̖sЅm� Ɗ��N�E��1tgmgC��c�B��ƌd�0T-@��<֋KͣB�?
CE#�w�[/�����)��2��&�����_�h�Qc�:�Wqj9��.��[n��G'�e��S��
[�L�-Z�MP5 �o��
��
���x�!�H�xg�
!
���V�$�%��������^�{�N&�V����&�
)r�5 &	�qSWD��X���B��|��0�@N����^&ͪyx;	������6F��Wα)w-E��X��ND���<���'��=��؊+�V�����US)��\E(B��epҿ��
F`|0�E%� �2����Z�8���kc�o��\�L[MI&�V8�
��2Qm7�2FҀ9��Qs1M�g�M�-*5�\���f
]�+`W�L`��ָj����|���A�/HL���D[g�M���2hfm�.�J�0?AKׂ+?-F1<xK�j��x�~84G�C���;c��4���a�($��b3
�ʣ��0HF}�Bmj�Y����(|���Ʒ�V%�~5�TH7��Q��>!�w�G�ޝ\Jp�9�� [Ib����O��������D��K>U
T���	8� ��z��pj�0�l[��2�Y�s���'B%��h>Z�]8��E�3���r��@���~8���'|�!���?���O/��;Kv�fT_�ݡk�Q��"�<�I$��n�(��a�Ǝé#����%�I�����:.�
n�X�멬{N�vW�뙧O��Cl���1�c0hEw3A- [1�p+B5yZ�h�I�-S�Y(<B�yj�<2}=J?��?WK@v�"3��i��i��Ϭ��զځ�ϋYwd�Ƣ�\W�U<1��Dt���p��^���L���:;=��>�Q��^&1�+��9���KG8�������5�$����8��U�TT���X	�
L��;��c�M��7�k$�·�K��Ǡd_�0��͖��o�� �C��I  x���閣ض���rxg��J$��ٵ��A	�:t�B���腇��?w��}�|��@R��ˈ̪]g__��!�կ�|s�9��*:���^�z��ҽ�X�����.�������d��\W��.6;���Y�s�f��.��Kf�����/q������e���@U�
w��A�/���d�"Y�åt3;�̦��
A�/��3�L�����dU��;�_��(�V'�w9��tbt�Ĳ�k��fa��N�M�h�}i?�#��c#�!���a���W��~`^p��i���%���8�='O���=�V����`�Y���Β�@���ep@1͚u��ѮZ
��%����݇������Z^��~��A~�_�]3<�T�xi�؅^��Φ��/J��1��߮=���r�j�ϓn�&�~�	<�}�-���c�zq��q�Pϗ6z��m[f�7���Y�'�eIK��^l�&�df����~�-s�f�7����? BL��\l�G��O_:���Zy &��YU�ȝ_:$#���ǖp[���`��Ւ�i�y��f�hHݪ�]{<j�>m]�����׿7�z��'��64����o��m4��r�
k��wS�(,�Y��ь�l����-4����~��Fx��h����S3/t:�41��BP5��?�۝��N>w�9��>�|�r����d��5<���������J���L~}�_h�{U+%�M<��j�⽓��8��{������<���!�c�E�z�!��=H;�ǳ_��σ����|l���΋,q����6yh��q��givCr����Z��F�J��<���/
/>�t�{��厶���aW@
tk��M{/7Tx�K͆g��7�Z�-�↛��+?��i���~���J�B�o�r��ϗ��Fg>h��,��`c��q�{��Ů9�5/��yW�I�@��g��4�VdC���~���l
��w.�<y굎�����`'����a7�������jEm�п�R�z|I�ĭ��l5��������?||&sa:��|fq>`�^� �^��GW�m�����`S���m���)�5������#��sW�����@|��5�B\�: �XY|��+�f#���t�4�������>7�>�~��^���k�>n&� �CkX���QO	����RC9�ך�����^�*��F� �[�y;��D�?#��v� i����������A�G}q����������÷�����=�8�� `h���g������ϫ�U�~�-�U`��]�y�7�� �m�������ڪB��َ�|����o�����y���؋���%X�-���������f��y�6��d�����~g�a��;Im�|P����n��@���㼇�@�)� (�N:�w���l��ZjW�H�c�:�[�7Z�s��U�]��-
Oo�Λ�Z�͍�q�����;�T�Kcx��� �o�J�4�_;@�Cj����۟�8�)r�����u~�}����g�·I>��Ll=n�-� �=*7�����r��;�;c����=��Yh�R
�_��<����N}�ʇ�uN?��K�֬t�V��s8À�-�f:a{������ջ��Ӿoh���Ϻl�={x���?�����v�=���H��b�5�����G>�������V+�v��pk÷��.���V<�XY��?ޥ^f�-O��O/u�:��*��=]�vVӹ�!r_�=b�5Ͽ���o�8���+}}���$M�G|���/����uL|z�������:�}jOc�-󳅿a���~l��	>|��Ҕ=��4�t�k�����g��_N;_�fS$l/�g���7�	.P�ó��n�V�7p�AaE�xD/���E|^��_�V"��8o~g?�/j�/��zM��D��
������0��Y�p���L��V/���76�7�R ��/�1������b>�F�9~�nO�^�	�t�~�p��O ą��	!n~Ļh��b�G�����?��Z�e�8�� cͺ��'%IA��\,��3�m<��)��䛵h�>��a7��c��G��G���d��������:�������D�n{�q%z+}F�����^;��� �6���i|�\ү��ƛ���;^�������=�~�� mT��wY~� 7:�!�+խ{i$�ՙs�`M�E�U�7��!����՛�'=.�p��DM��RK ���#q�	���Ow�ļ���]������N�&`���,��Z �6>�·� �uk;}h�^���X�m1��'
h���k��7q��A��(���xų����;�]��x=���@қ��G+�0뢙wFv�k�<y�B��� ��ǳ;�b-ku>��fg��+�n���3��S�Ԇ�6�>� 9F�$.��[L������� �F�{��sd�6ս�[�:�ר��7�_#��z��%x����ǻ�ϝ~�~�$��2 ���7����������������Z��}Ғ������~���Ф��7#��G?iIz�%��$�{���@����P�OUw�f��~����a�n��c�kԟ�a+���������*_��>�B�������X���$�dK>~kT��ȡF��}�9O�{{���rɃ@��ʧ���X���Fy��W���j�b�� �K�@v=���/��U�����[���X�)���l� �i�Mo]��q�<��N��;X����{��>��%�r��|��ŵ�(���{t��,�t���5~�?ɒ6�����
=�f~�˽��K+��?+�41������+=�_P�� }��ުrov��y�;�����Yz7yu�?Y�\7�!��v����N:x����_�9im�_�9#��V�f5P���>\�>���D��+���|�yV�OmĆ��:�ij~||z�D8�����/>��)�f�c��h����®�F����m�_a����/��B��������U����)����L�B�W��upò/��`���^����|?|�o���	��-ˏ�X~?Oɘ��ڈ�߻����rOg����4yA���gI@�|�2����}Ն�ܟZ�¯�����ָIS�#Χ��{7�
@�0���X���
�9��o�R���֢�d^��к�|?_�d�}�m������l���'�^Cr���*��
�,�;�ҷ��y!�|�|	����[ϼ��y|�9ن��~$�9�w��Y���G��^�h~�ۘ���������^����a���۰ЧA�H�퉵Y����9�`w���Kǈ�&����W�ZVyS�0��z����ޓ\����W����g�f�ן�=�9��k}��i�r�Lto�t�o
�.�M�z{�,��§m^/غ�)�>�������.��'J�n��7����Nq������۲�R��������O�d>�Z�h׈��;����T��SKw�Y��7��E[�n��?4y���}��������i�g�$H����?�2>���	�{�|_:{x���/=�����s�lsy慥��q7��b��;t���F�n(��je�G��ߣ�Β��$����Šz�ޓ�ӊ�?U�6�xgQzѬ2�����Ei���.W*���-;^��UN�G2�)�X���I��5�
,���ɇD���u�J��^^��S�����[i'��M{)���
��=�|j��{�J����o�7�@����'�Y��]|��p����&�K��ڦ!=!��s�*o�ģ�<���E��6Z{9���[ƣ��t�k�U>xM�م"��n���v��'h�ǹ�I�(�6r�=.���򪗠߾�����w�X�FFz��=�@��,���ح�x���'�?2!��E+�ۅ^��sK��������y��$��7
Ú���n��r���������؂���h@E�Ҩ������M����
�3�Ƣ:cf��m�?+q'N=4ڳ�^gIqo3�����4�s]���Y�Cd�'��*�b��z>�sG%��-+��V�=�	x����@���Y�.cW߳*Aʡ	fSX���7�f���SCa5Q�cz�aˆV�Or-�P�D��իC�X	sZ��0����1ڃ�D�~��Tx�a�S����HA���Km�������n\L
Q(=^�`�'`kI�V�d�� /蒌O� ��R>�%)����,�2�=�h�2���#�@��H�U��
9-`h��3a�#��Fyf���Dኚ���w����ǝ%�[]هTJ�ˣ�kG���r��mX;<�"�{D�II1Հq:a�@�2���;ć���ȄɔyXo��8�B%�z"�l5��l�����]�6���К�I���˩%(�cՙ�]LR�7Q��l<�`���`)nN)�	&�K���=mem�E�<�`�h�,NѬ�UE�,]�țI�ÆU0����>f�\8� ;9]f-p@º�#����Bn���r�K2���$IzG�͋�T����nِXQ�9Ec�3ߟ.��r9��}���=���DѼ �R<�h� IU� E׹�[��!��Ջ4b:`�����$�*b�ؓ�!��W���g�z,;�P��7	b����d�_I�Lef��zd�T>p�y��Ř�����l�Ә� ��Q�n�J�6��

"���9���D�;�cϧ�p靦�$Ϩ���)�m[ё�剷���\ ��v���|������f4����_�VSB�2��b/ތ�9�`\viq�z���a��]f��s?���*���M|d}� �	�JS�<mz��L��W�{ɓ�z3�e����'D?7�<����7Ҫ4�Q$�
\t�����ڮ��թ�h��>��<�8�ȩ�Iƥ���iʺИ�A��U��)SƋt
Hd��_{�g���2���O�����-$N�����d݌6�b�ǢQV]�f��(��jdp=`A��(& <�FE�V
�/U[	��ӛLW]�O�,�Іi2�]�>��	p�Av#��&���Z���x��ф=����J���ꘖ�zڋ�c%ީ����ȹm�N&>aG��P�8�J�a���&��t!23��B��Q8Y��~(]��Z�O��.�׺;u<��ݙ����4�h��';�޳�|�Y�]W�С��@<�"�yF:uu�=N8�`��H���`j^g�pp�0"du�I�s�79p�m&G!b���x3�s՜�r
@�|�E��'�c��l�i���㣐�]n����W@4�*�%���(0����w5ߏ�u�P�
۳0�]l7i�LhWMKi3AVX26C8���깚�9�IU��8S�1�<�<����O�eO`x_�dWIB�F�@�1�t����Gj�S`<ԡ�|'*�[k�2�#K��	R�~�r�Q��i�W�h,h>p�80
N�$/���-�9j8B�d$xj�y�2b�Cp�9oE�W�y;�ԑ!J�:U8c��h�L�S�e����<�a*��t����<�Klﺣ�O\�\��(���`9��k�Tj�󧅚��H2�$D�L5�$)<v?С ᫲��E�<��I���]k{:���_�(���e�x��iu$ٳr���O5l`��v�͐l)��=���!�
4^���Aw�ъ�O����"�Ι�����=i:���ل��1�#¦ar�/�xw9�6�f�UTg��=<_o�C$�h��ш�uj<XΡ���N����EJ�̚Ȼ�n���
�����&�K��U��N�J.�xsZ+���ؔ�S2YW ����쯍c0>,�����curR�9
�-��lX	k�k�Pd���-��.#�:6����E��s��' ����7������6���b�Ζ�y�U��:$�@J;\�Ɔ���
���v�d���Y���A�t�՗q��+�N#��iV
+cHmW�J9��q/��1wi��/�
�����M�m��DO��н���(�=�;֑���
��N���N��)���F�LJ(ai�͜����xg��v��rcM��Q��U@��	��3�����.�=E��fe�w�������<�%��1��M��,?CP5��B�^H�&Bņ�*D�!|b;s�
���Χ�q����1r�+~����ce�Ԕm�@�R	cn�T����x���-�3�Ǥ�ze2���ȶ��$�HQ�Nz	gka�_Ԕee+%����=a=�	�g���<�!��hќMag#8COcф	��J�p���cG�<�{���Aw@� �Q�Q�9���
*��`�xk}�0֔:�HZVquR*?���,�.` �װO@��ç�Y���-؆ӕ"�{Ȝ*,�Q�s�꼜y�\Q��ud ���$MS�R3ڗ��H
14n��`2; QsG¢J�w8#��M��;+����0��~z�,�k���D��XT!�NX\���83�!��НU���@��
�
|)`�K���o�a9�&U��<��D��防�#��S�Ј��
��a'9�;x[˕�Pf&�KKfDu)��;��F�[S�8lN�r�l�
�y��ЛR.�>���{tC��aj*�����8��Z�v��H#%�{ho2_�{z] I��K�C�i'��
eR��g�Q8y�/�ْi�Cq��7�O�4L�(�OnH�E�!
���x=>�)f)5��v$UK%�5�H'Ǘ�.W�c��'mܷy�)�f���<�1;���
:$�딦R8�!�δ�H���<�G������XT��rT��чIܭb^��8Һ�XU�Jab�����֨0��g$:&��
Hq�#TQ����L�z|5[������hOZ���$<�C�s���*w��M�Lw��%�,x�qT �TA̬��#m��]�f�[�;]�<AI�U�]q�nj|��&�qfB�V��1?��y~`Q�c���2TT%�>��Ɣ6+S80�L\0*�V�>f��I'��1�5Ni(��\̇cy��-�19^�h,��.��9͟�?d�
�'R��@��q�c:t���7!*���b*̐����b�@�P�q ���f�
�K̊\آ�J!���a��H�#%��$�/v����rz6��Ѕ��h��H�|&�t�ګ(��LtN���YU�kҙ9iVi@GS"�#E���B`���g�2\&67'�d��E
�����9!���� ��]y�����~\�ޒ�3��K�*dG�G�TS�c'*�Q���
��*tvBI�Vy6�K�������26�	�ׅ���%���ˌ�� ���)ޅ�Bϋf���T�3,,P �,lv7J�My`�Hy�i�Um�'6�HIW���.C�<��L���b-��&��ঈ)�=��o �	�@��SꞚ9b/tx��9��P������j��+����n>;286�m~��݉�vC��X�N�쉼뭘q�F A�rڗ j����g]��7���Z�htHf�d�s��O�T����j�s
<�թ��A	�¢UM��R����l�*��Q\�5`Ɔ�Z�K^rQ�r69����y�1f�����(��p{{�[��>��B}ɹ�f����<׀�Q�3G2����z3��e���%�Q��RnL�d��ȵ�f'<�\�����Q��n���cM@��5 �iE�-�%<���t�S�*v��ű�;�z`�C*S �x�о
�
'G�"EwDq����a��R���Dr윞;�q��̉�47�k���!E�,�!�k ��#�v�� "��s���إ���cf�{0CG�9��{�u�� ��	��������ts=�U�ׄo)0m<�a�_,* �ݍ;r2Q�hW�i¥�2��>�X��~�d|�P��+8��Qk2c }�ZrV�7��(ϴ�bD�"��
W�� ח�	�L4�,�f��(&�T�Jj�
���O�8�VsW1#R�#�s�O8Ë@60<2��\�\���4	BvV�d�����]�e
ˌ|
KD)%FX:V��5��&
�T��,8)3U��9ZN����,/z�*5O۲�E\�V�8������TC�e`H'<���w��&%.��X��)��{8�;���xy钧ƎH��9cV��Þ
K(�~��3u��P�,�N1�Ζs}*���y�-��^����qb\m�����ms��ҌM3�`;r�PQ1������f5��-�MH6�K,ٳQv�͡n���r�u������D�����������K���g���z��+�u7���v�Q2�9#ql�2��puV�Q�?lVV�VW���.oh��(Hsr6cA@|�f��t���:%9��.I�,�O�������
��R���'�y`��H
C��d����yPWM��Gˉ�GW6��z$�1cJD�:)n ;��)ˍ���nxg�CRaɀ�M5�@���#�����WV��Z �ø����nFΖ=2hB%l6,T��c!�\��a���� /��$�ͺ���c�wy�d�͉��ݖ��-��AGZ�(��
]��0�5ab�2��x�fTs�A/��ʺΎ��"gˉG�t�ԩ�r��6����|I��Za �]���V���$݈\X�`^:�`�΄%+`3�qx���Y/\;,��,��XV�����X.�r��&ڣ�zCc���Pj]�%X��w'��o�Z�$�����:��d�P~Id|����	�R4t�r��Lz���%%��#�3�ʕ��8��� �εAi�:���u!.�2�P�v�'��w��au�[3���n C2UbY9��d;_���2ج��I�H���x�hZ�%����z�"��3��7�Pn�W�h�B{���>�K��^�tG>�z{�[M<�8��:�!�Uv����ט�');�|�8
'v�A\��6�P���Q5uG��Q���x>�w�`?���9|[�@����d�Y���93��&�V�׷^��}�U�Sj+���g�n�����a]�l����{j.�z9��B�$=r	���u�U�1�aȔ��K�t�1Ϫ��ƻ���ME/uQ3C@� ����6'�A'T=�4tWH��������/���k+�+9�18V\��fQ1�#���ŧ���L`ɬW�P��2�m!x��v�H9�ą��3��4��-�G����PL�%~�� ��!}8:����% ��*ca�n�n�([b`�,OCj���K�KR�Lpa�-5f0��!��j%]օC#����@��<*��8�k`���aO�
�%�/��K�!ʌ�lĐ�	ϩU�C.kNW=���I���HG#+$Z��,�r�>K5b5tD�?����dF�L��
�Az�( �ت�8'�ݑ����ʖ�>���I��mt-LF�|�rG�䊦v���*sٱ��T�KǇ�v)�F1�ko'�öC�1eH��P�En�SR�K�ؕ��N|K��Bvs3�"sòBwI�'�q�b0^lǬ�:2�N���v��^ �-ཉS}D��HN�RIxN( iW�,3���>��ӶO;;O(~������ q���}��(F'O<�""�9"�
���3�Xi�i%�jD�'�Q̀Ԇf�v���&�\E30�<�.g9���� &\�K�q46!��4����z�C�&`=u4��矸�6�O,G�U%3�a؇j�<�d(�/
C�N>�)�@�
al�Ui.U��8���|;e�=!\W$��,�h͑�i����@ۆ:��}����:r%v"�F�౲s�V�2�
�Ò
���+��a�!bt�~��R��_�.���~�cdW��   xڕ�1�0�w~E�]���1��hAz I)O��^_�}��S��6�ݵj�Kwm��ʖܨ��!�5��qr
�nr%Q\�ڍ�}߻�uk�m�R�gN+W�FY�I��Z%_wG�
���F��#)m�"�ނ���ɽ�����+��wFǰ�; RWFt��a�::B�l��r?�##�T$/�"�h퉱q)��*)�װ���@
j�P�C%��[7p��
e�p3E���Wm8�}%���L}��#�P�r�e��ԋ��zaдa(�o��%U)-�
�(<;䔷�f^�te�z��pǆ�e*	�w���Ĵ��d��¬A�`�9qͅ��(d,�1��U��L���XM�r��z��`s"&ʔ��M��x���6��ɮ�;�R5b?��틗?tr2<�D6��і ߳>��\�غ��H�6�廷�v�Hv�x�ǑA�����A�@�$�E���G�1����,ox�#��--��(���t���*QR��b�0=Q��e��[G_���>|O�,�/uM�[?.%UA�\]��2�	c���&�6Ϻ���٥���p+GBV�m���"������\T���iܤн���q��� �ƽ����O譂�5��+R��
��Fr+���}�O$���U12V���I���5�#�"'#hېR�Plz[����
���� o/���2��}J}l�Vk�Ш}j����^ܛ�O-��݇��Ȕ���Լ?~=K�
`"��p_��&�:�
a�N׏\ysv�i0�h5XJ����24ʴ�r�f4n䱧(� m1c��'{܈�p���ޝ ��%��M�8�w:9ѥ�W�8�eJ
箹����Zr�Z��X���pE�Hz�癚t"_@f|^�C-�Ե�C^��b2��8��	��Ufu�p/BŽ�����,�]��0�F�q���!�q�۲n8G��]6�1i�i+�ƽ�O�-���Y:Hm�9t�dɸm���k��~ڃ����N�if{�-.�����$N~��g6⤘0��i���M���W��q87���� ��`/�����   x�5���0��<��M�coF�p���lE��-��6_��oe��5{)�;k"��-0e*[w��`�&<Brs���⑲�V,+�<�1x"'!�i��A+�ܺV���X�Q���=:
�R|1����"���Bz�/[ʠ�������@��4��X-�Œ����wF�   xڕ���0�w����������f4���IJ��!������һ/���]��^ivú)��aM���V�����K��U��f�>�)SV����+�[r�u]DX9�H���">�ɿT�ƤA�V�Z���
N-�b)&)��5�%���F�   x�}���0�w���N���1��h�QZ����"oo��8����}�����*�o��`E�@�.�ht��U��$�b���9%$+�<=�#v[��q�(�NI��ؚ9&�5(��.��
��=F�0���� {1�c��^�8;�������`��$xk"H�klYw��?+g:�!S����8F`jfb����37�|��>��%!]�9�V����ha��,�C�T��MT���˺HB�qi����\��";� 1�D���ci�DIO��i���d�C����5���ܷ�֢-��!E�hX�����M�#���k���J��'k�@n�L.n,�LP ,ːޡ��9]�uT���̳�
��L�H������ߓ���jBߟ��A�����f�������M/~�k1��M��8��m�D�# O���&�D� �5��~OP�C�9|N)���0�9�vG֩R����g�U����|v�*�g��}���T�7e:�5�
��N'����Bw����ԞA�ٽ`���/Ex[
`���:�o5�Z�
4���;P�Kz��.h��Ԣvv�֦UM��|�9�^!�mw�+��u�;K=N�ĸ�;N�9�Y�t�'��zK_��������\	wK?>5����� �<��R���g��b������|&�x  x��Y�n�6��Sp*P�Eb�94������bH� �.
(h���P�JR9�ivY�b/���SR,;��nq7@rd��>�>ܥ��0m���^w3 L�*�r�>��p�m�����G��t����$*&�/���H0�6�G���mײ4�ٮң0v���$���
V����.U�Fi�>@:+����o4UxE�p�~�R��$')��x\�)ٺ{�T%�d���n8�s�~:m�����R��~[_��־
�`�܃˃r&�:ǰy�w
��w�<K*`h�|s*�,��A%9��͂l@0��ߛφ�h�,q�|P��2�/m+9䣼�2����!zQo9͌�*����Wm3���ۋ�w��6m-���DnB�Ta���*׽;Ռ%�#����H��ˡҩk�L(ݨ{h��������38��RM�:��X�1Ѷ��~r���;�\,�8q��zO�h��M�pc�V)��o64-H�bF����Xi�L���5`q�c9���pW��ݬA�L�|5E,)�"ڞ�Vnހ4�hњt�m1)�V����6/&�=ډCh@�4@����� 7�CP�QLʱ���1H�صk�rMX9� 1�H�����fy��r�/-�4��+8�7��b�%|M�C$C�+=�) ��%	�m��`�T%T-3i9bqm���ٖW3E�r��*�FGL�2��
\�q`�n`͍P<��VV��Gi�&��VܺY}����I������CV��sh}����&�*Ӽ��e|q?rK��dK�ѥ9����e�5L[fͲcĕ7�i[�0�����×  xڽZ[s��~��8E;�ԑ@�N2Jr�u���M4��iZe	,ɍ,�J��ɣ���?�svqY� I���H$�{�\�sY\|u�g��JY\Fg�$^$2��2�f~��諗�.���w�o~���T&���w7W��hiL9����b��2���R-Ƹ��|�&�p+~ÿF��������\$K��^���g�i�/��Y$�R^�P?Q��s���C��K�m*�֯�^~����9����y1��9�4v�=��c�@�^��� �1�|��i��?�FdBs�_!cPf,���Y��5Y]���i}��,eZ��G�|zl�,�X�]ps�� @�1�>�_�}��l^���J�S��P=�
�����"�i$>P$"��7�-�B��i[�J��(�_�e���Y~�	��
��$��\t̭h_�
 ���`
��s�D�7~�M&glWv�o?�39�����9����\SJ�Le��l%�ibJ�3�!	~��g�EE�G��-:�q��V�!X���v�u���9���I4�dǟ�P�x`���lp�V�H�;��
�1�h+�h=�zh��P���
7����XwJnF9翊g������o��;�R1"��M$��=��i4�U�\ƃ�.��B����=1�`a�wh�p '�#8*�(�qU�Q˰~LI'��0��-D�0ы�zd)�t?�j��کh�k>	�v�rG�����dل��8:����R2�<p�nhڦQ]����j��u�{Z&�n��gr�C:j��mve��`'���2`O&�V���zpF�N<%��^�z��#
��<���u7JU8��Nζ0p"ˇM�K��u�l�'I���q1��b�7��p���Ic� 1 ��ZK���z���F�Il��z)��c�l�0I5M"�6[�-V��"&S1����<a2m���TH3���h����4�e��L����qv���o�7lk�v���O=�ۈ���7}��e�ōgZ�P� 
,�O:̻�p�e~�JA�B��~����7TM�P�f6��K���zW���c^����]1����K�ے>�������b������Q�p� ��sss���oS��&?ev6�*����u=����@ڠ�ٌ~vNp����H��xjx\xAw
���(ق��Z�K���*��DfN�A=��jl����~LN���U��e�ې��b�1��C9��V���6��EGUF��>�u ��1h�۫�>~��P��[0�/�*�D��L2�ϛ�2���ְ� �!AX�Pv�����k~�ho���X�l�]v�-U*�L�tw���5o��?&6svE~Wp�Ыֿ!P��赿09M�:2cX����H:�u��0�W��C����0������e�>٥��@��u��*;�O��:�ϳ��/q�>wi��6,ا&�e>�	�w�L���n��m���`ǈ��@�,{p�ۅ�������ۑT���a�r'#Ţ��V�,���n�<�E�E(ߞ�,�q/��~���ݦs��fFmr�5g���|�k�n�����m�P��TN��ň4��.(�{��%3�$��E��99k�h^�uD�/ ro+K��9�(�v�'E�v2��׏UM0�%8��atKn�`+��[��� �D)jƁe��a�����+�Ny/�GL)���s��gA����1N���f>�70�
��JT7���WA9��U���)~km�ݡ�}���~�S����|(�EA�/4��J���[��<��v��$�Zs�ϴR$3qb����3�-2x �V;���k*Z����x�^�^s�h�߹^ƙ�Tp�
<b;�Z4vE$�w����K�  x��V�N�@}�+��D@�TUU%&<P*U*m��'��'�J��e/$�M��A��c���[B����̙s�N���h,Wr7ډ�E�2S9���Ȼ���h������c�����*��㓃C����v��F��a����$��>Ĺ�#:J���q'�{�$�^0G� G�G�Ҥ�[K{���_v�/Jf!ʆ(���w��x�c#pW���
����u���u��9��,�\x�Ų5�kf!o13�e��Ny#B6ĂK�
�	'��74E %�Nr�?�>φ���(�£��@P
����;.����I[�e�9W�Bb���DE�fNjVCSI��ڼ?�	��b�UE۰D������q�\K����]g���y��s���4)���ԇ�N��t(ھ�+����3amv>MJ�Y�}EII��)a0�P�ho갂�-�5
[ީ2��t�E��q����������]Q�ml�AӤ��Ta�:%w��*.����W�Q}~c��K�g���	^�����W�R�FSP ��m�~ M{Nq�RM��
����%�8���.��� G��ӄ̘�<ώA�o�Ey̳��V��A㻓o��}������3��z��lDS���۽���(�	c����.��~'Vq��_��*a'/�b�)2eZ���}/�\��P��ٓSF�<�	HJE�<�L�w�ȵ 1�DP.�)�r�r�?i&;��&�6���%��E�#�8
�Ĩ+��n��t�cO+�p�oV*��MIt����)r
&��L�k���G	F�HS��Q���0(�@� s���ҍ8�.q[���Q�|�h+�8y������:���� �R0���b/Ö8l���E�`0K�a�H�"���h���t��R��C�B�*�w���'єO&�@�?.���#D�mp2V�a�3���d\(��-u��<$=�����������
$*mr�'�(�,�@A�Ƌ��� q����!;��&���ꀝ<��8|�����Q�<]��`���!F��	��?�dh:b
�FX�����X��
'=^A)̡vy�,3�4����
`6G�͈\;�^]�1�wG��ׯ��y8�WW[�>]ٮ��pMN'�ׄ��(,݋�Yf%N����ⷌ��K#"_&-�|�񹨒�F�̴3L�;�� �u�4	뒆�P� �|0��Pky�i��c#\���e�|#˯��I�{��4��ڧ�a� t�X�q�S+u%y���Х�/J��M�Ϡ��q*��{��D����
�n̄�����ܙ��wo_������^�D"���u��j�'Zr��i��.H9L5��	��V��\�G4�%fz��qRo4T�R�FF�R�K%r�X�2w:��
A����2��'�9n�3�� �H->��8��rN[��\��Y,�">�@;�Vح����-�@Ac<b�&l�B���C�_MJv������T�&�6$��*YJ90����T�w�ߗ+p���[L"��&�æ��D#�:	��OH�����H��T�e����NѰNam�I��(AwJ�^>���K YP#81��!K���Gq�-N�+`�iq8ňEJ�X{���%,�1�7�����֑a����5,N�d�&��hq��d�ɂF���#��V���s�1����y{o�)�&��^V|m�3	E��6+��?<t칖_}�M�E6蹊?ցad��S�g�Ւ��Gº��W����:G$à���*�������2�|���M�C���n��/�<A�@nUDؤi�,�N-X<rk�0Yk�O&��v�>�_�
��SG�
}����@HѱNL�;/޺"��R������d(v��y��q	s�f �a�lbm|a�v�!���2�\h�wW廵�Q�A��M+�h�1^�dfFV#3�0Q�)s����J9��<��Qsa�u��jGV%l`�3^����}?��`І�Ҳ<H�8yR�
۳��u2�_oMXclɪȇ�G�?y*a�;ɧ�����=q���ґ����VpEmxo��������.[{T�=�:�î�P��NL[�Y�a��T�4���5���~S���������D����]�g*����a�_�c��K�vpg@xʟ���Mo�c�{]8Q�R6��u/�a��'���<�<N�W-�Q}^��7����[����(��SH<��7V~�[e]�j�OsC�/�U��  x���r�6���)Pv&��d�J��9J�u���䏳��er"!S�d@B��i�3�{	����)�r\;wj����������W3�̙����n{� ̵<��Ӿ!���_�_|��ۗ'�7�b{9s>�2�^�����v�f��X��Ĵmv��vh 
��3��^�[��S@��dL�� u��
~|�\�2�1J�3��R���wm�A.n��J�C|���i�;� �w0�0jv���d�D����R2�I��X�JqEN��� &bW�	�-0`Grbq��	aļ�^)��4j0��AO^R�	d�_�&���Q��{A �
���P�)�9���TA�c�,�Py�P�<����m���mj7b#%>&ɂޠs��,�fx�q��b��cG���q:<ԏh�A�:fjH�� +�Ԫy	=��6�O�,SqiW]�9�
#�T�+5V�bL��i�5ԩ�Oy<-����+�%&���=�9� ��ǉ'���]#��a�\��Љ�&�K�ZSz2�e���ً<�
S�{����]�k��e9����������pq��T�����h����0���p�l9$�v=�7�V�o52Sp�N� m���*��_�E)��0��bK�H`� ��=n�)�����?�
葮��m"���n����=�P�OݾaaP �̪A-�}j��3�=�}�W�Z��d�1	�o�Q���f/����N�D�%r��y�����`���)�N��yu�|}zr��T")�?��mz:�?�A@aJ�eY�%�G'ǣM�!�7�49������M4�r�Y5�'����?��=����|�J V5k��3����[5��+R 6�+YisME
*��W��e��S�?��,&A��˶�U�YO[ ����~$�Ң��������Uݕ;+
N����.�1��CdU!�澣Y�چ�x��z��,�HD�J�tu�� W�Nʷ���`N����9	
W'2n�Ăl��Sg2& �#�/*K���ڣn3y��u�[�[Zޅ+�K��L�cm�#r���7b��f6_a��Wd�x�|E�m��͍s����pph�[�6�`uޏ���S �pܤ<ǿ�i�f+��u���|p6��H�����ҍ��q��Л�7�������{y�j�yF���o at��nL8s�&�e�zpNƘ�r��du]�]ᴯx�qU�ҹh�{�ҝo�&V8p��5��r�*l	�"���f�%��O�8G�F.!z^:T�'b��ƠR�`�: ��[P�%������J(uL.|�T�œL��A�� 7ҩ�����F��e�Vz�@��Is�ܑ̰N(W�nh	�#��>���SS�/*%�bjBXR�m��^�^���j��e�Չ`Ê�,nm�h��D#)/nZ�$ǃd�&$��:��;`�#.�2u�H��K�[�۔�yO���Q�&��΃M�P�U��3E �!����~U-	���Y��n��X���
ϝJ,L�+��T9L\R)��.���b������+t�g�����a:Ա��땝F����`4 ������$��9PǵޓF��B�s�=����&;�B�M�OF���pH�_�N.����x�*G��^��l<$/��_5|������)��n�^ tC��	*�����!��ߐ�ސ
#㩛���Ec	W 4L�鬪����/Dc�A7�xib��Dcfٹ��NM��'��N�qœ��xU�v���a4)�Y
,��}z�u�w������:uٺ�O9 
�]��O̙b��t�X��spy
�Z�Օ��wM��H��;w�9� ���@����K�1���Q�	�3�ń;c�9�n��5�44@�0Z�i����F ��ww�֜�K�5c\�M"8��.��m��ꌋ��?������mɾ�ۉ5%��_ٵYy�s=�%�<�Ef���ѻ����pU��Z�d�����k�Sb����k��W�T���Ala�%��
���h�x����p_�Y���z�-���!�,����;�z�A�
����J>�� ��h*�OK
e�h�z���r��B��X!ɟ���
2(�P��Q�VoE�Zlz��7bM�J(n�s�c�
Ϛ�j��x7'���?M���,���L�|c�x�|N>�O�(��ǉ��hf��~�m�6�DB1�x(�e��

�4z]\���n��z�.u�eqs=��}�q�<����ö�|��'����x<2��*Db��˘��OL�(bi|œ$)��z��U��=�v*��Ǻ�3���!U�&�<ȪGO�#9`�l#օ)y�he�{Z�"Bwf������A��R��a��t���2�T\�"RN=��<���$��'��F)�"R�'��p�C�4X�裸4�@|��x��"���	��O,�gk�W�[|�B{i�G�I���7������Ĵs�������Ɠ�8eg��3u$Ap��mϝ�r�xꤞp�$�ńi).f����A�ν��~��"��	l�Ey��MS?���w�]n�e�~<�E(j���-���=�]靷o�U��0.c��4�y�O ��  xڽUMo�@��WL]CK쒤U��P�R�҆K�J�b`i�n�¿�\�'�c�]CpI��=� ���{of����͔���Eq��`��,/Ƨ�5����Yg/yr��;��� )\^]zL��'q<��#�S�M$�8��se&(�����c�w#jǥA1C�r����K����i�V����#��B�Y�����F�:�ܴ��ش�h�h��
�ݫ���7�O�5j��  xڽX�n7}�W�k��Zg�MX��E-�@�z���r�5/�� ���(������겒Ѧl�e�sf�ћY!ȔiÕ�HNӗ	a2S9�������ɛ˃�7�~{{���+���������W��[[�����eE)��ғȼ�?���P�;�m���gf,8"93d�d�7�8�7�2�G� x0����\$?բh�I���79;�%�>�p��(�\	;,�&vxMG�������aP��I�t�,�C��|�%��I֨�hg�
�&�ay��-
��6��i|��5���(g�H�Fh�r�
ǵ�㓥}���dJ5�w��:KΓt��Gos�����%$?��11�rK،f�7P�*�b�`���/>kF\��M�c])iV�� g����9�b������z�۵�X̍�n�d�bK���Byy�B@�sx eȘ�Q
�ә�`/�����^��E�)��{[�t�!�&���}��Ҹ*��h��
KA��ٰj-XB��+s� ː--������Q`Q�5[�FL�� �Y�J(��АND���
�v ��"��l�O�>�{��'���w���Hr��z�f�6�'iU��~���h��#��sx�6�5�'�D����ˀ+W�dлK�e�Ar�л�H���x�b�C�Bi���&��hb"���\ݪf�V�]5�݆r_�Nx��Kt0��G�%L�˷ gM��}�J� �g��rB'xq��C�6�2n|pO,�9���\���k :H0�����ښ�[�X��'X�4%o�(�)Y�4̀Ds +�1��w��}�\��KeG~̙G0 {5����Xf�Ð��H҂P͑D%pbY�wq�H&���:�rB'XXs�`1�!8	áא�yE+Q\'��-��S-�[����y�,X�b�A�9BV��/�<�|�ACh�K��C��`a�����%rk�_i#���X���i5F &fV5�p�S�i1�����`V�h	��.`�M��X�k���̣A����r��>\��������UJ�j�v*��lƍ5{;̨x�+*�ܵ��6Tx*,Jڕ�����b�����zr�}� +����f��j�d�y;޶w��vyQ��k/�����7�K��'��.̪pó*K��Ƨ��cr]G�^���x�U����<y�hm�pc/��>�Ly�>��i]���!��Eѝm�|�Հ�ެkP���*w\Ӫ��]x��/�����cuW�׭\�+c&%����z��F�Z��v������+h��e`ʞoq���_���}wѬ�����WtH>�7���U�o���6��ԛg����X� 9'����U�(�!���������4:+WR2�֊{�6�u�Z��UGܧ�?7�-�<N�c����n}�?l��u}��M=d��<���_�?� ��
�F  x��UQo�0~G�?�j�m{��MӴJ��[�E�9�4q2�l0��>'N �t�e�����}w���<����j�f+NK8�g�M@IM	�w:1Qt�[�v!j%8*���~����~�X��7>��>���v�������zB�[��d�$q*@�D���H�����l��Db3���\������=��T���Aiِ�Π)����әGɔD�"^�>��}сs\j�F���?r���
r���1F;��3�x��`R%*���O��Qϟ[�-2��)�x���%P�
�1r�Z[��mZu�$ls	��b�m�{K����3{PW�<�z�iD(�[��9CIK��m�_��ӽcg���d�Ǥu���e�Z��^�~-�GԤ��u��Cz6��:�4Z�� ��|Ȩ���e���P��(Ee�H%*ը��c����T �����^Zʳ:I*�C%��^�E9��v�&���3�ԅ})��I��:��N��=Jw�R̜�e���7�
\��  x��Y{o�J��R�ù(*��HR�j�W낓x� r�Us72� n���Gi�����c�����*�3�w�3g��o�~�~���+x߂�崐M^�Zz6[2'�C�u��A׍�@�w����� �9�A)� �� ��|������`Z>3B�\?$�ɀ��VV��oQ��[q�7���2�c>j[�� \1�!h�bnV�3�h��3���.!M��19��^��j@H������G�
1G�R�p�Ѱ#�lٰmki�ZH����b���,]Ӛ�o�]���m�� �O��y
�Ok%`�MD��2V�}�G��z^-��3a�fX��VԒ)���A�ߨ��-	�uL��NR͌ឺ�wMv Z.���xۄǬ`��+S�M�>�m)<��@K���´��@��^�2�$�%0�&��Õ�by��~��ص
����2RA�p4�]�]�(c\W�Y�\n'�;FJ��������~�꿇#u<����i7Þ�"]�wz�]��P�?�@O��&<p�1���	�Fu�q�|�z��K��]j�>a_F��PM��mO��v4�U4���}�9BM�ڟ�P3�@�0�Vz=R��[�dD�Bg0�2Ү�'p=�uU$~R�B�SO���NO�n�Un�+�K
$
6K��ַc5����oL�w7������Ӎ}���$Hz�M���Qw�ʧ�>���W����	v!�m���;3�c����Z|��%8�xN/�躠�E�a蝴ۮ�+7�
�K�������0)���$���|�'>��W��L\
���mt�Y&.Ņ�:�����㢐��ij;�5��v��9T���2�j��2�>t��NOs��m��ӓ�Ƅ9y
o�@����Z�X{
�!�\��y�o0~M�25�p�.P>�5y��Q����I���z?ZrmO��8:�{�F�\Zb���:
N�蜛��E���uuC�*'���wrr3O��{�i))�}�L6�#;,��j��ri�'�
`g<7=�ܔ��gMH��l`�F>H���Y�;O�l8��plX����w�f9�R��7ԉl��#e�{�I^Z{���˚f�ꐢ���Y��Q&Ѹ��̙�n�-)�7�$��SCEv8�|	 �<�ju�]�Ζ]���筰�v��!��̛�6k�3�y�����'�V�
5v'sMh-NK��8��Y�0d?1��0�A�V�F|�\�)�]�����@,���#D����i(����60&��/gb8�r�C����#m<N]�|��߽e)7~�/l���ɴ�ܼ�:,�H�,�w�
�	�E����`?�D��S%���Tsa��,1ad].���������qp��H��m��`ɨ�7R�_�d��5\p8he(77~�b��]T(w��r�.
oBƎ�五����Gj�*�c��R"�)%��f���*�))i	ԹƝ�]M��%�5ˡ�(������M���^�P�[� �!�Zp쑭�.�� Yġ/#���L �"Gr��,�G�d���n��sڴ�v�vic�D]�x�������+d��h�MEх]�������^C���:ן=�?��i��Q����0�V��-��8
���rM�3��҆RA tXF�������mls�Ih�;��/�2��,yѼ��������|��j*�a���@0֐*9����b�^b�c��7�s�[z��d`Urbq�ц��?L�������xo �7}�>�z�5��
[ I�[�dF�de�l鮱9(�"��a��E"������38���"2CO$��G�qw�%ݓ�]�Օ\��}�p�d�Ph���3H�_�����Ϩxy��O���T��PO(�pU�l@��D�G��3�6���$O���P��fv ��b.l���;�q�y�O��B��Z?�R�5�.��m�:�����yVe��Uw����&Ң�x���/��,EJy���;A�!�͵�V}�3�w�������ў֢�Ӎ�Զ�����tU�R;y��W�pwD�������?���dV���`D/vM.����N�Ux݀�u��o�J'7�9����$�ѤѽĬxz�t�u)}+�b@��&��z�R�$hK>�0��d�1�ނd��Sj�&�e��u���x�fh���S�v"�٦�8:�	��(��p0�;��Օ���)�|7g)�z�8z�y�5Ykh�;T(�
b8���t�
xD�������z���L]Y���{k�M�
ݾ���]�z��׳�A����3p��j��j$����ZF1�p^μ��YޕNTo�{lX��?��-?��X�
" INSTALLER_END