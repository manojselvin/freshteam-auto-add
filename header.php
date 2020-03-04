<?php

require_once 'vendor/autoload.php';
require_once 'utilities.php';
require_once 'read_excel.php';

/* 
##### Steps to add candidates from different accounts #####

After Logging into freshteam copy the `some_job_id` after jobs from url and paste below
https://tophire.freshteam.com/hire/jobs/<some_job_id>/candidates/listview

eg: for this url job id would be https://tophire.freshteam.com/hire/jobs/3000023633/candidates/listview

    job_id from url is `3000023633`
*/

$GLOBALS['JOB_ID'] = 3000023633;