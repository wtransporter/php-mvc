<!-- Register-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mt-0">Register account</h2>
                <hr class="divider my-4" />
                <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
            </div>
        </div>
        <div class="row text-secondary">
            <div class="col-lg-12">
                <?php $form = \app\core\forms\Form::open('', 'POST'); ?>
                <div class="col-md-6 offset-3">
                    <?php echo $form->addField($model, 'firstname'); ?>
                </div>
                <div class="col-lg-6 offset-3">
                    <?php echo $form->addField($model, 'lastname'); ?>
                </div>
                <div class="col-lg-6 offset-3">
                    <?php echo $form->addField($model, 'email')->email(); ?>
                </div>
                <div class="col-lg-6 offset-3">
                    <?php echo $form->addField($model, 'password')->password(); ?>
                </div>
                <div class="col-lg-6 offset-3">
                    <?php echo $form->addField($model, 'passwordConfirm')->password(); ?>
                </div>
                <div class="col-6 mt-4 offset-3">
                    <button class="btn btn-primary" type="submit">Register</button>
                </div>
                <?php \app\core\forms\Form::close(); ?>
            </div>
        </div>
    </div>
</section>