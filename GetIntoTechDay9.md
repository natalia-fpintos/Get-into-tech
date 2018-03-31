# Get Into Tech: Day 9 #

## HTTP Requests and responses ##

When a client connects to a server, it sends a **HTTP request** that contains metadata with information about the request, as well as any data needed for the request (i.e. contents of a form).

Then the server responds with a **HTTP response** that also includes metadata and the requested content.

Browsers and servers automatically send and receive these requests.


### HTTP requests ###

HTTP requests are made of:

1. A **request line**, which contains:
  - The request method (i.e. GET)
  - The URI that made the request. Uniform Resource Identifier, a string of characters used to identify a resource that made the request.
  - The HTTP version used to send the request.
  - A CRLF (Carriage Return and Line Feed: \r\n)

2. Zero or more **header fields**, each followed by a CRLF: these are "Name: Value" pairs that contain information about the HTTP request and the browser that sends the information.

3. An **empty line** (a CRLF) indicating the end of the header fields

4. An optional **message body** with the data and the content: if included, the Content-Type and Content-Length in the headers specify the nature of the content included. This carries the actual HTTP request data, including any form data and uploaded file data.

```
POST /php/myapplication.php HTTP/1.1
User-Agent: Mozilla/4.0 (compatible; MSIE5; Windows NT)
Host: www.example.com
Content-Type: application/x-www-form-urlencoded
Content-Length: length
Accept-Language: en-us
Accept-Encoding: gzip-deflate
Connection: Keep-Alive

key=valye&username=example&email==me@email.com
```
<br/>

### Request Verbs ###

There are a number of methods used in HTTP requests. The four that are used most often are:

- **GET**: gets information from a server, using the provided URI. They should only retrieve data and have no effect on it.

- **POST**: is used to send data to the server, for example the data in a form or an uploaded file.

- **PUT**: it replaces data at the target, with the data sent in the request.

- **DELETE**: removes all the current representations of the target resources given by the URI.


There are also a few more that are not so used:

- **HEAD**: works in the same way as GET, but only transfers the status line and the headers.

- **CONNECT**: establishes a tunnel to the server identified by an URI.

- **OPTIONS**: describes the communication options for the target resource.

- **TRACE**: performs a message loop back test, along with the path to the target resource.
<br/>

### HTTP responses ###

A HTTP response follows a similar structure to the request:

1. A **status line**, which contains:
  - The protocol version used to transmit the response
  - A numeric status code
  - The textual interpretation of the status code
  - A CRLF (Carriage Return and Line Feed: \r\n)

2. Zero or more **header fields**, each followed by a CRLF: these are "Name: Value" pairs that contain information about the HTTP response, the server software, when the file was last modified, etc.

3. An **empty line** (a CRLF) indicating the end of the header fields

4. An optional **message body** with the data or content requested: if included, the Content-Type and Content-Length in the headers specify the nature of the content sent.

```
HTTP/1.1 200 OK
Date: Mon, 21 Mar 2016 09:15:56 GMT
Server: Apache/2.2.14 (Win32)
Last-Modified> Mon, 21 Mar 2016 09:14:01 GMT
Content-Length: 88
Content-Type: text/html
Connection: Closed

<html>
<body>
<h1>Hello, world!</h1>
</body>
</html>
```
<br/>

### HTTP status codes ###

There are many status codes that can be returned with a HTTP response. We can identify their nature by their first number:

- `1XX`: Information responses, for example, to inform that the processing is still happening. (i.e. 102 - Processing).

- `2XX`: Successful responses. (i.e. 200 - OK).

- `3XX`: Redirection responses, these are given when a resource has been moved to a different location. (i.e. 301 - Moved Permanently).

- `4XX`: Client error, this indicates a problem with the request done by the client. (i.e. 404 - Not Found).

- `5XX`: Server error, this indicates a problem with the server. (i.e. 500 - Internal Server Error).
<br/>

### GET ###

A GET request doesn't have a request body, because the information that is sent to the server is included in the URI:

- The **protocol** (i.e. HTTP)
- The **host** (i.e. www.example.com)
- The location of the **resource** (i.e. index.php)
- The **query string** (i.e. ?username=foo&email=foo@email.com)

