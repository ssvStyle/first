<?php $this->setSiteTitle('Регистрация');?>
<?php $this->start('head'); ?>
 <!--head-->
<meta content="test">
   
<?php $this->end(); ?>

<?php $this->start('body'); ?>
        <!--body-->
        <div class="rightCol"><div class="result"><?php// emptyForm();?></div><?php dnd($this->data); ?>
				<h3>Регистрация нового пользователя</h3><hr><br>
				<form method='post' class='reg-form'>
							
						<div class='form-row'>
							<label for='form_fname'>Имя: </label>
							<input type='text' id='form_fname' name='name' value="<?php echo (isset($_POST['name']))? $_POST['name']:"";?>">
							<br><span>Например: Александра или Alexandra</span>
						</div>
							<div class="formErr"><?php //checkName();?></div>

						<div class='form-row'>
							<label for='form_email'>E-mail: </label>
							<input type='email' id='form_email' name='email'value="<?php echo (isset($_POST['email']))? $_POST['email']:"";?>">
						</div>
							<div class="formErr"><?php //checkEmail();?></div>

						<div class='form-row'>
							<label for='form_phone'>Телефон: </label>
							<input type='text' id='form_phone' name='phone' value="<?php echo (isset($_POST['phone']))? $_POST['phone']:"";?>">
							<br><span>(Логин) В формате: 0679070779, 0487774422</span>
						</div>
							<div class="formErr"><?php //checkPhone();?></div>
						
						<div class='form-row'>
							<label for='form_phone'>Пароль: </label>
							<input type='password' id='form_phone' name='pass'>
							<br><span>Придумайте пароль от 6 до 15 лат. букв и цифр</span>
						</div>
						
						<div class='form-row'>
							<label for='form_phone'>Повторите пароль: </label>
							<input type='password' id='form_phone' name='passConfirm'>
						</div>
							<div class="formErr"><?php //checkPass();?></div>
							<div class="formErr"><?php //emptyForm();?></div>

						<div class="submit">
							<input type="submit" value='Зарегистрироваться'>
						</div>
				</form>
				
				</div>
        
        
        
        
<?php $this->end(); ?>