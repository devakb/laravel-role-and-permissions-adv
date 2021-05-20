<?php



function redirectRoute($routeName, $params = null){
    if($params != null){
        return redirect()->route($routeName, $params);
    }else{
        return redirect()->route($routeName);
    }
}

function routeIf($routeName){
    return request()->routeIs($routeName);
}
