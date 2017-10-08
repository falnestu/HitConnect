<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('http://fonts.googleapis.com/css?family=Open+Sans:300,400,700', ['media' => 'screen']) ?>
    <?= $this->Html->css(['bootstrap.min.css', 'font-awesome.min.css']) ?>

    <!-- Custom styles for our template -->
    <?= $this->Html->css(['bootstrap-theme.css', 'main.css', 'site.css']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <?= $this->Html->script(['html5shiv.js','respond.min.js']) ?>
    <![endif]-->
</head>
<body class="home">
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top headroom" >
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <!-- Change img logo -->
                <a class="navbar-brand" href="index.html"><?= $this->Html->image('logo.png', ['alt' => 'Progressus HTML5 template']) ?></a>
            </div>
            <div class="navbar-collapse collapse">
                <?= $this->element('nav', isset($activeItem) ? ['activeItem' => $activeItem] : []) ?>
            </div><!--/.nav-collapse -->
        </div>
    </div>
    <!-- /.navbar -->

    <?= $this->fetch('header', '<header id="head" class="secondary"></header>') ?>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>

    <footer id="footer" class="top-space">

        <div class="footer1">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 widget">
                        <h3 class="widget-title">Contact</h3>
                        <div class="widget-body">
                            <p>+234 23 9873237<br>
                                <a href="mailto:#">some.email@somewhere.com</a><br>
                                <br>
                                234 Hidden Pond Road, Ashland City, TN 37015
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 widget">
                        <h3 class="widget-title">Follow me</h3>
                        <div class="widget-body">
                            <p class="follow-me-icons">
                                <a href=""><i class="fa fa-twitter fa-2"></i></a>
                                <a href=""><i class="fa fa-dribbble fa-2"></i></a>
                                <a href=""><i class="fa fa-github fa-2"></i></a>
                                <a href=""><i class="fa fa-facebook fa-2"></i></a>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 widget">
                        <h3 class="widget-title">Text widget</h3>
                        <div class="widget-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
                            <p>Eius consequatur nihil quibusdam! Laborum, rerum, quis, inventore ipsa autem repellat provident assumenda labore soluta minima alias temporibus facere distinctio quas adipisci nam sunt explicabo officia tenetur at ea quos doloribus dolorum voluptate reprehenderit architecto sint libero illo et hic.</p>
                        </div>
                    </div>

                </div> <!-- /row of widgets -->
            </div>
        </div>

        <div class="footer2">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 widget">
                        <div class="widget-body">
                            <?= $this->element('menu', isset($activeItem) ? ['activeItem' => $activeItem] : []) ?>
                        </div>
                    </div>

                    <div class="col-md-6 widget">
                        <div class="widget-body">
                            <p class="text-right">
                                Copyright &copy; 2014, Your name. Designed by <a href="http://gettemplate.com/" rel="designer">gettemplate</a>
                            </p>
                        </div>
                    </div>

                </div> <!-- /row of widgets -->
            </div>
        </div>

    </footer>

    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <?= $this->Html->script([
            'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'
            ,'http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js'
            ,'headroom.min.js'
            ,'jQuery.headroom.min.js'
            ,'template.js' ]) ?>
</body>
</html>