```
http://www.example.com/index.php?username=foo&email=foo@email.com
```

The disadvantage of using GET is that the query string displays all the data sent in the URL. Also, there's a limit of 255 characters (though in practice it can be over 1000 characters).
<br/>

### POST ###

A POST request includes the data sent to the server in the message body. Also can use the query string system to send data.

With post we can send **larger** or more **sensitive** information, as the size is virtually unlimited (it is limited by what the server can accept). As this information is hidden in the request, the client doesn't see it in the URL.

POST is technically not more secure than GET, as both are sent as plain text over the network. In order to send an encrypted message, we need to use HTTPS.
<br/>

### Visualising requests and responses ###

**Postman** is an application that allow us to send requests in a visual way and see the responses to these.

We can also see all this information in the developer tools, going into the **Network** tab.
<br/>

## PHP Superglobals ##

PHP processes the information in the request into an associative array, these are known as **superglobals**. This information is accessible everywhere, without the need for the `global` keyword.

- `$_GET`: contains key/value pairs from the URL's query string.

- `$_POST`: contains key/value pairs from the message body of the POST request.

- `$_REQUEST`: it's a combination of `$_GET` and `$_POST`. It's usually not a good idea to use it, as we normally would want to know if our data comes from a GET or a POST request.

- `$_SERVER`: contains headers and server information.

- `$_FILES`: contains the uploaded file data sent by POST.

- `$_COOKIE`: contains special data headers that are sent with requests.

- `$_ENV`: contains server and system information, known as environment variables.

- `$_SESSION`: contains session variables.

- `$GLOBALS`: contains an associative array of all global variables.


`$_SERVER` and `$_ENV` include variables related to the execution environment, a few of these are:

- `REQUEST_METHOD`: this contains the HTTP request verb.

- `HTTP_REFERRER`: this indicates the URL where the user came from.

- `REQUEST_URI`: it contains the URL without the host.

- `HTTPS`: when using HTTPS, this variable contains some information.

- `HTTP_USER_AGENT`: it contains a string with the browser name and version.
<br/>

### Curl ###

Curl (ClientURL) is an open source command line tool, and a library, that allows us to transfer data with URL syntax. We normally use it in the command line or scripts in order to transfer data.

In PHP, we can use the functions `curl_init()` and `curl_setopt()`, which are predefined in the curl library, and set an option for a curl transfer.

- `curl_init()`: this function initialises the curl session and returns a curl handle to be used with further curl functions.

- `curl_isetopt()`: takes three arguments, first the curl handle returned by the `curl_init()` function, secondly a curl option to set, and last, the value to be set in this option.

We can use the `CURLOPT_URL`, `CURLOPT_POST` and `CURLOPT_POSTFIELDS` to set the options, as they are predefined constant integer values.

```php
$curlHandle = curl_init();

curl_setopt($curlHandle, CURLOPT_URL, "http://www.example.com/?user=cat");
curl_setopt($curlHandle, CURLOPT_POST, true);
curl_setopt($curlHandle, CURLOPT_POSTFIELDS, "username=Cat&password=IlikeMice");
```

The code above initialises curl and sets the URL to `http://www.example.com/?user=cat`, defines the request as `POST` and defines the fields to post as the following key/value pairs `username=Cat&password=IlikeMice`.

Then curl gathers this information and sends the request for us, which looks like this:

```
POST /?user=cat HTTP/1.1
Host: www.example.com
Content-Type: application/x-www-form-urlencoded

username=Cat&password=IlikeMice
```

If we used the superglobals after the previous request, this would be the information we would get from them:

```php
print_r($_GET);
/*
Array (
  [user] => cat
)
*/

print_r($_POST);
/*
Array (
  [username] => Cat
  [password] => IlikeMice
)
*/

print_r($_COOKIE);
/*
Array (
  [cookieKey] => cookieValue
)
*/

print_r($_SERVER);
/*
Array (
  [SERVER_SOFTWARE] => PHP 7.0.3RC1 Development Server
  [SERVER_NAME] => localhost
  [SERVER_POST] => 90
  [REQUEST_URI] => /OutputSupers.php?user=cat
  [REQUEST_METHOD] => POST
  [CONTENT_LENGTH] => 50
  [CONTENT_TYPE] => application/x-www-form-urlencoded
  [REQUEST_TIME] => 1823927639 // ...abridged!
)
*/
```
<br/>

