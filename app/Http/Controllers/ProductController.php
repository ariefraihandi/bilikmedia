<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestDownload;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Ad;
use App\Models\Credit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

class ProductController extends Controller
{
    public function showAllProduct()
    {
        $userDetail = null;
        if (Auth::check()) {
            $user = Auth::user();
            $userDetail = $user->userDetail;

            if ($userDetail) {
                Credit::where('user_id', $user->id)
                    ->where('is_expires', true)
                    ->where('expires_at', '<', now())
                    ->update(['credit_amount' => 0]);

                $totalCredit = Credit::where('user_id', $user->id)
                                    ->sum('credit_amount');

                $userDetail->kredit = $totalCredit;
                $userDetail->save();
            }
        }

        $categories = ProductCategory::withCount('products')
            ->orderBy('products_count', 'desc')
            ->take(10)
            ->get();

        $products = Product::withCount(['downloads', 'ratings'])
            ->withAvg('ratings', 'rating')
            ->paginate(9);

        $ratingCounts = [
            'viewAll' => Product::count(), // Semua produk
            'oneStar' => Product::whereHas('ratings', function ($query) {
                $query->where('rating', '>=', 1);
            })->count(),
            'twoStar' => Product::whereHas('ratings', function ($query) {
                $query->where('rating', '>=', 2);
            })->count(),
            'threeStar' => Product::whereHas('ratings', function ($query) {
                $query->where('rating', '>=', 3);
            })->count(),
            'fourStar' => Product::whereHas('ratings', function ($query) {
                $query->where('rating', '>=', 4);
            })->count(),
            'fiveStar' => Product::whereHas('ratings', function ($query) {
                $query->where('rating', '=', 5);
            })->count(),
        ];

        $data = [
            'title' => 'Product',
            'products' => $products,
            'categories' => $categories,
            'ratingCounts' => $ratingCounts, 
            'userDetail' => $userDetail,
        ];

        return view('Product.product', $data);
    }

    public function showProductByCategory($slug)
    {
        $userDetail = null;
        if (Auth::check()) {
            $user = Auth::user();
            $userDetail = $user->userDetail;

            if ($userDetail) {
                Credit::where('user_id', $user->id)
                    ->where('is_expires', true)
                    ->where('expires_at', '<', now())
                    ->update(['credit_amount' => 0]);

                $totalCredit = Credit::where('user_id', $user->id)
                                    ->sum('credit_amount');

                $userDetail->kredit = $totalCredit;
                $userDetail->save();
            }
        }

        $category = ProductCategory::where('slug', $slug)->firstOrFail();
    
        $products = Product::whereHas('categories', function($query) use ($category) {$query->where('product_category.id', $category->id);})
            ->withCount(['downloads', 'ratings'])
            ->withAvg('ratings', 'rating')
            ->paginate(9);
    
        $categories = ProductCategory::withCount('products')
            ->orderBy('products_count', 'desc')
            ->take(10)
            ->get();

        $ratingCounts = [
            'viewAll' => Product::count(), // Semua produk
            'oneStar' => Product::whereHas('ratings', function ($query) {
                $query->where('rating', '>=', 1);
            })->count(),
            'twoStar' => Product::whereHas('ratings', function ($query) {
                $query->where('rating', '>=', 2);
            })->count(),
            'threeStar' => Product::whereHas('ratings', function ($query) {
                $query->where('rating', '>=', 3);
            })->count(),
            'fourStar' => Product::whereHas('ratings', function ($query) {
                $query->where('rating', '>=', 4);
            })->count(),
            'fiveStar' => Product::whereHas('ratings', function ($query) {
                $query->where('rating', '=', 5);
            })->count(),
        ];
    
        $data = [
            'title' => 'Product by Category: ' . $category->name,
            'products' => $products,
            'categories' => $categories,
            'currentCategory' => $category,
            'ratingCounts' => $ratingCounts, 
            'userDetail' => $userDetail,
        ];
    
        // Menampilkan view dengan data yang dikirim
        return view('Product.product', $data);
    }

