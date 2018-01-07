<!-- container -->
<div class="container">

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
                            <?= $this->Form->input('email') ?>
                            <?= $this->Form->input('password') ?>
                            <hr>
                            <div class="row">
                                <div class="col-lg-8">
                                    <b>Forgot password?</b>
                                    <!--b><a href="">Forgot password?</a></b-->
                                </div>
                                <?= $this->Form->submit('Sign in', ['templateVars' => ['divclass' => 'col-lg-4 text-right']]) ?>
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
	
