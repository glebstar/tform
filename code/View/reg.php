<form id="reg_form" class="form-signin" action="/?action=reg" method="post" enctype="multipart/form-data">
    <ul class="nav nav-tabs">
        <li>
            <a href="/"><?php echo $langCfg['login']; ?></a>
        </li>
        <li class="active"><a href="#"><?php echo $langCfg['registration']; ?></a></li>
    </ul>
    <div id="emess" class="alert alert-error" <?php if (!isset($this->_pars['error'])): ?>style="display: none;<?php endif; ?>">
        <strong><?php if ($lang == 'ru'): ?>Внимание! <?php else: ?>Warning! <?php endif; ?></strong><span class="message"><?php if (isset($this->_pars['error'])): echo $this->_pars['error']; endif; ?></span>
    </div>
    <input id="login" name="login" type="text" class="input-block-level" placeholder="<?php echo $langCfg['ph_login']; ?>" value="<?php if (isset($_POST['login'])): echo $_POST['login']; endif; ?>">
    <input id="password" name="password" type="password" class="input-block-level" placeholder="<?php echo $langCfg['ph_pass']; ?>" value="<?php if (isset($_POST['password'])): echo $_POST['password']; endif; ?>">
    <input id="c_password" name="c_password" type="password" class="input-block-level" placeholder="<?php echo $langCfg['ph_pass_conf']; ?>" value="<?php if (isset($_POST['c_password'])): echo $_POST['c_password']; endif; ?>">
    <input id="firstname" name="firstname" type="text" class="input-block-level" placeholder="<?php echo $langCfg['ph_fname']; ?>" value="<?php if (isset($_POST['firstname'])): echo $_POST['firstname']; endif; ?>">
    <input id="lastname" name="lastname" type="text" class="input-block-level" placeholder="<?php echo $langCfg['ph_lname']; ?>" value="<?php if (isset($_POST['lastname'])): echo $_POST['lastname']; endif; ?>">
    <label class="control-label"><?php echo $langCfg['ph_photo']; ?></label>
    <input id="photo" name="photo" type="file" />

    <button class="btn btn-large btn-primary" onclick="return reg();"><?php echo $langCfg['b_reg']; ?></button>
</form>
