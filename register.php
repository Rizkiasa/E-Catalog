<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="icon" href="assets/img/logo-uns-biru.png" type="image/png">
    <link rel="stylesheet" href="assets/css/login.css">
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
</head>

<body>

    <div class="main-login">
        <div class="content-login">
            <div class="box-form">
                <div class="header-box-form-regis">
                    <b class="welcome">Sign Up</b>
                    <b class="desc">Create your account</b>
                </div>
                <form method="POST" class="form" enctype="multipart/form-data">
                    <div class="group-form">
                        <label class="label-email-regis" for="">Nama Lengkap</label>
                        <input class="input-email-regis" type="text" name="nama" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="group-form">
                        <label class="label-email-regis" for="">Email</label>
                        <input class="input-email-regis" type="email" name="email" placeholder="Username" required>
                    </div>
                    <div class="group-form">
                        <label class="label-email-regis" for="">Password</label>
                        <input class="input-email-regis" type="password" name="password" placeholder="************" required>
                    </div>
                    <div class="group-form">
                        <label class="label-email-regis" for="">Confirmasi Password</label>
                        <input class="input-email-regis" type="password" name="confirmpassword" placeholder="************" required>
                    </div>
                    <div class="group-form-footer-regis">
                        <input class="button-login" type="submit" name="Submit" value="Sign Up">
                        <b>Already have an account? <span><a class="span" href="login.php">Sign In</a></span></b>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

</body>

</html>