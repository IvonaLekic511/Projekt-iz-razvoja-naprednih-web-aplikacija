 <?php
 
session_start();

//Google API PHP Library includes
require_once 'vendor/autoload.php';

// Set config params to acces Google API
$client_id = '64116774506-1fdqi676gagofcpem90i3t9b89fbkfu0.apps.googleusercontent.com';
 $client_secret = 'ju2CT1zV01KmHwaVK4Jtrp6s';
 $redirect_uri = 'http://localhost/rnwa/index.php';

//Create and Request to access Google API
$client = new Google_Client();
$client->setApplicationName("Google OAuth Login With PHP");
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope(Google_Service_Drive::DRIVE);
$client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);
$client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);



$google_oauthV2 = new Google_Service_Oauth2($client);
// LOGOUT?
if (isset($_REQUEST['logout']))
{
    unset($_SESSION["auto"]);
    unset($_SESSION['token']);
    $client->revokeToken();
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL)); //redirect user back to page
}
// GOOGLE CALLBACK?
if (isset($_GET['code']))
{
    $client->authenticate($_GET['code']);
    $_SESSION['token'] = $client->getAccessToken();
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    return;
}
// PAGE RELOAD?
if (isset($_SESSION['token']))
{
    $client->setAccessToken($_SESSION['token']);
}
// Autologin?
if(isset($_GET["auto"]))
{
    $_SESSION['auto'] = $_GET["auto"];
}
// LOGGED IN?
if ($client->getAccessToken()) // Sign in
{
    //For logged in user, get details from google using access token
    try {
        $user = $google_oauthV2->userinfo->get();
        $user_id              = $user['id'];
        $user_name            = filter_var($user['givenName'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email                = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
        $gender               = filter_var($user['gender'], FILTER_SANITIZE_SPECIAL_CHARS);
        $profile_url          = filter_var($user['link'], FILTER_VALIDATE_URL);
        $profile_image_url    = filter_var($user['picture'], FILTER_VALIDATE_URL);
        $personMarkup         = "$email<div><img src='$profile_image_url?sz=50'></div>";
        $_SESSION['token']    = $client->getAccessToken();

        // Show user
        echo '<br /><a href="'.$profile_url.'" target="_blank"><img src="'.$profile_image_url.'?sz=100" /></a>';
        echo '<br /><a class="logout" href="?logout=1">Logout</a>';

        $boolarray = Array(false => 'false', true => 'true');
        echo '<p>Was automatical login? '.$boolarray[isset($_SESSION["auto"])].'</p>';

        //list all user details
        echo '<pre>';
        print_r($user);
        echo '</pre>';
    } catch (Exception $e) {
        // The user revoke the permission for this App! Therefore reset session token
        unset($_SESSION["auto"]);
        unset($_SESSION['token']);
        header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    }
}
else // Sign up
{
    //For Guest user, get google login url
    $authUrl = $client->createAuthUrl();

    // Fast access or manual login button?
    if(isset($_GET["auto"]))
    {
        header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    }

}

?> 