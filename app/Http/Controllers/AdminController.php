<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\bill_product;
use App\Models\Comment;
use App\Models\Manufacture;
use App\Models\Product;
use App\Models\Protype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class AdminController extends Controller
{
    function show_products()
    {
        $products = Product::all();
        return view('admin.products', ['data' => $products]);
    }
    function show_add_product()
    {
        return view('admin.addproduct');
    }
    function show_edit_product($id)
    {
        $product = Product::where('product_id', $id)->first();
        return view('admin.editproduct', ['product' => $product]);
    }
    function add_product(Request $request)
    {
        if (isset($_FILES['fileupload']['name']) && strlen($_FILES['fileupload']['name']) > 0) {
            $target_dir = public_path('img/');
            $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if ($_FILES["fileupload"]["size"] > 10000000) {// Check file size
                return redirect()->back()->with('status', 'Sorry, your file is too large.(' . $_FILES["fileupload"]["size"] . ')');
            }
            if (// Allow certain file formats
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                return redirect()->back()->with('status', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
            }
        }
        $name = trim($request->name);
        $manu_id = $request->manu_id;
        $type_id = $request->type_id;
        $price = $request->price;
        $sale = $request->sale;
        $description = $request->description;
        $feature = $request->feature;
        $image = $_FILES['fileupload']['name'];

        Product::insert([
            'product_name' => $name,
            'product_price' => $price,
            'product_description' => $description,
            'product_feature' => $feature,
            'product_sale' => $sale,
            'manu_id' => $manu_id,
            'type_id' => $type_id,
            'product_image' => $image
        ]);
        move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file);
        return redirect()->route('products')->with('status', 'Add database successful.');
        
    }

    function edit_product(Request $request)
    {
        if (isset($_FILES['fileupload']['name']) && strlen($_FILES['fileupload']['name']) > 0) {
            $target_dir = public_path('img/');
            $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if ($_FILES["fileupload"]["size"] > 10000000) {// Check file size
                return redirect()->back()->with('status', 'Sorry, your file is too large.(' . $_FILES["fileupload"]["size"] . ')');
            }
            if (// Allow certain file formats
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                return redirect()->back()->with('status', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
            }
        }
        $id = $request->id;
        $name = trim($request->name);
        $manu_id = $request->manu_id;
        $type_id = $request->type_id;
        $price = $request->price;
        $sale = $request->sale;
        $description = $request->description;
        $feature = $request->feature;
        $image = "";
        if (strlen($_FILES['fileupload']['name']) > 0) {
            $image = $_FILES['fileupload']['name'];
        } else {
            $image = $request->image_old;
        }

        Product::where('product_id', $id)->update([
            'product_name' => $name,
            'product_price' => $price,
            'product_description' => $description,
            'product_feature' => $feature,
            'product_sale' => $sale,
            'manu_id' => $manu_id,
            'type_id' => $type_id,
            'product_image' => $image
        ]);
        if (strlen($_FILES['fileupload']['name']) > 0) {
            move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file);
        }
        return redirect()->back()->with('status', 'Edit database successful.');
    }
    function delete_product($id)
    {
        Product::where('product_id', $id)->delete();
        return redirect()->back()->with('status', 'Delete database successful.');
    }
    function show_comment_product_id($id)
    {
        $comments = Product::find($id)->comments;
        return view('admin.comments', ['comments' => $comments]);
    }
    function remove_comment($id)
    {
        Comment::find($id)->delete();
        return Redirect()->back()->with('status', 'Delete database successful.');
    }




    function show_protypes()
    {
        $protypes = Protype::all();
        return view('admin.protypes', ['data' => $protypes]);
    }
    function show_add_protype()
    {
        return view('admin.addprotype');
    }
    function show_edit_protype($id)
    {
        if (count(Protype::where('type_id', $id)->get()) > 0){
            $protype = Protype::find($id)->first();
            return view('admin.editprotype', ['protype' => $protype]);
        }
        return Redirect()->back();
    }
    function add_protype(Request $request)
    {
        $type_name = $request->type_name;
        Protype::insert([
            'type_name' => $type_name
        ]);
        return redirect()->route('protypes')->with('status', 'Add database successful.');
    }
    function edit_protype(Request $request)
    {
        $id = $request->type_id;
        $type_name = $request->type_name;
        Protype::where('type_id', $id)->update([
            'type_name' => $type_name
        ]);
        return redirect()->back()->with('status', 'Edit database successful.');
    }
    function delete_protype($type_id)
    {
        if (count(Product::where('type_id', $type_id)->get()) > 0) {
            return Redirect()->back()->with('status', 'Delete data failed, because there are products in this table.');
        } else {
            Protype::find($type_id)->delete();
            return Redirect()->back()->with('status', 'Delete database successful.');
        }
    }


    function show_manufactures()
    {
        $manufactures = Manufacture::all();
        return view('admin.manufactures', ['data' => $manufactures]);
    }
    function show_add_manufacture()
    {
        return view('admin.addmanufacture');
    }
    function show_edit_manufacture($id)
    {
        $manufacture = Manufacture::where('manu_id', $id)->first();
        return view('admin.editmanufacture', ['manufacture' => $manufacture]);
    }
    function add_manufacture(Request $request)
    {
        $manu_name = $request->manu_name;
        Manufacture::insert([
            'manu_name' => $manu_name
        ]);
        return redirect()->route('manufactures')->with('status', 'Add database successful.');
    }
    function edit_manufacture(Request $request)
    {
        $id = $request->manu_id;
        $manu_name = $request->manu_name;
        Manufacture::where('manu_id', $id)->update([
            'manu_name' => $manu_name
        ]);
        return redirect()->back()->with('status', 'Edit database successful.');
    }
    function delete_manufacture($manu_id)
    {
        if (count(Product::where('manu_id', $manu_id)->get()) > 0) {
            return Redirect()->back()->with('status', 'Delete data failed, because there are products in this table.');
        } else {
            Manufacture::find($manu_id)->delete();
            return Redirect()->back()->with('status', 'Delete database successful.');
        }
    }





    function show_bills()
    {
        $bills = Bill::all();
        return view('admin.bills', ['data' => $bills]);
    }
    function billbyid($id)
    {
        if (count(Bill::where('id', $id)->get()) == 1) {
            $bill = Bill::find($id);
            return view('admin.billdetail', ['bill' => $bill]);
        }
        return view('');
    }
    function confirm_bill($id)
    {
        Bill::where('id', $id)->update([
            'confirm' => 1
        ]);
        return Redirect()->back()->with('status', 'successful confirmation.');
    }
    function unconfirmed($id)
    {
        Bill::where('id', $id)->update([
            'confirm' => 0
        ]);
        return Redirect()->back()->with('status', 'successfully unconfirmed.');
    }
    function remove_bill($id)
    {
        bill_product::where('bill_id', $id)->delete();
        Bill::where('id', $id)->delete();
        return redirect()->route('admin.bills')->with('status', 'Delete database successful.');
    }
}
