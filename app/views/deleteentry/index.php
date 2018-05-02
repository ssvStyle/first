<?php $this->setSiteTitle('Запись');?>
<?php $this->start('head'); ?>
 <!--head-->
<meta content="test">
   
<?php $this->end(); ?>

<?php $this->start('body'); ?>
        <!--body-->
        <div class="rightCol">
		<h3>Удаление записи</h3><hr>
                <?php if ($this->data == '00000') { ?>
                    Запись удалена!!!
                <?php } else {?>
                    Что-то пошло не так...
                <?php };?>
	</div>
<?php $this->end(); ?>