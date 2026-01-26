<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumGallery;
use App\Models\Appointment;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Team;
use App\Models\Event;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Result;
use App\Models\Slider;
use App\Models\Country;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Success;
use App\Models\Settings;
use App\Models\Enquiries;
use App\Models\University;
use App\Models\Application;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use App\Models\DocumentImage;
use App\Models\ContactInquiry;
use App\Models\CountryLocation;
use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    //
    public function home()
    {
        $sliders = Slider::where('status', 1)->oldest("order")->first();
        $about_us = Page::where('status', 1)->where('slug', 'about-us')->first();
        $why_choose_us = WhyChooseUs::where('status', 1)->first();
        $teams = Team::where('status', 1)->oldest("order")->get();
        $faq = Faq::where('status', 1)->limit(6)->get();
        $popup = Popup::where('status', 1)->first();
        $home_country = Settings::where('key', 'home_countries')->first();
        $countryIds = explode(',', $home_country->value);
        $countries = Country::whereIn('id', $countryIds)->where('status', 1)->get();

        $home_service = Settings::where('key', 'home_services')->first();
        $serviceIds = explode(',', $home_service->value);
        $services = Service::whereIn('id', $serviceIds)->where('status', 1)->get();

        // dd($services);

        $home_course = Settings::where('key', 'home_courses')->first();
        $courseIds = explode(',', $home_course->value);
        $courses = Course::whereIn('id', $courseIds)->where('status', 1)->get();

        $home_testimonial = Settings::where('key', 'home_testioninals')->first();
        $testimonialIds = explode(',', $home_testimonial->value);
        $testimonials = Testimonial::whereIn('id', $testimonialIds)->where('status', 1)->get();

        $home_blog = Settings::where('key', 'home_blogs')->first();
        $blogIds = explode(',', $home_blog->value);
        $blogs = Blog::whereIn('id', $blogIds)->where('status', 1)->get();
        $universities = University::where('status', 1)->oldest("order")->get();

        $abroadstudies = Country::where('status', 1)->oldest("order")->get();
        $countrylocation = CountryLocation::where('status', 1)->oldest("order")->get();

        $faq_page = Page::where('status', 1)->where('slug', 'faq')->first();

        return view('frontend.home.index', compact('sliders', 'popup', 'faq_page', 'countrylocation', 'faq', 'abroadstudies', 'universities', 'courses', 'countries', 'blogs', 'services', 'about_us', 'why_choose_us', 'teams', 'testimonials'));
    }
    public function about()
    {
        $about_us = Page::where('status', 1)->where('slug', 'about-us')->first();
        $why_us = Page::where('status', 1)->where('slug', 'why-choose-us')->first();
        $mission_page = Page::where('status', 1)->where('slug', 'destination')->first();
        $teams = Team::where('status', 1)->oldest("order")->get();
        $studentreviw = WhyChooseUs::get();
        $missions = Country::where('status', 1)->oldest("order")->get();
        $techno = Course::where('status', 1)->where('slug', 'advanced-technology')->first();
        $patient = Course::where('status', 1)->where('slug', 'patient-comfort')->first();
        return view('frontend.about.index', compact('about_us', 'why_us', 'teams', 'studentreviw', 'missions', 'mission_page', 'techno', 'patient'));
    }
    public function service()
    {
        $service_page = Page::where('status', 1)->where('slug', 'service')->first();
        $services = Service::where('status', 1)->oldest("order")->get();

        return view('frontend.service.index', compact('service_page', 'services'));
    }
    function servicesingle($slug)
    {
        $service_page = Page::where('status', 1)->where('slug', 'service')->first();
        $servicesingle = Service::where('slug', $slug)->where('status', 1)->first();
        $services = Service::where('status', 1)->limit(4)->oldest("order")->get();

        return view('frontend.service.show', compact('servicesingle', 'services', 'service_page'));
    }
    public function event()
    {
        $event_page = Page::where('status', 1)->where('slug', 'event')->first();
        $events = Event::where('status', 1)->oldest("order")->get();

        return view('frontend.event.index', compact('event_page', 'events'));
    }
    function eventsingle($slug)
    {
        $event_page = Page::where('status', 1)->where('slug', 'event')->first();
        $eventsingle = Event::where('slug', $slug)->where('status', 1)->first();
        $popular_events = Event::where('status', 1)->take(5)->get();
        return view('frontend.event.show', compact('eventsingle', 'event_page', 'popular_events'));
    }
    function abroadstudies()
    {
        $abroad_page = Page::where('status', 1)->where('slug', 'abroad-studies')->first();
        $abroadstudies = Country::where('status', 1)->oldest("order")->get();
        return view('frontend.abroad.index', compact('abroadstudies', 'abroad_page'));
    }
    function abroadstudiesingle($slug)
    {
        $abroad_page = Page::where('status', 1)->where('slug', 'abroad-studies')->first();
        $abroadstudiesingle = Country::with('countryFaqs')->where('slug', $slug)->where('status', 1)->first();
        $faq = Faq::where('status', 1)->get();
        $universities = University::where('country_id', $abroadstudiesingle->id)->where('status', 1)->oldest("order")->get();
        return view('frontend.abroad.show', compact('abroadstudiesingle', 'faq', 'abroad_page', 'universities'));
    }
    function course()
    {
        $course_page = Page::where('status', 1)->where('slug', 'course')->first();
        $course = Course::get();
        return view('frontend.course.index', compact('course', 'course_page'));
    }
    function coursesingle($slug)
    {
        $course_page = Page::where('status', 1)->where('slug', 'course')->first();
        $coursesingle = Course::where('slug', $slug)->where('status', 1)->first();
        if ($coursesingle) {
            $coursesingle->save();
            $courses = Course::where('id', '!=', $coursesingle->id)->where('status', 1)->oldest("order")->limit(5)->get();
            return view("frontend.course.show", compact('courses', 'coursesingle', 'course_page'));
        }
    }
    function blog()
    {
        $blog_page = Page::where('status', 1)->where('slug', 'blog')->first();
        $blog = Blog::where('status', 1)->oldest("order")->get();
        return view('frontend.blog.index', compact('blog', 'blog_page'));
    }
    function blogsingle($slug)
    {
        $blog_page = Page::where('status', 1)->where('slug', 'blog')->first();
        $abroadstudies = Country::where('status', 1)->limit(3)->oldest("order")->get();
        $blogsingle = Blog::where('slug', $slug)->where('status', 1)->first();
        if ($blogsingle) {
            $blogsingle->views += 1;
            $blogsingle->save();
            $blogs = Blog::where('id', '!=', $blogsingle->id)->where('status', 1)->oldest("order")->limit(5)->get();
            return view("frontend.blog.show", compact('blogs', 'blogsingle', 'blog_page', 'abroadstudies'));
        }
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('frontend.pages.index', compact('page'));
    }
    function team()
    {
        $team_page = Page::where('status', 1)->where('slug', 'our-team')->first();
        $teams = Team::where('status', 1)->oldest("order")->get() ?? [];
        return view('frontend.team', compact('teams', 'team_page'));
    }
    function appointment()
    {
        $appointment_page = Page::where('status', 1)->where('slug', 'register')->first();
        $doctors = Team::where('status', 1)->oldest("order")->get();
        $services = Service::where('status', 1)->oldest("order")->get();
        return view('frontend.appointment.index', compact('appointment_page', 'doctors', 'services'));
    }
    function testimonial()
    {
        $testimonial_page = Page::where('status', 1)->where('slug', 'testimonial')->first();
        $testimonial = Testimonial::where('status', 1)->oldest("order")->get() ?? [];
        return view('frontend.testimonial', compact('testimonial', 'testimonial_page'));
    }
    function gallery()
    {
        $gallery_page = Page::where('status', 1)->where('slug', 'gallery')->first();
        $albums = Album::with(['galleries' => function ($query) {
            $query->orderBy('title'); // or 'id' or whatever you prefer
        }])
            ->orderBy('order', 'asc')
            ->get();
        // dd($albums);
        return view('frontend.gallery', compact('albums', 'gallery_page'));
    }
    public function galleryshow(Album $album)
    {
        $album->load('galleries');
        return view('frontend.album.show', compact('album'));
    }

    function studentvoice()
    {
        $gallery_page = Page::where('status', 1)->where('slug', 'testimonial')->first();

        return view('frontend.studentvoice', compact('gallery_page'));
    }
    function visagrantes()
    {
        $visagrantes_page = Page::where('status', 1)->where('slug', 'visa-granted')->first();
        $visagranted = Success::get() ?? [];
        return view('frontend.visagrant', compact('visagranted', 'visagrantes_page'));
    }
    function messagefromfounder()
    {
        $message_page = Page::where('status', 1)->where('slug', 'message-from-ceo')->first();
        $message_from_founder_1 = Page::where('status', 1)->where('slug', 'message-from-founder-1')->first();
        $message_from_founder_2 = Page::where('status', 1)->where('slug', 'message-from-founder-2')->first();
        return view('frontend.messagefromceo', compact('message_page', 'message_from_founder_1', 'message_from_founder_2'));
    }
    public function contact()
    {
        $contact_page = Page::where('status', 1)->where('slug', 'contact-us')->first();
        $branches = Branch::where('status', 1)->orderBy('order')->get();
        $faq_page = Page::where('status', 1)->where('slug', 'faq')->first();
        $faqs = Faq::where('status', 1)->get();

        return view('frontend.contact.index', compact('branches', 'contact_page', 'faq_page', 'faqs'));
    }
    public function contact_submite(Request $request)
    {
        // 1️⃣ Validate form fields (NO captcha rule for v3)
        $validator = Validator::make($request->all(), [
            'name'    => 'required|min:3',
            'email'   => 'required|email',
            'phone'   => 'required|min:10',
            'message' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
    
        // 2️⃣ Verify reCAPTCHA v3 (skip on localhost if you want)
        if (!app()->environment('local')) {
    
            /** @var \Illuminate\Http\Client\Response $response */
            $response = Http::asForm()->post(
                'https://www.google.com/recaptcha/api/siteverify',
                [
                    'secret'   => config('recaptcha.secret_key'),
                    'response' => $request->input('g-recaptcha-response'),
                    'remoteip' => $request->ip(),
                ]
            );
    
            $data = $response->json();
    
            $success = $data['success'] ?? false;
            $score   = $data['score'] ?? 0;
            $action  = $data['action'] ?? null;
    
            if (!$success || $score < 0.5 || $action !== 'contact') {
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'captcha' => 'reCAPTCHA verification failed. Please try again.'
                    ]);
            }
        }
    
        // 3️⃣ Save inquiry (safe fields only)
        ContactInquiry::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'message' => $request->message,
        ]);
    
        // 4️⃣ Success response
        return redirect()->back()
            ->with('success', 'Your message has been submitted successfully.');
    }
    
    
    public function contact_submite_home(Request $request)
    {
        //
        $input = $request->all();
        // dd($input);
        $rules = [
            'name' => 'required|min:3',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        // Create a new Inquiry instance with the validated data
        ContactInquiry::create($input);
        return redirect()->back()->with('success', 'Your message has been submitted successfully.');
    }
    function register()
    {
        $register_banner = Page::where('status', 1)->where('id', 10)->first();
        return view("frontend.register.index", compact('register_banner'));
    }
    public function registerstudent(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $rules = [
            // Step 1: Personal Information
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'dob' => 'required|date',
            'patient_type' => 'required|in:New Patient,Existing Patient',

            // Step 2: Appointment Details
            'service_type' => 'required|string|max:255',
            'doctor' => 'nullable|string|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|string|max:255',
            'reason_visit' => 'nullable|string',

            // Step 3: Insurance Information
            'insurance' => 'nullable|in:Yes,No,Not Sure',
            'insurance_provider' => 'nullable|string|max:255',
            'policy_number' => 'nullable|string|max:255',
            'group_number' => 'nullable|string|max:255',

            // Step 4: Medical History
            'medical_conditions' => 'nullable|array',
            'medical_conditions.*' => 'string|max:255',

            'medication' => 'nullable|string',
            'allergies' => 'nullable|string',

            // Step 5: Communication Preferences
            'appointment_reminders' => 'nullable|array',
            'appointment_reminders.*' => 'in:email,sms,phone_call',
        ];


        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->route("frontend.appointment")->withInput()->withErrors($validator);
        } else {
            // Convert the 'dob' field from dd-mm-yyyy to yyyy-mm-dd format
            // $input['dob'] = Carbon::createFromFormat('d-m-Y', $input['dob'])->format('Y-m-d');

            // Convert the source array to a JSON string
            $input['medical_conditions'] = $request->medical_conditions ?? [];
            $input['appointment_reminders'] = $request->appointment_reminders ?? [];


            $enquiry = Appointment::create($input);


            return redirect()->back()->with('success', 'Appointment Request Submitted successful!');
        }
    }
}
