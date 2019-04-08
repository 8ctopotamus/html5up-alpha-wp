<div class="h5ua_box">
  <style scoped>
    .h5ua_box{
      display: grid;
      grid-template-columns: max-content 1fr;
      grid-row-gap: 10px;
      grid-column-gap: 20px;
    }
    .h5ua_field{
      display: contents;
    }
  </style>
  <p class="meta-options h5ua_field">
    <label for="h5ua_subtitle">Subtitle</label>
    <input id="h5ua_subtitle"
      type="text"
      name="h5ua_subtitle"
      value="<?php echo esc_attr( get_post_meta( get_the_ID(),'h5ua_subtitle', true )); ?>"
    />
  </p>
</div>