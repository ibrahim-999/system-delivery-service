<?php
/**
 * Created by PhpStorm.
 * User: haitham
 * Date: 11/08/18
 * Time: 08:40 م
 */

namespace App\Interfaces;


use App\Models\Invoice;
use Carbon\Carbon;

interface Accountable
{
    /**
     * @param Invoice|array $input
     * @return float
     */
    public function dueFrom($input);

    /**
     * @param Invoice|array $input
     * @return float
     */
    public function dueFor($input);
}
