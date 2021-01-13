<?php
ob_start();
session_start();

echo '
<!-- Modal HTML -->
<div id="editQuestionModal" class="modal fade">
<div class="modal-dialog modal-login">
	<div class="modal-content">
		<form action="../controller/blog_edit.php" method="post" form="newQuestionForm">
			<div class="modal-header">
				<h4 class="modal-title">Update Question</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>New Answer</label>
					<textarea id="newQuestionTxt" class="form-control" rows="3" name="question"></textarea>
				</div>
			</div>
			<div class="modal-footer">
                <input id="qnoEdit" type=hidden name=qno value="">
				<input type="submit" class="btn btn-primary pull-right" value="Update Question" name="editQuestion">
			</div>
		</form>
	</div>
</div>
</div>';

 ?>
