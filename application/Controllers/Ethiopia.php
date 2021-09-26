<?php
require_once './Constants.php';
require_once './Interfaces/CustomersPhoneNumbers.php';
require_once './Interfaces/PhoneNumberValidation.php';
require_once './Models/CustomerModel.php';

class Ethiopia implements CustomersPhoneNumbers, PhoneNumberValidation {

    public function validate($phoneNumber)
    {
        $valide = preg_match(ETHIOPIA_PHONE_Pattern, $phoneNumber);
        return $valide == 1 ? VALIDE_STATUS : NOT_VALIDE_STATUS;
    }

    public function populateCustomersPhoneNumber($customers, $phoneNumberStatus)
    {
        $resault = [];
        while ($customer = $customers->fetchArray()) {
            $status = $this->validate($customer["phone"]);
            $customerData = [
                "Country" => ETHIOPIA_COUNTRY,
                "Status" => $status,
                "CountryCode" => "+" . ETHIOPIA_PHONE_CODE,
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
}