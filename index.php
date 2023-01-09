<?php
session_start();

use Core\Router;

require_once 'vendor/autoload.php';

spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'Core') === false)
        return;
    $class_name = str_replace("\\", '/', $class_name); // \\ = \
    $file_path = __DIR__ . "/" . $class_name . ".php";
    require_once $file_path;
});

//==============Login Form===================
Router::get('/', 'login.login'); 
Router::get('/logout', "login.logout"); 
Router::get('/userProfileInfo', "users.pro"); 
Router::post('/login', "login.validate"); 
//==============Login Form===================
Router::get('/dashboard', "admin.firstview"); 
Router::get('/users', "users.firstview"); 
Router::get('/getUser', "users.getUser"); 
Router::get('/users/get', "users.getall"); 
Router::post('/users/createuser', "users.createuser"); 
Router::post('/users/updateuser', "users.updateUser"); 
Router::post('/users/deleteuser', "users.deleteuser");
Router::get('/store', "store.firstview"); 
Router::get('/store/getitems', "store.getitems"); 
Router::post('/store/createitems', "store.createitems");
Router::post('/store/updateitems', "store.updateitems");
Router::post('/store/deleteitems', "store.deleteitems"); 
Router::get('/selling', "selling.firstview"); 
Router::get('/selling/item', "store.bcode");
Router::get('/userprofile', "profile.getdata"); 
Router::post('/updateprofile', "profile.updateprofile"); 
Router::post('/carts/createcarts', "carts.createcarts");
Router::post('/carts/createcarts/item', "carts.addcarts");
Router::get('/carts/getitems', "carts.getitems");
Router::get('/carts', "carts.barcode");
Router::post('/carts/end', "carts.end");
Router::post('/carts/delete', "carts.delete");
Router::get('/trans', "trans.firstview");
Router::get('/trans/item', "trans.items");
Router::post('/trans/update', "trans.update");
Router::post('/trans/delete', "trans.delete");
Router::redirect();
