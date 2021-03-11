<?php
		if($_SESSION["level"] == 'Admin'){
			header("location: ");
		}else{
			{header("location: ../login?action=masuk-dulu");}
		}
?>