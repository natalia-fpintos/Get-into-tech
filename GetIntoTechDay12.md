# Get Into Tech: Day 12 #

## Database Management System ##

The **Database Management System** (DBMS) is the engine that controls the database. It is what handles our queries to interact with the data.

Types of DBMS:
- Oracle
- Sybase (SAP)
- DB2
- Microsoft SQL Server
- PostgreSQL
- MySQL
- MariaDB
<br/>
<br/>

## Relational databases ##

In a database, data is stored inside **tables**. These are made of rows which are known as **records**, and also are made of columns which are known as **fields**.

Rows can have a unique identifier, known as their **key**.

The tables in a database have **relationships** which can be of different types:

- **One to one:** For each record of one table, there is one record in the other table. We use these when a table has many fields, but we want to segment the data.

- **One to many:** For each record of one table, there can be many corresponding records in the other table. For example, one person can have many cars.

- **Many to many:** For each record of one table, there can be many corresponding records in the other table, and viceversa. For example, an author can have many books, and a book can also have many authors.
<br/>

## Database terminology ##

- **DBMS:** Database Management System. It's the engine that the user interacts with to write queries. It processes SQL and responds with the information that was requested.

- **Relation - Table:** Information about a topic or entity.

- **Record - Row:** An instance of the entity.

- **Field - Column:** Attributes of a record.

- **Key:** Unique identifiers for tables, or references to other tables.

- **GUIDs:** Global Unique Identifier, combination of a-z and 0-9.

- **SQL:** Structured Query Language. It allows us to communicate with a database. The DBMS interprets the statements and does changes to the tables and structure.

- **Database Backups:** These are done by translating the tables and contents into SQL statements that, when run, recreate the system.

- **Normalisation:** When we put the duplicate data in a separate table and link it with an id, we are following the rule of normalisation.

- **Cascade:** Deletion of records should be done in cascade to avoid orphaned records.
<br/>

## MySQL in the command line ##

**MySQL** is an open source DBMS owned by Oracle and available for many OS.

MySQL's default port: 3306

MySQL in XAMPP lives in `/Applications/XAMPP/bin`.

The newer version of MySQL runs using an engine known as **MariaDB**.

We use the command `mysql` to start MySQL. This creates a connection to the database (we actually start the database when we start the server).

We can also run it in daemon mode, it runs in the background.

We can use the command `use` to determine in which database we are going to run commands. i.e. `use information_schema`.

We can use the commands below to show the databases and the tables in a database:

```sql
show databases;
show tables;
```
<br/>

## Creating a database - File import ##

In order to create a database we can write a SQL file (with the `.sql` extension) and import it in the command line:

```sql
-- Create the database:
CREATE DATABASE LandOfOoo;

-- Use LandOfOoo database onwards:
USE LandOfOoo;

-- Create a table;
CREATE TABLE CandyPeople (
  CandyID INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Name VARCHAR(60) NOT NULL,
  FavouriteFood VARCHAR(60) NULL
);
```

The command line to import the file contains `mysql` to start MySQL, then `-u` to specify the username, followed by the `user` we want to use. Then we use the `<` symbol to specify that we are feeding data into the database, and after it we indicate the filepath of the file.

```
$ mysql -u root < database_file.sql
```

Some of the usual commands for the command line:

- `--user=user_name` or `-u user_name`: The MySQL user name to use when connecting to the server.

- `--password[=password]` or `-p[password]`: The password to use when connecting to the server. If you use the short option form (-p), you cannot have a space between the option and the password. If you omit the password value, mysql prompts for one. Specifying a password on the command line should be considered insecure.
<br/>

## Creating a database - Command Line ##

We can also run MySQL commands that are reserved for a root user in the command line. We need to login as a root user this way:

```
$ mysql -u root
```
or
```
$ mysql -u root -p
```

Then we can create a database just by using the command create:

```sql
CREATE DATABASE LandOfOoo;
```
<br/>

## Database DDL (Data Definition Language) ##

To create a database in SQL we use the `CREATE DATABASE` command. It's helpful to specify that it should be created if it doesn't already exist, to avoid getting an error.

```sql
CREATE DATABASE IF NOT EXISTS LandOfOoo;
```

To delete a database and all its contents, we use the `DROP DATABASE`
command. Again, we can specify that we want to delete if it exists, otherwise we would get an error if it doesn't.

```sql
DROP DATABASE IF EXISTS LandOfOoo;
```

To create a table we usually place the **Primary Key** at the beginning, followed by the **Foreign Keys** and any other fields of the table. In some conventions the Foreign Keys are placed at the end.

