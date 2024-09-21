<?php

namespace App\Http\Controllers;

use App\Models\StoreProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreProductController extends Controller
{
    //Displays options for managing store products.
    public function manageStoreProducts($id, /*$storeName*/)
    {
        //$formattedStoreName = formatStoreNameForUrl($storeName);
        return view('/store_products/store_options', compact('id'/*, 'storeName'*/));
    }

    //List all the products registered at the store.
    public function listSetStoreProducts($id)
    {
        $storeProducts = DB::select(
            "SELECT sp.id, sp.product_id, prod.product_name, brand.brand_name, prod.product_description,
            replace(product_measurement::text, '.', ',') as product_measurement, prod.product_unity_measurement,
            pack.package_name, sec.section_name, to_char(sp.product_price, '999D99') as product_price
            FROM stores_products sp
            JOIN products prod ON prod.id = sp.product_id
            JOIN brands brand ON brand.id = prod.brand_id
            JOIN packages pack ON pack.id = prod.package_id
            JOIN sections sec ON sec.id = prod.section_id WHERE sp.store_id = ?", [$id]
        );
        return view('/store_products/store_products', compact('storeProducts', 'id'));
    }

    //List all the products that are not registered at the store.
    public function listAddStoreProduct($id)
    {
        $productsToRegisterAtStore = DB::select(
            "SELECT prod.id, prod.product_name, brand.brand_name, prod.product_description,
            replace(prod.product_measurement::text, '.', ',') product_measurement,
            prod.product_unity_measurement, pack.package_name, sec.section_name FROM products prod
            JOIN brands brand ON brand.id = prod.brand_id
            JOIN packages pack ON pack.id = prod.package_id
            JOIN sections sec ON sec.id = prod.section_id
            LEFT JOIN stores_products sp ON prod.id = sp.product_id AND sp.store_id = ?
            WHERE sp.product_id IS NULL", [$id]);
        return view('/store_products/store_products_to_register', compact('productsToRegisterAtStore', 'id'));
    }

    //Receives the selected products and adds them to the store.
    public function addStoreProduct(Request $request)
    {
        $products = $request->input('addProducts', []);
        $storeId = $request->input('store_id');
        foreach ($products as $product => $dataProduct) {
            if (isset($dataProduct['selected'])) {
                $storeProduct = new StoreProduct();
                $storeProduct->store_id = $storeId;
                $storeProduct->product_id = $dataProduct['selected'];
                $storeProduct->product_price = isset($dataProduct['price']) ? $dataProduct['price'] : null;
                $storeProduct->save();
            }
        }
        return redirect('/admin/gerenciar-estoque/' . $storeId);
    }

    //Displays the details of the selected product for updating
    public function fomrSetSetoreProduct($storeId, $productId)
    {
        $product = DB::table('products')->select('products.product_img', 'products.product_name', 'brands.brand_name', 'products.product_description',
            DB::raw("REPLACE(products.product_measurement::text, '.', ',') as product_measurement"),
            'products.product_unity_measurement', 'packages.package_name', 'sections.section_name', 'stores_products.product_price',
            'stores_products.store_id', 'stores_products.product_id', 'stores_products.id')->join('brands', 'brands.id', '=',
            'products.brand_id')->join('packages', 'packages.id', '=', 'products.package_id')->join('sections', 'sections.id', '=',
            'products.section_id')->join('stores_products', 'stores_products.product_id', '=', 'products.id')->where('stores_products.product_id',
            $productId)->where('stores_products.store_id', $storeId)->first();
        return view('/store_products/store_set_product', compact('product'));
    }

    //Receives the data for updating the product.
    public function setSetoreProduct(Request $request)
    {
        $id = $request->input('storeProductId');
        $price = $request->input('price');
        $storeId = $request->input('storeId');
        $setProduct = StoreProduct::find($id);
        $setProduct->product_price = $price;
        $setProduct->save();
        return redirect('/admin/editar-produto-estabelecimento/' . $storeId);
    }

    //Removes the product from the store
    public function deleteProductStore($storeId, $id)
    {
        $deleteProduct = StoreProduct::find($id);
        $deleteProduct->delete();
        return redirect('/admin/editar-produto-estabelecimento/' . $storeId);
    }

    public function getProductsStore($id)
    {
        $products = DB::select(
            "SELECT sp.id, sp.product_id, prod.product_name, brand.brand_name, prod.product_description,
            replace(product_measurement::text, '.', ',') as product_measurement, prod.product_unity_measurement,
            pack.package_name, sec.section_name, to_char(sp.product_price, '999D99') as product_price
            FROM stores_products sp
            JOIN products prod ON prod.id = sp.product_id
            JOIN brands brand ON brand.id = prod.brand_id
            JOIN packages pack ON pack.id = prod.package_id
            JOIN sections sec ON sec.id = prod.section_id WHERE sp.store_id = ?", [$id]);
        return view('/store_products/show_products_store', compact('products'));
    }
}