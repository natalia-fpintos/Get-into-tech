# Get Into Tech: Day 9 #

## HTTP Requests and responses ##

HTTP Requests are made of:

1. A **request line**: which contains:
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


### Visualising requests and responses ###

**Postman** is an application that allow us to send requests in a visual way and see the responses to these.

We can also see all this information in the developer tools, going into the **Network** tab.
<br/>

## JavaScript ##



**homework: exercise 14 and 15**
**reading material: up to 358**

**Team: Laura, Steph, Teyah**
**Hangouts: 7:45 to 8:10**
