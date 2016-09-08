<?php
/**
 * Формирование красивых сумм
 *
 * Class NumberFormat
 */
class NumberFormat
{
    const DECIMALS_COUNT = 2;
    const THOUSAND_COUNT = 3;
    const THOUSANDS = ' ';
    const POINTER = '.';

    public static function get($string = '', $thou = false, $float = self::DECIMALS_COUNT)
    {
        if (!$thou) {
            $thou = self::THOUSANDS;
        }

        if ($string !== '') {
            return number_format((float)$string, $float, self::POINTER, $thou);
        } else {
            return 0;
        }
    }

    public static function getCount($string)
    {
        return number_format($string, 0, '.', ' ');
    }
}