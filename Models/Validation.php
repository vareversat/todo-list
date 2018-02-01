<?php

class Validation{

    /**
     * Validate whether of not a string is valid
     *
     * @param $string string string to validate
     * @return string the string validated
     * @throws Exception whenever the string isn't set or empty
     */
    static function validateString($string) : string {
        if (!isset($string) || $string == "")
            throw new Exception("All fields are not properly set !");

        return preg_replace('/[^A-Za-z0-9-éèê\- -\']/', '', $string);
    }

    /**
     * Validate whether or not a string if a valid password
     *
     * @param $pwd string password to validate
     * @return string the password validated
     * @throws Exception whenever the password isn't set or empty
     */
    static function validatePWD($pwd) : string {
        if (!isset($pwd) || $pwd == "")
            throw new Exception("Password is required !");

        return $pwd;
    }


    /**
     * Validate whether or not a date is valid
     *
     * @param $date string date to validate
     * @return string the date validated
     * @throws Exception whenever the date isn't set, is empty or has an invalid format (different from dd/mm/yyyy)
     */
    static function validateDate($date) : string {
        if (!isset($date) || $date == "")
            throw new Exception("Date required !");

        $expr = "!^(0?\d|[12]\d|3[01])/(0?\d|1[012])/((?:19|20)\d{2})$!";
        $checkedDate =  preg_match($expr, $date) ? $date : "";

        if($checkedDate == "")
            throw new Exception("Date must be : dd/mm/yyyy");

        return $checkedDate;
    }
}