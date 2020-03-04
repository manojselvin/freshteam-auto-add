<?php
require 'header.php';

/**
 * Entry Point of the Program
 * Script to Automate Upload to Freshteam
 * @author Manoj Selvin <manojselvin@gmail.com>
 */
function init () {
    $input = getInput();
    $sheetData = readExcelData($input);
 
    foreach ($sheetData as $key => $sheetData) {
         $leadDetail = [
             'first_name' => $sheetData['A'],
             'last_name' => $sheetData['B'],
             'email' => $sheetData['C'],
             'mobile' => $sheetData['D'],
             'profile_links' => [
             0 => [
                 'url' => $sheetData['E'],
                 'name' => 'resume',
                 'image_url' => ''
                 ]
             ]
         ];
 
         saveCandidate($leadDetail);
     }
 }

 /**
  * Start the program
  */
 init();