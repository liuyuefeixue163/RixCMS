<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace Org\Util;
/**
 * 日期时间操作类
 * @category   ORG
 * @package  ORG
 * @subpackage  Category
 * @author    liu21st <liu21st@gmail.com>
 * @version   $Id: Date.class.php 2662 2012-01-26 06:32:50Z liu21st $
 */
Class Category{
		//找子级，是不是自己的子级
        //组合一维数组		
		Static Public function unlimitedForLevel($cate,$html = '--',$pid =0,$level=0){
			$arr=array();
			foreach($cate as $v){
				//如果是它的子级压倒数组中
				//如果两个pid相等证明是，pid=0,是顶级
				if($v['pid'] == $pid){					
					$v['level']==$level + 1;
					//将level级，替换成--符号
					$v['html'] = str_repeat($html,$level);
					//将数据放到新数组中
					$arr[]=$v;
					$arr =array_merge($arr,self::unlimitedForLevel($cate,$html,$v['pid'],$level+1));
				}
			}
			return $arr;
		}
		
		//组合多维数组
		//首页导航菜单
		Static Public function unlimitedForLayer($cate,$name='child',$pid=0){
			$arr=array();
			foreach($cate as  $v){
				if($v['pid']==$pid){
					$v['name']=self::unlimitedForLayer($cate,$name,$v['id']);
				}
				$arr[]=$v;
			}
			return $arr;
		}
		
		//面包屑
		Static Public function getParents($cate,$id){
			$arr = array();
			foreach($cate as $v){
				if($v['id']=$id){
					$arr[]=$v;
					//颠倒合并顺序，进行数组反转
					$arr=array_merge(self::getParents($cate,$v['pid']),$arr);
				}
			}
			return $arr;
		}
		
		//传递一个父级ID返回所有子分类id
		Static Public function getChildsId($cate,$pid){
			$arr = array();
			foreach($cate as $v){
				if($v['pid']=$pid){
					$arr[]=$v['id'];
					//颠倒合并顺序，进行数组反转
					$arr=array_merge($arr,self::getChildsId($cate,$v['id']));
				}
			}
			return $arr;
		}
		
		//传递一个父级ID返回所有子分类的信息
		Static Public function getChilds($cate,$pid){
			$arr = array();
			foreach($cate as $v){
				if($v['pid']=$pid){
					$arr[]=$v;
					//颠倒合并顺序，进行数组反转
					$arr=array_merge($arr,self::getChildsId($cate,$v['id']));
				}
			}
			return $arr;
		}

		
				
				
	}
?>