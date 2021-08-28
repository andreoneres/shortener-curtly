<?php

namespace App\Models;

use App\Database\Database;
use App\Utils\Utils;

class Links {

    /**
     *  Método responsável por inserir o link gerado aleatoriamente no banco.
     *  @return array
     */
    public static function randomlink($originallink) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $data = Date('Y-m-d H:i:s');
        //VERIFICA SE O LINK ORIGINAL JÁ EXISTE NO BANCO
        if (self::checkOriginalLinkExists($originallink) !== 1) {
            //VERIFICA SE A URL A SER ENCURTADA É VÁLIDA
            if (Utils::validateUrl($originallink) == 1) {
                //GERA UMA STRING ALEATÓRIA
                $shortenedlink = Utils::generateRandomString();
                $values = ['original_link' => $originallink, 'shortened_link' => $shortenedlink, 'ip' => $ip, 'date' => $data];
                //CHAMA O MÉTODO PARA INSERIR NO BANCO DE DADOS
                $linke = (new Database("links"))->insert($values);
                if ($linke !== 0) {
                    $message = "Link encurtado com sucesso!";
                } else {
                    $error = "Ocorreu algum erro ao cadastrar. Contate algum administrador.";
                }
            } else {
                $error = "Link inválido. Verifique a URL digitada ou se o site está online.";
            }
        } else {
            $message = "Link encurtado com sucesso!";
            //CASO JÁ EXISTA UM LINK ENCURTADO PARA A URL DIGITADA, RETORNA A DO BANCO
            $shortenedlink = self::getShortenedLink($originallink)['shortened_link'];
        }

        $dados = [
            'originallink' => $originallink,
            'linkshortened' => $shortenedlink,
            'message' => $message,
            'error' => $error
        ];

        return $dados;
    }

    /**
     *  Método responsável por inserir o link personalizado no banco.
     *  @return array
     */
    public static function customlink($originallink, $customlink) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = Date('Y-m-d H:i:s');
        $customlink = str_replace(" ", "", trim($customlink));
        //VERIFICA SE O LINK PERSONALIZADO JÁ EXISTE NO BANCO
        if (self::checkCustomLinkExists($customlink) !== 1) {
            if (!preg_match('/[^a-zA-Z0-9_-]+/', $customlink)) {
                $originallink = Utils::formatLink($originallink);
                // VERIFICA SE A URL A SER ENCURTADA É VÁLIDA
                if (Utils::validateUrl($originallink) == 1) {
                    //VERIFICA SE JÁ EXISTE UM LINK ENCURTADO PARA A URL DIGITADA, CASO NÃO JÁ CRIA UM PARA O LINK
                    if (self::checkShortenedLinkExistsbyOriginal($originallink) !== 1) {
                        $linkrandom = Utils::generateRandomString();
                    } else {
                        $linkrandom = NULL;
                    }
                    $values = ['original_link' => $originallink, 'shortened_link' => $linkrandom, 'custom_link' => $customlink, 'ip' => $ip, 'date' => $date];
                     //CHAMA O MÉTODO PARA INSERIR NO BANCO DE DADOS
                    $shortenedlink = (new Database("links"))->insert($values);
                    if ($shortenedlink !== 0) {
                        $message = "Link encurtado com sucesso!";
                    } else {
                        $error = "Ocorreu algum erro ao cadastrar. Contate algum administrador.";
                    }
                } else {
                    $error = "Link inválido. Verifique a URL digitada ou se o site está online.";
                }
            } else {
                $error = "Link personalizado inválido. Apenas caracteres de <b>a</b> a <b>z</b>, <b>0</b> a <b>9</b>, e <b>-</b> são permitidos.";
            }
        } else {
            $error = "Este link personalizado já existe!";
        }

        $dados = [
            'originallink' => $originallink,
            'linkshortened' => $customlink,
            'message' => $message,
            'error' => $error
        ];

        return $dados;
    }

    /**
     *  Método responsável por verificar se o link original recebido existe.
     *  @return int
     */
    public static function checkOriginalLinkExists($link) {
        $result = (new Database("links"))->select("original_link = '{$link}'", null, null, "original_link");
        return $result ? 1 : 0;
    }

    /**
     *  Método responsável por verificar se o link encurtado recebido existe.
     *  @return int
     */
    public static function checkShortenedLinkExists($link) {
        $result = (new Database("links"))->select("shortened_link = '{$link}'", null, null, "shortened_link");
        return $result ? 1 : 0;
    }

    /**
     *  Método responsável por verificar se o link encurtado recebido existe a partir do link original.
     *  @return int
     */
    public static function checkShortenedLinkExistsbyOriginal($link) {
        $result = (new Database("links"))->select("original_link = '{$link}'", null, null, "shortened_link");
        return $result ? 1 : 0;
    }

     /**
     *  Método responsável por verificar se o link personalizado existe.
     *  @return int
     */
    public static function checkCustomLinkExists($link) {
        $result = (new Database("links"))->select("custom_link = '{$link}'", null, null, "custom_link");
        return $result ? 1 : 0;
    }

    /**
     *  Método responsável por retornar o link original a partir do link encurtado ou personalizado.
     *  @return int
     */
    public static function getOriginalLink($link) {
        $result = (new Database("links"))->select("shortened_link = '{$link}' OR custom_link = '{$link}'", null, null, "original_link");
        return $result[0];
    }

    /**
     *  Método responsável por retornar o link encurtado a partir do link original.
     *  @return int
     */
    public static function getShortenedLink($link) {
        $result = (new Database("links"))->select("original_link = '{$link}'", null, null, "shortened_link");
        return $result[0];
    }

    /**
     *  Método responsável por retornar o link personalizado a partir do link original.
     *  @return int
     */
    public static function getCustomLink($link) {
        $result = (new Database("links"))->select("original_link = '{$link}'", null, null, "custom_link");
        return $result[0];
    }
}