

<body class="login-body">

	<div class="mainDiv">
	
	
		<h2 style="text-align:center">Proposer un echange</h2>
		
		<hr>
	
		<div class="form-group player-select">
				
			<form role="form" action="echanges.controller.php?playerselect=true" method="post">
				<label for="selection">Selectionnez le joueur avec qui vous désirez échanger:</label>
				<select class="form-control" id="selection" name="my-selection">
					<option></option>
					<?php
					foreach($players as $player)
					{
						if($playerId != $player['id_membre'])
							echo '<option>'.$player['pseudo'].'</option>';
					}
					?>
				</select>
				<button type="submit" name="player-select" class="btn btn-default">Selectionner !</button>
			
			</form>
		
		</div>
	
		<form role="form" method="post" action='mesechanges.controller.php?proposition=true'>
			<div class="echange-proposition">
			
				<div class="echange-header"><h2>Je propose:</h3></div>
				
				<div class="echange-form-one">
					
						<div class="form-group" id="propositions" class="my-selection-cards">							
							<select class="form-control">
								<option></option>
								<?php
								foreach($playerCards as $card)
								{
									$adresse = $controller->getAddNameById($card['id_carte']);
									echo '<option>'.$adresse.'</option>';
								}
								
								?>
							</select>

						</div>
							

				</div>
			

			</div>
		
		
		
			<div class="echange-proposition">
			
				<div class="echange-header"><h2>Contre: </h3> </div>
				
				<div class="echange-form-two"> 

						<div class="form-group" id="wantings">
						
							<select class="form-control" name="other-selection">
								<option></option>
								<?php
								if (isset($selectedPlayersCards))
									foreach($selectedPlayersCards as $card)
									{
										$adresse = $controller->getAddNameById($card['id_carte']);
										echo '<option>'.$adresse.'</option>';
									}
								
								?>
							</select>
						
						</div>
		
						<button type="submit" class="btn btn-default">Proposer cet echange</button>
				</div>
			</div>
		</form>



	</div>
	
</body>