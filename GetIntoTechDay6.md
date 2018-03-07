# Get Into Tech: Day 6 #

## Include ##

Include helps us fetch code from other files, in order to share the code between them.
To do this, we use the `include` keyword. This allows us to execute code as if all the shared code was in the same file.

The first place the include keyword looks for is in the same directory (folder).
Then it loads the files so their code can be used in the file where they were included.

If there is a conflict loading the code because a variable is duplicated across files, this results in a `Notice` error. We can turn off PHP errors inside the script with `error_reporting(0)`, to see the output. If errors are disabled, PHP uses the original value of the variable.

The idea of having different files is to group related functions, constants, and variables. Otherwise, files might get too large and over-purposed, making it difficult to understand them.

In the end, the main file that contains the included files is the only file sent to the PHP interpreter. The included files merely live alongside it.

```php
// file A.php
const A = 'I am in file A';
const Name = 'Mary';
```

```php
// file B.php
const B = 'I am in file B';
const Name = 'Jane';
```

```php
// file C.php
include 'fileA.php';
include 'fileB.php';

echo A; // Will echo 'I am in file A'
echo B; // Will echo 'I am in file B'
echo Name; // Will echo 'Mary'
```
<br/>

### Alternatives to include ###

There are different alternatives to include:

- `include`: Only includes the file if it is found. Otherwise it continues the execution as normal. It only issues a warning to let you know the file wasn't found.

- `require`: Requires the file. If not found, stops the script execution with a fatal error.

- `include_once`: Identical to include, with the exception that, if the file has already been included, it won't be included again.

- `require_once`: Identical to require, with the exception that, if the file has already been required, it won't be required again.

The `include_once` and `require_once` statements are useful in big files where someone might include or require a file more than once accidentally.
<br/>
<br/>

### The include path ###

We can use different kinds of paths to include files:

- **Full/Absolute path:** full paths start from the root of the application, the directory where all our files are saved. They start with the drive letter or a `/`.

- **Relative path:** these paths are built from the location of the current file, and navigate from there to reach any others. These start with a `.` if they start in the current directory or `..` if they move out of the current directory.

- **Include-path relative path:** an include path that is relative to an include path.


PHP defines an include path in the `ini` configuration file. This path is a series of folder names separated by a `PATH_SEPARATOR`. The include path specifies a list of directories where the require, include, fopen(), file(), readfile() and file_get_contents() functions look for files.

The `PATH_SEPARATOR` is the OS specific separator. It is a `:` on Linux/Mac and a `;` on Windows.

PHP considers each entry in the include path separately when looking for files to include. It will check the first path, and if it doesn't find it, check the next path, until it either locates the included file or returns with a warning or an error. You may modify or set your include path at runtime using `set_include_path()`.

If the included file isn't found in the include path, PHP will finally check in the calling script's own directory and the current working directory before failing.

The include path is used when the file included is specified in a way such as this: `include 'fileA.php'`

If a path is defined, i.e. the user uses `include './include/fileA.php'`, the include path will be ignored altogether.

```php
$newPath = dirname(__DIR__) . '/' . 'my_lib_dir'; // We save a path in a variable

echo get_include_path(); // .:/usr/local/lib/php

set_include_path(
  get_include_path() . PATH_SEPARATOR . $newPath // We append the new path to the existing one
);

echo get_include_path(); // .:/usr/local/lib/php://my_lib_dir
```

`dirname(__DIR__)` is used to retrieve the full path of the parent's directory.

We can also use `stream_resolve_include_path($filename)` to return a string containing the resolved absolute filename (or FALSE on failure).

The example uses set and get to include path functions, to append an entry to the lookup locations.
<br/>
<br/>

### Include for templates ###

The use of include is very useful to create templates. When we include a file, all functions and variables are immediately available for use. Also, all HTML and non-PHP text is output as usual in the place where the file was included.

This allows us to separate our code in different files, for example, keeping all the HTML in one file and the PHP variables or functions in another.

This principle is called the **separation of concerns**; a design approach to separate a computer program into distinct sections whereby each section is responsible for a specific set of information or functionality.
<br/>
<br/>

## Include inside functions ##

If we include a file inside a function, all the included code will be part of the function's scope. This means that, unless specified, the outer scope will not be available to the included file.

This allows us to reduce conflicts controlling the scope of the included elements inside the function, and reduces any name conflicts that would cause errors.

```php
// fileA.phtml
/*Hello <?php echo $name; ?>*/
```

```php
// fileB.php
$name = 'Natalia';

function displayName ($template) {
  $name = 'Yoko';
  include "$template.phtml";
}

display('fileA'); // Will echo 'Hello Yoko'
```
<br/>

## Namespaces ##

A program might contain variables, constants, functions, classes, interfaces... All of these usually have a name, and it's possible that sometimes we might want to use the same name for two different things.

Suppose you put all your user data functions in user.php and all your product data functions in product.php. Then you include both in your script. Now you have two `create()`s; one for creating users and one for creating products. To avoid this clash you could give your functions more specific and unique names: `create_user()` and `create_product()`. However, this can lead to long and complex names as you may have to include the organisation name and application name too. PHP introduces **namespaces** to solve this problem.

A namespace is a way of *encapsulating* items to avoid name collisions.

A name collision occurs when two or more developers create a re-usable code element (i.e. function or constant) with the same name. The name may even clash with an internal PHP element.

Namespaces enable you to:
- **Disambiguate** between entities of the same name.
- Create a **short-name**, or alias, for a type with a long name, resulting in more readable code.
<br/>

### Creating a namespace ###

