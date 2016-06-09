 
 <body class="login-body">
 
	<div class="mainDiv">
	
		<h2 style="text-align:center">Mes echanges</h2>
		<hr>
	
		<h3>Demandes:</h3>
		<div>
			<table>
			<?php
			foreach($demandes as $demande)
			{
				if($demande['confirmed'] == 0)
				{
					$pseudoDemandeur = $controller->getMemberById($demande['id_membre'])['pseudo'];
					$carteProposee = $controller->findCardTrade($demande['id_trade'])['id_carteD'];
					$carteDemandee = $controller->findCardTrade($demande['id_trade'])['id_carteO'];
					
					$carteProposeeAdd = $controller->getAddNameById($carteProposee);
					$carteDemandeeAdd = $controller->getAddNameById($carteDemandee);
					
					echo '<tr>
							<td>Demandeur: '.$pseudoDemandeur.' </td>
							<td>Carte proposee: '.$carteProposeeAdd.' </td>
							<td>Carte demandee: '.$carteDemandeeAdd.' </td>
							<td><a href="confirmTrade.php?idTrade='.$demande['id_trade'].'">Valider l\'echange</a></td>
						</tr>';
				}
					
			}
			?>
			</table>
		</div>
	
	
	</div>

 
 </body>