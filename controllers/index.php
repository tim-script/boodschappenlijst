<?php

require "Database.php";

$config = require "config.php";
$db = new Database($config["database"]);
$groceries = $db->query("SELECT name, number, price FROM groceries");
$totalPrice = array_reduce($groceries, function ($carry, $item) { return $carry + $item["price"] * $item["number"]; }, 0);

require "views/index.view.php";
