<?php
 define('PROJECT_ROOT', dirname(dirname(__DIR__ . '/../')));

require_once PROJECT_ROOT . '/vendor/autoload.php';

use Dotenv\Dotenv;
 use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;


class config{

    protected static $connexion;
    private static $hostname;
    private static $database;
    private static $user;
    private static $password;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
    self::$hostname = $_ENV['HOSTNAME'];
        self::$database = $_ENV['DATABASE'];
        self::$user = $_ENV['USER'];
        self::$password = $_ENV['PASSWORD'];

        $whoops = new \Whoops\Run;
        $whoops->allowQuit(false);
        $whoops->writeToOutput(false);
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        //  $html = $whoops->handleException($e);
    }
    public static function connect()
    {
        
            $info = "mysql:host=" . self::$hostname . ";dbname=" . self::$database . ";charset=UTF8";

            try {
                self::$connexion = new PDO($info, self::$user, self::$password);
        if (self::$connexion) {
                    //   echo "<h1>Connected succ!</h1>";
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
  
        return self::$connexion;
    }
}
$con = new config();
$con::connect();
