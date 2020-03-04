<?php
/**
 * Save candidate lead to Freshteam CRM
 * @param Array $sheetData => Lead Data in Array
 * @return Array $response => Save status
 */
function saveCandidate ($sheetData) {

  $JOB_ID = $GLOBALS['JOB_ID'];

  $leadDetails = array_merge([
    'middle_name' => NULL,
    'phone' => NULL,
    'skype_id' => NULL,
    'description' => NULL,
    'address' => NULL,
    'deleted' => false,
    'spam' => false,
    'read' => false,
    'street' => NULL,
    'city' => NULL,
    'state' => NULL,
    'country_code' => NULL,
    'zip_code' => NULL,
    'parsed_resume_id' => NULL,
    'applicant_count' => NULL,
    'unread_count' => NULL,
    'from_email_conversation' => NULL,
    'total_experience_in_months' => NULL,
    'location' => NULL,
    'has_resume' => false,
    'added_by_id' => NULL,
    'gender' => NULL,
    'additional_detail_attributes' => 
    [
      'eeo_gender' => NULL,
      'eeo_veteran' => NULL,
      'eeo_ethnicity' => NULL,
      'eeo_disabled' => NULL,
    ],
    'source_id' => '3000028593',
    'medium_id' => '3000026564',
    'prospects_attributes' => 
   [],
    'qualifications_attributes' => 
    [],
    'positions_attributes' => 
    [],
    'resumes_attributes' => 
    [],
    'cover_letters_attributes' => 
    [],
    'portfolios_attributes' => 
    [],
    'other_attachments_attributes' => 
    [],
    'shared_attachments_attributes' => 
    [],
    'conversations_attributes' => 
    [],
    'user_id' => NULL,
    'owner_id' => NULL,
  ], $sheetData); 

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://tophire.freshteam.com/hire/jobs/$JOB_ID/applicants",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
      'applicant' => 
      [
        'reject_from_other_jobs' => false,
        'read' => false,
        'deleted' => false,
        'rollback_cooloff' => false,
        'skip_applicant_notification' => true,
        'custom_field_attributes' => 
        [
        ],
        'misc' => 
        [],
        'job_id' => $JOB_ID,
        'stage_id' => '3000296866',
        'lead_attributes' => $leadDetails
        ,
        'status' => NULL,
        'interviews_attributes' => 
        [],
        'conversations_attributes' => 
        [],
        'moved_from_id' => NULL,
        'followers_attributes' => 
        [],
        'requisition_id' => NULL,
        'requisition_offered_id' => NULL,
        'requisition_hired_id' => NULL,
        'requisition_joined_id' => NULL,
      ]
    ]),
    CURLOPT_HTTPHEADER => [
      "authority: tophire.freshteam.com",
      "x-ember-accept: v2.0.0.rc.88+ad9b6315",
      "x-csrf-token: qABozrZLDa4L3VTqyWNVPya04p8Bf4io9U1THLgz/dYRmnA9OITdLmv0rc4VQY3xAzwPgDbQFktgrEKw02ArXQ==",
      "authorization: JWTAuth token=dummy+token",
      "content-type: application/json; charset=UTF-8",
      "accept: application/json, text/javascript, */*; q=0.01",
      "sec-fetch-dest: empty",
      "x-requested-with: XMLHttpRequest",
      "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36",
      "origin: https://tophire.freshteam.com",
      "sec-fetch-site: same-origin",
      "sec-fetch-mode: cors",
      "referer: https://tophire.freshteam.com/hire/jobs/$JOB_ID/candidates/listview",
      "accept-language: en-GB,en-US;q=0.9,en;q=0.8",
      "cookie: _hp2_ses_props.2382848529=%7B%22ts%22%3A1583167702291%2C%22d%22%3A%22tophire.freshteam.com%22%2C%22h%22%3A%22%2Fhire%2Fjobs%2F$JOB_ID%2Fcandidates%2Flistview%22%7D; _delighted_fst=1583167772215:{}; _delighted_lst=1581421998000:{%22token%22:%22lWqw08YTPniotsNzHz6ceAgS%22}; zarget_visitor_info=%7B%7D; _BEAMER_USER_ID_BGhqwDBY16511=49d24b1e-d858-458b-8e1f-f2612233fbe7; _BEAMER_FIRST_VISIT_BGhqwDBY16511=2020-03-02T16:49:40.328Z; _BEAMER_FILTER_BY_URL_BGhqwDBY16511=false; _hp2_id.2382848529=%7B%22userId%22%3A%22366753526166082%22%2C%22pageviewId%22%3A%226017826650818099%22%2C%22sessionId%22%3A%228597785792097825%22%2C%22identity%22%3A%223000078131%22%2C%22trackerVersion%22%3A%224.0%22%2C%22identityField%22%3Anull%2C%22isIdentified%22%3A1%7D; _ftcs=%7B%22authenticated%22%3A%7B%22authenticator%22%3A%22authenticator%3Adevise%22%2C%22token%22%3A%22dummy+token%22%2C%22email%22%3A%22dummy+email%22%2C%22isAuthenticated%22%3Atrue%7D%7D; _ftat=IkpXVEF1dGggdG9rZW49ZXlKaGJHY2lPaUprYVhJaUxDSmxibU1pT2lKQk1USTRSME5OSW4wLi5JbTRTTk0zUmF6TGpINGNPLk9hZTlfdU5yY3M5Q0NDWXVJVlBXbGkwRXcxeEZ0QjlqY3JFRGg1eXA3MDh1WldyTVVKeFdNcHVFUTdHNjFkZS1pQ0RTdGM3UmhZZ050azAxZGhHMjhVM2VBSVR3dmFZTGNxekhyU2JDRVZEb3hFVm93aUQ2djQxOWV1dVhiV0NQSXBOczNpU3JaYjkzVkhMX2NKSk53NXZCUWwydklCUkdKZW9aR1BjOVB6Vkl1TnRaSWI5OG12bE95OU5HNnljaGoxZXpnYUgzdXN6a2pkSWJJVXJpbUd1SHRSVUpLY1VBUDIycVpKOTNYVGQ0LnM5RXkyTVdIeU5PQkpha08zcmVwRnci--580ed98be5c23992dadcb53a6d30764229e8edb9; _session_id=TGFBcjFxbW1ENWpJdlFEdHg3Y2lSSEVYaGNSSVlZaDlpdFgza3AybllGbC9UOGFyOVBHbXAxU0tCQ3FUZlQ3Y0lsU3NtR0lnRGY5Z0ZRcXdOVnY1TGNXNEF0TUdQMzNiMWZkaGVlN201c2VQT2x2c2xRcU9QeENHMnBnRVRMd3I5ektwNGVqa1c3N0NhVVM3ZHFsZ3F3PT0tLWszSXJRUUFFVmRTVC9wTkxkY1MwZ1E9PQ%3D%3D--6bfa03eb0ae645020a5cbcdf3bf794e5477e2908"
    ],
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  prettyPrintOutput($response);
}

