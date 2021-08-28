<?php 

namespace App\Http\Middleware;

use App\Utils\Session;
use App\Utils\Message;

class AuthenticatedUser {

  /**
   * Método resposável por executar o middleware
   * @param   Request  
   * @param   Closure  next
   * @return  Response 
   */
  public function handle($request, $next){
    $user = Session::getUser();
   
    if(empty($user)){
      $request->getRouter()->redirect('/login');
    }

    return $next($request);
  }
}
