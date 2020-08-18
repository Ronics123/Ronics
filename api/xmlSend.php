<?
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$str = $_REQUEST['xml'];
$xml = new SimpleXMLElement($str);
$json = json_decode(json_encode($xml), true);
echo json_encode($json);