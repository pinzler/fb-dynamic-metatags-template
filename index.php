<?php

//Change this to where you are going to put this PHP file and what you are going to rename it
$this_URL = "http://www.someplace.com/whereThisPHPFileSits/fileName.php";

// Add or remove depending on how many different items/stories you want to use.
$stories = array(
    array("Headline 1", "Description 1", "http://www.link.com/1", "http://www.image.com/image1.jpg"),
    array("Headline 2", "Description 1", "http://www.link.com/1", "http://www.image.com/image1.jpg"),
    array("Headline 3", "Description 1", "http://www.link.com/1", "http://www.image.com/image1.jpg"),
    array("Headline 4", "Description 1", "http://www.link.com/1", "http://www.image.com/image1.jpg"),
    array("Headline 5", "Description 1", "http://www.link.com/1", "http://www.image.com/image1.jpg"),
    array("Headline 6", "Description 1", "http://www.link.com/1", "http://www.image.com/image1.jpg")
    ); 

$js_stories = json_encode($stories);

if (isset($_REQUEST["id"])) 
    $storyIndex = $_REQUEST["id"];
else $storyIndex = 0;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:site_name" content="YOUR SITE NAME" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $stories[$storyIndex][0]; ?>" />
    <meta property="og:description" content="<?php echo $stories[$storyIndex][1]; ?>" />
    <meta property="og:url" content="<?php echo $this_URL; ?>?id=<?php echo $storyIndex; ?>" />
    <meta property="og:image" content="<?php echo $stories[$storyIndex][3]; ?>" />

    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="cover.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="inner cover">
            
            <p><img id ="mainImage" src="" width="75%"></p>
            <h1 class="cover-heading" id="headline"></h1>
            <p class="lead" id="summary"></p>
            
            <p class="lead">
              <div class="share-tools">
                <a id="storyLink" href="#" class="btn btn-lg btn-default">Read Entire Story</a>
                <a href="#" class="btn btn-lg btn-default" onclick="nextStory();">See Another Story</a>
                <a alt="Share on Facebook"
                        class="btn btn-lg btn-default"
                        data-source="feature-bottom"
                        data-social="Facebook"
                        href="javascript:void(0);"
                        onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(window.location.href+'?id='+storyIndex), 'facebook-share-dialog', 'width=626,height=436'); return false;">
                        <img src="assets/images/facebook-black.svg" align="left"> Share
                </a>
              </div>
            </p>
               
          </div>
         </div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>
    <script>
    var storyIndex = <?php echo $storyIndex; ?>;
    var stories = <?php echo $js_stories; ?>;

    nextStory();
    
    function nextStory() 
    {
      if (storyIndex > stories.length-1) storyIndex = 0;
      document.getElementById("headline").innerHTML = stories[storyIndex][0];
      document.getElementById("summary").innerHTML = stories[storyIndex][1];
      document.getElementById("storyLink").href= stories[storyIndex][2];
      document.getElementById("mainImage").src = stories[storyIndex][3];
      storyIndex++; 
    }
    </script>
  </body>
</html>