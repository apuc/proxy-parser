<?php

use core\App;

App::$collector->console('run/parse', ['workspace\console\controllers\RunController', 'actionRun']);
App::$collector->console('parse/run', ['workspace\console\controllers\ParseController', 'actionRun']);