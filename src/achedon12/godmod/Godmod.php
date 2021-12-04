<?php

namespace achedon12\godmod;

use achedon12\godmod\Commands\godmodCMD;
use achedon12\godmod\Events\PlayerEvents;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Godmod extends PluginBase implements Listener{

    public static $godmod = [];

    protected function onEnable() :void{
        $this->getServer()->getCommandMap()->registerAll('Commands',[
            new godmodCMD("godmod","be invincible","/godmod")
        ]);

        $this->getServer()->getPluginManager()->registerEvents(new PlayerEvents(),$this);

        $this->getLogger()->info("plugin enable");
    }

    protected function onDisable() : void{
        $this->getLogger()->info("plugin disable");
    }

}