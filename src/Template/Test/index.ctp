<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 08.10.17
 * Time: 17:09
 */
?>

<h1>Felicitations <?= $authUser/*['firstname'] . ' ' . $authUser['lastname']*/ ?>, vous êtes connecté! </h1>


<?= $this->Html->link('Logout', '/users/logout') ?>