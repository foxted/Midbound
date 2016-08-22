<p>Hi {{ explode(' ', $billable->name)[0] }},</p>

<p>Thank you for being a loyal Midbound customer. We've attached a copy of your invoice for your records. Please let us know if you have any questions.</p>

@include('partials.email-footer')

{{ $invoiceData['product'] }}

