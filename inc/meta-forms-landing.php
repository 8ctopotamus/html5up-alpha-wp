<div class="h5ua_box">
  <p><em>Optional Call To Action Links</em></p>
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
</div>