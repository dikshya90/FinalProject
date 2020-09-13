@extends('layouts.front')
@section('title', 'Privacy and Policies')

@section('content')

<section class="ftco-section ftco-no-pb ftco-no-pt bg-light" style="margin-top: 5%;">
    <div class="container" style="margin-bottom: 7%;">
        <div class="row justify-content-center">
            {{-- <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{asset('frontend/images/sub4.jpg')}});"></div> --}}
            <div class="col-md-10 wrap-about ftco-animate">
                <div class="heading-section-bold mb-4">
                    <div class="ml-md-0">
                        <h2 class="mb-4 text-center">Privacy and Policies</h2>
                        {{-- <h4 style="font-family: Arial, Helvetica, sans-serif; color: mediumseagreen;">Buy Art.  Do Good.  Appreciate Art. Feel Good.</h4> --}}
                    </div>
                </div>
                <div class="pb-md-5">

                    <h4 style="font-family: Arial, Helvetica, sans-serif; color: mediumseagreen;">Your Informations?</h4>
                    <p>
                        When you purchase something from our store, as part of the buying and selling process,
                        we collect the personal information you give us such as your name, address and email address.
                        Email marketing: With your permission, we may send you emails about our new products and other updates.
                    </p>

                    <h4 style="font-family: Arial, Helvetica, sans-serif; color: mediumseagreen;">Disclosure</h4>
                    <p>We may disclose your personal information if we are required by law to do so or if you violate our Terms of Service.
                    </p>

                    <h4 style="font-family: Arial, Helvetica, sans-serif; color: mediumseagreen;">Payment</h4>
                    <p>
                        All credit/debit cards details and personally identifiable information will NOT be stored,
                        sold, shared, rented or leased to any third parties.
                        Your purchase transaction data is stored only as long as is necessary to complete your purchase transaction.
                        After that is complete, your purchase transaction information is deleted.
                    </p>

                    <h4 style="font-family: Arial, Helvetica, sans-serif; color: mediumseagreen;">Security</h4>
                    <p>
                        To protect your personal information, we take reasonable precautions and follow industry best
                        practices to make sure it is not inappropriately lost, misused, accessed, disclosed, altered or destroyed.
                        If you provide us with your credit card information, the information is encrypted using secure socket layer
                        technology (SSL) and stored with a AES-256 encryption. Although no method of transmission over the Internet or
                        electronic storage is 100% secure, we follow all PCI-DSS requirements and implement additional generally accepted
                        industry standards.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
