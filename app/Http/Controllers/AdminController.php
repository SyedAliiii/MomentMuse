<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Blogs;
use App\Models\Testimonial;
use App\Models\Portfolio;
use App\Models\Contact;
use App\Models\Items;
use App\Models\Services;
use App\Models\Quotations;
use App\Models\Includes;

class AdminController extends Controller
{
    public function dashboard()
    {
        $admin = Admin::where('id', session("admin"))->first();
        $blogs = Blogs::orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        $testimonial = Testimonial::orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        $contact = Contact::orderBy('created_at', 'desc')
            ->take(4)
            ->get();


        return view('Admin.Dashboard', [
            'admin' => $admin,
            'blogs' => $blogs,
            'testimonial' => $testimonial,
            'contact' => $contact,
        ]);
    }
    

    public function blogUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'blog' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        try {
            // Find the existing blog post
            $blog = Blogs::findOrFail($id);

            // Update blog data
            $blog->name = $request->input('name');
            $blog->title = $request->input('title');
            $blog->blog = $request->input('blog');

            // Handle image upload if a new image is provided
            if ($request->hasFile('image')) {
                // Delete the old image if exists
                if ($blog->image) {
                    $oldImagePath = public_path('images/blogs/' . $blog->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Upload the new image
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/blogs'), $imageName);
                $blog->image = $imageName;
            }

            // Save the updated blog post
            $blog->save();

            return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the blog.');
        }
    }
    public function blogs()
    {
        $admin = Admin::where('id', session("admin"))->first();
        $blogs = Blogs::orderBy('created_at', 'desc')
                // ->take(2)
                ->get();

        $testimonial = Testimonial::orderBy('created_at', 'desc')
                ->get();

        // dd($blogs);
        return view('Admin.Pages.Blogs', [
            'admin' => $admin,
            'blogs' => $blogs,
            'testimonial' => $testimonial,
        ]);
    }
    public function blogsCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'blog' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/blogs'), $imageName);
                $data['image'] = $imageName;
            }

            Blogs::create($data);

