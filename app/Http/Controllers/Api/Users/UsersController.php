<?php

namespace App\Http\Controllers\Api\Users;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     path="/api/mz-users",
     *     tags={"Users"},
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      ),
     * )
     */
    public function index()
    {
        return response(Users::all(), 200);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get (
     *     tags={"Users"},
     *     path="/api/mz-users/get-by-id/{id}",
     *     @OA\Parameter( name="id", in="path", required=false, description="1", @OA\Schema( type="integer" ) ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      @OA\JsonContent(
     *     type="object",
     *                      )
     *                  ),
     *      )
     */
    public function getById($id)
    {
        return Users::select()
            ->where(['id' => $id])
            ->get();
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Get   (
     *     tags={"Users"},
     *     path="/api/mz-users/login/{login}/{password}",
     *     @OA\Parameter( name="login", in="path", required=false, description="login", @OA\Schema( type="text" ) ),
     *     @OA\Parameter( name="password", in="path", required=false, description="password", @OA\Schema( type="text" ) ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="",
     *      @OA\JsonContent(
     *     type="object",
     *                      )
     *                  ),
     *      )
     */
    public function login(Request $request)
    {
        $user = Users::select()
            ->where(['login' => $request->login])
            ->first();
        if ($user) {
            if (password_verify($request->password, $user->password)) {
                return $user;
            }
        }
        return ['message' => 'Пользователь не найден'];
    }


//    public function login(Request $request)
//    {
//        return Response::json([
//            'token' => $request
//
//        ], 500);
//        $validator = Validator::make($request->all(), [
//            'login' => 'required|string|email',
//            'password' => 'required|string',
//        ]);
//
//        if ($validator->fails()) {
//            return Response::json(['errors' => $validator->errors()], 422);
//        }
//
//        if (Auth::attempt($request->only('login', 'password'))) {
////            $user = User::whereEmail($request->email)->first();
//            $user =Users::with(['role', 'clinic', 'specialties'])->where($request->login)->first();
//
//            $user->remember_token = Str::random('64');
//            $user->save();
//
//            return Response::json([
//                'token' => $user->remember_token,
//                'user' => $user
//            ], 200);
//        } else {
//            return Response::json(['message' => __('auth.failed')], 401);
//        }
//    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @OA\Post(
     *     path="/api/mz-users",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *    request="Create Users",
     *    description="Create Users Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="role_id",description="0", type="number", example="1"),
     *          @OA\Property(property="speciality_id",description="0", type="number", example="1"),
     *          @OA\Property(property="clinic_id",description="0", type="number", example="1"),
     *          @OA\Property(property="pid",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="login",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="first_name",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="last_name",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="email",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="password",description="Текст", type="string", example="Тест")
     *    )
     * ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Create",
     *          @OA\JsonContent(
     *             type="object",
     *          @OA\Property(property="id", type="number", example="1"),
     *          @OA\Property(property="role_id",description="0", type="number", example="1"),
     *          @OA\Property(property="speciality_id",description="0", type="number", example="1"),
     *          @OA\Property(property="clinic_id",description="0", type="number", example="1"),
     *          @OA\Property(property="pid",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="login",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="first_name",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="last_name",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="email",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="password",description="Текст", type="string", example="Тест")
     *         )
     *      ),
     *     @OA\Response(
     *          response=422,
     *          description="Validation errors",
     *      @OA\JsonContent(
     *     type="object",
     *     title="errors",
     *     description="errors object",
     *     @OA\Property(
     *     property="errors",
     *     type="object",
     *     title="Validation errors",
     *     description="Validation errors object",
     *     @OA\Property(property="field1", type="array", @OA\Items(example="The field1 field is required.")),
     * )
     * )
     *      ),
     * )
     */
    public function store(Request $request)
    {

        if ($request->id > 0) {
            $user = Users::whereId($request->id)->first();
        } else {
            $user = new Users();
        }

        $validator = $user->validate($request->all());
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $user->fill($request->only($user->getFillable()))->save();
        return response(
            Users::whereId($user->id)->first()->toArray(), 200);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @OA\Patch (
     *     path="/api/mz-users/{id}",
     *     tags={"Users"},
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      @OA\Schema(
     *           type="number"
     *      )
     *   ),
     *     @OA\RequestBody(
     *    request="Update Users",
     *    description="Update Users Fields",
     *    @OA\JsonContent(
     *        type="object",
     *        required={""},
     *          @OA\Property(property="role_id",description="0", type="number", example="1"),
     *          @OA\Property(property="speciality_id",description="0", type="number", example="1"),
     *          @OA\Property(property="clinic_id",description="0", type="number", example="1"),
     *          @OA\Property(property="pid",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="login",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="first_name",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="last_name",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="email",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="password",description="Текст", type="string", example="Тест")
     *    )
     * ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Create",
     *          @OA\JsonContent(
     *             type="object",
     *          @OA\Property(property="id", type="number", example="1"),
     *          @OA\Property(property="role_id",description="0", type="number", example="1"),
     *          @OA\Property(property="speciality_id",description="0", type="number", example="1"),
     *          @OA\Property(property="clinic_id",description="0", type="number", example="1"),
     *          @OA\Property(property="pid",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="login",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="first_name",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="last_name",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="email",description="Текст", type="string", example="Тест"),
     *          @OA\Property(property="password",description="Текст", type="string", example="Тест")
     *
     *         )
     *      ),
     *     @OA\Response(
     *          response=422,
     *          description="Validation errors",
     *      @OA\JsonContent(
     *     type="object",
     *     title="errors",
     *     description="errors object",
     *     @OA\Property(
     *     property="errors",
     *     type="object",
     *     title="Validation errors",
     *     description="Validation errors object",
     *     @OA\Property(property="field1", type="array", @OA\Items(example="The field1 field is required.")),
     *     @OA\Property(property="field2", type="array",  @OA\Items(example="The field2 field is required."))
     * )
     * )
     *      ),
     * )
     */
    public function update(Request $request)
    {
        $entity = Users::whereId($request->id)->first();
        if (!$entity) {
            return response([], 404);
        }

        $validator = $entity->validate($request->all(), false);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $entity->fill($request->only($entity->getFillable()));

        if ($entity->save()) {

            return response($entity->toArray(), 200);
        } else {
            return response('anyError', 500);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @OA\Delete  (
     *     path="/api/mz-users/{id}",
     *     tags={"Users"},
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      @OA\Schema(
     *           type="number"
     *      )
     *   ),
     *     @OA\Response(
     *          response=200,
     *          description="Success Delete",
     *          @OA\JsonContent(
     *             type="object",
     *              @OA\Property(property="is_deleted", type="boolean", example=true),
     *         )
     *      ),
     *     @OA\Response(
     *          response=400,
     *          description="Error Delete",
     *          @OA\JsonContent(
     *             type="object",
     *              @OA\Property(property="is_deleted", type="boolean", example=false),
     *         )
     *      ),
     *
     * )
     */
    public function destroy($id)
    {
        $is_deleted = (bool)Users::whereId($id)->delete();
        return response(['is_deleted' => $is_deleted], $is_deleted ? 200 : 400);
    }
}
