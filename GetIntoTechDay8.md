# Get Into Tech: Day 8 #

## Array functions ##

Arrays are used widely in PHP and there are many functions for them:

- `list()`: this is not really a function but a language construct (such as `array()`). It assigns values to a list of variables in order.

```php
$people = [
  ['Alice'] => ['Leeds', 'London'],
  ['Lucy'] => ['Paris', 'Lyon']
];

foreach ($people as $name => list($town1, $town2)) {
  echo $town1; // Leeds in the 1st iteration, Paris in the 2nd
  echo $town2; // London in the 1st iteration, Lyon in the 2nd
}
```
<br/>

### Array dereferencing ###

We can use the subscript operator `[]` to access the elements of an array. This operator, however, can also be used with expressions that evaluate as arrays or return arrays. This is known as **dereferencing**.

```php
// Accessing the array element
$myString = 'Hello World!';
$myArray = explode(' ', $myString);
echo $myArray[1]; // World!

// Dereferencing
$myString = 'Hello World!';
echo explode(' ', $myString)[1]; // World!
```
<br/>

### Sort arrays ###

There are many functions in PHP to assist in sorting arrays, based on different conditions.

It is important to note that the sort functions in PHP sort the array by reference. This means that the original array is changed, and not that a new sorted array is returned. For this reason we need to pass a variable that contains an array to the sort functions.

In practice, it is more frequent to sort arrays for a web application using SQL or JavaScript.

- `sort()`: sorts the array in ascending order.
- `rsort()`: sorts the array in descending (reverse) order.
- `asort()`: sorts an associative array in ascending order, based on the value.
- `ksort()`: sorts an associative array in ascending order, based on the key.
- `arsort()`: sorts an associative array in descending order, based on the value.
- `krsort()`: sorts an associative array in descending order, based on the key.
- `usort()`: sorts the array based on a supplied callback function.

The `usort()` function behaves differently to the other set provided by PHP, as it requires that you supply a function which helps determine the order in which the elements will be sorted.

In the example below, we cannot sort the array with the usual functions because the values are each inside an associative array contained in an indexed array. However, we can use `usort()` and `strcmp()` to compare the values and determine which one should go first.

```php
$basket = [
  [0] => [
    ['name'] => 'oranges'
  ],
  [1] => [
    ['name'] => 'lemons'
  ],
  [2] => [
    ['name'] => 'apples'
  ]
];

usort($basket, function ($left, $right) {
  return strcmp($left['name'], $right['name']);
});
```
<br/>

### Merge/Reduce arrays ###

Arrays can also be reshaped in many ways: sliced, concatenated, resized and merged.

- `array_merge()`: concatenates two arrays, joins them together. It considers that the first array passed is the "head" and the second is the "tail".

- `array_slice()`: from a sequential input array, it extracts elements based on parameters.

- `array_shift()`: removes an element from the beginning of the array.

- `array_unshift()`: adds an element at the beginning of the array.

- `array_pop()`: removes an element from the end of the array.

- `array_push()`: adds an element at the end of the array.

- `array_unique()`: returns only unique values of an array.

Note that `array_merge()` truly merges both arrays, as opposed to + which takes into account the keys that are in use and ignores them when adding the arrays.

```php
$one = [1, 2, 3];
$two = [4, 5, 6, 7, 3, 2];

print_r(array_merge($one, $two));
/*
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 5
    [5] => 6
    [6] => 7
    [7] => 3
    [8] => 2
)
*/
print_r($one + $two);
/*
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 7
    [4] => 3
    [5] => 2
)
*/
```
<br/>

### Array keys and values ###

There are also functions in PHP to access parts of associative arrays:

- `array_keys()`: this function takes an associative array and returns a sequential array of its keys.

- `array_values()`: this function takes an associative array and returns a sequential array of its values.

- `array_combine()`: takes two sequential arrays and combines them into an associative array, one of them is used for the keys and the other for the values.

- `range()`: this function produces an array of elements within a range.

- `array_key_exists()`: determines if a key exists in an array. It is similar to using `isset()`.

- `in_array()`: determines if a value exists in an array.

- `array_column()`: this function takes an array whose elements are arrays, and extracts the values at a key.
<br/>

### Array iteration ###

We have a handful of functions that allow us to iterate through the contents of an array:

- `array_map()`: this function applies a callback function to each element of an array and returns an array with the result of each of the function return values.

- `array_filter()`: applies a callback function (a predicate function) that returns true or false. If the function returns true for the element, it will keep the value in the returned array. If it returns false, it will remove the value.

- `array_walk()`: this function applies a callback function to each element of an array, but it discards the return values.

