<?php

class SummToText
{
    /**
     * Возвращает сумму прописью
     *
     */
    public function num2str($num, $count = false)
    {
        $null = 'ноль';
        $ten = array(
            array('', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
            array('', 'одна', 'две', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
        );

        if ($count === true) {
            $ten = array(
                array('', 'одна', 'две', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
                array('', 'одна', 'две', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
            );
        }

        $a20 = array(
            'десять',
            'одиннадцать',
            'двенадцать',
            'тринадцать',
            'четырнадцать',
            'пятнадцать',
            'шестнадцать',
            'семнадцать',
            'восемнадцать',
            'девятнадцать'
        );

        $tens = array(
            2 => 'двадцать',
            'тридцать',
            'сорок',
            'пятьдесят',
            'шестьдесят',
            'семьдесят',
            'восемьдесят',
            'девяносто'
        );

        $hundred = array(
            '',
            'сто',
            'двести',
            'триста',
            'четыреста',
            'пятьсот',
            'шестьсот',
            'семьсот',
            'восемьсот',
            'девятьсот'
        );

        $unit = array(
            array('копейка', 'копейки', 'копеек', 1),
            array('рубль', 'рубля', 'рублей', 0),
            array('тысяча', 'тысячи', 'тысяч', 1),
            array('миллион', 'миллиона', 'миллионов', 0),
            array('миллиард', 'милиарда', 'миллиардов', 0),
        );

        if ($count === true) {
            $unit = array(
                array('копейка', 'копейки', 'копеек', 1),
                array('штука', 'штуки', 'штук', 0),
                array('тысяча', 'тысячи', 'тысяч', 1),
                array('миллион', 'миллиона', 'миллионов', 0),
                array('миллиард', 'милиарда', 'миллиардов', 0),
            );
        }

        list($rub, $kop) = explode('.', sprintf("%015.2f", floatval($num)));
        $out = array();
        if (intval($rub) > 0) {
            foreach (str_split($rub, 3) as $uk => $v) {
                if (!intval($v)) {
                    continue;
                }
                $uk = sizeof($unit) - $uk - 1;
                $gender = $unit[$uk][3];
                list($i1, $i2, $i3) = array_map('intval', str_split($v, 1));

                $out[] = $hundred[$i1];
                if ($i2 > 1) {
                    $out[] = $tens[$i2] . ' ' . $ten[$gender][$i3];
                } else {
                    $out[] = $i2 > 0 ? $a20[$i3] : $ten[$gender][$i3];
                }

                if ($uk > 1) {
                    $out[] = $this->_morph($v, $unit[$uk][0], $unit[$uk][1], $unit[$uk][2]);
                }
            }
        } else {
            $out[] = $null;
        }

        $out[] = $this->_morph(intval($rub), $unit[1][0], $unit[1][1], $unit[1][2]); // рублей
        if ($count === false) {
            $out[] = $kop . ' ' . $this->_morph($kop, $unit[0][0], $unit[0][1], $unit[0][2]); // копеек
        }

        return trim(preg_replace('/ {2,}/', ' ', join(' ', $out)));
    }

    /**
     * Склоняем словоформу
     *
     */
    private function _morph($n, $f1, $f2, $f5)
    {
        $n = abs(intval($n)) % 100;
        if ($n > 10 && $n < 20) {
            return $f5;
        }

        $n = $n % 10;
        if ($n > 1 && $n < 5) {
            return $f2;
        }

        if ($n == 1) {
            return $f1;
        }

        return $f5;
    }

    /**
     * Приведение веса к виду "0 кг 0 гр"
     *
     * @param $weight
     *
     * @return string
     */
    public function weight($weight)
    {
        $kg = 0;
        $gr = $weight;
        if ($weight >= 1000) {
            $kg = floor($weight / 1000);
            $gr = $weight - ($kg * 1000);
        }

        $str = $kg . ' кг ' . $gr . ' гр';

        return $str;
    }

    /**
     * Приведение суммы к виду "0 руб. 0 коп."
     *
     * @param $summ
     *
     * @return string
     */
    public function summ($summ)
    {
        $arr = explode('.', $summ);
        $str = $arr[0] . ' руб. ' . $arr[1] . ' коп.';

        return $str;
    }

    public function getMonth($month)
    {
        $array = array();
    }
}