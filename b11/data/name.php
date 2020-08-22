<?php require_once('../index.php'); ?>
<?php require_once('./Validate.class.php') ?>



<div class="wrap-input100 validate-input" data-validate="Name is required">
    <input class="input100" id="name" type="text" name="name" placeholder="Name">
    <label class="label-input100" for="name">
        <span class="lnr lnr-user"><?php echo $result['name'] ?></span>
    </label>
</div>