<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 30/12/2017
 * Time: 18:08
 */

function loadStoreHistory($connection){

    $sql = $connection->prepare("SELECT `Id_user`,`Date`,`Price` FROM Orders ORDER BY Date DESC");
    $sql->execute();
    $history = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo '<table class="history-table">
  <tr>
    <th>Date</th>
    <th>User Id</th>
    <th>Total eur</th>
  </tr>';
    foreach ($history as $purschase ){
        echo"<tr>
        <td>{$purschase['Date']}</td>
        <td>{$purschase['Id_user']}</td>
        <td>{$purschase['Price']}</td>
      </tr>";
    }
    echo '</table>';

}



function loadUserHistory($connection, $id){

    $sql = $connection->prepare("SELECT `Id_user`,`Date`,`Price` FROM Orders WHERE Id_User = ? ORDER BY Date DESC");
    $sql->execute(array($id));
    $history = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo '<table class="history-table">
  <tr>
    <th>Date</th>
    <th>Total eur</th>
  </tr>';
    foreach ($history as $purschase ){
        echo"<tr>
        <td>{$purschase['Date']}</td>
        <td>{$purschase['Price']}</td>
      </tr>";
    }
    echo '</table>';

}
