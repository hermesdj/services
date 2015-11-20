<?php
/*
This file is part of SeAT

Copyright (C) 2015  Leon Jacobs

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

namespace Seat\Services\Repositories\Eve;

use Illuminate\Support\Facades\DB;
use Seat\Eveapi\Models\Eve\RefTypes;

/**
 * Class EveRepository
 * @package Seat\Services\Repositories\EVe
 */
trait EveRepository
{

    /**
     * Return the order states that market orders can have.
     * Order states from: https://neweden-dev.com/Character/Market_Orders
     *
     * @return array
     */
    public function getEveMarketOrderStates()
    {

        return [
            0 => 'Active',
            1 => 'Closed',
            2 => 'Expired / Fulfilled',
            3 => 'Cancelled',
            4 => 'Pending',
            5 => 'Deleted'
        ];
    }

    /**
     * Return the groups that character skills
     * fall in
     *
     * @return mixed
     */
    public function getEveSkillsGroups()
    {

        $groups = DB::table('invGroups')
            ->where('categoryID', 16)
            ->where('groupID', '<>', 505)
            ->orderBy('groupName')
            ->get();

        return $groups;

    }

    /**
     * Return the transaction reference types
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getEveTransactionTypes()
    {

        return RefTypes::all();
    }
}
