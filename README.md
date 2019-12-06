# OAT Homework interpretation
![Deploy Status](https://api.travis-ci.com/wazelin/tetst-takers-api.svg?branch=master)
## API Specifications
https://hr.oat.taocloud.org/api/
## Testing
```shell script
$ docker-compose  \
  -f docker-compose-test.yml \
  run tester \
  cli/vendor/bin/phpunit \
  --configuration /cli/phpunit.xml.dist
```
