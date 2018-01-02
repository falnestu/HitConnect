<ul class="nav navbar-nav pull-right">
    <li class="<?= (isset($activeItem) && $activeItem ==='preferences' ? 'active' : '') ?>"><?= $this->Html->link('Mes préférences','/preferences/index') ?></li>
    <li class="<?= (isset($activeItem) && $activeItem ==='connexions' ? 'active' : '') ?>"><?= $this->Html->link('Mes connexions','/connexions/index') ?></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown"><?= $authUserName ?><b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><?= $this->Html->link('Mes connexions','/connexions/view') ?></li>
            <!--<li><a href="sidebar-left.html">Left Sidebar</a></li>
            <li class="active"><a href="sidebar-right.html">Right Sidebar</a></li>-->
            <li><?= $this->Html->link('LOG OUT','/users/logout', ['class' => 'btn']) ?></li>
        </ul>
    </li>

</ul>