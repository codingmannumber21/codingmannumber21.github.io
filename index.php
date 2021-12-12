<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>404 Not Found</title>
  <style type="text/css">
  	.page {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    min-height: 100vh;
		}
	.main {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 70%;
    flex: 1 1 70%;
    box-sizing: border-box;
    padding: 10rem 5rem 5rem;
    min-height: 100vh;
		}
	.error-code {
    color: #f47755;
    font-size: 8rem;
    line-height: 1;
		}
	p.lead {
    font-size: 1.6rem;
    color: #4f5a64;
		}
  </style>
</head>
<body>
<div class="page">
  <div class="main">
    <h1>Server Error</h1>
    <div class="error-code">404</div>
    <h2>Page Not Found</h2>
    <p class="lead">This page either doesn't exist, or it moved somewhere else.</p>
    <hr/>
</div>
<?php

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();

echo $user_ip;

$fp = fopen('info.txt', 'a');

fwrite($fp, $user_ip);

fclose($fp);

$line = date('Y-m-d H:i:s') . " - $_SERVER[REMOTE_ADDR]";
file_put_contents('visitors.log', $line . PHP_EOL, FILE_APPEND);

?>
</body>
