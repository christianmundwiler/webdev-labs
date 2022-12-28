<?php
/*
 * Description - This program prompts user inputs for Customer Type & Invoice Subtotal and parses that input to
 * determine the discount. If the user inputs an incorrect Customer Type and/or Invoice Subtotal, an error 
 * message is displayed.
 * Author - Christian Mundwiler
 * Version - 2022.09.15
 */
?>

<?php

$customer_type = filter_input(INPUT_POST, 'type');
$invoice_subtotal = filter_input(INPUT_POST, 'subtotal');

$error_message_customer = '';
$error_message_subtotal = '';

if ($customer_type == 'R' || $customer_type == 'r') {
    if ($invoice_subtotal < 100) {
        $discount_percent = .0;
    } else if ($invoice_subtotal >= 100 && $invoice_subtotal < 250) {
        $discount_percent = .1;
    } else if ($invoice_subtotal >= 250 && $invoice_subtotal < 500) {
        $discount_percent = .25;
    } else {
        $discount_percent = .3;
    }
} else if ($customer_type == 'C' || $customer_type == 'c') {
    $discount_percent = .2;
} else if ($customer_type == 'T' || $customer_type == 't') {
    if ($invoice_subtotal < 500) {
        $discount_percent = .4;
    } else {
        $discount_percent = .5;
    }
} else if ($customer_type != '') {
   $error_message_customer .= 'Customer type must be R, C, or T <br>';
}

if ($invoice_subtotal != '') {
    if ($invoice_subtotal <= 0) {
        $error_message_subtotal .= 'Invoice total must be greater than 0';
    }
    else if (!is_numeric($invoice_subtotal)) {
        $error_message_subtotal .= 'Invoice total must be numeric';
    }
}

if ($error_message_subtotal != '' || $error_message_customer != '') {
    include ('invoice_total.php');
    exit;
}

$discount_amount = $invoice_subtotal * $discount_percent;
$invoice_total = $invoice_subtotal - $discount_amount;

$percent = number_format(($discount_percent * 100));
$discount = number_format($discount_amount, 2);
$total = number_format($invoice_total, 2);

include 'invoice_total.php';
?>