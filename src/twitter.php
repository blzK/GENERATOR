<?php
require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library you downloaded in step 3
if (filter_input(INPUT_POST, 'twitter_user')) {
    $twitteruser = filter_input(INPUT_POST, 'twitter_user'); //user name you input
} else {
    $twitteruser = "CPrudhommes"; //user name you want to reference
}
if (filter_input(INPUT_POST, 'twitter_nb') and filter_input(INPUT_POST, 'twitter_nb') > 0) {
    $notweets = filter_input(INPUT_POST, 'twitter_nb'); //user name you input
} else {
    $notweets = 3; //how many tweets you want to retrieve
}
$consumerkey = "6nCfstQSpCeiBytE8LVespni7";
$consumersecret = "7gopHlXYG3CN9PQErtvQQaYvgvrylgMDAXsxmOsWvEI90erCqw";
$accesstoken = "2475854449-kGZbt7hlRLFV9MicwwBWzZQ6lCJgu2w2ifJvZNM";
$accesstokensecret = "5hXJ5dK1hwUZAQpssEHYg8gHG4zn63emo7ozYDPpKi7Et";

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
    $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
    return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $twitteruser . "&count=" . $notweets);
// echo json_encode($tweets);
?>
<div class="panel panel-warning col-lg-offset-1 col-lg-10 col-lg-offset-1">
    <div class="panel-heading">
        <h1 class="panel-title titre">Les tweets de @<?php echo $twitteruser; ?></h1>
    </div>
    <br/>
    <div class="col-lg-offset-1">
        <form class="form-inline" role="form" action="" method="post">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input type="search" value="<?php echo $twitteruser; ?>" class="form-control" name="twitter_user" id="chercher" placeholder="twitter user sans @">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">nombre de tweets</span>
                    <input type="number" value="<?php echo $notweets; ?>" class="form-control" name="twitter_nb" id="chercher" placeholder="nombre de tweets à afficher">
                </div>
                <div class="input-group">
                    <button type="submit" class="btn btn-warning">Chercher</button>
                </div>
            </div>

        </form>
    </div>
    <div class="panel-body">
        <?php foreach ($tweets as $tweet): ?>
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="<?php echo $tweet->user->profile_image_url; ?>" alt="...">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $tweet->user->name . " @" . $tweet->user->screen_name; ?><small class="text-muted"> <?php echo $tweet->created_at; ?></small></h4>
                    <p>
                        <?php echo $tweet->text; ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>      




