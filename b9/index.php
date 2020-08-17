<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <?php require_once 'html/head.php' ?>
</head>

<body class="stretched overlay-menu">

    <div id="wrapper" class="clearfix bg-light">



        <header id="header" class="full-header dark">
            <div id="header-wrap">
                <div class="container">
                    <div class="header-row">

                        <!-- Logo -->
                        <div id="logo">
                            <a href="index.php" class="standard-logo"><span class="p-1">ZendVN</span></a>
                            <a href="index.php" class="retina-logo"><span class="p-1">ZendVN</span></a>
                        </div>
                        <!-- #logo end -->

                        <div id="primary-menu-trigger">
                            <svg class="svg-trigger" viewBox="0 0 100 100">
                                <path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
                                <path d="m 30,50 h 40"></path>
                                <path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
                            </svg>
                        </div>

                        <!-- Primary Navigation -->
                        <nav class="primary-menu text-lg-center">
                            <ul class="menu-container">
                                <li class="menu-item">
                                    <a class="menu-link" href="#">
                                        <div>Login</div>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- #primary-menu end -->
                    </div>
                </div>
            </div>
            <div class="header-wrap-clone" style="height: 62px"></div>
        </header>

        <div class="container">
            <div class="row">
                <!-- Content -->
            <?php require_once("./content.php")   ?>
                <!-- #content end -->

                <!-- Gia vang  -->
                <section class="right-side mb-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                            <!-- Gia vang ne  -->
                        <?php require_once("./giavang.php") ?>
                            <!-- End gia vang  -->

                            <!-- Gia coin  -->

                            <?php require_once("./giacoin.php") ?>

                            <!-- End gia coin  -->
                            </div>
                        </div>

                    </div>
                </section>

                <!-- End gia vang  -->
            </div>
        </div>

        <footer>
            <div id="copyrights" class="bg-dark dark">
                <div class="container clearfix">

                    <div class="row col-mb-30">
                        <div class="col-12 text-center text-muted">
                            Copyrights &copy; 2020 All Rights Reserved by ZendVN Inc.<br>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    </div>

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up rounded-circle"></div>

    <?php require_once 'html/script.php' ?>
</body>

</html>