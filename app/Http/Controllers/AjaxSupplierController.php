<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\Sku;
use App\Models\SupplierPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxSupplierController extends Controller
{
    public function getPosts(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = auth()->user();
        $query = SupplierPost::query();
        $query->where('user_id', $user->id);
        $query->orderBy('created_at', 'desc');
        $posts = $query->get();

        $res['supplierPosts'] = $posts;

        return response()->json($res);
    }

    public function addNewPool(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $user = auth()->user();
        $data['user_id'] = $user->id;

        $pool = Pool::create($data);

        if ($pool) {
            $res['success'] = true;
            $res['message'] = 'New Pool Added.';
        } else {
            $res['success'] = false;
            $res['message'] = 'Server Error.';
        }

        return response()->json($res);
    }

    public function updatePool(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = auth()->user();
        $data = $request->all();
        $pool = Pool::find($request->id);
        if ($pool) {
            if ($pool->update($data)) {
                $res['success'] = true;
                $res['message'] = 'Pool Updated.';
            } else {
                $res['success'] = false;
                $res['message'] = 'Server Error.';
            }
        } else {
            $res['success'] = false;
            $res['message'] = 'Server Error.';
        }


        return response()->json($res);
    }

    public function deletePool(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = auth()->user();
        $pool = Pool::find($request->pool);
        if ($pool) {
            if ($pool->delete()) {
                $res['success'] = true;
                $res['message'] = 'Pool Deleted.';
            } else {
                $res['success'] = false;
                $res['message'] = 'Server Error.';
            }
        } else {
            $res['success'] = false;
            $res['message'] = 'Server Error.';
        }

        return response()->json($res);
    }

    public function createNewPost(Request $request)
    {
        $data = $request->all();
        $user = auth()->user();

        $sku = Sku::where('sku', $request->sku)->where('is_use', '0')->first();

        if (!$sku) {
            $sku = new Sku();
            $sku->sku = $request['sku'];
            $sku->created_by = $user->id;
            $sku->save();
        }

        $supplier_post = new SupplierPost();
        $supplier_post->sku = $sku->id;
        $supplier_post->category = $request['category'];
        $supplier_post->quantity = str_replace(',', '', $request['quantity']);
        $supplier_post->price = str_replace(',', '', $request['min_price']);
        $supplier_post->description = $request['description'];
        $supplier_post->unit_per_case = $request['unit_per_case'];
        $supplier_post->net_weight = $request['net_weight'];
        $supplier_post->list_price = str_replace(',', '', $request['list_price']);
        $supplier_post->per_case_price = $request['per_case_price'];
        $supplier_post->user_id = $user->id;
        $supplier_post->order_duration = $request['order_duration'];
        $supplier_post->delivery_window = $request['delivery_window'];
        $supplier_post->delivery_window_to = $request['delivery_window_to'];
        $supplier_post->expiry = date('Y-m-d', strtotime($request['expiry']));
        $supplier_post->product_location = $request['product_location'];
//        $supplier_post->pool = implode(',', $request['pool_name']);
//        $supplier_post->save();

        $supplier_post = $supplier_post->save();


        DB::table('sku')->where('id', $sku->id)->update(['is_use' => '1']);


        if ($supplier_post) {
            $res['success'] = true;
            $res['message'] = 'Post Created.';
        } else {
            $res['success'] = false;
            $res['message'] = 'Server Error.';
        }
        return response()->json($res);

    }
}
