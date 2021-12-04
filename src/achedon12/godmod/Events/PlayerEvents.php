<?php

namespace achedon12\godmod\Events;

use achedon12\godmod\Godmod;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;

class PlayerEvents implements Listener{

    public function remove(EntityDamageEvent $event){
        $entity = $event->getEntity();
        if($entity instanceof Player && isset(Godmod::$godmod[$entity->getName()])){
            if(Godmod::$godmod[$entity->getName()]){
                $event->cancel();
            }
        }
    }
}