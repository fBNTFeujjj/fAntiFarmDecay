<?php

namespace BNTFeujjj\fAntiFarmDecay;

use pocketmine\event\entity\EntityTrampleFarmlandEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener
{

    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
    }
    public function onBreak(EntityTrampleFarmlandEvent $event) {
        $block = $event->getBlock();
        $config = $this->getConfig();
        
        if (in_array($block->getPosition()->getWorld()->getFolderName(), $config->get("worlds", []))) {
            $event->cancel();    
        }
    }
}