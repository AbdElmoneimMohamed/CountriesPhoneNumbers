<?php

define('CAMERON_PHONE_CODE', 237);
define('CAMERON_PHONE_Pattern', '/\(237\)\ ?[2368]\d{7,8}$/');
define('CAMERON_COUNTRY', 'Cameron');

define('ETHIOPIA_PHONE_CODE', 251);
define('ETHIOPIA_PHONE_Pattern', '/\(251\)\ ?[1-59]\d{8}$/');
define('ETHIOPIA_COUNTRY', 'Ethiopia');

define('MOROCCO_PHONE_CODE', 212);
define('MOROCCO_PHONE_Pattern', '/\(212\)\ ?[5-9]\d{8}$/');
define('MOROCCO_COUNTRY', 'Morocco');


define('MOZAMBIQUE_PHONE_CODE', 258);
define('MOZAMBIQUE_PHONE_Pattern', '/\(258\)\ ?[28]\d{7,8}$/');
define('MOZAMBIQUE_COUNTRY', 'Mozambique');


define('UGANDA_PHONE_CODE', 256);
define('UGANDA_PHONE_Pattern', '/\(256\)\ ?\d{9}$/');
define('UGANDA_COUNTRY', 'Uganda');


const Countries = [
    CAMERON_PHONE_CODE => CAMERON_COUNTRY,
    ETHIOPIA_PHONE_CODE => ETHIOPIA_COUNTRY,
    MOROCCO_PHONE_CODE => MOROCCO_COUNTRY,
    MOZAMBIQUE_PHONE_CODE => MOROCCO_COUNTRY,
    UGANDA_PHONE_CODE => UGANDA_COUNTRY
];
define('VALIDE_STATUS' , 'OK');
define('NOT_VALIDE_STATUS' , 'NOK');
