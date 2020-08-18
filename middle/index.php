<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Уровень middle");
?>
    <div>
        <h2>1) Чем отличаются типы таблиц INNODB от MyISAM?</h2>
        <div>
            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table_main">
                <tbody>
                <tr>
                    <td width="65%">Описание</td>
                    <td width="15%"><strong>MyISAM</strong></td>
                    <td width="20%"><strong>InnoDB</strong></td>
                </tr>
                <tr>
                    <td>
                        <strong>Транзакционный движок?</strong>Транзакция (Transaction) — блок операторов SQL , который в случае ошибки в одном запросе, возвращается к предыдущему состоянию (Rollback), и только в случае выполнения всех запросов подтверждается (Commit)
                    </td>
                    <td>Нет</td>
                    <td>Да</td>
                </tr>
                <tr>
                    <td>
                        <strong>Поддержка внешних ключей</strong>Внешние ключи — это способ связать записи в двух таблицах по определенным полям так, что при обновлении поля в родительской автоматически происходит определенное изменение поля в дочерней (дочернюю и родительскую выбираешь при создании ключа; точнее, создаешь ключ в дочерней, который ссылается на родительскую).
                    </td>
                    <td>Нет</td>
                    <td>Да</td>
                </tr>
                <tr>
                    <td>
                        <strong>Блокировка.</strong>Блокировка на уровне строк, т.е. если процессу нужно обновить строку в таблице, то он блокирует только эту строку, позволяя другим обновлять другие строки параллельно
                    </td>
                    <td>Блокировка на уровне таблиц</td>
                    <td>Блокировка на уровне строк</td>
                </tr>
                <tr>
                    <td>Одновременные запросы к разным частям таблицы.</td>
                    <td>Медленнее</td>
                    <td>Быстрее</td>
                </tr>
                <tr>
                    <td>При смешанной нагрузке в таблице (select/update/delete/insert)</td>
                    <td>Медленнее</td>
                    <td>Быстрее</td>
                </tr>
                <tr>
                    <td>Операция Insert</td>
                    <td>Быстрее</td>
                    <td>Медленнее, ибо есть оверхед на транзакцию, но это цена надежности</td>
                </tr>
                <tr>
                    <td>Если преобладают операции чтения (SELECT)</td>
                    <td>Работает быстрее</td>
                    <td>Работает медленнее</td>
                </tr>
                <tr>
                    <td>
                        <strong>Deadlock</strong>Deadlock — ситуация в многозадачной среде или СУБД, при которой несколько процессов находятся в состоянии бесконечного ожидания ресурсов, захваченных самими этими процессами.
                    </td>
                    <td>Не возникают</td>
                    <td>Возможны.</td>
                </tr>
                <tr>
                    <td>Поддержка полнотекстового поиска</td>
                    <td>Да</td>
                    <td>Нет (доступен начиная с версии MySQL 5.6.4)</td>
                </tr>
                <tr>
                    <td>Запрос Count(*)</td>
                    <td>Быстрее</td>
                    <td>Медленнее</td>
                </tr>
                <tr>
                    <td>
                        <strong>Поддержка mysqlhotcopy</strong>Утилита mysqlhotcopy представляет собой Perl-сценарий, использующий SQL-команды LOCK TABLES, FLUSH TABLES и Unix-утилиты cp или scp для быстрого получения резервной копии базы данных.
                    </td>
                    <td>Да</td>
                    <td>Нет</td>
                </tr>
                <tr>
                    <td>Файловое хранение таблиц</td>
                    <td>Каждой таблице отдельный файл</td>
                    <td>Данные при настройках по умолчанию хранятся в больших совместно используемых файлах</td>
                </tr>
                <tr>
                    <td>
                        <strong>Бинарное копировании таблиц?</strong>Табличные файлы можно перемещать между компьютерами разных архитектур и разными операционными системами без всякого преобразования.
                    </td>
                    <td>Да</td>
                    <td>Нет</td>
                </tr>
                <tr>
                    <td>Размер таблиц в БД</td>
                    <td>Меньше</td>
                    <td>Больше</td>
                </tr>
                <tr>
                    <td>Поведение в случае сбоя</td>
                    <td>Крашится вся таблица</td>
                    <td>По логам можно все восстановить</td>
                </tr>
                <tr>
                    <td>В случае хранения «логов» и подобного</td>
                    <td>Лучше</td>
                    <td>Хуже</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <h2>2) Напишите уровни изоляции транзакций INNODB.</h2>
        <div>
            Первый <b>READ UNCOMMITTED</b><br>
            Рассмотрим транзакцию выше. После INSERT данные сразу-же станут доступны для чтения. Тоесть еще до вызова COMMIT вне транзакции можно получить только что добавленные данные. Этот уровень редко используется на практике, да вообще редко кто меняет эти самые уровни.<br>
            <br>
            Второй <b>READ COMMTITED</b><br>
            В данном случае прочитать данные возможно только после вызова COMMIT. При чем внутри транзакции данные тоже будут еще не доступны.
            <br>
            <br>
            Третий <b>REPEATABLE READ</b><br>
            Этот уровень используется по умолчанию в MySQL. Отличается от второго тем, что вновь добавленные данные уже будут доступны внутри транзакции, но не будут доступны до подтверждения извне.
            <br>
            <br>
            И последний <b>SERIALIZABLE</b><br>
            На данном уровне MySQL блокирует каждую строку над которой происходит какое либо действие, это исключает появление проблемы «фантомов».<br>
        </div>
    </div>
    <div>
        <h2>3) Опишите класс ORM D7 bitrix для таблицы b_table c колонками id - целое число, name - строка, parent_id - целое число,
            для каждой колонки необходимо изменить имя в системе, использую возможности описания класса ORM.
            Колонки должны иметь названия ID, NAME, PARENT. PARENT должен иметь значение по умолчанию равное 1.
        </h2>
        <div>
            файл скрипта: /local/php_interface/include/TableMyTable.php
            <pre>
                namespace SomePartner\MyBooksCatalog;

                use Bitrix\Main\Entity;

                class TableMyTable extends Entity\DataManager
                {
                    public static function getTableName()
                    {
                        return 'tableMy';
                    }

                    public static function getMap()
                    {
                        return array(
                            new Entity\IntegerField('id', array(
                                'primary' => true,
                                'title' => 'ID',
                                'autocomplete' => true
                            )),
                            new Entity\StringField('name', array(
                                'required' => true,
                                'title' => 'NAME'
                            )),
                            new Entity\IntegerField('parent_id', array(
                                'required' => true,
                                'title' => 'PARENT',
                                'default' => 1
                            ))
                        );
                    }
                }
            </pre>
        </div>
    </div>
    <div>
        <h2>4) Напишите код на PHP для отправки http запроса на сервер с адресом my-domain.com в тело которого будет включен xml документ:
            &lt;?xml version="1.0" encoding="UTF-8"?>
            &lt;test>&lt;limit>1&lt;/limit>&lt;/test>
            В ответ от сервера вы должны получить ответ в формате JSON строки, которую надо привести к PHP объекту.
        </h2>
        <div>
            <a href="/test.xml" download>Скачать XML для отправки</a>
            <form class="form_xml_send box_padding" action="/middle/index.php" method="POST"
                  enctype="multipart/form-data">
                <div class="form_group">
                    <label>Прикрепить XML:</label>
                    <input type="hidden" name="sendXml" value="Y">
                    <input type="file" name="fileXml" value="" class="">
                </div>
                <div class="form_group">
                    <input type="submit">
                </div>
            </form>
            <?
            if ($_REQUEST['sendXml'] == 'Y') {
                echo '<script>$(function() { $("html, body").animate({scrollTop: $(".form_xml_send").offset().top}, 100); });</script>';
                $SendXml = new SendXml($_FILES);
                echo "<pre>";
                print_r($SendXml->getResult());
                echo "</pre>";
            }
            ?>
        </div>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>