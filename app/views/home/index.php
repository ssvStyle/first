<?php $this->setSiteTitle('Главная страница');?>
<?php $this->start('head'); ?>
 <!--head-->
<meta content="test">
   
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="rightCol">
    <h2>Главная страница</h2><hr>
    
    <div class="bigTitleBlock">
                    <img src="img/empty80.png"><h4><?php echo $this->data[$i]['heading']; ?></h4><p><?php echo $this->data[$i]['shortArticle']; ?></p><a href="show_full_article/<?php echo $this->data[$i]['id']?>"> читать далее...</a>
    </div>
    
    
<?php array_shift($this->data); ?>
            <?php for($i = 0; count($this->data) > $i; $i++):?>
                <div class="smallTitleBlock">
                    <img src="img/empty80.png"><h4><?php echo $this->data[$i]['heading']; ?></h4><p><?php echo $this->data[$i]['shortArticle']; ?></p><a href="show_full_article/<?php echo $this->data[$i]['id']?>"> читать далее...</a>
                </div>
            <?php endfor;?>








</div>

    
    
    
    
    
 <?php $this->end(); ?>