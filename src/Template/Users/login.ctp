<?php
$this->assign('title','HitConnect : Login');
$this->set('activeItem', 'signin');
?>

<!-- container -->
<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active">User access</li>
    </ol>

    <div class="row">

        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="page-title">Sign in</h1>
            </header>

            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="thin text-center">Sign in to your account</h3>
                        <p class="text-center text-muted">Lorem ipsum dolor sit amet, <?= $this->Html->link('Register','/users/register') ?> adipisicing elit. Quo nulla quibusdam cum doloremque incidunt nemo sunt a tenetur omnis odio. </p>
                        <hr>

                        <?= $this->Form->create(); ?>
<!--                            <div class="top-margin">
                                <label>Username/Email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control">
                            </div>-->
                            <?= $this->Form->input('username', ['templateVars' => ['divclass' => 'top-margin']]) ?>
<!--                            <div class="top-margin">
                                <label>Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control">
                            </div>-->
                            <?= $this->Form->input('password', ['templateVars' => ['divclass' => 'top-margin']]) ?>

                            <hr>

                            <div class="row">
                                <div class="col-lg-8">
                                    <b>Forgot password?</b>
                                    <!--b><a href="">Forgot password?</a></b-->
                                </div>
                                <?= $this->Form->submit('Sign in', ['templateVars' => ['divclass' => 'col-lg-4 text-right']]) ?>
<!--                               <div class="col-lg-4 text-right">
                                    <button class="btn btn-action" type="submit">Sign in</button>
                                </div>-->
                            </div>
                        <?= $this->Form->end(); ?>

                    </div>
                </div>

            </div>

        </article>
        <!-- /Article -->

    </div>
</div>
<!-- /container -->
	
