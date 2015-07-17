<?php
/**
 * @file views-view.tpl.php
 * Main view template
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>  
  <?php if ($title): ?>    
    <?php print $title; ?>    
  <?php endif; ?>
  <?php if ($rows): ?>
    <!-- A wrapper DIV to center the Gallery -->
    <div class="view-content" style="text-align:center;"> 
        <!-- <h3>Video Gallery</h3>  -->    
        <!-- Define the Div for Gallery -->
        <!-- 1. Add class html5gallery to the Div -->
        <!-- 2. Define parameters with HTML5 data tags -->
        <div style="display:none;margin:0 auto;" class="html5gallery" data-skin="mediapage" data-width="800" data-height="450" data-resizemode="fill" >
        <!-- data-autoplayvideo="false"  data-playvideoonclick="false" -->
          <?php print $rows; ?>
        </div>      
    </div>  
  <?php endif; ?>  
  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>
  <script>
    jQuery(function($){
      var set_height = function(){
        //var car_length = jQuery('div.html5gallery-tn-0').height();
        var count = $('.html5gallery-tn-0').length;
        var rows = Math.floor(count/3) + 1;
        var car_length = rows*180;
        //alert(rows);
        jQuery('div.html5gallery').height(740+car_length);
        jQuery('div.html5gallery-container-0').height(740+car_length);
      };
      setTimeout(set_height, 1000);
      
    });
  </script>
  