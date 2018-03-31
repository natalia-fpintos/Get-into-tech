# Get Into Tech: Day 10 #

## jQuery ##

jQuery is a library that makes easier to program in JS, by providing methods that we can call with a single line of code as opposed to write many lines to achieve the same result. This makes a real difference when using AJAX or doing DOM manipulation.

Some of the features of jQuery are:

- HTML/DOM manipulation
- CSS manipulation
- HTML events methods
- Effects and animations
- AJAX
- Utilities and plugins

When we use jQuery, we select (or query) HTML elements and use actions on them. The basic syntax is:

```JavaScript
$(selector).action()
```

- The `$` symbol signifies 'jQuery' and specifies that we are going to use a jQuery query.
- The selector, selects an HTML element to query. It uses CSS-like selectors.
- The action to be performed on the element selected is one of the methods that jQuery provides.

```JavaScript
// This hides the current element
$(this).hide()

// This hides all <p> elements
$("p").hide()

// This hides all elements with a class of 'demo'
$(".demo").hide()

// This hides the element with an id of 'demo'
$("#demo").hide()
```
<br/>

### HTTP Requests ###

We can send HTTP requests easily with a web browser:

- When we use the URL we are implicitly using a GET request. For example, each time we connect to a site with a browser, we use a GET request. This request determines which is the IP of the machine to connect to, and sends the GET request. Optionally, it can contain a query string with key/value pairs after a question mark.

- To send a form, we can use either a GET or FORM request (other request verbs are not allowed). Usually we use POST requests for this, as the key/value pairs will be sent in the request body, rather than the URL.
<br/>

### AJAX ###

AJAX stands for **Asynchronous JavaScript And XML**. It is a mechanism to generate and send HTTP requests while the page is running, that is, without the need to reload the page.

With AJAX we can use other request verbs, besides from GET and POST.

Whenever we submit a form, the web browser creates a **HTTP POST** request and writes in its body the key/value pairs with all the data from the form fields. PHP automatically populates the `$_POST` associative array with the kets and values of the request.

**Note:** checkboxes are a bit complicated, as they normally contain the value "on" if they are checked. However, if they are unchecked, they simply not appear in the `$_POST` array. For this reason, in order to determine if a checkbox is ticked or not, we need to check if the element exists or not:

```php
if (isset($_POST['checkboxField'])) {
  // some code
}
```
<br/>

### Multidimensional `$_POST` ###

PHP contains a feature that allows us to parse HTTP POST request bodies:

If we use the `name` input attribute as PHP arrays, then they will be parsed into `$_POST` as if they were an array.

```php
<input type="text" name="User[name]"/>
<input type="password" name="User[password]"/>
<input type="email" name="User[email]"/>
<input type="text" name="User[comments][]"/> // Adds to $_POST['User']['comments']
<input type="text" name="User[comments][]"/> // Adds to $_POST['User']['comments']

print_r($_POST);
/*


*/

print_r($_POST['User']);
/*


*/
```

This feature is only for PHP, so it might cause unexpected results in other languages or applications.

**Note:** The example with `User[comments]` uses sequential additions to an array, so in the end we will get a sequential array with elements for each of the fields with the same name.
<br/>
<br/>

### Filtering functions ###

It is recommended to use filtering functions (from the filter function library) rather than using the raw data of the superglobals. This library offers basic input validation and sanitisation.

- `filter_input_array()`: gets the entire array.

- `filter_input()`: retrieves a value from the specified array. It gives us access to `$_POST` and `$_GET`, either filtered, validated, sanitised or raw.

- The `FILTER_*` options provide different sanitisation and filtering functionality.


```php
// To retrieve the value in $_GET['username']
filter_input(INPUT_GET, 'username');

// To also encode any special characters in the output
filter_input(INPUT_GET, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
```

Some other filter functions are:

- `filter_has_var()`: checks if a variable of a specific type exists.

- `filter_id()`: returns the filter ID of a named filter.

- `filter_list()`: returns a list of all the filters available.

- `filter_var()`: filters a variable with a specified filter. It basically allows us to apply the available filters available for `filter_input` to our own data.
<br/>

### Uploading files ###

HTML forms can be used to upload files with the input `type="file"`. PHP supports this in a very straightforward way.

The process is the following:

1. The user **selects** a file using the file browser provided with `<input type="file"/>`.
2. The browser **breaks** the file down in chunks for transmission, and **sends** them to the web server, which **stores** them in a temporary location.
3. The **PHP** application determines what to do with the file.

**Note:** As the file is stored in a temporary location, we need to make sure that the drive of the host machine has enough room to store this file, and also make sure this folder is routinely cleaned to remove old files.

However there are some configuration options which can interfere with the process. For example:

- The php.ini file configuration settings should be reviewed to make sure they are appropriate to support our upload functionality.

- The temporary folder to keep our file should exist and have the correct permissions.
<br/>

