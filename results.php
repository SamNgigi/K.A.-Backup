<!DOCTYPE html>
<html>
<head>
    <title>Smart Cart - jQuery Shopping Cart Plugin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>
<body>
<?php
// Get the results as JSON string
$product_list = filter_input(INPUT_POST, 'cart_list');
// Convert JSON to array
$product_list_array = json_decode($product_list);

$result_html = '';
if($product_list_array) {
    foreach($product_list_array as $p){
        foreach($p as $key=>$value) {
            //var_dump($key, $value);
            $result_html .= $key.": ".$value."<br />";
        }
        $result_html .= '------------------------------------------<br />';
    }
} else {
	$result_html .= "<strong>Cart is Empty</strong>";
}
?>

    <br />
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border border-default">
                    <div class="card-header">
                        Cart Products
                    </div>
                    <div class="card-body">
                        Full JSON Result<hr />
                        <code>
                            <?= isset($product_list) ? $product_list : '' ?>
                        </code>
                        <br /><br />
                        Product List<hr />
                        <?= isset($result_html) ? $result_html : '' ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
