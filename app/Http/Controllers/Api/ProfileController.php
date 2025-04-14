<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return response()->json([
            'success' => true,
            'message' => 'Profil user',
            'data'    => $user,
        ], 200);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            $user->name  = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Profil berhasil diperbarui',
                'data'    => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan',
                'errors'  => $e->getMessage(),
            ], 500);
        }
    }
}
