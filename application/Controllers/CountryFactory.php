<?php

require_once './Constants.php';
require_once 'Cameron.php';
require_once 'Ethiopia.php';
require_once 'Morocco.php';
require_once 'Mozambique.php';
require_once 'Uganda.php';

class CountryFactory {
    public static function getCountryInstance($countyCode) {
        $instance = null;
        switch ($countyCode) {
            case CAMERON_PHONE_CODE :
                $instance = new Cameron();
                break;
            case ETHIOPIA_PHONE_CODE :
                $instance = new Ethiopia();
                break;
            case MOROCCO_PHONE_CODE :
                $instance = new Morocco();
                break;
            case MOZAMBIQUE_PHONE_CODE :
                $instance = new Mozambique();
                break;
            case UGANDA_PHONE_CODE :
                $instance = new Uganda();
                break;
        }
        return $instance;
    }
}