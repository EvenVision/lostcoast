<h2>
  <small class="line">Schedule</small>
  <span class="line"><sup>a</sup> tour</span>
</h2>
<div id="form-contents">
  <div class="form-row">
    <div class="box date">
      <?php print render($form['date']); ?>
    </div>
    <div class="box time">
      <?php print render($form['time']); ?>
    </div>
    <div class="box guests">
      <?php print render($form['guests']); ?>
    </div>
  </div>
  <div class="form-row">
    <?php print render($form['name']); ?>
  </div>
  <div class="form-row">
    <?php print render($form['email']); ?>
  </div>
  <div class="form-row">
    <?php print render($form['phone']); // not working yet ?>
  </div>
  <div class="text-holder">
    <!-- <p>Tour Interface Currently under Maintenance. Please call 707-267-9651 for availability. Sorry for the inconvenience!</p> -->
    <p>24-hour notice please or call 707-267-9651 for availability.<br>Please check in 5-10 minutes early.<br>Tour lasts 30-40 minutes.<br>Must be 21 and older for all tastings. (ID required)</p>
  </div>
  <div class="submit-holder">
    <?php print render($form['submit']); ?>
  </div>
</div>
<?php
  print render($form['form_build_id']);
  print render($form['form_id']);
  print render($form['form_token']);
?>
