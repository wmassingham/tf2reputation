page

<?php
// Logging in with Google accounts requires setting special identity, so this example shows how to do it.
require 'openid.php';
echo 'page1';
try {
    # Change 'localhost' to your domain name.
    $openid = new LightOpenID('tf2reputation.com');
    echo 'page2';
    if(!$openid->mode) {
        if(isset($_GET['login'])) {
            $openid->identity = 'http://steamcommunity.com/openid';
            header('Location: ' . $openid->authUrl());
        }
        echo '<form action="?login" method="post"><button>Login with Google</button></form>';
    } elseif($openid->mode == 'cancel') {
        echo 'User has canceled authentication!';
    } else {
        echo 'User ' . ($openid->validate() ? $openid->identity . ' has ' : 'has not ') . 'logged in.';
    }
} catch(ErrorException $e) {
    echo $e->getMessage();
} ?>
