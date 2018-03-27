<?php $this->setSiteTitle('Запись');?>
<?php $this->start('head'); ?>
 <!--head-->
<meta content="test">
   
<?php $this->end(); ?>

<?php $this->start('body'); ?>
        <!--body-->
        <h2>Запись</h2>
        <pre>
        <?php print_r($this->data); ?>
        </pre>
<?php $this->end(); ?>