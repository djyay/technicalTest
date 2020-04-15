#Technical test documentation

###Installing
 ```
 git clone https://github.com/djyay/technicalTest-.git
 composer install
 docker-compose up --build 
 ```
## Executing test
```
php vendor/bin/simple-phpunit tests/
```

###Access to API resources

- /api/


#### Add a student

- Resource :
  - /api/students
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
  - /api/students/{id}
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
   - /api/students/{id}
 - Method :
    - DELETE



#### Add a note to a student

- Resource :
  - /api/notes
- Method :
   - POST
- Body: 
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
  - /api/students/{id}/average
- Method :
   - GET
 
 
#### Get the general average of the class

- Resource :
  - /api/students/average/class
- Method :
   - GET

