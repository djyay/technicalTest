#Technical test documentation

###Installing
 ```
 git clone https://github.com/djyay/technicalTest-.git
 docker-compose --build
docker-compose up
docker exec -ti ubi_php bash
cd ubi
composer install 
php bin/console doctrine:database:create
php bin/console doctrine:schema:create
 ```
## Executing test
```
php vendor/bin/simple-phpunit tests/
```

###Access to API resources

- http://localhost/api/


#### Add a student

- Resource :
  - http://localhost/api/students
- Method :
   - POST
- Body: 
    - JSON
 ****************
Example
```
{
  "lastName": "string",
  "firstName": "string",
  "DateOfBirth": "1991-04-14"
 }

```
 
 
#### Edit student information

- Resource :
  - require 'id' 
  - http://localhost/api/students/{id}
- Method :
   - PUT
- Body: 
    - JSON
 ****************
Example
```
{
  "lastName": "string",
  "firstName": "string",
  "DateOfBirth": "1991-04-14"
 }

```
 
 
 #### Delete a student
 
 - Resource :
    - require 'id' 
   - http://localhost/api/students/{id}
 - Method :
    - DELETE



#### Add a note to a student

- Resource :
  - http://localhost/api/notes
- Method :
   - POST
- Body: 
    - require 'id' 
    - JSON
 ****************
Example
```
{
  "note": 0,
  "subject": "string",
  "student": "/api/students/{id}"
}

```

#### Get the average of all of a student's grades

- Resource :
  - require 'id' 
  - http://localhost/api/students/{id}/average
- Method :
   - GET
 
 
#### Get the general average of the class

- Resource :
  - http://localhost/api/students/average/class
- Method :
   - GET

