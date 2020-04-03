<?php  if (count($results) > 0) : ?>
  <div class="error">
  	<?php foreach ($results as $error) : ?>
  	  <p><font color="orange"><?php echo $error ?></font></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
