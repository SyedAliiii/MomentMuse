<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Blogs;
use App\Models\Testimonial;
use App\Models\Portfolio;
use App\Models\Services;
use App\Models\Items;
use App\Models\Quotations;

class HomeController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')
            ->get();

        $blogs = Blogs::orderBy('created_at', 'desc')
            ->get();

        $portfolios = Portfolio::orderBy('created_at', 'desc')
            ->get();

        $services = Services::all();
        $items = Items::orderBy('created_at', 'desc')
            ->get();

        return view('Index', [
            'testimonials' => $testimonials,
            'blogs' => $blogs,
            'portfolios' => $portfolios,
            'items' => $items,
            'services' => $services

        ]);
    }
    public function contactSend(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:contact_us,email',
            'phone' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:1000', // Increased max length for messages
        ], [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'phone.required' => 'Phone number is required.',
            'message.required' => 'Message is required.',
        ]);

        try {
            $data = $request->all();
            Contact::create($data);
            return redirect()->back()->with('success', 'Message sent successfully!');
        } catch (\Exception $e) {
            \Log::error('Error while contacting: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while sending your message.');
        }
    }
    public function quotations($id)
    {
        $service = Services::find($id);
        // dd($service);

        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }

        return view('Quotations', ['service' => $service]);
    }
    public function quotationSend(Request $request)
    {
        // $service = Services::find($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'event_date' => 'required',
            'address' => 'required|string|max:1000',
            'message' => 'required|string|max:1000',
            'service_id' => 'required|exists:services,id',
        ], [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'phone.required' => 'Phone number is required.',
            'event_date.required' => 'Event Date is required.',
            'address.required' => 'Address is required.',
            'message.required' => 'Message is required.',
        ]);

        $payload = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'event_date' => $request->event_date,
            'address' => $request->address,
            'message' => $request->message,
            'service_id' => $request->service_id
        ];
        // dd($payload);

        
        try {
            $quotation = Quotations::create($payload);
            return redirect()->back()->with('success', 'Message sent successfully!');
        } catch (\Exception $e) {
            \Log::error('Error while contacting: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while sending your message.' . $e->getMessage());
        }
    }
    

}
