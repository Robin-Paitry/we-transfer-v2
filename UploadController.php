<?php
/*****************************************************
* 
* Author :
* Version :
* 
* Description : Upload des fichiers
*  
* 
*/

namespace UploadController;

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
function index()
{
    //
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
function create()
{
    //
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
function store($conn, $lastId)
{

    if(  isset($_FILES['userfile'])   ){
        $directory = ROOT_DIR .'/public/upload/'. basename($_FILES['userfile']['name']);
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $directory)) {

            $url_image = basename($_FILES['userfile']['name']);
            $stmt = $conn->prepare("INSERT INTO `fichiers` (`url_image`, `exp_id`) VALUES ('$url_image', '$lastId');");
            $stmt->execute();
            $message_transaction = "SUCCES";
        } else {
            $message_transaction = "ERREUR";
        }
    }

    require(ROOT_DIR.'/resources/views/store.html.php');

}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
function show($id)
{
    //
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
function edit($id)
{
    //
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
function update(Request $request, $id)
{
    //
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
function destroy($id)
{
    //
}

