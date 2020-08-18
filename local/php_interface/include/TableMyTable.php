<?

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
                'primary'      => true,
                'title'        => 'ID',
                'autocomplete' => true
            )),
            new Entity\StringField('name', array(
                'required' => true,
                'title'    => 'NAME'
            )),
            new Entity\IntegerField('parent_id', array(
                'required' => true,
                'title'    => 'PARENT',
                'default'  => 1
            ))
        );
    }
}