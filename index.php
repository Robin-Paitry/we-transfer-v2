<?php
/*****************************************************
* 
* Author :
* Version :
* 
* Description :
* 
*/

include('../env.php');
require_once(ROOT_DIR.'/database/DatabaseConnection.php');

require_once(ROOT_DIR.'/app/Http/Controllers/FormController.php');
require_once(ROOT_DIR.'/app/Http/Controllers/UploadController.php');

FormController\index();

if (isset($_POST['message'])){

    $lastId = FormController\store($conn);

    FormController\show();
    UploadController\store($conn, $lastId);



}