<?php

// Get current value of test from APCu
$test = apcu_fetch('test');

echo "Current value of test: $test\n";

// Set random new value of test in APCu

$newval = rand(1, 1000);
echo "Setting new value of test: $newval\n";
apcu_store('test', $newval);


phpinfo();

sleep(10);