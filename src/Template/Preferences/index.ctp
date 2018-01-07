<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 17.12.17
 * Time: 15:35
 */
?>

<div class="container">

    <!-- Article main content -->
    <article class="col-xs-12 maincontent">
        <header class="page-header">
            <h1 class="page-title">Préférences musicales</h1>
        </header>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Mes Préférences</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Artist</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($preferences as $preference): ?>
                            <tr>
                                <td><?= $preference->recording->label ?></td>
                                <td><?= $preference->recording->artist->label ?></td>
                                <td>
                                    <?= $this->Form->create(null,['url'=> ['action' => 'delete', $preference->id] , 'name' => 'post_deletePref' , 'class' => 'd-inline', 'onsubmit' => 'return confirm("Are you sure?")']); ?>
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

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= $this->Form->create(null,['url'=> ['action' => 'search'] , 'id' => 'search_form', 'class' => 'form-inline']); ?>
                    <?= $this->Form->input('search', ['label' => false]) ?>
                    <?= $this->Form->button('Search',['id' => 'search_button']) ?>
                    <?= $this->Form->end(); ?>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Artist</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="table_search_body">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </article>
    <!-- /Article -->
</div>

<?= $this->Html->script('preferences.js', ['block' => 'script']);


