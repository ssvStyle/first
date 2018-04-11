<?php $this->setSiteTitle('Главная страница');?>
<?php $this->start('head'); ?>
 <!--head-->
<meta content="test">
   
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="rightCol">
    <h2>Статья № <?php echo $this->data[0]['id']; ?></h2><hr>
  <?php dnd($this->data); ?>

</div>

    
    
    
    
    
 <?php $this->end(); ?>