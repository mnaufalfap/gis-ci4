<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - GIS</title>
    <link href="<?= base_url('sb-admin') ?>/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (session()->getFlashdata('pesan')) {
                                        echo '<div class="alert alert-success">';
                                        echo session()->getFlashdata('pesan');
                                        echo '</div>';
                                    }
                                    ?>
                                    <?php
                                    echo form_open('auth/save_register');
                                    ?>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="nama_user" name="nama_user" type="text" placeholder="Enter your first name" required />
                                        <label for="">Nama User</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" required />
                                        <label for="">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="no_hp" name="no_hp" type="text" placeholder="name@example.com" required />
                                        <label for="">Nomor HP</label>
                                    </div>
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="password" name="password" type="password" placeholder="Create a password" required />
                                        <label for="">Password</label>
                                    </div>

                                    <div class="mt-4 mb-0 text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                                    </div>
                                    <?php
                                    echo form_close();
                                    ?>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="<?= base_url('auth/login') ?>">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('sb-admin') ?>/js/scripts.js"></script>
    <script>
        window.setTimeout(function() {
            $("alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            })
        }, 3000);
    </script>
</body>

</html>