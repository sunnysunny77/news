<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="D.C">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> News </title>
    <link href="css/app.css" rel="stylesheet" type="text/css">
</head>

<body>
    <nav id="left" class="left">
        <ul>
            <li><a href="#breaking">Breaking</a></li>
            <li><a href="#international">International</a></li>
        </ul>
    </nav>
    <nav id="right" class="right">
        <ul>
            <li><a href="#sport">Sport</a></li>
            <li><a href="#national">National</a></li>
        </ul>
    </nav>
    <header>
        <h1><span>NEWS</span></br>STORIES FROM THE WEST</h1>
    </header>
    <main>
       <section id="breaking">
            <h2>Breaking</h2>
            <?php
                $rssUrl = "https://thewest.com.au/rss";
                $rssFeed = simplexml_load_file($rssUrl);
                $breaking = [];
              
                foreach($rssFeed->channel->item as $item){           
                    $breaking[] = [
                        $item->title,
                        $item->description,
                        $item->link,
                        $item->children('media', True)->content->attributes()
                    ];
                }
             
                $pagedArray = array_chunk($breaking, 10, true);
                ?>
                <div>
                <?php
                foreach($pagedArray as $i => $item){
                    ?>
                        <a href="<?php echo $_SERVER['PHP_SELF'] . "?breaking=" . $i  ."#breaking"?>"><?php echo $i + 1 ?></a>
                    <?php
                }
                ?>
                </div>
                <?php
                if (isset($_GET["breaking"])) {
                    foreach($pagedArray[$_GET["breaking"]] as $item){
                        ?>
                        <article>
                            <h3><?php echo $item[0]; ?></h3>
                            <p><?php  echo $item[1]; ?></p>
                            <a target="_blank" href="<?php echo $item[2]; ?>">Link</a>
                            <img src="<?php  echo $item[3] ?>" alt="<?php echo $item[0]; ?>"/>
                        </article>
                        <?php
                    } 

                } else {
                  
                    foreach($pagedArray[0] as $item){
                        ?>
                        <article>
                            <h3><?php echo $item[0]; ?></h3>
                            <p><?php  echo $item[1]; ?></p>
                            <a target="_blank" href="<?php echo $item[2]; ?>">Link</a>
                            <img src="<?php  echo $item[3] ?>" alt="<?php echo $item[0]; ?>"/>
                        </article>
                        <?php
                    }   
                }
            ?>
      </section>
        <section id="international"> 
            <h2>International</h2>
            <?php
            $rssUrl = "https://thewest.com.au/news/world/rss";
            $rssFeed = simplexml_load_file($rssUrl);
            if(!empty($rssFeed)){
                foreach($rssFeed->channel->item as $item){
                    ?>
                    <article>
                        <h3><?php echo $item->title; ?></h3>
                        <p><?php  echo $item->description; ?></p>
                        <a target="_blank" href="<?php echo $item->link; ?>">Link</a>
                        <img src="<?php  echo $item->children('media', True)->content->attributes() ?>" alt="<?php echo $item->title; ?>"/>
                    </article>
                    <?php
                }
            } 
            ?>  
        </section>
        <section id="sport">
            <h2>Sport</h2>
            <?php
            $rssUrl = "https://thewest.com.au/sport/rss";
            $rssFeed = simplexml_load_file($rssUrl);
            if(!empty($rssFeed)){
                foreach($rssFeed->channel->item as $item){
                    ?>
                    <article>
                        <h3><?php echo $item->title; ?></h3>
                        <p><?php  echo $item->description; ?></p>
                        <a target="_blank" href="<?php echo $item->link; ?>">Link</a>
                        <img src="<?php  echo $item->children('media', True)->content->attributes() ?>" alt="<?php echo $item->title; ?>"/>
                    </article>
                    <?php
                }
            } 
            ?>  
        </section>
        <section id="national">
            <h2>National</h2>
            <?php
            $rssUrl = "https://thewest.com.au/news/australia/rss";
            $rssFeed = simplexml_load_file($rssUrl);
            if(!empty($rssFeed)){
                foreach($rssFeed->channel->item as $item){
                    ?>
                    <article>
                        <h3><?php echo $item->title; ?></h3>
                        <p><?php  echo $item->description; ?></p>
                        <a target="_blank" href="<?php echo $item->link; ?>">Link</a>
                        <img src="<?php  echo $item->children('media', True)->content->attributes() ?>" alt="<?php echo $item->title; ?>"/>
                    </article>
                    <?php
                }
            } 
            ?>  
        </section>
    </main>
    <footer></footer>
    <script src="js/app.js"></script>
</body>

</html>