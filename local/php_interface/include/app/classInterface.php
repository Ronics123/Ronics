<?

class plas implements MyInterface
{
    public function operation(int $a, int $b)
    {
        echo $a + $b;
    }
}

class minus implements MyInterface
{
    public function operation(int $a, int $b)
    {
        echo $a - $b;
    }
}

class multiply implements MyInterface
{
    public function operation(int $a, int $b)
    {
        echo $a * $b;
    }
}

class division implements MyInterface
{
    public function operation(int $a, int $b)
    {
        if ($b == 0) throw new Exception("Деление на ноль невозможно!");
        echo $a / $b;
    }
}

class СlassInterface
{
    protected $data;

    public function __construct(MyInterface $data)
    {
        $this->data = $data;
    }

    public function result($a, $b)
    {
        return $this->data->operation($a, $b);
    }
}