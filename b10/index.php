<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <?php require_once 'html/head.php' ?>
</head>

<body class="stretched overlay-menu">

    <div id="wrapper" class="clearfix bg-light">
        <?php require_once 'html/header.php' ?>

        <div class="container">
            <div class="row">
                <!-- Content -->
                <?php require_once 'list.php' ?>
                <!-- #content end -->

                <section class="right-side mb-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div id="box-gold">
                                    <img src="https://media0.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif?cid=ecf05e475cv4ivoeu9gj660os6xpwwy3s31s0phl7v0591l6&rid=giphy.gif" alt="">
                                </div>
                                <div id="box-coin">
                                    <img src="https://media0.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif?cid=ecf05e475cv4ivoeu9gj660os6xpwwy3s31s0phl7v0591l6&rid=giphy.gif" alt="">
                                </div>
                                <?php
                                // require_once 'box-gold.php';
                                // require_once 'box-coin.php';
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
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

    <script>
        // $(document).ready(function() {
        //     $('#box-gold').load('box-gold.php');
        //     $('#box-coin').load('box-coin.php');
        // });
        $(window).on('load',function(){
            $('#box-gold').load('box-gold.php');
            $('#box-coin').load('box-coin.php');
        })
    </script>


</body>

</html>