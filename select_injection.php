<?php
require "connect.php";

if (isset($_GET["CustomerID"])) {
    $strCustomerID = $strCustomerID = $_GET["CustomerID"];
    echo "<br>" . "strCustomerID = " . $strCustomerID;
    $sql = "SELECT * FROM customer where CustomerID = '" . $strCustomerID . "'";
    echo "<br>" . " sql = " . $sql . "<br>";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetchAll();

    print_r($result);
}
