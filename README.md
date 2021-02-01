## Hack The Box Backend Task

### Tasks

1. Hey Morty, we need to know the users of each dimension in case we decide to move to another again. Just id and name morty, do not go around giving sensitive information to people. ~Rick\
Hint: Create endpoint to list dimension's users, example route: `dimensions/{id}/users`.

2. We need an endpoint to teleport users to other dimensions but let's put a restriction so portal guns are not burned from the extensive use. Let's keep a log of the travels in case we need it later. Users should be able to teleport to other dimensions every 10 seconds. ~Council of Ricks\
Hint: Create endpoint for teleporting a user to another dimension + logging + time restriction.

3. We need a way to monitor dimension travelling. Create an endpoint to return the travels of a user but make sure only WE can use this endpoint. Create a column in users table called `council` and allow only council members to access the created endpoint. Use Laravel's `Policies` to restrict access to non-council users. ~Council of Ricks\
Hint: Registration should keep working without changing its functionality.

4. `Rick`: Hey Morty, I am building a machine that will show us all the dimensions, the users currently there for each one and how many times each of those users has visited that dimension. Isn't that nice Morty?\
   `Morty`: Aww Jeez Rick, will you also ask for optimizations after?\
   `Rick`: Come help your grandpa now Morty!\
   `Morty`: OK Rick! Jeez give me a rest man!\
Hint: Result should look something like this:\
`{"dimensions": [{ "id": 1, "name": "R-923", "users": [{ "id": 2, "name": "Cassandre", "times_visited_dimension": 1 },...]},...]}`

5. Aw Jeez man, my grandpa forgot to create a login endpoint. Now there is no way for users to login other than giving them my oauth secret. Also we need to add throttling there for sure (5 requests per 1 minute). Aw this is bad man...Please help! ~Morty\
Hint: Create a login endpoint suitable for users.


### Project Details

This project is mostly the default laravel template. It has had passport authentication installed.
For your convenience a local configuration and database have been provided (.env and database/database.sqlite)

You should be able to run this project by first running `composer install` to install dependencies and then `php artisan serve` to start the local server at http://localhost:8000
