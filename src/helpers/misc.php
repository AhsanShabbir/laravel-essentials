<?php

if(! function_exists('anchor')){
    /**
     * Generate anchor tag
     *
     * @param string $text
     * @param string $url
     * @param string $class
     * @param string $type
     * @param string $target
     * @return string
     */
    function anchor(string $text, string $url, string $class = '', string $type="link", string $target = '_self'): string
    {
        if($type == 'button')
            {
                return "<a href='".$url."' role='button' class='$class' target='".$target."'>".$text."</a>";
            }

        return "<a href='".$url."' class='".$class."' target='".$target."'>".$text."</a>";
    }
}

if(! function_exists('slugify')){
    /**
     * Convert string to slug
     *
     * @param string $text
     * @return string
     */
    function slugify(string $text): string
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return '';
        }
        return $text;
    }

}

if(! function_exists('getCurrentRouteName')){
    /**
     * Get Current Route Name
     *
     * @return string
     */
    function getCurrentRouteName(): ?string
    {
        return request()->route()->getName();
    }
}

if(! function_exists('qr_code')){
/**
 * Generate QR Code
 *
 * @param string $text
 * @param integer $size
 * @param string $type
 * @return string
 */
function qr_code(string $text, $size = 150, $type = "imagetag") : string{
    $url = "https://api.qrserver.com/v1/create-qr-code/?size=".$size."x".$size."&data=".$text;
    if($type == "imagetag"){
        return "<img src='".$url."' alt='QR Code' />";
    }
    return $url;
}
}

if(! function_exists('isLocalHost')){
    /**
     * Check if the current host is localhost
     *
     * @return boolean
     */
    function isLocalhost(): bool
    {
        $list = array('127.0.0.1', '::1');
        $host = $_SERVER['REMOTE_ADDR'];
        if (in_array($host, $list) || strpos($host, '.test') !== false) {
            // local
            return true;
        } else {
            //production
            return false;
        }
    }

}


if(! function_exists('isProduction')){
    /**
     * Check if the current host is production
     *
     * @return boolean
     */
    function isProduction(): bool
    {
        return config('APP_ENV') == 'production';
    }
}

