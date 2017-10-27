<?php
/**
 * Created by PhpStorm.
 * User: Spiderman
 * Machine: iMac Pro
 * Date: 2017/10/11
 * Time: 12:48
 */

namespace Controller\Listeners;


use Controller\Main;
use pocketmine\block\Block;
use pocketmine\block\Lava;
use pocketmine\block\Water;
use pocketmine\entity\Creature;
use pocketmine\event\block\ItemFrameDropItemEvent;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\entity\PrimedTNT;
use pocketmine\math\Vector3;
use pocketmine\level\Position;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\player\PlayerHungerChangeEvent;
use pocketmine\event\entity\ExplosionPrimeEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\block\BlockUpdateEvent;
use pocketmine\event\block\BlockPlaceEvent;

class Listeners implements Listener {

    private $plugin;

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }

    public function onBlockUpdate(BlockUpdateEvent $event)//*
    {
        if($this->plugin->PZ->get("禁止水流动"))
        {
            if($event->getBlock() instanceof Water)
            {
                $event->setCancelled(true);
            }
        }
        if($this->plugin->PZ->get("禁止岩浆流动"))
        {
            if($event->getBlock() instanceof Lava)
            {
                $event->setCancelled(true);
            }
        }
    }
    public function onExplosion(ExplosionPrimeEvent $event)//*
    {
        if($this->plugin->PZ->get("禁止TNT爆炸"))
        {
            if($event->getEntity() instanceof PrimedTNT)
            {
                $event->setCancelled(true);
            }
        }
        else
        {
            if(in_array($event->getEntity()->getLevel()->getFolderName(),$this->plugin->PZ->get("禁止TNT爆炸worlds")))
            {
                if($event->getEntity() instanceof PrimedTNT)
                {
                    $event->setCancelled(true);
                }
            }
        }
    }
    public function onDamageEntity(EntityDamageEvent $event)//*
    {
        $entity = $event->getEntity();
        $v = new Vector3($entity->getLevel()->getSpawnLocation()->getX(),$entity->getPosition()->getY(),$entity->getLevel()->getSpawnLocation()->getZ());
        $r = $this->plugin->getServer()->getSpawnRadius();
        /*if($event instanceof EntityDamageByEntityEvent)
        {
            if($entity instanceof Creature && $damager instanceof Player)
            {
                $entity->kill();
            }
        }*/
        if($this->plugin->PZ->get("禁止创造PVP"))
        {
            if($event instanceof EntityDamageByEntityEvent)
            {
                $entity = $event->getEntity();
                $damager = $event->getDamager();
                if($entity instanceof Player && $damager instanceof Player)
                {
                    if($damager->isCreative()==true)
                    {
                        $event->setCancelled(true);
                        $damager->sendMessage($this->plugin->Message->get("禁止创造PVP"));
                    }
                }
            }
        }
        else
        {
            if(in_array($event->getEntity()->getLevel()->getFolderName(),$this->plugin->PZ->get("禁止创造PVPworlds")))
            {
                if($event instanceof EntityDamageByEntityEvent)
                {
                    $entity = $event->getEntity();
                    $damager = $event->getDamager();
                    if($entity instanceof Player && $damager instanceof Player)
                    {
                        if($damager->isCreative()==true)
                        {
                            $event->setCancelled(true);
                            $damager->sendMessage($this->plugin->Message->get("禁止创造PVP"));
                        }
                    }
                }
            }
        }
        if($this->plugin->PZ->get("禁止出生点PVP"))
        {
            $entity = $event->getEntity();
            if(($entity instanceof Player) && ($entity->getPosition()->distance($v) <= $r) )
            {
                $damager = $event->getDamager();
                $event->setCancelled(true);
                $damager->sendMessage($this->plugin->Message->get("禁止出生点PVP"));
            }
        }
        else
        {
            if(in_array($event->getEntity()->getLevel()->getFolderName(),$this->plugin->PZ->get("禁止出生点PVPworlds")))
            {
                $entity = $event->getEntity();
                if(($entity instanceof Player) && ($entity->getPosition()->distance($v) <= $r) )
                {
                    $damager = $event->getDamager();
                    $event->setCancelled(true);
                    $damager->sendMessage($this->plugin->Message->get("禁止出生点PVP"));
                }
            }
        }
    }
    public function OnChest(BlockPlaceEvent $event)
    {
        $id = $event->getBlock()->getID();
        $player = $event->getPlayer();
        if($this->plugin->PZ->get("禁止使用大箱子"))
        {
            if($id == "54")
            {
                $d1 = $event->getBlock()->getLevel()->getBlock(new Position($event->getBlock()->getX() + 1,$event->getBlock()->getY(),$event->getBlock()->getZ()))->getID(54);//上下左右
                $d2 = $event->getBlock()->getLevel()->getBlock(new Position($event->getBlock()->getX() - 1,$event->getBlock()->getY(),$event->getBlock()->getZ()))->getID(54);
                $d3 = $event->getBlock()->getLevel()->getBlock(new Position($event->getBlock()->getX(),$event->getBlock()->getY(),$event->getBlock()->getZ() + 1))->getID(54);
                $d4 = $event->getBlock()->getLevel()->getBlock(new Position($event->getBlock()->getX(),$event->getBlock()->getY(),$event->getBlock()->getZ() - 1))->getID(54);
                if($d1 or $d2 or $d3 or $d4)
                {
                    $event->setCancelled(true);
                    $player->sendMessage($this->plugin->Message->get("禁止使用大箱子"));
                }
            }
            unset($id,$d1,$d2,$d3,$d4);
        }
        else
        {
            if(in_array($player->getLevel()->getFolderName(),$this->plugin->PZ->get("禁止使用大箱子worlds")))
            {
                if($id == "54")
                {
                    $d1 = $event->getBlock()->getLevel()->getBlock(new Position($event->getBlock()->getX() + 1,$event->getBlock()->getY(),$event->getBlock()->getZ()))->getID(54);//上下左右
                    $d2 = $event->getBlock()->getLevel()->getBlock(new Position($event->getBlock()->getX() - 1,$event->getBlock()->getY(),$event->getBlock()->getZ()))->getID(54);
                    $d3 = $event->getBlock()->getLevel()->getBlock(new Position($event->getBlock()->getX(),$event->getBlock()->getY(),$event->getBlock()->getZ() + 1))->getID(54);
                    $d4 = $event->getBlock()->getLevel()->getBlock(new Position($event->getBlock()->getX(),$event->getBlock()->getY(),$event->getBlock()->getZ() - 1))->getID(54);
                    if($d1 or $d2 or $d3 or $d4)
                    {
                        $event->setCancelled(true);
                        $player->sendMessage($this->plugin->Message->get("禁止使用大箱子"));
                    }
                }
                unset($id,$d1,$d2,$d3,$d4);
            }
        }
    }//*
    public function onItemDrop(PlayerDropItemEvent $event)
    {
        $player = $event->getPlayer();
        if($this->plugin->PZ->get("禁止创造丢物品"))
        {
            if($player->getGamemode(1))
            {
                $event->setCancelled(true);
                $player->sendMessage($this->plugin->Message->get("禁止创造丢物品"));
            }
        }
        else
        {
            if(in_array($player->getLevel()->getFolderName(),$this->plugin->PZ->get("禁止创造丢物品worlds")))
            {
                if($player->getGamemode(1))
                {
                    $event->setCancelled(true);
                    $player->sendMessage($this->plugin->Message->get("禁止创造丢物品"));
                }
            }
        }
    }//*
    public function onPlayerDropItem(PlayerDeathEvent $event)
    {
        $player = $event->getPlayer();
        if($this->plugin->PZ->get("死亡不掉落"))
        {
            $event->setKeepInventory(true);
            $player->sendMessage($this->plugin->Message->get("死亡不掉落"));
        }
        else
        {
            if(in_array($player->getLevel()->getFolderName(),$this->plugin->PZ->get("死亡不掉落worlds")))
            {
                if($player->getGamemode(1))
                {
                    $event->setKeepInventory(true);
                    $player->sendMessage($this->plugin->Message->get("死亡不掉落"));
                }
            }
        }
    }//*
    public function onPlayerJoin(PlayerJoinEvent $event)
    {
        $player = $event->getPlayer();
        if($this->plugin->PZ->get("进入返回主城"))
        {
            if ($player->getY() <= -1)
            {
                $player->teleport($this->plugin->getServer()->getDefaultLevel()->getSpawnLocation());
                $player->sendMessage($this->plugin->Message->get("进入返回主城"));
            }
        }
    }//*
    public function onHunger(PlayerHungerChangeEvent $event)
    {
        if($this->plugin->PZ->get("禁用饥饿度"))
        {
            $event->setCancelled(true);
        }
        else
        {
            if(in_array($event->getPlayer()->getLevel()->getFolderName(),$this->plugin->PZ->get("禁用饥饿度worlds")))
            {
                $event->setCancelled(true);
            }
        }
    }//*
    public function OnPlayerInteract(PlayerInteractEvent $event)
    {
        $player = $event->getPlayer();
        $block = $event->getBlock();
        $gamemode = $player->getGamemode();
        $item = $player->getInventory()->getItemInHand()->getId();
        $level = $player->getLevel()->getFolderName();
        $DisableCreateUseBox = $this->plugin->PZ->get("禁止创造使用箱子worlds");
        $DisableUseItemFrame = $this->plugin->PZ->get("禁止使用物品展示框worlds");
        if($block->getId() === Block::CHEST OR $block->getId() === Block::TRAPPED_CHEST OR $block->getId() === Block::ENDER_CHEST)
        {
            if($this->plugin->PZ->get("禁止创造使用箱子"))
            {
                if($player instanceof Creature)
                {
                    $event->setCancelled(true);
                    $player->sendMessage($this->plugin->Message->get("禁止创造使用箱子"));
                }
            }
            else
            {
                if(in_array($level,$DisableCreateUseBox))
                {
                    if($player instanceof Creature)
                    {
                        $event->setCancelled(true);
                        $player->sendMessage($this->plugin->Message->get("禁止创造使用箱子"));
                    }
                }
            }
        }
        if($block->getId() === Block::ITEM_FRAME_BLOCK)
        {
            if($item == "0")
            {
                return true;
            }
            if($this->plugin->PZ->get("禁止使用物品展示框"))
            {
                $event->setCancelled(true);
                $player->sendMessage($this->plugin->Message->get("禁止使用物品展示框"));
            }
            else
            {
                if(in_array($level,$DisableUseItemFrame))
                {
                    $event->setCancelled(true);
                    $player->sendMessage($this->plugin->Message->get("禁止使用物品展示框"));
                }
            }
        }
    }//*
    public function onDrop(ItemFrameDropItemEvent $event)
    {
        $player = $event->getPlayer();
        $item = $player->getInventory()->getItemInHand()->getId();
        $level = $player->getLevel()->getFolderName();
        $DisableUseItemFrame = $this->plugin->PZ->get("worlds");
        if($this->plugin->PZ->get("禁止使用物品展示框"))
        {
            if($item == "0")
            {
                return true;
            }
            $event->setCancelled(true);
            $player->sendMessage($this->plugin->Message->get("禁止使用物品展示框"));
        }
        else
        {
            if(in_array($level,$DisableUseItemFrame))
            {
                $event->setCancelled(true);
                $player->sendMessage($this->plugin->Message->get("禁止使用物品展示框"));
            }
        }
    }
}