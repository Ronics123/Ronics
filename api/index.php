<?
//Подключаем API битрикса
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');


//Отключаем статистику Bitrix
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;


if ($_REQUEST['action']) {
    switch ($_REQUEST['action']) {

        case 'reviewsAdd':
            if ($_REQUEST) {

                $json = array(
                    'error' => false,
                    'text'  => $_REQUEST
                );
            }
            else {
                $json = array(
                    'error' => true
                );
            }
        break;

        default:
            $json = array(
                'error'      => true,
                'error_msg'  => 'Do not have an action',
                'error_code' => 001
            );
        break;
    };

}
else {
    $json = array(
        'error'      => true,
        'error_msg'  => 'Do not have an action',
        'error_code' => 001
    );
};

echo json_encode($json);