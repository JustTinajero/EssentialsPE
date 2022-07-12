<?php
    
namespace Tinajero\EssentialsPE\Commands;

use Tinajero\EssentialsPE\Main;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

use pocketmine\player\Player;

use pocketmine\item\VanillaItems;
use pocketmine\world\Position;
use pocketmine\Server;
use pocketmine\player\GameMode;
use pocketmine\utils\Config;

class GMS extends Command{
    
    private Main $main;
    
    public function __construct(Main $main){
        $this->main = $main;
        parent::__construct("gms", "Change your gamemode to survival.", "/gms", []);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) : bool{
        if (!$sender->hasPermission("ess.gms")){
            $sender->sendMessage("[Essentials]> " . "No permission");
        } else {
           	if($sender->getGamemode() === GameMode::SURVIVAL()){
            	$sender->sendMessage("[Essentials]> " . "You are already in survival");
            	return true;
        	} else {
                $sender->setGamemode(GameMode::SURVIVAL());
                $sender->sendMessage("[Essentials]> " . "You are in survival now");
        	}
        }
    }
}