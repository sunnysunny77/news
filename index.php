<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="D.C">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> News stories from the west</title>
    <link href="css/app.css" rel="stylesheet" type="text/css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="#breaking">Breaking</a></li>
            <li><a href="#international">International</a></li>
        </ul>
        <ul>
            <li><a href="#sport">Sport</a></li>
            <li><a href="#national">National</a></li>
        </ul>
    </nav>
    <header>
        <div class="bg-wrap">      
            <div class="bg"> <h1><span>NEWS</span></br>STORIES FROM THE WEST</h1></div>
        </div> 
    </header>
    <main>
    <section id="breaking">
            <h2>Breaking</h2>
            <?php
            function pages($pagedArray, $type) {
                    foreach($pagedArray as $i => $item){
                        $current = "";
                        if (isset($_GET["$type"]) && $_GET["$type"] == $i) {
                            $current = "current";
                        } else if (!isset($_GET["$type"]) && $i == 0) {
                            $current = "current";
                        } else {
                            $current = "";
                        }
                        if ($i == 0) {
                            $next = isset($_GET["$type"]) ? $_GET["$type"] + 1 : $i + 1;
                            ?>
                            <a href="<?php echo $_SERVER['PHP_SELF'] . "?$type=" . $next . "#$type"?>">Next..</a>
                            <?php
                        }
                        ?>
                            <a class="<?php echo $current ?>" href="<?php echo $_SERVER['PHP_SELF'] . "?$type=" . $i  ."#$type"?>"><?php echo $i + 1 ?></a>
                        <?php
                    }
                }
                function get($item) {     
                    ?>
                    <article>
                        <h3><?php echo $item[0]; ?></h3>
                        <p><?php  echo $item[1]; ?></p>  
                        <a target="_blank" href="<?php echo $item[2]; ?>"><span>Read More</span><img src="<?php  echo $item[3] ?>" alt="<?php echo $item[0]; ?>"/></a>
                    </article>
                    <?php
                }
                function rss($rssFeed) {
                    $type = [];
                    foreach($rssFeed->channel->item as $item){           
                        $type[] = [
                            $item->title,
                            $item->description,
                            $item->link,
                            $item->children('media', True)->content->attributes()
                        ];
                    } 
                    return $type;  
                }
                $rssUrl = "https://thewest.com.au/rss";
                $rssFeed = simplexml_load_file($rssUrl);               
                $pagedArray = array_chunk(rss($rssFeed), 10, true);
                ?>
                <div>
                <?php
                    pages($pagedArray,"breaking");
                ?>
                </div>
                <?php
                if (isset($_GET["breaking"])) {
                    foreach($pagedArray[$_GET["breaking"]] as $item){
                        get($item);
                    }
                } else { 
                    foreach($pagedArray[0] as $item){
                        get($item);
                    }
                }
                ?>
                <div>
                <?php
                    pages($pagedArray,"breaking");
                ?>
                </div>
                <?php
            ?>
        </section>
        <section id="international"> 
            <h2>International</h2>
            <?php
                $rssUrl = "https://thewest.com.au/news/world/rss";
                $rssFeed = simplexml_load_file($rssUrl);
                $pagedArray = array_chunk(rss($rssFeed), 10, true);        
                ?>
                <div>
                <?php
                    pages($pagedArray,"international");
                ?>
                </div>
                <?php
                if (isset($_GET["international"])) {
                    foreach($pagedArray[$_GET["international"]] as $item){
                        get($item);
                    }
                } else { 
                    foreach($pagedArray[0] as $item){
                        get($item);
                    }
                }
                ?>
                <div>
                <?php
                    pages($pagedArray,"international");
                ?>
                </div>
                <?php
            ?>
        </section>
        <section id="sport">
            <h2>Sport</h2>
            <?php
                $rssUrl = "https://thewest.com.au/sport/rss";
                $rssFeed = simplexml_load_file($rssUrl);
                $pagedArray = array_chunk(rss($rssFeed), 10, true);        
                ?>
                <div>
                <?php
                    pages($pagedArray,"sport");
                ?>
                </div>
                <?php
                if (isset($_GET["sport"])) {
                    foreach($pagedArray[$_GET["sport"]] as $item){
                        get($item);
                    }
                } else { 
                    foreach($pagedArray[0] as $item){
                        get($item);
                    }
                }
                ?>
                <div>
                <?php
                    pages($pagedArray,"sport");
                ?>
                </div>
                <?php
            ?>
        </section>
        <section id="national">
            <h2>National</h2>
            <?php
                $rssUrl = "https://thewest.com.au/news/australia/rss";
                $rssFeed = simplexml_load_file($rssUrl);
                $pagedArray = array_chunk(rss($rssFeed), 10, true);        
                ?>
                <div>
                <?php
                    pages($pagedArray,"national");
                ?>
                </div>
                <?php
                if (isset($_GET["national"])) {
                    foreach($pagedArray[$_GET["national"]] as $item){
                        get($item);
                    }
                } else { 
                    foreach($pagedArray[0] as $item){
                        get($item);
                    }
                }
                ?>
                <div>
                <?php
                    pages($pagedArray,"national");
                ?>
                </div>
                <?php
            ?>  
        </section>
    </main>
    <footer>
        <a href="https://thewest.com.au/rss-feeds">West Australian Newspapers Limited RSS</a>
    </footer>
    <script src="js/app.js"></script>
</body>

</html>