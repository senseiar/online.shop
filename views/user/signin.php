<?php require_once ROOT . '/views/layouts/header.php'?>

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				
				<div  class="col-md-4 col-md-offset-4">

                        <?php if(isset($errors) && is_array($errors)): ?>
							<ul>
								<?php foreach ($errors as $error): ?>
								    <li> - <?php echo $error; ?></li>
								<?php endforeach; ?>
							</ul>
                    	<?php endif; ?> 

						<div class="login-form"><!--sign in form-->
							<h2>Вход</h2>
							<form action="#" method="post">
			
								<input type="email" name="email" placeholder="Email Адресс" value="<?= $email ?>"/>
								<input type="password" name="password" placeholder="Пароль"/>
								<button type="submit" name="submit" class="btn btn-default">Подтвердить</button>
								
							</form>

							<p><a href="/user/signup">Зарегистрироваться</a></p>
						</div><!--/sign up form-->
					
				</div>

			</div>
		</div>
</section><!--/form-->


<?php require_once ROOT . '/views/layouts/footer.php'?>