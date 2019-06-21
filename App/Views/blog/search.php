<div class="content-wrap">
  <?php
  printf("<h1 style='color: #%x%x%x'>%s</h1>", 165, 27, 45, $title);
  ?>

   <div class="items">
    
    <?php if ($data['success'] == true):?>
      <h3><?= $data['num_rows']?></h3>
      <ul>
        <?php foreach($posts as $singleItem): ?>
          <li>
            <h3><?php echo $singleItem['title']?></h3>
              <p><?php echo $singleItem['created_at'];?></p>
              <a href="/blog/<?php echo $singleItem['slug']; ?>">Read More</a>
          </li>
        <?php endforeach; ?>
      </ul> 
    <?php endif;?>
  </div>
  

</div>
<!-- Page End -->
