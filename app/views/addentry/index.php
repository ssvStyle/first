<?php $this->setSiteTitle('Запись');?>
<?php $this->start('head'); ?>
 <!--head-->
<meta content="test">
   
<?php $this->end(); ?>

<?php $this->start('body'); ?>
        <!--body-->
        <div class="rightCol">
		<h3>Добавить новую запись</h3><hr>
                <?php if(isset($this->data) && $this->data['Entry'] == 'Запись добавленна'){ ?>
                
                    <h4><?php echo $this->data[0]['name']; ?></h4><b>вы записаны на:</b>  <?php echo $this->data[0]['day']; ?> <?php echo $this->data[0]['month']; ?> <?php echo $this->data[0]['year']; ?><br>
                    <b>Время:</b> <?php echo $this->data[0]['hour']; ?><br>
                    <b>Услуга:</b><?php echo $this->data[0]['service']; ?><br>
                    <b>Доп. Услуга:</b><?php echo $this->data[0]['serviceAdd']; ?><br>
                    <br><br><br>Спасибо за заявку. Ожидайте звонка.<br><p>Удалить запись<br> можно в <a href="<?php echo PROOT; ?>mypage">Личном кабинете</a></p><hr>
                  
                <?php } else { ?>
                    <?php echo $this->data['Entry'];?>
                <?php };?>
	</div>
<?php $this->end(); ?>