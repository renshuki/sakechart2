<?php
session_start();

if (isset($_GET["lang"])) {
    $language = $_GET["lang"];
}
else if (isset($_SESSION["lang"])) {
    $language  = $_SESSION["lang"];
}
else {
    $language = "ja_JP.UTF-8";
}

$_SESSION["Language"]  = $language;
 
$folder = "locale";
$domain = "messages";
$encoding = "UTF-8";
 
putenv("LC_ALL=" . $language); 
setlocale(LC_ALL, $language);
 
bindtextdomain($domain, $folder); 
bind_textdomain_codeset($domain, $encoding);
 
textdomain($domain);
?>