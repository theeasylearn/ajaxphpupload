<?php
//file_put_contents('part'.$_GET['i'], $_POST['content']);
file_put_contents('part'.$_GET['i'], file_get_contents('php://input'));
$e = true;
for($i = 0; $i < $_GET['t']; $i++)
	if(!file_exists('part'.$i))
		$e = false;
if($e==true)
{
	for($i = 0; $i < $_GET['t']; $i++) {
		file_put_contents($_GET['fname'], file_get_contents('part'.$i), FILE_APPEND);
		unlink('part'.$i);
	}
}
