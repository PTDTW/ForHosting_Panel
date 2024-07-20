<!doctype html>
<html lang="en">
  <head>
  	<title>FHosting Panel安裝介面</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="./assets/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<!-- <span class="fa fa-user-o"></span> -->
				<img src="./assets/img/FHP.png" style="
					border-radius: 100%;
					width: 100px;
				">
		      	</div>
		      	<h3 class="text-center mb-4">🔧 系統位置設置 🔧</h3>
					<form action="./action/systDirSetting.php" class="login-form" method="POST">
					<div class="form-group">
						<select name="panelHttp" class="form-control rounded-left">
							<option value="http://" <?php echo (empty($_SERVER['HTTPS'])) ? "selected" : " ";?>>http://</option>
							<option value="https://" <?php echo (isset($_SERVER['HTTPS'])) ? "selected" : " ";?>>https://</option>
						</select>
		      		</div>	
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="panelDomain" value="<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'];?>" placeholder="面板網址[必填]" required>
		      		</div>
					<div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="panelDir" value="<?php echo str_replace("fbh-installation/install-page.php", "", $_SERVER['REQUEST_URI']);?>" placeholder="面板路徑[必填](不包含網址)" required>
		      		</div>
	            <?php if (isset($_POST['err'])): ?>
	            <div style="color: #ff0000;"><?php echo $_POST['err'] ?></div>
	            <?php endif ?>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">下一步  ➡️</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>
	<script src="./assets/js/jquery.min.js"></script>
  <script src="./assets/js/popper.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
  <script src="./assets/js/main.js"></script>

	</body>
</html>

