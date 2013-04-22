<?php

if ( file_exists('config.php') ) {
  require_once 'config.php';
}

?><!DOCTYPE html>
<html>
  <head>
    <title><?php

if ( defined('PAGE_TITLE') && PAGE_TITLE != '' ) echo PAGE_TITLE;
else echo shell_exec('hostname');;

    ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="stylesheets/styles.css" rel="stylesheet" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700|Oxygen:700' rel='stylesheet' type='text/css'>

  </head>
  <body<?php
if ( defined('BACKGROUND_IMG') && BACKGROUND_IMG != '' ) echo " style=\"background-image: url('../images/".BACKGROUND_IMG."');\"";
  ?>>
    <div class="content">
      <div class="div_table-cell title animated fadeIn"><span></span><a href="/"><?php

if ( defined('HOSTNAME') && HOSTNAME != '' ) echo HOSTNAME;
else echo shell_exec('hostname');;

    ?></a></div>
    </div>
    <small class="animated fadeInUp"><?php

if ( defined('DESCRIPTION') && DESCRIPTION != '' ) echo DESCRIPTION.'<br>';

if ( !( defined('SHOW_SYSDATE') && SHOW_SYSDATE == false ) ) {
  $time = shell_exec('date');
  echo $time.'<br>';
}

if ( !( defined('SHOW_UPTIME') && SHOW_UPTIME == false ) ) {
  $data = shell_exec('uptime');
  $uptime = explode(' up ', $data);
  $uptime = explode('user', $uptime[1]);
  $uptime = explode(',', $uptime[0]);
  $uptime_c = count($uptime);
  echo 'server uptime: ';
  for ($i=0; $i<($uptime_c-1); $i++) {
      echo $uptime[$i];
      echo ($i==($uptime_c-2))? '. ':', ';
  }
  echo $uptime[$i];
  echo 'users logged in.<br>';
  $load = explode('load average: ', $data);
  $load = explode(',', $load[1]);
  $load = $load[0];
  echo 'current system load: '.$load.'.';
}

    ?></small>
  </body>
</html>
