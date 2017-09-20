<?php require('scrabbleLogic.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Scrabble Calculator</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="p2.css">
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
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
            <?php endif; ?>

            <hr />

            <div class="page-header">
                <form>
                    <div class="form-group row required">
                        <label for="yourWord" class="col-sm-2 col-form-label">Your word</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control <?= $wordInvalid ? "is-invalid" : "" ?>" id="yourWord" name="yourWord" placeholder="Your word" value="<?= $word ?>">
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-legend col-sm-2">Bonus points</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="multiplier" id="multiplier1" value="1" <?= $multiplier == 1 ? 'checked' : '' ?>>
                                        None
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="multiplier" id="multiplier2" value="2" <?= $multiplier == 2 ? 'checked' : '' ?>>
                                        Double
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="multiplier" id="multiplier3" value="3" <?= $multiplier == 3 ? 'checked' : '' ?>>
                                        Triple
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        <label for="bingoPoints" class="col-sm-2 col-form-label">Include 50 point "bingo"</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" id="bingoPoints" type="checkbox" name="bingoPoints" <?= $bingo ? "checked" : ""?>>Yes
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="calculate">Calculate</button>
                            <a href="." class="btn btn-warning">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <hr />
        </div>
    </body>
</html>
