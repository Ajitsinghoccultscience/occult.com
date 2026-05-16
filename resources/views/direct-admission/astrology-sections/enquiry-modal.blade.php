{{-- Enquiry Modal — include once per page --}}
<div id="enquiry-modal"
     class="fixed inset-0 z-[999] flex items-center justify-center p-4"
     style="display:none!important;">

    {{-- Backdrop --}}
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeEnquiryModal()"></div>

    {{-- Modal card --}}
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md p-7 z-10">

        {{-- Close button --}}
        <button onclick="closeEnquiryModal()"
                class="absolute top-4 right-4 w-8 h-8 rounded-full bg-neutral-100 hover:bg-neutral-200 flex items-center justify-center transition"
                aria-label="Close">
            <svg class="w-4 h-4 text-neutral-b" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        {{-- Header --}}
        <div class="mb-6 text-center">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full mb-3" style="background-color:#8B0000;">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-neutral-b">Enrol in Astrology Course</h3>
            <p class="text-xs text-neutral-e mt-1">Fill in your details and our team will contact you within 24 hours.</p>
        </div>

        {{-- Form --}}
        <form id="enquiry-form" onsubmit="submitEnquiryForm(event)" class="flex flex-col gap-4" novalidate>

            {{-- Name --}}
            <div class="flex flex-col gap-1">
                <label class="text-xs font-semibold text-neutral-b" for="eq-name">Full Name <span class="text-[#8B0000]">*</span></label>
                <input id="eq-name" name="name" type="text" required placeholder="Your full name"
                       class="w-full border border-neutral-200 rounded-xl px-4 py-3 text-sm text-neutral-b placeholder-neutral-400 focus:outline-none focus:border-[#8B0000] transition">
                <span class="text-[10px] text-[#8B0000] hidden" id="eq-name-err">Please enter your name.</span>
            </div>

            {{-- Phone --}}
            <div class="flex flex-col gap-1">
                <label class="text-xs font-semibold text-neutral-b" for="eq-phone">Phone Number <span class="text-[#8B0000]">*</span></label>
                <input id="eq-phone" name="phone" type="tel" required placeholder="10-digit mobile number"
                       maxlength="10" pattern="[6-9][0-9]{9}"
                       class="w-full border border-neutral-200 rounded-xl px-4 py-3 text-sm text-neutral-b placeholder-neutral-400 focus:outline-none focus:border-[#8B0000] transition">
                <span class="text-[10px] text-[#8B0000] hidden" id="eq-phone-err">Please enter a valid 10-digit number.</span>
            </div>

            {{-- Email --}}
            <div class="flex flex-col gap-1">
                <label class="text-xs font-semibold text-neutral-b" for="eq-email">Email Address</label>
                <input id="eq-email" name="email" type="email" placeholder="your@email.com"
                       class="w-full border border-neutral-200 rounded-xl px-4 py-3 text-sm text-neutral-b placeholder-neutral-400 focus:outline-none focus:border-[#8B0000] transition">
            </div>

            {{-- Submit --}}
            <button type="submit" id="eq-submit"
                    class="w-full font-bold text-white text-sm py-3.5 rounded-xl transition hover:opacity-90 flex items-center justify-center gap-2"
                    style="background-color:#8B0000;">
                <span id="eq-btn-text">Submit Enquiry</span>
                <svg id="eq-spinner" class="hidden w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
                </svg>
            </button>

        </form>

        {{-- Success state (hidden initially) --}}
        <div id="eq-success" class="hidden flex-col items-center gap-4 py-4 text-center">
            <div class="w-14 h-14 rounded-full flex items-center justify-center" style="background-color:#8B0000;">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <div>
                <p class="font-bold text-neutral-b text-base">Enquiry Submitted!</p>
                <p class="text-xs text-neutral-e mt-1">Our team will reach out to you within 24 hours.</p>
            </div>
            <button onclick="closeEnquiryModal()"
                    class="font-bold text-white text-sm px-8 py-3 rounded-xl hover:opacity-90"
                    style="background-color:#8B0000;">
                Close
            </button>
        </div>

    </div>
</div>

<script>
function openEnquiryModal() {
    const modal = document.getElementById('enquiry-modal');
    modal.style.removeProperty('display');
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    document.getElementById('eq-name').focus();
}

function closeEnquiryModal() {
    const modal = document.getElementById('enquiry-modal');
    modal.style.display = 'none';
    document.body.style.overflow = '';
    // Reset form
    document.getElementById('enquiry-form').reset();
    document.getElementById('enquiry-form').classList.remove('hidden');
    document.getElementById('eq-success').classList.remove('flex');
    document.getElementById('eq-success').classList.add('hidden');
    ['eq-name-err','eq-phone-err'].forEach(id => document.getElementById(id).classList.add('hidden'));
}

// Close on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeEnquiryModal();
});

function submitEnquiryForm(e) {
    e.preventDefault();
    const name  = document.getElementById('eq-name');
    const phone = document.getElementById('eq-phone');
    let valid = true;

    document.getElementById('eq-name-err').classList.add('hidden');
    document.getElementById('eq-phone-err').classList.add('hidden');

    if (!name.value.trim()) {
        document.getElementById('eq-name-err').classList.remove('hidden');
        name.focus(); valid = false;
    }
    if (!phone.value.match(/^[6-9][0-9]{9}$/)) {
        document.getElementById('eq-phone-err').classList.remove('hidden');
        if (valid) phone.focus(); valid = false;
    }
    if (!valid) return;

    // Show spinner
    document.getElementById('eq-btn-text').textContent = 'Submitting...';
    document.getElementById('eq-spinner').classList.remove('hidden');
    document.getElementById('eq-submit').disabled = true;

    // POST to Laravel route
    fetch('{{ route("enquiry.store") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        },
        body: JSON.stringify({
            name:  name.value.trim(),
            phone: phone.value.trim(),
            email: document.getElementById('eq-email').value.trim(),
            source: 'astrology-course'
        })
    })
    .then(r => {
        if (!r.ok) throw new Error('Server error ' + r.status);
        return r.json();
    })
    .then(() => {
        document.getElementById('enquiry-form').classList.add('hidden');
        const success = document.getElementById('eq-success');
        success.classList.remove('hidden');
        success.classList.add('flex');
    })
    .catch(err => {
        alert('Something went wrong. Please try again.');
        console.error(err);
    })
    .finally(() => {
        document.getElementById('eq-btn-text').textContent = 'Submit Enquiry';
        document.getElementById('eq-spinner').classList.add('hidden');
        document.getElementById('eq-submit').disabled = false;
    });
}
</script>