    public function filterByRating($rating)
    {
        $userDetail = null;
        if (Auth::check()) {
            $user = Auth::user();
            $userDetail = $user->userDetail;

            if ($userDetail) {
                Credit::where('user_id', $user->id)
                    ->where('is_expires', true)
                    ->where('expires_at', '<', now())
                    ->update(['credit_amount' => 0]);

                $totalCredit = Credit::where('user_id', $user->id)
                                    ->sum('credit_amount');

                $userDetail->kredit = $totalCredit;
                $userDetail->save();
            }
        }

        // Ambil 10 kategori dengan jumlah produk terbanyak
        $categories = ProductCategory::withCount('products')
            ->orderBy('products_count', 'desc')
            ->take(10)
            ->get();

        // Ambil produk dengan rating yang sesuai (>= rating yang dipilih)
        $products = Product::whereHas('ratings', function ($query) use ($rating) {
                $query->where('rating', '>=', $rating);
            })
            ->withCount(['downloads', 'ratings']) // Hitung jumlah download dan rating
            ->withAvg('ratings', 'rating') // Ambil rata-rata rating
            ->paginate(9); // Pagination untuk produk

        // Menghitung jumlah produk untuk setiap filter rating
        $ratingCounts = [
            'viewAll' => Product::count(), // Semua produk
            'oneStar' => Product::whereHas('ratings', function ($query) {
                $query->where('rating', '=', 1);
            })->count(),
            'twoStar' => Product::whereHas('ratings', function ($query) {
                $query->where('rating', '=', 2);
            })->count(),
            'threeStar' => Product::whereHas('ratings', function ($query) {
                $query->where('rating', '=', 3);
            })->count(),
            'fourStar' => Product::whereHas('ratings', function ($query) {
                $query->where('rating', '=', 4);
            })->count(),
            'fiveStar' => Product::whereHas('ratings', function ($query) {
                $query->where('rating', '=', 5);
            })->count(),
        ];

        // Data yang ingin dikirim ke view
        $data = [
            'title' => 'Product',
            'products' => $products, // Data produk yang difilter berdasarkan rating
            'categories' => $categories, // Data kategori
            'ratingCounts' => $ratingCounts, // Jumlah produk untuk setiap rating
            'userDetail' => $userDetail,
        ];

        // Mengirim data ke view 'Product.product'
        return view('Product.product', $data);
    }
    
    public function showProductDetails($slug)
    {
        $userDetail = null;
        if (Auth::check()) {
            $user = Auth::user();
            $userDetail = $user->userDetail;

            if ($userDetail) {
                Credit::where('user_id', $user->id)
                    ->where('is_expires', true)
                    ->where('expires_at', '<', now())
                    ->update(['credit_amount' => 0]);

                $totalCredit = Credit::where('user_id', $user->id)
                                    ->sum('credit_amount');

                $userDetail->kredit = $totalCredit;
                $userDetail->save();
            }
        }
        
        // Cari produk berdasarkan slug di database
        $product = Product::where('slug', $slug)->firstOrFail();
    
        // Pisahkan string additions menjadi array
        $additions = explode(',', $product->additions);
        $features = explode(',', $product->features);
        $tags = explode(',', $product->tags);
    
        // Ambil kategori produk (jika ada lebih dari satu, ambil yang pertama)
        $category = $product->categories()->first();
    
        $downloadCount      = $product->downloads()->count();
        $relatedProducts    = Product::whereHas('categories', function ($query) use ($category) {$query->where('category_id', $category->id);})
                              ->where('id', '!=', $product->id)
                              ->limit(9)
                              ->get();
       
        $bannerAd           = Ad::where('name', 'banner')->first();
        $socialAd           = Ad::where('name', 'social')->first();
        $smallAd           = Ad::where('name', 'small')->first();
        $petakAd           = Ad::where('name', 'petak')->first();
        $besarAd           = Ad::where('name', 'besar')->first();
    
    
        // Membuat array data untuk dikirim ke view
        $data = [
            'title' => $product->title,    // Mengambil title dari produk
            'description' => $product->description,    // Mengambil title dari produk
            'product' => $product,         // Mengirim seluruh data produk
            'category' => $category,       // Mengirim satu kategori yang dipilih
            'downloadCount' => $downloadCount,  // Mengirim jumlah download
            'additions' => $additions,    // Mengirim daftar additions yang dipisahkan
            'tags' => $tags,
            'features' => $features,
            'relatedProducts' => $relatedProducts, 
            'bannerAd'      => $bannerAd,     
            'socialAd'      => $socialAd, 
            'smallAd'      => $smallAd, 
            'petakAd'      => $petakAd, 
            'besarAd'      => $besarAd, 
            'userDetail' => $userDetail,
        ];
    
        // Return view dan kirim data
        return view('Product.productDetail', $data);
    }
    
    public function searchProducts(Request $request)
{
    // Ambil input pencarian
    $search = $request->input('search');

    // Jika input mengandung "freepik", lakukan pembersihan dengan strtok untuk memotong dari tanda # atau ?
    if (stripos($search, 'freepik') !== false) {
        $cleanedSearch = strtok($search, '#?');
    } else {
        // Hapus query string jika ada (misalnya ?epik=...)
        $cleanedSearch = explode('?', $search)[0];

        // Lakukan pembersihan tambahan jika bukan freepik
        $cleanedSearch = preg_replace('/\/[a-z]{2}(?:-[a-z]{2})?\//i', '/', $cleanedSearch);
    }

    // Cari produk berdasarkan title atau url_source
    $products = Product::where('title', 'LIKE', "%{$cleanedSearch}%")
        ->orWhere('url_source', 'LIKE', "%{$cleanedSearch}%")
        ->with('categories')
        ->limit(10)
        ->get();

    if ($products->isEmpty()) {
        $categories = ProductCategory::where('name', 'LIKE', "%{$cleanedSearch}%")
            ->limit(10)
            ->get();

        return response()->json([
            'products' => [],
            'categories' => $categories
        ]);
    }

    // Kembalikan hasil dalam bentuk JSON
    return response()->json([
        'products' => $products,
        'categories' => []
    ]);
}


