<?

use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Loader;

class Element
{
    public static function getElement(int $id)
    {
        if (empty($id)) {
            return 'Незадан ID';
        }

        $result = [];

        Loader::includeModule('iblock');

        $dbElement = ElementTable::getList(array(
            'select' => array('ID', 'NAME', 'IBLOCK_ID', 'IBLOCK_SECTION_ID'),
            'filter' => array('IBLOCK.CODE' => 'TEST', 'ACTIVE' => 'Y', 'IBLOCK_SECTION_ID' => $id),
            'order'  => array('ID' => 'DESC'),
            'limit'  => 1,
        ));

        while ($arItem = $dbElement->fetch()) {
            $dbProperty = \CIBlockElement::getProperty($arItem['IBLOCK_ID'], $arItem['ID'], array("id", "asc"), array('CODE' => 'PARENTS'));
            while ($arProperty = $dbProperty->GetNext()) {
                if ($arProperty['VALUE']) {
                    $arItem['PARENTS'][] = (int)$arProperty['VALUE_ENUM'];
                }
            }
            sort($arItem['PARENTS']);
            $result = array(
                "ID"         => $arItem['IBLOCK_SECTION_ID'],
                "ELEMENT_ID" => $arItem['ID'],
                "NAME"       => $arItem['NAME'],
                "PARENTS"    => $arItem['PARENTS']
            );
        }

        return $result;
    }
}
