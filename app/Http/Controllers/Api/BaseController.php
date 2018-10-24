<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="NGLocations API",
 *     description="REST API that allows users to retrieve information of all states in Nigeria.",
 *     @OA\Contact(
 *         name="DayliciousSoft",
 *         email="daylicious@gmail.com"
 *     ),
 *     @OA\License(
 *         name="MIT",
 *         url="https://opensource.org/licenses/MIT"
 *     )
 * )
 *
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="Server url"
 * )
 *
 * @OA\Schema(
 *     schema="Error",
 *     @OA\Property(
 *         property="error",
 *         type="string",
 *         description="Error message"
 *     ),
 * )
 *
 */
class BaseController extends Controller
{
    //
}
