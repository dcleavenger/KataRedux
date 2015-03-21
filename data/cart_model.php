<?php

require_once("./data/item_model.php");

class CartModel {
  private $items;
  private $item_model;

  function __construct() {
    $this->items = array();
    $this->item_model = new ItemModel();
  }

  function __destruct() {
  }

  // create cart array, include cart total for display
  // as well as each item in the cart and the quantity of each
  public function get_cart_contents() {
    $cart = array();
    $cart['cart_total'] = $this->get_cart_total();
    $cart['items'] = $this->items;
    echo json_encode($cart);
  }

  // reset the cart
  public function empty_cart() {
    $this->items = array();
  }

  // when given a string, empty the cart and fill it
  // with the new contents
  public function price($input_str) {
    $this->empty_cart();

    if($input_str !== "") {
      $item_submission_list = str_split($input_str);

      foreach($item_submission_list as $item) {
        $this->add_item($item);
      }
    }

    return $this->get_cart_total();
  }

  // when provided an item's id, add one to the cart
  public function add_item($id) {
    if(isset($this->items[$id])) {
      $this->change_quantity($id,$this->items[$id]['quantity'] + 1);
    } else {
      $this->change_quantity($id);
    }
  }

  // modify the quantity of each item
  // if quantity isn't specified, change quantity to 1
  // if quantity is less than or equal to zero, remove the item from the cart
  // if item dosn't already exist, add it
  public function change_quantity($id, $qty=1) {
    if($qty <= 0) {
      unset($this->items[$id]);
    } else {
      $item = $this->item_model->get_item($id);

      $this->items[$id] = $item;
      $this->items[$id]['quantity'] = $qty;

      $this->items[$id]['extended_price'] = $this->determine_extended_price($id);
    }
  }

  // if the supplied item has a price break and the price break has been met
  // apply discount when calculating extended price
  // otherwise return normal extended price
  private function determine_extended_price($id) {
    if(isset($this->items[$id]['price_break']) && $this->items[$id]['price_break'] <= $this->items[$id]['quantity']) {
      return $this->items[$id]['price_break_discount'] / $this->items[$id]['price_break'] * $this->items[$id]['quantity'];
    }
    return $this->items[$id]["quantity"] * $this->items[$id]['Price'];
  }

  // obtain total for cart, including all applied discounts
  public function get_cart_total() {
    $total = 0.0;

    foreach($this->items as $item) {
      $total += $item['extended_price'];
    }

    return $total;
  }
}
?>
