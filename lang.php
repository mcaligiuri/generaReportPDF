<?php
// Lunghezze
$widthV = array(60,60,20,20,15,60,10,40);
$widthF = array(60,20,20,80);
// Traduzioni italiane e inglesi
if($_GET['lang'] == 1)
{
    $colsV = array("Nome","Cartella","Inizio","Fine","Stato","Sito","Voto","Commento");
    $colsF = array("Nome","Stato","Priorità","Commento");
}
else
{
    $colsV = array("Name","Folder","Start","End","State","Site","Mark","Comment");
    $colsF = array("Name","State","Priority","Comment");
}
?>