## --version v2.1.0

- made DatabaseResult iterable
- deprecated Iterate function

## --version v2.0.2

- added DatabaseConfig unit tests
- added Database unit tests
- added DatabaseResult and SQL unit tests
- added InvalidDefineReturnTypeException
- added InvalidDatabaseException
- added InvalidContextArgumentException
- added NoAccessException
- added InvalidQueryException
- added BaseCrudQuery class
- added BaseDatabase class
- added changelog.md
- added join support for ReadQuery
- added union support for all queries
- added the option to only pass in the query to define
- added support for Wordpress prepared statements
- added support for MySQLi prepared statements
- changed the README.md to be up to date with the latest changes
- changed the Query object into seperate Objects per crud action
- changed the enclosedValues function to now be able to be used for non-enclosedValues as well
- changed the the insert and all where statements into prepared statements
- fixed a bug where getRowsByFieldValue would always use the rows array instead of the given array
- fixed a bug where iterate would empty the modifiedRows array, and break the method chain
- fixed a bug where you couldn't get the results from the excecuteQuery function
- fixed a bug where entering a empty databaseName didn't throw a exception
- fixed a bug where an exception would be thrown if you dont return a query
- fixed a bug where throwing exceptions within the define function would be caught automatically
- renamed class Database => MySQLi
- renamed class WordpressDatabase => WordPress
- renamed folder access => database
- renamed enclosedValues => multipleValues
- renamed mutlipleValues => multipleDropValues
- renamed excecuteQuery => executeQuery
- removed the QueryEngine class
- removed the BaseEngine class
- removed the BaseQuery class
- removed the Query class
