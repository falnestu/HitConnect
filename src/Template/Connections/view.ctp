<div class="container">

    <!-- Article main content -->
    <article class="col-xs-12 maincontent">
        <header class="page-header">
            <h1 class="page-title">Connexions</h1>
        </header>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Mes connexions</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Contact</th>
                            <th>Depuis</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($connections as $connection): ?>
                            <tr>
                                <td><?= $connection['user']['fullname'] ?></td>
                                <td><?= $connection['since'] ?></td>
                                <td>
                                    <?= $this->Form->create(null,['url'=> ['action' => 'delete', $connection['id']] , 'class' => 'd-inline', 'onsubmit' => 'return confirm("Are you sure?")']); ?>
                                    <button class="btn btn-danger btn-icon">
                                        <i class='fa fa-trash-o' aria-hidden='true'></i>
                                    </button>
                                    <?= $this->Form->end(); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </article>
    <!-- /Article -->
</div>
