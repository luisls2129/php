static private $instance;
$private $pdo;

public function __construct($var1, $var2) {
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=cine","root","");// o root

        $pdo->exec("set names utf8");
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
        echo "error al entrar a la base de datos";
    }
}


function getPdo(){
    return $pdo;
}

protected function getInstance() {
    if(self::$instance == null) {
        self::$instance = new Connection();
    }
    return self::$instance;
}

public static function __callStatic($name, $arguments)
    {
        return (new static)->$name(...$arguments);
    }