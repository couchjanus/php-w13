<style>
        * {
            margin: 0;
            padding: 0;
        }
        .wrap {
            width: 100%;
            position: relative;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: auto;
        }

        .feedback h1 {
            text-align: center;
        }

        .row {
            position: relative;
            margin-top: 25px;
        }

        .row input,
        .row textarea {
            width: 25em;
            padding: 10px;
            margin: 0;
            border: 1px solid #57a;
            border-radius: 3px;
            font-family: inherit;
            color: inherit;
            font-size: 15px;
        }

        .button {
            text-align: center;
        }

        .button button {
            width: 25em;
            padding: 10px;
            margin: 0;
            border: 1px solid #57a;
            border-radius: 3px;
            font-family: inherit;
            color: inherit;
            font-size: 15px;
            transition: all 0.4s linear;
        }

        .button button:hover {
            background: #57a;
            color: #ccc;
        }

        .label {
            position: absolute;
            top: 11px;
            left: 11px;
            font-size: 14px;
            letter-spacing: 1px;
            color: #888;
            cursor: text;
            transition: all 0.2s ease-in-out 0s;
        }

        .row_input:focus {
            box-shadow: inset 0 0 5px #57a;
        }

        .row_input:focus~.label,
        .row_input:valid~.label {
            top: -18px;
            left: 0;
            font-size: 16px;
            color: #57a;
        }

        .row_input:focus~.label:first-letter,
        .row_input:valid~.label:first-letter {
            text-transform: uppercase;
        }
    </style>
<?php
require_once VIEWS.'partials/_head.php';
require_once VIEWS.'partials/_navigation.php';
?>
<div id="main-content">
    <div class="wrap">
        <!--Section: Form -->
        <div class="feedback">
            <h1><?php printf("<h1 style='color: #%x%x%x'>Cat's GuestBook</h1>", 165, 27, 45);?></h1>
                <form action="" method="POST">
                    <div class="row">
                        <input type="text" id="text" class="row_input" required  name="username">
                        <label for="text" class="label">enter you name</label>
                    </div>
                    <div class="row">
                        <input type="email" id="email" class="row_input" required  name="email">
                        <label for="email" class="label">your email address</label>
                    </div>
                    <div class="row">
                        <textarea name="message" id="message" class="row_input" cols="30" rows="5" required></textarea>
                        <label for="message" class="label">message</label>
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