## Alternative Syntax for PHP ##

When a page mixes PHP and HTML it can be tricky to keep track of blocks of code, and we might end up overusing the `echo` statement. As an alternative, we can use a different PHP syntax that allows us to do this in a more efficient way. This is very useful for template files (i.e. .phtml)

In this syntax:

- We can write `if`, `switch`, `while`, `for` and `foreach` statements.
- Opening curly braces `{` are converted to a colon `:`.
- Closing curly braces `}` are replaced by an `endXX;` statement (i.e. endif; endfor; endforeach; endswitch;)

```html
<?php $a=1; $b=2;?>

<p>This is an example IF:<br/>
<?php if ($a == $b):?>
  A equals B<br/>
<?php else:?>
  A does not equal B<br/>
<?php endif;?>
</p>

<p>This is an example WHILE:<br/>
<?php while ($a < $b):?>
  A is smaller than B<br/>
<?php
$a++;
endwhile;?>

<p>This is an example FOR:<br/>
<?php for ($i = 0; $i < 10; $i++):?>
  A is smaller than 10<br/>
<?php endfor;?>
</p>

<p>This is an example SWITCH:<br/>
<!-- The php parser does not allow any whitespace between the switch block and the first case statement -->
<?php switch ($a): case 1:?>
  Case 1<br/>
  <?php break;?>
  <?php case 2:?>
  Case 2<br/>
  <?php break;?>
  <?php case 3:?>
  Case 3<br/>
  <?php break;?>
<?php endswitch;?>
</p>
```

<br/>

## JavaScript ##

JavaScript is a scripting language that is used normally on the client-side to:

- Change HTML content and attributes
- Change CSS
- Submit HTML forms
- Create features to interact with a website
- Validate data before a submission
- Call server-side functionality without the need to reload the page (with AJAX)
<br/>

### JavaScript in a web page ###

We can add the JavaScript for our website within the `<script>` tags of you website. These can be added in the `<head>` or the `<body>` tags of the page.

Also, we can write JavaScript as an event response within an attribute of an HTML element, without the need for the `<script>` tag.

As another option, we can add our JavaScript in a separate file with the `.js` extension.
<br/>
<br/>

### Adding JS in an attribute ###

As an example, we can add our JS code inside an `onclick` attribute for a button. When the button is clicked, the script will run.

```html
<body>
  <h1>JavaScript in an attribute</h1>
  <p id="demo">With JS we can change HTML content.</p>

  <button type="button"
  onclick="document.getElementById('demo').innerHTML =
  'Hello, World!'">Click me!</button>
</body>
```
<br/>

### Adding JS in the <head> ###

When the JS code is contained in the `<head>` of an HTML document, it is normally loaded before the body.

```html
<head>
  <script>
  function changeText() {
    document.getElementById("demo").innerHTML =
    "Hello, World!";
  }
  </script>
</head>
<body>
  <h1>JavaScript in the head section</h1>
  <p id="demo">With JS we can change HTML content.</p>

  <button type="button"
  onclick="myFunction()">Click me!</button>
</body>
```
<br/>

### Adding JS in the <body> ###

When the JS code is contained in the `<body>` of an HTML document, it loaded after the previous contents of the page have loaded.

```html
<body>
  <h1>JavaScript in the body section</h1>
  <p id="demo">With JS we can change HTML content.</p>

  <button type="button"
  onclick="myFunction()">Click me!</button>

  <script>
  function changeText() {
    document.getElementById("demo").innerHTML =
    "Hello, World!";
  }
  </script>
</body>
```
<br/>

### JavaScript in external files ###

It is also possible to keep our JavaScript in an external file, which we then link in our HTML in order to have access to all its code. This makes our code easier to read and maintain.

In order to include many JS files in our page, we need to include them in a different `<script>` tag for each file.

```html
<head>
  <script src="myScript.js"></script>
</head>
```
