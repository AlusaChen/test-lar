<?php
namespace App\Libraries\Ue;

class Crawler
{
    protected $fieldName;

    protected $config;

    protected $base64 = 'upload';

    public function __construct()
    {
        $CONFIG = config('ueupload');
        $this->config = array(
            "pathFormat" => $CONFIG['catcherPathFormat'],
            "maxSize" => $CONFIG['catcherMaxSize'],
            "allowFiles" => $CONFIG['catcherAllowFiles'],
            "oriName" => "remote.png"
        );
        $this->fieldName = $CONFIG['catcherFieldName'];
    }

    public function do_handle()
    {
        /* 抓取远程图片 */
        $list = array();
        if (isset($_POST[$this->fieldName])) {
            $source = $_POST[$this->fieldName];
        } else {
            $source = $_GET[$this->fieldName];
        }
        foreach ($source as $imgUrl) {
            $item = new Uploader($imgUrl, $this->config, "remote");
            $info = $item->getFileInfo();
            array_push($list, array(
                "state" => $info["state"],
                "url" => $info["url"],
                "size" => $info["size"],
                "title" => htmlspecialchars($info["title"]),
                "original" => htmlspecialchars($info["original"]),
                "source" => htmlspecialchars($imgUrl)
            ));
        }

        /* 返回抓取数据 */
        return json_encode(array(
            'state'=> count($list) ? 'SUCCESS':'ERROR',
            'list'=> $list
        ));
    }

}
