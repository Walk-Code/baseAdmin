<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 09 Jul 2018 11:09:15 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class XqyJxsSpecificKnowledge
 *
 * @property int $id
 * @property string $name
 * @property int $subject_id
 * @property string $parent_code
 * @property string $code
 * @property int $importance_id
 * @property int $difficulty_id
 * @property int $status
 * @property \Carbon\Carbon $create_time
 * @property \Carbon\Carbon $update_time
 * @property int $level
 *
 * @package App\Models
 */
class XqyJxsSpecificKnowledge extends Eloquent {
	protected $table      = 'xqy_jxs_specific_knowledge';
	public    $timestamps = false;

	protected $casts = [
		'subject_id'    => 'int',
		'importance_id' => 'int',
		'difficulty_id' => 'int',
		'status'        => 'int',
		'level'         => 'int'
	];

	protected $dates = [
		'create_time',
		'update_time'
	];

	protected $fillable = [
		'name',
		'subject_id',
		'parent_code',
		'code',
		'importance_id',
		'difficulty_id',
		'status',
		'create_time',
		'update_time',
		'level'
	];

	public function filterData(): array {
		$menuArr = XqyJxsSpecificKnowledge::get();
		$menus   = [];

		foreach ($menuArr as $item) {
			$menus[$item->parent_code][] = $item;
		}
		return $menus;
	}

	/**
	 *<pre>生成树(使用递归)</pre>
	 * @author xqyjjq  walk_code@163.com
	 * @date 2018/7/9
	 */
	public static function builtTree(&$menus = [], $n): array {
		$tree = [];
		if (isset($menus[$n])) {
			foreach ($menus[$n] as $k => $item) {
				if (isset($menus[$item->parent_code]) || $item->parent_code == 0) {
					echo str_repeat('-', (strlen($n) / 4)) . $item->name . '   ' . $item->parent_code . '<br/>';
					$item['children'] = self::builtTree($menus, $item->code);
				}
				$tree [] = $item;
			}
		}
		return $tree;
	}

	/**
	 *<pre>生成树（不使用递归）</pre>
	 * @author xqyjjq  walk_code@163.com
	 * @date 2018/7/10
	 */
	public static function builtTree2() {
		$knowledges = XqyJxsSpecificKnowledge::get();
		$menus      = [];
		$tree       = [];

		foreach ($knowledges as $knowledge) {
			$knowledge->sul                   = str_repeat('-|', $knowledge->level);
			$menus[$knowledge->code]          = $knowledge->toArray();
			$menus[$knowledge->code]['child'] = [];
		}
		$newData = [];
		foreach ($menus as $key => $item) {
			if (isset($menus[$item['parent_code']])) {
				$menus[$item['parent_code']]['child'][] = &$menus[$key];
			}
			echo str_repeat('&nbsp;&nbsp;-|&nbsp;&nbsp;', $item['level']) . $item['name'] . $item['code'] . '<br/>';
			array_push($newData, $menus[$key]);
			$tree[] = &$menus[$key];
		}
		//echo '当前保存的数据：' . json_encode($newData) . PHP_EOL;
		return $newData;
	}

}
