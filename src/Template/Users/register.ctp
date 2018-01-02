<!-- container -->
<div class="container">


    <div class="row">

        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="page-title">Registration</h1>
            </header>

            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="thin text-center">Register a new account</h3>
                        <p class="text-center text-muted">Lorem ipsum dolor sit amet, <?= $this->Html->link('Login','/users/login') ?> adipisicing elit. Quo nulla quibusdam cum doloremque incidunt nemo sunt a tenetur omnis odio. </p>
                        <hr>

                        <?= $this->Form->create($registerForm); ?>
                            <?= $this->Form->input('lastname', ['label' => __('Nom') ]) ?>
                            <?= $this->Form->control('firstname',['label' => __('Prénom')]) ?>
                            <?= $this->Form->input('email', ['label' => __('Adresse email')]) ?>
                        <div class="row">
                            <?= $this->Form->input('password', ['label' => __('Mot de passe'),'value' => '', 'templateVars' => ['divclass' => 'col-sm-6']]) ?>
                            <?= $this->Form->input('confirm_password', ['label' => __('Confirmez votre mot de passe'),'value' => '', 'type' => 'password', 'templateVars' => ['divclass' => 'col-sm-6']]) ?>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-lg-8">
                                <label class="checkbox">
                                    <input type="checkbox">
                                    I've read the <!--a href="page_terms.html"-->Terms and Conditions<!--/a-->
                                </label>
                            </div>
                            <div class="col-lg-4 text-right">
                                <button class="btn btn-action" type="submit">Register</button>
                            </div>
                        </div>
                        <?= $this->Form->end(); ?>
                       <!-- <form>
                            <div class="top-margin">
                                <label>First Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="top-margin">
                                <label>Last Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="top-margin">
                                <label>Email Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="row top-margin">
                                <div class="col-sm-6">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label>Confirm Password <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-lg-8">
                                    <label class="checkbox">
                                        <input type="checkbox">
                                        I've read the <a href="page_terms.html">Terms and Conditions</a>
                                    </label>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <button class="btn btn-action" type="submit">Register</button>
                                </div>
                            </div>
                        </form>-->
                    </div>
                </div>

            </div>

        </article>
        <!-- /Article -->

    </div>
</div>	<!-- /container -->