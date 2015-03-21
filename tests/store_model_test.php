<?php

include("./data/store_model.php");

function assert_equal($test_val, $ret_val) {
  if($ret_val === $test_val) {
    echo "assert_equal: true - Test value $test_val matches return value $ret_val\n";
  } else {
    echo "assert_equal: false - Test value $test_val DOES NOT MATCH return value $ret_val\n";
  }
}

$sm = new StoreModel();


$sm->empty_cart();
$sm->add_item_to_cart("",3); echo "\n";
echo "test 1: "; assert_equal(  0.0, $sm->get_cart_total()) . "\n";

$sm->empty_cart();
$sm->add_item_to_cart("A"); echo "\n";
echo "test 2: "; assert_equal( 50.0, $sm->get_cart_total()) . "\n";

$sm->empty_cart();
$sm->add_item_to_cart("A"); echo "\n";
$sm->add_item_to_cart("B"); echo "\n";
echo "test 3: "; assert_equal( 80.0, $sm->get_cart_total()) . "\n";

$sm->empty_cart();
$sm->add_item_to_cart("C"); echo "\n";
$sm->add_item_to_cart("D"); echo "\n";
$sm->add_item_to_cart("B"); echo "\n";
$sm->add_item_to_cart("A"); echo "\n";
echo "test 4: "; assert_equal(115.0, $sm->get_cart_total()) . "\n";

$sm->empty_cart();
$sm->add_item_to_cart("A"); echo "\n";
$sm->add_item_to_cart("A"); echo "\n";
echo "test 5: "; assert_equal(100.0, $sm->get_cart_total()) . "\n";

$sm->empty_cart();
$sm->add_item_to_cart("A"); echo "\n";
$sm->add_item_to_cart("A"); echo "\n";
$sm->add_item_to_cart("A"); echo "\n";
echo "test 6: "; assert_equal(130.0, $sm->get_cart_total()) . "\n";

$sm->empty_cart();
$sm->add_item_to_cart("A",3); echo "\n";
$sm->add_item_to_cart("A",3); echo "\n";
$sm->add_item_to_cart("A",3); echo "\n";
$sm->add_item_to_cart("B",3); echo "\n";
$sm->add_item_to_cart("B",3); echo "\n";
echo "test 7: "; assert_equal(175.0, $sm->get_cart_total()) . "\n";


?>
