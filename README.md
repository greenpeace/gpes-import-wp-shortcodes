# Wordpress shortcodes to import frontend code

Shortcodes to:

* Import a text file that was uploaded to the media library.
* Import an external URL (Use for development only! Please!)

With the plugin **Import Text File** you can develop svg, html, css and javascript externally and insert it in your pages using a shortcode. This plugin also lifts restrictions on uploading svg, html, css and javascript files to the media library.

## How to use

Normally used with **html** files or URLs, but it can also be used to import **javascript**, **css**, **svg** or **txt**.

**Examples:**

```
[import_text_file file='/wp-content/uploads/2018/09/mapa-pagos-por-capacidad.html']

[import_text_url url='https://apps.greenpeace.es/data-vis/import/chart.html']
```

Please note that the shortcode **import_text_url** must never be used in production as it can overload the servers in high traffic pages!

Also please note that in some environments you might need to upload **.txt** files instead of **.html** Specially if you get security alerts when you upload an html file.

## How to install the shortcodes

1. Upload the folders **import-text-file** and **import-text-url** to **wp-content/plugins** 
2. Activate both plugins: **Import Text File** and **Import Text URL**

## Graphic User Interface

The shortcodes **import_text_url** and **import_text_file** have a GUI using Shortcake (Shortcode UI). To install the GUI:

1. Install and activate the plugin [Shortcake (Shortcode UI)](https://wordpress.org/plugins/shortcode-ui/)
2. Upload the folders  **import-text-file-ui** and **import-text-url-ui** to **wp-content/plugins**
3. Activate both **Import text file UI** and **Import text URL UI** in the plugins admin page.