```sql
CREATE TABLE CandyPeople {
  Primary Key,
  Foreign Key,
  Field 1,
  Field 2,
  ...
};
```

To create a key or field, we would first specify the name of that column, then the data type and length, and any constraints.

```sql
CREATE TABLE CandyPeople (
  CandyID INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  HouseID INTEGER NOT NULL,
  Name VARCHAR(60) NOT NULL,
  FavouriteFood VARCHAR(60) NULL,
  FOREIGN KEY (HouseID) REFERENCES Houses(HouseID)
);
```

**Auto_increment** is a feature mostly used for Primary Key fields, as it automatically generates the next available sequence number (an integer) as the value for the field, if a null value is inserted.
<br/>
<br/>

## MySQL data types ##

### Numeric data types ###

Type             | Description
-----------------|-------------
TINYINT(size)    | -128 to 127 or 0 to 255 unsigned
SMALLINT(size)   | -32768 to 32767 or 0 to 65535 unsigned
MEDIUMINT(size)  | -8388608 to 8388607 or 0 to 16777215 unsigned
INT(size)        | -2147483648 to 2147483647 or 0 to 4294967295 unsigned
BIGINT(size)     | -9223372036854775808 to 9223372036854775807 or 0 to 18446744073709551615 unsigned
FLOAT(size, d)   | Small number with floating decimal point. The max number of digits can be specified in `size`. The max number of digits after the decimal point can be specified in `d`.
DOUBLE(size, d)  | Large number with floating decimal point. The max number of digits can be specified in `size`. The max number of digits after the decimal point can be specified in `d`.
DECIMAL(size, d) | DOUBLE number stored as a string. The max number of digits can be specified in `size`. The max number of digits after the decimal point can be specified in `d`.
<br/>

### Text data types ###

Type               | Description
-------------------|-------------
CHAR(size)         | Fixed length string. The length is specified in brackets. Can be up to 255 in size.
VARCHAR(size)      | Variable length string. The max length is specified in brackets. Can be up to 255 in size. If the size is greater than 255 it will be converted to TEXT.
TINYTEXT           | String with a maximum length of 255 characters.
TEXT               | String with a maximum length of 65535 characters.
BLOB               | Used for Binary Large Objects. Can contain up to 65535 bytes of data.
MEDIUMTEXT         | String with a maximum length of 16777215 characters.
MEDIUMBLOB         | Used for Binary Large Objects. Can contain up to 16777215 bytes of data.
LONGTEXT           | String with a maximum length of 4294967295 characters.
LONGBLOB           | Used for Binary Large Objects. Can contain up to 4294967295 bytes of data.
ENUM(x, y, z, etc) | Contains a list of possible values, of which only one of them can be stored. We can list up to 65535 values. If a value is inserted but it's not in the list, a blank value will be inserted.
SET                | Similar to ENUM, but with up to 64 options. It can store more than one choice.
<br/>

### Date/Time data types ###

MySQL can accept various formats for a literal date or time:

```sql
'2012-12-31'
'2012/12/31'
20121231
```

Any dates that are not valid, such as `2012-31-12` will be entered as `0000-00-00`:


Type        | Description
------------|-------------
DATE()      | A date in the format YYYY-MM-DD. Supports from '1000-01-01' to '9999-12-31'
DATETIME()  | A date and time combination in the format YYYY-MM-DD HH:MM:SS. Supports from '1000-01-01 00:00:00' to '9999-12-31 23:59:59'
TIMESTAMP() | A timestamp. The value of this date is stored as the number of seconds since the Unix epoch ('1970-01-01 00:00:00' UTC). It supports a range from '1970-01-01 00:00:00' to '2038-01-09 03:14:07'
TIME()      | A time in the format HH:MM:SS. Supports from '-838:59:59' to '838:59:59'
YEAR()      | A year in a two or four-digit format. Supports from 1901 to 2155 for four-digit format, and from 70 to 69 for two-digit format, representing from 1970 to 2069.
<br/>

## Primary Keys ##

To define a field as a **Primary Key**, we can add the PRIMARY KEY attribute after the data type. Primary keys must be unique.

We can also define these at the end of the table. This notation allows us to define composite Primary Keys (multi-column):

```sql
-- As an attribute:
CREATE TABLE CandyPeople (
  CandyID INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Name VARCHAR(60) NOT NULL
);

-- At the end of the table
CREATE TABLE CandyPeople (
  CandyID INTEGER NOT NULL AUTO_INCREMENT,
  Name VARCHAR(60) NOT NULL,
  PRIMARY KEY (CandyID)
);

-- Composite key
CREATE TABLE CandyPeople (
  Name VARCHAR(60) NOT NULL,
  Surname VARCHAR(60) NOT NULL,
  PRIMARY KEY (Name, Surname)
);
```
<br/>

