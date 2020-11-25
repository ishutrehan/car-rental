# car-rental
# How to run
Download the repository and make a folder in your localhost in xampp or wampp whatever you are comfortable with.<br>
There is a Database folder inside that database dump file, you need to import that file in your database (current db name is configured as `carrental` in .env file)localhost/phpmyadmin
You can test API in postman

1) User Registeration <br>
`(POST) /users/` <br>
=> Response
```
"status": 200,
"profile": {
  "id": "string",
  "firstName": "string",
  "lastName": "string",
  "email": "string",
  "createdAt": "2020-11-25T15:07:27Z",
  "updatedAt": "2020-11-25T15:07:27Z"
}
```

