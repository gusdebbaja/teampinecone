{"filter":false,"title":"ping.php","tooltip":"/mypeb/tests/ping.php","ace":{"folds":[],"scrolltop":42.99993896484375,"scrollleft":0,"selection":{"start":{"row":29,"column":2},"end":{"row":29,"column":2},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":1,"state":"php-start","mode":"ace/mode/php"}},"hash":"ffe4defa135d9bf7487670dbd23d574f8e3f3158","undoManager":{"mark":5,"position":5,"stack":[[{"start":{"row":1,"column":15},"end":{"row":1,"column":16},"action":"remove","lines":["0"],"id":2,"ignore":true},{"start":{"row":1,"column":15},"end":{"row":1,"column":16},"action":"insert","lines":["9"]}],[{"start":{"row":1,"column":16},"end":{"row":1,"column":18},"action":"insert","lines":["00"],"id":3,"ignore":true}],[{"start":{"row":1,"column":18},"end":{"row":1,"column":19},"action":"insert","lines":["0"],"id":4,"ignore":true}],[{"start":{"row":1,"column":15},"end":{"row":1,"column":20},"action":"remove","lines":["9000)"],"id":5},{"start":{"row":1,"column":15},"end":{"row":1,"column":16},"action":"insert","lines":["0"]}],[{"start":{"row":1,"column":16},"end":{"row":1,"column":17},"action":"insert","lines":[")"],"id":6}],[{"start":{"row":0,"column":0},"end":{"row":33,"column":0},"action":"remove","lines":["<?php","set_time_limit(0);","","$link = peb_pconnect('Something@bryndlir-pinecone-2194177','abc');","if ($link)","\techo \"linked!:\".$link.\"<br>\\r\\n\";","else","\techo \"error:\".peb_errorno().\"<br>\\r\\nerror:\".peb_error().\"<br>\\r\\n\";","\t","echo \"<br>\\r\\n\";","echo \"<br>\\r\\n\";","","peb_status();","echo \"<br>\\r\\n\";","echo \"<br>\\r\\n\";","","$x = peb_vencode(\"[~a,~a]\", array(","\t\t\t\t\t\t\t\tarray( \"String from PHP\", \"OP\" )","\t\t\t\t\t\t\t\t)","\t\t\t   );","","echo \"msg resource :\".$x.\"\\r\\n\";","","echo \"<br>\\r\\n\";","echo \"<br>\\r\\n\";","","peb_send_byname(\"pong\",$x,$link);","echo \"<br>\\r\\n\";","echo \"<br>\\r\\n\";","","//peb_close($link);  You don't need to close pconnect :)","","?>",""],"id":7},{"start":{"row":0,"column":0},"end":{"row":29,"column":2},"action":"insert","lines":["","<?php","\t/** NOTE this requires the use of the mypeb PHP extension http://code.google.com/p/mypeb/ **/","","echo \"\\n\\nRUNNING MYPEB Erlang Bridge Tests\\n\\n\";","","$link = peb_connect('Something@bryndlir-pinecone-2194177','abc');","echo \"The link is: \" . $link;","if (!$link) { ","    die('Could not connect: ' . peb_error()); ","} ","","$msg = peb_encode('[~a,~p,~s]', array( \"echo\",","                                   array($link,'getinfo'),","                                   \"Hello World\"","                                  ) ","                 );","                 ","//The sender must include a reply address.  use ~p to format a link identifier to a valid Erlang pid.","","peb_send_byname('erlnode',$msg,$link); ","","$message = peb_receive($link);","$rs= peb_decode( $message) ;","print_r($rs);","","$serverpid = $rs[0][0];","","peb_close($link); ","?>"]}]]},"timestamp":1449864605000}