### To Set up and Install Project Dependencies
First Run `'composer install'` inside project directory.

## Commands to upload candidate to `'Freshteam CRM'`

command to upload candidates from default config ie. filename "list.xlsx" and job id from my demo account "3000023633"

`php add_data.php -f list -t xls -j 3000023633`

>Options for command line

-f => Filename

-t => Extension

-j => Job Id

## Steps to add candidates from different accounts

After Logging into freshteam copy the `some_job_id` after jobs from url and paste below
https://tophire.freshteam.com/hire/jobs/<some_job_id>/candidates/listview

eg: for this url job id would be https://tophire.freshteam.com/hire/jobs/3000023633/candidates/listview

    job_id from url is `3000023633`