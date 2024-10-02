<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;




class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        return view('admin.view_category',compact('data'));
    }
    public function add_category(Request $request){
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        
    toastr()->closeButton()->Addsuccess('Your category has been restored.');
        
        return redirect()->back();
    }
    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        toastr()->closeButton()->Addsuccess(' category has been deleted.');
        return redirect()->back();
        
    }
    public function edit_category( $id){
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));
       }
       public function update_category( Request $request, $id){
        $data = Category::find($id);
        $data->category_name=$request->update_category;
        $data->save();
        return redirect('admin/view_category');
       }

       public function upload_product(){
        $data = Category::all();

        return view('admin.add_product',compact('data'));
       }

       public function add_product(Request $request){
         $data = new Product;
         $data->title = $request->title;
         $data->description = $request->description;
         $data->price = $request->price;
         $data->category = $request->category;
         $data->quantity = $request->quantity;
          
         $image = $request->image;
         if($image)
         {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
         }


         $data->save();
         toastr()->closeButton()->Addsuccess(' Product has been deleted.');
         return redirect()->back();
       }

       public function view_product(){
        $data = Product::paginate(3);
        return view('admin.view_product',compact('data'));
       }

       public function delete_product($id){
        $data = Product::find($id);
        $image_path= public_path('products/'.$data->image);
        if(file_exists($image_path))
        {
            unlink($image_path);
        }
        $data->delete();
        return redirect()->back();
       }

       public function update_product($id){
        $data = Product::find($id);
        return view ('admin.update_product',compact('data'));

       }

       public function edit_product(Request $request,$id){
        $data =Product::find($id);
        $data->title = $request->title;
        $data->description =$request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;
        if($image)
        {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imageName);
            $data->image = $imageName;

        }
        $data->save();
        toastr()->closeButton()->Addsuccess(' Product has been updated.');
        return redirect('admin/view_product');



       }

       public function search_product(Request $request){
        $search = $request->search;
        $data = Product::where('title','LIKE','%'.$search.'%')->orwhere('category','LIKE','%'.$search.'%')->paginate(3);
        return view('admin/view_product',compact('data'));

       }
       public function view_orders(){
        $data = Order::all();
        return view('admin.order',compact('data'));
       }
       public function otw($id){
        $data =Order::find($id);
        $data->status='ontheway';
        $data->save();
        return redirect()->back();

       }
       public function delivered($id){
        $data =Order::find($id);
        $data->status='delivered';
        $data->save();
        return redirect()->back();

       }
       public function pdf($id){
        $data= Order::find($id);
        $pdf = Pdf::loadView('admin.invoice',compact('data'));
        return $pdf->download('invoice.pdf');
       }

}
