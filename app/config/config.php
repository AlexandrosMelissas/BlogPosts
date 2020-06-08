<?php

       // DB Config
       define('DBHOST','localhost');
       define('DBNAME', 'blogposts_db');
       define('DBSOCKET','/home/student/it/2015/it154582/mysql/run/mysql.sock');
       define('DBUSER', 'root');
       define('DBPASS','root');
   
       // App Root
       define('APPROOT',dirname(dirname(__FILE__)));

       echo(APPROOT);
   
       // Public ROOT
       define('URLROOT','/home/student/it/2015/it154582/public_html/BlogPosts/public');

       echo(URLROOT);

  