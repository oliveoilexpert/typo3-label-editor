<?php

$EM_CONF[$_EXTKEY] = [
	'title' => 'Label Editor',
	'description' => 'Manage translation overrides for locallang files in a backend module',
	'category' => 'be',
	'author' => 'Amadeus Kiener',
	'state' => 'stable',
	'version' => '2.0.0',
	'constraints' => [
		'depends' => [
			'typo3' => '14.3.0-14.3.99',
		],
		'conflicts' => [],
	],
];