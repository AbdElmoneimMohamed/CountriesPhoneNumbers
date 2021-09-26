<?php
require_once 'ConnectDb.php';

Class CustomerModel {

    static function getPhoneNumbersByCountry($countryCode=null) {
        $dbInstance = ConnectDb::getInstance();
        $dbConn = $dbInstance->getConnection();
        $queryString = 'SELECT * FROM customer WHERE phone LIKE "%('.$countryCode.')%"';
        try {
            $resault = $dbConn->query($queryString);
            return $resault;
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    static function getAllCustomersPhoneNumber($status = null) {
        $dbInstance = ConnectDb::getInstance();
        $dbConn = $dbInstance->getConnection();
        $createIndexString = 'CREATE INDEX IF NOT EXISTS phoneNumbers ON customer (phone asc )';
        $dbConn->query($createIndexString);
        $queryString = 'SELECT * FROM customer';
        try {
            $resault = $dbConn->query($queryString);
            return $resault;
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}
