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

       
        <link rel="stylesheet" href="../assets/css/styles.css">

        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Create Article</title>
    </head>
    <body>

    
        <section class="featured section" id="featured">
                <h2 class="section-title">All Products</h2>
                <div class="featured__container bd-grid">
                    <?php if(isset($error_msg)){ ?>
                            <p class="messageError"><?php echo $error_msg; ?></p>
                    <?php } ?>
                <form method="post">
                    <div class="form-group">
                        <label for="titulli">Titulli i artikullit:</label>
                        <input type="text" name="titulli" class="form-control" id="titulli" value="<?=$titulli ?>">
                    </div>
                    <div class="form-group">
                        <label for="pershkrimi">Pershkrimi :</label>
                        <textarea name="pershkrimi" class="form-control" id="pershkrimi"><?= $pershkrimi ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="titulli">Cmimi :</label>
                        <input type="text" name="cmimi" class="form-control" id="cmimi" value="<?=$cmimi ?>">
                    </div>
                    <div class="form-group">
                        <label for="titulli">Foto path :</label>
                        <input type="text" name="foto" class="form-control" id="foto" value="<?=$foto ?>">
                    </div>
                    
                    <button type="submit" class="button" name="ruaj">Ruaj</button>
                </form>
                </div>
        </section>


<!--<br /><b>Notice</b>:  Undefined variable: qmimi in <b>C:\xampp\htdocs\WebProjectSneakers\admin\article_create.php</b> on line <b>56</b><br />