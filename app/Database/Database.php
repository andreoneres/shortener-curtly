<?php

namespace App\Database;

use Exception;
use \PDO;
use \PDOException;

class Database{

  /**
   * Host de conexão com o banco de dados
   * @var string
   */
  private static $host;

  /**
   * Nome do banco de dados
   * @var string
   */
  private static $name;

  /**
   * Usuário do banco
   * @var string
   */
  private static $user;

  /**
   * Senha de acesso ao banco de dados
   * @var string
   */
  private static $pass;

  /**
   * Porta de acesso ao banco
   * @var integer
   */
  private static $port;

  /**
   * Nome da tabela a ser manipulada
   * @var string
   */
  private $table;

  /**
   * Instancia de conexão com o banco de dados
   * @var PDO
   */
  private $connection;

  /**
   * Método responsável por configurar a classe
   * @param  string  $host
   * @param  string  $name
   * @param  string  $user
   * @param  string  $pass
   * @param  integer $port
   */
  public static function config($host,$name,$user,$pass,$port = 3306){
    self::$host = $host;
    self::$name = $name;
    self::$user = $user;
    self::$pass = $pass;
    self::$port = $port;
  }

  /**
   * Define a tabela e instancia e conexão
   * @param string $table
   */
  public function __construct($table = null){
    $this->table = $table;
    $this->setConnection();
  }

  /**
   * Método responsável por criar uma conexão com o banco de dados
   */
  private function setConnection(){
    try{
      $this->connection = 
      new PDO("mysql:host=" . self::$host . ";dbname=" . self::$name, self::$user, self::$pass);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

  /**
   * Método responsável por executar queries dentro do banco de dados
   * @param  string $query
   * @param  array  $params
   * @return PDOStatement
   */
  public function execute($query,$params = []){
    try{
      $statement = $this->connection->prepare($query);
      $statement->execute($params);
      return $statement;
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

  /**
   * Método responsável por inserir dados no banco
   * @param  array $values [ field => value ]
   * @return integer ID inserido
   */
  public function insert($values){
    //DADOS DA QUERY
    $fields = array_keys($values);
    $binds  = array_pad([],count($fields),'?');

    //MONTA A QUERY
    $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

    //EXECUTA O INSERT
    $result = $this->execute($query,array_values($values));

    // RETORNA MENSAGEM  
    if($result->rowCount() > 0){
        return 'Dados registrados com sucesso!';
    }

  }

  public function findRelations($where = null, $join = null,$order = null, $limit = null, $fields = '*'){
    //DADOS DA QUERY
    $where = strlen($where) ? 'WHERE '.$where : '';
    $join = strlen($join) ? 'LEFT JOIN '.$join : '';
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    //MONTA A QUERY
    $query = 'SELECT '.$fields.' FROM '.$this->table.' '. $join .' '.$where.' '.$order.' '.$limit;
    // return $query;

    //EXECUTA A QUERY
    $result = $this->execute($query);
    while($finalResult = $result->fetchAll(PDO::FETCH_ASSOC)){
        return $finalResult;
    }
  }

  public static function encode_utf8($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = self::encode_utf8($v);
        }
    } elseif (is_object($d)) {
        foreach ($d as $k => $v) {
            $d->$k = self::encode_utf8($v);
        }
    } elseif (is_scalar($d)) {
        $d = utf8_encode($d);
    }

    return $d;
}

  /**
   * Método responsável por executar uma consulta no banco
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @param  string $fields
   * @return PDOStatement
   */

   
  public function select($fields = '*', $wheres = [], $inner = null, $order = null, $limit = null){
    //DADOS DA QUERY
    if(count($inner)) {
      $inners = array_keys($inner);
      $ons = array_values($inner);
      unset($inner);

      for ($i=0; $i < count($inners); $i++) { 
        $inner .= count($inners) ? 'INNER JOIN '.$inners[$i]. ' ON '.$ons[$i]. ' ' : '';
      }
    } else {
      $inner = '';
    }
    
    $where = !empty($wheres) ? 'WHERE ' : '';
    if(is_array($wheres)) {
      foreach ($wheres as $key => $value) {
        $where .= $value.' AND ';
      }
      $where = substr($where, 0, -4);
    } else {
      $where .= $wheres;
    }
    
    if(!strlen($where)) {
      $where = '';
    }
   
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    //MONTA A QUERY
    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$inner.' '.$where.' '.$order.' '.$limit;
    // return $query;
    
    //EXECUTA A QUERY
    $result = $this->execute($query);
    
    while($finalResult = $result->fetchAll(PDO::FETCH_ASSOC)){
        return $finalResult;
    }
  }

  /**
   * Método responsável por executar atualizações no banco de dados
   * @param  string $where
   * @param  array $values [ field => value ]
   * @return boolean
   */
  public function update($values, $where){
    //DADOS DA QUERY
    $fields = array_keys($values);

    //MONTA A QUERY
    $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
    //EXECUTAR A QUERY
    $this->execute($query,array_values($values));
    //RETORNA SUCESSO
    return 'Dados atualizados com sucesso!';
  }

  /**
   * Método responsável por excluir dados do banco
   * @param  string $where
   * @return boolean
   */
  public function delete($where){
    //MONTA A QUERY
    $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

    //EXECUTA A QUERY
    $this->execute($query);

    //RETORNA SUCESSO
    return 'Dados deletados com sucesso!';
  }

  public static function logs($user, $action) {

    $ip = $_SERVER['REMOTE_ADDR'];

    $values = [
        'IP' => $ip,
        'ID_USER' => $user,
        'ACTION' => $action,
        'DATA' => date('Y-m-d H:i:s')
    ];
    $log = (new Database('LOGS'))->insert($values);
}
}