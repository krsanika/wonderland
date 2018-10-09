<?php
/**
 * Created by PhpStorm.
 * User: Krsanika
 * Date: 2018-08-02
 * Time: 오후 2:40
 */

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use App\Document\TextConfig;

class AppExtension extends AbstractExtension
{

    public function systemStrFilter($no){

        return TextConfig::$SYSTEM_TEXT[$no];
    }

    public function tagStrFilter($no){
        return TextConfig::$GENRE_TEXT[$no];
    }

    public function getFilters()
    {
        return [
            new TwigFilter('systemStr', [$this, 'systemStrFilter']),
            new TwigFilter('tagStr', [$this, 'tagStrFilter']),
        ];
    }

}