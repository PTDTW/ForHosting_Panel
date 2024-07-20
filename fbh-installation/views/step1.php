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
		      	<h3 class="text-center mb-4">🔧 Mysql設置資料庫 🔧</h3>
						<form action="./action/sqlSet.php" class="login-form" method="POST">
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="sqlLocal" placeholder="資料庫主機位置" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="text" class="form-control rounded-left" name="sqlAcc" placeholder="資料庫帳號名" required>
	            </div>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" name="sqlPwd" placeholder="資料庫密碼(如果沒有密碼，請填NOPwd" required>
	            </div>
	            <div class="form-group d-flex">
	              <input type="text" class="form-control rounded-left" name="sqlDB" placeholder="資料庫名稱" required>
	            </div>
	            <?php if (isset($_POST['err'])): ?>
	            <div style="color: #ff0000;"><?php echo $_POST['err'] ?></div>
	            <?php endif ?>
	            <?php if (isset($_POST['okMsg'])): ?>
	            <div style="color: #83ed32;"><?php echo $_POST['okMsg'] ?></div>
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

