<?php
    require('openid.php');

    session_start();
    session_regenerate_id(); // Not sure if this is perfect, but it's happening here for what little security it can provide

    try {
        $openid = new LightOpenID('tf2reputation.com');
        if(!$openid->mode) {
            if(isset($_GET['login'])) {
                $openid->identity = 'http://steamcommunity.com/openid';
                header('Location: ' . $openid->authUrl());
            }
            echo '<form action="?login" method="post"><button>Log in</button></form>';
            // header('Location: login.php?login');
        } elseif($openid->mode == 'cancel') {
            header('Location: /');
            // echo 'User has canceled authentication!';
            // var_dump($_SESSION);
        } else {
            if ($openid->validate()) {
                header('Location: http://tf2reputation.com' . urldecode($_GET['loc']));
                // echo "Logged in as $openid->identity<br>";
                $_SESSION['id'] = $openid->identity;
                // var_dump($_SESSION);
                // echo '<br><a href="/">index</a>';   
            } else {
                echo "Not logged in (as $openid->identity)";
                // var_dump($_SESSION);
            }
            // echo 'User ' . ($openid->validate() ? $openid->identity . ' has ' : 'has not ') . 'logged in.';
        }
    } catch(ErrorException $e) {
        die($e->getMessage());
    }
?>
