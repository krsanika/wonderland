<?php
/**
 * Created by PhpStorm.
 * User: Krsanika
 * Date: 2018-06-26
 * Time: 오후 9:55
 */

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;


/**
 * @MongoDB\EmbeddedDocument
 */
class Date
{

    /**
     * @MongoDB\Field(type="int")
     */
    protected $year;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $month;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $day;

    /**
     * Date constructor.
     * @param $year
     * @param $month
     * @param $day
     */
    public function __construct()
    {
        $this->year = (int)date('Y');
        $this->month = (int)date('m');
        $this->day = (int)date('d');
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param mixed $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

//------------------------------------
//
//  두개의 Date클래스를 비교해서 누가 앞이고 뒨지만 뱉어주는애



}