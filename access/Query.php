<?php
/**
 * @package BmBuilder
 */

namespace access;

use \engines\QueryCreator;

class Query
{
  public $conn;
  public $tables;
  public $isSchema = false;
  public $components = [];

  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  public static function start($conn, $tables)
  {
    $query = new Query($conn);
    /*if(){
      $query->tables = schemaobject
      $query->isSchema = true;
    }else {*/
    $query->tables = $tables;
    //}
    return $query;
  }

  public static function excecuteQuery(Query $query)
  {
    $result = \mysqli_query($query->conn, QueryCreator::createQuery($query->components));

    $string = QueryCreator::createQuery($query->components);
    echo "<pre>";print_r($string);echo "</pre>";

    if(\mysqli_error($query->conn)){
      throw new \Exception("Query invalid, here's what went wrong: " . \mysqli_error($query->conn));
    }
    //cast into a database result object
    var_dump($result);
  }

  //some sql helpers
  public function select(array $toSelect = ["*"])
  {
    //implement schema support later
    $this->components["action"] = "read";
    $this->components["selectors"] = $toSelect;

    return $this;
  }

  public function update(array $toUpdate)
  {
    //implement schema support later
    $this->components["action"] = "update";
    $this->components["selectors"] = $toUpdate["selectors"];
    $this->components["values"] = $toUpdate["values"];

    return $this;
  }

  public function remove()
  {
    //implement schema support later
    $this->components["action"] = "delete";

    return $this;
  }

  public function insert(array $toInsert)
  {
    //implement schema support later
    $this->components["action"] = "create";
    $this->components["selectors"] = $toInsert["selectors"];
    $this->components["values"] = $toInsert["values"];

    return $this;
  }

  public function where(array $conditions)
  {
    if(!isset($this->components["action"])){
      throw new \Exception("cannot declare where condition before the action");
    }

    $this->components["where"] = $conditions;

    return $this;
  }

  public function conditional(array $conditionals)
  {
    if(!isset($this->components["action"])){
      throw new \Exception("cannot declare conditional statement before the action");
    }
    //create some functions that check certain things in the database
    $this->components["conditionals"] = $conditionals;

    return $this;
  }

  public function endQuery()
  {
    $this->components["tables"] = $this->tables;
    $result = Query::excecuteQuery($this);
    return $result;
  }

  public function showComponents()
  {
    //this function is only for testing purposes
    $this->components["tables"] = $this->tables;

    echo "<pre>";print_r($this->components);echo "</pre>";
  }
}