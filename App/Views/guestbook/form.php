<?php
require_once VIEWS.'partials/_head.php';
require_once VIEWS.'partials/_navigation.php';
?>
<div id="main-content">
    <div class="wrap">
        <!--Section: Form -->
        <div class="feedback">
            <h1>Guest Book</h1>
                <form action="" method="POST">
                    <div class="row">
                        <input type="text" id="text" class="row_input" required  name="username" placeholder="Please enter your name">
                    </div>
                    <div class="row">
                        <input type="email" id="email" class="row_input" required  name="email" placeholder="Please enter your email">
                    </div>
                    <div class="row">
                        <textarea name="message" id="message" class="row_input" cols="30" rows="5" required placeholder="Your message here..."></textarea>
                    </div>
                    <div class="row">
                        <div class="button">
                            <button type="submit">Submit</button>
                        </div>
                    </div>
            </form>
        </div>
        <!--EndSection: Form -->    
    </div>

<?php

echo "<pre>"; 
print_r($comments);
echo "</pre>"; 

if ($resCount>0) {
    printf("<h3>В Guest Book находится %d Comments</h3>", $resCount);
    
    foreach ($comments as $row) {
      echo "<div class='top'><b>User ".$row["username"]."</b> <a href='mailto:".$row["email"]."'>".$row["email"]."</a> Added this </div>"; 
      echo "<div class='comment'>".strip_tags($row["message"])."</div>"; 
      echo "<div class='added_at'> At: ".strip_tags($row["created_at"])."</div>"; 
    }
}
else {
  echo "No comments.... ";
}
   
?>
</div>


<?php
require_once VIEWS.'partials/_aside.php';
require_once VIEWS.'partials/_footer.php';
