<?php

session_name('impresspages');
session_start();

$_SESSION['rewritesEnabled'] = true;

echo json_encode(array('result' => true));
