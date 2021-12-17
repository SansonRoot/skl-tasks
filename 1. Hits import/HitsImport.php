<?php

require 'vendor/autoload.php';
require_once 'HitModel.php';

use PhpOffice\PhpSpreadsheet\Reader\Xls;

//read excel file
$reader = new Xls();
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load("hits.xls");
$tuples = $spreadsheet->getSheet(0)->toArray();

if (count($tuples) == 0) die('Excel sheet is empty');

//create data model and establish connection to database
$model = new HitModel();

if (!$model) die('Unable to connect to database');

$isHeader = true;
$query = "";
foreach ($tuples as $d){

    if (!$isHeader){

        //use this key to avoid duplicate entries during upload
        $key = $d[0].$d[1].$d[2];

        if (!$model->alreadyExists('tuple_key',$key)){

            //if not the beginning of the build, we are going to add more rows, end query with semi-colon
            if (!empty($query)) $query .=";";

            $query .="INSERT INTO hits (job_id,job_title,date_time,tuple_key) VALUES ('".$d[0]."','".$d[1]."','".$d[2]."','".$key."')";
        }
    }
    $isHeader = false;
}

//echo $query;

echo $model->insertIntoTable($query,true);



