# Get Into Tech: Day 11 #

## State: Cookies and Sessions ##

One of the limitations of the HTTP protocol is that it is unable to maintain a state (it's stateless). This means that HTTP doesn't remember anything about a client or server sending a request.

The HTTP protocol specifies that the requests sent to the server are ahistorical, for this reason, everything that a server needs to respond to a request needs to be included in the HTTP request itself.

The HTTP protocol has its limitations. One of the most important is its inability to maintain state: there is nothing about HTTP which requires a browser or a server to remember anything about the client/server sending the request.

In order to be able to maintain a state and have the server remind us, we need to use **cookies** or **sessions**.
<br/>
<br/>

## Cookies ##

A **cookie** is a small piece of data that are sent with every request. Basically, they are **key-value** pairs that are sent with GET and POST requests.

This small piece of information is the way websites have of remembering who you are and what your preferences are. This information is used by the browser to remember data about you on behalf of a website.

Cookies are also used for invasive tracking and advertising systems, but they are also used for helpful purposes:

- **Authentication:** they can remember a username, email or person that logged in.
- **Identify and track users:** they can identify that a browser session belongs to a user.
- **Preferences:** they can also remember preferences related to the site (i.e. language).
<br/>

## Cookie types ##

There are two types of cookies depending on how the browser remembers data:

There are two types of cookie divided by how the browser remembers: session cookies live in memory and only while the browser window is open. Persistent cookies are stored in files.
Since sessions cookies only live in memory and only for a brief amount of time they cannot be used for user tracking, nor can they be stolen (by viruses etc.) and indeed are the most harmless kind.
By default PHP creates session cookies.

- **Session cookies:** these live in the memory and they only exist while the browser window is open. For this reason, they cannot be used to track and they also cannot be stolen (by a virus). By default, PHP creates session cookies.

- **Persistent cookies:** these are stored in files in the computer.
<br/>

## PHP Cookie functions ##

- **`setcookie()`:** PHP needs to send headers to set a cookie. This function creates a cookie by sending an HTTP response header which the browser can understand and uses to create a cookie file.

`setcookie()` and all the header functions must be used before any other echo or output, as when the PHP script outputs ordinary text, PHP understands that the headers have finished and files the response body with the supplied output.

A cookie can store approximately 4kB of data, and up to 50 cookies can be set per user per subdomain.

By default, PHP creates a session cookie, but we can make cookies persistent by indicating an expiry date in the third parameter of the function. **Note:** setting the expiry date of a cookie in the past is a quick way of "deleting" a cookie.

```php
setcookie('username', 'yoko');

$oneWeek = time() + (60 * 60 * 24 * 7);
setcookie('salesoffer', '50percent', $oneWeek);
// time() returns the time in seconds since the epoch

$past = time() - 1;
setcookie('salesoffer', '50percent', $past);
// setting the time in the past to expire a cookie
```
<br/>

## The `$_COOKIE` superglobal ##

All the cookie headers that have been sent are parsed into the `$_COOKIE` superglobal. It's an associative array, such as `$_POST`.

**Note:** that we can only access the contents of this superglobal once the next loading of a page that uses the cookie.

```php
print_r($_COOKIE);

/*
Array ( [username] => yoko )
*/
```

It's important to remember that we should treat `$_COOKIE` as user data and potentially dangerous, as the cookie might have been replaced with malicious code. We need to validate the values of a cookie before we use them.
<br/>
<br/>

## Sessions ##

On a browser, a **session** is what starts when we open a window, browse to an URL and stay there for a certain time.

This means that a session is actually a **series of HTTP requests and responses between a browser and a server**, that represent that the user is active in that website. HTTP itself has no notion of a session, but we represent it as this set of continuous requests and responses between the user and the server.


In PHP instead, we can have **real sessions**, as PHP can identify a specific browser and and the set of requests and responses that belong to a particular user that is active on a website.

PHP typically uses cookies as a session identifier. This **cookie** connects a browser session to a temporary file that contains data for that user and session.

The process is the following one:

1. The client connects to a website, and an initial **HTTP request** is sent to the server.

2. The server (via PHP) parses the server data in **`$_SERVER`** (i.e. IP address, browser, etc).

3. The server (via PHP) sends a **cookie** back to the client, that is, a session id cookie header. This is a unique identifier.

4. For every further request, the client includes the **cookie** unique session id.

5. The server receives this **cookie** that contains the session id and uses it to connect the user to their data (i.e. remember a login).

**Note:** Every browser is given a unique id so PHP can identify particular users.
<br/>
<br/>

## PHP Session functions ##

- **`session_start()`:** this function sends the initial cookie to the server. If a cookie has already been set, it retrieves that session id and all the session data for the user. This data is then populated in the `$_SESSION` superglobal.

- **`session_destroy()`:** it removes all the session data for the user.

The `$_SESSION` superglobal is an associative array which is particular to every browser session.

```php
if(empty($_SESSION)) {
  die('Please log in');
}

// The code below is a ternary operator shorthand
// If the condition is set, its value will be returned
// If it's not set, the value 'guest' will be returned
$username = $_SESSION['user'] ?? guest;
```
<br/>

## Session handler ##

The **session id** is stored in a cookie called `PHPSESSID`.

In the server, the **session data** is stored in a temporary file. Its location can be found if we use the function `session_save_path()`. We can also use this function if we want to change the location of this file.

If we want to change the way that PHP stores the session data, we need to set a callback function using `session_set_save_handler()`.
<br/>
<br/>

## Sessions without cookies ##

Sessions don't require cookies. We can still have session information without using cookies.

For example, if a browser doesn't support or allow cookies, PHP will insert a query parameter in the URL of the request, which will hold the session id for the user:

```
www.example.com/?PHPSESSID
```

All further requests will need to have this information appended to the URL.

This might be problematic and insecure, because if the link is shared, another person can have access to another user's session.
<br/>
<br/>

## Authentication ##

In order to authenticate the user we need to:

1. Always call `session_start()` to ensure that `$_SESSION` is populated. If it's not, it will send a cookie to start the session.

2. Use a **login** function to check if the username and password are correct. Then add some information to the user's session (for example, their access level and user id).

3. Use a function to check the access level of the user in the session, for example with a function called `check_access()`. As this data was set in the server, there are no chances of tampering.

4. Use a **logout** function to delete the user's data from the session with `session_destroy()`.

```php
session_start();

function login ($username, $password) {
  if ($username === 'admin' && $password === 'admin') {
    $_SESSION['user'] = [
      'id' => 1,
      'access_level' => 'admin'
    ];
  }
}

function logout () {
  session_destroy();
}

function check_access($level) {
  return empty($_SESSION) ? false :
    $_SESSION['user']['access_level'] === $level;
}
```
<br/>

## HTTP functions ##

There are a few functions related to HTTP that are used with authentication systems:

- **`header()`:** this function sends a custom header. The most common is "Location", which sends a redirection header and redirects the page.

A common error when using `header()` is that header doesn't terminate the script, so the code will continue to run even though the user sees a different page, which can be a security issue. It is best practice to `exit()` after a redirection.

- **`exit()`:** ends the session. It is often used for intentional exit conditions.

- **`die()`:** ends the session but is used more often when debugging.
<br/>

## MySQL: Intro to databases ##

Databases store data in tables, which can have relationships defined between them (relational).

Relational databases have a language called **SQL** (Structured Query Language).

A database can come in different forms:

- A flat-file that stores all the data in a single file.
- Networks of linked objects and their relationships.
- A hierarchical tree structure.

There are two main types of popular databases:

- **Relational databases:** these take a single-dimentional approach, using keys to relate data from one table to another. They give a greater degree of control over the data we want to retrieve.

- **NoSQL databases ("document-oriented"):** these nest the data so, when a record is retrieved, we get all the data at the same time.
<br/>

### Relational databases ###

Relational databases store data in **tables**, which are linked with **relations**.

The tables are made of columns and rows. The columns are known as **fields** and the rows are known as **records**.

Fields always have a **name** and a **data type**.

In a table, one or more columns can be designated as the **primary key** for that table. The data in that column (or the combination of columns if many are selected) must be unique.

Also, tables might contain references to primary keys of other tables, these are known as **foreign keys**.

The database has a **schema**, which describes its tables, as well as the data types and names of the fields.
<br/>
<br/>

### No SQL databases ("Not only SQL") ###

There are different forms of NoSQL databases, what they have in common is that they **don't** store the data in tables. Instead, they store objects, which can be anything.

- **Columns:** uses timestamps to differentiate data (i.e. Cassandra).

- **Documents:** uses XML or JSON to store information (i.e. MongoDB).

- **Key/Values:** uses associative arrays (i.e. CouchDB).

- **Graphs:** are based in the graph theory of many links between objects (i.e. Neo4j).

- **Multimodal:** are a mixture of the NoSQL methods used above, plus the relational model.

The support languages for these databases are often similar to SQL.
<br/>
<br/>

## Cyber security useful resources ##

```
hackyourselffirst.troyhunt.com
hackertest.net
```
