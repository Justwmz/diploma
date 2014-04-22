          <div class="row">
          	<div class="col-md-12">
				<table class="table table-bordered">
					<tr>
					<th>№</th>
					<th>Послуга</th>
					<th>Статус</th>
					<th>Опис проблеми</th>
					<th>Вплив</th>
					<th>Категорія запиту</th>
					<th>Від кого</th>
					<th>Коли</th>
					</tr>
					<?php
					$incidents = $db->getAll("SELECT * FROM incidents");

					for($i=0;$i<count($incidents);$i++){
						echo("<tr>");
							echo("<td>".$incidents[$i]['id']."</td>");
							$des_service = $db->getOne("SELECT name FROM service WHERE id = ".$incidents[$i]['service']."");
							echo("<td>".$des_service."</td>");
							echo("<td></td>");
							echo("<td>".$incidents[$i]['description']."</td>");
							$des_influence = $db->getOne("SELECT name FROM influence WHERE id = ".$incidents[$i]['influence']."");
							echo("<td>".$des_influence."</td>");
							$des_class = $db->getOne("SELECT name FROM class WHERE id = ".$incidents[$i]['class']."");
							echo("<td>".$des_class."</td>");
							$des_from_user = $db->getRow("SELECT * FROM users WHERE id = ".$incidents[$i]['from_user']."");
							echo("<td>".$des_from_user['first']." ".$des_from_user['last']."</td>");
							echo("<td>".$incidents[$i]['date']."</td>");
						echo("</tr>");
					}
					?>
				</table>          		
          	</div>      	
          </div>