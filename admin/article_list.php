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
        <link rel="stylesheet" href="../style/style.css">
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <title>Article List</title>
    </head>
    <body>
        <section class="dashboard">
        <p><a href="dashboard.php">Kthehu ne Dashboard</a></p>
        <p><a href="article_create.php">Kliko per te krijuar nje artikuj te ri</a></p>
        <hr>
            <table class="table" border="1px solid black">
                <caption>Lista e artikujve</caption>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulli</th>
                        <th>Pershkrimi</th>
                        <th>Data</th>
                        <th>Cmimi</th>
                        <th>Foto path</th>
                        <th colspan='2'>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($artikujt as $artikull) { ?>
                        <tr>
                            
                            <th><?= $artikull->getId()?></th>
                            <th><?= $artikull->titulli ?></th>
                            <td><?= $artikull->pershkrimi ?></td>
                            <td><?= $artikull->data ?></td>
                            <td><?= $artikull->cmimi ?></td>
                            <td><?= $artikull->foto ?></td>
                            <td><a href="delete_article.php?id=<?php echo $artikull->getId()?>" onclick="return confirm('Are You Sure ?')">Delete</a></td>
                            <td><a href="update_article.php?id=<?php echo $artikull->getId()?>">Update</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
         </section>
</body>
</html
