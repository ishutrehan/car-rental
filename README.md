# car-rental
# How to run
Download the repository and make a folder in your localhost in xampp or wampp whatever you are comfortable with.<br>
There is a Database folder inside that database dump file, you need to import that file in your database (current db name is configured as `carrental` in .env file)localhost/phpmyadmin
You can test API in postman

### **Registration** 
`(POST) {url}/users/` <br>
_Response !_
```
"profile": {
  "id": "string",
  "firstName": "string",
  "lastName": "string",
  "email": "string",
  "createdAt": "2020-11-25T15:07:27Z",
  "updatedAt": "2020-11-25T15:07:27Z"
}
```
### **Profiles** 
`(GET) {url}/users/` <br>
_Response !_
```
[
  {
    "id": "string",
    "firstName": "string",
    "lastName": "string",
    "email": "string",
    "createdAt": "2020-11-25T15:07:27Z",
    "updatedAt": "2020-11-25T15:07:27Z"
  }
]
```

### **Login** 
`(POST) {url}/sessions/` <br>
_Response !_
```
"profile": {
  "accessToken": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiZGV2QGdtYWlsLmNvbSIsImlhdCI6MTYwNjQ2NDkyMywiZXhwIjoxNjA2NDY4NTIzfQ.hgQZJd5HKirhKPwaxTmUJMZ4OIrJiDYQ3iDcHyXfQ6g",
  "id": "string",
  "firstName": "string",
  "lastName": "string",
  "email": "string",
  "createdAt": "2020-11-25T15:07:27Z",
  "updatedAt": "2020-11-25T15:07:27Z"
}
```
### **Create Rentals** 
`(POST) {url}/rentals/` <br>
You need send Authorization Header also , you will get that from login response <br />

_Response !_
```
{
  "from": "2020-11-25T15:07:27Z",
  "to": "2020-11-25T15:07:27Z",
  "subjectID": 0,
  "status": "string"
}
```

### **Get Rentals** 
`(GET) {url}/rentals/` <br>
You need send Authorization Header also , you will get that from login response
_Response !_
```
{
  "from": "2020-11-25T15:07:27Z",
  "to": "2020-11-25T15:07:27Z",
  "subjectID": 0,
  "status": "string"
},
{
  "from": "2020-11-25T15:07:27Z",
  "to": "2020-11-25T15:07:27Z",
  "subjectID": 1,
  "status": "string"
}
```
### **Add Cars** 
`(POST) {url}/cars/` <br>
_Response !_
```
[
  {
    "id": 1,
    "brand": "string",
    "model": "string",
    "imageURL": "string",
    "fuel": "string",
    "pricePerDay": 54.5,
    "currency": "string",
    "year": "string",
    "type": "string",
    "status": "string",
    "groupId": "string",
    "registrationPlate": "string",
    "createdAt": "2020-11-25T15:07:27Z",
    "updatedAt": "2020-11-25T15:07:27Z",
    "subjectTypeId": 0,
    "location": {
      "latitude": 50.10737,
      "longitude": 14.45462
    }
  }
]
```
### **Get Cars** 
`(GET) {url}/cars/` <br>
_Response !_
```
[
  {
    "id": 1,
    "brand": "string",
    "model": "string",
    "imageURL": "string",
    "fuel": "string",
    "pricePerDay": 54.5,
    "currency": "string",
    "year": "string",
    "type": "string",
    "status": "string",
    "groupId": "string",
    "registrationPlate": "string",
    "createdAt": "2020-11-25T15:07:27Z",
    "updatedAt": "2020-11-25T15:07:27Z",
    "subjectTypeId": 0,
    "location": {
      "latitude": 50.10737,
      "longitude": 14.45462
    }
  }
]
```