    public function showProduct()
    {
        $user           = Auth::user(); 
        $userDetail     = $user->userDetail;

        if ($user->role != 1) {
            Alert::error('Error', 'Forbidden Access.');           
            return redirect()->route('user.profile');
        }

        Credit::where('user_id', $user->id)->where('is_expires', true)->where('expires_at', '<', now())->update(['credit_amount' => 0]);

        $categories = ProductCategory::all();
    
        // Data yang ingin dikirim ke view dashboard
        $data = [
            'title' => 'Add Product | Bilik Media',
            'user' => $user,
            'userDetail' => $userDetail,
            'categories' => $categories,
        ];
    
        // Menampilkan view dashboard dengan data
        return view('Dashboard.product', $data);
    }

    public function showProductlist()
    {
        $user           = Auth::user(); 
        $userDetail     = $user->userDetail;

        if ($user->role != 1) {
            Alert::error('Error', 'Forbidden Access.');           
            return redirect()->route('user.profile');
        }

        Credit::where('user_id', $user->id)->where('is_expires', true)->where('expires_at', '<', now())->update(['credit_amount' => 0]);


        $data = [
            'title' => 'Product List | Bilik Media',
            'user' => $user,
            'userDetail' => $userDetail,
        ];
        return view('Dashboard.productList', $data);
    }
    
    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'nullable|string',
            'tags' => 'nullable|string',
            'types' => 'nullable|string',
            'additions' => 'nullable|string',
            'url_source' => 'nullable|url',
            'live_preview_url' => 'nullable|url',
            'url_download' => 'nullable|url',
            'category' => 'nullable|array',
            'category.*' => 'exists:product_category,id',
            // Hapus validasi fileUpload di sini
        ]);
    
        // Menambahkan default value untuk author dan author_url
        $validated['author'] = 'bilikmedia';
        $validated['author_url'] = 'https://bilikmedia.com/';
    
        DB::beginTransaction();
    
        try {
            // Menentukan nama gambar berdasarkan input radio
            $imageName = null;
            if ($request->has('envanto')) {
                $imageName = 'envato.png';
            } elseif ($request->has('freepik')) {
                $imageName = 'freepik.png';
            } elseif ($request->hasFile('fileUpload')) {
                // Jika upload file disediakan, gunakan file tersebut (jika masih ingin mengizinkan upload)
                // Hapus bagian ini jika tidak ingin mengizinkan upload
                $imageName = time() . '.' . $request->fileUpload->extension();
                $request->fileUpload->move(public_path('uploads/products'), $imageName);
            }
    
            $slug = Str::slug($validated['title']) . '-' . Str::random(5);
    
            $product = new Product();
            $product->title = $validated['title'];
            $product->slug = $slug;
            $product->description = $validated['description'];
            $product->features = $validated['features'];
            $product->tags = $validated['tags'];
            $product->types = $validated['types'];
            $product->additions = $validated['additions'];
            $product->author = $validated['author'];
            $product->author_url = $validated['author_url'];
            $product->url_source = $validated['url_source'];
            $product->live_preview_url = $validated['live_preview_url'];
            $product->url_download = $validated['url_download'];
            $product->image = $imageName;
            $product->save();
    
            if (isset($validated['category'])) {
                $product->categories()->sync($validated['category']);
            }
    
            if ($product->url_source) {
                $requestDownload = RequestDownload::where('url', $product->url_source)->first();
                if ($requestDownload) {
                    $requestDownload->status = 1;
                    $requestDownload->save();
                }
            }
    
            DB::commit();
            return redirect()->route('show.add.product')->with('success', 'Product Submitted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Error', 'Failed to submit product: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
    


    public function storeCategory(Request $request)
    {
        // Validasi input kategori
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:product_category,name',
        ]);

        // Simpan kategori baru ke database
        $category = ProductCategory::create([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name']),
        ]);

        // Return response JSON untuk AJAX
        return response()->json([
            'success' => true,
            'category' => $category
        ]);
    }

    public function getProductListData()
    {
        $products = Product::with('categories')->select('products.*');
        
        if (!$products->exists()) {
            // Jika data tidak ditemukan
            return response()->json([
                'error' => 'No products found'
            ]);
        }

        return DataTables::of($products)
            ->addColumn('categories', function ($product) {
                return $product->categories->pluck('name')->implode(', ');
            })
            ->make(true);
    }

}
