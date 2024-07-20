<?php 

function error_Logger($errDec, $errDec2=""){
	?>
    <table style="background-color: #ff8000;
				color: #fff;
				font-size: 20px;
				padding: 5px;
				border: 3px #ff0000 solid;
				box-shadow: 10px 5px 5px #ff0000;
				text-shadow: 1px 1px 20px #000;"> <!-- 使用 border 属性添加表格边框 -->
        <thead>
            <tr>
                <th><b>( ! )發生錯誤</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><b>錯誤內容: <?php echo $errDec ?></b></td>
            </tr>
        	<?php if(isset($errDec2)): ?>
                <td><b><?php echo $errDec2 ?></b></td>
            <?php endif ?>
        </tbody>
    </table>
	<?php
}

?>