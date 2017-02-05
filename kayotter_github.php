<?php
require './kayotter_github2.php';

// ツイート検索
$tweets = kayotter_github2::getTweets();
?>

    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kayotter</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="kayotter.css" rel="stylesheet">
    </head>

    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <div class="container">
            <form action="" method="get">
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-xs-12 col-lg-2">キーワード</label>
                        <div class="col-xs-12 col-lg-4">
                            <input type="text" name="key_word" class="form-control">
                        </div>
                        <div class="col-xs-4 col-lg-2">
                            <button type="submit" class="form-control">検索</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <div class="container">
            <div class="row">
                <h2>
                    <?= $key_word = $_GET['key_word']; ?>の検索結果</h2>
            </div>
            <?php if (isset($tweets->error)): ?>
            <div>
                <h2>
                    <?= $tweets->error->code; ?>
                </h2>
                <p>
                    <?= $tweets->error->message; ?>
                </p>
            </div>

            <?php else: ?>
            <div class="qa-message-list" id="wallmessages">
                <?php $i = 0;?>
                <?php foreach (($tweets['statuses']) as $tweet) : ?>

                <div class="message-item" id="m16">
                    <div class="message-inner">
                        <div class="message-head clearfix">
                            <div class="avatar pull-left">
                                <img src=<?=$ tweets['statuses'][$i]['user']['profile_image_url'];?>>
                            </div>
                            <div class="user-detail">
                                <h5 class="handle">
                                    <?= $tweets['statuses'][$i]['user']['name'];?>
                                </h5>
                                <div class="post-meta">
                                    <div class="asker-meta">
                                        <span class="qa-message-what"></span>
                                        <span class="qa-message-when">
								        <span class="qa-message-when-data"><?= $tweets['statuses'][$i]['user']['created_at'];?></span>
                                        </span>
                                        <span class="qa-message-who">
												<span class="qa-message-who-pad">@ </span>
                                        <span class="qa-message-who-data"><a href="http://twitter.com/<?= $tweets['statuses'][$i]['user']['screen_name'];?>"><?= $tweets['statuses'][$i]['user']['screen_name'];?></a></span>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="qa-message-content">
                            <?= $tweets['statuses'][$i]['text'];?>
                        </div>
                    </div>
                </div>
                <?php $i = $i + 1; ?>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </body>
    </html>