- `array_walk_recursive()`: this function applies a callback function to each element of an array, but it discards the return values. It is used for nested arrays.
<br/>

### Transforming arrays ###

Transforming the data in one array and returning it in a return array is known as **functional programming**.

```php
$input = range(0, 8, 2); // produces [0, 2, 4, 6, 8]
$transformer = function ($element) {
  return $element ** 2;
};

$output = array_map($transformer, $input);
```
<br/>

### Closures & Function dereferencing ###

A closure is a function that has its own environment. Inside this environment, at least there should be one bound variable.

For example, this would happen when we create a function that takes a parameter, which is then used in an inner function that is returned. When we call the outer function, our parameter is bound to the inner function, so when we call the inner function it will always have the same bound parameter.

This way, functions can return functions that can be used directly, using the function as a value.

```php
// This is a closure
function messageType($type) {
  return function ($message) use($type) {
    return $type . $message;
  }
}

$sayName = messageType("My name is ");

// This is dereferencing a function
echo $sayName("Yoko"); // My name is Yoko
```
<br/>

### Calling functions ###

It is possible to assign a variable to a function and then call it as if it was the function:

```php
$upperCase = 'ucwords';

echo $upperCase("hello, world!"); // Hello, World!
```

We can also do this in a similar way with these functions:

- `call_user_func()`: it gets a function name and its parameter as strings.

- `call_user_func_array()`: this function treats a single array passed as a parameter as sequential arguments passed to the function called. It is equivalent to using the unpacking operator `...$array`.

- `function_exists()`: takes a function name and returns true if the function exists.

- `get_defined_functions()`: returns an array with the names of all the functions defined.
<br/>

### Dynamic dispatch ###

Calling a function using a string version of its name is known as **dynamic dispatch**. This is dynamic because the function that gets called depends on a variable which might change at runtime.

```php
function websiteA ($domain, $page) {
  echo 'A';
}

function websiteB ($domain, $page) {
  echo 'B';
}

$url = 'www.example.com/A';
$urlParts = explode("/", $url);

call_user_func_array('website' . $urlParts[1], $urlParts); // This calls websiteA() with the parameters inside $urlParts

$function = "website{$urlParts[1]}";
$function(...$urlParts);
```
<br/>

### Function arguments ###

There are a few additional functions that are useful when working with functions in PHP:

- `func_get_args()`: when we call this function from within a function, it returns a sequential array of the arguments that the function was passed when it was called.

- `func_get_arg()`: when we call this function from within a function, it returns a single argument passed when the function was called.

- `func_num_args()`: when we call this function from within a function, it returns the number of arguments that the function was passed when it was called.
<br/>


## HTML & HTML forms ##

A couple of useful websites when working with HTML 5 are these two:

```
http://html5doctor.com
http://www.html5pattern.com
```

When creating a HTML file, the doctype is a required tag to make sure the browser knows what version of HTML we are using.

The character encoding is also required. The webpage will still work without it, but we would be exposed to security vulnerabilities.
<br/>
<br/>

### HTML forms ###

Forms allow users to interact with programs running on the server. The web server works as a gateway for the user to send data to the back-end and return a response

Forms are created with the `<form>` tag, which takes two attributes. The first one is the `method` that states how the data is sent to the server, and the second is the `action`, which indicates the URL of a resource that processes the form (this can be a server-side program or script, or a mailto URL).

```html
<form action="/enrol.php" method="POST">
  <input type="text" name="username"/>
  <input type="text" name="password"/>
  <input type="submit" value="Enrol"/>
</form>
```
<br/>

### HTML form inputs ###

Form fields are usually defined with an `<input>` tag. The `type` attribute of this tag specifies if this should be a checkbox, a text field, a radio button, etc. Also, each input element has a `name` and a `value` attribute.

```html
<input type="text"/>
<input type="checkbox"/>
<input type="radio"/>
<input type="email"/>
<input type="password"/>
<input type="submit"/>
```

```html
<!-- Unique selection -->
<select name="title">
  <option value="1">Miss</option>
  <option value="2">Mrs</option>
  <option value="3">Ms</option>
  <option value="4">Mr</option>
</select>

<!-- Multiple selection -->
<select name="shopping" multiple>
  <option value="1">Apple</option>
  <option value="2">Orange</option>
  <option value="3">Banana</option>
</select>

<!-- Free text area -->
<textarea name="comments" rows="5" cols="10"></textarea>
```

A form is an **object** in the DOM (Document Object Model), so when we submit a form, all the form DOM objects inside our HTML are sent with the data submission to the server.

The majority of the form elements hold a single value, so they are quite easy to access. The select and radio button elements are a bit more complex.
<br/>
<br/>

