<?php
       require_once "config.php";
       require_once "../models/Article.php";
       require_once "../libs/AuthenticateUser.php";

    if(!AuthenticateUser::is_logged()){
       header("Location: /login.php");
    }

    $titulli=isset($_POST['titulli']) ? $_POST['titulli'] : null;
    $pershkrimi=isset($_POST['pershkrimi']) ? $_POST['pershkrimi'] : null;
    $cmimi=isset($_POST['cmimi']) ? $_POST['cmimi'] : null;
    $foto=isset($_POST['foto']) ? $_POST['foto'] : null;
    $priceoff=isset($_POST['priceoff']) ? $_POST['priceoff'] : null;
    $olderprice=isset($_POST['olderprice']) ? $_POST['olderprice'] : null;
    if(isset($_POST['ruaj'])){

        $error_msg=null;
        if($titulli==""){
            $error_msg="Titulli eshte fushe e detyrueshme";
        }else if($pershkrimi==""){
            $error_msg="Pershkrimi eshte fushe e detyrueshme";
        }
        if(is_null($error_msg)){

            $artikulli=new Article();
            $artikulli->titulli=$titulli;
            $artikulli->pershkrimi=$pershkrimi;
            $artikulli->cmimi=$cmimi;
            $artikulli->foto= "images/" . $foto;
            $artikulli->priceoff=$priceoff;
            $artikulli->olderprice=$olderprice;
            $artikulli->id_dyqani=1;
            $artikulli->data=date("Y-m-d");
            $artikulli->save();

            header("Location: article_list.php");
            exit();
        }
    }
    //include '../subComponent/header.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link rel="stylesheet" href="../style/style.css">
        <title>Create Article</title>
    </head>
    <body>
        <section class="dashboard">
            <p> <a href="article_list.php">Kthehu tek Lista</a></p>
            <hr>
                <h2>Enter Users Data Below</h2>
                    <?php if(isset($error_msg)){ ?>
                            <p class="messageError"><?php echo $error_msg; ?></p>
                    <?php } ?>
            <div class= "logindiv"> 
              <form method="post">
                     <input  placeholder="Title" type="text" name="titulli" class="input" id="titulli" value="<?=$titulli ?>"><br>
                        <textarea placeholder="Description" name="pershkrimi" class="input" id="pershkrimi"><?= $pershkrimi ?></textarea><br>
                        <input placeholder="Cmimi $" type="text" name="cmimi"class="input" value="<?=$cmimi ?>"><br>
                        <input placeholder="Photo" type="file" name="foto" class="input" id="foto" value="<?=$foto ?>"><br>
                        <input placeholder='Price off (Optional)' type="text" name="priceoff" class="input" id="priceoff" value="<?=$priceoff ?>"><br>
                        <input  placeholder='Older Price(Optional)' type="text" name="olderprice" class="input" id="olderprice" value="<?=$olderprice ?>"><br>
                        <div class="bttn">
                        <button type="submit" class="bttn" name="ruaj">CREATE</button></div>
                </form>
            </div>
        </section>
