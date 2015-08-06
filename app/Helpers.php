<?php

//自定义函数

/**
 * 输出
 * @param $array
 */
function print_this($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

/**
 * 截取字串
 * @param $str
 * @param int $chars
 * @return string
 */
function str_summary($str, $chars = 10)
{
    $len = 2 * $chars;
    $str = strip_tags($str);
    $str = iconv('UTF-8', 'GBK', $str);

    if (strlen($str) > $len)
    {
        $str = substr($str, 0, $len);
        $str .= '...';
    }

    $str = iconv('GBK', 'UTF-8//IGNORE', $str);

    return $str;
}



/**
 * 数组归类
 * @param $arr
 * @param string $group_key
 * @param string $parent_key
 * @param int $top_key
 * @param string $group_name
 * @return array
 *
 *
    demo
    before:
    [
        [
            'id' => 1,
            'pid' => 0,
        ],
        [
            'id' => 2,
            'pid' => 0,
        ],
        [
            'id' => 4,
            'pid' => 0,
        ],

        [
            'id' => 3,
            'pid' => 1,
        ],
        [
            'id' => 7,
            'pid' => 1,
        ],
        [
            'id' => 6,
            'pid' => 3,
        ],
        [
            'id' => 5,
            'pid' => 2,
        ],
    ];

  after:
    [
        1 => [
            'id' => 1,
            'pid' => 0,
            'son' => [
                3 => [
                    'id' => 3,
                    'pid' => 1,
                    'son' => [
                        6 => [
                            'id' => 6,
                            'pid' => 3
                        ]
                    ],
                ],
                7 => [
                    'id' => 7,
                    'pid' => 1
                ]
            ]
        ],
        2 => [
            'id' => 2,
            'pid' => 0,
            'son' => [
                5 => [
                    'id' => 5,
                    'pid' => 2,
                ]
            ]
        ],
        4 => [
            'id' => 4,
            'pid' => 0
        ]
    ]

 *
 */
function array_trees($arr, $group_key = 'id', $parent_key = 'pid', $top_key = 0, $group_name = 'son')
{
    $arr = array_combine(array_column($arr,$group_key), $arr);
    foreach($arr as $k => $v)
    {
        $arr[$v[$parent_key]][$group_name][$k] = &$arr[$k];
    }
    $ret = isset($arr[$top_key][$group_name]) ? $arr[$top_key][$group_name] : array();
    return $ret;
}

/**
 * 展开数组归类
 * @param $arr
 * @param string $key
 * @param array $ret
 * @param int $i
 * @return array
 */
function array_trees_flatten(&$arr, &$ret = [], &$ptrees = [], $group_key = 'id', $parent_key = 'pid', $group_name = 'son')
{
    if(is_array($arr))
    {
        foreach($arr as $v)
        {
            $pid = $v[$parent_key];
            $id = $v[$group_key];
            $ptrees[$id] = (array_key_exists($pid, $ptrees) ? $ptrees[$pid].'-': '').$pid;
            if(array_key_exists($group_name, $v))
            {
                array_trees_flatten($v['son'], $ret, $ptrees);
                unset($v[$group_name]);
            }
            $v['ptree'] = $ptrees[$v[$group_key]];
            array_unshift($ret, $v);
        }
    }
}

/**
 * 分类树
 * @param $arr
 * @param string $group_key
 * @param string $parent_key
 * @param int $top_key
 * @return array
 */
function array_assort($arr, $group_key = 'id', $parent_key = 'pid', $top_key = 0, $bottom_key = -1)
{
    $arr = array_trees($arr, $group_key, $parent_key, $top_key);
    $ret = $ptrees = [];
    array_trees_flatten($arr, $ret, $ptrees, $group_key, $parent_key);

    $ids = array_column($ret, $group_key);
    $ret = array_combine($ids, $ret);


    if($bottom_key > 0 && array_key_exists($bottom_key, $ret))
    {
        $bottom_tree = $ret[$bottom_key]['ptree'];
        foreach($ret as $k => $item)
        {
            if($k == $bottom_key || strpos($item['ptree'], $bottom_tree.'-') !== false)
            {
                unset($ret[$k]);
            }
        }
    }
    return $ret;
}

/**
 * 数组按照key递归合并 到 第一个数组
 * @param $arr
 * @param $arr2
 * @param null $ignore
 */
function _add_value( &$arr , $arr2 ,$ignore=null )
{
    if ( is_array($arr) && is_array($arr2) )
    {
        foreach ( $arr as $key=>&$value )
        {
            #若arr中value的是数组,并且arr2中也有相同键
            if ( is_array($value) )
            {
                if ( isset($arr2[$key]) && is_array($arr2[$key]) )
                {
                    _add_value($value,$arr2[$key],$ignore);
                }
            }
            else
            {
                #忽略字段
                if(is_array($ignore) && isset($ignore) && in_array($key, $ignore))
                {
                    continue;
                }
                #arr2中是否有与arr1中相同的键名
                if($arr2[$key])
                {
                    if (is_array($arr2[$key]))
                    {
                        $value = $arr2[$key];
                    }
                    else
                    {
                        $value += ($arr2[$key] + 0);
                    }
                }
            }
        }
        foreach ( $arr2 as $key2=>$value2 )
        {
            #若没有相同键，赋新值
            if ( !isset($arr[$key2]) )
            {
                $arr[$key2] = $value2;
            }
        }
    }
    else if( !is_array($arr) && !is_array($arr2))
    {
        $arr += (int)$arr2;
    }
    else
    {
        return ;
    }
}

/**
 * 数组递归合并 返回新数组
 * @param $rs
 * @param null $ignores
 * @return array
 */
function add_all($rs, $ignores = null)
{
    $new_data = array();
    foreach($rs as $v)
    {
        _add_value($new_data , $v, $ignores);
    }

    return $new_data;
}
