<?php    

namespace Tinajero\EssentialsPE\Commands;


use Tinajero\EssentialsPE\Main;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

use pocketmine\player\Player;

use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;

class NightVision extends Command{
    
    private Main $main;
    
    
    public function __construct(Main $main){
        
        $this->main = $main;
        
        parent::__construct("nightvision", "Enable or disable night vision." , "/nv", ["nv"]);
        
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args) : bool{
        if (!$sender->hasPermission("ess.nightvision")){
            if(!$sender->getEffects()->has(VanillaEffects::NIGHT_VISION())){
                $sender->sendMessage("[Essentials]> " . "Night Vision On!");
        	    $nv = new EffectInstance(VanillaEffects::NIGHT_VISION(), 20*99999, 1, false);
			    $sender->getEffects()->add($nv);
        	    return true;
            } else {
                $sender->sendMessage("[Essentials]> " . "Night Vision Off!");
                $sender->getEffects()->clear();
                return true;
            }  
        }
    }
}
        