<?php
/**
 * @file views-view-grid.tpl.php
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)) : ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="clearfix deco-wrapper">
<div class="dollcat-bg1 bg"></div>
<div class="dollcat-bg2 bg"></div>
<div class="dollcat-bg3 bg"></div>

<div class="mtd-banner"></div>

<?php print "<h2 class='bannerdesc-mtdtext'> This is our OG Lookbook. It includes all of our Regular Dolls, Deluxe Dolls, Hairplay Dolls and Retro Dolls. Collect us all and create a world of your own. Let' start discovering, playing and imagining today!</h2>"; ?>


<table class="<?php print $class; ?>"<?php print $attributes; ?>>
  <tbody>
    <?php foreach ($rows as $row_number => $columns): ?>
      <tr class="<?php print $row_classes[$row_number]; ?>">
        <?php foreach ($columns as $column_number => $item): ?>
          <td class="<?php print $column_classes[$row_number][$column_number]; ?>">
            <?php print $item; ?>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

