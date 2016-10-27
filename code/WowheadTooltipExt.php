<?php

class WowheadTooltipExt
{

    public static function WHTooltipShortCode($arguments, $content = NULL, $parser = NULL, $tagName = NULL)
    {
        Wowhead::inst()->init();

        if (!array_key_exists('id', $arguments)) {
            return '[WHTT_ITEMID_MISSING]';
        }

        $id = Convert::raw2xml(trim($arguments[ 'id' ]));

        if (!is_numeric($id)) {
            return '[WHTT_ITEMID_NOT_A_NUMBER]';
        }

        if (array_key_exists('type', $arguments) && !in_array($arguments['type'], unserialize(Wowhead::TOOLTIP_TYPES))) {
            return '[WHTT_TYPE_NOT_VALID]';
        }

        $type = (isset($arguments['type'])) ? $arguments['type'] : 'item';
        $locale = (Wowhead::config('tooltips', 'locale')) ? Wowhead::config('tooltips', 'locale') : NULL;

        $url = (Wowhead::config('tooltips', 'custom_url')) ? str_replace(array("{type}", "{id}", "{locale}"), array($type, $id, $locale), Wowhead::config('tooltips', 'custom_url')) : "//" . ((!$locale) ? "www" : $locale) . ".wowhead.com/{$type}={$id}";
        $rel = '';
        if (!strstr($url, 'wowhead')) {
            $rel = "rel='{$type}={$id}'";
        }
        return "<a href='$url'$rel>{$content}</a>";

    }
}