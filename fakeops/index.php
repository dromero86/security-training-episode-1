<?php 

$routing           = new stdclass              ; 
$routing->filename = __FILE__                  ;
$routing->hostpath = $_SERVER['BASEPATH'      ];
$routing->baseurl  = $_SERVER['PUBLIC_HOST'   ];
$routing->method   = $_SERVER['REQUEST_METHOD'];
$routing->uri      = $_SERVER['REQUEST_URI'   ];
$routing->input = array();

if( isset($_SERVER['QUERY_STRING']) ){
    $routing->input['GET']=$_SERVER['QUERY_STRING'];
    $routing->uri = str_replace("?".$routing->input['GET'],"",$routing->uri);
    parse_str($routing->input['GET'],$routing->input['GET']);
}

if( !empty($_POST) ){
    $routing->input['POST']=$_POST; 
}

if( !empty($_FILES) ){
    $routing->input['FILES']=$_FILES; 
}

$routing->route= "{$routing->method} {$routing->uri}";
