<?php require_once ROOT . '/views/layouts/header.php'?>

<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Обратная связь</h2>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Напишите нам</h2>
	    				
						<?php if($result):?>
							<p>Сообщение отправлено, ждите ответ.</p>
						<?php else: ?>
							<?php if(isset($errors) && is_array($errors)): ?>
							<ul>
								<?php foreach ($errors as $error): ?>
								    <li> - <?php echo $error; ?></li>
								<?php endforeach; ?>
							</ul>
                    	<?php endif; ?>

						
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="userName" class="form-control" placeholder="Имя">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="userEmail" class="form-control" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="userSubject" class="form-control" placeholder="Тема">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="userMessage" id="message"  class="form-control" rows="8" placeholder="Ваше сообщение"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Отправить">
				            </div>
				        </form>

						<?php endif;?>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Контактная информация</h2>
	    				<address>
	    					<p>E-Shopper Inc.</p>
							<p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
							<p>Newyork USA</p>
							<p>Mobile: +2346 17 38 93</p>
							<p>Fax: 1-714-252-0026</p>
							<p>Email: info@e-shopper.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Мы в соц. сетях</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->


<?php require_once ROOT . '/views/layouts/footer.php'?>