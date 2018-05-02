<?php $this->setSiteTitle('Редактор статей');?>
<?php $this->start('head'); ?>
 <!--head-->
<meta content="test">
   
<?php $this->end(); ?>

<?php $this->start('body'); ?>
        <!--body-->
        <div class="rightCol">
            <pre>
            <?php //var_dump($this->data)?>
            </pre>
            
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
                                    <form action="<?php echo PROOT;?>mypage/addarticle" method="post">
                                        <input type="hidden" name="editArticle" value="<?php echo $v['id'];?>">
                                        <input type="image" src="<?php echo PROOT;?>img/editati.png" width="30px" alt="Edit"></div></th>
                                    </form>
                                </td><!--Редактировать-->
                                <td>
                                    <form action="<?php echo PROOT;?>mypage/editarticle" method="post">
                                        <input type="hidden" name="delArticle" value="<?php echo $this->data[$i]['id'];?>">
                                        <input type="image" src="<?php echo PROOT;?>img/delati.png" width="30px" alt="Del"></div></th>
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
            
            
            
            
            
        </div>
<?php $this->end(); ?>