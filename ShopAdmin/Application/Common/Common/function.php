<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/10/31
 * Time: 17:10
 */
function showErrors($suppliermodel)
{
    $errors = $suppliermodel->getError();
    $res = '<ul>';
    if(is_array($errors)){
        foreach ($errors as $error) {
            $res .= "<li>{$error}</li>";
        }
    }else{
        $res .= "<li>{$errors}</li>";
    }
    $res .= '</ul>';
    return $res;
}