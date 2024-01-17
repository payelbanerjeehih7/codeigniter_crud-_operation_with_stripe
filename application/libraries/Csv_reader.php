<?php
defined('BASEPATH') or exit('No direct script access allowed');

use League\Csv\Reader;
use League\Csv\Statement;

class Csv_reader
{

    public function readCsv($file_path)
    {
        // $csv = Reader::createFromPath($file_path, 'r');
        // // ->setDelimiter(',')
        // //     ->setEnclosure('"')
        // //     ->setEscape('\\');
        // $csv->setHeaderOffset(0); // Assuming the CSV file has headers

        // $stmt = Statement::create();
        // // ->offset(10)
        // // ->limit(25);

        // $records = $stmt->process($csv);

        // $records = $stmt->process($csv)->getRecords();

        // // Convert the generator to an array with associative format
        // $data = [];
        // foreach ($records as $record) {
        //     $data[] = $record;
        // }

        // return $data;
        // // $data = [];
        // // // foreach ($records as $record) {
        // // //     //do something here
        // // //     $data['name'] = $record['name'];
        // // // }
        // // try {
        // //     $data = iterator_to_array($records);
        // // } catch (\Exception $e) {
        // //     echo 'Error reading CSV file: ' . $e->getMessage();
        // // }

        // // return $data;

        // // $stmt = (new Statement())
        // //     ->offset(1); // Skip the header row

        // // $records = $stmt->process($csv)->getRecords();

        // // // Debugging output
        // // var_dump($records);

        // // return $records;


        // Specify the delimiter used in your CSV file
        $delimiter = ',';

        // Get all CSV files in the specified directory
        $csvFiles = glob($file_path . '/*.csv');

        // Initialize an empty array to store all data
        $allData = [];

        foreach ($csvFiles as $filePath) {
            $csv = Reader::createFromPath($filePath, 'r');
            $csv->setDelimiter($delimiter);

            // Assuming the CSV file has headers in the first row
            $csv->setHeaderOffset(0);

            // Fetch all records as an array with associative format
            $data = $csv->getRecords();
            $allData[$filePath] = iterator_to_array($data);
        }

        return $allData;
    }
}
