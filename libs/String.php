<?php 

Class String
{
    public static function end_with($str, $search)
    {
        return substr($str, -strlen($search)) === $search;
    }

     

    /**
     * Determine if a given string starts with a given substring.
     *
     * @param  string  $haystack
     * @param  string  $needles
     * @return bool
     */
    public static function start_with($str, $serach)
    {
        return $serach != '' && strpos($haystack, $serach) === 0;
    }


        /**
     * Return the length of the given string.
     *
     * @param  string  $value
     * @return int
     */
    public static function length($value)
    {
        return mb_strlen($value);
    }

        /**
     * Convert the given string to lower-case.
     *
     * @param  string  $value
     * @return string
     */
    public static function lower($value)
    {
        return mb_strtolower($value);
    }

        /**
     * Determine if a given string contains a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     */
    // public static function contains($haystack, $needles)
    // {
    //     foreach ((array) $needles as $needle) {
    //         if ($needle != '' && strpos($haystack, $needle) !== false) {
    //             return true;
    //         }
    //     }

    //     return false;
    // }


    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param  int  $length
     * @return string
     *
     * @throws \RuntimeException
     */
    // public static function random($length = 16)
    // {
    //     $string = '';

    //     while (($len = strlen($string)) < $length) {
    //         $size = $length - $len;

    //         $bytes = static::randomBytes($size);

    //         $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
    //     }

    //     return $string;
    // }

      /**
     * Generate a "random" alpha-numeric string.
     *
     * Should not be considered sufficient for cryptography, etc.
     *
     * @param  int  $length
     * @return string
     */
    // public static function quickRandom($length = 16)
    // {
    //     $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    //     return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    // }

        /**
     * Convert the given string to upper-case.
     *
     * @param  string  $value
     * @return string
     */
    // public static function upper($value)
    // {
    //     return mb_strtoupper($value);
    // }

     /**
     * Convert the given string to title case.
     *
     * @param  string  $value
     * @return string
     */
    // public static function title($value)
    // {
    //     return mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
    // }


    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $title
     * @param  string  $separator
     * @return string
     */
    // public static function slug($title, $separator = '-')
    // {
    //     $title = static::ascii($title);

    //     // Convert all dashes/underscores into separator
    //     $flip = $separator == '-' ? '_' : '-';

    //     $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);

    //     // Remove all characters that are not the separator, letters, numbers, or whitespace.
    //     $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));

    //     // Replace all separator characters and whitespace by a single separator
    //     $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

    //     return trim($title, $separator);
    // }

    /**
     * Convert a string to snake case.
     *
     * @param  string  $value
     * @param  string  $delimiter
     * @return string
     */
    // public static function snake($value, $delimiter = '_')
    // {
    //     $key = $value.$delimiter;

    //     if (isset(static::$snakeCache[$key])) {
    //         return static::$snakeCache[$key];
    //     }

    //     if (!ctype_lower($value)) {
    //         $value = strtolower(preg_replace('/(.)(?=[A-Z])/', '$1'.$delimiter, $value));
    //     }

    //     return static::$snakeCache[$key] = $value;
    // }

    // public static function studly($value)
    // {
    //     $key = $value;

    //     if (isset(static::$studlyCache[$key])) {
    //         return static::$studlyCache[$key];
    //     }

    //     $value = ucwords(str_replace(['-', '_'], ' ', $value));

    //     return static::$studlyCache[$key] = str_replace(' ', '', $value);
    // }

    static public function has($str, $search)
    {
        if ($search !== '')
        {
            return (strpos($str, $search) !== false);
        }

        return False;
    }


}