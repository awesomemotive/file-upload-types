=== File Upload Types by WPForms ===
Contributors: wpforms, smub, jaredatch, slaFFik, sanzeeb3
Tags: files, upload, file upload, mime, attachments
Requires at least: 4.9
Tested up to: 5.7
Stable tag: 1.2.1
Requires PHP: 5.6

Easily allow WordPress to accept and upload any file type extension or MIME type, including custom file types.

== Description ==

### WordPress File Upload Types Plugin

Do you want to let your WordPress website accept uploads from your users for more file types and to freely upload files? We created the File Upload Types plugin to make it simple for anyone to easily add support for any file types with any extension or MIME type.

= How WordPress File Uploads Work =

By default, WordPress only allows <a href="https://codex.wordpress.org/Uploading_Files#About_Uploading_Files_on_Dashboard">certain file types</a> to be uploaded to your website's media library.

If someone tries to upload a file type outside of these whitelisted WordPress file extensions, this can be the cause of the <a href="https://www.wpbeginner.com/common-wordpress-errors-and-how-to-fix-them/?utm_source=wprepo&utm_medium=link&utm_campaign=fileuploadtyes&utm_content=readme" rel="friend" title="common WordPress error">common WordPress error</a> `Sorry, this file type is not permitted for security reasons` message.

It can be frustrating if you've <a href="https://wpforms.com/how-to-create-a-file-upload-form-in-wordpress/?utm_source=wprepo&utm_medium=link&utm_campaign=fileuploadtypes&utm_content=readme" rel="friend" title="
created a file upload form">created a file upload form</a> in WordPress but the file type you want to accept is a file extension that's not allowed.

This plugin lets your website upload more file types beyond the limited file extension types that WordPress allows by default.

= How does the File Upload Types plugin work? =

The File Upload Types plugin works by letting you adjust the internal file whitelist, letting you manually control which types of file extensions your WordPress website can upload.

This way, you can accept any file type through your website and/or any contact form plugin like <a href="https://www.wpforms.com/?utm_source=wprepo&utm_medium=link&utm_campaign=fileuploadtypes&utm_content=readme" rel="friend" title="WPForms">WPForms</a>.

= What file types can I upload to WordPress with this plugin? =

The File Upload Types plugin lets you allow uploads of any file extension, including custom file types.

Some common file extension types this plugin lets you add that WordPress doesn't support natively include:

.ai
.zip
.xml
.svg
.csv
.mobi
.cad
.dwg
.dxf

...and any other file extensions that exist, including custom file types.

We hope that you find the File Upload Types plugin helpful!

### Credits

This plugin was created by the team behind <a href="https://wpforms.com/?utm_source=wprepo&utm_medium=link&utm_campaign=fileuploadtyes&utm_content=readme" rel="friend">WPForms</a> – the best drag & drop form builder for WordPress.

### What's Next

If you like this plugin, then consider checking out our other projects:

* <a href="https://wpforms.com/?utm_source=wprepo&utm_medium=link&utm_campaign=fileuploadtyes&utm_content=readme" rel="friend" title="OptinMonster">WPForms</a> - The best WordPress Contact Form Plugin.
* <a href="https://optinmonster.com/?utm_source=wprepo&utm_medium=link&utm_campaign=fileuploadtyes&utm_content=readme" rel="friend" title="OptinMonster">OptinMonster</a> - Get more email subscribers with the most popular conversion optimization plugin for WordPress.
* <a href="https://www.monsterinsights.com/?utm_source=wprepo&utm_medium=link&utm_campaign=fileuploadtyes&utm_content=readme" rel="friend" title="MonsterInsights">MonsterInsights</a> - See the stats that matter and grow your business with confidence. Best Google Analytics plugin for WordPress.
* <a href="https://www.seedprod.com/?utm_source=wprepo&utm_medium=link&utm_campaign=fileuploadtyes&utm_content=readme" rel="friend" title="SeedProd">SeedProd</a> - Jumpstart your website with the #1 Coming Soon & Maintenance Mode plugin for WordPress.
* <a href="https://wpmailsmtp.com/?utm_source=wprepo&utm_medium=link&utm_campaign=fileuploadtyes&utm_content=readme">WP Mail SMTP</a> - Improve email deliverability for your contact form with the most popular SMTP plugin for WordPress.
* <a href="https://rafflepress.com/?utm_source=wprepo&utm_medium=link&utm_campaign=fileuploadtyes&utm_content=readme">RafflePress</a> - The Best WordPress giveaway and contest plugin.

