<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'html/head.php'  ?>
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
                        include_once './html/my-func.php';
                        $arrJob = ['Developer', 'Student', 'Teacher'];
                        $arrSex = ['Other', 'Male', 'Female'];


                        // $xhtmlSelectSex = createSelectBox('sex', 'Sex', $arrSex);

                        $arrElemenInForm = [
                            createInput('fullname', 'nameFull'),
                            createInput('age', 'Age'),
                            createInput('email', 'Email'),
                            createSelectBox('job', 'Job', $arrJob)
                        ];

                        $xhtmlForm = '';

                        foreach ($arrElemenInForm as $element) {
                            $xhtmlForm .= '<div class="input-group abc">' . $element .'</div>';
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

    <?php require_once 'html/script.php'  ?>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->