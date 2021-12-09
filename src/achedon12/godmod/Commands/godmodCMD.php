<?php

namespace achedon12\godmod\Commands;

use achedon12\godmod\Godmod;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginOwned;

class godmodCMD extends Command implements PluginOwned {

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player){
            if($sender->hasPermission("use.godmod")){
                if(!isset(Godmod::$godmod[$sender->getName()])){
                    Godmod::$godmod[$sender->getName()] = $sender->getName();
                    $sender->sendMessage("§cGodMod enable");
                }else{
                    unset(Godmod::$godmod[$sender->getName()]);
                    $sender->sendMessage("§cGodMod disable");
                }
            }else{
                $sender->sendMessage("You don't have this permission to use this command");
            }
        }else{
            $sender->sendMessage("Please run this command in game");
        }


    }

    public function getOwningPlugin() : Plugin{
        return Godmod::getInstance();
    }


}