<?php
$limit = 5000; // specify the number of emails
$page = '';
for ($i = 0; $i < $limit; $i++) {
     $page .= generate_emails();
}
function generate_emails() {
     $email = '';
     $chars = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9','-');
     for ( $i = 0; $i < 17; $i++ ) {
          $email .= ( $i !== 10 ) ? $chars[ mt_rand( 0,(int) 25 ) ] : '@';
     }
     $email .= '.com';
     $email  = '<a href="mailto:' . $email . '">' . $email . "</a>\n";
     return $email;
}
$page .= "Have fun with that :)";
echo $page; 
?>