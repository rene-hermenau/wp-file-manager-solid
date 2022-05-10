# Update elFinder

## Steps

- Download latest version of elFinder from https://github.com/Studio-42/elFinder/ and upload content to src/vendor/elFinder
- Edit src/vendor/elfinder/php/autoload.php and rename ELFINDER_PHP_ROOT_PATH to WPFMSOLID_PHP_ROOT_PATH
- Rename elFinderAutoloader() to wpfmsolidElFinderAutoloader()