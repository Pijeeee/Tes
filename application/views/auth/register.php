
        <!-- breadcrumbs area start -->
        <div class="title-breadcrumbs">
            <div class="title-breadcrumbs-inner">
                <div class="container">
                    <nav class="woocommerce-breadcrumb">
                        <a href="#">Home</a>
                        <span class="separator">/</span> Register
                    </nav>
                </div>
            </div>
        </div>
        <!-- breadcrumbs area End -->
        <!--LoginArea Strat-->
        <div class="login-register-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <!--Register Form Start-->
                    <div class="col-md-6 col-sm-6">
                        <div class="customer-login-register register-pt-0">
                            <div class="form-register-title">
                                <h2 class="text-center">Register</h2>
                            </div>
                            <div class="register-form">
                                <?php
                                echo validation_errors('<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>', '</div>');
                                if ($this->session->flashdata('message')) {
                                    echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Sukses!</h5>';
                                    echo $this->session->flashdata('message');
                                    echo '</div>';
                                }
                                echo form_open('auth/register') ?>
                                    <div class="form-fild">
                                        <p>
                                            <label>Nama Lengkap
                                                <span class="required">*</span>
                                            </label>
                                        </p>
                                        <input name="name" value="<?= set_value('name') ?>" type="text">
                                    </div>
                                    <div class="form-fild">
                                        <p>
                                            <label>Email
                                                <span class="required">*</span>
                                            </label>
                                        </p>
                                        <input name="email" value="<?= set_value('email') ?>" type="email">
                                    </div>
                                    <div class="form-fild">
                                        <p>
                                            <label>Password
                                                <span class="required">*</span>
                                            </label>
                                        </p>
                                        <input name="password" value="<?= set_value('password') ?>" type="password">
                                    </div>
                                    <div class="register-submit">
                                        <button type="submit" class="form-button">Register</button>
                                    </div>
                                <?php echo form_close() ?>
                                <br>
                                <div class="lost-password text-center">
                                    <a href="<?= base_url('auth') ?>">Sudah Mempunyai Akun ??</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Register Form End-->
                    <div class="col-sm-3"></div>
                </div>
            </div>
        </div>
        <!--LoginArea End-->