/**
 * Prints formatted output in command line
 * @param $json => Json data to pretty print
 */
function prettyPrintOutput($json) {
  echo json_encode(json_decode($json), JSON_PRETTY_PRINT);
}

/**
 * Function to take input from command line
 * @return Array [fileType: xlsx, fileName: list] 
 */
function getInput () {
  $type = getopt('t:f:j:');
  $GLOBALS['JOB_ID'] = @$type['j'] ? $type['j'] : @$GLOBALS['JOB_ID'];

  return [
    'fileType' =>  @$type['t'] ? $type['t'] : 'xlsx',
    'fileName' => @$type['f'] ? $type['f'] : 'list',
  ];
}




// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://tophire.freshteam.com/hire/jobs/3000023633/applicants",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS =>"{\"applicant\":{\"reject_from_other_jobs\":false,\"read\":false,\"deleted\":false,\"rollback_cooloff\":false,\"skip_applicant_notification\":true,\"custom_field_attributes\":{},\"misc\":{},\"job_id\":\"3000023633\",\"stage_id\":\"3000296866\",\"lead_attributes\":{\"first_name\":\"BNVNV\",\"middle_name\":null,\"last_name\":\"VBNVBN\",\"phone\":null,\"email\":\"TAsB@CVCX.VGV\",\"mobile\":\"456456456456\",\"skype_id\":null,\"description\":null,\"address\":null,\"deleted\":false,\"spam\":false,\"read\":false,\"street\":null,\"city\":null,\"state\":null,\"country_code\":null,\"zip_code\":null,\"parsed_resume_id\":null,\"applicant_count\":null,\"unread_count\":null,\"from_email_conversation\":null,\"total_experience_in_months\":null,\"location\":null,\"has_resume\":false,\"profile_links\":[{\"url\":\"\",\"name\":\"\",\"image_url\":null}],\"added_by_id\":null,\"gender\":null,\"additional_detail_attributes\":{\"eeo_gender\":null,\"eeo_veteran\":null,\"eeo_ethnicity\":null,\"eeo_disabled\":null},\"source_id\":\"3000028593\",\"medium_id\":\"3000026564\",\"prospects_attributes\":[],\"qualifications_attributes\":[],\"positions_attributes\":[],\"resumes_attributes\":[],\"cover_letters_attributes\":[],\"portfolios_attributes\":[],\"other_attachments_attributes\":[],\"shared_attachments_attributes\":[],\"conversations_attributes\":[],\"user_id\":null,\"owner_id\":null},\"status\":null,\"interviews_attributes\":[],\"conversations_attributes\":[],\"moved_from_id\":null,\"followers_attributes\":[],\"requisition_id\":null,\"requisition_offered_id\":null,\"requisition_hired_id\":null,\"requisition_joined_id\":null}}",
//   CURLOPT_HTTPHEADER => array(
//     "authority: tophire.freshteam.com",
//     "x-ember-accept: v2.0.0.rc.88+ad9b6315",
//     "x-csrf-token: qABozrZLDa4L3VTqyWNVPya04p8Bf4io9U1THLgz/dYRmnA9OITdLmv0rc4VQY3xAzwPgDbQFktgrEKw02ArXQ==",
//     "authorization: JWTAuth token=dummy+token",
//     "content-type: application/json; charset=UTF-8",
//     "accept: application/json, text/javascript, */*; q=0.01",
//     "sec-fetch-dest: empty",
//     "x-requested-with: XMLHttpRequest",
//     "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36",
//     "origin: https://tophire.freshteam.com",
//     "sec-fetch-site: same-origin",
//     "sec-fetch-mode: cors",
//     "referer: https://tophire.freshteam.com/hire/jobs/3000023633/candidates/listview",
//     "accept-language: en-GB,en-US;q=0.9,en;q=0.8",
//     "cookie: _hp2_ses_props.2382848529=%7B%22ts%22%3A1583167702291%2C%22d%22%3A%22tophire.freshteam.com%22%2C%22h%22%3A%22%2Fhire%2Fjobs%2F3000023633%2Fcandidates%2Flistview%22%7D; _delighted_fst=1583167772215:{}; _delighted_lst=1581421998000:{%22token%22:%22lWqw08YTPniotsNzHz6ceAgS%22}; zarget_visitor_info=%7B%7D; _BEAMER_USER_ID_BGhqwDBY16511=49d24b1e-d858-458b-8e1f-f2612233fbe7; _BEAMER_FIRST_VISIT_BGhqwDBY16511=2020-03-02T16:49:40.328Z; _BEAMER_FILTER_BY_URL_BGhqwDBY16511=false; _hp2_id.2382848529=%7B%22userId%22%3A%22366753526166082%22%2C%22pageviewId%22%3A%226017826650818099%22%2C%22sessionId%22%3A%228597785792097825%22%2C%22identity%22%3A%223000078131%22%2C%22trackerVersion%22%3A%224.0%22%2C%22identityField%22%3Anull%2C%22isIdentified%22%3A1%7D; _ftcs=%7B%22authenticated%22%3A%7B%22authenticator%22%3A%22authenticator%3Adevise%22%2C%22token%22%3A%22dummy+token%22%2C%22email%22%3A%22dummy+email%22%2C%22isAuthenticated%22%3Atrue%7D%7D; _ftat=IkpXVEF1dGggdG9rZW49ZXlKaGJHY2lPaUprYVhJaUxDSmxibU1pT2lKQk1USTRSME5OSW4wLi5JbTRTTk0zUmF6TGpINGNPLk9hZTlfdU5yY3M5Q0NDWXVJVlBXbGkwRXcxeEZ0QjlqY3JFRGg1eXA3MDh1WldyTVVKeFdNcHVFUTdHNjFkZS1pQ0RTdGM3UmhZZ050azAxZGhHMjhVM2VBSVR3dmFZTGNxekhyU2JDRVZEb3hFVm93aUQ2djQxOWV1dVhiV0NQSXBOczNpU3JaYjkzVkhMX2NKSk53NXZCUWwydklCUkdKZW9aR1BjOVB6Vkl1TnRaSWI5OG12bE95OU5HNnljaGoxZXpnYUgzdXN6a2pkSWJJVXJpbUd1SHRSVUpLY1VBUDIycVpKOTNYVGQ0LnM5RXkyTVdIeU5PQkpha08zcmVwRnci--580ed98be5c23992dadcb53a6d30764229e8edb9; _session_id=TGFBcjFxbW1ENWpJdlFEdHg3Y2lSSEVYaGNSSVlZaDlpdFgza3AybllGbC9UOGFyOVBHbXAxU0tCQ3FUZlQ3Y0lsU3NtR0lnRGY5Z0ZRcXdOVnY1TGNXNEF0TUdQMzNiMWZkaGVlN201c2VQT2x2c2xRcU9QeENHMnBnRVRMd3I5ektwNGVqa1c3N0NhVVM3ZHFsZ3F3PT0tLWszSXJRUUFFVmRTVC9wTkxkY1MwZ1E9PQ%3D%3D--6bfa03eb0ae645020a5cbcdf3bf794e5477e2908"
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;
