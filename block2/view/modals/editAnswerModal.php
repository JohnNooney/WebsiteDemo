<?php
ob_start();
session_start();

echo '
<!-- Modal HTML -->
<div id="editAnswerModal" class="modal fade">
<div class="modal-dialog modal-login">
	<div class="modal-content">
		<form action="../controller/blog_edit.php" method="post" form="newAnswerForm">
			<div class="modal-header">
				<h4 class="modal-title">Update Answer</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>New Answer</label>
					<textarea id="newAnswerTxt" class="form-control" rows="3" name="answer"></textarea>
				</div>
			</div>
			<div class="modal-footer">
                <input id="anoEdit" type=hidden name=ano value="">
				<input type="submit" class="btn btn-primary pull-right" value="Update Answer" name="editAnswer">
			</div>
		</form>
	</div>
</div>
</div>';

 ?>
