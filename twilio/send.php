<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;


################################ LIVE KEYS #####################################
// $account_sid = 'AC46041e1c4e91caee7c9949243e1a1e29';
// $auth_token = '7c732613583fe910988cc2c8b0ec0240';
// $twilio_number = '+15703768094';
// $receiver = 
################################################################################

################################ TEST KEYS #####################################
$account_sid = 'AC5a9222e8258ab965b073b8df8a9211c7';
$auth_token = '95eca8098495eee8ccec43340b201c64';
$twilio_number = '+18143998410';
$receiver = '+5978920264';
################################################################################


$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    $receiver,
    array(
        'from' => $twilio_number,
        'body' => 'I sent this message in under 10 minutes!'
    )
);