<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
        <meta name="apple-mobile-web-app-title" content="CodePen">
        <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">  
        <link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111"> 

        <title>Admin Gereja</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets2/v_login_assets/') ?>style.css">

        <script>
            window.console = window.console || function (t)
            {};
        </script>

        <script>
            if (document.location.search.match(/type=embed/gi))
            {
                window.parent.postMessage("resize", "*");
            }
        </script>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2"></div>
                <div class="col-lg-6 col-md-8 login-box">
                    <div class="col-lg-12 login-key">
                        <img src="<?= base_url('assets2/v_login_assets/') ?>img/new logo.png" class="logo">
                    </div>
                    <div class="col-lg-12 login-title">
                        ADMIN <br>
                        GBI JOGOSETRAN
                    </div>

                    <div class="col-lg-12 login-form">
                        <div class="col-lg-12 login-form">
                            <form action="<?= site_url('Auth/login') ?>" method="post">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">USERNAME</label>
                                    <input type="text" 
                                           name="username" 
                                           class="<?= form_error('username') ? 'invalid' : '' ?> form-control"
                                           value="<?= set_value('username') ?>" 
                                           required="" />
                                    <div >
                                        <?= form_error('username') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="password">PASSWORD</label>
                                    <input type="password" 
                                           name="password" 
                                           class="<?= form_error('password') ? 'invalid' : '' ?> form-control"
                                           value="<?= set_value('password') ?>" 
                                           required="" />
                                    <div >
                                        <?= form_error('password') ?>
                                    </div>
                                </div>

                                <div class="col-lg-12 loginbttm">
                                    <div class="col-lg-6 login-btm login-text">
                                        <!-- Error Message -->
                                        <?php if ($this->session->flashdata('message_login_error')): ?>
                                            <div >
                                                <p><?= $this->session->flashdata('message_login_error') ?></p>
                                            </div>
                                        <?php endif ?>
                                    </div>

                                    <div class="col-lg-6 login-btm login-button">
                                        <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-2"></div>
                </div>
            </div>
        </div>
    </body>