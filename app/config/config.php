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
       define('URLROOT','https://users.iee.ihu.gr/~it154582/BlogPosts');

       echo(URLROOT);

  