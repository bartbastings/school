<?php
// This example is based on the example found here:
// http://mashupguide.net/1.0/html/ch06s07.xhtml

##insert your own Flickr API KEY here
$api_key = "[ENTER API KEY]";
$secret = "[ENTER SECRET KEY]";
$perms = "read";

$frob = $_GET['frob'];


// the next function is the assignment for the week...
// request some pictures..

function getPhotoList($api_key, $secret, $auth_token)  {
 # calculate API SIG
 # sig string = secret + [arguments listed alphabetically name/value --
 # including api_key and perms]; don't forget the method call

 $method = "flickr.photos.search";
 // let op: user_id argument is nodig om te zoeken naar foto's van een specifieke user. Ik gebruik hier "me" te zoeken naar foto's van de huidige gebruiker.
 $user_id = "me";
 // signeren van de string: let op dat alle argumenten mee gesigneerd worden, dus ook de user_id
 $sig_string =
   "{$secret}api_key{$api_key}auth_token{$auth_token}method{$method}user_id{$user_id}";
 $api_sig = md5($sig_string);

 $token_url =
   "http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key={$api_key}&user_id=me&auth_token={$auth_token}&api_sig={$api_sig}";
 $feed = file_get_contents($token_url);
 $rsp = simplexml_load_string($feed);

 return $rsp;
}

//

function getContactList($api_key, $secret, $auth_token)  {
 # calculate API SIG
 # sig string = secret + [arguments listed alphabetically name/value --
 # including api_key and perms]; don't forget the method call

 $method = "flickr.contacts.getList";
 $sig_string =
   "{$secret}api_key{$api_key}auth_token{$auth_token}method{$method}";
 $api_sig = md5($sig_string);

 $token_url =
   "http://api.flickr.com/services/rest/?method=flickr.contacts.getList&api_key={$api_key}&auth_token={$auth_token}&api_sig={$api_sig}";
 $feed = file_get_contents($token_url);
 $rsp = simplexml_load_string($feed);

 return $rsp;
}

function getToken($api_key,$secret,$frob) {
 # calculate API SIG
 # sig string = secret + [arguments listed alphabetically name/value --
 # including api_key and perms]; don't forget the method call

 $method = "flickr.auth.getToken";
 $sig_string = "{$secret}api_key{$api_key}frob{$frob}method{$method}";
 $api_sig = md5($sig_string);

 $token_url =
   "http://api.flickr.com/services/rest/?method=flickr.auth.getToken&api_key={$api_key}&frob={$frob}&api_sig={$api_sig}";
 $feed = file_get_contents($token_url);
 $rsp = simplexml_load_string($feed);

 return $rsp;
}

$token_rsp = getToken($api_key,$secret,$frob);
$nsid = $token_rsp->auth->user["nsid"];
$username = $token_rsp->auth->user["username"];
$auth_token = $token_rsp->auth->token;
$perms = $token_rsp->auth->perms;

# display some user info
echo "You are: ", $token_rsp->auth->user["fullname"],"<br>";
echo "Your nsid: ", $nsid, "<br>";
echo "Your username: ", $username,"<br>";
echo "auth token: ", $auth_token, "<br>";
echo "perms: ", $perms, "<br>";

# make a call to getContactList

$contact_rsp = (getContactList($api_key,$secret,$auth_token));
$n_contacts = $contact_rsp->contacts["total"];
$s = "<table>";
foreach ($contact_rsp->contacts->contact as $contact) {
 $nsid = $contact['nsid'];
 $username = $contact['username'];
 $realname = $contact['realname'];
 $s = $s . "<tr><td>{$realname}</td><td>{$username}</td><td>{$nsid}</td></tr>";
}

$s = $s . "</table>";
echo "Your contact list (which requires read permission) <br>";
echo "Number of contacts: {$n_contacts}<br>";
echo $s;

// part of the assignment:
# make a call to getPhotoList

$photo_rsp = getPhotoList($api_key,$secret,$auth_token);
// hieronder voor debugging: een var_dump

/*
echo "<pre>";
var_dump($photo_rsp);
echo "</pre>";
*/
// tonen van de private foto's
// gaat via een URL (zie de HTML code preview in Flickr), bijvoorbeeld:
// http://farm8.staticflickr.com/7163/6651986889_28c8eef03c_t.jpg
// de opbouw van deze URL is als volgt:
// http://farm8.staticflickr.com/7163/6651986889_28c8eef03c_t.jpg
// http://farm8.staticflickr.com/[server]/[id]_[secret]_[formaat, bijv. t = thumb].jpg
echo "<ul>";
foreach ($photo_rsp->photos->photo as $photo) {
 $url = "http://farm8.staticflickr.com/" . $photo['server'] . "/" . $photo['id'] . "_" . $photo['secret'] . "_t.jpg";	
 echo "<li><img src=$url></li>";
 //$nsid = $contact['nsid'];
 //$username = $contact['username'];
 //$realname = $contact['realname'];
 //$s = $s . "<tr><td>{$realname}</td><td>{$username}</td><td>{$nsid}</td></tr>";
}
echo "</ul>";

?>