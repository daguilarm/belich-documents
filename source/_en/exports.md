---
title: Export / Download files
description: Managing the export or download of files with Belich
extends: _layouts.documentation
section: content
locate: en
---

# Export / Download files

**Belich** allows you to download the current *Resource* (from your *Model*) in the following formats: `csv`, `xls` and `xlsx`. The download is done from the *View* `index` of each *Resource*.

Among the download options we have, we can find:

- The **format**.
- If we want to download **all**, or only **the selected fields**.

### Driver configuration

**Belich**, allows you to use various drivers. By Default it uses [FastExcel](https://github.com/rap2hpoutre/fast-excel).

To configure the driver, you must do it from the configuration file, located at:

```php
.\config\belich.php
```

In it you will find the following code:

```php
/*
|--------------------------------------------------------------------------
| Export file (xls, xlsx, csv) from supported drivers
|--------------------------------------------------------------------------
|
| Belich has support for:
|
| @Driver: Fast Excel
| @Github: https://github.com/rap2hpoutre/fast-excel
| @value: 'fast-excel'
|
*/
'export' => [
    'driver' => 'fast-excel',
],
```

If nothing is indicated, all the columns in the table will be downloaded using a `Illuminate\Database\Eloquent\Collection`. If what we want is to determine which columns we want to download, we can indicate it from the *Model*, adding the method `download()`:

```php
namespace App;

use Illuminate\Database\Eloquent\Model;

class MyModel extends Model
{
    /**
     * The table columns that will be exported to the file.
     *
     * @var array
     */
    public function download(): array
    {
        return [
            'id',
            'test_name',
        ];
    }

}
```

Currently, the supported drivers are:

- `fast-excel`.
- `maatwebsite` (In development, there is currently an error with the package ...).

And finally, in the *Resource* that you want to be downloadable, you will have to add the following code:

```php
/** 
 * @var bool
 */
public static $downloable = true;
```
