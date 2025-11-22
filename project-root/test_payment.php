<?php
require __DIR__ . '/vendor/autoload.php';
use Omnipay\Omnipay;

// Create the gateway
$gateway = Omnipay::create('Cashfree');

// Check setup
echo "✅ Omnipay and Cashfree are installed and working!";
