<?php $this->setSiteTitle('Добавить статью');?>
<?php $this->start('head'); ?>
 <!--head-->
<meta content="test">
   
<?php $this->end(); ?>

<?php $this->start('body'); ?>
        <!--body-->
        <div class="rightCol">
            <h3>Добавить статью</h3><hr>
                <?php if (!empty($this->data)) { ?>
                     <?php foreach ($this->data as $k => $v): ?>
                         <?php if ($k == 'error'){?>
                              <?php foreach ($v as $value): ?>
                                    <?php echo $value; ?><br><br>
                              <?php endforeach; ?><br>
                         <?php }?>
                               <?php endforeach; ?><br>
                 <?php }?>
            <!--heading 	imageName 	shortArticle 	fullArticle 	date 	source
            <pre>
            <?php// var_dump($this->data);?>
            </pre> -->
            <form action="" method="POST">
                Источник:<br><input type="text" name="source" value="<?php echo !empty($this->data['source']) ? $this->data['source'] : false;?>"><br><br>
                Заголовок:<br><textarea name="heading" rows="1" cols="75"><?php echo !empty($this->data['heading']) ? $this->data['heading'] : false;?></textarea><br><br>
                Превью img:<br><input type="text" name="imageName" value="<?php echo !empty($this->data['imageName']) ? $this->data['imageName'] : false;?>"><br><br>
                Статья:<br><textarea name="fullArticle" rows="20" cols="75"><?php echo !empty($this->data['fullArticle']) ? $this->data['fullArticle'] : false;?></textarea><br><br>
                <input type="submit" name="addArticle" value="Добавить статью"><br><br>
            </form>
        </div>
        
        
        
        
<?php $this->end(); ?>