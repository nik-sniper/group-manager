<?php


namespace App\Groups\Contracts;


use App\Models\Groups\Group;

interface GroupServiceInterface
{
    /**
     * @param array $options
     * @return array
     */
    public function getGroups(array $options) : array;

    /**
     * @param string $groupId
     * @return int
     */
    public function getMembers(string $groupId) : int;

    /**
     * @param array|object $data
     * @return array
     */
    public function toValidFormat($data) : array;

    /**
     * @param array|object $dataGroup
     * @return Group
     */
    public function writeGroup($dataGroup) : Group;
}
