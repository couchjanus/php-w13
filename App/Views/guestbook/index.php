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
// print_r($comments);
echo "</pre>"; 

// foreach ($comments as $key => $value) {
//     echo("<div class='top'><b>User ".$value[0]." </b> <a href='mailto:".$value[1]."'>".$value[1]."</a>  Added this: </div><div class='comment'>".strip_tags($value[2])."</div>"."<p>At ".strip_tags($value[3])."</p><hr>");
// }
?>
</div>

<?php
require_once VIEWS.'partials/_aside.php';
require_once VIEWS.'partials/_footer.php';
