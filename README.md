## Tests Courses

Integration Continue App for tests.

You can generate coverage file with this command :
```php
phpunit --coverage-clover="./coverage/coverage.xml" ./Tests --whitelist="./src"
```

If you want other extension files, you can add xml balise in 
```php
phpunit.xml
```

SonarCloud needed the junit.xml file for historic compatibility reasons.
Don't forget specify the path ; `sonar.php.coverage.reportPaths=coverage.xml` in `sonar-project.properties` file.
