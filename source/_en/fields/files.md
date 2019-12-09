---
title: Management of form fields for files or images.
description: Management of form fields for files or images
extends: _layouts.documentation
section: content
locate: en
folder: fields
---

# Management of form fields for files or images.

The fields supported by **Belich**, are:

- `File`
- `Image`

### File{#file}  

It allows us to manage files, and be stored on our disk.

Let's see an example:

```php
use Daguilarm\Belich\Fields\Types\File;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 */
public function fields(Request $request) {
    return [
        File::make('Excel file', 'excel')
            ->disk('myDisk'),
    ];
}
```

We can use the following methods:

- `disk()`, it will allow us to modify the storage disk, according to our needs.
- `link()`, it will generate a direct download link in the views: `index` and `show`.
- `storeName($tableName)`, store the original name of the file in the database, in the table column that we assign through the variable: `$tableName`.
- `storeSize($tableName)`, store in the database the file size, in the table column that we assign through the variable: `$tableName`.
- `storeMime($tableName)`, store in the database the MIME type of the file, in the column that we assign through the variable: `$tableName`.
- `multiple()`, allows to add multiple files from a single field.

>Important: we must create in our database, the necessary fields to save the values of the previously mentioned methods.

### Image{#image}  

Identical that the file field, but with the particularity that in the views: `index` and `show`, will render the image in `html`, if we want...

```php
use Daguilarm\Belich\Fields\Types\Image;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 */
public function fields(Request $request) {
    return [
        Image::make('My avatar', 'avatar')
            ->disk('myImages'),
    ];
}
```

It has the following own methods (apart from those mentioned above):

- `alt()`: This method will allow us to add the `alt` tag to our image.
- `asHtml()`: It will render the image in the views: `index` y `show`.

As an example:

```php
use Daguilarm\Belich\Fields\Types\Image;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 */
public function fields(Request $request) {
    return [
        Image::make('My avatar', 'avatar')
            ->disk('myImages')
            ->alt('My image alt'),
    ];
}
```

Should show:

```html
<img class="block h-10 rounded-full shadow-md" src="https://belich-dashboard.test/storage/1572122314php9SkNQY.png" alt="My image alt">
```

The appearance of the images (thumbnails) can be modified from the file: `resources/views/vendor/belich/components/thumbnails.blade.php`

The file looks like this:

```html
<img
    src="{{ $url }}"
    class="block h-10 rounded-full shadow-md"
    {{ $alt ? 'alt="{$alt}"' : '' }}
>
```

>**Important**: Do not forget to configure the `file()` method in your `Policy` file, otherwise you will not be able to see the images and manage the files, since you will not have the appropriate permissions.

<div class="blockquote-alert">
    <div class="title">
        <strong>Not recommended methods</strong> (Either they don't work or it makes no sense to use them)
    </div>
    <u>
        <li>addClass()</li>
        <li>addHtml()</li>
        <li>autofocus()</li>
        <li>defaultValue()</li>
        <li>displayUsing()</li>
        <li>prefix()</li>
        <li>resolveUsing</li>
        <li>suffix()</li>
    </u>
</div>
