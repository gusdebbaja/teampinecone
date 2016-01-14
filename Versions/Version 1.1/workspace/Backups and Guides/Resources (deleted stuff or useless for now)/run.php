<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<?php
 require 'ctwitter_stream.php';
 ?>
 </head>
<body>
test
<?php
$t = new ctwitter_stream();
$t->login("NQ2NBPFv3L54bY5WRUKxE93kK", "cKpcbIbA55ZbmyWHwhZmGvdcrsvYv2KAAVEhPiQs8YyK6WV5h5", "3862041801-mf9oAVnUb6tXDKarqaMgD7eJEIiIbo9YVgJ50u1", "M9vJEiyjglgTb6zYKiRAHZA8dnwbKKBPb8d6GkWBgtDCe");
$t->start(array('albuquerque','abq','burque','505','land of enchantment'));
// $t->start(array('-106.77','35.00','-106.43','35.25'));
?>
</body>
</html>
