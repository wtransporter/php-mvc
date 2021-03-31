<!-- Login-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mt-0">Login to your account</h2>
                <hr class="divider my-4" />
            </div>
        </div>
        <div class="row text-secondary">
            <div class="col-lg-12">
                <?php $form = \app\core\forms\Form::open('', 'POST'); ?>
                <div class="col-lg-6 offset-3">
                    <?php echo $form->addField($model, 'email')->email(); ?>
                </div>
                <div class="col-lg-6 offset-3">
                    <?php echo $form->addField($model, 'password')->password(); ?>
                </div>
                <div class="col-8 mt-4 offset-3">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
                <?php \app\core\forms\Form::close(); ?>
            </div>
        </div>
    </div>
</section>