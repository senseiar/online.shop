<?php

return [
    //search
    
    '([a-z]+)/search' => 'search/index',
    'search' => 'search/index',

    'product/([0-9]+)' => 'product/view/$1',
    'catalog' => 'catalog/index',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    
    'category/([0-9]+)' => 'catalog/category/$1',

    
    'news/page-([0-9]+)' => 'news/index/$1',

    
    'comments/addNewComment/([0-9]+)' => 'comments/addNewComment/$1',
    'comments/loadComments/([0-9]+)' => 'comments/loadComments/$1',
    //'news/addNewComment' => 'news/addNewComment',

    
    //user
    'user/signup' => 'user/signup',
    'user/signin' => 'user/signin',
    'user/signout' => 'user/signout',

    //comments managment
    'admin/comments/update/([0-9]+)' => 'adminComments/update/$1',
    'admin/comments/delete/([0-9]+)' => 'adminComments/delete/$1',
    'admin/comments' => 'adminComments/index',

    //news managment
    'admin/news/create' => 'adminNews/create',
    'admin/news/update/([0-9]+)' => 'adminNews/update/$1',
    'admin/news/delete/([0-9]+)' => 'adminNews/delete/$1',
    'admin/news' => 'adminNews/index',
    //product managment
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',
    //category managment
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',
    //orders managment
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    
    //admin panel
    'admin' => 'admin/index',

    //'cart/add/([0-9]+)' => 'cart/add/$1', //action Add in Cart controller sync method
    
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    
    'cart/checkout' => 'cart/checkout',
    'cart'=> 'cart/index',
    
    //news blog
    

    'news/([0-9]+)' => 'news/view/$1',
    'news' => 'news/index',
    

    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    
    'contacts' => 'site/contact',

    

    //
    '^/*$' => 'site/index',
];