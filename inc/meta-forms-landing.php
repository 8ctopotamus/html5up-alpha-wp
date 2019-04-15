<div class="h5ua_box">
  <h4>Hero Call-to-action Links</h4>
  <p class="meta-options h5ua_field">
    <label for="h5ua_cta_1_text">Button 1 Text</label>
    <input id="h5ua_cta_1_text"
      type="text"
      name="h5ua_cta_1_text"
      value="<?php echo esc_attr( get_post_meta( get_the_ID(),'h5ua_cta_1_text', true )); ?>"
    />
  </p>
  <p class="meta-options h5ua_field">
    <label for="h5ua_cta_1_link">Button 1 Link</label>
    <input id="h5ua_cta_1_link"
      type="url"
      name="h5ua_cta_1_link"
      value="<?php echo esc_attr( get_post_meta( get_the_ID(),'h5ua_cta_1_link', true )); ?>"
    />
  </p>
  <p class="meta-options h5ua_field">
    <label for="h5ua_cta_2_text">Button 2 Text</label>
    <input id="h5ua_cta_2_text"
      type="text"
      name="h5ua_cta_2_text"
      value="<?php echo esc_attr( get_post_meta( get_the_ID(),'h5ua_cta_2_text', true )); ?>"
    />
  </p>
  <p class="meta-options h5ua_field">
    <label for="h5ua_cta_2_link">Button 2 Link</label>
    <input id="h5ua_cta_2_link"
      type="url"
      name="h5ua_cta_2_link"
      value="<?php echo esc_attr( get_post_meta( get_the_ID(),'h5ua_cta_2_link', true )); ?>"
    />
  </p>
  <hr/>
  <h4>Main Box Card</h4>
  <p class="meta-options h5ua_field">
    <label for="h5ua_main_box_title">Title</label>
    <input id="h5ua_main_box_title"
      type="text"
      name="h5ua_main_box_title"
      value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'h5ua_main_box_title', true )); ?>"
    />
  </p>
  <label for="h5ua_main_box_title">Content</label>
  <?php 
    $text = get_post_meta(get_the_ID(), 'h5ua_main_box_content' , true );
    wp_editor( htmlspecialchars_decode($text), 'h5ua_main_box_content', $settings = array( 'textarea_name' => 'h5ua_main_box_content' ) );
  ?>
  <label for="h5ua_main_box_title">Image</label>
  <?php 
  $url = get_post_meta($post->ID, 'my-image-for-post', true); ?>
  <input id="h5ua_main_box_image_url" name="h5ua_main_box_image_url" type="text"
         value="<?php echo $url;?>" style="width:400px;" />
  <input id="main_box_upl_button" type="button" value="Upload Image" /><br/>
  <img src="<?php echo $url;?>" style="width:200px;" id="picsrc" />
  <script>
    jQuery(document).ready( function($) {
      jQuery('#main_box_upl_button').click(function() {
        window.send_to_editor = function(html) {
          imgurl = jQuery(html).attr('src')
          jQuery('#h5ua_main_box_image_url').val(imgurl);
          jQuery('#picsrc').attr("src", imgurl);
          tb_remove();
        }
        formfield = jQuery('#h5ua_main_box_image_url').attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true' );
        return false;
      }); // End on click
    });
  </script>
</div>