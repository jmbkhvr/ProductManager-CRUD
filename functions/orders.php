<?php

include 'connectdb.php';

function getAllOrders(){
    $conn = Connect();
    $query = 'SELECT i.inv_number AS inv_number,
              c.cus_fname AS cus_fname,
              i.inv_date AS inv_date,
              i.inv_subtotal AS inv_subtotal,
              i.inv_tax AS inv_tax,
              i.inv_total AS inv_total
              FROM invoice i
              JOIN customer c ON i.cus_code = c.cus_code
              ORDER BY i.inv_date';
    $result= $conn->query($query); //Executes query
    $data = [];

    while($row = $result->fetch_assoc()){
        $data[]=$row;
    }
    return $data;
}

function deleteProduct($id){
    $conn = Connect();
    $query = "DELETE FROM product WHERE i.inv_number='$id'";
    $result= $conn->query($query); //Executes query
    return $result;
}