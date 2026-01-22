<?php

namespace TypechoPlugin\Titleshow;

use Typecho\Plugin\PluginInterface;
use Typecho\Widget\Helper\Form;
use Typecho\Widget\Helper\Form\Element\Text;
use Widget\Options;
use Utils\Helper;
use Typecho\Db;


if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 让加密文章显示标题
 * 
 * @package Titleshow
 * @author 泽泽
 * @version 1.1.3
 * @link https://github.com/jrotty/Titleshow
 */
class Plugin implements PluginInterface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        \Typecho\Plugin::factory('Widget_Abstract_Contents')->title =  __CLASS__ . '::tshow';
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param $form 配置面板
     * @return void
     */
    public static function config($form)
    {
    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param $form
     * @return void
     */
    public static function personalConfig($form){}
    
    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
public static function tshow($title, $obj) {
    if($obj->hidden){
        $db = Db::get();
        return $db->fetchRow($db->select('title')->from('table.contents')->where('cid = ?',$obj->cid)->limit(1))['title'];
    }else{
        return $title;
    }
    
}

}
