<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Уровень базовый");
?>
    <div>
        <h3>1) Написать код на PHP, который выведет всех пользователей Битрикс, у которых дата рождения позже даты 12.12.1990. Можно использовать старую версию класса CUser, но лучше использовать класс UserTable из ядра D7.</h3>
        <div>
            <?
            $arFilter = Array(
                "<PERSONAL_BIRTHDAY" => '12.12.1990'
            );
            $nav = new Bitrix\Main\UI\PageNavigation("nav-more-news");
            $nav->allowAllRecords(true)->setPageSize(10)->initFromUri();
            $res = Bitrix\Main\UserTable::getList(Array(
                "select"      => Array("ID", "NAME", "EMAIL", "PERSONAL_BIRTHDAY"),
                "filter"      => $arFilter,
                "count_total" => true,
                "offset"      => $nav->getOffset(),
                "limit"       => $nav->getLimit(),
            ));
            $nav->setRecordCount($res->getCount());
            while ($arRes = $res->fetch()) {
                $arRes['PERSONAL_BIRTHDAY'] = $arRes['PERSONAL_BIRTHDAY']->toString();
                echo "<pre>";
                print_r($arRes);
                echo "</pre>";
            }
            $APPLICATION->IncludeComponent(
                "bitrix:main.pagenavigation",
                "",
                array(
                    "NAV_OBJECT" => $nav,
                    "SEF_MODE"   => "N",
                ),
                false
            );
            ?>
        </div>
    </div>
    <div>
        <h2>2) Напишите код на PHP для обновления свойства "last_time" в элементе инфоблока Битрикс с идентификатором элемента равным 70397.</h2>
        <div>
        <pre>
            CIBlockElement::SetPropertyValuesEx(70397, false, array('last_time' => ConvertTimeStamp(time(), "FULL")));
        </pre>
            <?
            //        CIBlockElement::SetPropertyValuesEx(70397, false, array('last_time' => ConvertTimeStamp(time(), "FULL")));
            ?>
        </div>
    </div>
    <div>
        <h2> 3) Создайте в MySQL таблицу с полями: id - целое число(автоинкремент), name - строка длиною 30(varchar), parent_id - целое число и типом таблиц INNODB.</h2>
        <div>
        <pre>
            global $DB;
            $select = "CREATE TABLE tableMy
                (
                    id INT NOT NULL AUTO_INCREMENT,
                    name VARCHAR(30),
                    parent_id INT,
                    PRIMARY KEY (id)
                );";
            $res = $DB->Query($select);
        </pre>
            <?
            //        global $DB;
            //        $select = "CREATE TABLE tableMy
            //                (
            //                    id INT NOT NULL AUTO_INCREMENT,
            //                    name VARCHAR(30),
            //                    parent_id INT,
            //                    PRIMARY KEY (id)
            //                );";
            //        $res = $DB->Query($select);
            ?>
        </div>
    </div>
    <div>
        <h2>4) Добавьте 5 любых строк в MySQL таблицу созданную в задании №3, используя INSERT. После добавления выберите все элементы с parent_id > 0.</h2>
        <div>
        <pre>
            global $DB;
            $select = "INSERT INTO tableMy (name,parent_id) VALUES('test1','0'),('test2','1'),('test3','0'),('test4','1'),('test4','0'),('test5','1');";
            $res = $DB->Query($select);

            $select = "SELECT * FROM tableMy WHERE parent_id > 0 ORDER BY id;";
            $res = $DB->Query($select);
            while ($arResult = $res->Fetch()) {
                echo "&lt;pre>";
                print_r($arResult);
                echo "&lt;/pre>";
            }
        </pre>
            <?
            //        global $DB;
            //        $select = "INSERT INTO tableMy (name,parent_id) VALUES('test1','0'),('test2','1'),('test3','0'),('test4','1'),('test4','0'),('test5','1');";
            //        $res = $DB->Query($select);

            $select = "SELECT * FROM tableMy WHERE parent_id > 0 ORDER BY id;";
            $res = $DB->Query($select);
            while ($arResult = $res->Fetch()) {
                echo "<pre>";
                print_r($arResult);
                echo "</pre>";
            }
            ?>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>