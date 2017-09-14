<?php require('scrabbleLogic.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Scrabble Calculator</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1 style="text-align: center;">Scrabble Calculator</h1>
            </div>

            <?php if ($showMessage) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $message ?>
                </div>
            <?php elseif ($showError) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $error ?>
                </div>
            <?php endif; ?>

            <hr />

            <div class="page-header">
                <form>
                    <div class="form-group row">
                        <label for="yourWord" class="col-sm-2 col-form-label">Your word</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="yourWord" name="yourWord" placeholder="Your word">
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-legend col-sm-2">Bonus points</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="bonusPoints" id="bonusPoints1" value="none" checked>
                                        None
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="bonusPoints" id="bonusPoints2" value="double">
                                        Double
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="bonusPoints" id="bonusPoints3" value="triple">
                                        Triple
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        <div class="col-sm-2">Include 50 point "bingo"</div>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="bingoPoints">Yes
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Calculate</button>
                        </div>
                    </div>
                </form>
            </div>

            <hr />
        </div>
    </body>
</html>
