# Get Into Tech #

## Day 3 ##

### DOD 4 Layer Model ###

DOD: Department of Defense Four-Layer Model. It was developed in the 1970s for the DARPA, and eventually became the internet.

No.  | Layer              | Example
---- | ------------------ | ------------------
4    | Application        | FTP, HTTP, SMTP
3    | Transport          | TCP/UDP
2    | Internet           | ICMP (Internet Control Messaging Protocol) and IP (Internet Protocol)
1    | Network Interface  | Physical network


### PHP Variables ###

In PHP they are declared with a `$` symbol. These pieces of data are stored in the computer's memory, concretely in the RAM (Random Access Memory).

The RAM has a special area called the **Register**, where the data for the variables is kept.

The **Heap** is a section of the memory where the data for global variables is kept in an unmanaged way.

The **Stack** instead is where the data is kept in an ordered way, if too much data is kept in the stack we "pop" our stack.


### HTML ###

- HTML v.4, most of the web is still in this version.
- After that we had XHML v.1, it allowed us to use in mobiles (like Nokia) but it was very slow.
- Then we had HTML v.5

To check compatibility in browsers we can use this website:
```
https://caniuse.com
```

**Offline/Online** property is used to post offline, storing the information, then when you're online the tag changes and it's actually posted.

```html
<!DOCTYPE html>
```
This tag comes from SGML and tells us what kind of file it is.

`<meta>` tags change the behaviour of the page.

`<title>` appears in the tab, the bookmarks and Google.

Tags can be modified or enhanced by adding attributes.
```html
<html lang="en">
```
In HTML5, `<br>` tags should be self-closing: `<br/>`

The `src` attribute gives us the source for images, the filepath.

It's advised to use relative references instead of absolute ones, for two reasons:
- If the hyperlink changes we would need to change it all over the codebase.
- We avoid doing calls to the server to retrieve the information as it's in our local web files.

Putting a dot at the end of the URL, the idea was that the dot would tell the request to look for the domain right before the dot, and advance until we reached //

```
https://www.sky.com.
```
This would check com first, then sky, and at last www. It won't check our local hosts address book in case we already have an IP assigned to it, so it's a good way to bypass hosts that block pages.

The `alt` attribute tells you the alternate text for the image, used by screen readers.

The `href` attribute is the hyperlink reference.

- PNG: Portable Network Graphics
- JPEG: Joint Photographic Experts Group
- MPEG/MP4: Motion Pictures Experts Group - Layer 4 encoding (Layer 3 has the sound, Layer 4 has the visuals)
- MP3: Motion Pictures Experts Group - Layer 3 encoding (Layer 3 has the sound)

When we want to serve in another port we need to specify this after localhost, otherwise it will assume it's port 80.
```
http://localhost:8080
```

`<th>` tags bolden and centre the contents of the cells. Can be used in any part of the table.

`rowspan` is an attribute that makes cells span many rows.

`colspan` is an attribute that makes cells span many columns.


#### Comments in HTML ####

You can have regular and conditional comments. **Regular comments** are SGML tags and look like this:

```html
<!-- This is a comment -->
```

**Conditional comments** are also SGML tags, but IE (up to v9) reads and uses the HTML in them HTML. Other browsers will simply ignore these as regular comments.

```html
<!--[if IE]>
  <link href="IE.css" rel="stylesheet">
<![endif]-->
```

#### Block vs inline elements ####

This is a block line divisor:
```html
<div>Hey</div>
```

This is an inline element:

```html
Hey <span>you</span>!
```


#### Colours and sizes ####

**Colours:** We can test our websites with colour blindness filters.

**Pixels:** These are relative to the definition of the screen.

**Points:** We use points for things like printing, as it's a set value (1/72 of an inch).

**Picas:** Size measure for typographic units (1/6 of an inch).


#### Structural elements ####

A website is structured with articles (the content), the navigation, header and footer.

```html
<header>
  <h1>My website</h1>
</header>
<nav>
  <ul>
    <li>Home</li>
    <li>About Me</li>
  </ul>
</nav>
<article>
  <p>Welcome to my website!</p>
</article>
<footer>
  <p>Copyright Natalia 2018</p>
</footer>
```

The search engines only care about the actual content, the articles. The other structural elements are ignored in terms of content, are only used to organise the content in parts.


#### Lists ####

We can have 3 types of lists:
- Unordered lists (have disks)
- Ordered lists (have numbers or letters)
- Definition lists (used for terms and definitions)


**Definition lists:**

- `<dl>` Description list (defines the list)
- `<dt>` Definition term (what we will define)
- `<dd>` Definition data (the definition)


#### Fonts ####

**Serif:** with small lines attached to the end of a stroke in a letter or symbol, due to the way printers worked before.

**Sans-serif:** modern, casual, doesn't have lines at the end of the strokes.


#### ASCII vs Unicode ####

ASCII only has American characters, was invented for teletype.

Unicode expands this to allow more characters (i.e. Cyrillic, braille, emoticons)

In HTML we add these as entities, with the &; notation. It can be `&name;` or `&#number;`:

```html
&commat;
```


#### Domains ####

Sites to get your own domain name:
```
https://uk.godaddy.com
http://www.3ix.org
```


#### Bookmarks ####

**Hyperlink bookmarks** work in pairs. One is the *Go-To* Target hyperlink and the other is the *Destination* Bookmark.

```html
<!-- The destination element, can be any element -->
<h1 id="top">Top</h1>
<!-- Some code -->
<!-- The bookmark element, hops to the destination -->
<a href="#top">
  Clicking here will hop to the element with an id of "hop"
</a>
```
 Research: jumping pages - need to include the path in the href.
 Research: burger menu

Questions:
What is the difference between a compiled and an interpreted language-
What would you use an entity for and what characters do you need to use?: &;
What kinds of lists are there and what tags they use?: ordered, unordered and definition
What kind of tag is a comment in HTML?: a SGML tag
What is the different between SGML and GML?: SGML is an ISO standard
If you wanted to display a pound sign in HTML, would you do it in ASCII or in Unicode and why?: Unicode-
What is a pica?: a fixed size measure for typographic units.