### The php.ini file configuration ###

There are a few configuration variables that will need to be reviewed to make sure we can upload files correctly:

- `file_uploads`: allows us to enable or disable PHP for file uploads.

- `max_input_time`: setting this value to 0 will allow the script to continue to run for as long as it needs to, however this can be a problem as it affects more than just uploading a file. If the application requests a service which takes too long, it will slow down our application. The `set_time_limit()` function changes the allowed execution time of a script.

- `post_max_size`: this determines the total allowed size of POST data.

- `upload_tmp_dir`: this should be set to a temporary storage volume or partition in order to isolate the uploaded file and make it easier to free this space.

- `upload_max_filesize`: indicates the largest size allowed for a file upload.

- When uploading a file, we might want to not use POST, as it's not a very reliable upload method. It might be best to use an **FTP server**.
<br/>

### PHP requirements for file upload ###

In order to upload a file and process it with PHP, we need a few things:

- `enctype`: it is important to specify the enctype of the form, as this is what determines the type of the file to be uploaded.

- `<input type="hidden">`: PHP requires a hidden field in our form, which indicates the `MAX_FILE_SIZE` with a value that must be no greater than the .ini settings. This is the initial maximum file size we determine, and the one in the .ini file is a "hard limit" to avoid problems if the user changes our hidden file to accept a bigger file.

- `<input type="file">`: this displays our Browse button to browse and select our file to upload.

```php
<form action="upload.php" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="MAX_FILE_SIZE" value="10000000"/>
  <input type="file" name="myFile"/>
  <input type="submit" value="send"/>
</form>
```

### The `$_FILES` superglobal ###

When a file has been sent using POST, PHP parses its data into a superglobal named `$_FILES`. This array contains the location of the temporary file. In the event that we submitted multiple files, the array will contain an independent file in each of its elements.

The elements of the superglobal are:

- `name`: contains the name of the originally uploaded file.

- `type`: contains the MIME type of the file, inferred by the browser.

- `size`: indicates the size of the file in bytes.

- `tmp_name`: contains the temporary location of the file in the server.

- `error`: indicates any errors that are associated with the file upload.

```php
print_r($_FILES);
/*

*/
```
<br/>

### Processing an upload ###

There are a number of steps we need to follow to process an uploaded file:

1. We define a constant with the name of the `<input type="file">` element.

2. We define a constant with an array that contains a list of all the allowed MIME type we accept. We will reject all file types that are not in this array.

3. We check if the `$_FILES` array contains our uploaded file, checking if there's an entry for the name of our file.

4. We check if there are any errors in the upload. A value of 0 in this field indicates success, any other number indicates errors.

5. We compare the MIME type of the uploaded file with the types allowed.

```php
const InputKey = 'myFile'; // Step 1
const AllowedTypes = ['image/jpeg', 'image/jpg']; // Step 2

if (empty($_FILES[InputKey])) { // Step 3
  die("File missing");
}

if ($_FILES[InputKey]['error'] > 0) { // Step 4
  die("Errors during the upload");
}

if (in_array($_FILES[InputKey]['type'], AllowedTypes)) { // Step 5
  die("Invalid file type");
}
```
<br/>

### Handling the uploaded file ###

After we have checked the file, we are ready to go ahead and use it for our purpose. We have different options:

- We can move the file from its temporary location to a suitable place.
- We can read from the file and store its contents in a database.
- We can read from the file and parse it.
- We can use it for other specific purposes (i.e. thumbnails)

**Note:** the `tmp_name` key of the array contains the location of the temporary file. The `move_uploaded_file()` function can move the file from one part of the disk to another. The `unlink()` function deletes the temporary file if it still exists.

```php
$tmpFile = $_FILES[InputKey]['tmp_name'];
$dstFile = 'uploads/' . $_FILE[InputKey]['name'];

if (!move_uploaded_file($dstFile, $tmpFile)) {
  die("Error moving file");
}

if (file_exists($tmpFile)) {
  unlink($tmpFile);
}
```
<br/>

### Uploading multiple files with PHP ###

In order to upload many files in the same form, we can use the HTML array syntax in multiple `<input type=file>` elements. This works because `$_FILES` is a sequential array, where each element is used for a different uploaded file.

```php
<form action="upload.php" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="MAX_FILE_SIZE" value="10000000"/>
  <input type="file" name="myFile[]"/>
  <input type="file" name="myFile[]"/>
  <input type="file" name="myFile[]"/>
  <input type="submit" value="send"/>
</form>
```
<br/>

### File functions ###

There are a number of useful functions to use when managing file uploads:

- `mkdir()`: this function creates a new directory.

- `filesize()`: this function returns the size of a file.

- `copy()`: this function copies a file.

- `rename()`: this function renames or moves a file or directory.

- `filemtime()`: this function returns the modification time of a file.
<br/>
