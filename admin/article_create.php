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
            $artikulli->foto=$foto;
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
        <title>Create Article</title>
    </head>
    <body>
        <a href="article_list.php">Kthehu tek Lista</a>
        <section class="featured section" id="featured">
                <h1 class="section-title">All Products</h1>
                <div class="featured__container bd-grid">
                    <?php if(isset($error_msg)){ ?>
                            <p class="messageError"><?php echo $error_msg; ?></p>
                    <?php } ?>
                <form method="post">
                        <label for="titulli">Title:</label>
                        <input type="text" name="titulli" class="form-control" id="titulli" value="<?=$titulli ?>"><br>
                        <label for="pershkrimi">Description:</label>
                        <textarea name="pershkrimi" class="form-control" id="pershkrimi"><?= $pershkrimi ?></textarea><br>
                        <label for="Cmimi">Price :</label>
                        <input type="text" name="cmimi" class="form-control" id="cmimi" value="<?=$cmimi ?>"><br>
                        <label for="foto">Photo path :</label>
                        <input type="text" name="foto" class="form-control" id="foto" value="<?=$foto ?>"><br>
                        <label for="priceoff">Price off:</label>
                        <input placeholder='Optional' type="text" name="priceoff" class="form-control" id="priceoff" value="<?=$priceoff ?>"><br>
                        <label for="olderprice">Older Price:</label>
                        <input  placeholder='Optional' type="text" name="olderprice" class="form-control" id="olderprice" value="<?=$olderprice ?>"><br>
                        <button type="submit" class="button" name="ruaj">Ruaj</button>
                </form>
                </div>
        </section>
