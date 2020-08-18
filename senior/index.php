<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Уровень senior");
?>
    <div>
        <h2>1) Напишите пример класса на PHP реализующий паттерн одиночка.</h2>
        <div>
            <?Singleton::getInstance()->test();?>
            файл скрипта: /local/php_interface/include/app/singleton.php
        </div>
    </div>
    <div>
        <h2>2) Напишите пример объявления интерфейса и класса реализации интерфейса на PHP.</h2>
        <div>
            <div>
                файл скрипта: /local/php_interface/include/app/classInterface.php
            </div>
            <br>
            <?
            $СlassInterface = new СlassInterface(new plas);
            $СlassInterface->result(3, 2);
            echo '<br>';
            $СlassInterface = new СlassInterface(new minus);
            $СlassInterface->result(3, 2);
            echo '<br>';
            $СlassInterface = new СlassInterface(new multiply);
            $СlassInterface->result(3, 2);
            echo '<br>';
            $СlassInterface = new СlassInterface(new division);
            $СlassInterface->result(3, 2);
            echo '<br>';
            ?>
        </div>
    </div>
    <div>
        <h2>3) Проверьте корректность составленного ниже запроса, попробуйте его оптимизировать и напишите какие имена колонок должен выдать запрос:
            SELECT BE.*, BEPE.*,
            BE.NAME as NAME,
            IF(EXTRACT(HOUR_SECOND FROM BE.ACTIVE_FROM)>0, DATE_FORMAT(BE.ACTIVE_FROM, '%d.%m.%Y %H:%i:%s'),
            DATE_FORMAT(BE.ACTIVE_FROM, '%d.%m.%Y')) as DATE_ACTIVE_FROM,
            BE.IBLOCK_ID as IBLOCK_ID
            FROM
            b_iblock B
            INNER JOIN b_lang L ON B.LID = L.LID
            INNER JOIN b_iblock_element BE ON BE.IBLOCK_ID = B.ID
            LEFT JOIN b_iblock_element_property BEPE ON (BEPE.IBLOCK_ELEMENT_ID = BE.ID)
            WHERE
            ( ((((BE.IBLOCK_ID = '33')))) AND ((((BE.ACTIVE='Y')))) )
            AND (((BE.WF_STATUS_ID=1 AND BE.WF_PARENT_ELEMENT_ID IS NULL))) ;</h2>
        <div>

        </div>
    </div>
    <div>
        <h2>4) Напишите http запрос из браузера клиента, который обращается к адресу /url/5/ и ответ на php странице по этому адресу, которая должна вернуть JSON строку вида: {"ID":5, "ELEMENT_ID":20, "NAME":"Volk", "PARENTS":[0,1]} . Ответ вернувшийся от сервера необходимо обработать и вывести поле NAME в HTML элемент страницы с тегом input и атрибутом name равным Volk.</h2>
        <div>

        </div>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>