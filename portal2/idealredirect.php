<?php

// silly redirect because iDeal does not support URL parameters
$trxid	= $_GET['trxid'];
$ec		= $_GET['ec'];

header("Location: index.php?m=ideal&a=sr&trxid=$trxid&ec=$ec");

?>