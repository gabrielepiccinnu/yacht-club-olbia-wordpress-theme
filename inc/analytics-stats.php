<?php 

function yachtclubolbia_stats () {


  if(!is_user_logged_in()):
    ?>

<script type="text/javascript">
  
</script>

<!-- Matomo -->
<script>
 
</script>
<!-- End Matomo Code -->

 <!-- Global site tag (gtag.js) - Google Analytics -->
 


<script>
 

</script>


<!-- Google Tag Manager -->
 
<!-- End Google Tag Manager -->


<!-- Meta Pixel Code -->
 
<!-- End Meta Pixel Code -->


    
    <?php 
  endif;
    }
    
    add_action ('wp_head', 'yachtclubolbia_stats');



    function yachtclubolbia_stats_body() {
      if(!is_user_logged_in()):
      ?>
      
      <!-- Google Tag Manager (noscript) -->
 
<!-- End Google Tag Manager (noscript) -->
      <?php 
  endif;

    }

    add_action ('wp_body_open', 'yachtclubolbia_stats_body');

 