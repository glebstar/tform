<div class="text-left" style="margin-bottom: 10px;">
    <a href="/?logout=1">Выход</a>
</div>
Логин: <b><?php echo $this->_pars['user']['login']; ?></b> <br />
Имя: <b><?php echo $this->_pars['user']['firstname']; ?></b> <br />
Фамилия: <b><?php echo $this->_pars['user']['lastname']; ?></b> <br /><br />
<img class="img-rounded" src="/avatars/<?php echo $this->_pars['user']['id']; ?>.<?php echo $this->_pars['user']['photo']; ?>" style="width: 100px;" />