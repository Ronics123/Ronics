<?

class Singleton
{
    private static $instance = null; // для хранения объекта класс

    protected function __construct() // блокируем конструктор
    {
    }

    protected function __clone() // блокируем клонирование экземпляка класса
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Нельзя восстанавливать клаcс из строк");
    }

    public static function getInstance() // метод для инициализации экземпляка класса
    {
        $class = static::class;
        if (!isset(self::$instance[$class])) {
            self::$instance[$class] = new static;
        }
        return self::$instance[$class];
    }

    public function test()
    {
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }
}