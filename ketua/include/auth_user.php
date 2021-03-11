<?php
		if($_SESSION["level"] == 'Ketua'){
			header("location: ");
		}else{
			{header("location: ../login?action=masuk-dulu");}
		}
?>