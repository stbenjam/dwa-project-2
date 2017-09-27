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

            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php elseif ($form->isSubmitted()) : ?>
                <div class="alert alert-success" role="alert">
                    Your word has a score of <?= $score ?>.
                </div>
            <?php endif; ?>

            <hr />

            <div class="page-header">
                <form>
                    <div class="form-group row required">
                        <label for="yourWord" class="col-sm-2 col-form-label">Your word</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control id="yourWord" name="yourWord" placeholder="Your word" value="<?= $form->prefill('yourWord') ?>">
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-legend col-sm-2">Bonus points</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="multiplier" id="multiplier1" value="1" <?= $form->checked('multiplier', 1) ?> <?= $form->get('multiplier') ? '' : 'checked' ?>>
                                        None
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="multiplier" id="multiplier2" value="2" <?= $form->checked('multiplier', 2) ?>>
                                        Double
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="multiplier" id="multiplier3" value="3" <?= $form->checked('multiplier', 3) ?>>
                                        Triple
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        <legend class="col-form-legend col-sm-2">Additional Options </legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" id="dictVerify" type="checkbox" name="dictVerify" <?= $form->checked('dictVerify') ?>> Validate word in dictionary
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <span class="col-sm-2 col-form-label"></span>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" id="bingoPoints" type="checkbox" name="bingoPoints" <?= $form->checked('bingoPoints') ?>> Include 50 point "bingo"
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
