<?php

function convertdate($date){
    $timestamp = strtotime($date);
$new_date = date("d/m/Y", $timestamp);
echo $new_date;
}

function formatmonthDate($inputDate) {
    // Convert Y-m-d to timestamp
    $timestamp = strtotime($inputDate);
    
    // Format the timestamp to d M Y
    $formattedDate = date("d M Y", $timestamp);
    
    return $formattedDate;
}

function removeSpaces($inputString) {
    return str_replace(' ', '', $inputString);
}






function formatCustomNumber($number) {
    // Convert the number to a string
    $number_str = strval($number);
    
    // Check if the number is negative
    $is_negative = false;
    if (strpos($number_str, '-') === 0) {
        $is_negative = true;
        // Remove the minus sign for formatting
        $number_str = substr($number_str, 1);
    }
    
    // Split the string into whole and decimal parts
    $parts = explode('.', $number_str);
    
    // Reverse the whole part before formatting
    $whole_part = strrev($parts[0]);
    $whole_part_length = strlen($whole_part);
    $formatted_whole_part = '';
    
    for ($i = 0; $i < $whole_part_length; $i++) {
        $formatted_whole_part .= $whole_part[$i];
        if (in_array($i + 1, [3, 5, 7, 9, 11]) && $i < $whole_part_length - 1) {
            $formatted_whole_part .= ',';
        }
    }
    
    // Reverse the formatted whole part to get the correct order
    $formatted_whole_part = strrev($formatted_whole_part);
    
    // Format the decimal part with two digits
    if (isset($parts[1])) {
        if ($parts[1] > 0) {
            $decimal_part = substr($parts[1], 0, 2); // Take only the first two digits
            $formatted_decimal_part = '.' . $decimal_part;
        } else {
            $formatted_decimal_part = '';
        }
    } else {
        // If there is no decimal part, add ".00" to indicate two decimal places
        $formatted_decimal_part = '.00';
    }
    if ($formatted_decimal_part == "00") {
        $formatted_decimal_part = '';
    }
    
    // Combine the whole and formatted decimal parts, including the minus sign for negative numbers
    $formatted_number = ($is_negative ? '-' : '') . $formatted_whole_part . $formatted_decimal_part;
    
    return $formatted_number;
}
function formatCustomNumber1($number) {
    // Convert the number to a string
    $number_str = strval($number);
    
    // Split the string into whole and decimal parts
    $parts = explode('.', $number_str);
    
    // Format the whole part with commas before the last three digits
    $whole_part = $parts[0];
    $whole_part_length = strlen($whole_part);
    $formatted_whole_part = '';
    
    if ($whole_part_length > 3) {
        $formatted_whole_part .= substr($whole_part, 0, $whole_part_length - 3);
        $formatted_whole_part .= ',' . substr($whole_part, -3);
    } else {
        $formatted_whole_part = $whole_part;
    }
    
    // Format the decimal part with two digits
    if (isset($parts[1])) {
        if($parts[1]>0){
        $decimal_part = substr($parts[1], 0, 2); 
        $formatted_decimal_part = '.' . $decimal_part; } else { $formatted_decimal_part = ''; }
    } else {
   
        $formatted_decimal_part = '';
    }
    
    // Combine the whole and formatted decimal parts
    $formatted_number = $formatted_whole_part . $formatted_decimal_part;
    
    return $formatted_number;
}


?>