## Foreign Keys ##

To define a field as a **Foreign Key**, we need to specify what table they reference:

```sql
CREATE TABLE CandyPeople (
  CandyID INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  HouseID INTEGER NOT NULL,
  FOREIGN KEY (HouseID) REFERENCES Houses(HouseID)
);
```

Foreign Key constraints are not required, but they have the purpose of checking integrity in the references made. They ensure that the information entered is correct, checking that the id's exist.

You might need to specify the engine if your default storage is MyISAM, as it doesn't understand foreign keys.

You do not need to specify the `ENGINE=InnoDB` clause if InnoDB is defined as the default storage engine, which it is by default. If you need to do so, then the code would be as such:

```sql
CREATE TABLE CandyPeople (
  CandyID INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  HouseID INTEGER NOT NULL,
  FOREIGN KEY (HouseID) REFERENCES Houses(HouseID)
) ENGINE=InnoDB;
```
<br/>

## Backend storage ##

MySQL supports different backends for storage. This is specified when a table is created, otherwise the default is used.

We can check our default storage this way:

```sql
SELECT @@default_storage_engine;
```

Backend   | Description
----------|-------------
MyISAM    | Used to be the default storage engine. Fast and lightweight, without support for transactions and foreign keys.
InnoDB    | Modern storage engine, default for MySQL, supports transactions and foreign keys.
IBMDB2I   | For interoperability with IBM DB2 databases.
MEMORY    | In-memory storage, very fast but short life.
CSV       | Uses CSV files.
BLACKHOLE | MySQL equivalent of /dev/null. It discards all data written to it.
<br/>

## Constraints ##

**Constraints** are added to fields to restrict what data can be stored in them:

- `AUTO_INCREMENT`: The field will be automatically calculated in a sequential way, based on the previous record. Usually for Primary Keys.

- `NOT NULL`: The field won't accept NULLs in this field (mandatory).

- `DEFAULT`: If no value is provided, then a default value will be stored in the field.

- `CHECK[conditon]`: Places a constraint with a condition for the data stored.

```sql
-- For a single column:
CREATE TABLE CandyPeople (
  CandyID INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Name VARCHAR(60) NOT NULL,
  FavouriteFood VARCHAR(60) NULL,
  CHECK (FavouriteFood != 'Candy')
);

-- For multiple columns:
CREATE TABLE CandyPeople (
  CandyID INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Name VARCHAR(60) NOT NULL,
  FavouriteFood VARCHAR(60) NULL,
  CONSTRAINT CHK_NameFood CHECK (Name != 'Ice King' AND FavouriteFood != 'Candy')
);
```
<br/>

## Referential Integrity ##

For a database to have **referential integrity**, every foreign key must have a matching primary key in the referenced table.

InnoDB enforces referential integrity and makes sure that:

- No records are deleted from a primary table if they are referenced in a related table.

- No values are changed in a primary table if they are referenced in a related table.

- No records are added to a related table if there is no associated record in the primary table.
<br/>

## INSERT data into a table ##

The `INSERT` statement adds new data to a table. We can specify the fields we want to use or just send the data in the order of the table columns. Any columns not specified will be filled with NULLs if possible.

We can add more than one row of data if we send it as comma separated tuples.

```sql
INSERT INTO CandyPeople
(Name, FavouriteFood)
VALUES
('Peppermint Butler', 'Flesh')
('Princess Bubblegum', 'Sandwich');
```

The tuples format usually doesn't work with PHP libraries, we would need to use multiple independent `INSERT` statements for PHP.
<br/>
<br/>

## Database DCL (Data Control Language) ##

The **root** database user has more privileges than we actually need. If someone did a SQL injection attack, it could be really damaging.

It's best practice to create additional database accounts that have only the privileges they require for their tasks.

MySQL allows us to assign user privileges at 4 levels:

- Global
- Database
- Table
- Column

The **privileges** are:

