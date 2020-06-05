<?php

 if($_SERVER['HTTP_HOST'] == 'localhost'){
      // DB Config
      define('DBHOST','localhost');
      define('DBNAME', 'new_project');
      define('DBUSER', 'root');
      define('DBPASS','');
  
      // App Root
      define('APPROOT',dirname(dirname(__FILE__)));
  
      // Public ROOT
      define('URLROOT','http://localhost/php');
 } else {
       // DB Config
       define('DBHOST','localhost');
       define('DBNAME', 'new_project');
       define('DBUSER', 'root');
       define('DBPASS','');
   
       // App Root
       define('APPROOT',dirname(dirname(__FILE__)));
   
       // Public ROOT
       define('URLROOT','https://powerful-tor-98459.herokuapp.com');
 }
  