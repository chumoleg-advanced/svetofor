<?php

class MyString
{
    /**
     * Метод для обрезания строки до нужного кол-ва символов по словам
     *
     * @param string $string - Исходная строка
     * @param int    $maxLen - Кол-во символов
     *
     * @return string - Урезанная строка
     */
    public static function cutString($string, $maxLen)
    {
        $len = (mb_strlen($string) > $maxLen) ? mb_strripos(mb_substr($string, 0, $maxLen), ' ') : $maxLen;
        $cutStr = mb_substr($string, 0, $len);

        return (mb_strlen($string) > $maxLen) ? $cutStr . '' : $cutStr;
    }

    public static function cutStringSymbols($string, $maxLen)
    {
        return mb_substr($string, 0, $maxLen, 'UTF-8');
    }

    /**
     * Транслитерация строки
     *
     * @param string $string - исходная строка
     *
     * @return string - преобразованная строка
     */
    public static function translate($string)
    {
        $string = self::cutString($string, 60);

        $string = preg_replace('/[^a-zа-яё]+/iu', '_', $string);
        if (substr($string, -1) == '_') {
            $string = preg_replace("/(.*).$/", "\\1", $string);
        }

        $simplePairs = array(
            'а' => 'a',
            'л' => 'l',
            'у' => 'u',
            'б' => 'b',
            'м' => 'm',
            'т' => 't',
            'в' => 'v',
            'н' => 'n',
            'ы' => 'y',
            'г' => 'g',
            'о' => 'o',
            'ф' => 'f',
            'д' => 'd',
            'п' => 'p',
            'и' => 'i',
            'р' => 'r',
            'А' => 'A',
            'Л' => 'L',
            'У' => 'U',
            'Б' => 'B',
            'М' => 'M',
            'Т' => 'T',
            'В' => 'V',
            'Н' => 'N',
            'Ы' => 'Y',
            'Г' => 'G',
            'О' => 'O',
            'Ф' => 'F',
            'Д' => 'D',
            'П' => 'P',
            'И' => 'I',
            'Р' => 'R',
            'з' => 'z',
            'ц' => 'c',
            'к' => 'k',
            'ж' => 'zh',
            'ч' => 'ch',
            'х' => 'kh',
            'е' => 'e',
            'с' => 's',
            'ё' => 'jo',
            'э' => 'eh',
            'ш' => 'sh',
            'й' => 'jj',
            'щ' => 'shh',
            'ю' => 'ju',
            'я' => 'ja',
            'З' => 'Z',
            'Ц' => 'C',
            'К' => 'K',
            'Ж' => 'ZH',
            'Ч' => 'CH',
            'Х' => 'KH',
            'Е' => 'E',
            'С' => 'S',
            'Ё' => 'JO',
            'Э' => 'EH',
            'Ш' => 'SH',
            'Й' => 'JJ',
            'Щ' => 'SHH',
            'Ю' => 'JU',
            'Я' => 'JA',
            'Ь' => '',
            'Ъ' => '',
            'ъ' => '',
            'ь' => ''
        );

        $string = strtr($string, $simplePairs);

        if (!empty($string)) {
            return $string;

        } else {
            return 'shop';
        }
    }

    /**
     * Возвращает очищенную строку (оставляет буквы, цифры, _ и пробелы')
     *
     * @param string $url - URL
     *
     * @return string
     */
    public static function clearUrl($url)
    {
        return preg_replace('/[^\w\s\'_]/u', ' ', $url);
    }

}