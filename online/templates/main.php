<?php
require(__DIR__ . "/../language.php");
require(__DIR__ . "/../config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $config['website-name']; ?></title>
    <meta charset="utf-8">
    <meta name="description" content="<?php echo $config["website-description"]; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="//www.iconarchive.com/download/i31446/studiomx/leomx/Web.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</head>
<body>
<div class="container text-center" style="margin-top:3%;">
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($error_msg)) { ?>
                <div class="alert alert-danger" role="alert">
                    <p><?php echo $error_msg; ?></p>
                </div>
            <?php } ?>
            <div class="jumbotron">
                <h1 class="display-3"><a href="../"><?php echo $config['website-name']; ?></a></h1>
                <p class="lead"><?php echo $lang["slogan"]; ?></p>
                <div class="btn-group" role="group">
                    <a id="twitter" class="btn btn-info" href="#"><?php echo $lang["twitter_1"]; ?></a>
                    <a id="youtube" class="btn btn-danger" href="#"><?php echo $lang["youtube_1"]; ?></a>
                    <a id="facebook" class="btn btn-primary" href="#"><?php echo $lang["facebook_1"]; ?></a>
                </div>
                <br>
                <br>
                <div class="btn-group" role="group">
                    <a id="vikipedi" class="btn btn-secondary" href="#"><?php echo $lang["wikipedia"]; ?></a>
                    <a id="google" class="btn btn-success" href="#"><?php echo $lang["google_1"]; ?></a>
                    <a id="netflix" class="btn btn-dark" href="#"><?php echo $lang["netflix_1"]; ?></a>
                </div>
                <br />
                <br />
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Webs +18
                  </button>
                </p>
                <div class="collapse" id="collapseExample">
                  <div class="card card-body">
                    <div class="btn-group" role="group">
                    <a id="redtube" class="btn btn-danger" href="#"><?php echo $lang["redtube_xxx"]; ?></a>
                    <a id="pornhub" class="btn btn-danger" href="#"><?php echo $lang["pornhub_xxx"]; ?></a>
                    <a id="xvideos" class="btn btn-danger" href="#"><?php echo $lang["xvideos_xxx"]; ?></a>
                </div>
                  </div>
                </div>
                <hr>
                <p class="lead">
                <form class="form-group" action="index.php" method="post">
                    <input id="url" name="url" type="url" class="form-control" autocomplete="on" placeholder="http://"
                           autofocus required/>
                    <br>
                    <input class="btn btn-primary btn-lg" type="submit" value="<?php echo $lang["go"]; ?>"/>
                </form>
            </div>
            <div class="text-center">
                <p style="font-size:11px">
                    <small><?php echo $lang["agree"]; ?> <a
                                href="<?php echo $config['website-url']; ?>/?tos"><?php echo $lang["tos_2"]; ?></a>
                    </small>
                </p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>

        $('#twitter').click(function () {
            $('#url').val('https://twitter.com');
        });
        $('#youtube').click(function () {
            $('#url').val('https://youtube.com');
        });
        $('#facebook').click(function () {
            $('#url').val('https://facebook.com');
        });
        $('#google').click(function () {
            $('#url').val('https://google.com');
        });
        $('#vikipedi').click(function () {
            $('#url').val('https://wikipedia.org');
        });
        $('#netflix').click(function () {
            $('#url').val('https://netflix.com');
        });
        $('#redtube').click(function () {
            $('#url').val('https://redtube.com');
        });
        $('#pornhub').click(function () {
            $('#url').val('https://pornhub.com');
        });
        $('#xvideos').click(function () {
            $('#url').val('https://xvideos.com');
        });
    </script>
</div>
</body>
</html>