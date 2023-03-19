<?php
    function format_length($str, $max_length) {
        $str = trim($str);
        if (strlen($str) > $max_length) {
            return substr($str, 0, $max_length) . '...' ;
        }
        return $str;
    }

    function getCurrent() {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $current = date('Y-m-d H:i:s');
        return $current;
    }
    getCurrent();
    function format_date($date) {
        // Format date/time from Y:M:D H:I:S --> D:M:Y
        $mdy = date('M d, Y', strtotime($date));
        return $mdy;
    }

    function formatTime($time) {
        $hm = date('H:m', strtotime($time));
        return $hm;
    }

    function format_date_time($dt) {
        $res = date_format(date_create($dt), 'H:m -- M d, Y');
        return $res;
    }

    function format_currency($currency) {
        return number_format(floatval($currency), 0, '', '.');
    }
?>