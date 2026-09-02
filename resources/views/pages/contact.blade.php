@extends('layouts.public')

@section('title', 'Contact Us - Aetherian Cargo')

@section('content')
    <x-page-banner title="Contact Us" breadcrumb="Contact Us" image="{{ asset('images/warehouse.jpg') }}" />

    <section class="py-24 bg-[#F5F5F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12">
                <div>
                    <p class="text-brand-600 font-semibold uppercase tracking-widest text-sm mb-3">Get in Touch</p>
                    <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-6">We would love to hear from you</h2>
                    <p class="text-slate-600 leading-relaxed mb-10">
                        Have questions about a shipment, our services, or want a custom quote? Send us a message and our support team will respond as soon as possible.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-brand-600 flex items-center justify-center text-white">
                                <i data-lucide="phone" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <p class="text-sm text-slate-500">Phone</p>
                                <a href="tel:1-800-AETHER" class="font-semibold hover:text-brand-600">1-800-AETHER</a>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-brand-600 flex items-center justify-center text-white">
                                <i data-lucide="mail" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <p class="text-sm text-slate-500">Email</p>
                                <a href="mailto:support@aetheriancargo.com" class="font-semibold hover:text-brand-600">support@aetheriancargo.com</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[20px] shadow-lg border border-slate-200">
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1">Name</label>
                            <input type="text" name="name" class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1">Email</label>
                            <input type="email" name="email" class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500" required>
                        </div>
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Phone</label>
                                <input type="text" name="phone" class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Subject</label>
                                <input type="text" name="subject" class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1">Message</label>
                            <textarea name="message" rows="4" class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-500" required></textarea>
                        </div>
                        <button type="submit" class="w-full sm:w-auto px-8 py-4 bg-brand-600 text-white font-bold rounded-full hover:bg-brand-700 transition-colors">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
