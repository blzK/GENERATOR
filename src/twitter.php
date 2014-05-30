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
<div class="panel panel-warning">
    <div class="panel-heading">
        <h2 class="panel-title titre">Les tweets de @<?php echo $twitteruser; ?></h2>
    </div>
    <div class="">
        <form class="form-inline" role="form" action="" method="post">
            <div class="form-group">
                <span class="input-group-addon">@
                    <input class="small" type="search" value="<?php echo $twitteruser; ?>" class="form-control" name="twitter_user" id="chercher" placeholder="twitter user sans @">
                    <input class="small" type="number" value="<?php echo $notweets; ?>" class="form-control" name="twitter_nb" id="chercher" placeholder="nombre de tweets à afficher">
                    <input type="submit" class="btn btn-warning small" value="Afficher">
                </span>
            </div>
        </form>
    </div>
    <div class="panel-body">
        <?php foreach ($tweets as $tweet): ?>
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="<?php echo $tweet->user->profile_image_url; ?>" alt="<?php echo $tweet->user->name; ?>">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $tweet->user->name . " " . "<small class='text-muted'>" . ago($tweet->created_at, $tweet->id, $tweet->user->screen_name); ?> </small></h4>
                    <p>
                        <?php echo $tweet->text; ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div> 
<?php

// Simple function to get Twitter style "time ago"
function ago($tweet_time, $tweet_id, $tweet_name) {

    $m = time() - strtotime($tweet_time);
    $o = 'il y a un instant';
    $t = array('an' => 31556926, 'moi' => 2629744, 'semaine' => 604800, 'jours' => 86400, 'heure' => 3600, 'minute' => 60, 'second' => 1);
    foreach ($t as $u => $s) {
        if ($s <= $m) {
            $v = floor($m / $s);
            $o = 'il y a ' . $v . ' ' . $u . ($v == 1 ? '' : 's');
            break;
        }
    }
    return '<a href="http://twitter.com/' . $tweet_name . '/statuses/' . $tweet_id . '">@' . $tweet_name . '</a> ' . $o ;
}
?>




