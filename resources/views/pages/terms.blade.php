@extends('layouts.public')

@section('title', 'Terms of Service - Aetherian Cargo')

@section('content')
    <x-page-banner title="Terms of Service" breadcrumb="Terms" image="{{ asset('images/truck.jpg') }}" />

    <section class="py-24 bg-[#F5F5F5]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-[20px] shadow-sm border border-slate-200 text-slate-600 leading-relaxed space-y-6">
                <p>
                    By using Aetherian Cargo services, you agree to these terms. We provide freight and logistics services subject to applicable laws and our shipping policies.
                </p>
                <p>
                    Customers are responsible for accurate shipment details, proper packaging, and compliance with customs and import/export regulations. Prohibited items, hazardous materials, and misdeclared goods may result in refused service or additional charges.
                </p>
                <p>
                    Transit times are estimates and may change due to weather, customs, carrier schedules, or other events outside our control. We will communicate delays through your tracking dashboard or contact information.
                </p>
                <p>
                    Liability for loss or damage is limited to the terms stated in your booking agreement. Claims must be submitted in writing within the time frame specified in our policy.
                </p>
                <p>
                    We reserve the right to update these terms at any time. Continued use of our services after changes are posted means you accept the updated terms.
                </p>
            </div>
        </div>
    </section>
@endsection
