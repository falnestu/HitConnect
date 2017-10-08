<p class="simplenav">
    <?= $this->Html->link('Home', '/', (isset($activeItem) && $activeItem === 'home') ? ['class' => 'font-weight-bold'] : [] ) ?> |
    <?= $this->Html->link('Sign up', '/users/login', (isset($activeItem) && $activeItem === 'signin') ? ['class' => 'font-weight-bold'] : [] ) ?>
</p>