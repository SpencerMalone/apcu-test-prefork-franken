<?php
// public/index.php

do {
    $running = frankenphp_handle_request(function () use ($myApp) {
        // Get current value of test from APCu
        $test = apcu_fetch('test');

        echo "Current value of test: $test\n";

        // Set random new value of test in APCu

        $newval = rand(1, 1000);
        echo "Setting new value of test: $newval\n";
        apcu_store('test', $newval);


        phpinfo();

        sleep(10);
    });
    // Call the garbage collector to reduce the chances of it being triggered in the middle of a page generation
    gc_collect_cycles();
} while ($running);

// Cleanup
$myApp->shutdown();