<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<div>
<p class="contact-info">Whether you’re short or tall, you plié or play goalie, prefer chocolate or cherry, we want to hear your story. 
<br>
Please reach out to us anytime. </p>
</div>
<?php if (!empty($title)): ?>
  <!--<h3><?php print $title; ?></h3>-->
<?php endif; ?>
<div class="clearfix">
<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>
</div>
<div>
<p class="contact-info">Retailers please email us at:
OGsales@battatco.com</p></div>