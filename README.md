# silverstripe-wowhead

Wowhead Item, Quest, Spell & Achievement Tooltips

## Installation

This module only supports installation via composer:

`composer require zanderwar/silverstripe-wowhead`

Run /dev/build afterwards for SilverStripe to become aware of this extension

## Optional Configuration

**wowhead/_config/wowhead.yml**

```yml
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
    #custom_url: '//example.com/{type}/{id}' # {type} would be replaced by item, achievement, quest, or spell. {id} would be replaced with the ID
```

Remove the hash in front of custom_url to use your own URL with the insight provided by its comment

## Short Codes

### _**WHTooltip**_

**Arguments:**
- `id`: The Wowhead ID for the `type` you want a tooltip to display for.
- `type`: Can be one of `item`, `achievement`, `spell` or `quest` (Default: `item`)

**Optional Label:** Yes

**Examples:**

`[WHTooltip, id=277, type=achievement]'Tis the Season[/WHTooltip]`

`[WHTooltip, id=25696]Felstalker Breastplate[/WHTooltip]`

`[WHTooltip, id=49286]`

![Imgur](http://i.imgur.com/1WPChSl.png)

## Contributing

If you feel you can improve this module in any way, shape or form please do not hesitate to submit a PR for review.

## Bugs / Issues

To report a bug or an issue please use our [issue tracker](https://github.com/zanderwar/silverstripe-wowhead/issues).

## License

This module is distributed under the [MIT License](https://github.com/zanderwar/silverstripe-wowhead/blob/master/LICENSE.md).
