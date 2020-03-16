<?

class FirstClass
{
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return trim($this->name);
    }

    public function sayHello()
    {
        $name = $this->getName($this->name);
        return 'Hi, '.$name;
    }

}

$instance = new FirstClass('Наталья');
echo $instance->sayHello();

