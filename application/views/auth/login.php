
        <!-- breadcrumbs area start -->
        <div class="title-breadcrumbs">
            <div class="title-breadcrumbs-inner">
                <div class="container">
                    <nav class="woocommerce-breadcrumb">
                        <a href="#">Home</a>
                        <span class="separator">/</span> Login
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
                    <!--Login Form Start-->
                    <div class="col-md-6 col-sm-6">
                        <div class="customer-login-register">
                            <div class="form-login-title">
                                <h2 class="text-center">Login</h2>
                            </div>
                            <div class="login-form">
                                <?php
                                echo validation_errors('<div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>', '</div>');
                                
                                if ($this->session->flashdata('message')) {
                                    echo '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Sukses!</h5>';
                                    echo $this->session->flashdata('message');
                                    echo '</div>';
                                }

                                if ($this->session->flashdata('error')) {
                                    echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-times"></i> Gagal!</h5>';
                                    echo $this->session->flashdata('error');
                                    echo '</div>';
                                }
                                echo form_open('auth', 'method="post"') ?>
                                    <div class="form-fild">
                                        <p>
                                            <label>Email
                                                <span class="required">*</span>
                                            </label>
                                        </p>
                                        <input name="email" value="" type="email">
                                    </div>
                                    <div class="form-fild">
                                        <p>
                                            <label>Password
                                                <span class="required">*</span>
                                            </label>
                                        </p>
                                        <input name="password" value="" type="password">
                                    </div>
                                    <div class="login-submit">
                                        <button type="submit" class="form-button">Login</button>
                                    </div>
                               <?php echo form_close(); ?>
                               <br>
                                <div class="lost-password text-center">
                                    <a href="<?= base_url('auth/register') ?>">Belum Memiliki Akun ??</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Login Form End-->
                    <div class="col-sm-3"></div>
                </div>
            </div>
        </div>
        <!--LoginArea End-->