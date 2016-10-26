<?php
class Wowhead
{
    const TOOLTIP_TYPES = 'a:4:{i:0;s:4:"item";i:1;s:5:"quest";i:2;s:11:"achievement";i:3;s:5:"spell";}';

    /**
     * Have the requirements been added?
     *
     * @var bool
     */
    protected $initialized = false;

    /**
     * Multiton Instance Store
     *
     * @var array
     */
    private static $multiton = array();

    /**
     * Returns default instance store if no parameter provided (if default instance does not exist, will create)

     * @param string $key
     *
     * @return $this
     */
    public static function inst($key = "_MASTER")
    {
        if (isset(static::$multiton[ $key ]) && is_object(static::$multiton[ $key ])) {
            return static::$multiton[ $key ];
        }

        $class = get_called_class();

        return static::$multiton[ $key ] = new $class();
    }

    /**
     * Add the requirements to page
     *
     * @note Although the Requirements class won't double stack a requirement, I don't like the idea of iterating
     *       through this more than once as it gets called every time a short code (etc) is used.
     *
     * @return void
     */
    public function init()
    {
        if ($this->initialized) {
            return;
        }

        $renameLinks = self::config('tooltips', 'renamelinks') ? 'true' : 'false';

        $config = array(
            'colorlinks'   => self::config('tooltips', 'colorlinks') ? 'true' : 'false',
            'iconizelinks' => ($renameLinks == 'false') ? 'false' : (self::config('tooltips', 'iconizelinks') ? 'true' : 'false') ?: 'false',
            'renamelinks'  => self::config('tooltips', 'renamelinks') ? 'true' : 'false'
        );

        Requirements::javascript("//wow.zamimg.com/widgets/power.js");
        Requirements::customScript("var wowhead_tooltips = { \"colorlinks\": {$config['colorlinks']}, \"iconizelinks\": {$config['iconizelinks']}, \"renamelinks\": {$config['renamelinks']} }", uniqid());

        $this->initialized = TRUE;
    }

    /**
     * Gets a config value from a particular section
     *
     * @param string $section
     * @param string $name
     *
     * @return null|bool|string
     */
    public static function config($section, $name)
    {
        $config = Config::inst()->get('Wowhead', $section);

        return (isset($config[ $name ])) ? $config[ $name ] : NULL;
    }

}