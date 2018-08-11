<?php

/**
 * Created by PhpStorm.
 * User: Vasiliy
 * Date: 26.07.2018
 * Time: 19:33
 *
 *
 * JS Part:
 * var d = new Date();
 * var utcOffset = d.getTimezoneOffset();
 * $.cookie('UTC_OFFSET', utcOffset, { expires: 7 });
 */
class Timezone {
    public static function getServerUTCOffset() {
        return date("Z", time());
    }

    public static function getOffset() {
        $serverUTCOffset = (int)self::getServerUTCOffset();
        $clientUTCOffset = (int)$_COOKIE['UTC_OFFSET'] * 60;

        return $serverUTCOffset - $clientUTCOffset;
    }

    public static function date($format, $time) {
        $offset = self::getOffset();

        $modifiedTime = $time + $offset;

        return date($format, $modifiedTime);
    }
}
