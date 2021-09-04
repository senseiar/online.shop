<?php require_once ROOT . '/views/layouts/header.php'?>

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				
				<div class="padding-right">

                <?php if($result): ?>
                    <p>Данные отредактированы!</p>
                <?php else: ?>    

                        <?php if(isset($errors) && is_array($errors)): ?>
							<ul>
								<?php foreach ($errors as $error): ?>
								    <li> - <?php echo $error; ?></li>
								<?php endforeach; ?>
							</ul>
                    	<?php endif; ?> 

						<div class="signup-form"><!--sign up form-->
							<h2>Редактировать профиль</h2>
							<form action="#" method="post">

                                <label>Имя</label>
								<input type="text" name="name" placeholder="Имя" value="<?= $name ?>"/>
                                <label>Изменить пароль</label>
								<input type="password" name="password" placeholder="Новый пароль"/>
								<label>Подтвердите пароль</label>
								<input type="password" name="password_confirm" placeholder="Новый пароль"/>	
								<button type="submit" name="submit" class="btn btn-default">Подтвердить</button>
								
							</form>

					<?php endif; ?>		
						</div><!--/sign up form-->
					
				</div>

			</div>
		</div>
</section><!--/form-->


<?php require_once ROOT . '/views/layouts/footer.php'?>