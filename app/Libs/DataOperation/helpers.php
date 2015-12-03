<?php

function flash($title = null, $message = null){

    $flash = app('App\Libs\DataOperation\Flash');

    if(func_num_args() == 0){
        return $flash;
    }

    return $flash->message($title, $message);

}



function array_value_recursive($key, array $arr){
    $val = array();
    array_walk_recursive($arr, function($v, $k) use($key, &$val){
        if($v == $key) array_push($val, $v);
    });
    return count($val) > 1 ? $val : array_pop($val);
}


function getRoute($separator = '/', $pfx = null, $sfx = null)
{
    $list_routes = ['create', 'edit', 'store', 'index', 'update', 'destroy', 'show'];

    $current = Route::current()->getUri();
    $route = explode('/', $current);

    if(in_array(end($route), $list_routes)) {
        $method = end($route);
        $key = array_search(end($route), $route);
        unset($route[$key]);

        if($method == "edit"){
            $pos = count($route) - 1;
            unset($route[$pos]);
        }
    }

    return $pfx . implode($separator, $route) . $sfx;
}

function getRouteMethod(){
    $list_routes = ['create', 'edit', 'store', 'index', 'update', 'destroy', 'show'];

    $current = Route::current()->getUri();
    $method = explode('/', $current);
    $return = null;

    if(in_array(end($method), $list_routes)){
        $return = end($method);
    }

    return $return;
}


function active_menu_sidebar($array){

    $resultado = array_value_recursive(getRoute(), $array);

    if(!empty($resultado))
        return 'active';

    return '';
}