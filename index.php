		<?php
		session_start();
		include 'models\Bd.php';

		if (isset($_SESSION['nick'])) {
			header('Location:views/you_page.php');
			exit();
		}


		?>
		<!DOCTYPE html>
		<html>

		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>страница регистрации</title>
			<link rel="stylesheet" href="/views/Style/style_index.css">


		</head>

		<body>
			<div class="main">
				<div class="form">
					<form action="/controllers/Registration/registration_controller.php" method="POST">
						<div class="input">
							<input placeholder="введите nick" type="text" name="nick">
						</div>
						<div class="input">
							<input placeholder="введите имя" type="text" name="name">
						</div>

						<div class="input">
							<input placeholder="введите пароль" type="password" name="password">
						</div>
						<div>
							<button class="button_ent" formaction="controllers/Entr_Log/entr_controller.php">войти</button>

							<button class="button_sub" type="submit">регистрация</button>
						</div>

						<?php if (isset($_SESSION['mesage_info'])) : ?>

							<div class="mesage_info">
								<?php echo ($_SESSION['mesage_info']); ?>
							</div>
							<?php unset($_SESSION['mesage_info']); ?>
						<?php endif; ?>
				</div>
				<div>
					
					
				</div>
			</div>
		</body>

		</html>