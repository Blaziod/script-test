@php
   $faq = getContent('faq.content', true);
   $faqs = getContent('faq.element', false);
@endphp
<section class="faqs-section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-between gy-5 align-items-end">
            <div class="col-lg-6">
         
            </div>
            <div class="col-lg-6">
                <div class="faqs-thumb">
                    <img src="{{getImage('assets/images/frontend/faq/'. @$faq->data_values->faq_image, '651x464')}}" alt="@lang('faqs')">
                </div>
            </div>
        </div>
    </div>
</section>
