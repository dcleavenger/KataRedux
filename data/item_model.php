<?php

if(!defined('DB_SERVER'))
  define('DB_SERVER',   'localhost');

if(!defined('DB_DATABASE'))
  define('DB_DATABASE', 'Kata');

if(!defined('DB_USER'))
  define('DB_USER',     'root');

if(!defined('DB_PASSWORD'))
  define('DB_PASSWORD', 'super_secret_pword');

if(!defined('QUERY_All_Items'))
  define('QUERY_All_Items', 'SELECT ItemID,Price,Offer FROM Item ORDER BY ItemID');

if(!defined('QUERY_Item'))
define('QUERY_Item', 'SELECT ItemID,Price,Offer FROM Item WHERE ItemID = ? ORDER BY ItemID LIMIT 1');

class ItemModel {
  private $db;
  private $connected;
  
  function __construct() {
    $item_list = array();

    $this->connected = false;
    $this->results = array();
  }

  function __destruct() {
  }

  public function get_item($id) {
    $item = null;

    // FIXME
    // complete travesty that we have this code in more than one place.
    // need to figure out how to use bind_param properly within a single database object.

    $this->db = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);

    if($this->db->connect_errno) {
      die("Could not connect to database: '" . DB_DATABASE . "'");
    } else {
      $connected = true;
    }

    if($connected) {
      $statement = $this->db->stmt_init();

      if($statement->prepare(QUERY_Item)) {
        $statement->bind_param('s',$id);

        $statement->execute();

        $result = $statement->get_result();

        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
          $item = $row;
        }

        $statement->close();
      } else {
        die("Could not prepare statement for refresh_item_list\n");
      }
    }

    if(isset($item['Offer'])) {
      if($item['Offer'] !== "") {
        $offer = explode(' ',$item['Offer']);

        $item['price_break'] = $offer[0];
        $item['price_break_discount'] = $offer[2];
      }
    }

    if($connected) {
      $this->db->close();
      $connected = false;
      $this->db = null;
    }

    return $item;
  }
};

?>
