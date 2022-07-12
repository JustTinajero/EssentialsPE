<?php
# T
# I
# N
# A
# J
# E
# R
# O
namespace Tinajero\EssentialsPE;

use pocketmine\plugin\PluginBase;

# Commands
use Tinajero\EssentialsPE\Commands\GMC;
use Tinajero\EssentialsPE\Commands\GMS;
use Tinajero\EssentialsPE\Commands\Feed;
use Tinajero\EssentialsPE\Commands\Heal;
use Tinajero\EssentialsPE\Commands\Fly;
use Tinajero\EssentialsPE\Commands\NightVision;

class Main extends PluginBase{
    
    public function onEnable():void{
        $this->getLogger()->info("Commands loaded!");
        $this->registerCommands();
    }

    public function registerCommands():void{
        $this->getServer()->getCommandMap()->register("gmc", new GMC($this));
        $this->getServer()->getCommandMap()->register("gms", new GMS($this));
        $this->getServer()->getCommandMap()->register("feed", new Feed($this));
        $this->getServer()->getCommandMap()->register("heal", new Heal($this));
        $this->getServer()->getCommandMap()->register("fly", new Fly($this));
        $this->getServer()->getCommandMap()->register("nightvision", new NightVision($this));
    }
}
