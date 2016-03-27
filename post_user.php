<?php

// Include the mailchimp.php file from the Github repo. Also, bring in the classes that the namespace defines
include('./MailChimp.php'); 
include('./mailchimp_lists.php');
# include('./loginradius_api.php');
use \DrewM\MailChimp\MailChimp;

// Decode the obtained json response to get a php object
$resp = json_decode($response_body);

// Building up the MailChimp object
$MailChimp = new MailChimp('32327d591a2aa4b77ec41141937e5b49-us13');

// Extract the listid from the resp variable
$list_id = $resp->data[0]->id;

// The next step is performing the actual POST operation to a new member to the list identified
// by the list_id. Note that for now, email_address is kept as a string (hard-coded). Later, this 
// email_address will be obtained through the loginradius API
$result = $MailChimp->post("lists/$list_id/members", [
                'email_address' => 'manukumar123@gmail.com',
                'status'        => 'subscribed',
            ]);

// Just for checking the response. Can be removed
// print_r($result);

?>