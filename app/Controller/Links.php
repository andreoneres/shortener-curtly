<?php

namespace App\Controller;

use App\Models\Links as Link;
use App\Controller\Page;
use App\Utils\Utils;
use App\Utils\AppException;
use App\Utils\Session;

class Links extends Page {

    /**
     *  Método responsável por validar o link enviado pelo usuário.
     *  @return string
     */
    public static function validateLink($post) { 
        $post->originallink = Utils::formatLink($post->originallink);

        if(isset($post->iduser)) {
            if(Link::checkLinkExistsByUser($post) == 1) {
                throw new AppException('Este link já se encontra encurtado em sua conta!', 409);
            }
        }

        if(strlen($post->customlink)) {
            if(strlen($post->customlink) < 2 || strlen($post->customlink) > 12 ) {
                throw new AppException('Tamanho do link personalizado inválido! Ele deve possuir mais de 2 caracteres e menos que 12 caracteres.', 409);
            }

            if (Link::checkLinkExists($post->customlink) == 1) {
                throw new AppException('Este link personalizado já existe!', 409);
            } 
            if (preg_match('/[^a-zA-Z0-9_-]+/', $post->customlink)) {
                throw new AppException('Link personalizado inválido. Apenas caracteres de A a Z, 0 a 9, e - são permitidos.', 406);
            }
            
            $post->customlink = str_replace(" ", "", trim($post->customlink));
        }

        if (!preg_match('/[^a-zA-Z0-9_-]+/', $post->originallink)) {
            throw new AppException('Link inválido. Apenas caracteres de A a Z, 0 a 9, e - são permitidos.', 406);
        }

        if ($post->originallink == "" || !strpos($post->originallink, '.') || Utils::validateUrl($post->originallink) == 0) {
            throw new AppException('Link inválido. Verifique a URL digitada ou se o site está online.', 406);
        } else {
            $data = 1;
        }

        if(isset($error)) {
            $data = [
                'error' => $error
            ];
        }  
    
        return $data;
    }

    /**
     *  Método responsável por encurtar um novo link.
     *  @return array
     */
    public static function createLink($request) {
        $post = $request->getPostVars();
        $validate = self::validateLink($post);

        if($validate == 1) {
            $data = Link::createLink($post);
        } 

        return $data;
    }

    /**
     *  Método responsável por editar um determinado link.
     *  @return array
     */
    public static function updateLink($request) {
        $post = $request->getPostVars();

        if(strlen($post->customlink)) {
            if (preg_match('/[^a-zA-Z0-9_-]+/', $post->customlink)) {
                throw new AppException('Link personalizado inválido. Apenas caracteres de A a Z, 0 a 9, e - são permitidos.', 406);
            }

            $post->customlink = str_replace(" ", "", trim($post->customlink));

        } 
        
        $data = Link::updateLink($post);

        return $data;
    }

    /**
     *  Método responsável por deletar um determinado link.
     *  @return array
     */
    public static function deleteLink($request) {
        $post = $request->getPostVars();

        $iduser = $post->iduser;
        $idlink = $post->idlink;
        $data = Link::deleteLink($idlink, $iduser);

        return $data;
    }

    /**
     *  Método responsável por inserir um click ao link encurtado que foi acessado.
     *  @return null
     */
    public static function insertClick($link) {
        $data = Link::insertClick($link);
    }

    /**
     *  Método responsável por pesquisar links a partir da busca do usuário.
     *  @return null
     */
    public static function searchLink($request) {
        $params = $request->getQueryParams();
        $post = $request->getPostVars();
        $user = Session::getUser();

        if(strlen($params['search'])) {
            $data = Link::searchLink($post, $params['search']);
        } else if(is_null($params['search'])) {
            $data = self::getLinksByUser($user, $post);
            throw new AppException('Nada foi encontrado para a pesquisa.', 404);
        } else {
            $data = self::getLinksByUser($user['ID_USER'], $post);
        }

        return $data;
    }

    /**
     *  Método responsável por verificar se um link já existe no banco.
     *  @return int
     */
    public static function checkLinkExists($link) {
        return Link::checkLinkExists($link);
    }

    /**
     *  Método responsável por retornar a expiração de um link, caso exista.
     *  @return string
     */
    public static function getExpirationLink($link) {
        return Link::getExpirationLink($link);
    }

    /**
     *  Método responsável por verificar se o link já foi encurtado pelo usuário.
     *  @return int
     */
    public static function checkLinkExistsInUser($link) {
        return Link::checkLinkExistsInUser($link);
    }

   /**
     *  Método responsável por verificar se o link não foi encurtado pelo usuário.
     *  @return int
     */
    public static function checkLinkExistsNotInUser($link) {
        return Link::checkLinkExistsNotInUser($link);
    }

    /**
     *  Método responsável por verificar se o link já foi encurtado pelo usuário.
     *  @return int
     */
    public static function checkLinkExistsByUser($post) {
        return Link::checkLinkExistsByUser($post);
    }

    /**
     *  Método responsável por retornar um link a partir do seu ID.
     *  @return array
     */
    public static function getLinkById($idlink) {
        $result = Link::getLinkById($idlink);
        return $result;
    }

     /**
     *  Método responsável por retornar os links encurtados de um usuário.
     *  @return array
     */
    public static function getLinksByUser($post) {
        return Link::getLinksByUser($post);
    }

    /**
     *  Método responsável por retornar o link original a partir do link encurtado ou personalizado.
     *  @return string
     */
    public static function getOriginalLink($link) {
        return Link::getOriginalLink($link);
    }

    /**
     *  Método responsável por retornar o link encurtado a partir do link original.
     *  @return string
     */
    public static function getShortenedLink($link) {
        return Link::getShortenedLink($link);
    }

    /**
     *  Método responsável por retornar o link encurtado que não está ligado a nenhum usuário.
     *  @return string
     */
    public static function getShortenedLinkNotUser($link) {
        return Link::getShortenedLinkNotUser($link);
    }

    /**
     *  Método responsável por retornar o link personalizado a partir do link original.
     *  @return string
     */
    public static function getCustomLink($link) {
        return Link::getCustomLink($link);
    }
}