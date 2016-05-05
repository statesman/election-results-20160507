<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <?php
  $meta = array(
    "title" => "Travis County May 7, 2016 municipal election results by precinct  | Statesman.com",
    "description" => "Precinct-level results for the May 7, 2016 election.",
    "thumbnail" => "http://projects.statesman.com/databases/election-map-20160507/assets/social-share.png", // needs update
    "shortcut_icon" => "http://media.cmgdigital.com/shared/media/2015-11-16-11-32-05/web/site/www_mystatesman_com/images/favicon.ico",
    "apple_touch_icon" => "http://media.cmgdigital.com/shared/theme-assets/242014/www.statesman.com_fa2d2d6e73614535b997734c7e7d2287.png",
    "url" => "http://projects.statesman.com/databases/election-map-20160507/",
    "twitter" => "statesman"
  );
?>

  <title>Interactive: <?php print $meta['title']; ?> | Austin American-Statesman</title>
  <link rel="shortcut icon" href="<?php print $meta['shortcut_icon']; ?>" />
  <link rel="apple-touch-icon" href="<?php print $meta['apple_touch_icon']; ?>" />

  <link rel="canonical" href="<?php print $meta['url']; ?>" />

  <meta name="description" content="<?php print $meta['description']; ?>">

  <meta property="og:title" content="<?php print $meta['title']; ?>"/>
  <meta property="og:description" content="<?php print $meta['description']; ?>"/>
  <meta property="og:image" content="<?php print $meta['thumbnail']; ?>"/>
  <meta property="og:url" content="<?php print $meta['url']; ?>"/>

  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@<?php print $meta['twitter']; ?>" />
  <meta name="twitter:title" content="<?php print $meta['title']; ?>" />
  <meta name="twitter:description" content="<?php print $meta['description']; ?>" />
  <meta name="twitter:image" content="<?php print $meta['thumbnail']; ?>" />
  <meta name="twitter:url" content="<?php print $meta['url']; ?>" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="dist/style.css">

  <link href='http://fonts.googleapis.com/css?family=Lusitana:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,300,300italic,400italic,700italic,700,800,800italic' rel='stylesheet' type='text/css'>
 

  <?php /* CMG advertising and analytics */ ?>
  <?php include "includes/advertising.inc"; ?>
  <?php include "includes/metrics-head.inc"; ?>

</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

        <a class="navbar-brand" href="http://www.statesman.com/" target="_blank">
        <img class="visible-xs visible-sm" width="103" height="26" src="assets/logo-short-black.png" />
        <img class="hidden-xs hidden-sm" width="273" height="26" src="assets/logo.png" />
        </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="./">Travis precincts <span class="sr-only">(current)</span></a></li>
        <li><a href="http://www.statesman.="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode($meta['url']); ?>com/s/elections-guide/#central-texas-results" target="_blank">More election coverage</a></li>
        <li class="visible-xs small-social"><a target"><i class="fa fa-facebook-square"></i></a><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo urlencode($meta['url']); ?>&via=<?php print urlencode($meta['twitter']); ?>&text=<?php print urlencode($meta['title']); ?>"><i class="fa fa-twitter"></i></a><a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode($meta['url']); ?>"><i class="fa fa-google-plus"></i></a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right social hidden-xs">
          <li><a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode($meta['url']); ?>"><i class="fa fa-facebook-square"></i></a></li>
          <li><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo urlencode($meta['url']); ?>&via=<?php print urlencode($meta['twitter']); ?>&text=<?php print urlencode($meta['title']); ?>"><i class="fa fa-twitter"></i></a></li>
          <li><a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode($meta['url']); ?>"><i class="fa fa-google-plus"></i></a></li>
        </ul>
    </div>
  </div>
