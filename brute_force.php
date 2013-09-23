<?php

/**
 * Created by JetBrains PhpStorm.
 * User: Pradhan
 * Date: 9/5/13
 * Time: 11:04 AM
 *
 *
 * BRUTE FORCE ALGORITHM for cracking MD5 hashed Password
*/

// this is the hash we are trying to crack
define('HASH_CODE', '098f6bcd4621d373cade4e832627b4f6');

// see http://php.net/hash_algos for available algorithms
define('HASH_ALGO', 'md5');

// max length of password
define('PASSWORD_LENGTH', 4);


// available characters to try for password
// uncomment additional charsets for more complex passwords

$charset = 'abcdefghijklmnopqrstuvwxyz';
//$charset .= '0123456789';
//$charset .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
//$charset .= '~`!@#$%^&*()-_\/\'";:,.+=<>? ';


$charset_length = strlen($charset);
$iteration = 0;

function check($password)
{
//    global $iteration;
    if (hash(HASH_ALGO, $password) == HASH_CODE) {

        echo 'MATCH FOUND password: ' . $password . "<br />";
//        echo $iteration;
        exit;

    }

}


function iterate($pwd_length, $position, $base_string)
{
    global $charset, $charset_length, $iteration;

    for ($i = 0; $i < $charset_length; ++$i) {

        if ($position < $pwd_length - 1) {
            iterate($pwd_length, $position + 1, $base_string . $charset[$i]);
        }
        $iteration++;
        check($base_string . $charset[$i]);

    }

}



echo 'TARGET HASH: ' . HASH_CODE . "<br />";

iterate(PASSWORD_LENGTH, 0, '');


echo "Execution complete, Sorry no password found";



?>

