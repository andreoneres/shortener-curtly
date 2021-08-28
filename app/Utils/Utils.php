<?php

namespace App\Utils;

class Utils {
    /**
     *  Método responsável por retornar uma string aleatória.
     *  @return string
     */
    public static function generateRandomString($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     *  Método responsável por validar a URL recebida.
     *  @return int
     */
    public static function validateUrl($url) {
        $subject = $url;
        $search = 'https://';
        $uri = str_replace($search, '', $subject);

        $subject = $uri;
        $search = 'http://';
        $uri = str_replace($search, '', $subject);

        $url = explode("/", $uri);
        if (fsockopen("{$url[0]}", 80, $errno, $errstr, 30)) {
            return 1;
        } else {
            return 0;
        }
    }

     /**
     *  Método responsável por formatar a URL recebida.
     *  @return string
     */
    public static function formatLink($link) {
        $subject = $link;
        $search = 'http://';
        $link = str_replace($search, 'https://', $subject);

        if (!strpos($link, '://')) {
            $linkformated = 'https://' . $link;
        } else {
            $linkformated = $link;
        }

        return $linkformated;
    }
}