@extends('layouts.frontend.master')

@section('seo')
    @include('frontend.seo', [
        'name' => $appointment_page->seo_title ?? '',
        'title' => $appointment_page->seo_title ?? $appointment_page->title,
        'description' => $appointment_page->meta_description ?? '',
        'keyword' => $appointment_page->meta_keywords ?? '',
        'schema' => $appointment_page->seo_schema ?? '',
        'created_at' => $appointment_page->created_at,
        'updated_at' => $appointment_page->updated_at,
    ])
@endsection
@section('content')
    <section
        class="bg-gradient-to-br from-dental-light to-white
                       h-[280px] md:h-[400px] flex items-center"
        id="appointment-hero">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-4 md:mb-6">
                {{ $appointment_page->title }}
            </h2>
            <p class="text-base md:text-xl text-gray-600 max-w-3xl mx-auto">
                {{ $appointment_page->short_description }}

            </p>
        </div>
    </section>

    <section class="py-20 bg-gray-50" id="appointment-form-section">
        <div class="max-w-6xl mx-auto px-6">
            <div class="bg-white rounded-2xl shadow-xl p-6 md:p-10">
                <form class="space-y-8" id="appointment-form" action="{{ route('frontend.register.submit') }}"
                    method="POST">
                    @csrf
                    <div id="step-1">
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                            <span
                                class="bg-dental-blue text-white rounded-full w-7 h-7 md:w-8 md:h-8 flex items-center justify-center text-xs md:text-sm mr-3">1</span>
                            Personal Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-2"> Name *</label>
                                <input
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="first_name" type="text" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Address *</label>
                                <input
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="last_name" type="text" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Email Address </label>
                                <input
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="email" type="email" >
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Phone Number *</label>
                                <input
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="phone" type="tel" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Date of Birth *</label>
                                <input
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="dob" type="date" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Patient Type *</label>
                                <select
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="patient_type" required>
                                    <option value="">Select...</option>
                                    <option value="New Patient">New Patient</option>
                                    <option value="Existing Patient">Existing Patient</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-8" id="step-2">
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                            <span
                                class="bg-dental-blue text-white rounded-full w-7 h-7 md:w-8 md:h-8 flex items-center justify-center text-xs md:text-sm mr-3">2</span>
                            Appointment Details
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Service Type *</label>
                                <select
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="service_type" required>
                                    <option value="">Select Service...</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->title ?? '' }}">{{ $service->title ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Preferred Doctor</label>
                                <select
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="doctor">
                                    <option value="">No Preference</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->name ?? '' }}">{{ $doctor->name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Preferred Date *</label>
                                <input
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="appointment_date" type="date" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Preferred Time *</label>
                                <select
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="appointment_time" required>
                                    <option value="">Select Time...</option>
                                    <option value="8:00 AM - 9:00 AM">8:00 AM - 9:00 AM</option>
                                    <option value="9:00 AM - 10:00 AM">9:00 AM - 10:00 AM</option>
                                    <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                                    <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                                    <option value="12:00 PM - 1:00 PM">12:00 PM - 1:00 PM</option>
                                    <option value="1:00 PM - 2:00 PM">1:00 PM - 2:00 PM</option>
                                    <option value="2:00 PM - 3:00 PM">2:00 PM - 3:00 PM</option>
                                    <option value="3:00 PM - 4:00 PM">3:00 PM - 4:00 PM</option>
                                    <option value="4:00 PM - 5:00 PM">4:00 PM - 5:00 PM</option>
                                    <option value="5:00 PM - 6:00 PM">5:00 PM - 6:00 PM</option>
                                </select>
                            </div>
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-gray-700 font-medium mb-2">Reason for Visit</label>
                                <textarea
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="reason_visit" rows="3" placeholder="Please describe any symptoms or concerns..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-8" id="step-3">
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                            <span
                                class="bg-dental-blue text-white rounded-full w-7 h-7 md:w-8 md:h-8 flex items-center justify-center text-xs md:text-sm mr-3">3</span>
                            Insurance Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Do you have dental insurance?</label>
                                <select
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="insurance">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Not Sure">Not Sure</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Insurance Provider</label>
                                <input
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="insurance_provider" type="text" placeholder="e.g., Delta Dental, Aetna">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Policy Number</label>
                                <input
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="policy_number" type="text">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Group Number</label>
                                <input
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="group_number" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-8" id="step-4">
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                            <span
                                class="bg-dental-blue text-white rounded-full w-7 h-7 md:w-8 md:h-8 flex items-center justify-center text-xs md:text-sm mr-3">4</span>
                            Medical History
                        </h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-gray-700 font-medium mb-3">Do you have any of the following
                                    conditions? (Check all that apply)</label>
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                    <label class="flex items-center space-x-2">
                                        <input
                                            class="w-4 h-4 text-dental-blue border-gray-300 rounded focus:ring-dental-blue"
                                            type="checkbox" name="medical_conditions[]" value="heart_disease">
                                        <span class="text-gray-700">Heart Disease</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input
                                            class="w-4 h-4 text-dental-blue border-gray-300 rounded focus:ring-dental-blue"
                                            type="checkbox" name="medical_conditions[]" value="diabetes">
                                        <span class="text-gray-700">Diabetes</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input
                                            class="w-4 h-4 text-dental-blue border-gray-300 rounded focus:ring-dental-blue"
                                            type="checkbox" name="medical_conditions[]" value="high_blood_pressure">
                                        <span class="text-gray-700">High Blood Pressure</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input
                                            class="w-4 h-4 text-dental-blue border-gray-300 rounded focus:ring-dental-blue"
                                            type="checkbox" name="medical_conditions[]" value="allergies">
                                        <span class="text-gray-700">Allergies</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input
                                            class="w-4 h-4 text-dental-blue border-gray-300 rounded focus:ring-dental-blue"
                                            type="checkbox" name="medical_conditions[]" value="asthma">
                                        <span class="text-gray-700">Asthma</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input
                                            class="w-4 h-4 text-dental-blue border-gray-300 rounded focus:ring-dental-blue"
                                            type="checkbox" name="medical_conditions[]" value="none">
                                        <span class="text-gray-700">None</span>
                                    </label>
                                </div>

                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Current Medications</label>
                                <textarea
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="medication" rows="2" placeholder="List any medications you're currently taking..."></textarea>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Known Allergies</label>
                                <textarea
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-dental-blue focus:border-transparent"
                                    name="allergies" rows="2" placeholder="List any allergies (medications, latex, etc.)..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-8" id="step-5">
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                            <span
                                class="bg-dental-blue text-white rounded-full w-7 h-7 md:w-8 md:h-8 flex items-center justify-center text-xs md:text-sm mr-3">5</span>
                            Communication Preferences
                        </h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-gray-700 font-medium mb-3">
                                    How would you like to receive appointment reminders?
                                </label>
                                <div class="space-y-2">
                                    <label class="flex items-center space-x-2">
                                        <input
                                            class="w-4 h-4 text-dental-blue border-gray-300 rounded focus:ring-dental-blue"
                                            type="checkbox" name="appointment_reminders[]" value="email">
                                        <span class="text-gray-700">Email</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input
                                            class="w-4 h-4 text-dental-blue border-gray-300 rounded focus:ring-dental-blue"
                                            type="checkbox" name="appointment_reminders[]" value="sms">
                                        <span class="text-gray-700">SMS Text Message</span>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input
                                            class="w-4 h-4 text-dental-blue border-gray-300 rounded focus:ring-dental-blue"
                                            type="checkbox" name="appointment_reminders[]" value="phone_call">
                                        <span class="text-gray-700">Phone Call</span>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- <div class="border-t border-gray-200 pt-8" id="step-6">
                            <div class="space-y-4">
                                <label class="flex items-start space-x-3">
                                    <input type="checkbox" class="w-5 h-5 text-dental-blue border-gray-300 rounded focus:ring-dental-blue mt-1" required>
                                    <span class="text-gray-700">I agree to the <a href="#" class="text-dental-blue hover:underline">terms and conditions</a> and <a href="#" class="text-dental-blue hover:underline">privacy policy</a> *</span>
                                </label>
                                <label class="flex items-start space-x-3">
                                    <input type="checkbox" class="w-5 h-5 text-dental-blue border-gray-300 rounded focus:ring-dental-blue mt-1">
                                    <span class="text-gray-700">I would like to receive promotional emails and updates from SmileCare</span>
                                </label>
                            </div>
                        </div> --}}

                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center pt-6 gap-4">
                            <p class="text-gray-600 text-sm">* Required fields</p>
                            <button
                                class="w-full md:w-auto bg-dental-blue text-white px-8 md:px-12 py-4 rounded-lg text-lg font-semibold hover:bg-blue-700 transition"
                                type="submit">
                                Submit Appointment Request
                            </button>
                        </div>

                </form>
            </div>

            {{-- <div id="confirmation-info" class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <div class="flex items-start space-x-3">
                        <i class="fa-solid fa-info-circle text-dental-blue text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">What happens next?</h4>
                            <ul class="text-gray-700 space-y-1 text-sm">
                                <li>• You'll receive a confirmation email within 1 hour</li>
                                <li>• Our team will review your request and confirm your appointment within 24 hours</li>
                                <li>• You'll receive appointment reminders via your preferred method</li>
                                <li>• For urgent matters, please call us directly at (555) 123-4567</li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
        </div>
    </section>
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Toastify({
                    text: "{{ $errors->first() }}",
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#ff4d4d", // red for error
                    stopOnFocus: true,
                }).showToast();
            });
        </script>
    @endif
@endsection
