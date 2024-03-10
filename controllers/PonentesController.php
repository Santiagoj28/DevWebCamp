<?php

namespace Controllers;

use Classes\Paginacion;
use  Intervention\Image\ImageManagerStatic as Image;
use Model\Ponente;
use MVC\Router;

class PonentesController{
    public static function index(Router $router){

        //pagina actual
        $pagina_actual = $_GET['page']; 
        $pagina_actual = filter_var($pagina_actual,FILTER_VALIDATE_INT);
        
        if(!$pagina_actual || $pagina_actual < 1){
            header('location:/admin/ponentes?page=1');
        }
        $registro_pagina = 5;
        
        $total = Ponente::total();
        $paginacion = new Paginacion($pagina_actual,$registro_pagina,$total);
        
        if($paginacion->totalPagina() < $pagina_actual){
            header('location:location:/admin/ponentes?page=1');
        }

        //traer el todos los registros paginados
        $ponente = Ponente::paginar($registro_pagina,$paginacion->offset());
       //PROTEGER
        if(!isAdmin()){
            header('location:/login');
        }
     
        $router->render('admin/ponentes/index',[
            'titulo' => 'Ponentes / Conferencistas',
            'ponentes'=> $ponente,
            'paginacion'=> $paginacion->paginacion()
        ]);

    }

    public static function crear(Router $router){
        $alertas = [];
        $ponente = new Ponente();
        
        if(!isAdmin()){
            header('location:/login');
        }

        if($_SERVER['REQUEST_METHOD']==='POST'){
            
            if(!isAdmin()){
                header('location:/login');
            }
            //leer imagen 
            if(!empty($_FILES['imagen']['tmp_name'])){
                $carpeta_imagenes = "../public/img/speakers";
                
                //crear la carpeta si no exite

                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes,0755,true);
                }
                $imagen_png= Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png',80); 
                $imagen_webp= Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png',80);
                $nombre_imagen = md5( uniqid( rand(),true ) );

                $_POST['imagen']= $nombre_imagen;
            }
           
            $_POST['redes'] = json_encode( $_POST['redes'],JSON_UNESCAPED_SLASHES);
            
            $ponente->sincronizar($_POST);

            //validar alertas 
             $alertas = $ponente->validar();

             //buscar el registro
             if(empty($alertas)){
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');

                //guardar en la db
                $resultado = $ponente->guardar();
                if($resultado){
                    header('location:/admin/ponentes');
                }

             }

        }

        $router->render('admin/ponentes/crear',[
            'titulo' => 'Registrar Ponente',
            'alertas'=> $alertas ,
            'ponente'=>$ponente,
            'redes' => json_decode($ponente->redes)
        ]);

    }
    
    public static function editar(Router $router ){
        $alertas = [];
        
        if(!isAdmin()){
            header('location:/login');
        }
        //validar el id
        $id = $_GET['id'];
        $id = filter_var($id,FILTER_VALIDATE_INT);
        if(!$id){
            header('location:/admin/ponentes');
        }
        //obtener el ponente a editar
        $ponente = Ponente::find($id);
        if(!$ponente){
            header('location:/admin/ponentes');
        }
        $ponente->imagen_actual = $ponente->imagen;
        $redes = json_decode($ponente->redes);

        if($_SERVER['REQUEST_METHOD']==='POST'){
            
            if(!isAdmin()){
                header('location:/login');
            }
             //leer imagen 
             if(!empty($_FILES['imagen']['tmp_name'])){
                $carpeta_imagenes = "../public/img/speakers";
                
                //crear la carpeta si no exite

                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes,0755,true);
                }
                $imagen_png= Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png',80); 
                $imagen_webp= Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png',80);
                $nombre_imagen = md5( uniqid( rand(),true ) );

                $_POST['imagen']= $nombre_imagen;
            }else{
                $_POST['imagen']= $ponente->imagen_actual;
            }
            $_POST['redes'] = json_encode( $_POST['redes'],JSON_UNESCAPED_SLASHES);
            $ponente->sincronizar($_POST);
            $alertas = $ponente->validar();

            if(empty($alertas)){
                if(isset($nombre_imagen)){
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');
                }
                $resultado = $ponente->guardar();
                if($resultado){
                    header('location:/admin/ponentes');
                }
            }

        }
        
        
        

        $router->render('admin/ponentes/editar',[
            'titulo' => 'Editar Ponente',
            'ponente'=> $ponente ?? null , 
            'alertas'=> $alertas,
            'redes' => $redes
         ]);

    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if(!isAdmin()){
                header('location:/login');
            }
            $id = $_POST['id'];
            $ponente = Ponente::find($id);
            if(isset($ponente)){
                    header('location:/admin/ponentes');
            }
            $resultados = $ponente->eliminar();
            if($resultados){
                header('location:/admin/ponentes');
            }
        }


    }


}