<!-- modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal">
  <div class="modal-dialog" role="document">
	<?php //$messages = drupal_get_messages(); ?>
	<?php //print render($messages); ?>
	<?php //dpm($form); ?>
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="inner-text">+</span></button>
  	  <div class="hidden"><?php print_r(array_values($form['date'])); ?></div>
      <?php print render($form); ?>
    </div>
  </div>
</div>