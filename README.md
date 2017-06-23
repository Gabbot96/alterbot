# alterbot

This repo is set up to run on a Heroku Dyno.

The repo contins the following files:
Composer.json
Index.php - this is what is shown on heroku's app page (maybe it can be removed, never tried)
Execute.php -  the bot's core
src.php - contains functions for bot's core and elaborates input
register.php - it's used to set the bot's webhook to Heroku  
