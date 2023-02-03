# Changelog
All notable changes to this project will be documented in this file, formatted via [this recommendation](https://keepachangelog.com/).

## [UNRELEASED] - 2022-XX-XX
### IMPORTANT
- Support for WordPress 5.1 has been discontinued. If you are running WordPress 5.1, you MUST upgrade WordPress before installing File Upload Types 1.3.0. Failure to do that will disable File Upload Types core functionality.

### Added
- 

### Changed
- Do not load plugin textdomain locally, since it is not needed from WP 4.6.

### Fixed
- Microsoft Office MIME type didn't support properly.

## [1.2.2] - 2021-06-17
* Fix - PHP notices when invalid files are uploaded.
* Enhancement - Replace jquery.ready with recommended syntax.

## [1.2.1] - 2021-02-24
* Fix - Correctly load composer autoload.
* Enhancement - Add .eps extension to the default list.
* Enhancement - Add 'application/pdf' mime type to .ai extension.

## [1.2.0] - 2020-09-15
* Feature - Multiple MIME types support for a single extension.
* Fix - WordPress 5.5 not clearing values for reptetitive fields.
* Enhancement - Remove already allowed jpg,jpeg extension from the list.
* Enhancement - Improve 'add your custom file types' link'.
* Dev - Deprecate 'file_upload_types_strict_check' filter without any alternative.
* Dev - Increase priority of 'wp_check_filetype_and_ext' filter to 999.

## [1.1.1] - 2020-07-02
* Fix - Ignore file types that are already allowed by default.
* Fix - Remove duplicate MIME types of the same extension that could create conflict.

## [1.1.0] - 2020-05-13
* Refactor - Autoloading plugin files and use namespace.
* Fix - Error uploading file types with numerical extension.
* Fix - Icon position on small sized devices.
* Enhancement - Custom types field color visisbility.
* Enahcement - Parameters to the strict check filter.

## [1.0.0] - 2020-02-12
- Initial release.
