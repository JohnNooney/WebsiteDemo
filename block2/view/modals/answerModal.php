<?php
ob_start();
session_start();

echo '
<!-- Modal HTML -->
<div id="answerModal" class="modal fade">
<div class="modal-dialog modal-login">
	<div class="modal-content">
		<form action="../controller/postAnswer.php" method="post" form="answerForm">
			<div class="modal-header">
				<h4 class="modal-title">Draft Answer</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Answer</label>
					<textarea class="form-control" rows="3" name="answer"></textarea>
				</div>
			</div>
			<div class="modal-footer">
                <input id="userIdInput" type=hidden name=userIdtest value=' . $_SESSION['userId'] . '>
                 <input class="dttm" type=hidden name="dttm" id="dttmAnswer" value="">
                <input id="qno" type=hidden name=qno value="">
				<input type="submit" class="btn btn-primary pull-right" value="Post Answer" name="submitAnswer">
			</div>
		</form>
	</div>
</div>
</div>';

 ?>
