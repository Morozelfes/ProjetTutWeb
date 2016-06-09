

<body class="login-body">

	<div class="mainDiv">
	
		<div class="form-group">
				
			<form role="form">
				<label for="selection">Selectionnez le joueur avec qui vous désirez échanger:</label>
				<select class="form-control" id="selection">
					<?php
					foreach($players as $player)
					{
						if($playerId != $player['id_membre'])
							echo '<option>'.$player['pseudo'].'</option>';
					}
					?>
				</select>
			
			</form>
		
		</div>
	

		<div class="echange-proposition">
		
			<div class="echange-header"><h2>Je propose:</h3></div>
			
			<div class="echange-form">
				<form role="form" method="post" action='#'>
					<div class="form-group" id="propositions"></div>
						
					
					<div></div>
				
				
				</form>


			</div>
		
		
		</div>
		
		
		
		<div class="echange-proposition">
		
			<div class="echange-header"><h2>Contre: </h3> </div>
			
			<div class="echange-form"> 
				<form role="form" method="post" action='#'>
					<div class="form-group" id="wantings"></div>
						
					
					<div></div>
				
				
				</form>
			
			
			</div>
		</div>




	</div>
	
</body>