# silverstripe-wowhead

Wowhead Item, Quest, Spell & Achievement Tooltips

## Installation

This module only supports installation via composer:

`composer require steadlane/silverstripe-cloudflare`

Run /dev/build afterwards for SilverStripe to become aware of this extension

## Optional Configuration

**wowhead/_config/wowhead.yml**

    ---
    Name: wowhead
    After:
      - 'framework/*'
      - 'cms/*'
    ---

    Wowhead:
      tooltips:
        colorlinks: true # colors your label
        iconizelinks: true # adds an icon to your label (this will be forced to false if renamelinks is false)
        renamelinks: true # overrides your label

## Contributing

If you feel you can improve this module in any way, shape or form please do not hesitate to submit a PR for review.

## Bugs / Issues

To report a bug or an issue please use our [issue tracker](https://github.com/zanderwar/silverstripe-wowhead/issues).

## License

This module is distributed under the [MIT License](https://github.com/zanderwar/silverstripe-wowhead/blob/master/LICENSE.md).