### Form methods and events ###

The most useful properties of the **form object** are the **elements array** and its **objects**. Other important properties of this object are:

- `action`: contains the value of the action attribute of a form.
- `encoding`: it is an alias of `enctype`, and returns the value of the enctype attribute of the form.
- `method`: contains the value of the method attribute of a form.
- `name`: contains the value of the name attribute of a form.
- `target`: contains the value of the target attribute of a form.
- `length`: specifies the number of elements in the form. It has the same value as the length properties of the elements of the array.


The form object also has two **methods**:

- `submit()`: this function submits the form immediately, without waiting for the user to press submit.
- `reset()`: this function clears the contents of the form and sets them back to the default values.
<br/>

### Form validation ###

The contents of a form need to be **validated**. This can be done with client-side JavaScript or server-side checks and balances. HTML5 also provides validation tags that don't need scripting, which is supported in most modern browsers.
<br/>
<br/>

### Tag hierarchy and ownership ###

Before, it was required that input tags were put within a `form` tag. Now it is possible to place these on their own, by adding the `form` attribute to them.

```html
<!-- Standard syntax -->
<form id="myForm">
  <input type="submit" value="Click me!"/>
</form>

<!-- New form attribute -->
<input type="submit" value="Click me!" form="myForm"/>
```
<br/>

### New input elements ###

HTML5 includes many new form types. Not all these are supported by all browsers, so when a browser doesn't understand one of the form types, they are rendered as a `text` input type.

There is no requirement as to how browsers render the different input types. Each browser might show different UI and error messages. If a browser fails to support the new HTML5 types, we can defend against this using JavaScript:

```JavaScript
var i = document.createElement("input");
i.setAttribute("type", "date");

if (i.type == "text") {
  // Do something
}
```
<br/>

Some new input types have special functionalities that depend on the browser:

- `<input type="email"/>`: the email input type provides email validation when used in Firefox, Safari and Opera, and in iPhone it brings up special buttons in the keyboard (i.e. @).

- `<input type="url"/>`: the url input type, in Firefox and Safari, require that the user inputs a http:// address in order to submit the form. Opera adds this prefix once the form has been submitted. On an iPhone, this enables a keyboard with special buttons (i.e. .com).

- `<input type="date"/>`: the date input type, as well as other similar types for date and time (`type="datetime"`, `type="datetime-local"`, `type="time"`, `type="week"`, `type="month"`), allow date validation or present you with a date picker, depending on the browser support.
<br/>

### The placeholder attribute ###

HTML5 also provides the option to set a **placeholder** for an input field. This text is displayed inside the input field when it's empty and not focused. As soon as we select the input field, the placeholder disappears. Placeholders are only text, and do NOT provide a default value for the element.

```html
<input type="text" name="username" placeholder="Please type your username"/>
```
<br/>

### The autofocus attribute ###

The **autofocus** attribute introduced by HTML5 can be used on all web form controls. It works by moving the input focus to a particular field as soon as the page loads. As this is controlled by the markup, it will be consistent across websites.

```html
<input type="text" name="username" autofocus/>
```
<br/>

### Required fields ###

In HTML5 we can specify that a form field is **required** in order for the form to be submitted, this makes the field mandatory for the user. Most browsers will display an error message instructing the user to fill a field after an unsuccessful submission.

```html
<input type="text" name="username" required/>
```
<br/>

### The pattern attribute ###

We can use regular expressions for form validation with the **pattern** attribute. The input's value is checked against this regular expression for the following input types: `text`, `search`, `url`, `tel`, `email` and `password`.

```html
<input type="text" password="username" pattern="^[a-zA-Z]\w{3,14}$"/>
```
<br/>

### Submitting and resetting forms ###

We can easily submit or reset a form using the `submit` and `reset` input types.

- `<input type="submit">`: when we click on the button rendered by this input, our form `action` is automatically executed.

- `<input type="reset">`: when we click on the button rendered by this input, our form resets and goes back to the default values for each element in the form.

```html
<form action="/login.php" method="POST">
  <input type="text" name="username"/>
  <input type="text" name="password"/>
  <input type="submit" value="Log in"/>
  <input type="reset" value="Reset fields"/>
</form>
```
<br/>

### The button element ###

The `<button>` element provides a clickable button that allows additional functionality. For example, it can contain text and images, as well as execute code when the user interacts with the button.

Also, it can be used to submit or reset a form if we add a `type="submit"` or `type="reset"` attribute to it. It is good practice to define this type, as depending on the browser, the default type for the button will be different.

```html
<button type="submit" id="submit" onclick="alert('Thanks')">Submit</button>
```
