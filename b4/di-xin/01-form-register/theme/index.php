<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once "./html/head.php" ?>
</head>
<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form method="POST">                    
                      <?php 
                             include_once './libs/myFunction.php';
                             $arrSex=["Male","Other","Female"];
                             $arrSum =[
                                createInput("Name", "name"),
                                createInput("Age", "age"),
                                createInput("Fullname", "fullname"),
                                createSelectbox("Sex","Sex", $arrSex ),                               
                            ];
                            //echo $temp =createInput("Name", "name");
                            $xhtmlForm ='';
                            foreach ($arrSum as $key => $value) {
                                $xhtmlForm .= '<div class="input-group">'.$value.'</div>';
                            }
                            echo $xhtmlForm;
                      ?>
                         <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include_once './html/script.php' ?> 
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<!-- end document-->