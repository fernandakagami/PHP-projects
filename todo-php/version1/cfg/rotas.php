<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\RaizControlador#index',
    ],
    // REST
    '/tarefas' => [
        'GET' => '\Controlador\TarefaControlador#index',
        'POST' => '\Controlador\TarefaControlador#armazenar',
    ],
    // REST
    '/tarefas/?' => [
        'GET' => '\Controlador\TarefaControlador#mostrar',
        'PATCH' => '\Controlador\TarefaControlador#atualizar',
        'DELETE' => '\Controlador\TarefaControlador#destruir',
    ],    
    // NÃO INCLUSO NO REST
    '/tarefas/?/editar' => [
        'GET' => '\Controlador\TarefaControlador#editar',
    ],
];
