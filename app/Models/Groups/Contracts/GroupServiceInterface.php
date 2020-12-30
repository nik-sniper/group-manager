<?php


namespace App\Groups\Contracts;


interface GroupServiceInterface
{
    /**
     * @param string|null $search_text
     * @return array
     */
    public function getGroups(string $search_text = null) : array;

    /**
     * @param string $groupId
     * @return int
     */
    public function getMembers(string $groupId) : int;
}
