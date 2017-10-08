<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 08.10.17
 * Time: 17:09
 */
?>

<h1>Felicitations, vous êtes connecté! </h1>
<p><?= $user['username'] ?></p>

<?= $this->Html->link('Logout', '/users/logout') ?>