Names are **identifiers** for an item (i.e. a function or a constant) and are defined in a scope.

The **scope** is the lexical region where we can access an identifier.

A **namespace** would be our own named scope.


**Defining a namespace:**
```php
// myNamespace.php file
namespace MyNamespace {
  const Name = 'Natalia';
}

// Another way of doing this:
namespace MyNamespace;
```

Everything within the namespace is automatically prefixed with the namespace's name, so if we want to refer to identifiers inside namespaces we need to use a path with backslashes `\`, as shown in the code below.

```php
// index.php file
include 'myNamespace.php';
const Name = 'Yoko';

echo Name; // 'Yoko'
echo \MyNamespace\Name; // 'Natalia'
```


We don't need to use this full path if we are working **inside** the namespace itself.

```php
// myNamespace.php file
namespace MyNamespace {
  const Name = 'Natalia';

  function say($content) {
    echo $content;
  }

  say(Name); // We didn't use the full path
}
```

If there is a single brace-less namespace statement at the top of a PHP file the entire file will be considered within that namespace, i.e. everything will be thus prefixed.

```php
namespace MyNamespace;

const Name = 'Yoko'; // Name is \MyNamespace\Name
```

<br/>

### Nested namespaces ###

Namespaces can be nested within one another. For example, we can create a namespace named 'Outer' that contains an internal namespace named 'Inner':

_!!! Got a fatal error with this !!!_

```php
namespace Outer {
  namespace Inner {
    const Name = 'Natalia';
  }

  echo Inner\Name; // Natalia
}
```

Omitting the first slash means that PHP will automatically look in the present namespace to find the item (i.e. it will add `\Outer` to `Inner\Name`). This is known as a **relative path**.

If we try to echo `\Inner\Name` we get an error, because PHP tries to find a constant defined in the `Inner` namespace. However, the constant is actually defined in the `\Outer\Inner` namespace. The reason why we can call it as `Inner\Name` is because we create a relative path. Adding the initial backslash means we are specifying an **absolute path**.

When we create a namespace with a brace-less statement, the entire file will be considered within that namespace. Then we can use this to create an extended "nested" namespace:

```php
namespace Outer\Inner;

const Name = 'Natalia';
```
<br/>

### Unique namespaces per file ###

It is a common practice that large PHP codebases use one namespace per file. Multiple files can have the same namespace but this is not common.

This helps to prevent conflicts due to different files having the same identifiers. For this reason, usually namespaces are only given to files that actually contain identifiers. If there are no identifiers defined, but only used, then there is no point in creating a namespace for a particular file.

```php
// fileA.php
namespace App\A;
const Name = 'Natalia';
```

```php
// fileB.php
namespace App\B;
const Name = 'Yoko';
```

```php
// fileC.php
include 'fileA.php';
include 'fileB.php';
echo \App\A\Name; // Natalia
echo \App\A\Name; // Yoko
```
<br/>

### Unpacking namespaces ###

When we have many nested namespaces, it can be too long and repetitive to reference the identifiers with their path. To solve this we have the `use` keyword.

The `use` statement, if it is given the name of a namespace, will remove everything but its last part. This eliminates the need to fully-qualify an identifier. Then we can refer to an item by using the last part of the namespace and the identifier name only.

```php
// fileA.php
namespace App\Pages\Constants\A;
const Name = 'Yoko';
```

```php
// fileB.php
include 'fileA.php';
use App\Pages\Constants\A;

echo A\Name; // Yoko
```
<br/>

### Unpacking namespaces for specific items ###

We can also be much more specific with our `use` statement, and use constants or functions with their full path, so they can be simply called by their identifier. Then their namespace component will be entirely discarded.

```php
// fileA.php
namespace App\Pages\Constants\A;
const Name = 'Yoko';
```

```php
// fileB.php
include 'fileA.php';
use const App\Pages\Constants\A\Name;

echo Name; // Yoko
```
<br/>

### Global namespace ###

The default unnamed namespace that files have is known as the **global namespace**. If we don't specify a namespace we are using this global namespace.

The global namespace is the root namespace, and its name is the *leading slash* that prefixes the identifiers. For this reason, to access anything in the global namespace we use a single backslash. However if we are accessing contents of the global namespace inside the global namespace, we don't need to use this backslash.

```php
const Location = 'UK';

echo Location; // UK
echo \Location; // UK
```

If we have a file with multiple namespaces, and we want to have code in the global namespace, we can use a *namespace declaration without a name*, otherwise we will get an error as the code will be seen as being outside a namespace completely. This is not a common practice but can be done.

```php
namespace myNamespace {
    const Name = 'Yoko';
}

namespace {
    echo myNamespace\Name; // Yoko
}
```
<br/>

### Across namespaces ###

**Variables** cannot be namespaced. We can set them in a namespace, but we won't be able to access these outside it.

The term **prefix** is used to describe how PHP uses namespaces. In PHP namespacing is essentially just a prefixing mechanism. Namespaces are merely additions to the names of identifiers, such as constants and functions.
<br/>
<br/>

### Namespaces and directories ###

Namespaces are very similar to **filepaths**. For this reason, it's useful to create namespaces that emulate the filepath were the file is saved:

For example, if we have a file named `user.php` that has a namespace of `Example\Cart\User` with a `create()` function. When we include this file with `include 'user.php';` is not easy to infer that we need to call its `create()` function as `Example\Cart\User\create();`. However, if we save our `user.php` file in a directory named `Example` with a folder named `User` and another folder inside named `User`. This makes it clear to see which namespace you might want to import: `use Example\Cart\User;`
<br/>
<br/>
