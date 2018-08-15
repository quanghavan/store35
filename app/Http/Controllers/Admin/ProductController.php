<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;

class ProductController extends Controller
{
    
    private function getListCategory(){
        $category = Category::all();
        $list = array();
        foreach ($category as $key => $value) {
            if ($value->parent_id == 0 && count($value->subCategory) > 0){
                foreach ($category as $key1 => $value1) {
                    if ($value1->parent_id == $value->id) {
                        $list[$value->name][$value1->id] = $value1->name;
                    }
                } 
            }else if ($value->parent_id == 0) {
                $list[$value->id] = $value->name; 
            }
            
            
        }
        return $list;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();

        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = $this->getListCategory();
        //dd($list);

        return view('admin.product.add', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $file = $request->file('avatar');
        do {
            $name = str_random(4) . '-' . $file->getClientOriginalName();
        }while (
            file_exists(config('app.imageUrl').'/'.$name)
        );
        $file->move(config('app.imageUrl'), $name);
        $result = $request->except(
            'image_id',
            'avatar',
            'screen',
            'os',
            'back_camera',
            'front_camera',
            'ram',
            'memory',
            'battery_capacity'
        );
        $conf = $request->only(
            'screen',
            'os',
            'back_camera',
            'front_camera',
            'ram',
            'memory',
            'battery_capacity'
        );
        $result = array_merge($result, [
            'price' => floatval(str_replace(',', '', $request->price)),
            'discount' => floatval(str_replace(',', '', $request->discount))
        ]);
        $result['avatar'] = $name;
        //dd($result);
        $product = Product::create($result);
        $product->configuration->create($conf);
        if ($request->hasFile('image_id')) {
            $listImage = array();
            $file = $request->file('image_id');
            foreach ($file as $key => $value) {
                do {
                    $name = str_random(4) . '-' . $value->getClientOriginalName();
                }while (
                    file_exists(config('app.imageUrl').'/'.$name)
                );
                $value->move(config('app.imageUrl'), $name);
                $listImage[]['image_link'] = $name;
            }
            foreach ($listImage as $key => $value) {
               $product->images->create($value);
            }
            
        }

        return redirect()->route('product.index')->with('success', __('Thêm mới sản phẩm thành công!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $list = $this->getListCategory();
        //dd($list);
      
        return view('admin.product.edit', compact('product', 'list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $result = $request->except(
            'image_id',
            'avatar',
            'screen',
            'os',
            'back_camera',
            'front_camera',
            'ram',
            'memory',
            'battery_capacity'
        );
        $conf = $request->only(
            'screen',
            'os',
            'back_camera',
            'front_camera',
            'ram',
            'memory',
            'battery_capacity'
        );
        try {
            $product = Product::findOrFail($id);
            $img_old = $product->avatar;
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                do {
                    $name = str_random(4) . '-' . $file->getClientOriginalName();
                }while (
                    file_exists(config('app.imageUrl') . '/' . $name)
                );
                if(file_exists(config('app.imageUrl') . '/' . $img_old))
                    unlink(config('app.imageUrl') . '/' .$img_old);
                $file->move(config('app.imageUrl'), $name);
                $result['avatar'] = $name;
            } else {
               $result['avatar'] = $img_old;
            }
            $result = array_merge($result, [
                'price' => floatval(str_replace(',', '', $request->price)),
                'discount' => floatval(str_replace(',', '', $request->discount))
            ]);
            $product->update($result);
            $product->configuration->update($conf);   
            if ($request->hasFile('image_id')) {
                $listImageOld = $product->images->pluck('image_link')->toArray();
                $product->images()->delete();
                foreach ($listImageOld as $key => $value) {
                    if (file_exists(config('app.imageUrl') . '/' . $value))
                        unlink(config('app.imageUrl') . '/' . $value);
                }
                $file = $request->file('image_id');
                foreach ($file as $key => $value) {
                    do {
                        $name = str_random(4) . '-' . $value->getClientOriginalName();
                    }while (
                        file_exists(config('app.imageUrl') . '/' .$name)
                    );
                    $value->move(config('app.imageUrl'), $name);
                    $listImage[]['image_link'] = $name;
                }
                foreach ($listImage as $key => $value) {
                    $product->images()->create($value);
                }
            
            }

            return redirect()->route('product.index')->with('success', __('Cập nhật thành công'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(Request $request)
    {
        try {
            $product = Product::findOrFail($request->id);
            $product->delete();

            return response()->json('ok');
        } catch (ModelNotFoundException $e) {
            return response()->json('fail');
        }
    }

    public function delMulProd(Request $request)
    {
        try {
            Product::destroy($request->allVals);

            return response()->json('ok');
        } catch (ModelNotFoundException $e) {
            return response()->json('fail');
        }
    }

    public function restore()
    {
        Product::withTrashed()->restore();

        return redirect()->route('product.index')->with('success', __('Khôi phục lại các sản phẩm đã xóa'));
    }

}
