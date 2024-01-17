<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('array_to_csv')) {
    function array_to_csv($array) {
        if (empty($array)) {
            return '';
        }

        $output = fopen('php://temp', 'w');
        fputcsv($output, array_keys(reset($array))); // Write the header

        foreach ($array as $row) {
            fputcsv($output, $row);
        }

        rewind($output);
        $csv_data = stream_get_contents($output);
        fclose($output);

        return $csv_data;
    }
}
?>