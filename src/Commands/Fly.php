<?php    

namespace Tinajero\EssentialsPE\Commands;


use Tinajero\EssentialsPE\Main;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

use pocketmine\player\Player;

class Fly extends Command{
    
    private Main $main;
    
    
    public function __construct(Main $main){
        
        $this->main = $main;
        
        parent::__construct("fly", "Enable or disable fly mode." , "/fly", []);
        
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args) : bool{
        if (!$sender->hasPermission("ess.fly")){
            $sender->sendMessage("[Essentials]> " . "No permission");
        } else {
            if($sender->isFlying(false)){
                $sender->setFlying(true);
            } else {
                $sender->setFlying(false);
            }
        }
    }
}
        