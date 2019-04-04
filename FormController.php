<?php
/*****************************************************
* 
* Author :
* Version :
* 
* Description : Creation du formulaire
*
* 
*/

namespace FormController;

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
function index()
{
    require(ROOT_DIR.'/resources/views/template/main.html.php');
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
function store($conn)
{
    $mail_exp = $_POST['mail_exp'];
    $mail_dest = $_POST['mail_dest'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO `expediteur` (`mail_exp`, `mail_dest`, `message`) VALUES (:mail_exp, :mail_dest, :message);");

    $stmt->bindParam(':mail_exp', $mail_exp);
    $stmt->bindParam(':mail_dest', $mail_dest);
    $stmt->bindParam(':message', $message);
    
    $stmt->execute();

    $stmt = $conn->prepare("SELECT LAST_INSERT_ID();");
    $stmt->execute();
    $lastId = $stmt->fetch();

    return $lastId["LAST_INSERT_ID()"];
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
// function show($id)
function show()
{
    $mail_exp = $_POST['mail_exp'];
    $mail_dest = $_POST['mail_dest'];
    $message = $_POST['message'];

    require(ROOT_DIR.'/resources/views/show.html.php');
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

