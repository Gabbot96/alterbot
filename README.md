# alterbot

This repo is set up to run on a Heroku Dyno.

The repo contins the following files:<br />
Composer.json<br />
Index.php - this is what is shown on heroku's app page (maybe it can be removed, never tried)<br />
Execute.php -  the bot's core<br />
src.php - contains functions for bot's core and elaborates input<br />
register.php - it's used to set the bot's webhook to Heroku<br />