Visit <a href="http://www.wpbeginner.com/?utm_source=wprepo&utm_medium=link&utm_campaign=fileuploadtyes&utm_content=readme" rel="friend" title="WPBeginner">WPBeginner</a> to learn from our <a href="http://www.wpbeginner.com/category/wp-tutorials/?utm_source=wprepo&utm_medium=link&utm_campaign=fileuploadtyes&utm_content=readme" rel="friend" title="WordPress Tutorials">WordPress tutorials</a> and find out about other <a href="http://www.wpbeginner.com/category/plugins/?utm_source=wprepo&utm_medium=link&utm_campaign=fileuploadtyes&utm_content=readme" rel="friend" title="Best WordPress plugins">best WordPress plugins</a>.

== Installation ==

1. Install File Upload Types by WPForms either via the WordPress.org plugin repository or by uploading the files to your server. (See instructions on <a href="http://www.wpbeginner.com/beginners-guide/step-by-step-guide-to-install-a-wordpress-plugin-for-beginners/?utm_source=wprepo&utm_medium=link&utm_campaign=fileuploadtyes&utm_content=readme" rel="friend">how to install a WordPress plugin</a>)
2. Activate File Upload Types by WPForms.
3. Navigate to the Settings area of the File Upload Types plugin in your WordPress admin menu to add file types and MIME types.

== Screenshots ==

1. Settings Page

== Changelog ==

 = 1.2.1 - 2021-02-24 =
 * Fix - Correctly load composer autoload.
 * Enhancement - Add .eps extension to the default list.
 * Enhancement - Add 'application/pdf' mime type to .ai extension.

= 1.2.0 - 2020-09-15 =
* Feature - Multiple MIME types support for a single extension.
* Fix - WordPress 5.5 not clearing values for reptetitive fields.
* Enhancement - Remove already allowed jpg,jpeg extension from the list.
* Enhancement - Improve 'add your custom file types' link'.
* Dev - Deprecate 'file_upload_types_strict_check' filter without any alternative.
* Dev - Increase priority of 'wp_check_filetype_and_ext' filter to 999.

= 1.1.1 - 2020-07-02 =
* Fix - Ignore file types that are already allowed by default.
* Fix - Remove duplicate MIME types of the same extension that could create conflict.

= 1.1.0 - 2020-05-13 =
* Refactor - Autoloading plugin files and use namespace.
* Fix - Error uploading file types with numerical extension.
* Fix - Icon position on small sized devices.
* Enhancement - Custom types field color visisbility.
* Enahcement - Parameters to the strict check filter.

= 1.0.0 - 2020-02-12 =
* Initial Release

== Frequently Asked Questions ==

= What file types can I upload to WordPress by default? =

By default, WordPress only allows <a href="https://codex.wordpress.org/Uploading_Files#About_Uploading_Files_on_Dashboard/" rel="friend" title="certain types of files">cetain types of files</a> to be uploaded to a website for security reasons.

Some common file types and file extensions that WordPress supports uploading by default include:

**Images**
.jpg
.jpeg
.png
.gif
.ico

**Documents**
.pdf (Portable Document Format; Adobe Acrobat)
.doc, .docx (Microsoft Word Document)
.ppt, .pptx, .pps, .ppsx (Microsoft PowerPoint Presentation)
.odt (OpenDocument Text Document)
.xls, .xlsx (Microsoft Excel Document)
.psd (Adobe Photoshop Document)

**Audio**
.mp3
.m4a
.ogg
.wav

**Video**
.mp4, .m4v (MPEG-4)
.mov (QuickTime)
.wmv (Windows Media Video)
.avi
.mpg
.ogv (Ogg)
.3gp (3GPP)
.3g2 (3GPP2)

Having problems uploading permitted file types or with a big file upload? Some <a href="https://www.wpbeginner.com/wordpress-hosting/?utm_source=wprepo&utm_medium=link&utm_campaign=fileuploadtypes&utm_content=readme" rel="friend" title="
WordPress hosting providers">WordPress hosting providers</a> don't allow you to add all file types, even if you add file types to your media file library with the File Upload types plugin. Hosts can also limit the maximum file upload size you can accept.

= I found a bug, now what? =

If you've stumbled upon a bug, the best place to report it is in the <a href="https://github.com/awesomemotive/file-upload-types">File Upload Types GitHub repository</a>. GitHub is where the plugin is actively developed, and posting there will get your issue quickly seen by our developers. Once posted, we'll review your bug report and triage the bug. When creating an issue, the more details you can add to your report, the faster the bug can be solved.

= Help! I need support or have an issue. =

Support is available for File Upload Types via the WordPress.org support forums.

Email support is available to <a href="https://www.wpforms.com/pricing/?utm_source=wprepo&utm_medium=link&utm_campaign=fileuploadtypes&utm_content=readme" rel="friend" title="premium WPForms users">WPForms PRO</a> users.
