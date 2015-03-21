<?php

include("./data/item_model.php");

// object instantiation
$im = new ItemModel();

echo "---------------------------------------\n";
echo "Item A, price 50, offer 3 for 130\n";
var_dump($im->get_item('A'));
echo "---------------------------------------\n";
echo "Item B, price 30, offer 2 for 45\n";
var_dump($im->get_item('B'));
echo "---------------------------------------\n";
echo "Item C, price 20, no offer\n";
var_dump($im->get_item('C'));
echo "---------------------------------------\n";
echo "Item D, price 15, no offer\n";
var_dump($im->get_item('D'));
echo "---------------------------------------\n";
echo "Item E, doesn't exist\n";
var_dump($im->get_item('E'));
echo "---------------------------------------\n";
