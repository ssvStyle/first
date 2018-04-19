<?php $this->setSiteTitle('Главная страница');?>
<?php $this->start('head'); ?>
 <!--head-->
<meta content="test">
   
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="rightCol">
    <h2>Главная страница</h2><hr>
        <div class="startPage">
            <div class="bigTitleBlock">
                <img src="<?php echo PROOT; ?>img/articles/articlesMin/<?php echo $this->data[0]['imageName']; ?>.jpg"><h4><?php echo $this->data[0]['heading']; ?></h4><p><?php echo $this->data[0]['shortArticle']; ?></p><a href="<?php echo PROOT; ?>home/show_full_article/<?php echo $this->data[0]['id']?>"> читать далее...</a>
            </div>  
                        <?php array_shift($this->data); ?>
                            <?php for($i = 1;  $i < count($this->data); $i++):?>
                                <div class="smallTitleBlock">
                                    <img src="<?php echo PROOT; ?>img/articles/articlesMin/<?php echo $this->data[$i]['imageName']; ?>.jpg"><h4><?php echo $this->data[$i]['heading']; ?></h4><p><?php echo $this->data[$i]['shortArticle']; ?><a href="<?php echo PROOT; ?>home/show_full_article/<?php echo $this->data[$i]['id']?>"> читать далее...</a></p>
                                </div>
                        <?php endfor;?>
        </div>







</div>

    
    
    
    
    
 <?php $this->end(); ?>