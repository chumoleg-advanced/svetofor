<?php

class Date
{
    public static function getToday()
    {
        return date('d') . ' ' . Date::getMonth(date('m')) . ' ' . date('Y') . 'г.';
    }

    public static function getMonth($month = null)
    {
        $month = (int)$month;
        $array = array(
            1  => 'января',
            2  => 'февраля',
            3  => 'марта',
            4  => 'апреля',
            5  => 'мая',
            6  => 'июня',
            7  => 'июля',
            8  => 'августа',
            9  => 'сентября',
            10 => 'октября',
            11 => 'ноября',
            12 => 'декабря',
        );

        if (!empty($month)) {
            return MyArray::get($array, $month);
        }

        return $array;
    }

    public static function getListYear()
    {
        $range = range(date('Y'), 2011);
        $years = array_combine($range, $range);
        return $years;
    }

    public static function validateDate($date, $format = 'Y-m-d H:i:s')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public static function getListHours()
    {
        $array = array();
        for ($i = 0; $i <= 24; $i++) {
            $key = str_pad($i, 2, '0', STR_PAD_LEFT);
            $array[$key] = $key;
        }

        return $array;
    }
}
