# Changelog
All notable changes to this project will be documented in this file, formatted via [this recommendation](https://keepachangelog.com/).

## [1.5.0] - 2024-10-21
### Fixed
- "Add your custom file types" link did not work before clicking on "Add file types manually" link.
- Implemented sanitizing of SVG & HTML files.
- Added message about allowing risky file types.

## [1.4.0] - 2024-07-17
### Changed
- New functionality to define file extension and MIME type with sample file.
- The minimum required PHP version is now 7.0.
- The minimum required WordPress version is now 5.5.
- Updated styles and icons.

## [1.3.0] - 2023-02-15
- IMPORTANT - Support for WordPress 5.1 has been discontinued. If you are running WordPress 5.1, you MUST upgrade WordPress before installing File Upload Types 1.3.0. Failure to do that will disable File Upload Types core functionality.
- Enhancement - Add `.world` and `.heif` extensions to the default list.
- Enhancement - The list of mime types was extended with `.json`, `.otf`, and `.ttf` file extensions.
- Enhancement - Do not load the plugin textdomain locally, since it is not needed starting from WP 4.6.
- Fix - Microsoft Office MIME type wasn't properly supported.

## [1.2.2] - 2021-06-17
- Fix - PHP notices when invalid files are uploaded.
- Enhancement - Replace jquery.ready with recommended syntax.

## [1.2.1] - 2021-02-24
- Fix - Correctly load composer autoload.
- Enhancement - Add .eps extension to the default list.
- Enhancement - Add 'application/pdf' mime type to .ai extension.

## [1.2.0] - 2020-09-15
- Feature - Multiple MIME types support for a single extension.
- Fix - WordPress 5.5 not clearing values for reptetitive fields.
- Enhancement - Remove already allowed jpg,jpeg extension from the list.
- Enhancement - Improve 'add your custom file types' link'.
- Dev - Deprecate 'file_upload_types_strict_check' filter without any alternative.
- Dev - Increase priority of 'wp_check_filetype_and_ext' filter to 999.

## [1.1.1] - 2020-07-02
- Fix - Ignore file types that are already allowed by default.
- Fix - Remove duplicate MIME types of the same extension that could create conflict.

## [1.1.0] - 2020-05-13
- Refactor - Autoloading plugin files and use namespace.
- Fix - Error uploading file types with numerical extension.
- Fix - Icon position on small sized devices.
- Enhancement - Custom types field color visisbility.
- Enahcement - Parameters to the strict check filter.

## [1.0.0] - 2020-02-12
- Initial release.
