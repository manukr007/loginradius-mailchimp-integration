# loginradius-mailchimp-integration
This is a public repository that defines the integration of Mailchimp with LoginRadius

The following functionalities are associated with each module:
* MailChimp.php - defines the necessary classes that implement the MailChimp API.
* loginradius_api.php - module that gets the user profile information
* mailchimp_lists.php - module that gets all the lists associated with a particular mailchimp account.
* post_user.php - Takes the user from `loginradius_api.php` and adds it to the list obtained from `mailchimp_lists.php`
