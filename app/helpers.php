<?php

function format_money($money)
{
    if(!$money) {
        return "\$0.00";
    }

    $money = number_format($money, 2);

    if(strpos($money, '-') !== false) {
        $formatted = explode('-', $money);
        return "-\$$formatted[1]";
    }

    return "\$$money";
}