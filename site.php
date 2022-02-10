<?php

//use \felipeno22\DB\Sql;

use \felipeno22\Page;


   $app->get('/',function(){




   /*	$sql= new Sql();

	$results=$sql->select("select * from tb_users");

	echo json_encode($results);
*/

	$page=new Page();

	$page->setTlp("index");



   });




?>