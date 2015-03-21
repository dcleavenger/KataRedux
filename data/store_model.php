<?php

require_once("./data/item_model.php");
require_once("./data/cart_model.php");

class StoreModel {
  private $item_list;
  private $db;
  private $cart;

  function __construct() {
    $this->item_list = array();

    $this->connected = false;
    $this->results = array();

    $this->cart = new CartModel();
  }

  function __destruct() {
  }

  public function add_item_to_cart($id,$qty=1) {
    if($id !== "") {
      $this->cart->add_item($id,$qty);
      echo "{success:true}";
    } else {
      echo "{success:false}";
    }

  }

  public function empty_cart() {
    return $this->cart->empty_cart();
  }

  public function remove_item($id) {
    $this->cart->change_quantity($id,0);
  }

  public function get_cart_total() {
    return $this->cart->get_cart_total();
  }

  public function get_item_list_json() {
    echo json_encode($this->get_item_list());
  }

  public function get_item_list() {
    $this->refresh_item_list();

    return $this->item_list;
  }

  private function refresh_item_list() {
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

    if($connected) {
      $this->db->close();
      $connected = false;
    }
  }

};
?>
