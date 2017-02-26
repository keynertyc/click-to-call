<?php
/**
 * Created by PhpStorm.
 * User: Keyner
 * Date: 2/25/17
 * Time: 8:47 PM
 */

$extension = $_REQUEST['extension']; //GET Extension
$phone = $_REQUEST['phone']; // GET phone
$callerId = '+18773798018'; // Set CalledId

$filedest = "/var/spool/asterisk/outgoing/".$phone.".call";

fopen($filedest, "w");

$content = "Channel: IAX2/{$extension}\n";
$content .= "Callerid: <{$callerId}>\n";
$content .= "WaitTime: 45\n";
$content .= "Context: click2call\n";
$content .= "Extension: s\n";
$content .= "Priority: 1\n";
$content .= "Set: phone={$phone}\n";

echo file_put_contents($filedest, $content, FILE_TEXT | LOCK_EX);
