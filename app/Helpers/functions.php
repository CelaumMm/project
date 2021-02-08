<?php

if (!function_exists('formatDateTime')) {
    /**
     *
     * Retorna data Carbon como string no formato 'd/m/Y H:i:s'
     *
     * @param $data
     * @return $string
     *
     */
    function formatDateTime($value, $format = 'd/m/Y H:i:s')
    {
        return Carbon\Carbon::parse($value)->format($format);
    }
}

if (!function_exists('response')) {
    /**
     * @param $data
     * @return void
     */
    function response($data, $code = 200)
    {
        header('Content-type:application/json;charset=utf-8', true, $code);
        echo json_encode($data);
    }
}
