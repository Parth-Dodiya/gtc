<?php 

$json = '[{
     "postcode_areas": "BN,CR,DA,E,EC,EN,HA,IG,KT,ME,N,NW,RM,SE,SW,TW,UB,W,WC,SM,WD",
     "quantity": [{
          "quantity": "1",
          "quantity_price": "0.20"
     }, {
          "quantity": "2",
          "quantity_price": "85.00"
     }, {
          "quantity": "3",
          "quantity_price": "78.00"
     }, {
          "quantity": "4-9",
          "quantity_price": "68.75"
     }, {
          "quantity": "10-14",
          "quantity_price": "60.00"
     }, {
          "quantity": "15-19",
          "quantity_price": "55.00"
     }, {
          "quantity": "20",
          "quantity_price": "55.00"
     }],
     "delivery_time": "1-2 Days"
}, {
     "postcode_areas": "BR",
     "quantity": [{
          "quantity": "1",
          "quantity_price": "0.20"
     }, {
          "quantity": "2",
          "quantity_price": "78.00"
     }, {
          "quantity": "3",
          "quantity_price": "66.00"
     }, {
          "quantity": "4-9",
          "quantity_price": "55.00"
     }, {
          "quantity": "10-14",
          "quantity_price": "50.00"
     }, {
          "quantity": "15-19",
          "quantity_price": "48.50"
     }, {
          "quantity": "20",
          "quantity_price": "48.50"
     }],
     "delivery_time": "1-2 Days"
}, {
     "postcode_areas": "CM",
     "quantity": [{
          "quantity": "1",
          "quantity_price": "0.20"
     }, {
          "quantity": "2",
          "quantity_price": "78.00"
     }, {
          "quantity": "3",
          "quantity_price": "66.00"
     }, {
          "quantity": "4-9",
          "quantity_price": "58.50"
     }, {
          "quantity": "10-14",
          "quantity_price": "52.00"
     }, {
          "quantity": "15-19",
          "quantity_price": "49.50"
     }, {
          "quantity": "20",
          "quantity_price": "48.50"
     }],
     "delivery_time": "1-2 Days"
}, {
     "postcode_areas": "CT",
     "quantity": [{
          "quantity": "1",
          "quantity_price": "0.20"
     }, {
          "quantity": "2",
          "quantity_price": "136.50"
     }, {
          "quantity": "3",
          "quantity_price": "132.50"
     }, {
          "quantity": "4-9",
          "quantity_price": "77.50"
     }, {
          "quantity": "10-14",
          "quantity_price": "72.50"
     }, {
          "quantity": "15-19",
          "quantity_price": "65.00"
     }, {
          "quantity": "20",
          "quantity_price": "65.00"
     }],
     "delivery_time": "1-2 Days"
}, {
     "postcode_areas": "GU",
     "quantity": [{
          "quantity": "1",
          "quantity_price": "0.20"
     }, {
          "quantity": "2",
          "quantity_price": "78.00"
     }, {
          "quantity": "3",
          "quantity_price": "66.00"
     }, {
          "quantity": "4-9",
          "quantity_price": "64.50"
     }, {
          "quantity": "10-14",
          "quantity_price": "64.50"
     }, {
          "quantity": "15-19",
          "quantity_price": "52.00"
     }, {
          "quantity": "20",
          "quantity_price": "48.50"
     }],
     "delivery_time": "1-2 Days"
}, {
     "postcode_areas": "HP,LU,OX,PO,RG,RH,SG,SL,SO,SS,TN",
     "quantity": [{
          "quantity": "1",
          "quantity_price": "0.20"
     }, {
          "quantity": "2",
          "quantity_price": "78.00"
     }, {
          "quantity": "3",
          "quantity_price": "66.00"
     }, {
          "quantity": "4-9",
          "quantity_price": "57.50"
     }, {
          "quantity": "10-14",
          "quantity_price": "49.50"
     }, {
          "quantity": "15-19",
          "quantity_price": "48.50"
     }, {
          "quantity": "20",
          "quantity_price": "48.50"
     }],
     "delivery_time": "1-2 Days"
}, {
     "postcode_areas": "B",
     "quantity": [{
          "quantity": "1",
          "quantity_price": "0.20"
     }],
     "delivery_time": ""
}]';

if (isset($_POST) && !empty($_POST) ) {
	
	$decoded_datas = json_decode($json);

	foreach ($decoded_datas as $decoded_data) {
	 	// code...
	 	$postcode_areas = explode(",", $decoded_data->postcode_areas);
	 	// echo "<pre>";
	 	// print_r(in_array($_POST['postcode'], $postcode_areas));
	 	// echo "</pre>";
	 	if (in_array(strtoupper($_POST['postcode']), $postcode_areas)) {

		 	foreach ($decoded_data->quantity as $quantity) {
		 		// code...
		 		// echo "<pre>";
		 		// print_r($quantity->quantity);
		 		// echo "</pre>";
		 		// exit();

		 		if (strpos( $quantity->quantity , '-') !== false) {
					// code...
					$range_of_qty = explode('-', $quantity->quantity );
					echo "<pre>";
					print_r($quantity->quantity, $range_of_qty);
					echo "</pre>";
					// exit();

					if (($_POST['quantity'] <= $range_of_qty[1]) && ($_POST['quantity'] >= $range_of_qty[0])) {
						// code...
						echo("Price :: " . $quantity->quantity_price);
						// exit();
						
					}

					
				} else {
					if ($_POST['quantity'] == $quantity->quantity){
						echo("<b>Price</b> :: " . $quantity->quantity_price);
						break;
						
					}
				}

		 		
		 	}

	 	}
	 	
	 } 
	
}

?>

<div style="display:flex; flex-direction:column; row-gap: 20px;">
    <form method="POST" action="price.php">
    <div>
        <label>Enter Post Code</label>
        <input type="text" name="postcode" placeholder="Enter Postcode Prefix">
    </div>
    <div>
        <label>Enter QTY</label>
        <input type="number" name="quantity" placeholder="Enter Quantity">
    </div>
    <div>
        <input type="submit" name="Submit">
    </div>
</form>
</div>