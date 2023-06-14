BUNDLE_PATH := bundle
pre_commit:
	symfony console lint:twig ${BUNDLE_PATH}/templates
	php bin/phpunit ${BUNDLE_PATH}/tests
	vendor/bin/phpstan --configuration="${BUNDLE_PATH}/phpstan.neon"
