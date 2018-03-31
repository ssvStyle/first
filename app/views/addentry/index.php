<?php $this->setSiteTitle('Запись');?>
<?php $this->start('head'); ?>
 <!--head-->
<meta content="test">
   
<?php $this->end(); ?>

<?php $this->start('body'); ?>
        <!--body-->
        <div class="rightCol">
		<h3>Добавить новую запись</h3>
				<hr><b>Выбранна дата:</b> День - <?php echo $this->data[0]['day']; ?>
            Месяц - <?php echo $this->data[0]['month']; ?>
            Год - <?php echo $this->data[0]['year']; ?>
                                <?php echo $this->data['Entry'] ? $this->data['Entry'] : FALSE;?>
                                <pre>
                                <?php //dnd($_POST); ?>
                                </pre>
	</div>
<?php $this->end(); ?>