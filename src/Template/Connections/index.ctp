<div class="container">

    <!-- Article main content -->
    <article class="col-xs-12 maincontent">
        <header class="page-header">
            <h1 class="page-title">Invitations</h1>
        </header>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                    <h3>Invitations</h3>
                    <ul class="list-group">
                        <?php foreach($invitations as $connection): ?>
                            <li class="list-group-item">
                                <?= $connection['user']['fullname'] ?>
                                <div class="pull-right">
                                    <?= $this->Form->create(null,['url'=> ['action' => 'acceptInvitation', $connection['id']] , 'class' => 'd-inline']); ?>
                                    <button class="btn btn-success btn-icon"><i class='fa fa-check' aria-hidden='true'></i></button>
                                    <?= $this->Form->end(); ?>
                                    <?= $this->Form->create(null,['url'=> ['action' => 'denyInvitation', $connection['id']] , 'class' => 'd-inline']); ?>
                                    <button class="btn btn-danger btn-icon"><i class='fa fa-trash-o' aria-hidden='true'></i></i></button>
                                    <?= $this->Form->end(); ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    </div>
                    <div class="col-md-6">
                        <h3>Suggestions</h3>
                        <ul class="list-group">
                            <?php foreach($matches as $user): ?>
                                <li class="list-group-item">
                                    <?= $user->getUsername(); ?> <?= $user->getScore().' %' ?>
                                    <div class="pull-right">
                                        <?= $this->Form->create(null,['url'=> ['action' => 'add', $user->getUserId()] , 'class' => 'd-inline']); ?>
                                        <button class="btn btn-success btn-icon"><i class='fa fa-check' aria-hidden='true'></i></button>
                                        <?= $this->Form->end(); ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <!-- /Article -->
</div>
