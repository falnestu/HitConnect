<ul class="nav navbar-nav pull-right">
    <li class="<?= (isset($activeItem) && $activeItem ==='home' ? 'active' : '') ?>"><?= $this->Html->link('Home','/') ?></li>
    <!--<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="sidebar-left.html">Left Sidebar</a></li>
            <li class="active"><a href="sidebar-right.html">Right Sidebar</a></li>
        </ul>
    </li>-->
    <li><?= $this->Html->link('SIGN IN / SIGN UP','/users/login', ['class' => 'btn']) ?></li>
</ul>