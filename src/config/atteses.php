
<?php

use Illuminate\Support\Facades\DB;

// Aca agregamos todos y cada uno de los datos por archivo a exportar
return [
    "users" => [
        "file" => "Usuarios_" . now()->format('Y-m-d'),
        "header" => [
            '#', 'NOMBRE', 'EMAIL', 'ESTADO', 'CLIENTE', 'PROVEEDOR', 'FECHA CREACION'
        ],
        "fields" => DB::table('get_users')->get(),
    ],
];
