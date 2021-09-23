<?php

include('config/db_config.php');
include('lib/core.php');

$element_price = CoreSystem::getPrices(1,0);

print_r($element_price);


echo $element_price[1];
?>