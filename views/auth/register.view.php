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
                <form class="row g-3">
                    <div class="col-md-6 offset-3">
                        <label for="firstname" class="form-label">First name</label>
                        <input type="text" class="form-control" id="firstname" value="" required>
                    </div>
                    <div class="col-lg-6 offset-3">
                        <label for="lastname" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="lastname" value="" required>
                    </div>
                    <div class="col-lg-6 offset-3">
                        <label for="email" class="form-label">E-mail</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="email" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="pasword" required>
                    </div>
                    <div class="col-lg-6 offset-3">
                        <label for="passwordConfirm" class="form-label">Confirm password</label>
                        <input type="text" class="form-control" id="passwordConfirm" required>
                    </div>
                    <div class="col-6 mt-4 offset-3">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>