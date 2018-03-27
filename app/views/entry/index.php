<?php $this->setSiteTitle('Запись');?>
<?php $this->start('head'); ?>
 <!--head-->
<meta content="test">
   
<?php $this->end(); ?>

<?php $this->start('body'); ?>
        <!--body-->
        <div class="rightCol">
            <h3>Запись</h3><hr>
            <pre>
            <?php print_r($this->data); ?>
            </pre>
        </div>
<?php $this->end(); ?>