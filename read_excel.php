<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * Reads Data from Excel and converts into array
 * @param Array $input => fileName, fileType
 * @return Array $sheetData
 */
function readExcelData ($input) {
    extract($input);

    $inputFileType = ucfirst($fileType);
    $inputFileName = __DIR__ . "\upload_files\candidates\\$fileName.$fileType";

    // Create a new Reader of the type defined in $inputFileType
    $reader = IOFactory::createReader($inputFileType);
    $spreadsheet = $reader->load($inputFileName);

    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
    
    return $sheetData;
}

// $type = getopt('t:f:');
// $fileType = @$type['t'];
// $fileName = @$type['f'];

// $inputFileType = $type ? ucfirst($type) : 'Xlsx';
// $inputFileName = __DIR__ . '\upload_files\candidates\\'.($fileName ? $fileName : "list").'.'.($fileType ? $fileType : 'xlsx');

// Create a new Reader of the type defined in $inputFileType
// $reader = IOFactory::createReader($inputFileType);
// // Load $inputFileName to a PhpSpreadsheet Object
// $spreadsheet = $reader->load($inputFileName);

// $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
// echo json_encode($sheetData);
// // var_dump(getopt('t:'));
// exit();

// foreach ($sheetData as $key => $sheetData) {
//     $leadDetail = [
//         'first_name' => $sheetData['A'],
//         'last_name' => $sheetData['B'],
//         'email' => $sheetData['C'],
//         'mobile' => $sheetData['D'],
//         'profile_links' => [
//            0 => [
//             'url' => $sheetData['E'],
//             'name' => 'resume',
//             'image_url' => ''
//             ]
//         ]
//     ];

//     saveCandidate($leadDetail);
// }
