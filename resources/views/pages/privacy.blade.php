@extends('layouts.public')

@section('title', 'Privacy Policy - Aetherian Cargo')

@section('content')
    <x-page-banner title="Privacy Policy" breadcrumb="Privacy" image="{{ asset('images/warehouse.jpg') }}" />

    <section class="py-24 bg-[#F5F5F5]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-[20px] shadow-sm border border-slate-200 text-slate-600 leading-relaxed space-y-6">
                <p>
                    Aetherian Cargo respects your privacy. We collect only the information needed to process shipments, communicate with you, and improve our services.
                </p>
                <p>
                    The information we collect may include names, addresses, phone numbers, email addresses, shipment details, and payment information. This data is used to fulfill bookings, provide tracking updates, respond to support requests, and meet legal obligations.
                </p>
                <p>
                    We do not sell your personal data. We may share information with carriers, customs authorities, and service providers only as necessary to complete shipments and operate our business.
                </p>
                <p>
                    Data is stored securely and retained only as long as necessary for business, accounting, and legal purposes. You may request access to, correction of, or deletion of your personal data by contacting us.
                </p>
                <p>
                    By using our website, you consent to this privacy policy. If we make material changes, we will update this page and notify users where appropriate.
                </p>
            </div>
        </div>
    </section>
@endsection
