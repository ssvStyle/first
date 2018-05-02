<?php $this->setSiteTitle('Моя страница');?>
<?php $this->start('head'); ?>
 <!--head-->
<meta content="test">
   
<?php $this->end(); ?>

<?php $this->start('body'); ?>
        <!--body-->
        <div class="rightCol">
            <div class="myPage">
		<h2>Моя страница</h2><hr><br>
                <?php if ($this->data !== FALSE) {;?>
                    <?php for($i = 0; $i < count($this->data); $i++){?>
                                      <table id="table"  width="100%" border="1px" cellpadding="3px" cellspacing="0">
                                            <tr>
                                            <th width="100px">Д.М.Г<br>Время</th><th colspan="3">Info<div style="float: right">

                                                    <form action="<?php echo PROOT;?>mypage/delete" method="post">
                                                            <input type="hidden" name="deleteById" value="<?php echo $this->data[$i]['id'];?>">
                                                            <input type="image" src="<?php echo PROOT;?>img/delete.png" width="20px" alt="Удалить"></div></th>
                                                    </form>
                                            </th>
                                       </tr>
                                                    <tr>
                                                        <td rowspan="5" style="text-align: center;"><?php echo $this->data[$i]['day'].'.'.$this->data[$i]['month'].'.'.$this->data[$i]['year'];?><br><?php echo $this->data[$i]['hour'];?></td>
                                                            <th width="100px">Имя</th><td><?php echo $this->data[$i]['name'];?></td>
                                                                     <tr>
                                                                            <th>Номер</th><td colspan="4"><?php echo $this->data[$i]['number'];?></td>
                                                                     </tr>
                                                                     <tr>
                                                                            <th>Услуги</th><td colspan="4"><?php echo $this->data[$i]['service'];?>, <?php echo $this->data[$i]['serviceAdd'];?></td>
                                                                     </tr>
                                                                     <tr>
                                                                            <th colspan="4" id="activ" class="flip" >Коментарий</th>
                                                                     </tr>
                                                                     <tr>
                                                                     <td colspan="3"><div><?php echo $this->data[$i]['msg'];?></div></td>
                                                                     </tr>
                                               </tr>

                                      </table>
                                     <br>
                                    <?php }?>
                                 <?php } else {?>
                                     Вы еще не записывались(((<br> Но это всегда <a href="http://localhost/SSV/entry">можно исправить)))</a>
                                 <?php }?>
                
                
            </div>
	</div>
        
        
        
        
<?php $this->end(); ?>