</nav>

  <article class="container">
  <br>
    <div class="row">
      <div class="col-xs-12 interactive-header">
        <h4>2016 Municipal Elections</h4>
        <h1 class="page-title">Precinct-by-precinct results</h1>
        <p class="author">Interactive by Christian McDonald, Austin American-Statesman</p>
        <p>Use the dropdown to choose a race from the May 7, 2016 elections to see the highest vote-getter for each precinct. Roll your cursor over each precinct on the map to see votes for all candidates in the selected race. Hover over a candidate's name in the map legend to see his or her support in each precinct.</p>
      </div>

      <div class="form-group clearfix">
        <div class="col-lg-6">
          <label for="race" class="control-label">Choose a race:</label>
          <select class="form-control" id="race" name="race">
          <optgroup label="City of Austin">
            <option data-zoom="-1" data-center="30.329632, -97.758797" value="ap1">PROPOSITION 1, CITY OF AUSTIN</option>
          </optgroup>
          <optgroup label="Other cities">
            <option data-zoom="+1" data-center="30.390526, -98.085803" value="vba3">THREE ALDERMEN, VILLAGE OF BRIARCLIFF</option>
            <option data-zoom="+2" data-center="30.290388, -98.020727" value="bc1">PROPOSITION NO. 1, CITY OF BEE CAVE</option>
            <option data-zoom="+2" data-center="30.290388, -98.020727" value="bc2">PROPOSITION NO. 2, CITY OF BEE CAVE</option>
            <option data-zoom="+2" data-center="30.290388, -98.020727" value="bc3">PROPOSITION NO. 3, CITY OF BEE CAVE</option>
            <option data-zoom="+2" data-center="30.435466, -97.901611" value="vv1">PROP. 1, VILLAGE OF VOLENTE</option>
            <option data-zoom="+2" data-center="30.435466, -97.901611" value="vv2">PROP. 2, VILLAGE OF VOLENTE  (Conditional Upon a Majority ""No"" Vote on Proposition 1)</option>
          </optgroup>
          <optgroup label="School districts">
            <option data-zoom="+1" data-center="30.350926, -97.523613" value="mp">PROPOSITION, MANOR ISD</option>
            <option data-zoom="+1" data-center="30.381964, -97.511211" value="pisd3">PLACE 3, BOARD OF TRUSTEES, PFLUGERVILLE ISD</option>
            <option data-zoom="+1" data-center="30.381964, -97.511211" value="pisd4">PLACE 4, BOARD OF TRUSTEES, PFLUGERVILLE ISD</option>
            <option data-zoom="+1" data-center="30.381964, -97.511211" value="pisd5">PLACE 5, BOARD OF TRUSTEES, PFLUGERVILLE ISD</option>
            <option data-zoom="+1" data-center="30.381376, -98.009716" value="ltisd3">PLACE 3, BOARD OF TRUSTEES, LAKE TRAVIS ISD</option>
            <option data-zoom="+1" data-center="30.381376, -98.009716" value="ltist4">PLACE 4, BOARD OF TRUSTEES, LAKE TRAVIS ISD</option>
            <option data-zoom="+1" data-center="30.381376, -98.009716" value="ltisd5">PLACE 5, BOARD OF TRUSTEES, LAKE TRAVIS ISD</option>
            <option data-zoom="+1" data-center="30.381376, -98.009716" value="ltisd7">PLACE 7, BOARD OF TRUSTEES, LAKE TRAVIS ISD</option>
          </optgroup>
          <optgroup label="Utility districts">
            <option data-zoom="+2" data-center="30.371458, -97.855564" value="rpud">BOARD OF DIRECTORS, RIVER PLACE MUNICIPAL UTILITY DISTRICT</option>
            <option data-zoom="+2" data-center="30.350948, -97.988430" value="lwud">DIRECTORS, LAKEWAY MUNICIPAL UTILITY DISTRICT</option>
            <option data-zoom="+1" data-center="30.312578, -98.013836" value="tcmudd">DIRECTORS, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 22</option>
            <option data-zoom="+1" data-center="30.312578, -98.013836" value="tdmud1">PROPOSITION 1, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 22</option>
            <option data-zoom="+1" data-center="30.312578, -98.013836" value="tdmud2">PROPOSITION 2, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 22</option>
            <option data-zoom="+1" data-center="30.312578, -98.013836" value="tdmud3">PROPOSITION 3, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 22</option>
            <option data-zoom="+1" data-center="30.312578, -98.013836" value="tdmud5">PROPOSITION 4, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 22</option>
            <option data-zoom="+1" data-center="30.312578, -98.013836" value="tdmud1">PROPOSITION 5, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 22</option>
            <option data-zoom="+2" data-center="30.319844, -97.948605" value="wtcmud31">PLACE 1, DIRECTOR, WEST TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 3</option>
            <option data-zoom="+2" data-center="30.319844, -97.948605" value="wtcmud33">PLACE 3, DIRECTOR, WEST TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 3</option>
            <option data-zoom="+2" data-center="30.319844, -97.948605" value="wtcmud34">PLACE 4, DIRECTOR, WEST TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 3</option>
            <option data-zoom="+2" data-center="30.319844, -97.948605" value="wtcmud51">PLACE 1, DIRECTOR, WEST TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 5</option>
            <option data-zoom="+2" data-center="30.319844, -97.948605" value="wtcmud54">PLACE 4, DIRECTOR, WEST TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 5</option>
            <option data-zoom="+2" data-center="30.319844, -97.948605" value="wtcmud55">PLACE 5, DIRECTOR, WEST TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 5</option>
          </optgroup>
          </select>
        </div>
        <div class="col-lg-6">
          <label for="address" class="control-label">Find an address:</label>
          <input name="address" id="address" type="text" class="form-control">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-push-4">
        <div id="map" style="width:100%;min-height:350px;"></div>
      </div>
      <div class="col-xs-12 col-sm-4 col-sm-pull-8">
        <ul id="key" class="list-group"></ul>
        <div id="results"></div>
        <p><small>Data source: Travis County Clerk, Elections Division<!-- ; Williamson County Clerk, Elections Department--></small></p>
      </div>
    </div>
  </div>
  <br>

  </article>


    <!-- bottom matter -->
    <?php include "includes/banner-ad.inc";?>
    <?php include "includes/legal.inc";?>
    <?php include "includes/project-metrics.inc"; ?>
    <?php include "includes/metrics.inc"; ?>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBFqzY0Bf4VMn4Wtx-EEb9S-cVkvzm8RFE  &libraries=places"></script>
    <script src="dist/scripts.js"></script>


  <?php if($_SERVER['SERVER_NAME'] === 'localhost'): ?>
    <script src="//localhost:35729/livereload.js"></script>
  <?php endif; ?>
</body>
</html>
