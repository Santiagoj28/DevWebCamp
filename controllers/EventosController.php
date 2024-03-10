<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Categorias;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use Model\Ponente;
use MVC\Router;

class EventosController{
    public static function index(Router $router){

        if(!isAdmin()){
            header('location:/login');
        }

        $pagina_actual = $_GET['page'];
        $paginaActual = filter_var($pagina_actual,FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual<1){
            header('location: /admin/eventos?page=1');
        }
        $por_pagina = 8;
        $total = Evento::total();
        $paginacion = new Paginacion($pagina_actual,$por_pagina,$total);
        $eventos = Evento::paginar($por_pagina,$paginacion->offset());

        foreach($eventos as $evento){
            $evento->categoria = Categorias::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente= Ponente::find($evento->ponente_id);
            
        }
        //debuguear($evento);
        $router->render('admin/eventos/index',[
            'titulo' => 'Conferencias y Workshops',
            'eventos'=> $eventos ,
            'paginacion' => $paginacion->paginacion()
        ]);

    }

    public static function crear(Router $router){

        if(!isAdmin()){
            header('location:/login');
        }
        $alertas = [];
        $categorias = Categorias::all();
        $dias= Dia::all('ASC');
        $horas = Hora::all('ASC');
        $evento = new Evento;

        if($_SERVER['REQUEST_METHOD']==='POST'){
            if(!isAdmin()){
                header('location:/login');
            }
            $evento->sincronizar($_POST);
            $alertas = $evento->validar();
          

            if(empty($alertas)){

                $resultado = $evento->guardar();
                if($resultado){
                    header('location:/admin/eventos');
                }

            }
        }
      

        $router->render('admin/eventos/crear',[
            'titulo' => 'Registrar Evento',
            'alertas' => $alertas,
            'categorias'=> $categorias,
            'dias'=> $dias,
            'horas'=> $horas,
            'evento'=> $evento
        ]);

    }

    public static function editar(Router $router){
        if(!isAdmin()){
            header('location:/login');
        }

        $alertas = [];
       
        //validar el id
        $id = $_GET['id'];
        $id = filter_var($id,FILTER_VALIDATE_INT);
        if(!$id){
            header('location:/admin/ponentes');
        }
        $categorias = Categorias::all();
        $dias= Dia::all('ASC');
        $horas = Hora::all('ASC');
        $evento = Evento::find($id);
        if(!$evento){
            header('location:/admin/eventos');
        }

        if($_SERVER['REQUEST_METHOD']==='POST'){
            if(!isAdmin()){
                header('location:/login');
            }
            $evento->sincronizar($_POST);
            $alertas = $evento->validar();
          

            if(empty($alertas)){

                $resultado = $evento->guardar();
                if($resultado){
                    header('location:/admin/eventos');
                }

            }
        }
      

        $router->render('admin/eventos/editar',[
            'titulo' => 'Actualizar Evento',
            'alertas' => $alertas,
            'categorias'=> $categorias,
            'dias'=> $dias,
            'horas'=> $horas,
            'evento'=> $evento
        ]);

    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if(!isAdmin()){
                header('location:/login');
            }
            $id = $_POST['id'];
            $evento = Evento::find($id);
            if(isset($evento)){
                    header('location:/admin/eventos');
            }
            $resultados = $evento->eliminar();
            if($resultados){
                header('location:/admin/eventos');
            }

        }
    
    }


}

