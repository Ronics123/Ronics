<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Элементы");

$router = new AltoRouter();
$router->map( 'GET', '/url/[i:id]/', 'element' );
$match = $router->match();
$params = $match['params'];

if ($params['id']) {
    $APPLICATION->RestartBuffer();
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');

    //Отключаем статистику Bitrix
    define("NO_KEEP_STATISTIC", true);
    define("NOT_CHECK_PERMISSIONS", true);

    $result = Element::getElement($params['id']);
    echo json_encode($result);

    die();
}

?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
