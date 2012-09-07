Mediawiki-Firebase
==================

Allows wiki pages to display live data from Firebase references.

## Usage

There are two new tags for retrieving data from a Firebase reference: `<firebase>` and `<firebaseraw>`. Here's how they work.

All instances of `<firebase url="gamma.firebase.com/myfirebase/mydata" />` will be replaced by a `<span></span>` element that fills itself with live data from the provided Firebase URL. Use this tag if you want to display a live entry from Firebase.

All instances of `<firebaseraw url="gamma.firebase.com/myfirebase/mydata" />` will be replaced **only once, before most other widgets, templates, or extensions are loaded.** This means you can insert the tag into something like a Google Street View Widget:

    {{#widget:Google Street View
    |lat=<firebaseraw url="http://gamma.firebase.com/myfirebase/lat" />
    |lng=<firebaseraw url="http://gamma.firebase.com/myfirebase/lng" />
    |yaw=370.64659986187695
    |pitch=-20
    |zoom=0
    }}

Pretty cool, right?

See www.firebase.com for more information on how to set up a Firebase reference.

## Installation

Install by copying the repository contents to some place in the extensions directory, like extensions/Firebase/. Then add the following (or equivalent) to LocalSettings.php:

```require_once( "$IP/extensions/Firebase/Firebase.php" );```

In this case I've renamed the repository from "Mediawiki-Firebase" to "Firebase".

## Notes

See http://www.mediawiki.org/w/index.php?title=Extension:Firebase for more info.

This extension is not affiliated with the developers of Firebase.