            return redirect()->back()->with('success', 'Blog created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the blog.');
        }
    }
    public function deleteBlog(Blogs $blog)
    {
        try {
            if ($blog->image && file_exists(public_path('images/blogs/' . $blog->image))) {
                unlink(public_path('images/blogs/' . $blog->image));
            }

            $blog->delete();

            return redirect()->back()->with('success', 'Blog deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the blog.');
        }
    }
    public function contentEdit($id)
    {
        $admin = Admin::where('id', session("admin"))->first();
        $data = Blogs::find($id);
        if (!$data) {
            return redirect()->back()->with('error', 'Blog post not found.');
        }
        return view('Admin.Pages.Edit', [
            'data' => $data,
            'admin' => $admin,
        ]);
    }



    public function testimonialCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/testimonials'), $imageName);
                $data['profile_pic'] = $imageName; // Assign the correct key here
            }
            

            Testimonial::create($data);

            return redirect()->back()->with('success', 'testimonial created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the testimonial.');
        }
    }
    public function editTestimonial($id)
    {
        $admin = Admin::where('id', session("admin"))->first();
        $data = Testimonial::find($id);
        if (!$data) {
            return redirect()->back()->with('error', 'Blog post not found.');
        }
        return view('Admin.Pages.EditTestimonial', [
            'data' => $data,
            'admin' => $admin
        ]);
    }
    public function deleteTestimonial(Testimonial $testimonial)
    {
        try {
            if ($testimonial->image && file_exists(public_path('images/testimonials/' . $testimonial->image))) {
                unlink(public_path('images/testimonials/' . $testimonial->image));
            }

            $testimonial->delete();

            return redirect()->back()->with('success', 'testimonial deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the testimonial.');
        }
    }
    public function testimonialUpdate(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Find the existing blog post
            $testimonial = Testimonial::findOrFail($id);

            // Update testimonial data
            $testimonial->name = $request->input('name');
            $testimonial->message = $request->input('message');

            // Handle image upload if a new image is provided
            if ($request->hasFile('image')) {
                // Delete the old image if exists
                if ($testimonial->image) {
                    $oldImagePath = public_path('images/testimonials/' . $testimonial->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Upload the new image
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/testimonials'), $imageName);
                $testimonial->profile_pic = $imageName;
            }

            // Save the updated testimonial post
            $testimonial->save();

            return redirect()->route('admin.blogs')->with('success', 'testimonial updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the testimonial.');
        }
    }





    public function portfolios()
    {
        $admin = Admin::where('id', session("admin"))->first();
        $portfolios = Portfolio::orderBy('created_at', 'desc')
                ->get();
        return view('Admin.Pages.Portfolios', [
            'admin' => $admin,
            'portfolios' => $portfolios]);
    }
    public function portfoliosCreate(Request $request)
    {
        $request->validate([
            'title' => 'string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/portfolios'), $imageName);
                $data['path'] = $imageName;
            }
            

            Portfolio::create($data);

            return redirect()->back()->with('success', 'portfolio created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the portfolio.');
        }
    }
    public function editPortfolios($id)
    {
        $data = Portfolio::find($id);
        if (!$data) {
            return redirect()->back()->with('error', 'Blog post not found.');
        }
        return view('Admin.Pages.Editportfolios', [
            'data' => $data,
            'admin' => Admin::where('id', session("admin"))->first()
        ]);
    }
    public function portfoliosUpdate(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Find the existing blog post
            $portfolio = Portfolio::findOrFail($id);

            // Update portfolio data
            $portfolio->title = $request->input('title');

            // Handle image upload if a new image is provided
            if ($request->hasFile('image')) {
                // Delete the old image if exists
                if ($portfolio->image) {
                    $oldImagePath = public_path('images/portfolios/' . $portfolio->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Upload the new image
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/portfolios'), $imageName);
                $portfolio->path = $imageName;
            }

            // Save the updated portfolio post
            $portfolio->save();

            return redirect()->route('admin.portfolios')->with('success', 'portfolio updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the portfolio.');
        }
    }
    public function deletePortfolios(portfolio $portfolio)
    {
        try {
            if ($portfolio->image && file_exists(public_path('images/portfolios/' . $portfolio->image))) {
                unlink(public_path('images/portfolios/' . $portfolio->image));
            }

            $portfolio->delete();

            return redirect()->back()->with('success', 'portfolio deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the portfolio.');
        }
    }



    public function contacts()
    {
        $admin = Admin::where('id', session("admin"))->first();

        $contact = Contact::orderBy('created_at', 'desc')
            ->get();
        return view('Admin.Pages.Contacts', [
            'admin' => $admin,
            'contact' => $contact
        ]);
    }


    
    public function items()
    {
        $admin = Admin::where('id', session("admin"))->first();

        $items = Items::orderBy('created_at', 'desc')
            ->get();
        return view('Admin.Pages.Items', [
            'admin' => $admin,
            'items' => $items
        ]);
    }
    public function itemsCreate(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ],);

        try {
            $payload = [
                'name' => $request->title,
                'description' => $request->description
            ];

            $item = Items::create($payload);

            return redirect()->back()->with('success', 'Items created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the Items.');
        }
    }
    public function deleteItems(Items $items)
    {
        try {
            $isReferenced = Includes::where('items_id', $items->id)->exists();
            if ($isReferenced) {
                return redirect()->back()->with('error', 'This item is referenced in the include table. Please remove the references before deleting.');
            }
            $items->delete();
    
            return redirect()->back()->with('success', 'Item deleted successfully!');
        } catch (\Exception $e) {
            \Log::error('Error deleting item: ' . $e->getMessage());
    
            return redirect()->back()->with('error', 'An error occurred while deleting the item: ' . $e->getMessage());
        }
    }
    

    


    public function services()
    {
        $admin = Admin::where('id', session("admin"))->first();
        $services = Services::all();
        $items = Items::orderBy('created_at', 'desc')
            ->get();

        return view('Admin.Pages.Services', [
            'admin' => $admin,
            'items' => $items,
            'services' => $services
        ]);
    }
    public function servicesCreate(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'currency_code' => 'required|string|max:5',
                'price' => 'required|numeric',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'items' => 'required|array',
                'items.*' => 'integer|exists:items,id',
            ]);

            $service = new Services();
            $service->title = $validatedData['title'];
            $service->currency_code = $validatedData['currency_code'];
            $service->price = $validatedData['price'];
            $service->description = $validatedData['description'];

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('services', 'public');
                $service->image = $imagePath;
            }

            $service->save();

            $service->items()->attach($validatedData['items']);

            return redirect()->route('admin.services')->with('success', 'Service created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'An error occurred while creating the service: ' . $e->getMessage());
        }
    }

    public function serviceEdit($id)
    {
        $data = Services::find($id);
        if (!$data) {
            return redirect()->back()->with('error', 'Service post not found.');
        }
        return view('Admin.Pages.serviceEdit', [
            'data' => $data,
            'admin' => Admin::where('id', session("admin"))->first()
        ]);
    }

    public function deleteServices($id)
    {
        $service = Services::findOrFail($id);
        $service->items()->detach();
        $service->delete();
        return redirect()->route('admin.services')->with('success', 'Service deleted successfully.');
    }



    public function quotations()
    {
        $admin = Admin::where('id', session("admin"))->first();

        $quotations = Quotations::orderBy('created_at', 'desc')->get();
        $serviceIds = $quotations->pluck('service_id')->unique();
        $services = Services::whereIn('id', $serviceIds)->get()->keyBy('id');

        // GET DATA OF FORIEGN KEY AND SHOW IN BLADE VIEW

        // Map services to their corresponding quotations
        $quotations->map(function ($quotation) use ($services) {
            $quotation->service = $services->get($quotation->service_id);
            return $quotation;
        });

        return view('Admin.Pages.Quotations', [
            'admin' => $admin,
            'quotations' => $quotations
        ]);
    }

}
