# PHP-Technical-Test-1
This is a Technical Test I did for a job I applied for.


===================================
# PHP Test Project

### Description
This is a very simple one-page application consisting of just one table (representing users of some company),
and a form for creating new rows. To make it a little more complicated, we have written a 'framework' you will have to use.
Bellow is set of simple tasks to perform.

### Preparation steps
1. Create new MySQL database
2. Rename `config/database` to `config/database.php` and configure you database connection settings in this file
3. Import `database/schema.sql` into your database

### Tasks to perform
1. Style the page using [Bootstrap](http://getbootstrap.com/):
  * Every other table row should be highlighted.(DONE) (views/index.php)
  * Use Bootstrap’s form-horizontal to style the form.(DONE) (views/index.php)
  * Any other styling changes should be made based on your consideration. (DONE)
2. Add a validation of the new records. (DONE) (create.php)
3. Create a JS functionality to filter rows by city. (DONE) (index.js)
4. Implement submission of the form using AJAX. (DONE)(index.js)
5. Add column phone number to the table. (DONE)(schema.sql, create.php, user.php, index.js, views/index.php)

====================
