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



## JavaScript ##



**homework: exercise 14 and 15**
**reading material: up to 358**
**Hangouts: 7:50 to 8:20**
