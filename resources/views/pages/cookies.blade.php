@extends('layouts.public')

@section('title', 'Cookie Policy - Aetherian Cargo')

@section('content')
    <x-page-banner title="Cookie Policy" breadcrumb="Cookies" image="{{ asset('images/ship.jpg') }}" />

    <section class="py-24 bg-[#F5F5F5]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-[20px] shadow-sm border border-slate-200 text-slate-600 leading-relaxed space-y-6">
                <p>
                    Aetherian Cargo uses cookies and similar technologies to maintain your session, remember preferences, analyze traffic, and improve our website experience.
                </p>
                <p>
                    Essential cookies are required for the website to function, such as keeping you logged in and maintaining security. These cannot be disabled.
                </p>
                <p>
                    Analytics cookies help us understand how visitors use our site so we can improve navigation, content, and performance. These are used only with your consent where required by law.
                </p>
                <p>
                    You can manage or disable cookies through your browser settings. Please note that disabling some cookies may affect the functionality of the website, including login and tracking features.
                </p>
                <p>
                    By continuing to use this site, you consent to our use of cookies as described in this policy.
                </p>
            </div>
        </div>
    </section>
@endsection
