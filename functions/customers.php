<?php

include 'connectdb.php';

function getAllCustomers(){
  $conn = Connect();
  $query = "SELECT * FROM customer ORDER BY cus_lname, cus_fname, cus_code, cus_initial, cus_areacode, cus_phone, cus_balance";
  $result = $conn->query($query);
  $data = [];
  
  while($row = $result->fetch_assoc()){
      $data[] = $row;
  }
  return $data;
}

?>