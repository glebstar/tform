<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title><?php echo $langCfg['page_title']; ?></title>
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <?php if ($this->_template == 'login' || $this->_template == 'reg') { ?>
                <div class="text-right">
                    <div class="btn-group">
                        <button class="btn <?php if ($lang == 'ru') { ?>active<?php } ?>" onclick="setLang('ru');">Русский</button>
                        <button class="btn <?php if ($lang == 'en') { ?>active<?php } ?>" onclick="setLang('en');">English</button>
                    </div>
                </div>
            <?php } ?>
            <?php
            require_once TF_CODE_DIR . '/View/' . $this->_template . '.php';
            ?>

        </div>

        <script src="/bootstrap/js/jquery.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/js/jquery-placeholder.js"></script>
        <script src="/js/script.js?v=2"></script>
        <script type="text/javascript">
            var emess = {
                <?php foreach($langCfg['emess'] as $key=>$value): ?>
                <?php echo $key ?>:'<?php echo $value; ?>',        
                <?php endforeach; ?>
            };
        </script>
    </body>
</html>
