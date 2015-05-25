<form class="form-signin" onsubmit="return false;">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#"><?php echo $langCfg['login']; ?></a>
        </li>
        <li><a href="/?action=reg"><?php echo $langCfg['registration']; ?></a></li>
    </ul>
    <div id="emess" class="alert alert-error" style="display: none;">
        <strong><?php if ($lang == 'ru'): ?>Внимание! <?php else: ?>Warning! <?php endif; ?></strong><span class="message"></span>
    </div>
    <input id="login" type="text" class="input-block-level" placeholder="<?php echo $langCfg['ph_login']; ?>">
    <input id="password" type="password" class="input-block-level" placeholder="<?php echo $langCfg['ph_pass']; ?>">

    <button class="btn btn-large btn-primary" onclick="return signin();"><?php echo $langCfg['b_login']; ?></button>
</form>
