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
					<th>Відповідальний</th>
					<th>Видалити</th>
					</tr>
					<?php
					$incidents = $db->getAll("SELECT * FROM incidents");
					$users = $db->getOne("SELECT id FROM users");
					for($i=0;$i<count($incidents);$i++){
						echo("<tr>");
							echo("<td>".$incidents[$i]['id']."</td>");
							$des_service = $db->getOne("SELECT name FROM service WHERE id = ".$incidents[$i]['service']."");
							echo("<td>".$des_service."</td>");
							echo("<td></td>");
							$desc = $incidents[$i]['description'];
							echo("<td>".substr(strip_tags($desc), 0, strpos(strip_tags($desc), ' ', 10))."...</td>");
							$des_influence = $db->getOne("SELECT name FROM influence WHERE id = ".$incidents[$i]['influence']."");
							echo("<td>".$des_influence."</td>");
							$des_class = $db->getOne("SELECT name FROM class WHERE id = ".$incidents[$i]['class']."");
							echo("<td>".$des_class."</td>");
							$des_from_user = $db->getRow("SELECT * FROM users WHERE id = ".$incidents[$i]['from_user']."");
							echo("<td>".$des_from_user['first']." ".$des_from_user['last']."</td>");
							echo("<td>".$incidents[$i]['date']."</td>");
							$responsible = $db->getAll("SELECT * FROM users WHERE access = 5");
							echo("<td>");
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
							echo("</td>");
							echo("<td>
								<button class='btn btn-warning btn-xs' data-toggle='modal' data-target='#Edit'><span class='glyphicon glyphicon-edit'></span></button>
								<button class='btn btn-danger btn-xs' data-toggle='modal' data-target='#Delete".$incidents[$i]['id']."'><span class='glyphicon glyphicon-remove'></span></button>
									  </td>");
						echo("</tr>");
					}
					//<center><a href='remove.php?id=".$incidents[$i]['id']."'><span class='glyphicon glyphicon-remove'></span></a></center>
					?>
				</table>          		
			</div>      	
		  </div>
<!-- Modal Edit -->
<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Редагування</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
        <button type="button" class="btn btn-primary">Відправити</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<?php
$incidents = $db->getAll("SELECT * FROM incidents");
	for($i=0;$i<count($incidents);$i++){
echo("<div class='modal fade' id='Delete".$incidents[$i]['id']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>");
  echo("<div class='modal-dialog'>");
    echo("<div class='modal-content'>");
      echo("<div class='modal-header'>");
        echo("<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>");
        echo("<h4 class='modal-title' id='myModalLabel'>Видалення</h4>");
      echo("</div>");
      echo("<div class='modal-body'>");
      echo("Ви впевнені в цьому?");
      echo("</div>");
      echo("<div class='modal-footer'>");
        echo("<button type='button' class='btn btn-default' data-dismiss='modal'>Закрити</button>");
		echo("<a class='btn btn-danger' href='remove.php?id=".$incidents[$i]['id']."'>Так</a>");
      echo("</div>");
    echo("</div>");
  echo("</div>");
echo("</div>");
}
?>