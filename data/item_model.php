<?php

define('DB_SERVER',   'localhost');
define('DB_DATABASE', 'Kata');
define('DB_USER',     'root');
define('DB_PASSWORD', 'super_secret_pword');

define('QUERY_All_Items', 'SELECT ItemID,Price,Offer FROM Item ORDER BY ItemID');

class ItemModel {
  private $item_list;
  private $db;
  private $connected;
  private $results;
  
  function __construct() {
    $item_list = array();

    $this->connected = false;
    $this->results = array();

    $this->db = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);

    if($this->db->connect_errno) {
      die("Could not connect to database: '" . DB_DATABASE . "'");
    } else {
      $connected = true;
    }
  }

  function __destruct() {
    if($connected) {
      $this->db->close();
      $connected = false;
    }
  }

  public function get_item_list() {
    $this->refresh_item_list();

    echo json_encode($item_list);
  }

  private function refresh_item_list() {
    $statement = $this->db->stmt_init();

    if($statement->prepare(QUERY_All_Items)) {
      $statement->execute();

      $result = $statement->get_result();

      while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $this->item_list[] = $row;
      }

      $statement->close();
    } else {
      die("Could not prepare statement for refresh_item_list\n");
    }
  }

/*
  public function get_item($id) {
  }

  public function add_item($id,$price,$offer) {
  }

  public function remove_item($id) {
  }
*/
};

?>
