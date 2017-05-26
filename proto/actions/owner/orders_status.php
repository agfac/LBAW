<?php
include_once '../../config/init.php';
include_once $BASE_DIR . 'database/orders.php';

$order_id = strip_tags($_POST['order_id']);

if(!(isset($_POST['estadoencomenda']))){
	$_SESSION['success_messages'][] = 'Estado da encomenda sem alteração';
	header("Location: $BASE_URL" . 'pages/owner/orders.php');
	exit;
}

$new_order_status = strip_tags($_POST['estadoencomenda']);

$atual_order_status = getOrderStatus($order_id);

if ($atual_order_status['estado'] === $new_order_status) {
    $_SESSION['error_messages'][] = 'Novo estado da encomenda é igual ao atual';
    header("Location: $BASE_URL" . 'pages/owner/order.php?id=' . urlencode($order_id));
    exit;
}

try {
    
    updateOrderStatus($order_id, $new_order_status);

} catch (PDOException $e) {

    if (strpos($e->getMessage(), 'encomenda_encomendaid_key') !== false) {
        $_SESSION['error_messages'][]         = 'Encomenda não existe';
        $_SESSION['field_errors']['encomenda'] = 'Encomenda não existe';
    } else {
        $_SESSION['error_messages'][] = 'Error user information edition';
    }
    header("Location: $BASE_URL" . 'pages/owner/order.php?id=' . urlencode($order_id));
    exit;
}
$_SESSION['success_messages'][] = 'Estado da encomenda mudado com sucesso';
header("Location: $BASE_URL" . 'pages/owner/orders.php');
?>