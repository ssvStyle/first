<?php $this->setSiteTitle('Запись');?>
<?php $this->start('head'); ?>
 <!--head-->
<meta content="test">
   
<?php $this->end(); ?>

<?php $this->start('body'); ?>
        <!--body-->
        <div class="rightCol">
		<h3>Добавить новую запись</h3>
				<hr>
                                <b>Выбранна дата:</b> День - <?php echo $this->data['date']['day']; ?>
            Месяц - <?php echo $this->data['date']['month']; ?>
            Год - <?php echo $this->data['date']['year']; ?>
					<div class="singIn">
							<form action="lib/write.php" method="post"  id="form">
										<div id="dayTime"><br>
											<?php foreach ($this->data as $k=>$v){
												if ($v !== false && $k != 'date'){?>
													<div id="timeOff">&nbsp<input type="radio" name="hour" disabled="disabled" value="<?php echo $k;?>">&nbsp&nbsp&nbsp<?php echo $k;?> &nbsp&nbsp<?php echo $v;?></div>
												<?php }else if($v === false && $k != 'date'){?>
													<div id="time">&nbsp<input type="radio" onclick="checkInput(document.getElementById('form'))" name="hour" value="<?php echo $k;?>">&nbsp&nbsp&nbsp<?php echo $k;?> &nbsp&nbspСвободно</div>
												<?php }}?>
										</div>
									<div id="service">
									<p><b>Что будем делать?</b></p>
											
										<select name="service">
											<option value="Стрижка" disable>Стрижка</option>
											<option value="Стрижка два человека">Стрижка два человека</option>
											<option value="Стрижка челки">Стрижка челки</option>
											<option value="Укладка">Укладка</option>
											<option value="Укладка (Накрутка)">Укладка (Накрутка)</option>
											<option value="Окрашивание в 1 тон">Окрашивание в 1 тон</option>
											<option value="Окрашивание (Корень)">Окрашивание (Корень)</option>
											<option value="Мелирование">Мелирование</option>
											<option value="Колорирование">Колорирование</option>
											<option value="Омбрэ">Омбрэ</option>
											<option value="Блондирование">Блондирование</option>
											<option value="------------">------------</option>
										</select>&nbsp &nbsp 
										<select name="serviceAdd">
											<option value="" disable>Доп. услуги</option>
											<option value="Концы">Концы</option>
											<option value="Стрижка челки">Стрижка челки</option>
											<option value="Укладка">Укладка</option>
											<option value="Окрашивание (Корень)">Окрашивание (Корень)</option>
											<option value="Окрашивание в 1 тон">Окрашивание в 1 тон</option>
											<option value="Мелирование">Мелирование</option>
											<option value="Колорирование">Колорирование</option>
											<option value="Омбрэ">Омбрэ</option>
											<option value="Блондирование">Блондирование</option>
											<option value="Тонирование">Тонирование</option>
											<option value="------------">------------</option>
										</select>&nbsp*
										
										<input type="hidden" name="day" value="<?php echo $arayDate['day'];?>">
										<input type="hidden" name="month" value="<?php echo $arayDate['month'];?>">
										<input type="hidden" name="year" value="<?php echo $arayDate['year'];?>">
										<input type="hidden" name="name" value="<?php echo $_SESSION['name'];?>">
										<input type="hidden" name="phone" value="<?php echo $_SESSION['phone'];?>">
										<input type="hidden" name="email" value="<?php echo $_SESSION['email'];?>">
				
										<p>Коментарий к записи **</p>
										<textarea name="msg" rows="7" cols="35"></textarea><br>
										<?php if (isset($_SESSION['user_id'])){?>
										<br><input type="submit" disabled="disabled" id="Button" value="Bыберите время">
										<?php } else {?>
										<p>Для записи <?php include 'views/needReg.php';?> <a href="registration.php">регистрация</a></p>
										<?php }?>
										
										<br><br><br>
										<p>* <span>Доп. услуги выберите если нужно несколько услуг например: стрижка и мелирование.</span></p>
										<p>** <span>Коментарий к записи для уточнения (можно не заполнять).</span></p>
										
									</div>
							</form>
						</div>
						
				</div>
<?php $this->end(); ?>