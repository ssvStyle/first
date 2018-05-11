<?php $this->setSiteTitle('Редактор статей');?>
<?php $this->start('head'); ?>
 <!--head-->
<meta content="test">
   
<?php $this->end(); ?>

<?php $this->start('body'); ?>
        <!--body-->
        <div class="rightCol">
            <?php if (isset($this->data['error'])) { ?>
                <?php echo $this->data['error'];?><br>
                <?php }?>
                    <?php if (isset($this->data[0]['id'])) { ?>
                        <table width="100%" border="1" cellpadding="4" cellspacing="0">
                            <caption>Редактор статей</caption>
                            <tr>
                                <th>ID</th>
                                <th>Заголовок</th>
                                <th>Дата</th>
                                <th>Источник</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <!--LOOP-->
                            <?php foreach ($this->data as $v):?>
                                        <tr>
                                            <td><?php echo $v['id'];?></td>
                                            <td><?php echo $v['heading'];?></td>
                                            <td><?php echo date("Y-m-d H:i:s", $v['date']);?></td>
                                            <td><?php echo $v['source'];?></td>
                                            <td>
                                                <form action="<?php echo PROOT;?>mypage/addarticle" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $v['id'];?>">
                                                    <input type="hidden" name="heading" value="<?php echo $v['heading'];?>">
                                                    <input type="hidden" name="source" value="<?php echo $v['source'];?>">
                                                    <input type="hidden" name="imageName" value="<?php echo $v['imageName'];?>">
                                                    <input type="hidden" name="fullArticle" value="<?php echo $v['fullArticle'];?>">
                                                    
                                                    <input type="submit" name="changeAticles" value="" style="background-image: url(<?php echo PROOT;?>img/editati.png); background-color: transparent;background-size: cover; width: 30px; height: 30px;" />
                                                    </th>
                                                
                                                
                                                
                                                
                                                </form>
                                            </td><!--Редактировать-->
                                            <td>
                                                <form action="<?php echo PROOT;?>mypage/editarticle" method="POST">
                                                    <input type="hidden" name="delArticle" value="<?php echo $v['id'];?>">
                                                    <input type="image" src="<?php echo PROOT;?>img/delati.png" width="30px" alt="Del"></th>
                                                </form>
                                            </td><!--Удалить-->
                                        </tr>
                                        <tr>
                                            <td colspan="6"><?php echo mb_substr($v['fullArticle'], 0, 300, 'UTF-8');?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                        </tr>
                            <?php endforeach?>
                        </table>
            
                    <?php }?>
            
            
            
        </div>
<?php $this->end(); ?>