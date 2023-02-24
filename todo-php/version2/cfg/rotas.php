<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\RaizControlador#index',
    ],
    '/login' => [
        'GET' => '\Controlador\LoginControlador#criar',
        'POST' => '\Controlador\LoginControlador#armazenar',
        'DELETE' => '\Controlador\LoginControlador#destruir',
    ],
    '/usuarios' => [
        'POST' => '\Controlador\UsuarioControlador#armazenar',
    ],
    '/usuarios/criar' => [
        'GET' => '\Controlador\UsuarioControlador#criar',
    ],
    '/tarefas' => [
        'GET' => '\Controlador\TarefaControlador#listar',
        'POST' => '\Controlador\TarefaControlador#armazenar',
    ],       
    '/tarefas/?' => [        
        'PATCH' => '\Controlador\TarefaControlador#atualizar',
        'DELETE' => '\Controlador\TarefaControlador#destruir',
    ],    
    // NÃO INCLUSO NO REST
    '/tarefas/?/editar' => [
        'GET' => '\Controlador\TarefaControlador#editar',
    ],
];
