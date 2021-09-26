<?php
require_once './Constants.php';
require_once './Models/CustomerModel.php';
require_once 'CountryFactory.php';

class Country {

    function getCustomersPhoneNumbers($countryCode = null, $phoneNumberStatus = null) {
        if (isset($countryCode) && $countryCode != '') {
            $customers = CustomerModel::getPhoneNumbersByCountry($countryCode);
            $countryInstance = CountryFactory::getCountryInstance($countryCode);
            $customersPhoneNumbers = $countryInstance->populateCustomersPhoneNumber($customers, $phoneNumberStatus);
            return $customersPhoneNumbers;
        }
        $customers = CustomerModel::getAllCustomersPhoneNumber($phoneNumberStatus);
        $customersPhoneNumbers = $this->populateCustomersPhoneNumber($customers, $phoneNumberStatus);
        return $customersPhoneNumbers;
    }

    function populateCustomersPhoneNumber($customers, $phoneNumberStatus) {
        $resault = [];
        while ($customer = $customers->fetchArray()) {
            $countryCode = $this->get_string_between($customer["phone"], '(', ')');
            $countryInstance = CountryFactory::getCountryInstance($countryCode);
            $status = $countryInstance->validate($customer["phone"]);
            $customerData = [
                "Country" => Countries[$countryCode],
                "Status" => $status,
                "CountryCode" => "+" . $countryCode,
                "phone" => substr($customer["phone"], strpos($customer["phone"], ")") + 1),
            ];
            if (isset($phoneNumberStatus) && $phoneNumberStatus == $status) {
                $resault[] = $customerData;
            } elseif (!isset($phoneNumberStatus) || $phoneNumberStatus == '') {
                $resault[] = $customerData;
            }
        }
        return $resault;
    }

    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }
}