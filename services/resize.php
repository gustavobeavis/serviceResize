<?php
/**
 * Created by PhpStorm.
 * User: gustavo
 * Date: 4/1/14
 * Time: 10:46 PM
 */
header('Content-Type: application/json');
if($_REQUEST['file']){

    include_once "../class/ImageGenerate.php";
    if(file_exists($_REQUEST['file'])){
        $teste = new imageGenerate($_REQUEST['file']);
        $width = (isset($_REQUEST['width']))? $_REQUEST['width'] : 160;
        $height = (isset($_REQUEST['height']))? $_REQUEST['height'] : 160;
        $teste->resize($width,$height)
              ->save('../image/destination/'.end(explode("/", $_REQUEST['file'])));
        echo json_encode(array(
            'status'    =>  'OK',
            'msg'       =>   utf8_encode('Image save on '.'image/destination/'.end(explode("/", $_REQUEST['file'])))
        ), true);

    } else {
        echo json_encode(array(
            'status'    =>  'ERROR',
            'msg'       =>  utf8_encode('picture does not exist')
        ), true);
    }


} else {
    echo json_encode(array(
        'status'    =>  'ERROR',
        'msg'       =>  utf8_encode('not sent parameter')
    ), true);
}