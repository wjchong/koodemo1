<?php

require_once "./config.php";
$posted = file_get_contents("php://input");
$localOrders = json_decode($posted);

// Retrieve the non-zero status
$zeros = array();
$completes = array();

foreach ($localOrders as $order)
{
    if ($order->status == "0")
    {
        $zeros[] = $order;
    }
    if ($order->status == "2") {
        $completes[] = $order;
    }
}

if ($posted != "") file_put_contents("./post.txt", $posted);
// exit($posted);

function UpdateOrder($orderid, $orderstatus)
{
    //$conn = mysqli_connect("localhost", "root", "", "koofamil_demo");
    $sql = "UPDATE order_list SET status = $orderstatus WHERE id = $orderid";

    echo $sql . "\n";

    $query = mysqli_query($conn, $sql);
    //mysqli_close($conn);
}



// Retrieve all order lists
$query = mysqli_query($conn, "SELECT order_list.*, users.mobile_number FROM order_list inner join users on order_list.user_id = users.id ORDER BY `created_on` DESC");

$orders = array();
$now = date_create(date("Y-m-d G:i:s"));

while($r = mysqli_fetch_assoc($query))
{
    $record = date_create($r['created_on']);
    $delay = date_diff($now, $record, true);

    if ($delay->d <= 7)
    {
        $orders[] = $r;
    }

}

// Retrieve all order lists
$query = mysqli_query($conn, "SELECT users.* FROM users");

$users = array();

while($r = mysqli_fetch_assoc($query))
{
    $users[] = $r;
}



//mysqli_close($conn);

// Create order with pending status
$pendingOrders = array();
foreach ($orders as $order)
{
    if ($order['status'] == "0")
    {
        $pendingOrders[] = $order;
    }
}

// Retrieve the only updated rder
$updated = array();
foreach ($completes as $local)
{
    $found = false;

    foreach ($pendingOrders as $pending)
    {
        if ($local->created_on == $pending['created_on'] &&
            $local->user_id == $pending['user_id'] &&
            $local->product_id == $pending['product_id'] &&
            $local->merchant_id == $pending['merchant_id']
        )
        {

            //UpdateOrder($pending['id'], $local->status);
            $updated[] = $pending;
        }
    }
}

//print_r($updated);
//exit();


// Retrieve new order
$returns = array();
foreach($pendingOrders as $order)
{
    $found = false;
    foreach ($zeros as $zero)
    {
        if ($zero->created_on == $order['created_on'] && $order['status'] == "0")
        {
            //echo $zero->status . " found\n";
            $found = true;
            break;

        }
    }

    if (!$found) $returns[] = $order;
}

header("Content-type: application/json");

$inserted = array("orders" => $returns, "users" => $users);
echo json_encode($inserted);

?>