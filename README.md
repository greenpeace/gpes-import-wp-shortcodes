# Shortcodes to import frontend code

Shortcodes to:

* Import a text file that was uploaded to the media library.
* Import an external URL (Use for development only! Please!)

## How to use

Normally used with **html** files or URLs, but it can also be used to import **javascript**, **css** or **svg**.

**Examples:**

```
[import_text_file file='/wp-content/uploads/2018/09/mapa-pagos-por-capacidad.html']

[import_text_url url='https://apps.greenpeace.es/data-vis/import/chart.html']
```

## How to install

Upload the folders **import-text-file** and **import-text-url** to **wp-content/plugins** and activate both plugins.

## Graphic User Interface

The shortcode **import_text_url** already has a graphic user interface using Shortcake (Shortcode UI). To install the GUI upload the folder **import-text-url-ui** to **wp-content/plugins**.

Soon we'll have the a similar GUI to the shortcode **import-text-file**.
