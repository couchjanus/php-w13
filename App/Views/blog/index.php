<div class="content-wrapper">
    <div class="row">
        <main id="main" class="columns col-7">
            <?php
      printf("<h1 style='color: #%x%x%x'>%s</h1>", 165, 27, 45, $title);
    ?>

            <h4>Search Blog</h4>
            <form action="/blog/search" method="post">
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="search-query form-control" placeholder="Search" name="query" />
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="submit">
                                <span class="">Search</span>
                            </button>
                        </span>
                    </div>
                </div>
            </form>


            <?php if ($rowCount>0) : ?>

            <?php foreach ($posts as $post) : ?>

            <article class="entry">
                <header class="entry-header">
                    <h2 class="entry-title">
                        <a href="/blog/<?php echo $post['slug'];?>" title=""><?php echo $post["title"];?></a>
                    </h2>
                    <div class="entry-meta">
                        <ul>
                            <li><?php echo $post["created_at"];?></li>
                            <span class="meta-sep">&bull;</span>
                            <li><a href="#" title="" rel="category tag">Ghost</a></li>
                            <span class="meta-sep">&bull;</span>
                            <li>John Doe</li>
                        </ul>
                    </div>
                </header>

            </article> <!-- end entry -->

            <?php endforeach ?>
            <?php else : ?>
            <h1>No posts found....</h1>
            <?php endif ?>
    </div>