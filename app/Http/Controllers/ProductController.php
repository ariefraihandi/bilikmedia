<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB; // Import DB untuk transaksi
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

class ProductController extends Controller
{
    public function showAllProduct()
    {
        // Mengambil semua kategori dengan jumlah produk terkait
        $categories = ProductCategory::withCount('products')->get();
    
        // Mengambil produk dengan pagination (misalnya 9 produk per halaman)
        $products = Product::withCount('downloads')->paginate(9);
    
        // Data yang ingin dikirim ke view
        $data = [
            'title' => 'Product',
            'products' => $products, // Mengirim data produk yang sudah dipaginate
            'categories' => $categories, // Mengirim data kategori dan jumlah produk
        ];
    
        // Menampilkan view dengan data yang dikirim
        return view('Product.product', $data);
    }

    public function showProductByCategory($slug)
    {
        // Mengambil kategori berdasarkan slug
        $category = ProductCategory::where('slug', $slug)->firstOrFail();

        // Mengambil produk berdasarkan kategori
        $products = Product::whereHas('categories', function($query) use ($category) {
            $query->where('product_category.id', $category->id);
        })
        ->withCount('downloads') // Menghitung jumlah unduhan untuk setiap produk
        ->paginate(9);

        // Mengambil semua kategori dengan jumlah produk terkait
        $categories = ProductCategory::withCount('products')->get();

        // Data yang ingin dikirim ke view
        $data = [
            'title' => 'Product by Category: ' . $category->name,
            'products' => $products, // Mengirim data produk yang sudah difilter berdasarkan kategori
            'categories' => $categories, // Mengirim data kategori dan jumlah produk
            'currentCategory' => $category, // Kategori yang sedang dipilih
        ];

        // Menampilkan view dengan data yang dikirim
        return view('Product.product', $data);
    }

    public function showProductDetails($slug)
    {
        // Cari produk berdasarkan slug di database
        $product = Product::where('slug', $slug)->firstOrFail();
    
        // Pisahkan string additions menjadi array
        $additions = explode(',', $product->additions);
        $features = explode(',', $product->features);
        $tags = explode(',', $product->tags);
    
        // Ambil kategori produk (jika ada lebih dari satu, ambil yang pertama)
        $category = $product->categories()->first();
    
        // Hitung jumlah download untuk produk ini
        $downloadCount = $product->downloads()->count();
        $relatedProducts = Product::whereHas('categories', function ($query) use ($category) {
            $query->where('category_id', $category->id);
        })
        ->where('id', '!=', $product->id) // Exclude current product
        ->limit(9) // Batasi hasilnya hingga 9 produk
        ->get();
    
    
        // Membuat array data untuk dikirim ke view
        $data = [
            'title' => $product->title,    // Mengambil title dari produk
            'product' => $product,         // Mengirim seluruh data produk
            'category' => $category,       // Mengirim satu kategori yang dipilih
            'downloadCount' => $downloadCount,  // Mengirim jumlah download
            'additions' => $additions,    // Mengirim daftar additions yang dipisahkan
            'tags' => $tags,    // Mengirim daftar additions yang dipisahkan
            'features' => $features,
            'relatedProducts' => $relatedProducts
        ];
    
        // Return view dan kirim data
        return view('Product.productDetail', $data);
    }
    
    public function searchProducts(Request $request)
    {
        // Ambil input pencarian
        $search = $request->input('search');

        // Cari produk berdasarkan title atau url_source
        $products = Product::where('title', 'LIKE', "%{$search}%")
            ->orWhere('url_source', 'LIKE', "%{$search}%")
            ->with('categories') // Ambil kategori produk
            ->limit(10) // Batasi hasil ke 10 item
            ->get();

        // Jika produk tidak ditemukan, cari berdasarkan kategori
        if ($products->isEmpty()) {
            $categories = ProductCategory::where('name', 'LIKE', "%{$search}%")
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
        // Mengambil semua kategori dari tabel product_category
        $categories = ProductCategory::all();
    
        // Data yang ingin dikirim ke view dashboard
        $data = [
            'title' => 'Product',
            'categories' => $categories,
        ];
    
        // Menampilkan view dashboard dengan data
        return view('Dashboard.product', $data);
    }

    public function showProductlist()
    {
        $data = [
            'title' => 'Product List',
        ];
        return view('Dashboard.productList', $data);
    }
    
    public function storeProduct(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'nullable|string',
            'tags' => 'nullable|string',
            'types' => 'nullable|string',
            'additions' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'author_url' => 'nullable|url',
            'url_source' => 'nullable|url',
            'live_preview_url' => 'nullable|url',
            'url_download' => 'nullable|url', // Validasi untuk url_download
            'category' => 'nullable|array', // Kategori harus array
            'category.*' => 'exists:product_category,id', // Validasi setiap kategori harus ada di database
            'fileUpload' => 'nullable|image|mimes:webp,jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Menggunakan transaksi untuk memastikan rollback jika terjadi error
        DB::beginTransaction();
    
        try {
            // Proses upload file gambar
            $imageName = null;
            if ($request->hasFile('fileUpload')) {
                $imageName = time() . '.' . $request->fileUpload->extension();
                $request->fileUpload->move(public_path('uploads/products'), $imageName);
            }
    
            // Generate slug dari title dan tambahkan 5 karakter acak
            $slug = Str::slug($validated['title']) . '-' . Str::random(5);
    
            // Menyimpan data produk ke database
            $product = new Product();
            $product->title = $validated['title'];
            $product->slug = $slug; // Simpan slug yang dihasilkan
            $product->description = $validated['description'];
            $product->features = $validated['features'];
            $product->tags = $validated['tags'];
            $product->types = $validated['types'];
            $product->additions = $validated['additions'];
            $product->author = $validated['author'];
            $product->author_url = $validated['author_url'];
            $product->url_source = $validated['url_source'];
            $product->live_preview_url = $validated['live_preview_url'];
            $product->url_download = $validated['url_download']; // Simpan url_download
            $product->image = $imageName;
            $product->save();
    
            // Menyimpan kategori (relasi many-to-many)
            if (isset($validated['category'])) {
                $product->categories()->sync($validated['category']); // Menghubungkan kategori dengan produk
            }
    
            // Commit transaksi jika semua berhasil
            DB::commit();
    
            // Jika berhasil, tampilkan alert sukses
            Alert::success('Submitted', 'New Product Submitted!');
            return redirect()->route('show.add.product')->with('success', 'Product saved successfully!');
    
        } catch (\Exception $e) {
            // Rollback semua perubahan jika terjadi error
            DB::rollBack();
    
            // Jika gagal, tampilkan alert error
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
