<div class="sidebar">
    <div class="search">
    <h1 class='search_heading'>Search</h1>
        <div class="search_container">
        <form class="search_form" action="<?php echo URLROOT; ?>/posts/search/" method="GET">
        <input class="search_input" name="query" type="text" placeholder="Search"><ion-icon class="search_icon" name="search"></ion-icon>
        </form>
        </div>
    </div>

    <div class="topics">
    <h1 class="topic_heading">Topics</h1>
        <ul class="topic_list">
            <li class="topic_item"><a class="topic_link" href="<?php echo URLROOT; ?>/posts/search/writing" >Writing</a></li>
            <li class="topic_item"><a class="topic_link" href="<?php echo URLROOT; ?>/posts/search/painting" >Painting</a></li>
            <li class="topic_item"><a class="topic_link" href="<?php echo URLROOT; ?>/posts/search/drawing" >Drawing</a></li>
            <li class="topic_item"><a class="topic_link" href="<?php echo URLROOT; ?>/posts/search/music" >Music</a></li>
            <li class="topic_item"><a class="topic_link" href="<?php echo URLROOT; ?>/posts/search/motivation" >Motivation</a></li>
            <li class="topic_item"><a class="topic_link" href="<?php echo URLROOT; ?>/posts/search/inspiration" >Inspiration</a></li>
            <li class="topic_item"><a class="topic_link" href="<?php echo URLROOT; ?>/posts/search/life-lessons" >Life Lessons</a></li>
        </ul>
    </div>
</div>