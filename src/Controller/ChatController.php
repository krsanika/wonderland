<?php
/**
 * Created by PhpStorm.
 * User: WS01
 * Date: 2018-04-11
 * Time: 오후 7:24
 */

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class ChatController extends Controller
{
    /**
     * @Route("chat", name="chat_index")
     * @Template()
     */
    public function index()
    {
        $bgDir = __DIR__.'/../../public/image/default/bg';
        $standDir = __DIR__.'/../../public/image/default/stand';
        $handle = opendir($bgDir);
        $bgList = [];
        $standList = [];
        $npcList = [];
        while (false !== ($filename = readdir($handle))) {
            if($filename == "." || $filename == "..")  continue;
            if(is_file($bgDir . "/" . $filename)) $bgList[] = ["name"=>$filename, "filename"=>$filename] ;
        }
        closedir($handle);

        $handle = opendir($standDir);
        while (false !== ($filename = readdir($handle))) {
            if($filename == "." || $filename == "..")  continue;
            if(is_file($standDir . "/" . $filename)) $standList[] = ["name" =>$filename, "filename"=> $filename];
        }
        closedir($handle);

        sort($bgList);
        sort($standList);


        $userdata = [
            'name' => '조커리',
            'userId' => 1231,
            'role' => 'gm',
        ];

        $teamdata = [
            'default_bg_list' => $bgList,
            'default_stand_list' => $standList,
            'npc_list' => $npcList,
            'teamId' => 4,
            'campaignId' => 123,
            'teamName' => '조커리게임즈',
            'campaignName' => '제도유곡',
            'episodeNo' => 3,
            'rule' => 'coc',
            'idRoom' => 100,
            'server_url' =>'1.229.95.13:9003',
        ];
        $settings = [

        ];

        return ['userdata' => $userdata , 'teamdata' => $teamdata, 'settings'=> $settings];
    }


}