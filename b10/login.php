<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <?php require_once 'html/head.php' ?>
</head>

<body class="stretched">

    <?php
    session_start();
    // session_unset();
    require_once 'functions.php';

    $message = '';
    if ($_SESSION['flagPermission'] == true) {
        $data = simplexml_load_file('data/timeout.xml');
        $timeout = $data->timeout;
        if ($_SESSION['timeout'] + $timeout > time()) {

            header('location: admin.php');
            exit();
        } else {
            session_unset();
        }
    } else {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username     = $_POST['username'];
            $password     = md5($_POST['password']);
            $userInfo     = [];

            $data         = file_get_contents('data/users.json');
            $data        = json_decode($data, true);

            foreach ($data as $user) {
                if ($user['username'] == $username && $user['password'] == $password) {
                    $userInfo = $user;
                }
            }

            if (!empty($userInfo)) {
                $_SESSION['fullName']         = $userInfo['fullname'];
                $_SESSION['flagPermission'] = true;
                $_SESSION['timeout']         = time();
                $_SESSION['role'] 		= $userInfo['role'];
                header('location: admin.php');
                exit();
            } else {
                $message = 'thong tin dang nhap khong dung';
            }
        }
    }



    ?>

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Content
		============================================= -->
        <section id="content" class="w-100">
            <div class="content-wrap py-0">

                <div class="section p-0 m-0 h-100 position-absolute" style="background: url('images/login-bg.jpg') center center no-repeat; background-size: cover;"></div>

                <div class="section bg-transparent min-vh-100 p-0 m-0">
                    <div class="vertical-middle">
                        <div class="container-fluid py-5 mx-auto">
                            <div class="center">
                                <h2 class="text-white">ZendVN</h2>
                            </div>

                            <div class="card mx-auto rounded-0 border-0" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
                                <div class="card-body" style="padding: 40px;">
                                    <form id="login-form" name="login-form" class="mb-0" action="#" method="post">
                                        <h3 class="text-center">Đăng nhập trang quản trị<?php echo $message; ?></h3>

                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label for="username">Username:</label>
                                                <input type="text" id="username" name="username" value="" class="form-control not-dark" />
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="password">Password:</label>
                                                <input type="password" id="password" name="password" value="" class="form-control not-dark" />
                                            </div>

                                            <div class="col-12 form-group">
                                                <button type="submit" class="button button-3d button-black m-0">Đăng nhập</button>
                                                <a href="index.php" class="button button-3d m-0">Quay về</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="text-center dark mt-3"><small>Copyrights &copy; All Rights Reserved by ZendVN Inc.</small></div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- #content end -->

    </div><!-- #wrapper end -->

    <?php require_once 'html/script.php' ?>

</body>

</html>