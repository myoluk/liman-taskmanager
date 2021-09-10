<?php

$ip = '192.168.1.58'; //extensiondb // domain sunucunun ip adresi
$domainname= 'test.lab';
$user = "veli@".$domainname;
$pass = 'Passw0rd';
$server = 'ldaps://'.$ip;

$ldap = ldap_connect($server);
ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldap, LDAP_OPT_X_TLS_REQUIRE_CERT, LDAP_OPT_X_TLS_NEVER);
ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

$bind=ldap_bind($ldap, $user, $pass);
if (!$bind) {
    exit('Binding failed');
} 

$filter = "(cn=Administrator)";
$result = ldap_search($ldap, "cn=Users,dc=test,dc=lab", $filter);
$entries = ldap_get_entries($ldap,$result);
//$count = ldap_count_entries($ldap, $result);

var_dump($entries);