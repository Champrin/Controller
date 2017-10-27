<?php
/**
 * Created by PhpStorm.
 * User: Spiderman
 * Machine: iMac Pro
 * Date: 2017/10/11
 * Time: 12:31
 */

namespace Controller\Commands;

use Controller\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat as C;

class Commands implements CommandExecutor{

	public function __construct(Main $plugin){
		$this->plugin = $plugin;
	}

    public function onCommand(CommandSender $s, Command $command, $label, array $args)
    {
        switch($command->getName())
        {
            case "ct":
                if(!in_array($s->getName(),$this->plugin->Admins->getAll()) && $s instanceof Player)
                {
                    $s->sendMessage(C::AQUA."{§eController§b}  §c您不是管理员,无法使用此命令");
                    return true;
                }
                if(count($args) === 0)
                {
                    if(!in_array($s->getName(),$this->plugin->Admins->getAll()) && $s instanceof Player)
                    {
                        $s->sendMessage(C::AQUA."{§eController§b}  §c您不是管理员,无法使用此命令");
                        return true;
                    }
                    else
                    {
                        $this->plugin->help($s);
                        return true;
                    }
                }
                if(isset($args[0]))
                {
                    switch($args[0])
                    {
                        case "addworlds":
                            if(!in_array($s->getName(),$this->plugin->Admins->getAll()) && $s instanceof Player)
                            {
                                $s->sendMessage(C::AQUA."{§eController§b}  §c您不是管理员,无法使用此命令");
                                return true;
                            }
                            else
                            {
                                if(!isset($args[1]))
                                {
                                    $this->plugin->worldtype($s);
                                    return true;
                                }
                                if(isset($args[1]))
                                {
                                    switch ($args[1])
                                    {
                                        case "tnt":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("禁止TNT爆炸",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("禁止TNT爆炸worlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(!in_array($level,$levels))
                                                {
                                                    $levels[]=$level;
                                                    $this->plugin->PZ->set("禁止TNT爆炸worlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b}  §a已开启§6禁止TNT爆炸§a在世界§6{$level}");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        case "cz":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("禁止创造PVP",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("禁止创造PVPworlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(!in_array($level,$levels))
                                                {
                                                    $levels[]=$level;
                                                    $this->plugin->PZ->set("禁止创造PVPworlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b}  §a已开启§6禁止创造PVP§a在世界§6{$level}");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        case "csd":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("禁止出生点PVP",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("禁止出生点PVPworlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(!in_array($level,$levels))
                                                {
                                                    $levels[]=$level;
                                                    $this->plugin->PZ->set("禁止出生点PVPworlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b}  §a已开启§6禁止出生点PVP§a在世界§6{$level}");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        case "dxz":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("禁止使用大箱子",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("禁止使用大箱子worlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(!in_array($level,$levels))
                                                {
                                                    $levels[]=$level;
                                                    $this->plugin->PZ->set("禁止使用大箱子worlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b}  §a已开启§6禁止使用大箱子§a在世界§6{$level}");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        case "czw":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("禁止创造丢物品",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("禁止创造丢物品worlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(!in_array($level,$levels))
                                                {
                                                    $levels[]=$level;
                                                    $this->plugin->PZ->set("禁止创造丢物品worlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b}  §a已开启§6禁止创造丢物品§a在世界§6{$level}");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        case "sw":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("死亡不掉落",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("死亡不掉落worlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(!in_array($level,$levels))
                                                {
                                                    $levels[]=$level;
                                                    $this->plugin->PZ->set("死亡不掉落worlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b}  §a已开启§6死亡不掉落§a在世界§6{$level}");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        case "je":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("禁用饥饿度",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("禁用饥饿度worlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(!in_array($level,$levels))
                                                {
                                                    $levels[]=$level;
                                                    $this->plugin->PZ->set("禁用饥饿度worlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b}  §a已开启§6禁用饥饿度§a在世界§6{$level}");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        case "czdxz":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("禁止创造使用箱子",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("禁止创造使用箱子worlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(!in_array($level,$levels))
                                                {
                                                    $levels[]=$level;
                                                    $this->plugin->PZ->set("禁止创造使用箱子worlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b}  §a已开启§6禁止创造使用箱子§a在世界§6{$level}");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        case "wk":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("禁止使用物品展示框",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("禁止使用物品展示框worlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(!in_array($level,$levels))
                                                {
                                                    $levels[]=$level;
                                                    $this->plugin->PZ->set("禁止使用物品展示框worlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b}  §a已开启§6禁止使用物品展示框§a在世界§6{$level}");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        default:
                                            $this->plugin->falseworldtype($s);
                                            return true;
                                    }
                                }
                                else
                                {
                                    $s->sendMessage(C::AQUA."{§eController§b} §a用法: /ct addworlds [worldtype] [地图名]");
                                    return true;
                                }
                            }
                        case "delworlds":
                            if(!in_array($s->getName(),$this->plugin->Admins->getAll()) && $s instanceof Player)
                            {
                                $s->sendMessage(C::AQUA."{§eController§b}  §c您不是管理员,无法使用此命令");
                                return true;
                            }
                            else
                            {
                                if(!isset($args[1]))
                                {
                                    $this->plugin->worldtype($s);
                                    return true;
                                }
                                if(isset($args[1]))
                                {
                                    switch ($args[1])
                                    {
                                        case "tnt":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("禁止TNT爆炸worlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(in_array($level,$levels))
                                                {
                                                    $inv = array_search($level, $levels);
                                                    $inv = array_splice($levels, $inv, 1);
                                                    $this->plugin->PZ->set("禁止TNT爆炸worlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a取消§6禁止TNT爆炸§a在世界§e$level");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        case "cz":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("禁止创造PVP",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("禁止创造PVPworlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(in_array($level,$levels))
                                                {
                                                    $inv = array_search($level, $levels);
                                                    $inv = array_splice($levels, $inv, 1);
                                                    $this->plugin->PZ->set("禁止创造PVPworlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a取消§6禁止创造PVP§a在世界§e$level");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        case "csd":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("禁止出生点PVP",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("禁止出生点PVPworlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(in_array($level,$levels))
                                                {
                                                    $inv = array_search($level, $levels);
                                                    $inv = array_splice($levels, $inv, 1);
                                                    $this->plugin->PZ->set("禁止出生点PVPworlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a取消§6禁止出生点PVP§a在世界§e$level");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        case "dxz":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("禁止使用大箱子",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("禁止使用大箱子worlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(in_array($level,$levels))
                                                {
                                                    $inv = array_search($level, $levels);
                                                    $inv = array_splice($levels, $inv, 1);
                                                    $this->plugin->PZ->set("禁止使用大箱子worlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a取消§6禁止使用大箱子§a在世界§e$level");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        case "czw":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("禁止创造丢物品",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("禁止创造丢物品worlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(in_array($level,$levels))
                                                {
                                                    $inv = array_search($level, $levels);
                                                    $inv = array_splice($levels, $inv, 1);
                                                    $this->plugin->PZ->set("禁止创造丢物品worlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a取消§6禁止创造丢物品§a在世界§e$level");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        case "sw":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("死亡不掉落",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("死亡不掉落worlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(in_array($level,$levels))
                                                {
                                                    $inv = array_search($level, $levels);
                                                    $inv = array_splice($levels, $inv, 1);
                                                    $this->plugin->PZ->set("死亡不掉落worlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a取消§6死亡不掉落§a在世界§e$level");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        case "je":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("禁用饥饿度",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("禁用饥饿度worlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(in_array($level,$levels))
                                                {
                                                    $inv = array_search($level, $levels);
                                                    $inv = array_splice($levels, $inv, 1);
                                                    $this->plugin->PZ->set("禁用饥饿度worlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a取消§6禁用饥饿度§a在世界§e$level");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        case "czdxz":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("禁止创造使用箱子",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("禁止创造使用箱子worlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(in_array($level,$levels))
                                                {
                                                    $inv = array_search($level, $levels);
                                                    $inv = array_splice($levels, $inv, 1);
                                                    $this->plugin->PZ->set("禁止创造使用箱子worlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a取消§6禁止创造使用箱子§a在世界§e$level");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        case "wk":
                                            if(isset($args[2]))
                                            {
                                                $this->plugin->PZ->set("禁止使用物品展示框",false);
                                                $this->plugin->PZ->save();
                                                $levels=$this->plugin->PZ->get("禁止使用物品展示框worlds");
                                                $level=$args[2];
                                                if(!$this->plugin->getServer()->isLevelGenerated($args[2]))
                                                {
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a地图 §a$args[2] §a不存在！");
                                                    return true;
                                                }
                                                if(in_array($level,$levels))
                                                {
                                                    $inv = array_search($level, $levels);
                                                    $inv = array_splice($levels, $inv, 1);
                                                    $this->plugin->PZ->set("禁止使用物品展示框worlds",$levels);
                                                    $this->plugin->PZ->save();
                                                    $s->sendMessage(C::AQUA."{§eController§b} §a取消§6禁止使用物品展示框§a在世界§e$level");
                                                    return true;
                                                }
                                            }
                                            else
                                            {
                                                $s->sendMessage(C::AQUA."{§eController§b} §a请输入要添加的地图名！");
                                                return true;
                                            }
                                            return true;
                                        default:
                                            $this->plugin->falseworldtype($s);
                                            return true;
                                    }
                                }
                                else
                                {
                                    $s->sendMessage(C::AQUA."{§eController§b} §a用法: /ct delworlds [worldtype] [地图名]");
                                    return true;
                                }
                            }
                        case "addadmins":
                            if($s instanceof Player)
                            {
                                $s->sendMessage(C::AQUA."{§eController§b} §c请在后台使用");
                                return true;
                            }
                            if(isset($args[1]))
                            {
                                $player=$args[1];
                                $config=$this->plugin->Admins->getAll();
                                if(!in_array($player,$config))
                                {
                                    $config[]=$player;
                                    $this->plugin->Admins->setAll($config);
                                    $this->plugin->Admins->save();
                                    $s->sendMessage("{Controller}  已添加玩家{$player}为管理员");
                                    return true;
                                }
                            }
                            else
                            {
                                $s->sendMessage(C::AQUA."{§eController§b} 用法  /ct addadmins 玩家名字");
                                return true;
                            }
                            return true;
                        case "deladmins":
                            if($s instanceof Player)
                            {
                                $s->sendMessage(C::AQUA."{§eController§b} §c请在后台使用");
                                return true;
                            }
                            if(isset($args[1]))
                            {
                                $player=$args[1];
                                $config=$this->plugin->Admins->getAll();
                                if(in_array($player,$config))
                                {
                                    $inv = array_search($player,$config);
                                    $inv = array_splice($config, $inv, 1);
                                    $this->plugin->Admins->setAll($config);
                                    $this->plugin->Admins->save();
                                    $s->sendMessage("{Controller}  已删除管理员{$player}");
                                    return true;
                                }
                                else
                                {
                                    $s->sendMessage("{Controller}  不存在管理员{$player}");
                                    return true;
                                }
                            }
                            else
                            {
                                $s->sendMessage(C::AQUA."{§eController§b} 用法  /ct deladmins 玩家名字");
                                return true;
                            }
                        case "help":
                            if(!in_array($s->getName(),$this->plugin->Admins->getAll()) && $s instanceof Player)
                            {
                                $s->sendMessage(C::AQUA."{§eController§b}  §c您不是管理员,无法使用此命令");
                                return true;
                            }
                            else
                            {
                                $this->plugin->help($s);
                                return true;
                            }
                        case "reload":
                            if(!in_array($s->getName(),$this->plugin->Admins->getAll()) && $s instanceof Player)
                            {
                                $s->sendMessage(C::AQUA."{§eController§b}  §c您不是管理员,无法使用此命令");
                                return true;
                            }
                            else
                            {
                                $this->plugin->Message->reload();
                                $this->plugin->Admins->reload();
                                $this->plugin->PZ->reload();
                                $s->sendMessage(C::AQUA."{§eController§b}  §6完成配置重载");
                                return true;
                            }
                        case "true":
                            if(!in_array($s->getName(),$this->plugin->Admins->getAll()) && $s instanceof Player)
                            {
                                $s->sendMessage(C::AQUA."{§eController§b}  §c您不是管理员,无法使用此命令");
                                return true;
                            }
                            else
                            {
                                if(!isset($args[1]))
                                {
                                    $this->plugin->type($s);
                                    return true;
                                }
                                else
                                {
                                    switch ($args[1])
                                    {
                                        case "s":
                                            $this->plugin->PZ->set("禁止水流动",true);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c开启 禁止水流动");
                                            return true;
                                        case "yj":
                                            $this->plugin->PZ->set("禁止岩浆流动",true);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c开启 禁止岩浆流动");
                                            return true;
                                        case "tnt":
                                            $this->plugin->PZ->set("禁止TNT爆炸",true);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c开启 禁止TNT爆炸");
                                            return true;
                                        case "cz":
                                            $this->plugin->PZ->set("禁止创造PVP",true);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c开启 禁止创造PVP");
                                            return true;
                                        case "csd":
                                            $this->plugin->PZ->set("禁止出生点PVP",true);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c开启 禁止出生点pvp");
                                            return true;
                                        case "dxz":
                                            $this->plugin->PZ->set("禁止使用大箱子",true);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c开启 禁用大箱子");
                                            return true;
                                        case "czw":
                                            $this->plugin->PZ->set("禁止创造丢物品",true);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c开启 禁止创造丢弃物品");
                                            return true;
                                        case "sw":
                                            $this->plugin->PZ->set("死亡不掉落",true);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c开启 死亡不掉落");
                                            return true;
                                        case "zc":
                                            $this->plugin->PZ->set("进入返回主城",true);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c开启 进入服务器返回主城");
                                            return true;
                                        case "je":
                                            $this->plugin->PZ->set("禁用饥饿度",true);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c开启 禁用饥饿度");
                                            return true;
                                        case "czdxz":
                                            $this->plugin->PZ->set("禁止创造使用箱子",true);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c开启 禁止创造使用箱子");
                                            return true;
                                        case "wk":
                                            $this->plugin->PZ->set("禁止使用物品展示框",true);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c开启 禁止使用物品展示框");
                                            return true;
                                        default:
                                            $this->plugin->falsetype($s);
                                            return true;
                                    }
                                }
                            }
                        case "false":
                            if(!in_array($s->getName(),$this->plugin->Admins->getAll()) && $s instanceof Player)
                            {
                                $s->sendMessage(C::AQUA."{§eController§b}  §c您不是管理员,无法使用此命令");
                                return true;
                            }
                            else
                            {
                                if(!isset($args[1]))
                                {
                                    $this->plugin->type($s);
                                    return true;
                                }
                                else
                                {
                                    switch ($args[1])
                                    {
                                        case "s":
                                            $this->plugin->PZ->set("禁止水流动",false);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c关闭 禁止水流动");
                                            return true;
                                        case "yj":
                                            $this->plugin->PZ->set("禁止岩浆流动",false);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c关闭 禁止岩浆流动");
                                            return true;
                                        case "tnt":
                                            $this->plugin->PZ->set("禁止TNT爆炸",false);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c关闭 禁止TNT爆炸");
                                            return true;
                                        case "cz":
                                            $this->plugin->PZ->set("禁止创造PVP",false);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c关闭 禁止创造PVP");
                                            return true;
                                        case "csd":
                                            $this->plugin->PZ->set("禁止出生点PVP",false);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c关闭 禁止出生点pvp");
                                            return true;
                                        case "dxz":
                                            $this->plugin->PZ->set("禁止使用大箱子",false);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c关闭 禁用大箱子");
                                            return true;
                                        case "czw":
                                            $this->plugin->PZ->set("禁止创造丢物品",false);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c关闭 禁止创造丢弃物品");
                                            return true;
                                        case "sw":
                                            $this->plugin->PZ->set("死亡不掉落",false);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c关闭 死亡不掉落");
                                            return true;
                                        case "zc":
                                            $this->plugin->PZ->set("进入返回主城",false);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c关闭 进入服务器返回主城");
                                            return true;
                                        case "je":
                                            $this->plugin->PZ->set("禁用饥饿度",false);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c关闭 禁用饥饿度");
                                            return true;
                                        case "czdxz":
                                            $this->plugin->PZ->set("禁止创造使用箱子",false);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c关闭 禁止创造使用箱子");
                                            return true;
                                        case "wk":
                                            $this->plugin->PZ->set("禁止使用物品展示框",false);
                                            $this->plugin->PZ->save();
                                            $s->sendMessage(C::AQUA .      "{§eController§b} §c关闭 禁止使用物品展示框");
                                            return true;
                                        default:
                                            $this->plugin->falsetype($s);
                                            return true;
                                    }
                                }
                            }
                        default:
                            $this->plugin->help($s);
                            return true;
                    }
                }
        }
    }
}