<?php
/**
 * Created by PhpStorm.
 * User: Krsanika
 * Date: 2018-07-27
 * Time: 오후 5:27
 */

namespace App\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;
use App\Document\User;


class ScenarioRepository extends DocumentRepository
{
    public function findPublishedOrderedByFavored(){
        $all = $this->findBy(['published' => 2], ['favored' => 'DESC']);
        foreach($all as &$scenario){
            $scenario->unsetForSynopsis();
        }

        /*$all = $this->addUsername($all);*/


        return $all;
    }


}