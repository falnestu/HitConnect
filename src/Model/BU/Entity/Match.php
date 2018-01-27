<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 21.01.18
 * Time: 16:58
 */

namespace App\Model\BU\Entity;


class Match
{
    private $score;
    private $user_id;
    private $username;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score * 100;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function addScore($score){
        $this->score += $score;
    }
}