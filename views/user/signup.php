<?php require_once ROOT . '/views/layouts/header.php'?>

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				
			<div  class="col-md-4 col-md-offset-4">

					<?php if ($reg): ?>
						<p>Вы зарегестрированы!</p>
					<?php else :?>

                    	<?php if(isset($errors) && is_array($errors)): ?>
							<ul>
								<?php foreach ($errors as $error): ?>
								<li> - <?php echo $error; ?></li>
								<?php endforeach; ?>
							</ul>
                    	<?php endif; ?>    

						<div class="signup-form"><!--sign up form-->
							<h2>Регистрация</h2>
							<form action="#" method="post">

								<input type="text" name="name" placeholder="Имя" value="<?= $name ?>"/>
								<input type="email" name="email" placeholder="Email Адресс" value="<?= $email ?>"/>
								<input type="password" name="password" placeholder="Пароль" value=""/>
								<input type="password" name="password_confirm" placeholder="Повторите пароль" value=""/>	
								<button type="submit" name="submit" class="btn btn-default">Подтвердить</button>
								
							</form>

							<p><a href="/user/signin">Я уже зарегистрирован</a></p>
						</div><!--/sign up form-->
					<?php endif; ?>  
				</div>

			</div>
		</div>
</section><!--/form-->


<?php require_once ROOT . '/views/layouts/footer.php'?>