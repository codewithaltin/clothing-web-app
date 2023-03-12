<?php
    require_once "config.php";
    require_once "../models/Article.php";
    require_once "../models/User.php";
    require_once "../libs/AuthenticateUser.php";
    
    if(!AuthenticateUser::is_logged()){
        header("Location: /login.php");
    }

    $user_logged=User::getById(AuthenticateUser::get()["id"]);

    if($user_logged->isAdmin()){
         $artikujt=Article::getList();
    }else{
        $artikujt=Article::getList("id_dyqani= {
            $user_logged->id_dyqani
        }");
    }

    $artikujt=Article::getList();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <title>Article List</title>
    </head>
    <body>
        <a href="dashboard.php">Kthehu ne Dashboard</a>
        <section class="featured section" id="featured">
        <div class="table-content">
        <h3 class="page-title">Lista e artikujve </h3>
        <a href="article_create.php">Kliko per te krijuar nje artikuj te ri</a>
            <table class="table" border="1px solid black">
                <thead>
                    <tr>
                        <th>Titulli</th>
                        <th>Pershkrimi</th>
                        <th>Data</th>
                        <th>Cmimi</th>
                        <th>Foto path</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($artikujt as $artikull) { ?>
                        <tr>
                            <td><?= $artikull->titulli ?></td>
                            <td><?= $artikull->pershkrimi ?></td>
                            <td><?= $artikull->data ?></td>
                            <td><?= $artikull->cmimi ?></td>
                            <td><?= $artikull->foto ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
         </section>
</body>
</html
