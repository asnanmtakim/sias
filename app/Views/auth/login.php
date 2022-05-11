<?php $app_identity = app_identity() ?>
<?= $this->extend($config->viewLayout) ?>

<?= $this->section('content'); ?>
<div class="animate form login_form">
    <section class="login_content">
        <img src="<?= $app_identity['app_brand']; ?>" width="100px" alt="">
        <form method="POST" action="<?= route_to('login') ?>" class="needs-validation">
            <h1><?= lang('Auth.loginTitle') ?> <?= $app_identity['app_title']; ?></h1>
            <?= view('Myth\Auth\Views\_message_block') ?>
            <?= csrf_field() ?>
            <?php if ($config->validFields === ['email']) : ?>
                <div class="form-group">
                    <input id="login" type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>" tabindex="1" autofocus>
                    <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="form-group">
                    <input id="login" type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" tabindex="1" autofocus>
                    <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>" tabindex="2" autocomplete="off">
                <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                </div>
            </div>
            <?php if ($config->allowRemembering) : ?>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" <?php if (old('remember')) : ?> checked <?php endif ?>>
                        <label class="custom-control-label" for="remember-me"><?= lang('Auth.rememberMe') ?></label>
                    </div>
                </div>
            <?php endif; ?>
            <div>
                <button type="submit" class="btn btn-secondary submit" style="text-decoration:none;" tabindex="4">
                    <?= lang('Auth.loginAction') ?>
                </button>
                <?php if ($config->activeResetter) : ?>
                    <a href="<?= route_to('forgot') ?>" class="reset_pass">
                        <?= lang('Auth.forgotYourPassword') ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="clearfix"></div>
            <div class="separator">
                <?php if ($config->allowRegistration) : ?>
                    <p class="change_link">Butuh akun?
                        <a href="<?= route_to('register') ?>" class="to_register"><?= lang('Auth.needAnAccount') ?></a>
                    </p>
                <?php endif; ?>
                <div class="clearfix"></div>
                <br>
                <div>
                    <h1><?= $app_identity['app_name']; ?></h1>
                    <p>©<?= date('Y'); ?> All Rights Reserved. <?= $app_identity['app_title']; ?></p>
                </div>
            </div>
        </form>
    </section>
</div>
<?= $this->endSection(); ?>