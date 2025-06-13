<?php

function capitalizeAfterSpaces($string) {
    $positions = [];
    $length = strlen($string);

    // Find all space positions
    for ($i = 0; $i < $length; $i++) {
        if ($string[$i] === ' ') {
            $positions[] = $i;
        }
    }

    // Capitalize letters after spaces
    $result = $string; // Create a copy to modify
    foreach ($positions as $pos) {
        if ($pos + 1 < $length) { // Check if there's a character after the space
            $result = substr_replace($result, strtoupper($result[$pos + 1]), $pos + 1, 1);
        }
    }

    return $result;
}
?>