<?php

include("./data/cart_model.php");

function assert_equal($test_val, $ret_val) {
  if($ret_val === $test_val) {
    echo "assert_equal: true - Test value $test_val matches return value $ret_val\n";
  } else {
    echo "assert_equal: false - Test value $test_val DOES NOT MATCH return value $ret_val\n";
  }
}

// object instantiation
$cm = new CartModel();

/*
echo "should set 'A' item to 1\n";
$cm->change_quantity('A');
$cm->change_quantity('B',1000);
$cm->get_cart_contents();
echo "\n";

echo "should remove item 'A'\n";
$cm->change_quantity('A',0);
$cm->get_cart_contents();
echo "\n";

echo "should set 'A' item to 1000\n";
$cm->change_quantity('A', 1000);
$cm->get_cart_contents();
echo "\n";

echo "should set 'A' item to 1000\n";
*/

echo "test 1: "; assert_equal(  0.0, $cm->price("")) . "\n";
echo "test 2: "; assert_equal( 50.0, $cm->price("A")) . "\n";
echo "test 3: "; assert_equal( 80.0, $cm->price("AB")) . "\n";
echo "test 4: "; assert_equal(115.0, $cm->price("CDBA")) . "\n";
echo "test 5: "; assert_equal(100.0, $cm->price("AA")) . "\n";
echo "test 6: "; assert_equal(130.0, $cm->price("AAA")) . "\n";
echo "test 7: "; assert_equal(175.0, $cm->price("AAABB")) . "\n";

?>
