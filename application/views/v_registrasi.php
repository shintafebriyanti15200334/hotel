<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Billies Hotel: Registrasi</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Registrasi</div>
            <div class="card-body">
                <form action="<?php echo base_url('registrasi/aksi_registrasi'); ?>" method="post">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="inputNamaLengkap" name="nama_user" class="form-control"
                                placeholder="Nama Lengkap" required="required" autofocus="autofocus">
                            <label for="inputNamaLengkap">Nama Lengkap</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="inputEmail" name="email_user" class="form-control"
                                placeholder="Email" required="required" autofocus="autofocus">
                            <label for="inputEmail">Email</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="inputNomorTelepon" name="tlp_user" class="form-control"
                                placeholder="Nomor Telepon" required="required" autofocus="autofocus">
                            <label for="inputNomorTelepon">Nomor Telepon</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="inputUsername" name="username_user" class="form-control"
                                placeholder="Username" required="required" autofocus="autofocus">
                            <label for="inputUsername">Username</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="password_user" class="form-control"
                                placeholder="Password" required="required">
                            <label for="inputPassword">Password</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="inputPassword2" name="password_user2" class="form-control"
                                placeholder="Konfirmasi Password" required="required">
                            <label for="inputPassword2">Konfirmasi Password</label>
                        </div>
                    </div>
                    <input class="btn btn-primary btn-block" type="submit" value="Daftar">
                </form>
                <div class="text-center">
                    <a class="d-block small" href="<?php echo base_url('login'); ?>">Kembali ke halaman Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>