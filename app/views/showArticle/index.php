<?php $this->setSiteTitle($this->data[0]['heading']);?>
<?php $this->start('head'); ?>
 <!--head-->
<meta content="test">
   
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="rightCol">
    <h2><?php echo $this->data[0]['heading']; ?></h2>
    <?php echo htmlspecialchars_decode($this->data[0]['fullArticle']); ?>

</div>

    
    
    
    
    
 <?php $this->end(); ?>