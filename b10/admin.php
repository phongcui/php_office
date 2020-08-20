<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <?php require_once 'html/head.php' ?>
</head>

<body class="stretched">

    <?php
    session_start();
    $linkRss = '';
    $message = '';
    $disable = '';
    $none = '';


    if ($_SESSION['flagPermission'] == true) {
        $data = simplexml_load_file('data/timeout.xml');
        $timeout = $data->timeout;
        if (!$_SESSION['timeout'] + $timeout > time()) {
            session_unset();
            header('location: login.php');
            exit();
        }

        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 'admin') {
                // echo $_SESSION['role'];
                $disable = '';
            } else {
                $disable = 'readonly';
                $none = 'display:none';
            }


            
        }

        $contentTXT = file_get_contents('./data/rss.txt');
        if (isset($_POST['link-rss'])) {
            $linkRss = $_POST['link-rss'];
            if (empty($linkRss)) {
                $message = 'vui long nhap du lieu';
            } else {
                file_put_contents('./data/rss.txt', $linkRss);
                $contentTXT = file_get_contents('./data/rss.txt');
                $message = 'cap nhat thanh cong';
            }
        }
    } else {
        session_unset();
        header('location: login.php');
    }



    ?>

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Content
		============================================= -->
        <section id="content" class="w-100">
            <div class="content-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between">
                            <a href="index.php" class="button button-3d button-green">Về website</a>
                            <a href="logout.php" class="button button-3d button-red">Đăng xuất</a>
                        </div>
                    </div>
                    <form action="#" method="post">
                        <div class="form-group">
                            <h4 class="mb-2">Link RSS</h4>
                            <textarea <?php echo $disable ?> class="required sm-form-control valid" id="link-rss" name="link-rss" rows="8" cols="30" value=""><?php echo $contentTXT ?></textarea>
                            <?php echo $message ?>
                        </div>
                        <div class="form-group">
                            <button class="button button-3d m-0" type="submit" style="<?php echo $none ?>">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </section><!-- #content end -->

    </div><!-- #wrapper end -->

    <?php require_once 'html/script.php' ?>

</body>

</html>