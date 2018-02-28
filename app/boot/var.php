<?php

require_once APPS_DIR."/plib/vendor/autoload.php";

use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;

try {

	$yaml = new Parser();

	$CONFIG = $yaml->parse(file_get_contents(dirname(__DIR__)."/conf/conf.yml"));
	
	$PARAMETERS = $yaml->parse(file_get_contents(dirname(__DIR__)."/conf/param.yml"));

	$ENVIRONMENT = $PARAMETERS['environment'];

} catch (ParseException $e) {

	printf("Unable to parse the YAML string: %s", $e->getMessage());
	
}
