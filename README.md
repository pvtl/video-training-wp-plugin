# Wordpress Training by Pivotal Agency

Adds access to tailor made Wordpress training for this website.

## Installation

```bash
# 1. Get it ready (to use a repo outside of packagist)
composer config repositories.wordpress-training git https://github.com/pvtl/video-training-wp-plugin.git

# 2. Install the Plugin - we want all updates from this major version (while non-breaking)
composer require "pvtl/wordpress-training:~1.0"
```

## Versioning

_Do not manually create tags_.

Versioning comprises of 2 things:

- Wordpress plugin version
    - The version number used by Wordpress on the plugins screen (and various other peices of functionality to track the version number)
    - Controlled in `./training.php` by `* Version: x.x.x` (line 11)
- Composer dependency version
    - The version Composer uses to know which version of the plugin to install
    - Controlled by Git tags

Versioning for this plugin is automated using a Github Action (`./.github/workflows/version-update.yml`).
To release a new version, simply change the `* Version: x.x.x` (line 11) in `./training.php` - the Github Action will take care of the rest.
