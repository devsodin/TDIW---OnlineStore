<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 30/12/2017
 * Time: 20:59
 */

function uploadProduct($connection){
    $filesize = $_FILES['pImage']['size'];

    if($_FILES['pImage']['size'] > 3000000){
        echo 'ERROR. The image size must be 3Mb or less';
    }else{
        if($_FILES['pImage']['type'] == 'image/jpeg' OR $_FILES['pImage']['type'] == 'image/gif' OR $_FILES['pImage']['type'] == 'image/png'){

            $sql = $connection->prepare("SELECT COUNT(*) FROM Product");
            $sql->execute();
            $productCount = intval($sql->fetchColumn(0));
            $productCount += 1;

            $sql = $connection->prepare("SELECT Name FROM Category WHERE Id = ?");
            $sql->execute(array($_POST['pCategory']));
            $categoryName = $sql->fetchColumn(0);

            $extension = end(explode('.',$_FILES['pImage']['name']));

            $_FILES['pImage']['name'] = 'img'.$productCount.'.'.$extension;


            if(isset($_POST['pActive'])){
                $active = 1;
            }else{
               $active = 0;
            }

            if(move_uploaded_file($_FILES['pImage']['tmp_name'],__RES_PATH__.$_FILES['pImage']['name'])){
                    $sql = $connection->prepare("INSERT INTO Product (`Name`,`Description`,`Active`,`Id_Category`,`Image`,`Short_description`,`Price`) VALUES (?,?,?,?,?,?,?)");
                    $sql->execute(array($_POST['pName'],$_POST['pDesc'],$active,$_POST['pCategory'], $_FILES['pImage']['name'],$_POST['pSDesc'],$_POST['pPrice']));

            }


        }else{
            echo 'ERROR. The file format is not supported';
        }
    }
}



?>


