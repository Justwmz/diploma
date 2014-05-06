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
					<th>Видалити</th>
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
							$responsible = $db->getAll("SELECT * FROM users WHERE access = 5");
							// 22
							/*echo("<td>");
							echo("<form action='responsible_upd.php' method='POST'>");
							echo("<input type='hidden' value='".$incidents[$i]['id']."' name='id'>");
								echo("<select class='form-control' name='responsible'>");
									for($y=0;$y<count($responsible);$y++)
									{
										echo("<option value='".$responsible[$y]['id']."'>".$responsible[$y]['first']." ".$responsible[$y]['last']."</option>");	
									}
								echo("</select>");
								echo("<button type='sumbmit' class='btn btn-danger btn-sm' style='margin: 5px'>Назначити</button>");
							echo("</form>");
							echo("</td>");*/
							echo("<td>
								<button class='btn btn-info btn-xs' data-toggle='modal' data-target='#View'><span class='glyphicon glyphicon-search'></span></button>
								<button class='btn btn-warning btn-xs' data-toggle='modal' data-target='#Edit'><span class='glyphicon glyphicon-edit'></span></button>
								<button class='btn btn-danger btn-xs' data-toggle='modal' data-target='#Delete'><span class='glyphicon glyphicon-remove'></span></button>
									  </td>");
						echo("</tr>");
					}
					//<center><a href='remove.php?id=".$incidents[$i]['id']."'><span class='glyphicon glyphicon-remove'></span></a></center>
					?>
				</table>          		
			</div>      	
		  </div>


<!-- Modal View -->
<div class="modal fade" id="View" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Видалення</h4>
      </div>
      <div class="modal-body">
       Ви впевнені в цьому?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
        <?php
        $incidents = $db->getAll("SELECT * FROM incidents");
					for($i=0;$i<count($incidents);$i++){
						echo("<a class='btn btn-danger' href='remove.php?id=".$incidents[$i]['id']."'>Так</a>");
					}
        ?>
        <button type="button" class="btn btn-danger">Так</button>
      </div>
    </div>
  </div>
</div>