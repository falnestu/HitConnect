<p class="simplenav">
    <?= $this->Html->link('Home', '/', (isset($activeItem) && $activeItem === 'home') ? ['class' => 'font-weight-bold'] : [] ) ?> |
    <?= $this->Html->link('Se déconnecter', '/users/logout') ?>
</p>