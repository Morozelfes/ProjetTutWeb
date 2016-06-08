<!DOCTYPE html>

<body class="login-body">	
		<div class="mainDiv">
			<h2 style="text-align:center">Mes cartes</h2>
			
			<hr style="background-color: black; line-height:2">
		
			<div> 
				<table>
				<?php
				$i = 0;
				foreach($playersCards as $card)
				{
					
					$address = $controller->getAddNameById($card['id_carte']);
					$color = $controller->getColorByCardId($card['id_carte']);
					if($i==0)
						echo '<tr>';
					?>
					<td>
						<div class="card">
							<div class="card-header card-header-<?=$color?>"><strong><?=$address?></strong></div>
						</div>
					</td>
					<td>
						<div style="width:15px"></div>
					<td>	
						<?php
					$i++;
					if($i==3)
					{
						echo'</tr>';
						$i=0;
					}
				}?>
			</div>
		
		</div>
</body>
	