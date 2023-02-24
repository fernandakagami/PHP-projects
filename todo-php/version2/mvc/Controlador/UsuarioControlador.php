<?php
namespace Controlador;

use \Modelo\Usuario;

class UsuarioControlador extends Controlador
{
    public function criar()
    {
        $this->visao('usuarios/criar.php');
    }

    public function armazenar()
    {
        $usuario = new Usuario($_POST['email'], $_POST['senha']);
        $exist = $usuario->buscarEmail($usuario->getEmail()) ? true : false;
        if ($usuario->isValido() && !$exist) {
            $usuario->salvar();
            $this->redirecionar(URL_RAIZ);
        } else {     
            $this->setErros($usuario->getValidacaoErros());
            $this->visao('usuarios/criar.php');
        }            
    }
}