| Privilege | Applies to         | Allows users to
| --------- | ------------------ | ----------------
| SELECT    | Tables & columns   | Select rows and fields from a table
| INSERT    | Tables & columns   | Insert record into a table
| UPDATE    | Tables & columns   | Update values of existing records
| DELETE    | Tables             | Delete existing records
| CREATE    | Databases & tables | Create new databases or tables
| DROP      | Databases & tables | Delete databases or tables
| USAGE     | Global             | Do nothing (users can't do anything)
| ALL       | Global             | Do everything (users can do anything, i.e. root users)
<br/>

## Creating new database users ##

We can use the `CREATE USER` command to create a new user account for the database. The passwords will be hashed before storage.

We need to provide the `username`, followed by an `@` and the `machine name`. If we want to provide a wildcard machine name we use `%`. We can use a machine name of `localhost` for a loopback connection (back to the source).

The username and host don't always need to be quoted but it's preferred as it avoids problems with symbols.

```sql
 CREATE USER 'Jake'@'localhost' IDENTIFIED BY 'BaconPancakes';
```

If we specify only the username, it's equivalent to `'user_name'@'%'`.
<br/>
<br/>

## Granting and Revoking privileges ##

We can assign privileges with the `GRANT` command:

```sql
-- Granting SELECT privileges to all tables of the LandOfOoo DB
GRANT SELECT on LandOfOoo.* to 'Jake';
```

If we are granting privileges to a user that doesn't exist yet, we can create it with the following syntax:

```sql
GRANT SELECT on LandOfOoo.* to 'Finn'
IDENTIFIED BY 'Mathematic!';
```

We can remove existing privileges with the `REVOKE` command:

```sql
-- Removing SELECT privileges for the CandyPeople table of the LandOfOoo DB
REVOKE SELECT, UPDATE on LandOfOoo.CandyPeople to 'Jake';
```
<br/>

## Deleting database users ##

We can use the `DROP USER` command to remove an existing account:

```sql
 DROP USER 'Finn';
```
<br/>

## Database DML (Data Manipulation Language) ##

### Updating records ###

We use the `UPDATE` command to change values in the database.

```sql
UPDATE CandyPeople
SET FavouriteFood = 'Crisps'
WHERE Name = 'Peppermint Butler';
```
<br/>

### Deleting records ###

We use the `DELETE` command to remove existing records from a table.

```sql
DELETE FROM CandyPeople
WHERE Name = 'Ice King';
```
<br/>

### Dropping tables and databases ###

We use the `DROP` command when we want to remove an entire table or database. We have to be careful with these as there is no warning or undo.

```sql
DROP TABLE CandyPeople;
DROP DATABASE LandOfOoo;
```
<br/>

## The SELECT command ##

When we want to select data from our tables, we use the `SELECT` command. It allows us to determine what data we want to see.

```sql
SELECT Name, FavouriteFood
FROM CandyPeople
WHERE Name = 'Peppermint Buttler';
```

We can also select **calculated** or virtual columns, these are not in the database itself but can be retrieved with the results of our query:

```sql
-- Date is a calculated column
SELECT Name, NOW() AS 'Date'
FROM CandyPeople
```
<br/>

## Concatenation ##

In MySQL it's possible to concatenate strings using the `concat()` function. It takes strings as parameters and returns a single string.

```sql
-- This will display 'Bacon Pancakes'
SELECT concat('Bacon', ' ', 'Pancakes');
```
<br/>

## The DISTINCT keyword ##

If a results set has duplicates, using the `DISTINCT` keyword would remove these and make sure our results have only unique combinations of fields.

```sql
SELECT FavouriteFood
FROM CandyPeople
```
| FavouriteFood |
| ------------- |
| Apples        |
| Apples        |
| Flesh         |
| Pasta         |
| Sandwich      |
| Pasta         |


```sql
SELECT DISTINCT FavouriteFood
FROM CandyPeople
```
| FavouriteFood |
| ------------- |
| Apples        |
| Flesh         |
| Pasta         |
| Sandwich      |
<br/>

## Sorting ##

The results of a query can be sorted with the `ORDER BY` statement:

```sql
-- Sorting by Name in descending order
SELECT Name
FROM CandyPeople
ORDER BY Name DESC
```
<br/>

## The WHERE statement ##

The results of our query can be filtered with a `WHERE` statement. It usually uses comparisons in order to determine which rows to select:

```sql
SELECT Name
FROM CandyPeople
WHERE Name = 'Princess Bubblegum';
```

Some comparisons we can do are `>`, `<`, `>=`, `<=`, `!=`, `=`, `in`, `not in`, `between ... and ...`, `like`.

Also, we can add more conditions with the `AND` and `OR` logical operators.

```sql
SELECT Name
FROM CandyPeople
WHERE Name = 'Princess Bubblegum'
OR FavouriteFood = 'Apples';
```

If we need to determine if a field is NULL, then we use the `is` and the `is not` keywords.

```sql
SELECT Name
FROM CandyPeople
WHERE FavouriteFood IS NOT NULL;
```
