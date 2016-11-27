<?php
namespace Tools;

/**
 * Class Text
 *
 * git test
 *
 * @package Vinyl\Tools
 */
final class Text
{
    /**
     * Camelizes string
     *
     * @param   string $input A string to camelize
     * @return  string   Returns Camelized string
     */
    public static function camelize($input)
    {
        return preg_replace_callback('/(_|^)([^_]+)/', function ($c) {
            return ucfirst(strtolower($c[2]));
        }, $input);
    }

    /**
     * Decamelizes a string
     *
     * @param   string $str A string
     * @return  string    Returns decamelized string
     */
    public static function decamelize($str)
    {
        return strtolower(preg_replace_callback('/([a-z])([A-Z]+)/', function ($m) {
            return $m[1] . '_' . $m[2];
        }, $str));
    }

    /**
     * Convert cyrillic to latin
     *
     * Input: "текст по-русски";
     * Will generate: "tekst-po-russki"
     *
     * @param $str
     * @return string
     */
    public static function ru2lat($str)
    {
        $str = trim($str);
        $tr = [
            "А" => "a",
            "Б" => "b",
            "В" => "v",
            "Г" => "g",
            "Д" => "d",
            "Е" => "e",
            "Ё" => "yo",
            "Ж" => "zh",
            "З" => "z",
            "И" => "i",
            "Й" => "j",
            "К" => "k",
            "Л" => "l",
            "М" => "m",
            "Н" => "n",
            "О" => "o",
            "П" => "p",
            "Р" => "r",
            "С" => "s",
            "Т" => "t",
            "У" => "u",
            "Ф" => "f",
            "Х" => "kh",
            "Ц" => "ts",
            "Ч" => "ch",
            "Ш" => "sh",
            "Щ" => "sch",
            "Ъ" => "",
            "Ы" => "y",
            "Ь" => "",
            "Э" => "e",
            "Ю" => "yu",
            "Я" => "ya",
            "а" => "a",
            "б" => "b",
            "в" => "v",
            "г" => "g",
            "д" => "d",
            "е" => "e",
            "ё" => "yo",
            "ж" => "zh",
            "з" => "z",
            "и" => "i",
            "й" => "j",
            "к" => "k",
            "л" => "l",
            "м" => "m",
            "н" => "n",
            "о" => "o",
            "п" => "p",
            "р" => "r",
            "с" => "s",
            "т" => "t",
            "у" => "u",
            "ф" => "f",
            "х" => "kh",
            "ц" => "ts",
            "ч" => "ch",
            "ш" => "sh",
            "щ" => "sch",
            "ъ" => "",
            "ы" => "y",
            "ь" => "",
            "э" => "e",
            "ю" => "yu",
            "я" => "ya",
            "." => "",
            "*" => "",
            '"' => "",
            "," => "",
            ":" => "",
            ";" => "",
            "(" => "",
            ")" => "",
            "—" => "",
            "/" => "",
            "%" => "",
            "?" => "",
            "!" => "",
            " " => "-",
        ];

        return $text = preg_replace('|([-]+)|s', '-', strtr($str, $tr));
    }

    /**
     * @param $email
     * @return bool
     */
    public static function isEmailValid($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $string
     * @return mixed
     */
    public static function removeSpaces($string)
    {
        $string = preg_replace('/\s+/', '', $string);

        return str_replace(' ', '', $string);
    }

    /**
     * @param $link
     * @return mixed
     */
    public static function prepareUrl($link)
    {
        return preg_replace('/[^a-zA-Z0-9\-]/', '', $link);
    }

    /**
     * @param $url
     * @return bool
     */
    public static function isUrlValid($url)
    {
        if (preg_match('/[^a-zA-Z0-9\-\.]/', $url) || empty($url)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $url
     * @return int
     */
    public static function isUrl($url)
    {
        return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
    }

    /**
     * Удалить двойные пробелы
     *
     * @param $str
     * @return mixed
     */
    public static function removeDoubleSpaces($str)
    {
        return preg_replace('/[\s]{2,}/iu', ' ', $str);
    }

    /**
     * Оставить только латинские буквы и цифры
     *
     * @param $word
     * @return mixed
     */
    public static function onlyLatinAndNumbers($word)
    {
        return preg_replace("/[^a-zA-Z0-9]/iu", "", $word);
    }

    /**
     * Оставить только латинские буквы
     *
     * @param $str
     * @return mixed
     */
    public static function onlyLatin($str)
    {
        return preg_replace("/[^a-zA-Z]/iu", "", $str);
    }

    /**
     * Оставить только цифры
     *
     * @param $str
     * @return mixed
     */
    public static function onlyNumbers($str)
    {
        $str = preg_replace("/[^0-9]/iu", "", $str);

        return (int)$str;
    }

    /**
     * @param string $string
     * @return string
     */
    public static function prepareDb($string)
    {
        if (!empty($string)) {
            $string = trim($string);
            $string = stripslashes($string);
            $string = htmlspecialchars($string);
        }

        return $string;
    }
}