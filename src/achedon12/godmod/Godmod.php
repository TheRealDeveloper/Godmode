<?php

namespace achedon12\godmod;

use achedon12\godmod\Commands\godmodCMD;
use achedon12\godmod\Events\PlayerEvents;
use pocketmine\event\Listener;
use pocketmine\permission\Permission;
use pocketmine\permission\PermissionManager;
use pocketmine\plugin\PluginBase;

class Godmod extends PluginBase implements Listener{

    public static $godmod = [];

    private static Godmod $instance;

    protected function onEnable() :void{
        $this->getServer()->getCommandMap()->registerAll('Commands',[
            new godmodCMD("godmod","be invincible","/godmod")
        ]);

        $this->getServer()->getPluginManager()->registerEvents(new PlayerEvents(),$this);

        $this->getLogger()->info("plugin enable");

        self::$instance = $this;

        PermissionManager::getInstance()->addPermission(new Permission("use.godmod","godmode permission"));
    }

    protected function onDisable() : void{
        $this->getLogger()->info("plugin disable");
    }

    public static function getInstance(): self
    {
        return self::$instance;
    }

}